<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwHousingAspect;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChAssSigns;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChSwHousingAspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwHousingAspect = ChSwHousingAspect::select();

        if ($request->_sort) {
            $ChSwHousingAspect->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChSwHousingAspect->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChSwHousingAspect = $ChSwHousingAspect->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChSwHousingAspect = $ChSwHousingAspect->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Aspectos vivienda obtenidos exitosamente',
            'data' => ['ch_sw_housing_aspect' => $ChSwHousingAspect]
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


        $ChSwHousingAspect = ChSwHousingAspect::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->with(
                'ch_sw_housing_type',
                'ch_sw_housing',
            )->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Aspectos vivienda obtenidos exitosamente',
            'data' => ['ch_sw_housing_aspect' => $ChSwHousingAspect]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ChSwHousingAspect = new ChSwHousingAspect;
        $ChSwHousingAspect->flat = $request->flat;
        $ChSwHousingAspect->lift = $request->lift;
        $ChSwHousingAspect->location = $request->location;
        $ChSwHousingAspect->vehicle_access = $request->vehicle_access;
        $ChSwHousingAspect->ch_sw_housing_type_id = $request->ch_sw_housing_type_id;
        $ChSwHousingAspect->ch_sw_housing_id = $request->ch_sw_housing_id;
        $ChSwHousingAspect->type_record_id = $request->type_record_id;
        $ChSwHousingAspect->ch_record_id = $request->ch_record_id;
        $ChSwHousingAspect->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos vivienda asociados al paciente exitosamente',
            'data' => ['ch_sw_housing_aspect' => $ChSwHousingAspect->toArray()]
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
        $ChSwHousingAspect = ChSwHousingAspect::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos vivienda asociados exitosamente',
            'data' => ['ch_sw_housing_aspect' => $ChSwHousingAspect]
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
        $ChSwHousingAspect = ChSwHousingAspect::find($id);
        $ChSwHousingAspect->flat = $request->flat;
        $ChSwHousingAspect->lift = $request->lift;
        $ChSwHousingAspect->location = $request->location;
        $ChSwHousingAspect->vehicle_access = $request->vehicle_access;
        $ChSwHousingAspect->ch_sw_housing_type_id = $request->ch_sw_housing_type_id;
        $ChSwHousingAspect->ch_sw_housing_id = $request->ch_sw_housing_id;
        $ChSwHousingAspect->type_record_id = $request->type_record_id;
        $ChSwHousingAspect->ch_record_id = $request->ch_record_id;
        $ChSwHousingAspect->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos vivienda actualizados exitosamente',
            'data' => ['ch_sw_housing_aspect' => $ChSwHousingAspect]
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
            $ChSwHousingAspect = ChSwHousingAspect::find($id);
            $ChSwHousingAspect->delete();

            return response()->json([
                'status' => true,
                'message' => 'Aspectos vivienda eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Aspectos vivienda en uso, no es posible eliminarlos'
            ], 423);
        }
    }
}
