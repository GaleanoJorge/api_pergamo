<?php

namespace App\Http\Controllers\Management;

use App\Models\AssignedManagementPlan;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AssignedManagementPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $assigned_management_plan = AssignedManagementPlan::select('assigned_management_plan.*')
            ->with('user', 'management_plan');

        if ($request->_sort) {
            $assigned_management_plan->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $assigned_management_plan->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $assigned_management_plan = $assigned_management_plan->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $assigned_management_plan = $assigned_management_plan->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Areas obtenidas exitosamente',
            'data' => ['areas' => $assigned_management_plan]
        ]);
    }


    /**
     * Display a listing of the resource
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function indexPacientByManagement(Request $request, int $managementId, int $userId): JsonResponse
    {
        $assigned_management_plan = AssignedManagementPlan::select('assigned_management_plan.*')
            ->with('user', 'management_plan');
        if ($userId == 0) {
            $assigned_management_plan->where('management_plan_id', $managementId);
        } else {
            $assigned_management_plan->where('user_id', $userId);
        }

        if ($request->_sort) {
            $assigned_management_plan->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $assigned_management_plan->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $assigned_management_plan = $assigned_management_plan->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $assigned_management_plan = $assigned_management_plan->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Plan de manejo asignado exitosamente',
            'data' => ['assigned_management_plan' => $assigned_management_plan]
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $AssignedManagementPlan = new AssignedManagementPlan;
        $AssignedManagementPlan->start_date = $request->start_date;
        $AssignedManagementPlan->finish_date = $request->finish_date;
        $AssignedManagementPlan->user_id = $request->user_id;
        $AssignedManagementPlan->execution_date = $request->execution_date;
        $AssignedManagementPlan->management_plan_id = $request->management_plan_id;
        $AssignedManagementPlan->save();

        return response()->json([
            'status' => true,
            'message' => 'Plan creado exitosamente',
            'data' => ['assigned_management_plan' => $AssignedManagementPlan->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        $AssignedManagementPlan = AssignedManagementPlan::where('id', $id)
            ->get()
            ->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Plan obtenida exitosamente',
            'data' => ['assigned_management_plan' => $AssignedManagementPlan]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $AssignedManagementPlan = AssignedManagementPlan::find($id);
        if($request->type_of_attention_id==17){
        $AssignedManagementPlan->start_date = $request->start_date;
        $AssignedManagementPlan->finish_date = $request->start_date;
        $AssignedManagementPlan->user_id = $request->user_id;
        $AssignedManagementPlan->start_hour = $request->start_hour;
        $AssignedManagementPlan->finish_hour = $request->finish_hour;
        }else{
            $AssignedManagementPlan->start_date = $request->start_date;
            $AssignedManagementPlan->finish_date = $request->finish_date;
            $AssignedManagementPlan->user_id = $request->user_id;
        }

        $AssignedManagementPlan->save();

        return response()->json([
            'status' => true,
            'message' => 'Plan actualizada exitosamente',
            'data' => ['assigned_management_plan' => $AssignedManagementPlan]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        try {
            $AssignedManagementPlan = AssignedManagementPlan::find($id);
            $AssignedManagementPlan->delete();

            return response()->json([
                'status' => true,
                'message' => 'Plan eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Plan esta en uso, no es posible eliminar'
            ], 423);
        }
    }
}
