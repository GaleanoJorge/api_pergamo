<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsSphere;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChPsSphereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsSphere = ChPsSphere::select('ch_ps_sphere.*')
        ->with(
            'ch_ps_sadness',
            'ch_ps_joy',
            'ch_ps_fear',
            'ch_ps_anger',
            'ch_ps_insufficiency',
            'ch_ps_several'
        );

        if ($request->_sort) {
            $ChPsSphere->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChPsSphere->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChPsSphere = $ChPsSphere->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChPsSphere = $ChPsSphere->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Esfera afectiva o de humor  obtenidos exitosamente',
            'data' => ['ch_ps_sphere' => $ChPsSphere]
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


        $ChPsSphere = ChPsSphere::where('ch_record_id', $id)
        ->where('type_record_id', $type_record_id)
        ->with(
            'ch_ps_sadness',
            'ch_ps_joy',
            'ch_ps_fear',
            'ch_ps_anger',
            'ch_ps_insufficiency',
            'ch_ps_several'
            )->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Esfera afectiva o de humor  obtenida exitosamente',
            'data' => ['ch_ps_sphere' => $ChPsSphere]
        ]);
    }


    public function store(Request $request): JsonResponse
    {

        $ChPsSphere = new ChPsSphere;
        $ChPsSphere->euthymia = $request->euthymia;
        $ChPsSphere->observations = $request->observations;
        $ChPsSphere->ch_ps_sadness_id = $request->ch_ps_sadness_id;
        $ChPsSphere->ch_ps_joy_id = $request->ch_ps_joy_id;
        $ChPsSphere->ch_ps_fear_id = $request->ch_ps_fear_id;
        $ChPsSphere->ch_ps_anger_id = $request->ch_ps_anger_id;
        $ChPsSphere->ch_ps_insufficiency_id = $request->ch_ps_insufficiency_id;
        $ChPsSphere->ch_ps_several_id = $request->ch_ps_several_id;
        $ChPsSphere->type_record_id = $request->type_record_id;
        $ChPsSphere->ch_record_id = $request->ch_record_id;
        $ChPsSphere->save();

        // $areas = json_decode($request->areas_id);
        // foreach ($areas as $element) {
        //     $ChNutritionDietDay = new ChPsSphere;
        //     $ChNutritionDietDay->name = $element;
        //     $ChNutritionDietDay->ch_nutrition_food_history_id = $ChPsSphere->id;
        //     $ChNutritionDietDay->save();
        // }


        return response()->json([
            'status' => true,
            'message' => 'Esfera afectiva o de humor  asociada al paciente exitosamente',
            'data' => ['ch_ps_sphere' => $ChPsSphere->toArray()]
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
        $ChPsSphere = ChPsSphere::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Esfera afectiva o de humor  obtenida exitosamente',
            'data' => ['ch_ps_sphere' => $ChPsSphere]
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
        $ChPsSphere = ChPsSphere::find($id);
        $ChPsSphere->euthymia = $request->euthymia;
        $ChPsSphere->observations = $request->observations;
        $ChPsSphere->ch_ps_sadness_id = $request->ch_ps_sadness_id;
        $ChPsSphere->ch_ps_joy_id = $request->ch_ps_joy_id;
        $ChPsSphere->ch_ps_fear_id = $request->ch_ps_fear_id;
        $ChPsSphere->ch_ps_anger_id = $request->ch_ps_anger_id;
        $ChPsSphere->ch_ps_insufficiency_id = $request->ch_ps_insufficiency_id;
        $ChPsSphere->ch_ps_several_id = $request->ch_ps_several_id;
        $ChPsSphere->type_record_id = $request->type_record_id;
        $ChPsSphere->ch_record_id = $request->ch_record_id;
        $ChPsSphere->save();

        return response()->json([
            'status' => true,
            'message' => 'Esfera afectiva o de humor  actualizada exitosamente',
            'data' => ['ch_ps_sphere' => $ChPsSphere]
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
            $ChPsSphere = ChPsSphere::find($id);
            $ChPsSphere->delete();

            return response()->json([
                'status' => true,
                'message' => 'Esfera afectiva o de humor  eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Esfera afectiva o de humor  en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
