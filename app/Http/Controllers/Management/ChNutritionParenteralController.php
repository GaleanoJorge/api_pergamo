<?php

namespace App\Http\Controllers\Management;

use App\Models\ChNutritionParenteral;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChNutritionParenteralRequest;
use Illuminate\Database\QueryException;

class ChNutritionParenteralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $ChNutritionParenteral = ChNutritionParenteral::select();

        if ($request->_sort) {
            $ChNutritionParenteral->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChNutritionParenteral->where('description', 'like', '%' . $request->search . '%');
        }

        if ($request->type_record_id) {
            $ChNutritionParenteral->where('type_record_id', $request->type_record_id);
        }

        if ($request->ch_record_id) {
            $ChNutritionParenteral->where('ch_record_id', $request->ch_record_id);
        }

        if ($request->query("pagination", true) == "false") {
            $ChNutritionParenteral = $ChNutritionParenteral->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChNutritionParenteral = $ChNutritionParenteral->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Entrada de enfermeria asociadas exitosamente',
            'data' => ['ch_nutrition_parenteral' => $ChNutritionParenteral]
        ]);
    }


    public function store(ChNutritionParenteralRequest $request)
    {
        $validate = ChNutritionParenteral::select('ch_nutrition_parenteral.*')->where('ch_record_id', $request->ch_record_id)->first();
        if (!$validate) {
            $ChNutritionParenteral = new ChNutritionParenteral;
            $ChNutritionParenteral->protein_contributions = $request->protein_contributions;
            $ChNutritionParenteral->carbohydrate_contribution = $request->carbohydrate_contribution;
            $ChNutritionParenteral->lipid_contribution = $request->lipid_contribution;
            $ChNutritionParenteral->amino_acid_volume = $request->amino_acid_volume;
            $ChNutritionParenteral->ce_se = $request->ce_se;
            $ChNutritionParenteral->dextrose_volume = $request->dextrose_volume;
            $ChNutritionParenteral->lipid_volume = $request->lipid_volume;
            $ChNutritionParenteral->total_grams_of_protein = $request->total_grams_of_protein;
            $ChNutritionParenteral->grams_of_nitrogen = $request->grams_of_nitrogen;
            $ChNutritionParenteral->total_carbohydrates = $request->total_carbohydrates;
            $ChNutritionParenteral->total_grams_of_lipids = $request->total_grams_of_lipids;
            $ChNutritionParenteral->total_amino_acid_volume = $request->total_amino_acid_volume;
            $ChNutritionParenteral->total_dextrose_volume = $request->total_dextrose_volume;
            $ChNutritionParenteral->total_lipid_volume = $request->total_lipid_volume;
            $ChNutritionParenteral->total_calories = $request->total_calories;
            $ChNutritionParenteral->type_record_id = $request->type_record_id;
            $ChNutritionParenteral->ch_record_id = $request->ch_record_id;
            $ChNutritionParenteral->save();

            return response()->json([
                'status' => true,
                'message' => 'Entrada de enfermeria creada exitosamente',
                'data' => ['ch_nutrition_parenteral' => $ChNutritionParenteral->toArray()]
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
        $ChNutritionParenteral = ChNutritionParenteral::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Posiciones de paciente obtenidas exitosamente',
            'data' => ['ch_nutrition_parenteral' => $ChNutritionParenteral]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ChNutritionParenteralRequest $request, int $id): JsonResponse
    {
        $ChNutritionParenteral = ChNutritionParenteral::find($id);
        $ChNutritionParenteral->protein_contributions = $request->protein_contributions;
        $ChNutritionParenteral->carbohydrate_contribution = $request->carbohydrate_contribution;
        $ChNutritionParenteral->lipid_contribution = $request->lipid_contribution;
        $ChNutritionParenteral->amino_acid_volume = $request->amino_acid_volume;
        $ChNutritionParenteral->ce_se = $request->ce_se;
        $ChNutritionParenteral->dextrose_volume = $request->dextrose_volume;
        $ChNutritionParenteral->lipid_volume = $request->lipid_volume;
        $ChNutritionParenteral->total_grams_of_protein = $request->total_grams_of_protein;
        $ChNutritionParenteral->grams_of_nitrogen = $request->grams_of_nitrogen;
        $ChNutritionParenteral->total_carbohydrates = $request->total_carbohydrates;
        $ChNutritionParenteral->total_grams_of_lipids = $request->total_grams_of_lipids;
        $ChNutritionParenteral->total_amino_acid_volume = $request->total_amino_acid_volume;
        $ChNutritionParenteral->total_dextrose_volume = $request->total_dextrose_volume;
        $ChNutritionParenteral->total_lipid_volume = $request->total_lipid_volume;
        $ChNutritionParenteral->total_calories = $request->total_calories;
        // $ChNutritionParenteral->type_record_id = $request->type_record_id; 
        // $ChNutritionParenteral->ch_record_id = $request->ch_record_id; 
        $ChNutritionParenteral->save();

        return response()->json([
            'status' => true,
            'message' => 'Entrada de enfermeria actualizadas exitosamente',
            'data' => ['ch_nutrition_parenteral' => $ChNutritionParenteral]
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
            $ChNutritionParenteral = ChNutritionParenteral::find($id);
            $ChNutritionParenteral->delete();

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
