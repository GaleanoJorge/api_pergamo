<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Base\LaboratoryStatus;
use App\Models\ChLaboratory;
use Illuminate\Http\Request;
use App\Models\UserChLaboratory;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\LaboratoryRequest;
use App\Models\Authorization;

class ChLaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $chLaboratories = ChLaboratory::select('ch_laboratory.*')
            ->with(
                'laboratory_status',
                'medical_order.ch_record.admissions.patients',
                'medical_order.services_briefcase.manual_price.procedure',
                'user_ch_laboratory'
            )
            ->join('ch_medical_orders', 'ch_medical_orders.id', 'ch_laboratory.medical_order_id')
            ->join('services_briefcase', 'services_briefcase.id', 'ch_medical_orders.services_briefcase_id')
            ->join('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
            ->join('procedure', 'procedure.id', 'manual_price.procedure_id')
            ->join('ch_record', 'ch_record.id', 'ch_medical_orders.ch_record_id')
            ->join('admissions', 'admissions.id', 'ch_record.admissions_id')
            ->join('patients', 'patients.id', 'admissions.patient_id')
            ->where('ch_laboratory.laboratory_status_id', '!=', LaboratoryStatus::$CANCELED_STATUS_ID);

        if ($request->patient_id) {
            $chLaboratories->where('patients.id', '=', $request->patient_id);
        }


        if ($request->semaphore) {
            $chLaboratories->where('ch_laboratory.laboratory_status_id', '=', $request->semaphore);
        }

        if ($request->search) {
            $chLaboratories->where(function ($query) use ($request) {
                $query->where('patients.firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.middlelastname', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.identification', 'like', '%' . $request->search . '%')
                    ->orWhere('procedure.name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $chLaboratories = $chLaboratories->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $chLaboratories = $chLaboratories->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Laboratorios obtenidos exitosamente',
            'data' => ['laboratories' => $chLaboratories]
        ]);
    }

    /**
     * Save the specified resource.
     *
     * @param  Request  $id
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $chLaboratory = new ChLaboratory;
            $chLaboratory->medical_order_id = $request->medical_order_id;
            $chLaboratory->laboratory_status_id = LaboratoryStatus::$ORDERED_STATUS_ID;

            $chLaboratory->save();

            $userChLaboratory = new UserChLaboratory;
            $userChLaboratory->user_id = $request->user_id;
            $userChLaboratory->ch_laboratory_id = $chLaboratory->id;
            $userChLaboratory->laboratory_status_id = LaboratoryStatus::$ORDERED_STATUS_ID;
            $userChLaboratory->observation = $request->observation;

            $userChLaboratory->save();

            $authorization = new Authorization;
            $authorization->services_briefcase_id = $chLaboratory->medical_order->services_briefcase->id;
            $authorization->assigned_management_plan_id = $chLaboratory->medical_order->ch_record->assigned_management_plan_id;
            $authorization->medical_diary_days_id = $chLaboratory->medical_order->ch_record->medical_diary_days_id;
            $authorization->ch_interconsultation_id = $chLaboratory->medical_order->ch_record->ch_interconsultation_id;
            $authorization->admissions_id = $chLaboratory->medical_order->ch_record->admissions_id;
            $authorization->authorized_amount = $chLaboratory->medical_order->amount;
            $authorization->quantity = $chLaboratory->medical_order->amount;
            $authorization->auth_status_id = 1;

            $authorization->save();

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Laboratorio creado exitosamente',
                'data' => ['laboratory' => $chLaboratory, 'userChLaboratory', $userChLaboratory]
            ]);
        } catch (QueryException $e) {
            DB::rollback();
            return response()->json([
                'status' => false,
                'message' => 'No fue posible crear el laboratorio'
            ], 423);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $chLaboratory = ChLaboratory::find($id);

        return response()->json([
            'status' => true,
            'message' => 'Laboratorio obtenido exitosamente',
            'data' => ['laboratory' => $chLaboratory]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(LaboratoryRequest $request): JsonResponse
    {

        DB::beginTransaction();
        try {
            $chLaboratory = ChLaboratory::find($request->id);
            $chLaboratory->laboratory_status_id = $request->laboratory_status_id;

            if ($request->laboratory_status_id == 4) {
                $path = Storage::disk('public')->put('laboratoryFiles', $request->file('file'));
                $chLaboratory->file = $path;
            }

            $chLaboratory->save();

            $userChLaboratory = new UserChLaboratory;
            $userChLaboratory->user_id = $request->user_id;
            $userChLaboratory->ch_laboratory_id = $chLaboratory->id;
            $userChLaboratory->laboratory_status_id = $chLaboratory->laboratory_status_id;
            $userChLaboratory->observation = $request->observation;
            $userChLaboratory->save();

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Laboratorio actualizado exitosamente',
                'data' => ['laboratory' => $chLaboratory]
            ]);
        } catch (QueryException $e) {
            DB::rollback();
            return response()->json([
                'status' => false,
                'message' => ['No fue posible actualizar el laboratorio', $e]
            ], 423);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $chLaboratory = ChLaboratory::find($id);
            $chLaboratory->delete();

            return response()->json([
                'status' => true,
                'message' => 'Laboratorio eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Laboratorio está en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
