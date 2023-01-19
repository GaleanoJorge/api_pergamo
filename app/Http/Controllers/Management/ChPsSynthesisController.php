<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsSynthesis;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChPsSynthesisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsSynthesis = ChPsSynthesis::select('ch_ps_synthesis.*')
        ->with(
            'ch_ps_judgment',
            'ch_ps_prospecting',
            'ch_ps_intelligence'
        );

        if ($request->_sort) {
            $ChPsSynthesis->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChPsSynthesis->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChPsSynthesis = $ChPsSynthesis->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChPsSynthesis = $ChPsSynthesis->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Esfera funciones de síntesis obtenidos exitosamente',
            'data' => ['ch_ps_synthesis' => $ChPsSynthesis]
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


        $ChPsSynthesis = ChPsSynthesis::where('ch_record_id', $id)
        ->where('type_record_id', $type_record_id)
        ->with(
            'ch_ps_judgment',
            'ch_ps_prospecting',
            'ch_ps_intelligence'
    
            )->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Esfera funciones de síntesis obtenida exitosamente',
            'data' => ['ch_ps_synthesis' => $ChPsSynthesis]
        ]);
    }


    public function store(Request $request): JsonResponse
    {

        $ChPsSynthesis = new ChPsSynthesis;
        $ChPsSynthesis->psychomotricity = $request->psychomotricity;
        $ChPsSynthesis->observations_psy = $request->observations_psy;
        $ChPsSynthesis->introspection = $request->introspection;
        $ChPsSynthesis->observations_in = $request->observations_in;
        $ChPsSynthesis->ch_ps_judgment_id = $request->ch_ps_judgment_id;
        $ChPsSynthesis->observations_jud = $request->observations_jud;
        $ChPsSynthesis->ch_ps_prospecting_id = $request->ch_ps_prospecting_id;
        $ChPsSynthesis->observations_pros = $request->observations_pros;
        $ChPsSynthesis->ch_ps_intelligence_id = $request->ch_ps_intelligence_id;
        $ChPsSynthesis->observations_inte = $request->observations_inte;
        $ChPsSynthesis->type_record_id = $request->type_record_id;
        $ChPsSynthesis->ch_record_id = $request->ch_record_id;
        $ChPsSynthesis->save();

        // $areas = json_decode($request->areas_id);
        // foreach ($areas as $element) {
        //     $ChNutritionDietDay = new ChPsSynthesis;
        //     $ChNutritionDietDay->name = $element;
        //     $ChNutritionDietDay->ch_nutrition_food_history_id = $ChPsSynthesis->id;
        //     $ChNutritionDietDay->save();
        // }


        return response()->json([
            'status' => true,
            'message' => 'Esfera funciones de síntesis asociada al paciente exitosamente',
            'data' => ['ch_ps_synthesis' => $ChPsSynthesis->toArray()]
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
        $ChPsSynthesis = ChPsSynthesis::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Esfera funciones de síntesis obtenida exitosamente',
            'data' => ['ch_ps_synthesis' => $ChPsSynthesis]
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
        $ChPsSynthesis = ChPsSynthesis::find($id);
        $ChPsSynthesis->psychomotricity = $request->psychomotricity;
        $ChPsSynthesis->observations_psy = $request->observations_psy;
        $ChPsSynthesis->introspection = $request->introspection;
        $ChPsSynthesis->observations_in = $request->observations_in;
        $ChPsSynthesis->ch_ps_judgment_id = $request->ch_ps_judgment_id;
        $ChPsSynthesis->observations_jud = $request->observations_jud;
        $ChPsSynthesis->ch_ps_prospecting_id = $request->ch_ps_prospecting_id;
        $ChPsSynthesis->observations_pros = $request->observations_pros;
        $ChPsSynthesis->ch_ps_intelligence_id = $request->ch_ps_intelligence_id;
        $ChPsSynthesis->observations_inte = $request->observations_inte;
        $ChPsSynthesis->type_record_id = $request->type_record_id;
        $ChPsSynthesis->ch_record_id = $request->ch_record_id;
        $ChPsSynthesis->save();

        return response()->json([
            'status' => true,
            'message' => 'Esfera funciones de síntesis actualizada exitosamente',
            'data' => ['ch_ps_synthesis' => $ChPsSynthesis]
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
            $ChPsSynthesis = ChPsSynthesis::find($id);
            $ChPsSynthesis->delete();

            return response()->json([
                'status' => true,
                'message' => 'Esfera funciones de síntesis eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Esfera funciones de síntesis en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
