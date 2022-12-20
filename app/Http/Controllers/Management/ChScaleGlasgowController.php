<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScaleGlasgow;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChScaleGlasgowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        if ($request->latest) {

            $ChScaleGlasgow = ChScaleGlasgow::where('ch_record_id', $request->ch_record_id)->orderBy('created_at', 'desc')->take(1)->get()->toArray();
        } else {

            $ChScaleGlasgow = ChScaleGlasgow::select();

            if ($request->_sort) {
                $ChScaleGlasgow->orderBy($request->_sort, $request->_order);
            }

            if ($request->search) {
                $ChScaleGlasgow->where('name', 'like', '%' . $request->search . '%');
            }


            if ($request->ch_record_id) {
                $ChScaleGlasgow->where('ch_record_id', $request->ch_record_id);
            }
            if ($request->latest  && isset($request->latest)) {
            }

            if ($request->query("pagination", true) == "false") {
                $ChScaleGlasgow = $ChScaleGlasgow->get()->toArray();
            } else {
                $page = $request->query("current_page", 1);
                $per_page = $request->query("per_page", 10);

                $ChScaleGlasgow = $ChScaleGlasgow->paginate($per_page, '*', 'page', $page);
            }
        }
        return response()->json([
            'status' => true,
            'message' => 'Escala Glasgow obtenida exitosamente',
            'data' => ['ch_scale_glasgow' => $ChScaleGlasgow]
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function getByRecord(int $id, int $type_record_id): JsonResponse
    {

        $ChScaleGlasgow = ChScaleGlasgow::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Escala Glasgow obtenida exitosamente',
            'data' => ['ch_scale_glasgow' => $ChScaleGlasgow]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScaleGlasgow = new ChScaleGlasgow;
        $ChScaleGlasgow->ocular_title = $request->ocular_title;
        $ChScaleGlasgow->ocular_value = $request->ocular_value;
        $ChScaleGlasgow->ocular_detail = $request->ocular_detail;
        $ChScaleGlasgow->verbal_title = $request->verbal_title;
        $ChScaleGlasgow->verbal_value = $request->verbal_value;
        $ChScaleGlasgow->verbal_detail = $request->verbal_detail;
        $ChScaleGlasgow->motor_title = $request->motor_title;
        $ChScaleGlasgow->motor_value = $request->motor_value;
        $ChScaleGlasgow->motor_detail = $request->motor_detail;
        $ChScaleGlasgow->total = $request->total;
        $ChScaleGlasgow->type_record_id = $request->type_record_id;
        $ChScaleGlasgow->ch_record_id = $request->ch_record_id;
        $ChScaleGlasgow->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Glasgow asociada al paciente exitosamente',
            'data' => ['ch_scale_glasgow' => $ChScaleGlasgow->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChScaleGlasgow = ChScaleGlasgow::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escala Glasgow obtenida exitosamente',
            'data' => ['ch_scale_glasgow' => $ChScaleGlasgow]
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
        $ChScaleGlasgow = ChScaleGlasgow::find($id);
        $ChScaleGlasgow->ocular_title = $request->ocular_title;
        $ChScaleGlasgow->ocular_value = $request->vocular_value;
        $ChScaleGlasgow->ocular_detail = $request->ocular_detail;
        $ChScaleGlasgow->verbal_title = $request->verbal_title;
        $ChScaleGlasgow->verbal_value = $request->verbal_value;
        $ChScaleGlasgow->verbal_detail = $request->verbal_detail;
        $ChScaleGlasgow->motor_title = $request->motor_title;
        $ChScaleGlasgow->motor_value = $request->motor_value;
        $ChScaleGlasgow->motor_detail = $request->motor_detail;
        $ChScaleGlasgow->total = $request->total;
        $ChScaleGlasgow->type_record_id = $request->type_record_id;
        $ChScaleGlasgow->ch_record_id = $request->ch_record_id;
        $ChScaleGlasgow->save();

        return response()->json([
            'status' => true,
            'message' => 'Escalas actualizada exitosamente',
            'data' => ['ch_scale_glasgow' => $ChScaleGlasgow]
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
            $ChScaleGlasgow = ChScaleGlasgow::find($id);

            $ChScaleGlasgow->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escala Glasgow eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escalas Glasgow en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
