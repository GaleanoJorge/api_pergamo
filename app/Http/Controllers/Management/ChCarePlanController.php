<?php

namespace App\Http\Controllers\Management;

use App\Models\ChCarePlan;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChCarePlanRequest;
use Illuminate\Database\QueryException;

class ChCarePlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $ChCarePlan = ChCarePlan::select('ch_care_plan.*')
            ->with('nursing_care_plan');

        if ($request->_sort) {
            $ChCarePlan->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChCarePlan->where('description', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChCarePlan = $ChCarePlan->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChCarePlan = $ChCarePlan->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Planes de cuidado asociadas exitosamente',
            'data' => ['ch_care_plan' => $ChCarePlan]
        ]);
    }


    public function store(ChCarePlanRequest $request)
    {
        $CarePlanArray = json_decode($request->care_plans);
        $count = 0;
        foreach ($CarePlanArray as $item) {
            $validate =  ChCarePlan::select('ch_care_plan.*')->where('nursing_care_plan_id', $item)->where('ch_record_id',$request->ch_record_id)->get()->toArray();
            if(count($validate) == 0){
                $ChCarePlan = new ChCarePlan;
                $ChCarePlan->nursing_care_plan_id = $item;
                $ChCarePlan->type_record_id = $request->type_record_id;
                $ChCarePlan->ch_record_id = $request->ch_record_id;
                $ChCarePlan->save();
            } else {
                $count++;
            }
        }

        if($count == 0){
            return response()->json([
                'status' => true,
                'message' => 'Planes de cuidado de enfermeria creados exitosamente',
                'data' => ['ch_care_plan' => $ChCarePlan->toArray()]
            ]);

        } else if(count($CarePlanArray) == $count) {
            return response()->json([
                'status' => true,
                'message' => ' Los planes ya se encuentran asociados',
                // 'data' => ['ch_care_plan' => $ChCarePlan->toArray()]
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Planes de cuidado de enfermeria creados exitosamente, '. $count. ' ya se encuentran asociados',
                'data' => ['ch_care_plan' => $ChCarePlan->toArray()]
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(Request $request, int $id): JsonResponse
    {

        $ChCarePlan = ChCarePlan::select('ch_care_plan.*')
            ->with('nursing_care_plan')
            ->where('ch_care_plan.type_record_id', 1)
            ->where('ch_record_id', $id);


        if ($request->query("pagination", true) == "false") {
            $ChCarePlan = $ChCarePlan->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChCarePlan = $ChCarePlan->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Planes de cuidado de enfermeria obtenidos exitosamente',
            'data' => ['ch_care_plan' => $ChCarePlan]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChCarePlan = ChCarePlan::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Planes de cuidado de enfermeria obtenidos exitosamente',
            'data' => ['ch_care_plan' => $ChCarePlan]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ChCarePlanRequest $request, int $id): JsonResponse
    {
        $CarePlanArray = json_decode($request->care_plans);
        foreach ($CarePlanArray as $item) {
            $ChCarePlan = new ChCarePlan;
            $ChCarePlan->nursing_care_plan_id = $item;
            $ChCarePlan->type_record_id = $request->type_record_id;
            $ChCarePlan->ch_record_id = $request->ch_record_id;
            $ChCarePlan->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Planes de cuidado de enfermeria actualizados exitosamente',
            'data' => ['ch_care_plan' => $ChCarePlan]
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
            $ChCarePlan = ChCarePlan::find($id);
            $ChCarePlan->delete();

            return response()->json([
                'status' => true,
                'message' => 'Planes de cuidado de enfermeria eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Plan de cuidado de enfermeria, no es posible eliminarlo'
            ], 423);
        }
    }
}
