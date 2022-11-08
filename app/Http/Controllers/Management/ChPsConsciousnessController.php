<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsConsciousness;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChPsConsciousnessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsConsciousness = ChPsConsciousness::select('ch_ps_consciousness.*');
       

        if ($request->_sort) {
            $ChPsConsciousness->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChPsConsciousness->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChPsConsciousness = $ChPsConsciousness->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChPsConsciousness = $ChPsConsciousness->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Estado de conciencia obtenidos exitosamente',
            'data' => ['ch_ps_consciousness' => $ChPsConsciousness]
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


        $ChPsConsciousness = ChPsConsciousness::where('ch_record_id', $id)
        ->where('type_record_id', $type_record_id)
       ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Estado de conciencia obtenida exitosamente',
            'data' => ['ch_ps_consciousness' => $ChPsConsciousness]
        ]);
    }


    public function store(Request $request): JsonResponse
    {

        $ChPsConsciousness = new ChPsConsciousness;
        $ChPsConsciousness->watch = $request->watch;
        $ChPsConsciousness->hypervigilant = $request->hypervigilant;
        $ChPsConsciousness->obtundation = $request->obtundation;
        $ChPsConsciousness->confusion = $request->confusion;
        $ChPsConsciousness->delirium = $request->delirium;
        $ChPsConsciousness->oneiroid = $request->oneiroid;
        $ChPsConsciousness->twilight = $request->twilight;
        $ChPsConsciousness->stupor = $request->stupor;
        $ChPsConsciousness->shallow = $request->shallow;
        $ChPsConsciousness->deep = $request->deep;
        $ChPsConsciousness->appearance = $request->appearance;
        $ChPsConsciousness->attitude = $request->attitude;
        $ChPsConsciousness->type_record_id = $request->type_record_id;
        $ChPsConsciousness->ch_record_id = $request->ch_record_id;
        $ChPsConsciousness->save();

        // $areas = json_decode($request->areas_id);
        // foreach ($areas as $element) {
        //     $ChNutritionDietDay = new ChPsConsciousness;
        //     $ChNutritionDietDay->name = $element;
        //     $ChNutritionDietDay->ch_nutrition_food_history_id = $ChPsConsciousness->id;
        //     $ChNutritionDietDay->save();
        // }


        return response()->json([
            'status' => true,
            'message' => 'Estado de conciencia asociada al paciente exitosamente',
            'data' => ['ch_ps_consciousness' => $ChPsConsciousness->toArray()]
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
        $ChPsConsciousness = ChPsConsciousness::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Estado de conciencia obtenida exitosamente',
            'data' => ['ch_ps_consciousness' => $ChPsConsciousness]
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
        $ChPsConsciousness = ChPsConsciousness::find($id);
        $ChPsConsciousness->watch = $request->watch;
        $ChPsConsciousness->hypervigilant = $request->hypervigilant;
        $ChPsConsciousness->obtundation = $request->obtundation;
        $ChPsConsciousness->confusion = $request->confusion;
        $ChPsConsciousness->delirium = $request->delirium;
        $ChPsConsciousness->oneiroid = $request->oneiroid;
        $ChPsConsciousness->twilight = $request->twilight;
        $ChPsConsciousness->stupor = $request->stupor;
        $ChPsConsciousness->shallow = $request->shallow;
        $ChPsConsciousness->deep = $request->deep;
        $ChPsConsciousness->appearance = $request->appearance;
        $ChPsConsciousness->attitude = $request->attitude;
        $ChPsConsciousness->type_record_id = $request->type_record_id;
        $ChPsConsciousness->ch_record_id = $request->ch_record_id;
        $ChPsConsciousness->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado de conciencia actualizada exitosamente',
            'data' => ['ch_ps_consciousness' => $ChPsConsciousness]
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
            $ChPsConsciousness = ChPsConsciousness::find($id);
            $ChPsConsciousness->delete();

            return response()->json([
                'status' => true,
                'message' => 'Estado de conciencia eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Estado de conciencia en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
