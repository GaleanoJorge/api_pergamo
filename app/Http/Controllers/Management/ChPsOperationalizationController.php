<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsOperationalization;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChPsOperationalizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsOperationalization = ChPsOperationalization::select('ch_ps_operationalization.*');
       

        if ($request->_sort) {
            $ChPsOperationalization->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChPsOperationalization->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChPsOperationalization = $ChPsOperationalization->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChPsOperationalization = $ChPsOperationalization->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Operacionalización  obtenidos exitosamente',
            'data' => ['ch_ps_operationalization' => $ChPsOperationalization]
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


        $ChPsOperationalization = ChPsOperationalization::where('ch_record_id', $id)
        ->where('type_record_id', $type_record_id)
        ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Operacionalización  obtenida exitosamente',
            'data' => ['ch_ps_operationalization' => $ChPsOperationalization]
        ]);
    }


    public function store(Request $request): JsonResponse
    {

        $ChPsOperationalization = new ChPsOperationalization;
        $ChPsOperationalization->assessment = $request->assessment;
        $ChPsOperationalization->type_record_id = $request->type_record_id;
        $ChPsOperationalization->ch_record_id = $request->ch_record_id;
        $ChPsOperationalization->save();

        // $areas = json_decode($request->areas_id);
        // foreach ($areas as $element) {
        //     $ChNutritionDietDay = new ChPsOperationalization;
        //     $ChNutritionDietDay->name = $element;
        //     $ChNutritionDietDay->ch_nutrition_food_history_id = $ChPsOperationalization->id;
        //     $ChNutritionDietDay->save();
        // }


        return response()->json([
            'status' => true,
            'message' => 'Operacionalización  asociada al paciente exitosamente',
            'data' => ['ch_ps_operationalization' => $ChPsOperationalization->toArray()]
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
        $ChPsOperationalization = ChPsOperationalization::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Operacionalización  obtenida exitosamente',
            'data' => ['ch_ps_operationalization' => $ChPsOperationalization]
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
        $ChPsOperationalization = ChPsOperationalization::find($id);
        $ChPsOperationalization->assessment = $request->assessment;
        $ChPsOperationalization->type_record_id = $request->type_record_id;
        $ChPsOperationalization->ch_record_id = $request->ch_record_id;
        $ChPsOperationalization->save();

        return response()->json([
            'status' => true,
            'message' => 'Operacionalización  actualizada exitosamente',
            'data' => ['ch_ps_operationalization' => $ChPsOperationalization]
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
            $ChPsOperationalization = ChPsOperationalization::find($id);
            $ChPsOperationalization->delete();

            return response()->json([
                'status' => true,
                'message' => 'Operacionalización  eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Operacionalización  en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
