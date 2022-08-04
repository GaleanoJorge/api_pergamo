<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwConditionHousing;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChAssSigns;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChSwConditionHousingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwConditionHousing = ChSwConditionHousing::select();

        if ($request->_sort) {
            $ChSwConditionHousing->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChSwConditionHousing->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChSwConditionHousing = $ChSwConditionHousing->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChSwConditionHousing = $ChSwConditionHousing->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Condición de la vivienda obtenido exitosamente',
            'data' => ['ch_sw_condition_housing' => $ChSwConditionHousing]
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


        $ChSwConditionHousing = ChSwConditionHousing::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
          ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Condición de la vivienda obtenido exitosamente',
            'data' => ['ch_sw_condition_housing' => $ChSwConditionHousing]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ChSwConditionHousing = new ChSwConditionHousing;

        if (isset($request->ch_sw_services_id)) {
            foreach ($request->ch_sw_services_id as $element) {
                if ($element == 'Agua') {
                    $ChSwConditionHousing->water = $element;
                } else if ($element == 'Alcantarillado') {
                    $ChSwConditionHousing->sewerage = $element;
                } else if ($element == 'Gas') {
                    $ChSwConditionHousing->home = $element;
                } else if ($element == 'Luz') {
                    $ChSwConditionHousing->light = $element;
                }else if ($element == 'Telefono') {
                    $ChSwConditionHousing->telephone = $element;
                }
            }
        }
        

        $ChSwConditionHousing->num_rooms = $request->num_rooms;
        $ChSwConditionHousing->persons_rooms = $request->persons_rooms;
        $ChSwConditionHousing->rooms = $request->rooms;
        $ChSwConditionHousing->living_room = $request->living_room;
        $ChSwConditionHousing->dinning_room = $request->dinning_room;
        $ChSwConditionHousing->kitchen = $request->kitchen;
        $ChSwConditionHousing->bath = $request->bath;
        $ChSwConditionHousing->type_record_id = $request->type_record_id;
        $ChSwConditionHousing->ch_record_id = $request->ch_record_id;
        $ChSwConditionHousing->save();

        return response()->json([
            'status' => true,
            'message' => 'Condición de la vivienda asociados al paciente exitosamente',
            'data' => ['ch_sw_condition_housing' => $ChSwConditionHousing->toArray()]
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
        $ChSwConditionHousing = ChSwConditionHousing::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Condición de la vivienda asociado exitosamente',
            'data' => ['ch_sw_condition_housing' => $ChSwConditionHousing]
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
        $ChSwConditionHousing = ChSwConditionHousing::find($id);
        $ChSwConditionHousing->water = $request->water;
        $ChSwConditionHousing->light = $request->light;
        $ChSwConditionHousing->telephone = $request->telephone;
        $ChSwConditionHousing->sewerage = $request->sewerage;
        $ChSwConditionHousing->gas = $request->gas;
        $ChSwConditionHousing->num_rooms = $request->num_rooms;
        $ChSwConditionHousing->persons_rooms = $request->persons_rooms;
        $ChSwConditionHousing->rooms = $request->rooms;
        $ChSwConditionHousing->living_room = $request->living_room;
        $ChSwConditionHousing->dinning_room = $request->dinning_room;
        $ChSwConditionHousing->kitchen = $request->kitchen;
        $ChSwConditionHousing->bath = $request->bath;
        $ChSwConditionHousing->type_record_id = $request->type_record_id;
        $ChSwConditionHousing->ch_record_id = $request->ch_record_id;
        $ChSwConditionHousing->save();

        return response()->json([
            'status' => true,
            'message' => 'Condición de la vivienda actualizado exitosamente',
            'data' => ['ch_sw_condition_housing' => $ChSwConditionHousing]
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
            $ChSwConditionHousing = ChSwConditionHousing::find($id);
            $ChSwConditionHousing->delete();

            return response()->json([
                'status' => true,
                'message' => 'Condición de la vivienda eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Condición de la vivienda en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
