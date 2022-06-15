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
            'message' => 'Entrada de enfermeria asociadas exitosamente',
            'data' => ['ch_nutrition_interpretation' => $ChNutritionInterpretation]
        ]);
    }


    public function store(ChNutritionInterpretationRequest $request)
    {
        $validate = ChNutritionInterpretation::select('ch_nutrition_interpretation.*')->where('ch_record_id', $request->ch_record_id);
        if (!isset($validate)) {
            $ChNutritionInterpretation = new ChNutritionInterpretation;
            $ChNutritionInterpretation->observation = $request->observation;
            $ChNutritionInterpretation->type_record_id = $request->type_record_id;
            $ChNutritionInterpretation->ch_record_id = $request->ch_record_id;
            $ChNutritionInterpretation->save();

            return response()->json([
                'status' => true,
                'message' => 'Entrada de enfermeria creada exitosamente',
                'data' => ['ch_nutrition_interpretation' => $ChNutritionInterpretation->toArray()]
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Ya tiene observación'
            ], 423);
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
            'message' => 'Entrada de enfermeria actualizadas exitosamente',
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
                'message' => 'Entrada de enfermeria eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Entrada de enfermeria esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
