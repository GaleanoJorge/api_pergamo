<?php

namespace App\Http\Controllers\Management;

use App\Models\Bed;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Base\LaboratoryStatus;
use App\Models\ChLaboratory;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\UserChLaboratory;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ChLaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $chLaboratories = ChLaboratory::select('patients.*')
            ->join('admissions', 'patients.id', 'admissions.patient_id')
            ->join('ch_record', 'admissions.id', 'ch_record.admissions_id')
            ->join('ch_medical_orders', 'ch_record.id', 'ch_medical_orders.ch_record_id')
            ->join('ch_laboratory', 'ch_medical_orders.id', 'ch_laboratory.medical_order_id')
            ->where('ch_laboratory.laboratory_status_id', '!=', LaboratoryStatus::$CANCELED_STATUS_ID);
        if ($request->patient_id) {
            $chLaboratories->where('patients.id', '=', $request->patient_id);
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
            'message' => 'Pacientes obtenidos exitosamente',
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
    public function update(Request $request, int $id): JsonResponse
    {
        DB::beginTransaction();
        try {
            $chLaboratory = ChLaboratory::find($id);
            $chLaboratory->laboratory_status_id = $request->laboratory_status_id;
            $chLaboratory->file = $request->file;

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
                'message' => 'No fue posible actualizar el laboratorio'
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
