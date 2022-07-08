<?php

namespace App\Http\Controllers\Management;

use App\Models\ChNutritionAnthropometry;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChNutritionAnthropometryRequest;
use Illuminate\Database\QueryException;

class ChNutritionAnthropometryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $ChNutritionAnthropometry = ChNutritionAnthropometry::select();

        if ($request->_sort) {
            $ChNutritionAnthropometry->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChNutritionAnthropometry->where('description', 'like', '%' . $request->search . '%');
        }

        if ($request->type_record_id) {
            $ChNutritionAnthropometry->where('type_record_id', $request->type_record_id);
        }

        if ($request->ch_record_id) {
            $ChNutritionAnthropometry->where('ch_record_id', $request->ch_record_id);
        }

        if ($request->query("pagination", true) == "false") {
            $ChNutritionAnthropometry = $ChNutritionAnthropometry->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChNutritionAnthropometry = $ChNutritionAnthropometry->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Entrada de enfermeria asociadas exitosamente',
            'data' => ['ch_nutrition_anthropometry' => $ChNutritionAnthropometry]
        ]);
    }


    public function store(ChNutritionAnthropometryRequest $request)
    {
        $validate = ChNutritionAnthropometry::select('ch_nutrition_anthropometry.*')->where('ch_record_id', $request->ch_record_id)->first();
        if (!$validate) {
            $ChNutritionAnthropometry = new ChNutritionAnthropometry;
            $ChNutritionAnthropometry->is_functional = $request->is_functional;
            $ChNutritionAnthropometry->weight = $request->weight;
            $ChNutritionAnthropometry->size = $request->size;
            $ChNutritionAnthropometry->arm_circunferency = $request->arm_circunferency;
            $ChNutritionAnthropometry->calf_circumference = $request->calf_circumference;
            $ChNutritionAnthropometry->knee_height = $request->knee_height;
            $ChNutritionAnthropometry->abdominal_perimeter = $request->abdominal_perimeter;
            $ChNutritionAnthropometry->hip_perimeter = $request->hip_perimeter;
            $ChNutritionAnthropometry->geteratedIMC = $request->geteratedIMC;
            $ChNutritionAnthropometry->classification = $request->classification;
            $ChNutritionAnthropometry->estimated_weight = $request->estimated_weight;
            $ChNutritionAnthropometry->estimated_size = $request->estimated_size;
            $ChNutritionAnthropometry->type_record_id = $request->type_record_id;
            $ChNutritionAnthropometry->ch_record_id = $request->ch_record_id;
            $ChNutritionAnthropometry->save();

            return response()->json([
                'status' => true,
                'message' => 'Entrada de enfermeria creada exitosamente',
                'data' => ['ch_nutrition_anthropometry' => $ChNutritionAnthropometry->toArray()]
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Ya tiene observación',
                'data' => ['ch_nutrition_anthropometry' => []]
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
        $ChNutritionAnthropometry = ChNutritionAnthropometry::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Posiciones de paciente obtenidas exitosamente',
            'data' => ['ch_nutrition_anthropometry' => $ChNutritionAnthropometry]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ChNutritionAnthropometryRequest $request, int $id): JsonResponse
    {
        $ChNutritionAnthropometry = ChNutritionAnthropometry::find($id);
        $ChNutritionAnthropometry->is_functional = $request->is_functional;
        $ChNutritionAnthropometry->weight = $request->weight;
        $ChNutritionAnthropometry->size = $request->size;
        $ChNutritionAnthropometry->arm_circunferency = $request->arm_circunferency;
        $ChNutritionAnthropometry->calf_circumference = $request->calf_circumference;
        $ChNutritionAnthropometry->knee_height = $request->knee_height;
        $ChNutritionAnthropometry->abdominal_perimeter = $request->abdominal_perimeter;
        $ChNutritionAnthropometry->hip_perimeter = $request->hip_perimeter;
        $ChNutritionAnthropometry->geteratedIMC = $request->geteratedIMC;
        $ChNutritionAnthropometry->classification = $request->classification;
        $ChNutritionAnthropometry->estimated_weight = $request->estimated_weight;
        $ChNutritionAnthropometry->estimated_size = $request->estimated_size;
        // $ChNutritionAnthropometry->type_record_id = $request->type_record_id; 
        // $ChNutritionAnthropometry->ch_record_id = $request->ch_record_id; 
        $ChNutritionAnthropometry->save();

        return response()->json([
            'status' => true,
            'message' => 'Entrada de enfermeria actualizadas exitosamente',
            'data' => ['ch_nutrition_anthropometry' => $ChNutritionAnthropometry]
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
            $ChNutritionAnthropometry = ChNutritionAnthropometry::find($id);
            $ChNutritionAnthropometry->delete();

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
