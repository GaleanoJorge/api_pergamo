<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsObjectives;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChPsObjectivesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsObjectives = ChPsObjectives::select('ch_ps_objectives.*');
       

        if ($request->_sort) {
            $ChPsObjectives->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChPsObjectives->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChPsObjectives = $ChPsObjectives->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChPsObjectives = $ChPsObjectives->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Objetivos obtenidos exitosamente',
            'data' => ['ch_ps_objectives' => $ChPsObjectives]
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


        $ChPsObjectives = ChPsObjectives::where('ch_record_id', $id)
        ->where('type_record_id', $type_record_id)
        ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Objetivos obtenida exitosamente',
            'data' => ['ch_ps_objectives' => $ChPsObjectives]
        ]);
    }


    public function store(Request $request): JsonResponse
    {

        $ChPsObjectives = new ChPsObjectives;
        $ChPsObjectives->patient = $request->patient;
        $ChPsObjectives->session = $request->session;
        $ChPsObjectives->intervention = $request->intervention;
        $ChPsObjectives->patient_state = $request->patient_state;
        $ChPsObjectives->recommendations = $request->recommendations;
        $ChPsObjectives->control = $request->control;
        $ChPsObjectives->referrals = $request->referrals;
        $ChPsObjectives->type_record_id = $request->type_record_id;
        $ChPsObjectives->ch_record_id = $request->ch_record_id;
        $ChPsObjectives->save();

        // $areas = json_decode($request->areas_id);
        // foreach ($areas as $element) {
        //     $ChNutritionDietDay = new ChPsObjectives;
        //     $ChNutritionDietDay->name = $element;
        //     $ChNutritionDietDay->ch_nutrition_food_history_id = $ChPsObjectives->id;
        //     $ChNutritionDietDay->save();
        // }


        return response()->json([
            'status' => true,
            'message' => 'Objetivos asociada al paciente exitosamente',
            'data' => ['ch_ps_objectives' => $ChPsObjectives->toArray()]
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
        $ChPsObjectives = ChPsObjectives::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Objetivos obtenida exitosamente',
            'data' => ['ch_ps_objectives' => $ChPsObjectives]
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
        $ChPsObjectives = ChPsObjectives::find($id);
        $ChPsObjectives->patient = $request->patient;
        $ChPsObjectives->session = $request->session;
        $ChPsObjectives->intervention = $request->intervention;
        $ChPsObjectives->patient_state = $request->patient_state;
        $ChPsObjectives->recommendations = $request->recommendations;
        $ChPsObjectives->control = $request->control;
        $ChPsObjectives->referrals = $request->referrals;
        $ChPsObjectives->type_record_id = $request->type_record_id;
        $ChPsObjectives->ch_record_id = $request->ch_record_id;
        $ChPsObjectives->save();

        return response()->json([
            'status' => true,
            'message' => 'Objetivos actualizada exitosamente',
            'data' => ['ch_ps_objectives' => $ChPsObjectives]
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
            $ChPsObjectives = ChPsObjectives::find($id);
            $ChPsObjectives->delete();

            return response()->json([
                'status' => true,
                'message' => 'Objetivos eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Objetivos en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
