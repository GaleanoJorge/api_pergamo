<?php

namespace App\Http\Controllers\Management;

use App\Models\ChNutritionGastrointestinal;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChNutritionGastrointestinalRequest;
use Illuminate\Database\QueryException;

class ChNutritionGastrointestinalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $ChNutritionGastrointestinal = ChNutritionGastrointestinal::select();

        if ($request->_sort) {
            $ChNutritionGastrointestinal->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChNutritionGastrointestinal->where('description', 'like', '%' . $request->search . '%');
        }

        if ($request->type_record_id) {
            $ChNutritionGastrointestinal->where('type_record_id', $request->type_record_id);
        }

        if ($request->ch_record_id) {
            $ChNutritionGastrointestinal->where('ch_record_id', $request->ch_record_id);
        }

        if ($request->query("pagination", true) == "false") {
            $ChNutritionGastrointestinal = $ChNutritionGastrointestinal->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChNutritionGastrointestinal = $ChNutritionGastrointestinal->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Entrada de enfermeria asociadas exitosamente',
            'data' => ['ch_nutrition_gastrointestinal' => $ChNutritionGastrointestinal]
        ]);
    }


    public function store(ChNutritionGastrointestinalRequest $request)
    {
        $validate = ChNutritionGastrointestinal::select('ch_nutrition_gastrointestinal.*')->where('ch_record_id', $request->ch_record_id)->first();
        if (!$validate) {
            $ChNutritionGastrointestinal = new ChNutritionGastrointestinal;
            $ChNutritionGastrointestinal->bowel_habit = $request->bowel_habit;
            $ChNutritionGastrointestinal->vomit = $request->vomit;
            $ChNutritionGastrointestinal->amount_of_vomit = $request->amount_of_vomit;
            $ChNutritionGastrointestinal->nausea = $request->nausea;
            $ChNutritionGastrointestinal->observations = $request->observations;
            $ChNutritionGastrointestinal->type_record_id = $request->type_record_id;
            $ChNutritionGastrointestinal->ch_record_id = $request->ch_record_id;
            $ChNutritionGastrointestinal->save();

            return response()->json([
                'status' => true,
                'message' => 'Entrada de enfermeria creada exitosamente',
                'data' => ['ch_nutrition_gastrointestinal' => $ChNutritionGastrointestinal->toArray()]
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Ya tiene observación',
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
        $ChNutritionGastrointestinal = ChNutritionGastrointestinal::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Posiciones de paciente obtenidas exitosamente',
            'data' => ['ch_nutrition_gastrointestinal' => $ChNutritionGastrointestinal]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ChNutritionGastrointestinalRequest $request, int $id): JsonResponse
    {
        $ChNutritionGastrointestinal = ChNutritionGastrointestinal::find($id);
        $ChNutritionGastrointestinal->bowel_habit = $request->bowel_habit;
        $ChNutritionGastrointestinal->vomit = $request->vomit;
        $ChNutritionGastrointestinal->amount_of_vomit = $request->amount_of_vomit;
        $ChNutritionGastrointestinal->nausea = $request->nausea;
        $ChNutritionGastrointestinal->observations = $request->observations;
        // $ChNutritionGastrointestinal->type_record_id = $request->type_record_id; 
        // $ChNutritionGastrointestinal->ch_record_id = $request->ch_record_id; 
        $ChNutritionGastrointestinal->save();

        return response()->json([
            'status' => true,
            'message' => 'Entrada de enfermeria actualizadas exitosamente',
            'data' => ['ch_nutrition_gastrointestinal' => $ChNutritionGastrointestinal]
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
            $ChNutritionGastrointestinal = ChNutritionGastrointestinal::find($id);
            $ChNutritionGastrointestinal->delete();

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