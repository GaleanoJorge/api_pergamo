<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsMultiaxial;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChPsMultiaxialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsMultiaxial = ChPsMultiaxial::select('ch_ps_multiaxial.*');
        

        if ($request->_sort) {
            $ChPsMultiaxial->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChPsMultiaxial->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChPsMultiaxial = $ChPsMultiaxial->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChPsMultiaxial = $ChPsMultiaxial->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoración multiaxial obtenidos exitosamente',
            'data' => ['ch_ps_multiaxial' => $ChPsMultiaxial]
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


        $ChPsMultiaxial = ChPsMultiaxial::where('ch_record_id', $id)
        ->where('type_record_id', $type_record_id)->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Valoración multiaxial obtenida exitosamente',
            'data' => ['ch_ps_multiaxial' => $ChPsMultiaxial]
        ]);
    }


    public function store(Request $request): JsonResponse
    {

        $ChPsMultiaxial = new ChPsMultiaxial;
        $ChPsMultiaxial->axis_one = $request->axis_one;
        $ChPsMultiaxial->axis_two = $request->axis_two;
        $ChPsMultiaxial->axis_three = $request->axis_three;
        $ChPsMultiaxial->axis_four = $request->axis_four;
        $ChPsMultiaxial->eeag = $request->eeag;
        $ChPsMultiaxial->type_record_id = $request->type_record_id;
        $ChPsMultiaxial->ch_record_id = $request->ch_record_id;
        $ChPsMultiaxial->save();

        // $areas = json_decode($request->areas_id);
        // foreach ($areas as $element) {
        //     $ChNutritionDietDay = new ChPsMultiaxial;
        //     $ChNutritionDietDay->name = $element;
        //     $ChNutritionDietDay->ch_nutrition_food_history_id = $ChPsMultiaxial->id;
        //     $ChNutritionDietDay->save();
        // }


        return response()->json([
            'status' => true,
            'message' => 'Valoración multiaxial asociada al paciente exitosamente',
            'data' => ['ch_ps_multiaxial' => $ChPsMultiaxial->toArray()]
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
        $ChPsMultiaxial = ChPsMultiaxial::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoración multiaxial obtenida exitosamente',
            'data' => ['ch_ps_multiaxial' => $ChPsMultiaxial]
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
        $ChPsMultiaxial = ChPsMultiaxial::find($id);
        $ChPsMultiaxial->axis_one = $request->axis_one;
        $ChPsMultiaxial->axis_two = $request->axis_two;
        $ChPsMultiaxial->axis_three = $request->axis_three;
        $ChPsMultiaxial->axis_four = $request->axis_four;
        $ChPsMultiaxial->eeag = $request->eeag;
        $ChPsMultiaxial->type_record_id = $request->type_record_id;
        $ChPsMultiaxial->ch_record_id = $request->ch_record_id;
        $ChPsMultiaxial->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoración multiaxial actualizada exitosamente',
            'data' => ['ch_ps_multiaxial' => $ChPsMultiaxial]
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
            $ChPsMultiaxial = ChPsMultiaxial::find($id);
            $ChPsMultiaxial->delete();

            return response()->json([
                'status' => true,
                'message' => 'Valoración multiaxial eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Valoración multiaxial en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
