<?php

namespace App\Http\Controllers\Management;

use App\Models\Authorization;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorizationRequest;
use App\Models\AuthLog;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;


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
            ->leftjoin('users', 'admissions.user_id', 'users.id')
            ->leftjoin('procedure','authorization.procedure_id', 'procedure.id')
            ->select(
                'authorization.*',
                'users.identification_type_id',
                'users.identification',
                'users.email',
                'users.residence_address',
                'users.residence_municipality_id',
                'users.neighborhood_or_residence_id',
                \DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo')
            );
        if ($type == 1) {
            if ($statusId == 0) {
                $Authorization->where('auth_status_id', 3)
                    ->orwhere('auth_status_id', 4)
                    ->with('admissions', 'identification_type', 'procedure', 'auth_status', 'residence_municipality', 'residence',);
            } else {
                $Authorization->where('auth_status_id', $statusId)
                    ->with('admissions', 'identification_type', 'procedure', 'auth_status', 'residence_municipality', 'residence',);
            }
        } else {
            if ($statusId == 0) {
                $Authorization->where('auth_status_id', '!=', 3)
                    ->where('auth_status_id', '!=', 4)
                    ->with('admissions', 'identification_type', 'procedure', 'auth_status', 'residence_municipality', 'residence',);
            } else {
                $Authorization->where('auth_status_id', $statusId)
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

        return response()->json([
            'status' => true,
            'message' => 'Estados de glosas obtenidos exitosamente',
            'data' => ['authorization' => $Authorization]
        ]);
    }

    public function store(AuthorizationRequest $request): JsonResponse
    {
        $Authorization = new Authorization;
        $Authorization->name = $request->name;
        $Authorization->code = $request->code;

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
        if ($request->auth_number) {

            $Authorization->auth_number = $request->auth_number;
            $Authorization->auth_status_id = 3;
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
