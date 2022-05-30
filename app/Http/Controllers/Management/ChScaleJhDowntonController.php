<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScaleJhDownton;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChScaleJhDowntonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        if ($request->latest) {
            $ChScaleJhDownton = ChScaleJhDownton::where('ch_record_id', $request->ch_record_id)->orderBy('created_at', 'desc')->take(1)->get()->toArray();
        } else {
            $ChScaleJhDownton = ChScaleJhDownton::select();

            if ($request->_sort) {
                $ChScaleJhDownton->orderBy($request->_sort, $request->_order);
            }

            if ($request->search) {
                $ChScaleJhDownton->where('name', 'like', '%' . $request->search . '%');
            }
            if ($request->ch_record_id) {
                $ChScaleJhDownton->where('ch_record_id', $request->ch_record_id);
            }

            if ($request->latest  && isset($request->latest)) {
            }
            if ($request->query("pagination", true) == "false") {
                $ChScaleJhDownton = $ChScaleJhDownton->get()->toArray();
            } else {
                $page = $request->query("current_page", 1);
                $per_page = $request->query("per_page", 10);

                $ChScaleJhDownton = $ChScaleJhDownton->paginate($per_page, '*', 'page', $page);
            }
        }
        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenidos exitosamente',
            'data' => ['ch_scale_jh_downton' => $ChScaleJhDownton]
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

        $ChScaleJhDownton = ChScaleJhDownton::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenidos exitosamente',
            'data' => ['ch_scale_jh_downton' => $ChScaleJhDownton]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScaleJhDownton = new ChScaleJhDownton;
        $ChScaleJhDownton->falls_title = $request->falls_title;
        $ChScaleJhDownton->falls_value = $request->falls_value;
        $ChScaleJhDownton->falls_detail = $request->falls_detail;
        $ChScaleJhDownton->medication_title = $request->medication_title;
        $ChScaleJhDownton->medication_value = $request->medication_value;
        $ChScaleJhDownton->medication_detail = $request->medication_detail;
        $ChScaleJhDownton->deficiency_title = $request->deficiency_title;
        $ChScaleJhDownton->deficiency_value = $request->deficiency_value;
        $ChScaleJhDownton->deficiency_detail = $request->deficiency_detail;
        $ChScaleJhDownton->mental_title = $request->mental_title;
        $ChScaleJhDownton->mental_value = $request->mental_value;
        $ChScaleJhDownton->mental_detail = $request->mental_detail;
        $ChScaleJhDownton->wandering_title = $request->wandering_title;
        $ChScaleJhDownton->wandering_value = $request->wandering_value;
        $ChScaleJhDownton->wandering_detail = $request->wandering_detail;
        $ChScaleJhDownton->total = $request->total;
        $ChScaleJhDownton->risk = $request->risk;
        $ChScaleJhDownton->type_record_id = $request->type_record_id;
        $ChScaleJhDownton->ch_record_id = $request->ch_record_id;
        $ChScaleJhDownton->save();

        return response()->json([
            'status' => true,
            'message' => 'Escalas asociado al paciente exitosamente',
            'data' => ['ch_scale_jh_downton' => $ChScaleJhDownton->toArray()]
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
        $ChScaleJhDownton = ChScaleJhDownton::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenido exitosamente',
            'data' => ['ch_scale_jh_downton' => $ChScaleJhDownton]
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
        $ChScaleJhDownton = ChScaleJhDownton::find($id);
        $ChScaleJhDownton->falls_title = $request->falls_title;
        $ChScaleJhDownton->falls_value = $request->falls_value;
        $ChScaleJhDownton->falls_detail = $request->falls_detail;
        $ChScaleJhDownton->medication_title = $request->medication_title;
        $ChScaleJhDownton->medication_value = $request->medication_value;
        $ChScaleJhDownton->medication_detail = $request->medication_detail;
        $ChScaleJhDownton->deficiency_title = $request->deficiency_title;
        $ChScaleJhDownton->deficiency_value = $request->deficiency_value;
        $ChScaleJhDownton->deficiency_detail = $request->deficiency_detail;
        $ChScaleJhDownton->mental_title = $request->mental_title;
        $ChScaleJhDownton->mental_value = $request->mental_value;
        $ChScaleJhDownton->mental_detail = $request->mental_detail;
        $ChScaleJhDownton->wandering_title = $request->wandering_title;
        $ChScaleJhDownton->wandering_value = $request->wandering_value;
        $ChScaleJhDownton->wandering_detail = $request->wandering_detail;
        $ChScaleJhDownton->total = $request->total;
        $ChScaleJhDownton->risk = $request->risk;
        $ChScaleJhDownton->type_record_id = $request->type_record_id;
        $ChScaleJhDownton->ch_record_id = $request->ch_record_id;
        $ChScaleJhDownton->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Jh Downton actualizado exitosamente',
            'data' => ['ch_scale_jh_downton' => $ChScaleJhDownton]
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
            $ChScaleJhDownton = ChScaleJhDownton::find($id);

            $ChScaleJhDownton->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escala Jh Downton eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escala Jh Downton en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
