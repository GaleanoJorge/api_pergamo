<?php

namespace App\Http\Controllers\Management;

use App\Models\LogManagement;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class LogManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $LogManagement = LogManagement::select('log_management.*')
        ->with( 'users',
        'management_plan'          
      
    );

        if ($request->_sort) {
            $LogManagement->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $LogManagement->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $LogManagement = $LogManagement->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $LogManagement = $LogManagement->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Log Management obtenidos exitosamente',
            'data' => ['log_management' => $LogManagement]
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


        $LogManagement = LogManagement::with(
            'users',
            'management_plan'
            )->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Log Management obtenida exitosamente',
            'data' => ['log_management' => $LogManagement]
        ]);
    }


    public function store(Request $request): JsonResponse
    {

        $LogManagement = new LogManagement;
        $LogManagement->user_id = $request->user_id;
        $LogManagement->status = $request->status;
        $LogManagement->management_plan_id = $request->management_plan_id;
        $LogManagement->save();

        // $areas = json_decode($request->areas_id);
        // foreach ($areas as $element) {
        //     $ChNutritionDietDay = new LogManagement;
        //     $ChNutritionDietDay->name = $element;
        //     $ChNutritionDietDay->ch_nutrition_food_history_id = $LogManagement->id;
        //     $ChNutritionDietDay->save();
        // }


        return response()->json([
            'status' => true,
            'message' => 'Log Management asociada al paciente exitosamente',
            'data' => ['log_management' => $LogManagement->toArray()]
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
        $LogManagement = LogManagement::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Log Management obtenida exitosamente',
            'data' => ['log_management' => $LogManagement]
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
        $LogManagement = LogManagement::find($id);
        $LogManagement->user_id = $request->user_id;
        $LogManagement->status = $request->status;
        $LogManagement->management_plan_id = $request->management_plan_id;
        $LogManagement->save();

        return response()->json([
            'status' => true,
            'message' => 'Log Management actualizada exitosamente',
            'data' => ['log_management' => $LogManagement]
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
            $LogManagement = LogManagement::find($id);
            $LogManagement->delete();

            return response()->json([
                'status' => true,
                'message' => 'Log Management eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Log Management en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
