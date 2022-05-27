<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedPermissionType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class FixedPermissionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FixedPermissionType = FixedPermissionType::select();

        if ($request->_sort) {
            $FixedPermissionType->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $FixedPermissionType->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $FixedPermissionType = $FixedPermissionType->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $FixedPermissionType = $FixedPermissionType->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Permiso obtenidos exitosamente',
            'data' => ['fixed_permission_type' => $FixedPermissionType]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $FixedPermissionType = new FixedPermissionType;
        $FixedPermissionType->permission_id = $request->permission_id;
        $FixedPermissionType->fixed_type_role_id = $request->fixed_type_role_id;
        $FixedPermissionType->user_id = $request->user_id;
        $FixedPermissionType->save();

        return response()->json([
            'status' => true,
            'message' => 'Permiso asociado exitosamente',
            'data' => ['fixed_permission_type' => $FixedPermissionType->toArray()]
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
        $FixedPermissionType = FixedPermissionType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Permiso obtenido exitosamente',
            'data' => ['fixed_permission_type' => $FixedPermissionType]
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
        $FixedPermissionType = FixedPermissionType::find($id);
        $FixedPermissionType->permission_id = $request->permission_id;
        $FixedPermissionType->fixed_type_role_id = $request->fixed_type_role_id;
        $FixedPermissionType->user_id = $request->user_id;
        $FixedPermissionType->save();

        return response()->json([
            'status' => true,
            'message' => 'Permiso actualizado exitosamente',
            'data' => ['fixed_permission_type' => $FixedPermissionType]
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
            $FixedPermissionType = FixedPermissionType::find($id);
            $FixedPermissionType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Permiso eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Permiso en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
