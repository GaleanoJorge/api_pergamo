<?php

namespace App\Http\Controllers\Management;

use App\Models\ManagementPlan;
use App\Models\AssignedManagementPlan;
use App\Models\Frequency;
use App\Models\Location;
use App\Models\Bed;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManagementPlanRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ManagementPlanController extends Controller
{
    public function index(Request $request): JsonResponse
    {

        $ManagementPlan = ManagementPlan::select();

        if ($request->_sort) {
            $ManagementPlan->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ManagementPlan->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $ManagementPlan = $ManagementPlan->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ManagementPlan = $ManagementPlan->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Plan de manejo obtenidos exitosamente',
            'data' => ['management_plan' => $ManagementPlan]
        ]);
    }

    public function getByAdmission(Request $request, int $id): JsonResponse
    {

        $ManagementPlan = ManagementPlan::with('type_of_attention', 'frequency', 'special_field', 'admissions', 'assigned_user')->where('admissions_id', $id);


        if ($request->_sort) {
            $ManagementPlan->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ManagementPlan->where('invoice_prefix', 'like', '%' . $request->search . '%')
                ->orWhere('invoice_consecutive', 'like', '%' . $request->search . '%')
                ->orWhere('received_date', 'like', '%' . $request->search . '%')
                ->orWhere('company.name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ManagementPlan = $ManagementPlan->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $ManagementPlan = $ManagementPlan->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Planes obtenidos exitosamente',
            'data' => ['management_plan' => $ManagementPlan]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ManagementPlanRequest $request
     * @return JsonResponse
     */
    public function store(ManagementPlanRequest $request): JsonResponse
    {
        $ManagementPlan = new ManagementPlan;
        $ManagementPlan->type_of_attention_id = $request->type_of_attention_id;
        $ManagementPlan->frequency_id = $request->frequency_id;
        $ManagementPlan->quantity = $request->quantity;
        $ManagementPlan->special_field_id = $request->special_field_id;
        $ManagementPlan->admissions_id = $request->admissions_id;
        $ManagementPlan->assigned_user_id = $request->assigned_user_id;
        $ManagementPlan->save();

        $frequency = Frequency::where('id', $request->frequency_id)->get()->toArray();
        foreach ($frequency as $key => $row) {
            $diferencei = $row['days'] / $request->quantity;
        }
        $now = Carbon::now();
        $finish = Carbon::now()->addDays($diferencei);
        $diference = 7;
        for ($i = 0; $i < $request->quantity; $i++) {

            if ($i == 0) {
                $start = $now;
                $finish = $finish;
            } else {
                $diference = $diference + $diferencei;
                $start = $finish->addDays(1);
                $finish = Carbon::now()->addDays($diference);
            }
            $assignedManagement = new AssignedManagementPlan;
            $assignedManagement->start_date = $start;
            $assignedManagement->finish_date =  $finish;
            $assignedManagement->user_id = $request->assigned_user_id;
            $assignedManagement->management_plan_id = $ManagementPlan->id;
            $assignedManagement->save();
        }


        return response()->json([
            'status' => true,
            'message' => 'Plan de manejo creado exitosamente',
            'data' => ['management_plan' => $ManagementPlan->toArray()]
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
        $ManagementPlan = ManagementPlan::where('id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Plan de manejo obtenido exitosamente',
            'data' => ['management_plan' => $ManagementPlan]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SectionalCouncilRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $ManagementPlan = ManagementPlan::find($id);
        $ManagementPlan->type_of_attention_id = $request->type_of_attention_id;
        $ManagementPlan->frequency_id = $request->frequency_id;
        $ManagementPlan->quantity = $request->quantity;
        $ManagementPlan->special_field_id = $request->special_field_id;
        $ManagementPlan->admissions_id = $request->admissions_id;
        $ManagementPlan->assigned_user_id = $request->assigned_user_id;
        $ManagementPlan->save();


        return response()->json([
            'status' => true,
            'message' => 'Plan de manejo actualizado exitosamente',
            'data' => ['management_plan' => $ManagementPlan]
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
            $ManagementPlan = ManagementPlan::find($id);
            $ManagementPlan->delete();

            return response()->json([
                'status' => true,
                'message' => 'Plan de manejo eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Plan de manejo está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
