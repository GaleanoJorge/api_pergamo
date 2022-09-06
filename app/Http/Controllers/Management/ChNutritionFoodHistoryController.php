<?php

namespace App\Http\Controllers\Management;

use App\Models\ChNutritionFoodHistory;
use App\Models\ChNutritionDietType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChRecord;
use App\Http\Requests\ChNutritionFoodHistoryRequest;
use Illuminate\Database\QueryException;
use PhpParser\JsonDecoder;

class ChNutritionFoodHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $ChNutritionFoodHistory = ChNutritionFoodHistory::select();

        if ($request->_sort) {
            $ChNutritionFoodHistory->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChNutritionFoodHistory->where('description', 'like', '%' . $request->search . '%');
        }

        if ($request->type_record_id) {
            $ChNutritionFoodHistory->where('type_record_id', $request->type_record_id);
        }

        if ($request->ch_record_id) {
            $ChNutritionFoodHistory->where('ch_record_id', $request->ch_record_id);
        }

        if ($request->query("pagination", true) == "false") {
            $ChNutritionFoodHistory = $ChNutritionFoodHistory->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChNutritionFoodHistory = $ChNutritionFoodHistory->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Entrada de enfermeria asociadas exitosamente',
            'data' => ['ch_nutrition_food_history' => $ChNutritionFoodHistory]
        ]);
    }

    public function getByRecord(Request $request, int $id, int $type_record_id): JsonResponse
    {


        $ChNutritionFoodHistory = ChNutritionFoodHistory::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $ChNutritionFoodHistory = ChNutritionFoodHistory::select('ch_nutrition_food_history.*')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->leftJoin('ch_record', 'ch_record.id', 'ch_nutrition_food_history.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_nutrition_food_history' => $ChNutritionFoodHistory]
        ]);
    }


    public function store(ChNutritionFoodHistoryRequest $request)
    {
        $validate = ChNutritionFoodHistory::select('ch_nutrition_food_history.*')->where('ch_record_id', $request->ch_record_id)->first();
        if (!$validate) {
            $ChNutritionFoodHistory = new ChNutritionFoodHistory;
            $ChNutritionFoodHistory->description = $request->description;
            $ChNutritionFoodHistory->is_allergic = $request->is_allergic;
            $ChNutritionFoodHistory->allergy = $request->allergy;
            $ChNutritionFoodHistory->appetite = $request->appetite;
            $ChNutritionFoodHistory->intake = $request->intake;
            $ChNutritionFoodHistory->swallowing = $request->swallowing;
            $ChNutritionFoodHistory->diet_type = $request->diet_type;
            $ChNutritionFoodHistory->parenteral_nutrition = $request->parenteral_nutrition;
            $ChNutritionFoodHistory->intake_control = $request->intake_control;
            $ChNutritionFoodHistory->type_record_id = $request->type_record_id;
            $ChNutritionFoodHistory->ch_record_id = $request->ch_record_id;
            $ChNutritionFoodHistory->save();

            $dietType = json_decode($request->diet_type);
            foreach ($dietType as $element) {
                $ChNutritionDietDay = new ChNutritionDietType;
                $ChNutritionDietDay->name = $element;
                $ChNutritionDietDay->ch_nutrition_food_history_id = $ChNutritionFoodHistory->id;
                $ChNutritionDietDay->save();
            }

            return response()->json([
                'status' => true,
                'message' => 'Entrada de enfermeria creada exitosamente',
                'data' => ['ch_nutrition_food_history' => $ChNutritionFoodHistory->toArray()]
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
        $ChNutritionFoodHistory = ChNutritionFoodHistory::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Posiciones de paciente obtenidas exitosamente',
            'data' => ['ch_nutrition_food_history' => $ChNutritionFoodHistory]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ChNutritionFoodHistoryRequest $request, int $id): JsonResponse
    {
        $ChNutritionFoodHistory = ChNutritionFoodHistory::find($id);
        $ChNutritionFoodHistory->description = $request->description;
            $ChNutritionFoodHistory->is_allergic = $request->is_allergic;
            $ChNutritionFoodHistory->allergy = $request->allergy;
            $ChNutritionFoodHistory->appetite = $request->appetite;
            $ChNutritionFoodHistory->intake = $request->intake;
            $ChNutritionFoodHistory->swallowing = $request->swallowing;
            $ChNutritionFoodHistory->diet_type = $request->diet_type;
            $ChNutritionFoodHistory->parenteral_nutrition = $request->parenteral_nutrition;
            $ChNutritionFoodHistory->intake_control = $request->intake_control;
        // $ChNutritionFoodHistory->type_record_id = $request->type_record_id; 
        // $ChNutritionFoodHistory->ch_record_id = $request->ch_record_id; 
        $ChNutritionFoodHistory->save();

        return response()->json([
            'status' => true,
            'message' => 'Entrada de enfermeria actualizadas exitosamente',
            'data' => ['ch_nutrition_food_history' => $ChNutritionFoodHistory]
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
            $ChNutritionFoodHistory = ChNutritionFoodHistory::find($id);
            $ChNutritionFoodHistory->delete();

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
