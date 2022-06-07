<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScalePain;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChScalePainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChScalePain = ChScalePain::select();

        if ($request->_sort) {
            $ChScalePain->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChScalePain->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChScalePain = $ChScalePain->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChScalePain = $ChScalePain->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Escala dolor adulto obtenida exitosamente',
            'data' => ['ch_scale_pain' => $ChScalePain]
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

        $ChScalePain = ChScalePain::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Escala dolor adulto obtenida exitosamente',
            'data' => ['ch_scale_pain' => $ChScalePain]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScalePain = new ChScalePain;
        $ChScalePain->range_title = $request->range_title;
        $ChScalePain->range_value = $request->range_value;
        $ChScalePain->type_record_id = $request->type_record_id;
        $ChScalePain->ch_record_id = $request->ch_record_id;
        $ChScalePain->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala dolor adulto asociada al paciente exitosamente',
            'data' => ['ch_scale_pain' => $ChScalePain->toArray()]
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
        $ChScalePain = ChScalePain::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escala dolor adulto obtenida exitosamente',
            'data' => ['ch_scale_pain' => $ChScalePain]
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
        $ChScalePain = ChScalePain::find($id);
        $ChScalePain->range_title = $request->range_title;
        $ChScalePain->range_value = $request->range_value;
        $ChScalePain->type_record_id = $request->type_record_id;
        $ChScalePain->ch_record_id = $request->ch_record_id;
        $ChScalePain->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala dolor adulto actualizada exitosamente',
            'data' => ['ch_scale_pain' => $ChScalePain]
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
            $ChScalePain = ChScalePain::find($id);

            $ChScalePain->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escala dolor adulto eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escala dolor adulto en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
