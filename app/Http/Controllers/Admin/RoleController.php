<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleUserRequest;
use Illuminate\Database\QueryException;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $roles = Role::select('role.*')->with('status', 'role_type')
            ->orderBy('role.name', 'asc')
            ->groupBy('role.id');

        if ($request->id) {
            $roles->where('id', $request->id);
        }

        if ($request->status_id) {
            $roles->where('role.status_id', $request->status_id);
        }

        if ($request->role_type_id) {
            $roles->where('role.role_type_id', $request->role_type_id);
        }

        if ($request->search) {
            $roles->where(function ($query) use ($request) {
                $query->where('role.name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->role_type_id) {
            $roles->where('role.role_type_id', $request->role_type_id);
        }

        if ($request->query("pagination", true) == "false") {
            $roles = $roles->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $roles = $roles->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Roles obtenidos exitosamente',
            'data' => ['roles' => $roles]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleRequest $request
     * @return JsonResponse
     */
    public function store(RoleRequest $request): JsonResponse
    {
        $role = new Role;
        $role->status_id = $request->estado;
        $role->role_type_id = $request->tipo;
        $role->name = $request->nombre;
        $role->save();

        return response()->json([
            'status' => true,
            'message' => 'Rol creado exitosamente',
            'data' => ['role' => $role->toArray()]
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
        $role = Role::where('id', $id)->with('status')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Rol obtenido exitosamente',
            'data' => ['role' => $role]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoleRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(RoleRequest $request, int $id): JsonResponse
    {
        $role = Role::find($id);
        $role->status_id = $request->estado;
        $role->role_type_id = $request->tipo;
        $role->name = $request->nombre;
        $role->save();

        return response()->json([
            'status' => true,
            'message' => 'Rol actualizado exitosamente',
            'data' => ['role' => $role]
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
            $role = Role::find($id);
            $role->delete();

            return response()->json([
                'status' => true,
                'message' => 'Rol eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El rol está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }

    /**
     * Get users by role id
     *
     * @param integer $roleId
     * @return JsonResponse
     */
    public function getUserByRole(int $roleId): JsonResponse
    {
        $usersRole = UserRole::where('role_id', $roleId)
            ->with('user')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Usuarios por Rol obtenido exitosamente',
            'data' => ['usersRole' => $usersRole]
        ]);
    }

    /**
     * Add role to user
     *
     * @param RoleUserRequest $request
     * @return JsonResponse
     */
    public function addRoleToUser(RoleUserRequest $request): JsonResponse
    {
        $exist = UserRole::where([
            ['user_id', $request->usuario],
            ['role_id', $request->rol],
        ])->get()->count();

        if ($exist) {
            throw new Exception("El usuario ya tiene asignado ese rol", 423);
        }

        $userRole = new UserRole;
        $userRole->user_id = $request->usuario;
        $userRole->role_id = $request->rol;
        $userRole->save();

        return response()->json([
            'status' => true,
            'message' => 'El rol se asignó al usuario exitosamente',
            'data' => ['userRole' => $userRole]
        ]);
    }

    /**
     * Delete role to user
     *
     * @param integer $roleId
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteRoleToUser(int $roleId, Request $request): JsonResponse
    {
        try {
            $userRole = UserRole::where([
                ['user_id', $request->usuario],
                ['role_id', $roleId],
            ]);

            if (!$userRole->get()->count()) {
                throw new Exception("El usuario no tiene asignado ese rol", 423);
            }

            $userRole->delete();

            return response()->json([
                'status' => true,
                'message' => 'El rol se eliminó al usuario exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El rol con ese usuario está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
