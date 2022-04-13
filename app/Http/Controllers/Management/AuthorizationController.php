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
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

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
    public function ByStatus(Request $request, int $type, int $statusId): JsonResponse
    {
        $Authorization = Authorization::leftjoin('admissions', 'authorization.admissions_id', 'admissions.id')
            ->leftjoin('patients', 'admissions.patient_id', 'patients.id')
            ->leftjoin('briefcase', 'admissions.briefcase_id', 'briefcase.id')
            ->leftjoin('procedure', 'authorization.procedure_id', 'procedure.id')
            ->select(
                'authorization.*',
                'briefcase.type_auth',
                'patients.identification_type_id',
                'patients.identification',
                'patients.email',
                'patients.residence_address',
                'patients.residence_municipality_id',
                'patients.neighborhood_or_residence_id',
                \DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')
            );
        if ($type == 1) {
            if ($statusId == 0) {
                $Authorization->where('auth_status_id', 3)
                    ->orwhere('auth_status_id', 4)
                    ->with('admissions', 'identification_type', 'procedure', 'auth_status', 'residence_municipality', 'residence',);
            } else {
                $Authorization->where('auth_status_id', $statusId)
                    ->with('admissions', 'briefcase', 'identification_type', 'procedure', 'auth_status', 'residence_municipality', 'residence',);
            }
        } else {
            if ($statusId == 0) {
                $Authorization
                    ->leftjoin('management_plan', 'management_plan.authorization_id', 'authorization.id')
                    ->where('auth_status_id', '<', 3)
                    ->with('admissions', 'management_plan', 'identification_type', 'procedure', 'auth_status', 'residence_municipality', 'residence',);
            } else {
                $Authorization
                    ->leftjoin('management_plan', 'management_plan.authorization_id', 'authorization.id')
                    ->where('auth_status_id', $statusId)
                    ->with('admissions', 'identification_type', 'procedure', 'auth_status', 'residence_municipality', 'residence',);
            }
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

        if ($type == 1) {
            return response()->json([
                'status' => true,
                'message' => 'Historico de autorizciones obtenido exitosamente',
                'data' => ['authorization' => $Authorization]
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Autorizaciones obtenidas exitosamente',
                'data' => ['authorization' => $Authorization]
            ]);
        }
    }

    public function store(AuthorizationRequest $request): JsonResponse
    {
        $Authorization = new Authorization;
        $Authorization->procedure_id =  $request->procedure_id;
        $Authorization->admissions_id =  $request->id;
        $validate = Briefcase::select('briefcase.*')->where('id',  $request->briefcase_id)->first();
        if ($validate->auth_type == 1) {
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

            $Authorization->auth_number = $request->auth_number;
            $Authorization->authorized_amount = $request->authorized_amount;
            $Authorization->auth_status_id = 3;
        } else if ($request->auth_number) {

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
