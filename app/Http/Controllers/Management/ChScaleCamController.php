<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScaleCam;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChScaleCamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        if ($request->latest) {
            $ChScaleCam = ChScaleCam::where('ch_record_id', $request->ch_record_id)->orderBy('created_at', 'desc')->take(1)->get()->toArray();
        } else {
            $ChScaleCam = ChScaleCam::select();

            if ($request->_sort) {
                $ChScaleCam->orderBy($request->_sort, $request->_order);
            }

            if ($request->search) {
                $ChScaleCam->where('name', 'like', '%' . $request->search . '%');
            }
            if ($request->ch_record_id) {
                $ChScaleCam->where('ch_record_id', $request->ch_record_id);
            }
            if ($request->latest  && isset($request->latest)) {
            }
            if ($request->query("pagination", true) == "false") {
                $ChScaleCam = $ChScaleCam->get()->toArray();
            } else {
                $page = $request->query("current_page", 1);
                $per_page = $request->query("per_page", 10);

                $ChScaleCam = $ChScaleCam->paginate($per_page, '*', 'page', $page);
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Escala CAM obtenida exitosamente',
            'data' => ['ch_scale_cam' => $ChScaleCam]
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

        $ChScaleCam = ChScaleCam::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Escala CAM obtenida exitosamente',
            'data' => ['ch_scale_cam' => $ChScaleCam]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScaleCam = new ChScaleCam;
        $ChScaleCam->mind_title = $request->mind_title;
        $ChScaleCam->mind_value = $request->mind_value;
        $ChScaleCam->mind_detail = $request->mind_detail;
        $ChScaleCam->attention_title = $request->attention_title;
        $ChScaleCam->attention_value = $request->attention_value;
        $ChScaleCam->attention_detail = $request->attention_detail;
        $ChScaleCam->thought_title = $request->thought_title;
        $ChScaleCam->thought_value = $request->thought_value;
        $ChScaleCam->thought_detail = $request->thought_detail;
        $ChScaleCam->awareness_title = $request->awareness_title;
        $ChScaleCam->awareness_value = $request->awareness_value;
        $ChScaleCam->awareness_detail = $request->awareness_detail;
        $ChScaleCam->result = $request->result;
        $ChScaleCam->type_record_id = $request->type_record_id;
        $ChScaleCam->ch_record_id = $request->ch_record_id;
        $ChScaleCam->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala CAM asociada al paciente exitosamente',
            'data' => ['ch_scale_cam' => $ChScaleCam->toArray()]
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
        $ChScaleCam = ChScaleCam::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escala CAM obtenida exitosamente',
            'data' => ['ch_scale_cam' => $ChScaleCam]
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
        $ChScaleCam = ChScaleCam::find($id);
        $ChScaleCam->mind_title = $request->mind_title;
        $ChScaleCam->mind_value = $request->mind_value;
        $ChScaleCam->mind_detail = $request->mind_detail;
        $ChScaleCam->attention_title = $request->attention_title;
        $ChScaleCam->attention_value = $request->attention_value;
        $ChScaleCam->attention_detail = $request->attention_detail;
        $ChScaleCam->thought_title = $request->thought_title;
        $ChScaleCam->thought_value = $request->thought_value;
        $ChScaleCam->thought_detail = $request->thought_detail;
        $ChScaleCam->awareness_title = $request->awareness_title;
        $ChScaleCam->awareness_value = $request->awareness_value;
        $ChScaleCam->awareness_detail = $request->awareness_detail;
        $ChScaleCam->result = $request->result;
        $ChScaleCam->type_record_id = $request->type_record_id;
        $ChScaleCam->ch_record_id = $request->ch_record_id;
        $ChScaleCam->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala CAM actualizada exitosamente',
            'data' => ['ch_scale_cam' => $ChScaleCam]
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
            $ChScaleCam = ChScaleCam::find($id);

            $ChScaleCam->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escala CAM eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escala CAM en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
