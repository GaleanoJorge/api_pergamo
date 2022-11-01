<?php

namespace App\Http\Controllers\Management;

use App\Models\MedicalDiaryDays;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MedicalDiaryDaysRequest;
use Illuminate\Database\QueryException;
use DateTime;
use Carbon\Carbon;

class MedicalDiaryDaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $MedicalDiaryDays = MedicalDiaryDays::select('medical_diary_days.*')
            ->leftJoin('medical_diary', 'medical_diary_days.medical_diary_id', 'medical_diary.id')
            ->leftJoin('assistance', 'medical_diary.assistance_id', 'assistance.id')
            ->with(
                // 'days',
                'medical_status',
                'patient.identification_type',
                'contract',
                'briefcase',
                'medical_diary.office.pavilion.flat',
                'medical_diary.assistance.user',
                'services_briefcase.manual_price.manual',
                'services_briefcase.manual_price.procedure'
            )
            ->orderBy('start_hour', 'ASC');

        if ($request->assistance_id && $request->assistance_id != 'null') {
            $MedicalDiaryDays->where('medical_diary.assistance_id', $request->assistance_id);
        }

        if ($request->campus_id && $request->campus_id != 'null') {
            $MedicalDiaryDays->where('medical_diary.campus_id', $request->campus_id);
        }

        if ($request->user_id && $request->user_id != 'null') {
            $MedicalDiaryDays->where('assistance.user_id', $request->user_id)
                ->where([
                    ['medical_diary_days.admissions_id', '!=', null],
                    ['medical_diary_days.medical_status_id', '=', 4]
                ]);
        }

        if ($request->medical_status_id && $request->medical_status_id != 'null') {
            $MedicalDiaryDays->where('medical_diary_days.medical_status_id', $request->medical_status_id);
        } else {
            $MedicalDiaryDays->where([
                // ['medical_diary_days.medical_status_id', '!=', 4],
                ['medical_diary_days.medical_status_id', '!=', 5]
            ]);
        }

        if ($request->init_date != 'null' && isset($request->init_date)) {
            $init_date = Carbon::parse($request->init_date);
            $MedicalDiaryDays
                ->where('medical_diary_days.start_hour', '>=', $init_date);
        }

        if ($request->finish_date != 'null' && isset($request->finish_date)) {
            $finish_date = new DateTime($request->finish_date . 'T23:59:59.9');
            $MedicalDiaryDays->where('medical_diary_days.finish_hour', '<=', $finish_date);
        }

        if ($request->campus_id && $request->campus_id != 'null') {
            $MedicalDiaryDays->where('medical_diary.campus_id', $request->campus_id);
        }

        if ($request->_sort) {
            $MedicalDiaryDays->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $MedicalDiaryDays->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $MedicalDiaryDays = $MedicalDiaryDays->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $MedicalDiaryDays = $MedicalDiaryDays->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Dias de agenda obtenidos exitosamente',
            'data' => ['medical_diary_days' => $MedicalDiaryDays]
        ]);
    }


    public function store(MedicalDiaryDaysRequest $request): JsonResponse
    {
        $MedicalDiaryDays = new MedicalDiaryDays;
        $MedicalDiaryDays->name = $request->name;
        $MedicalDiaryDays->save();

        return response()->json([
            'status' => true,
            'message' => 'Dias de agenda creados exitosamente',
            'data' => ['medical_diary_days' => $MedicalDiaryDays->toArray()]
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function changeStatus(Request $request, int $id): JsonResponse
    {
        $now = new DateTime;
        // var_dump($now);
        $MedicalDiaryDays = MedicalDiaryDays::find($id);
        // var_dump($request->status_id);
        if ($request->status_id == 5) {

            $MedicalDiaryDays->medical_status_id = $request->status_id;
            $init_date = new DateTime($MedicalDiaryDays->start_hour);
            if ($init_date >= $now) {
                $Subsittute = new MedicalDiaryDays;
                $Subsittute->days_id = $MedicalDiaryDays->days_id;
                $Subsittute->medical_diary_id = $MedicalDiaryDays->medical_diary_id;
                $Subsittute->medical_status_id = 1;
                $Subsittute->start_hour = $MedicalDiaryDays->start_hour;
                $Subsittute->finish_hour = $MedicalDiaryDays->finish_hour;
                $Subsittute->save();
            }
        } else if ($request->status_id) {
            $MedicalDiaryDays->medical_status_id = $request->status_id;
        }
        $MedicalDiaryDays->save();


        return response()->json([
            'status' => true,
            'message' => 'Estado actualizado exitosamente',
            'data' => ['medical_diary_days' => $MedicalDiaryDays]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $MedicalDiaryDays = MedicalDiaryDays::where('id', $id)
            ->with(
                'days',
                'medical_status',
                'patient.identification_type',
                'contract',
                'briefcase',
                'medical_diary.office.pavilion.flat',
                'medical_diary.assistance.user',
                'services_briefcase.manual_price.manual',
                'services_briefcase.manual_price.procedure'
            )
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Dias de agenda obtenidos exitosamente',
            'data' => ['medical_diary_days' => $MedicalDiaryDays]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MedicalDiaryDaysRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $MedicalDiaryDays = MedicalDiaryDays::find($id);
        $MedicalDiaryDays->medical_status_id = $request->state_id;
        $MedicalDiaryDays->eps_id = $request->eps_id;
        $MedicalDiaryDays->contract_id = $request->contract_id;
        $MedicalDiaryDays->briefcase_id = $request->briefcase_id;
        $MedicalDiaryDays->services_briefcase_id = $request->service_briefcase_id;
        $MedicalDiaryDays->patient_id = $request->patient_id;
        $MedicalDiaryDays->save();

        return response()->json([
            'status' => true,
            'message' => 'Dia de agenda actualizados exitosamente',
            'data' => ['medical_diary_days' => $MedicalDiaryDays->get()->toArray()]
        ]);
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
            $MedicalDiaryDays = MedicalDiaryDays::find($id);
            $MedicalDiaryDays->delete();

            return response()->json([
                'status' => true,
                'message' => 'Dia de agenda eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Dia de agenda esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
