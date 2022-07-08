<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScalePps;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChScalePpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        if ($request->latest) {
            $ChScalePps = ChScalePps::where('ch_record_id', $request->ch_record_id)->orderBy('created_at', 'desc')->take(1)->get()->toArray();
        } else {
            $ChScalePps = ChScalePps::select();

            if ($request->_sort) {
                $ChScalePps->orderBy($request->_sort, $request->_order);
            }

            if ($request->search) {
                $ChScalePps->where('name', 'like', '%' . $request->search . '%');
            }
            if ($request->ch_record_id) {
                $ChScalePps->where('ch_record_id', $request->ch_record_id);
            }

            if ($request->latest  && isset($request->latest)) {
            }

            if ($request->query("pagination", true) == "false") {
                $ChScalePps = $ChScalePps->get()->toArray();
            } else {
                $page = $request->query("current_page", 1);
                $per_page = $request->query("per_page", 10);

                $ChScalePps = $ChScalePps->paginate($per_page, '*', 'page', $page);
            }
        }
        return response()->json([
            'status' => true,
            'message' => 'Escala Pps obtenida exitosamente',
            'data' => ['ch_scale_pps' => $ChScalePps]
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

        $ChScalePps = ChScalePps::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Escala Pps obtenida exitosamente',
            'data' => ['ch_scale_pps' => $ChScalePps]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScalePps = new ChScalePps;
        $ChScalePps->score_title = $request->score_title;
        $ChScalePps->score_value = $request->score_value;
        $ChScalePps->type_record_id = $request->type_record_id;
        $ChScalePps->ch_record_id = $request->ch_record_id;
        $ChScalePps->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Pps asociada al paciente exitosamente',
            'data' => ['ch_scale_pps' => $ChScalePps->toArray()]
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
        $ChScalePps = ChScalePps::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escala Pps obtenida exitosamente',
            'data' => ['ch_scale_pps' => $ChScalePps]
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
        $ChScalePps = ChScalePps::find($id);
        $ChScalePps->score = $request->score;
        $ChScalePps->type_record_id = $request->type_record_id;
        $ChScalePps->ch_record_id = $request->ch_record_id;
        $ChScalePps->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Pps actualizada exitosamente',
            'data' => ['ch_scale_pps' => $ChScalePps]
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
            $ChScalePps = ChScalePps::find($id);

            $ChScalePps->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escala Pps eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escala Pps en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
