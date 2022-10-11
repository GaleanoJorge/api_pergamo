<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsIntervention;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChPsInterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsIntervention = ChPsIntervention::select('ch_ps_intervention.*');
       

        if ($request->_sort) {
            $ChPsIntervention->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChPsIntervention->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChPsIntervention = $ChPsIntervention->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChPsIntervention = $ChPsIntervention->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Intervención obtenidos exitosamente',
            'data' => ['ch_ps_intervention' => $ChPsIntervention]
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


        $ChPsIntervention = ChPsIntervention::where('ch_record_id', $id)
        ->where('type_record_id', $type_record_id)
        ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Intervención obtenida exitosamente',
            'data' => ['ch_ps_intervention' => $ChPsIntervention]
        ]);
    }


    public function store(Request $request): JsonResponse
    {

        $ChPsIntervention = new ChPsIntervention;
        $ChPsIntervention->assessment = $request->assessment;
        $ChPsIntervention->type_record_id = $request->type_record_id;
        $ChPsIntervention->ch_record_id = $request->ch_record_id;
        $ChPsIntervention->save();

        // $areas = json_decode($request->areas_id);
        // foreach ($areas as $element) {
        //     $ChNutritionDietDay = new ChPsIntervention;
        //     $ChNutritionDietDay->name = $element;
        //     $ChNutritionDietDay->ch_nutrition_food_history_id = $ChPsIntervention->id;
        //     $ChNutritionDietDay->save();
        // }


        return response()->json([
            'status' => true,
            'message' => 'Intervención asociada al paciente exitosamente',
            'data' => ['ch_ps_intervention' => $ChPsIntervention->toArray()]
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
        $ChPsIntervention = ChPsIntervention::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Intervención obtenida exitosamente',
            'data' => ['ch_ps_intervention' => $ChPsIntervention]
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
        $ChPsIntervention = ChPsIntervention::find($id);
        $ChPsIntervention->assessment = $request->assessment;
        $ChPsIntervention->type_record_id = $request->type_record_id;
        $ChPsIntervention->ch_record_id = $request->ch_record_id;
        $ChPsIntervention->save();

        return response()->json([
            'status' => true,
            'message' => 'Intervención actualizada exitosamente',
            'data' => ['ch_ps_intervention' => $ChPsIntervention]
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
            $ChPsIntervention = ChPsIntervention::find($id);
            $ChPsIntervention->delete();

            return response()->json([
                'status' => true,
                'message' => 'Intervención eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Intervención en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
