<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScaleWongBaker;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChScaleWongBakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        if ($request->latest) {
            $ChScaleWongBaker = ChScaleWongBaker::where('ch_record_id', $request->ch_record_id)->orderBy('created_at', 'desc')->take(1)->get()->toArray();
        } else {

            $ChScaleWongBaker = ChScaleWongBaker::select();

            if ($request->_sort) {
                $ChScaleWongBaker->orderBy($request->_sort, $request->_order);
            }

            if ($request->search) {
                $ChScaleWongBaker->where('name', 'like', '%' . $request->search . '%');
            }
            if ($request->ch_record_id) {
                $ChScaleWongBaker->where('ch_record_id', $request->ch_record_id);
            }

            if ($request->latest  && isset($request->latest)) {
            }
            if ($request->query("pagination", true) == "false") {
                $ChScaleWongBaker = $ChScaleWongBaker->get()->toArray();
            } else {
                $page = $request->query("current_page", 1);
                $per_page = $request->query("per_page", 10);

                $ChScaleWongBaker = $ChScaleWongBaker->paginate($per_page, '*', 'page', $page);
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Escala Wong Baker obtenida exitosamente',
            'data' => ['ch_scale_wong_baker' => $ChScaleWongBaker]
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

        $ChScaleWongBaker = ChScaleWongBaker::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Escala Wong Baker obtenida exitosamente',
            'data' => ['ch_scale_wong_baker' => $ChScaleWongBaker]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScaleWongBaker = new ChScaleWongBaker;
        $ChScaleWongBaker->pain_title = $request->pain_title;
        $ChScaleWongBaker->pain_value = $request->pain_value;
        $ChScaleWongBaker->type_record_id = $request->type_record_id;
        $ChScaleWongBaker->ch_record_id = $request->ch_record_id;
        $ChScaleWongBaker->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Wong Baker asociada al paciente exitosamente',
            'data' => ['ch_scale_wong_baker' => $ChScaleWongBaker->toArray()]
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
        $ChScaleWongBaker = ChScaleWongBaker::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escala Wong Baker obtenida exitosamente',
            'data' => ['ch_scale_wong_baker' => $ChScaleWongBaker]
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
        $ChScaleWongBaker = ChScaleWongBaker::find($id);
        $ChScaleWongBaker->pain_title = $request->pain_title;
        $ChScaleWongBaker->pain_value = $request->pain_value;
        $ChScaleWongBaker->type_record_id = $request->type_record_id;
        $ChScaleWongBaker->ch_record_id = $request->ch_record_id;
        $ChScaleWongBaker->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Wong Baker actualizada exitosamente',
            'data' => ['ch_scale_wong_baker' => $ChScaleWongBaker]
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
            $ChScaleWongBaker = ChScaleWongBaker::find($id);

            $ChScaleWongBaker->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escala Wong Baker eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escala Wong Baker en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
