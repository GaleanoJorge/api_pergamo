<?php

namespace App\Http\Controllers\Management;

use App\Models\ChNutritionDietType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChNutritionDietTypeRequest;
use Illuminate\Database\QueryException;

class ChNutritionDietTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $ChNutritionDietType = ChNutritionDietType::select();

        if ($request->_sort) {
            $ChNutritionDietType->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChNutritionDietType->where('description', 'like', '%' . $request->search . '%');
        }

        if ($request->type_record_id) {
            $ChNutritionDietType->where('type_record_id', $request->type_record_id);
        }

        if ($request->ch_record_id) {
            $ChNutritionDietType->where('ch_record_id', $request->ch_record_id);
        }

        if ($request->query("pagination", true) == "false") {
            $ChNutritionDietType = $ChNutritionDietType->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChNutritionDietType = $ChNutritionDietType->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Entrada de enfermeria asociadas exitosamente',
            'data' => ['ch_nutrition_diet_type' => $ChNutritionDietType]
        ]);
    }


    public function store(ChNutritionDietTypeRequest $request)
    {
        $validate = ChNutritionDietType::select('ch_nutrition_diet_type.*')->where('ch_record_id', $request->ch_record_id)->first();
        if (!$validate) {
            $ChNutritionDietType = new ChNutritionDietType;
            $ChNutritionDietType->name = $request->name;
            $ChNutritionDietType->ch_nutrition_food_history_id = $request->ch_nutrition_food_history_id;
            $ChNutritionDietType->save();

            return response()->json([
                'status' => true,
                'message' => 'Entrada de enfermeria creada exitosamente',
                'data' => ['ch_nutrition_diet_type' => $ChNutritionDietType->toArray()]
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
        $ChNutritionDietType = ChNutritionDietType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Posiciones de paciente obtenidas exitosamente',
            'data' => ['ch_nutrition_diet_type' => $ChNutritionDietType]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ChNutritionDietTypeRequest $request, int $id): JsonResponse
    {
        $ChNutritionDietType = ChNutritionDietType::find($id);
        $ChNutritionDietType->name = $request->name;
        $ChNutritionDietType->ch_nutrition_food_history_id = $request->ch_nutrition_food_history_id;
        $ChNutritionDietType->save();

        return response()->json([
            'status' => true,
            'message' => 'Entrada de enfermeria actualizadas exitosamente',
            'data' => ['ch_nutrition_diet_type' => $ChNutritionDietType]
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
            $ChNutritionDietType = ChNutritionDietType::find($id);
            $ChNutritionDietType->delete();

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
