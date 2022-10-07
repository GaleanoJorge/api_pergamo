<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsLanguage;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChPsLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsLanguage = ChPsLanguage::select('ch_ps_language.*')
        ->with(
            'ch_ps_expressive',
            'ch_ps_comprehensive',
            'ch_ps_others',
            'ch_ps_paraphasias'
        );

        if ($request->_sort) {
            $ChPsLanguage->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChPsLanguage->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChPsLanguage = $ChPsLanguage->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChPsLanguage = $ChPsLanguage->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoración de lenguaje obtenidos exitosamente',
            'data' => ['ch_ps_language' => $ChPsLanguage]
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


        $ChPsLanguage = ChPsLanguage::where('ch_record_id', $id)
        ->where('type_record_id', $type_record_id)
        ->with(
            'ch_ps_expressive',
            'ch_ps_comprehensive',
            'ch_ps_others',
            'ch_ps_paraphasias'
            )->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Valoración de lenguaje obtenida exitosamente',
            'data' => ['ch_ps_language' => $ChPsLanguage]
        ]);
    }


    public function store(Request $request): JsonResponse
    {

        $ChPsLanguage = new ChPsLanguage;
        $ChPsLanguage->ch_ps_expressive_id = $request->ch_ps_expressive_id;
        $ChPsLanguage->ch_ps_comprehensive_id = $request->ch_ps_comprehensive_id;
        $ChPsLanguage->ch_ps_others_id = $request->ch_ps_others_id;
        $ChPsLanguage->ch_ps_paraphasias_id = $request->ch_ps_paraphasias_id;
        $ChPsLanguage->observations = $request->observations;
        $ChPsLanguage->type_record_id = $request->type_record_id;
        $ChPsLanguage->ch_record_id = $request->ch_record_id;
        $ChPsLanguage->save();

        // $areas = json_decode($request->areas_id);
        // foreach ($areas as $element) {
        //     $ChNutritionDietDay = new ChPsLanguage;
        //     $ChNutritionDietDay->name = $element;
        //     $ChNutritionDietDay->ch_nutrition_food_history_id = $ChPsLanguage->id;
        //     $ChNutritionDietDay->save();
        // }


        return response()->json([
            'status' => true,
            'message' => 'Valoración de lenguaje asociada al paciente exitosamente',
            'data' => ['ch_ps_language' => $ChPsLanguage->toArray()]
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
        $ChPsLanguage = ChPsLanguage::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoración de lenguaje obtenida exitosamente',
            'data' => ['ch_ps_language' => $ChPsLanguage]
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
        $ChPsLanguage = ChPsLanguage::find($id);
        $ChPsLanguage->ch_ps_expressive_id = $request->ch_ps_expressive_id;
        $ChPsLanguage->ch_ps_comprehensive_id = $request->ch_ps_comprehensive_id;
        $ChPsLanguage->ch_ps_others_id = $request->ch_ps_others_id;
        $ChPsLanguage->ch_ps_paraphasias_id = $request->ch_ps_paraphasias_id;
        $ChPsLanguage->observations = $request->observations;
        $ChPsLanguage->type_record_id = $request->type_record_id;
        $ChPsLanguage->ch_record_id = $request->ch_record_id;
        $ChPsLanguage->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoración de lenguaje actualizada exitosamente',
            'data' => ['ch_ps_language' => $ChPsLanguage]
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
            $ChPsLanguage = ChPsLanguage::find($id);
            $ChPsLanguage->delete();

            return response()->json([
                'status' => true,
                'message' => 'Valoración de lenguaje eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Valoración de lenguaje en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
