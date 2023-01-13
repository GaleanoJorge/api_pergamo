<?php

namespace App\Http\Controllers\Management;

use App\Models\Assistance;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AssistanceRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

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
    public function getAssistanceUsers(Request $request): JsonResponse
    {
        $assistances = DB::table('assistance')
        ->join('users','users.id','=','assistance.user_id')
        ->select('users.*')
        ->get();
        return response()->json([
            'status' => true,
            'message' => 'Médicos asistentes obtenidos correctamente',
            'data' => ['assistances' => $assistances->toArray()]
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
