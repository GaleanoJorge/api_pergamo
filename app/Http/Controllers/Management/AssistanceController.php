<?php

namespace App\Http\Controllers\Management;

use App\Models\Assistance;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AssistanceRequest;
use App\Models\Base\MedicalDiary;
use App\Models\Base\Bed;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use App\Models\User;

class AssistanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $startDate = Carbon::now()->startOfMonth()->format('Ymd');
        $endDate = Carbon::now()->endOfMonth()->format('Ymd');

        $Assistance = Assistance::with(
            'user',
            'user.identification_type',
            'special_field'
        )
            ->leftJoin('users', 'users.id', '=', 'assistance.user_id')
            ->leftJoin('user_role', 'user_role.user_id', '=', 'assistance.user_id')
            ->leftJoin('location_capacity', 'location_capacity.assistance_id', '=', 'assistance.id')
            ->leftJoin('locality', 'locality.id', '=', 'location_capacity.locality_id')
            ->leftJoin('role', 'role.id', '=', 'user_role.role_id')
            ->select(
                'assistance.*',
                DB::raw(
                    "SUM(IF(location_capacity.validation_date <= " . $endDate . ",IF(" . $startDate . "<=location_capacity.validation_date,location_capacity.PAD_patient_quantity,0),0)) AS total1"
                ),
                DB::raw(
                    "SUM(IF(location_capacity.validation_date <= " . $endDate . ",IF(" . $startDate . "<=location_capacity.validation_date,location_capacity.PAD_patient_actual_capacity,0),0)) AS total2"
                ),
                DB::raw(
                    "SUM(IF(location_capacity.validation_date <= " . $endDate . ",IF(" . $startDate . "<=location_capacity.validation_date,location_capacity.PAD_patient_attended,0),0)) AS total3"
                ),
                'role.name as role_name',
                DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo'),
            )
            ->groupBy('assistance.id');

        if ($request->_sort) {
            $Assistance->orderBy($request->_sort, $request->_order);
        }

        if ($request->status_id) {
            $Assistance->where('users.status_id', $request->status_id);
        }

        if ($request->role_id) {
            $Assistance->where('role.id', $request->role_id);
        }

        if ($request->id) {
            $Assistance->where('assistance.id', $request->id);
        }

        if ($request->search) {
            if (str_contains($request->search, ' ')) {
                $spl = explode(' ', $request->search);
                foreach ($spl as $element) {
                    $Assistance->where('users.identification', 'like', '%' . $element . '%')
                        ->orWhere('users.firstname', 'like', '%' . $element . '%')
                        ->orWhere('users.middlefirstname', 'like', '%' . $element . '%')
                        ->orWhere('users.lastname', 'like', '%' . $element . '%')
                        ->Having('nombre_completo', 'like', '%' . $element . '%')
                        ->orWhere('users.middlelastname', 'like', '%' . $element . '%')
                        ->orWhere('role.name', 'like', '%' . $request->search . '%')
                        ->orWhere('locality.name', 'like', '%' . $request->search . '%');
                }
            } else {
                $Assistance->where(function ($query) use ($request) {
                    $query->where('users.identification', 'like', '%' . $request->search . '%')
                        ->orWhere('users.firstname', 'like', '%' . $request->search . '%')
                        ->orWhere('users.middlefirstname', 'like', '%' . $request->search . '%')
                        ->orWhere('users.lastname', 'like', '%' . $request->search . '%')
                        ->Having('nombre_completo', 'like', '%' . $request->search . '%')
                        ->orWhere('users.middlelastname', 'like', '%' . $request->search . '%')
                        ->orWhere('role.name', 'like', '%' . $request->search . '%')
                        ->orWhere('locality.name', 'like', '%' . $request->search . '%');
                });
            }
        }

        if ($request->query("pagination", true) == "false") {
            $Assistance = $Assistance->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Assistance = $Assistance->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Personal Asistencial obtenido exitosamente',
            'data' => ['assistance' => $Assistance]
        ]);
    }

    /**
     * Get every user that's assistance
     * @return \Illuminate\Http\Response
     */
    public function getExternalAssistanceUsers(Request $request): JsonResponse
    {
        $assistances = DB::table('assistance')
            ->join('users', 'users.id', '=', 'assistance.user_id')
            ->where('assistance.attends_external_consultation', '=', 1)
            ->select('users.*')
            ->get();
        return response()->json([
            'status' => true,
            'message' => 'Médicos asistentes obtenidos correctamente',
            'data' => ['assistances' => $assistances->toArray()]
        ]);
    }

    public function getExternalAssistanceUsersTransfer(Request $request)
    {
        $userId = $request->userId;
        $startDate = $request->startDate;
        $finishDate = $request->finishDate;
        $procedureId = $request->procedure_id;
        $baseQueryMedicalDiaryDays = DB::table('users')
            ->join('assistance', 'assistance.user_id', '=', 'users.id')
            ->join('assistance_procedure', 'assistance_procedure.assistance_id', '=', 'assistance.id')
            ->join('medical_diary', 'medical_diary.assistance_id', '=', 'assistance.id')
            ->join('medical_diary_days', 'medical_diary_days.medical_diary_id', '=', 'medical_diary.id')
            ->join('medical_status', 'medical_diary_days.medical_status_id', '=', 'medical_status.id')
            ->where('assistance_procedure.procedure_id', '=', $procedureId)
            ->where('assistance.attends_external_consultation', '=', 1);
        $baseQueryUserDates = (clone $baseQueryMedicalDiaryDays)->whereIn('medical_status.id', [2, 3, 4])->where('users.id', '=', $userId)
            ->where('medical_diary_days.start_hour', '>=', $startDate)
            ->where('medical_diary_days.finish_hour', '<=', $finishDate);
        $startHoursOrigin = (clone $baseQueryUserDates)->select(('medical_diary_days.start_hour'))->get()->toArray();
        $startHoursOrigin = array_column($startHoursOrigin, 'start_hour');
        $finishHoursOrigin = (clone $baseQueryUserDates)->select(('medical_diary_days.finish_hour'))->get()->toArray();
        $finishHoursOrigin = array_column($finishHoursOrigin, 'finish_hour');

        $baseQueryFilter = (clone $baseQueryMedicalDiaryDays)->where('users.id', '!=', $userId);
        $queryDate = (count($startHoursOrigin) > 0) ? ', COUNT(CASE WHEN medical_status.id NOT IN (2, 3, 4) OR (' : '';
        for ($i = 0; $i < count($startHoursOrigin); $i++) {
            //$queryDate .= "(medical_diary_days.start_hour < '" . $startHoursOrigin[$i] . "' OR medical_diary_days.start_hour >= '" . $finishHoursOrigin[$i] . "') AND ";
            $queryDate .= "(medical_diary_days.start_hour >= '" . $finishHoursOrigin[$i] . "' OR ";
            $queryDate .= "medical_diary_days.finish_hour <= '" . $startHoursOrigin[$i] . "') AND ";
        }
        $queryDate = substr($queryDate, 0, strlen($queryDate) - 5);
        $queryDate .= (count($startHoursOrigin) > 0) ? ') THEN 1 END) as NOT_CONFLICT_COUNT' : '';
        $baseQueryFilter = $baseQueryFilter->groupBy('users.id')
            ->select(
                'users.*',
                DB::raw('COUNT(medical_diary_days.id) as MEDICAL_DIARY_COUNT ' . (($queryDate == '') ? ', COUNT(medical_diary_days.id) as NOT_CONFLICT_COUNT' : $queryDate)),
            )
            ->havingRaw('MEDICAL_DIARY_COUNT = NOT_CONFLICT_COUNT')
            ->get();

        $assistancesResult = $baseQueryFilter->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Médicos asistentes obtenidos correctamente',
            'data' => ['assistances' => $assistancesResult]
        ]);
    }

    private function isConflictTransfer($userIdOrigin, $userIdFinal, $startDate, $finishDate, $procedureId)
    {
        $baseQueryMedicalDiaryDays = DB::table('users')
            ->join('assistance', 'assistance.user_id', '=', 'users.id')
            ->join('assistance_procedure', 'assistance_procedure.assistance_id', '=', 'assistance.id')
            ->join('medical_diary', 'medical_diary.assistance_id', '=', 'assistance.id')
            ->join('medical_diary_days', 'medical_diary_days.medical_diary_id', '=', 'medical_diary.id')
            ->join('medical_status', 'medical_diary_days.medical_status_id', '=', 'medical_status.id')
            ->where('assistance_procedure.procedure_id', '=', $procedureId)
            ->where('assistance.attends_external_consultation', '=', 1)
            ->whereIn('medical_status.id', [2, 3, 4]);
        $baseQueryUserDates = (clone $baseQueryMedicalDiaryDays)->where('users.id', '=', $userIdOrigin)
            ->where('medical_diary_days.start_hour', '>=', $startDate)
            ->where('medical_diary_days.finish_hour', '<=', $finishDate);
        $startHoursOrigin = (clone $baseQueryUserDates)->select(('medical_diary_days.start_hour'))->get()->toArray();
        $startHoursOrigin = array_column($startHoursOrigin, 'start_hour');

        $finishHoursOrigin = (clone $baseQueryUserDates)->select(('medical_diary_days.finish_hour'))->get()->toArray();
        $finishHoursOrigin = array_column($finishHoursOrigin, 'finish_hour');
        $baseQueryFilter = (clone $baseQueryMedicalDiaryDays)->where('users.id', '=', $userIdFinal)
            ->where('medical_diary_days.start_hour', '>=', $startDate)
            ->where('medical_diary_days.finish_hour', '<=', $finishDate);
        $baseQueryFilter = $baseQueryFilter->select(['*']);
        $stringQuery = "(";
        for ($i = 0; $i < count($startHoursOrigin); $i++) {
            $stringQuery .= '(medical_diary_days.start_hour >= "' . $startHoursOrigin[$i] . '" AND ' . 'medical_diary_days.start_hour < "' . $finishHoursOrigin[$i] . '") OR ';
        }
        $stringQuery = substr($stringQuery, 0, strlen($stringQuery) - 4);
        $stringQuery .= ')';
        if (count($startHoursOrigin) > 0) {
            $baseQueryFilter = $baseQueryFilter->whereRaw($stringQuery);
        }

        if (count($baseQueryFilter->get()->toArray()) > 0) {
            return true;
        }
        return false;
    }

    public function transferSchedule(Request $request)
    {
        $userIdOrigin = $request->userIdOrigin;
        $userIdFinal = $request->userIdFinal;
        $startDate = $request->startDate;
        $finishDate = $request->finishDate;
        $campusId = $request->campusId;
        $flatId = $request->flatId;
        $pavilionId = $request->pavilionId;
        $officeId = $request->officeId;
        $procedureId = $request->procedureId;
        if ($this->isConflictTransfer($userIdOrigin, $userIdFinal, $startDate, $finishDate, $procedureId)) {
            return response()->json([
                'status' => false,
                'message' => 'Hay conflictos en la agenda'
            ], 409);
        }

        $medicalDiaryToUpdate = DB::table('users')
            ->join('assistance', 'assistance.user_id', '=', 'users.id')
            ->join('medical_diary', 'medical_diary.assistance_id', '=', 'assistance.id')
            ->join('medical_diary_days', 'medical_diary_days.medical_diary_id', '=', 'medical_diary.id')
            ->join('medical_status', 'medical_diary_days.medical_status_id', '=', 'medical_status.id')
            ->whereNotIn('medical_status.id', [5])
            ->where('users.id', '=', $userIdOrigin)
            ->where('medical_diary_days.start_hour', '>=', $startDate)
            ->where('medical_diary_days.finish_hour', '<=', $finishDate)
            ->orderBy('medical_diary_days.start_hour', 'asc')
            ->groupBy('medical_diary.id')
            ->select('medical_diary.*')
            ->get()
            ->toArray();

        $medicalDiaryDaysToTransfer = DB::table('users')
            ->join('assistance', 'assistance.user_id', '=', 'users.id')
            ->join('medical_diary', 'medical_diary.assistance_id', '=', 'assistance.id')
            ->join('medical_diary_days', 'medical_diary_days.medical_diary_id', '=', 'medical_diary.id')
            ->join('medical_status', 'medical_diary_days.medical_status_id', '=', 'medical_status.id')
            ->whereNotIn('medical_status.id', [5])
            ->where('users.id', '=', $userIdOrigin)
            ->where('medical_diary_days.start_hour', '>=', $startDate)
            ->where('medical_diary_days.finish_hour', '<=', $finishDate)
            ->orderBy('medical_diary_days.start_hour', 'asc')
            ->select('medical_diary_days.*');

        if (count($medicalDiaryDaysToTransfer->get()) == 0) {
            return response()->json([
                'status' => true,
                'message' => 'No hay nada por transferir'
            ]);
        }

        $medicalDiaryDaysToTransferConverted = $medicalDiaryDaysToTransfer->get();

        $assistanceId = DB::table('users')
            ->join('assistance', 'assistance.user_id', '=', 'users.id')
            ->where('assistance.user_id', '=', $userIdFinal)
            ->select('assistance.id')
            ->get()
            ->toArray()[0]
            ->id;

        $newMedicalDiary = new MedicalDiary;
        $newMedicalDiary->assistance_id = $assistanceId;
        $newMedicalDiary->campus_id = $campusId;
        $newMedicalDiary->flat_id = $flatId;
        $newMedicalDiary->pavilion_id = $pavilionId;
        $newMedicalDiary->procedure_id = $procedureId;
        $newMedicalDiary->office_id = $officeId;
        $bed = Bed::find($officeId);
        $bed->status_bed_id = 2;
        $bed->save();
        $newMedicalDiary->diary_status_id = 1;
        $newMedicalDiary->created_at = date("Y-m-d h:i:s");
        $newMedicalDiary->updated_at = date("Y-m-d h:i:s");
        $newMedicalDiary->start_time = explode(" ", $medicalDiaryDaysToTransferConverted[0]->start_hour)[1];
        $newMedicalDiary->finish_time = explode(" ", $medicalDiaryDaysToTransferConverted[count($medicalDiaryDaysToTransferConverted) - 1]->finish_hour)[1];
        $newMedicalDiary->start_date = explode(" ", $medicalDiaryDaysToTransferConverted[0]->start_hour)[0];
        $newMedicalDiary->finish_date = explode(" ", $medicalDiaryDaysToTransferConverted[count($medicalDiaryDaysToTransferConverted) - 1]->finish_hour)[0];
        $newMedicalDiary->interval = Carbon::parse($medicalDiaryDaysToTransferConverted[0]->finish_hour);
        $newMedicalDiary->interval = $newMedicalDiary->interval->diffInMinutes(date($medicalDiaryDaysToTransferConverted[0]->start_hour));

        $newMedicalDiary->save();

        $medicalDiaryDaysToTransfer->update(['medical_diary_id' => $newMedicalDiary->id]);

        $medicalDiaryIds = array_column($medicalDiaryToUpdate, 'id');
        $medicalDiaryToUpdate = DB::table('medical_diary')
            ->leftJoin('medical_diary_days', 'medical_diary_days.medical_diary_id', '=', 'medical_diary.id')
            ->whereIn('medical_diary.id', $medicalDiaryIds)
            ->whereNull('medical_diary_days.id');

        DB::table('medical_diary')
            ->leftJoin('medical_diary_days', 'medical_diary_days.medical_diary_id', '=', 'medical_diary.id')
            ->join('bed', 'medical_diary.office_id', '=', 'bed.id')
            ->whereIn('medical_diary.id', $medicalDiaryIds)
            ->whereNull('medical_diary_days.id')
            ->update(['bed.status_bed_id' => 1]);

        $medicalDiaryToUpdate->update(['medical_diary.diary_status_id' => 2]);

        return response()->json([
            'status' => true,
            'message' => 'Transferencia de agenda realizada correctamente'
        ]);
    }

    public function store(AssistanceRequest $request): JsonResponse
    {
        $Assistance = new Assistance;
        $Assistance->user_id = $request->user_id;
        $Assistance->medical_record = $request->medical_record;
        $Assistance->contract_type_id = $request->contract_type_id;
        $Assistance->has_car = $request->has_car;
        $Assistance->PAD_service = $request->PAD_service;
        $Assistance->medium_signature_file_id = $request->medium_signature_file_id;
        $Assistance->attends_external_consultation = $request->attends_external_consultation;
        $Assistance->serve_multiple_patients = $request->serve_multiple_patients;
        $Assistance->special_field_id = $request->special_field_id;
        $Assistance->save();

        return response()->json([
            'status' => true,
            'message' => 'Personal Asistencial creada exitosamente',
            'data' => ['assistance' => $Assistance->toArray()]
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
        $Assistance = Assistance::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Personal Asistencial obtenido exitosamente',
            'data' => ['assistance' => $Assistance]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AssistanceRequest $request, int $id): JsonResponse
    {
        $Assistance = Assistance::find($id);
        $Assistance->user_id = $request->user_id;
        $Assistance->medical_record = $request->medical_record;
        $Assistance->contract_type_id = $request->contract_type_id;
        $Assistance->has_car = $request->has_car;
        $Assistance->PAD_service = $request->PAD_service;
        $Assistance->attends_external_consultation = $request->attends_external_consultation;
        $Assistance->serve_multiple_patients = $request->serve_multiple_patients;
        $Assistance->special_field = $request->special_field;
        $Assistance->file_firm = $request->file_firm;
        $Assistance->save();

        return response()->json([
            'status' => true,
            'message' => 'Personal Asistencial actualizado exitosamente',
            'data' => ['assistance' => $Assistance]
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
            $Assistance = Assistance::find($id);
            $Assistance->delete();

            return response()->json([
                'status' => true,
                'message' => 'Personal Asistencial eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Personal Asistencial esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
