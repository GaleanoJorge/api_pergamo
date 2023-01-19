<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsIntellective;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChPsIntellectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsIntellective = ChPsIntellective::select('ch_ps_intellective.*')
        ->with('ch_ps_attention');

        if ($request->_sort) {
            $ChPsIntellective->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChPsIntellective->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChPsIntellective = $ChPsIntellective->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChPsIntellective = $ChPsIntellective->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Funciones Intelectivas obtenidos exitosamente',
            'data' => ['ch_ps_intellective' => $ChPsIntellective]
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


        $ChPsIntellective = ChPsIntellective::where('ch_record_id', $id)
        ->where('type_record_id', $type_record_id)
        ->with(
            'ch_ps_attention'
            )->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Funciones Intelectivas obtenida exitosamente',
            'data' => ['ch_ps_intellective' => $ChPsIntellective]
        ]);
    }


    public function store(Request $request): JsonResponse
    {

        $ChPsIntellective = new ChPsIntellective;
        $ChPsIntellective->memory = $request->memory;
        $ChPsIntellective->att_observations = $request->att_observations;
        $ChPsIntellective->me_observations = $request->me_observations;
        $ChPsIntellective->perception = $request->perception;
        $ChPsIntellective->per_observations = $request->per_observations;
        $ChPsIntellective->ch_ps_attention_id = $request->ch_ps_attention_id;
        $ChPsIntellective->autopsychic = $request->autopsychic;
        $ChPsIntellective->allopsychic = $request->allopsychic;
        $ChPsIntellective->space = $request->space;
        $ChPsIntellective->type_record_id = $request->type_record_id;
        $ChPsIntellective->ch_record_id = $request->ch_record_id;
        $ChPsIntellective->save();

        // $areas = json_decode($request->areas_id);
        // foreach ($areas as $element) {
        //     $ChNutritionDietDay = new ChPsIntellective;
        //     $ChNutritionDietDay->name = $element;
        //     $ChNutritionDietDay->ch_nutrition_food_history_id = $ChPsIntellective->id;
        //     $ChNutritionDietDay->save();
        // }


        return response()->json([
            'status' => true,
            'message' => 'Funciones Intelectivas asociada al paciente exitosamente',
            'data' => ['ch_ps_intellective' => $ChPsIntellective->toArray()]
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
        $ChPsIntellective = ChPsIntellective::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Funciones Intelectivas obtenida exitosamente',
            'data' => ['ch_ps_intellective' => $ChPsIntellective]
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
        $ChPsIntellective = ChPsIntellective::find($id);
        $ChPsIntellective->memory = $request->memory;
        $ChPsIntellective->att_observations = $request->att_observations;
        $ChPsIntellective->me_observations = $request->me_observations;
        $ChPsIntellective->perception = $request->perception;
        $ChPsIntellective->per_observations = $request->per_observations;
        $ChPsIntellective->ch_ps_attention_id = $request->ch_ps_attention_id;
        $ChPsIntellective->autopsychic = $request->autopsychic;
        $ChPsIntellective->allopsychic = $request->allopsychic;
        $ChPsIntellective->space = $request->space;
        $ChPsIntellective->save();

        return response()->json([
            'status' => true,
            'message' => 'Funciones Intelectivas actualizada exitosamente',
            'data' => ['ch_ps_intellective' => $ChPsIntellective]
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
            $ChPsIntellective = ChPsIntellective::find($id);
            $ChPsIntellective->delete();

            return response()->json([
                'status' => true,
                'message' => 'Funciones Intelectivas eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Funciones Intelectivas en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
