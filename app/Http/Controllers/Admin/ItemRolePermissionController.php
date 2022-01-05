<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\JsonResponse;
use App\Models\ItemRolePermission;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRolePermissionRequest;
use Illuminate\Database\QueryException;

class ItemRolePermissionController extends Controller
{
    /**
     * Display a listing of the resource by role id
     *
     * @param integer $roleId
     * @return JsonResponse
     */
    public function getByRole(int $roleId): JsonResponse
    {
        $itemRolePermission = ItemRolePermission::where('role_id', $roleId)
            ->with('item', 'role', 'permission')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Permisos por rol obtenidos exitosamente',
            'data' => ['itemRolePermission' => $itemRolePermission]
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
        foreach($request->item as $idItem){
        foreach($request->permission as $item){
        $exist = ItemRolePermission::where([
            ['item_id', $idItem],
            ['role_id', $request->rol],
            ['permission_id', $item]
        ])->get()->count();

        if ($exist) {
            throw new Exception("El permiso en el item ya existe para ese rol", 423);
        }

        $itemRolePermission = new ItemRolePermission;
        $itemRolePermission->item_id = $idItem;
        $itemRolePermission->role_id = $request->rol;
        $itemRolePermission->permission_id = $item;
        $itemRolePermission->save();

        }
        }

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
