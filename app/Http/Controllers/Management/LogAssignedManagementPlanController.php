<?php

namespace App\Http\Controllers\Admissions;

use App\Models\LogAssignedManagementPlan;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class LogAssignedManagementPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $LogAssignedManagementPlan = LogAssignedManagementPlan::select('log_assigned_management_plan.*')
        ->with(     
        'user',
        'patient',
        'admissions');

        if ($request->_sort) {
            $LogAssignedManagementPlan->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $LogAssignedManagementPlan->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $LogAssignedManagementPlan = $LogAssignedManagementPlan->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $LogAssignedManagementPlan = $LogAssignedManagementPlan->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Log Assigned Management Plan obtenidos exitosamente',
            'data' => ['log_assigned_management_plan' => $LogAssignedManagementPlan]
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id, int $type_record_id): JsonResponse
    {


        $LogAssignedManagementPlan = LogAssignedManagementPlan::with(
            'user',
            'patient',
            'admissions'
            )->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Log Assigned Management Plan obtenida exitosamente',
            'data' => ['log_assigned_management_plan' => $LogAssignedManagementPlan]
        ]);
    }


    public function store(Request $request): JsonResponse
    {

        $LogAssignedManagementPlan = new LogAssignedManagementPlan;
        $LogAssignedManagementPlan->user_id = $request->user_id;
        $LogAssignedManagementPlan->patient_id = $request->patient_id;
        $LogAssignedManagementPlan->admissions_id = $request->admissions_id;
        $LogAssignedManagementPlan->status = $request->status;
        $LogAssignedManagementPlan->i_start_date = $request->i_start_date;
        $LogAssignedManagementPlan->i_finish_date = $request->i_finish_date;
        $LogAssignedManagementPlan->i_user_id = $request->i_user_id;
        $LogAssignedManagementPlan->i_start_hour = $request->i_start_hour;
        $LogAssignedManagementPlan->i_finish_hour = $request->i_finish_hour;
        $LogAssignedManagementPlan->f_start_date = $request->f_start_date;
        $LogAssignedManagementPlan->f_finish_date = $request->f_finish_date;
        $LogAssignedManagementPlan->f_user_id = $request->f_user_id;
        $LogAssignedManagementPlan->f_start_hour = $request->f_start_hour;
        $LogAssignedManagementPlan->f_finish_hour = $request->f_finish_hour;
        $LogAssignedManagementPlan->save();

        // $areas = json_decode($request->areas_id);
        // foreach ($areas as $element) {
        //     $ChNutritionDietDay = new LogAssignedManagementPlan;
        //     $ChNutritionDietDay->name = $element;
        //     $ChNutritionDietDay->ch_nutrition_food_history_id = $LogAssignedManagementPlan->id;
        //     $ChNutritionDietDay->save();
        // }


        return response()->json([
            'status' => true,
            'message' => 'Log Assigned Management Plan asociada al paciente exitosamente',
            'data' => ['log_assigned_management_plan' => $LogAssignedManagementPlan->toArray()]
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
        $LogAssignedManagementPlan = LogAssignedManagementPlan::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Log Assigned Management Plan obtenida exitosamente',
            'data' => ['log_assigned_management_plan' => $LogAssignedManagementPlan]
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
        $LogAssignedManagementPlan = LogAssignedManagementPlan::find($id);
        $LogAssignedManagementPlan->user_id = $request->user_id;
        $LogAssignedManagementPlan->patient_id = $request->patient_id;
        $LogAssignedManagementPlan->admissions_id = $request->admissions_id;
        $LogAssignedManagementPlan->status = $request->status;
        $LogAssignedManagementPlan->i_start_date = $request->i_start_date;
        $LogAssignedManagementPlan->i_finish_date = $request->i_finish_date;
        $LogAssignedManagementPlan->i_user_id = $request->i_user_id;
        $LogAssignedManagementPlan->i_start_hour = $request->i_start_hour;
        $LogAssignedManagementPlan->i_finish_hour = $request->i_finish_hour;
        $LogAssignedManagementPlan->f_start_date = $request->f_start_date;
        $LogAssignedManagementPlan->f_finish_date = $request->f_finish_date;
        $LogAssignedManagementPlan->f_user_id = $request->f_user_id;
        $LogAssignedManagementPlan->f_start_hour = $request->f_start_hour;
        $LogAssignedManagementPlan->f_finish_hour = $request->f_finish_hour;
        $LogAssignedManagementPlan->save();

        return response()->json([
            'status' => true,
            'message' => 'Log Assigned Management Plan actualizada exitosamente',
            'data' => ['log_assigned_management_plan' => $LogAssignedManagementPlan]
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
            $LogAssignedManagementPlan = LogAssignedManagementPlan::find($id);
            $LogAssignedManagementPlan->delete();

            return response()->json([
                'status' => true,
                'message' => 'Log Assigned Management Plan eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Log Assigned Management Plan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
