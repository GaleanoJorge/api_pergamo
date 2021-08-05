<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\JsonResponse;
use App\Models\UserCampus;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class UserCampusController extends Controller
{
    /**
     * Display a listing of the resource by role id
     *
     * @param integer $roleId
     * @return JsonResponse
     */
    public function getByUser(int $userId): JsonResponse
    {
        $campus = UserCampus::where('user_id', $userId)
            ->with('campus')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Campus por usuario obtenidos exitosamente',
            'data' => ['campus' => $campus]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ItemRolePermissionRequest $request
     * @return JsonResponse
     */
    public function store(ItemRolePermissionRequest $request): JsonResponse
    {
        $exist = ItemRolePermission::where([
            ['item_id', $request->item],
            ['role_id', $request->rol],
            ['permission_id', $request->permiso]
        ])->get()->count();

        if ($exist) {
            throw new Exception("El permiso en el item ya existe para ese rol", 423);
        }

        $itemRolePermission = new ItemRolePermission;
        $itemRolePermission->item_id = $request->item;
        $itemRolePermission->role_id = $request->rol;
        $itemRolePermission->permission_id = $request->permiso;
        $itemRolePermission->save();

        return response()->json([
            'status' => true,
            'message' => 'Permiso del rol en el item creado exitosamente',
            'data' => ['itemRolePermission' => $itemRolePermission->toArray()]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $itemRolePermission = ItemRolePermission::find($id);
            $itemRolePermission->delete();

            return response()->json([
                'status' => true,
                'message' => 'Permiso del rol en el item eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El permiso del rol en el item está en uso, no es posible eliminarlo',
            ], 423);
        }
    }
}
