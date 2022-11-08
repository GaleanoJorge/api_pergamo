<?php

namespace App\Http\Controllers\Management;

use App\Models\DashboardRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DashboardRoleRequest;
use Illuminate\Database\QueryException;

class DashboardRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $DashboardRole = DashboardRole::with(
            'dashboard', 
            'role',
        );

        if ($request->_sort) {
            $DashboardRole->orderBy($request->_sort, $request->_order);
        }

        if ($request->dashboard_id) {
            $DashboardRole->where('dashboard_id', $request->dashboard_id);
        }
        if ($request->role_id) {
            $DashboardRole->where('role_id', $request->role_id);
        }

        if ($request->query("pagination", true) == "false") {
            $DashboardRole = $DashboardRole->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $DashboardRole = $DashboardRole->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Plato de menú de dietas obtenidas exitosamente',
            'data' => ['dashboard_role' => $DashboardRole]
        ]);
    }

    public function getByRoleId(Request $request, int $role_id): JsonResponse
    {
        $DashboardRole = DashboardRole::with(
            'dashboard', 
            'role',
        )
            ->where('role_id', $role_id);

        if ($request->query("pagination", true) == "false") {
            $DashboardRole = $DashboardRole->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $DashboardRole = $DashboardRole->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Plato de menú de dietas obtenidas exitosamente',
            'data' => ['dashboard_role' => $DashboardRole]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $components = json_decode($request->dashboard_id);

        foreach ($components as $conponent) {
            $DashboardRole = new DashboardRole;
            $DashboardRole->role_id = $request->diet_menu_id;
            $DashboardRole->dashboard_id = $conponent;

            $DashboardRole->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Plato de menú de dietas creadas exitosamente',
            'data' => ['dashboard_role' => $DashboardRole->toArray()]
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
        $DashboardRole = DashboardRole::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Plato de menú de dietas obtenidas exitosamente',
            'data' => ['dashboard_role' => $DashboardRole]
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
        $DashboardRoleDelete = DashboardRole::where('role_id', $id);
        $DashboardRoleDelete->delete();
        $components = json_decode($request->dashboard_id);

        foreach ($components as $conponent) {
            $DashboardRole = new DashboardRole;
            $DashboardRole->dashboard_id = $id;
            $DashboardRole->role_id = $conponent;

            $DashboardRole->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Plato de menú de dietas actualizadas exitosamente',
            'data' => ['dashboard_role' => $DashboardRole]
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
            $DashboardRoleDelete = DashboardRole::where('diet_menu_id', $id);
            $DashboardRoleDelete->delete();
            return response()->json([
                'status' => true,
                'message' => 'Plato de menú de dietas eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Plato de menú de dietas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
