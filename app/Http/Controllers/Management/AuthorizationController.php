<?php

namespace App\Http\Controllers\Management;

use App\Models\Authorization;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorizationRequest;
use App\Models\AuthLog;
use App\Models\Briefcase;
use App\Models\ManagementPlan;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

require('ManagementPlanController.php');


class AuthorizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Authorization = Authorization::select();

        if ($request->_sort) {
            $Authorization->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Authorization->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $Authorization = $Authorization->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Authorization = $Authorization->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Estados de glosas obtenidos exitosamente',
            'data' => ['authorization' => $Authorization]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function InProcess(Request $request, int $statusId): JsonResponse
    {
        $Authorization = Authorization::leftjoin('admissions', 'authorization.admissions_id', 'admissions.id')
            ->leftjoin('patients', 'admissions.patient_id', 'patients.id')
            ->leftjoin('briefcase', 'admissions.briefcase_id', 'briefcase.id')
            ->leftjoin('services_briefcase', 'authorization.services_briefcase_id', 'services_briefcase.id')
            ->leftjoin('manual_price', 'services_briefcase.manual_price_id', 'manual_price.id')
            ->select(
                'authorization.*',
                // 'briefcase.type_auth',
                // 'patients.identification_type_id',
                // 'patients.identification',
                // 'patients.email',
                // 'patients.residence_address',
                // 'patients.residence_municipality_id',
                // 'patients.neighborhood_or_residence_id',
                DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo'),
                DB::raw('DATE(authorization.created_at) as date'),
            )
            ->wherenull('auth_package_id')
            ->with(
                'admissions',
                'admissions.patients',
                'admissions.patients.identification_type',
                'admissions.patients.status',
                'admissions.patients.gender',
                'admissions.patients.inability',
                'admissions.patients.academic_level',
                'assigned_management_plan',
                'services_briefcase',
                'services_briefcase.manual_price',
                'auth_status',
            );

        if ($statusId == 0) {
            $Authorization->where(function ($query) use ($request){
                $query->where('auth_status_id', '<', 3)
                    ->orWhereNotNull('application_id');
            });
        } else {
            $Authorization
                ->where('auth_status_id', $statusId);
        }


        if ($request->eps_id != 'null' && isset($request->eps_id)) {
            $Authorization
                ->leftjoin('contract', 'briefcase.contract_id', 'contract.id')
                ->where('contract.company_id', $request->eps_id);
        }

        if ($request->contract_id != 'null' && isset($request->contract_id)) {
            $Authorization
                ->where('contract.id', $request->contract_id);
        }

        if ($request->briefcase_id != 'null' && isset($request->briefcase_id)) {
            $Authorization
                ->where('briefcase.id', $request->briefcase_id);
        }

        if ($request->admissions_id != 'null' && isset($request->admissions_id)) {
            $Authorization
                ->where('admissions.id', $request->admissions_id);
        }

        if ($request->initial_date != 'null' && isset($request->initial_date)) {
            $init_date = Carbon::parse($request->initial_date);

            $Authorization
                ->where('authorization.created_at', '>=', $init_date);
        }

        if ($request->final_date != 'null' && isset($request->final_date)) {
            $finish_date = new DateTime($request->final_date.'T23:59:59.9');
            $Authorization->where('authorization.created_at', '<=', $finish_date);
        }

        if ($request->_sort) {
            $Authorization->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Authorization->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%')
                    ->orWhere('auth_number', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('manual_price.name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $Authorization = $Authorization->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $Authorization = $Authorization->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Autorizaciones obtenidas exitosamente',
            'data' => ['authorization' => $Authorization]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function InHistoric(Request $request, int $statusId): JsonResponse
    {
        $Authorization = Authorization::leftjoin('admissions', 'authorization.admissions_id', 'admissions.id')
            ->leftjoin('patients', 'admissions.patient_id', 'patients.id')
            ->leftjoin('briefcase', 'admissions.briefcase_id', 'briefcase.id')
            ->leftjoin('services_briefcase', 'authorization.services_briefcase_id', 'services_briefcase.id')
            ->select(
                'authorization.*',
                'briefcase.type_auth',
                'patients.identification_type_id',
                'patients.identification',
                'patients.email',
                'patients.residence_address',
                'patients.residence_municipality_id',
                'patients.neighborhood_or_residence_id',
                DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')
            )
            ->with(
                'assigned_management_plan',
                'admissions',
                'services_briefcase',
                'auth_status',
            );

        if ($statusId == 0) {
            $Authorization->where('auth_status_id', 3)
                ->orwhere('auth_status_id', 4);
        } else {
            $Authorization->where('auth_status_id', $statusId);
        }
        // if ($type == 1) {
        // } else {
        // if ($statusId == 0) {
        //     $Authorization
        //         // ->leftjoin('management_plan', 'management_plan.authorization_id', 'authorization.id')
        //         ->where('auth_status_id', '<', 3)
        //         ->with(
        //             'admissions',
        //             'management_plan',
        //             'identification_type',
        //             'services_briefcase',
        //             'services_briefcase.manual_price',
        //             'auth_status',
        //             'residence_municipality',
        //             'residence'
        //         );
        // } else {
        //     $Authorization
        //         // ->leftjoin('management_plan', 'management_plan.authorization_id', 'authorization.id')
        //         ->where('auth_status_id', $statusId)
        //         ->with(
        //             'admissions',
        //             'identification_type',
        //             'services_briefcase',
        //             'services_briefcase.manual_price',
        //             'auth_status',
        //             'residence_municipality',
        //             'residence'
        //         );
        // }
        // }

        if ($request->eps_id) {
            $Authorization
                ->leftjoin('contract', 'briefcase.contract_id', 'contract.id')
                ->where('company_id', $request->eps_id);
        }

        if ($request->_sort) {
            $Authorization->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Authorization->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%')
                    ->orWhere('auth_number', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $Authorization = $Authorization->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Authorization = $Authorization->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Historico de autorizciones obtenido exitosamente',
            'data' => ['authorization' => $Authorization]
        ]);
        // if ($type == 1) {
        // } else {
        //     return response()->json([
        //         'status' => true,
        //         'message' => 'Autorizaciones obtenidas exitosamente',
        //         'data' => ['authorization' => $Authorization]
        //     ]);
        // }
    }

    /**
     * Get authorizations by open admissions .
     * 
     * @param int admissions_id
     * @return jsonResponse
     */
    public function GetByAdmissions(Request $request, int $admissionsId): JsonResponse
    {
        $Authorization = Authorization::where('admissions_id', $admissionsId)
            ->leftjoin('admissions', 'authorization.admissions_id', 'admissions.id')
            ->leftjoin('patients', 'admissions.patient_id', 'patients.id')
            ->leftjoin('briefcase', 'admissions.briefcase_id', 'briefcase.id')
            ->leftjoin('services_briefcase', 'authorization.services_briefcase_id', 'services_briefcase.id')
            ->select(
                'authorization.*',
                'briefcase.type_auth',
                'patients.identification_type_id',
                'patients.identification',
                'patients.email',
                'patients.residence_address',
                'patients.residence_municipality_id',
                'patients.neighborhood_or_residence_id',
                DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')
            )
            ->with(
                'admissions',
                'assigned_management_plan',
                'identification_type',
                'services_briefcase',
                'services_briefcase.manual_price',
                'auth_status',
                'residence_municipality',
                'residence'
            )
            ->where('auth_status_id', '<', 3);


        if ($request->edit) {
            $Authorization
                ->where(function ($query) use ($request) {
                    $query->where('auth_package_id', $request->id)
                        ->orWhere('auth_package_id', null)
                        ->whereNotNull('authorization.assigned_management_plan_id');
                });
        };

        if ($request->view) {
            $Authorization->where('auth_package_id', $request->id);
        };

        if ($request->_sort) {
            $Authorization->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Authorization->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%')
                    ->orWhere('auth_number', 'like', '%' . $request->search . '%');
            });
        }



        if ($request->query("pagination", true) == "false") {
            $Authorization = $Authorization->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $Authorization = $Authorization->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Historico de autorizciones obtenido exitosamente',
            'data' => ['authorization' => $Authorization]
        ]);
    }


    public function store(AuthorizationRequest $request): JsonResponse
    {
        $Authorization = new Authorization;
        $Authorization->services_briefcase_id =  $request->services_briefcase_id;
        $Authorization->admissions_id =  $request->id;
        $validate = Briefcase::select('briefcase.*')->where('id',  $request->briefcase_id)->first();
        if ($validate->type_auth == 1) {
            $Authorization->auth_status_id =  2;
        } else {
            $Authorization->auth_status_id =  1;
        }

        $Authorization->save();

        return response()->json([
            'status' => true,
            'message' => 'Estados de glosas creados exitosamente',
            'data' => ['authorization' => $Authorization->toArray()]
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
        $Authorization = Authorization::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Estados de glosas obtenidos exitosamente',
            'data' => ['authorization' => $Authorization]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AuthorizationRequest $request, int $id): JsonResponse
    {
        $Authorization = Authorization::find($id);

        if ($request->auth_number && $request->authorized_amount) {
            // autorizado por pre
            $Authorization->auth_number = $request->auth_number;
            $Authorization->authorized_amount = $request->authorized_amount;
            $Authorization->auth_status_id = 3;
        } else if ($request->auth_number) {
            // autorizado por post
            $Authorization->auth_number = $request->auth_number;
            $Authorization->auth_status_id = 3;
        } else if ($request->observation) {

            $Authorization->observation = $request->observation;
            $Authorization->auth_status_id = 4;
        } else {

            $Authorization->auth_status_id = $request->auth_status_id;
        }

        $Authorization->save();

        $auth_log = new AuthLog;

        $auth_log->current_status_id = $Authorization->auth_status_id;
        $auth_log->authorization_id = $Authorization->id;
        $auth_log->user_id = Auth::user()->id;

        $auth_log->save();



        return response()->json([
            'status' => true,
            'message' => 'Estado de autorización actualizado exitosamente',
            'data' => ['authorization' => $Authorization]
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
            $Authorization = Authorization::find($id);
            $Authorization->delete();

            return response()->json([
                'status' => true,
                'message' => 'Estados de glosas eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Estados de glosas estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
