<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $permissions = Permission::orderBy('name', 'asc')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Permisos obtenidos exitosamente',
            'data' => ['permissions' => $permissions]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $permission = Permission::where('id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Permisos obtenido exitosamente',
            'data' => ['permission' => $permission]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PermissionRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(PermissionRequest $request, int $id): JsonResponse
    {
        $permission = Permission::find($id);
        $permission->name = $request->nombre;
        $permission->class = $request->clase;
        $permission->icon = $request->icono;
        $permission->save();

        return response()->json([
            'status' => true,
            'message' => 'Permiso actualizado exitosamente',
            'data' => ['permission' => $permission]
        ]);
    }
}
