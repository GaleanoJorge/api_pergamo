<?php

namespace App\Http\Controllers\Management;

use App\Models\ChNutritionInterpretation;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChNutritionInterpretationRequest;
use Illuminate\Database\QueryException;

class ChNutritionInterpretationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $ChNutritionInterpretation = ChNutritionInterpretation::select();

        if ($request->_sort) {
            $ChNutritionInterpretation->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChNutritionInterpretation->where('description', 'like', '%' . $request->search . '%');
        }

        if ($request->type_record_id) {
            $ChNutritionInterpretation->where('type_record_id', $request->type_record_id);
        }

        if ($request->ch_record_id) {
            $ChNutritionInterpretation->where('ch_record_id', $request->ch_record_id);
        }

        if ($request->query("pagination", true) == "false") {
            $ChNutritionInterpretation = $ChNutritionInterpretation->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChNutritionInterpretation = $ChNutritionInterpretation->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Análisis e interpretaciones de nutrición asociadas exitosamente',
            'data' => ['ch_nutrition_interpretation' => $ChNutritionInterpretation]
        ]);
    }

    /**
     * Get All Interpretations
     * 
     * @param  int  $patient_id
     * @return JsonResponse
     */
    public function getAllInterpretetations(Request $request, int $patient_id): JsonResponse
    {
        $ChNutritionInterpretation = ChNutritionInterpretation::select('ch_nutrition_interpretation.*')
            ->leftJoin('ch_record', 'ch_record.id', 'ch_nutrition_interpretation.ch_record_id')
            ->leftJoin('admissions', 'admissions.id', 'ch_record.admissions_id')
            ->where('admissions.patient_id', $patient_id)
            ->orderBy('ch_nutrition_interpretation.id', 'desc')
        ;

        if($request->query("pagination", true)=="false"){
            $ChNutritionInterpretation=$ChNutritionInterpretation->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChNutritionInterpretation=$ChNutritionInterpretation->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Antecedentes alérgicos obtenidos exitosamente',
            'data' => ['ch_nutrition_interpretation' => $ChNutritionInterpretation]
        ]);
    }

    public function store(ChNutritionInterpretationRequest $request)
    {
        $validate = ChNutritionInterpretation::select('ch_nutrition_interpretation.*')->where('ch_record_id', $request->ch_record_id)->first();
        if (!$validate) {
            $ChNutritionInterpretation = new ChNutritionInterpretation;
            $ChNutritionInterpretation->observation = $request->observation;
            $ChNutritionInterpretation->type_record_id = $request->type_record_id;
            $ChNutritionInterpretation->ch_record_id = $request->ch_record_id;
            $ChNutritionInterpretation->save();

            return response()->json([
                'status' => true,
                'message' => 'Análisis e interpretaciones de nutrición creada exitosamente',
                'data' => ['ch_nutrition_interpretation' => $ChNutritionInterpretation->toArray()]
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Ya cuenta con un registro',
                'data' => []
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChNutritionInterpretation = ChNutritionInterpretation::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Posiciones de paciente obtenidas exitosamente',
            'data' => ['ch_nutrition_interpretation' => $ChNutritionInterpretation]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ChNutritionInterpretationRequest $request, int $id): JsonResponse
    {
        $ChNutritionInterpretation = ChNutritionInterpretation::find($id);
        $ChNutritionInterpretation->observation = $request->observation;
        $ChNutritionInterpretation->type_record_id = $request->type_record_id;
        $ChNutritionInterpretation->ch_record_id = $request->ch_record_id;
        $ChNutritionInterpretation->save();

        return response()->json([
            'status' => true,
            'message' => 'Análisis e interpretaciones de nutrición actualizadas exitosamente',
            'data' => ['ch_nutrition_interpretation' => $ChNutritionInterpretation]
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
            $ChNutritionInterpretation = ChNutritionInterpretation::find($id);
            $ChNutritionInterpretation->delete();

            return response()->json([
                'status' => true,
                'message' => 'Análisis e interpretaciones de nutrición eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Análisis e interpretaciones de nutrición esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
