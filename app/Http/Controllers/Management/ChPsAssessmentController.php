<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsAssessment;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChPsAssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsAssessment = ChPsAssessment::select('ch_ps_assessment.*')
        ->with('relationship');

        if ($request->_sort) {
            $ChPsAssessment->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChPsAssessment->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChPsAssessment = $ChPsAssessment->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChPsAssessment = $ChPsAssessment->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Motivo de consulta obtenidos exitosamente',
            'data' => ['ch_ps_assessment' => $ChPsAssessment]
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


        $ChPsAssessment = ChPsAssessment::where('ch_record_id', $id)
        ->where('type_record_id', $type_record_id)
        ->with(
            'relationship',
            'ch_ps_episodes'
            )->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Motivo de consulta obtenida exitosamente',
            'data' => ['ch_ps_assessment' => $ChPsAssessment]
        ]);
    }


    public function store(Request $request): JsonResponse
    {

        $ChPsAssessment = new ChPsAssessment;
        $ChPsAssessment->patient = $request->patient;
        $ChPsAssessment->symptom = $request->symptom;
        $ChPsAssessment->episodes_number = $request->episodes_number;
        $ChPsAssessment->areas = $request->areas;
        $ChPsAssessment->relationship_id = $request->relationship_id;
        $ChPsAssessment->ch_ps_episodes_id = $request->ch_ps_episodes_id;
        $ChPsAssessment->type_record_id = $request->type_record_id;
        $ChPsAssessment->ch_record_id = $request->ch_record_id;
        $ChPsAssessment->save();

        // $areas = json_decode($request->areas_id);
        // foreach ($areas as $element) {
        //     $ChNutritionDietDay = new ChPsAssessment;
        //     $ChNutritionDietDay->name = $element;
        //     $ChNutritionDietDay->ch_nutrition_food_history_id = $ChPsAssessment->id;
        //     $ChNutritionDietDay->save();
        // }


        return response()->json([
            'status' => true,
            'message' => 'Motivo de consulta asociada al paciente exitosamente',
            'data' => ['ch_ps_assessment' => $ChPsAssessment->toArray()]
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
        $ChPsAssessment = ChPsAssessment::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Motivo de consulta obtenida exitosamente',
            'data' => ['ch_ps_assessment' => $ChPsAssessment]
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
        $ChPsAssessment = ChPsAssessment::find($id);
        $ChPsAssessment->patient = $request->patient;
        $ChPsAssessment->symptom = $request->symptom;
        $ChPsAssessment->episodes_number = $request->episodes_number;
        $ChPsAssessment->areas_id = $request->areas_id;
        $ChPsAssessment->relationship_id = $request->relationship_id;
        $ChPsAssessment->ch_ps_episodes_id = $request->ch_ps_episodes_id;
        $ChPsAssessment->type_record_id = $request->type_record_id;
        $ChPsAssessment->ch_record_id = $request->ch_record_id;
        $ChPsAssessment->type_record_id = $request->type_record_id;
        $ChPsAssessment->ch_record_id = $request->ch_record_id;
        $ChPsAssessment->save();

        return response()->json([
            'status' => true,
            'message' => 'Motivo de consulta actualizada exitosamente',
            'data' => ['ch_ps_assessment' => $ChPsAssessment]
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
            $ChPsAssessment = ChPsAssessment::find($id);
            $ChPsAssessment->delete();

            return response()->json([
                'status' => true,
                'message' => 'Motivo de consulta eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Motivo de consulta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
