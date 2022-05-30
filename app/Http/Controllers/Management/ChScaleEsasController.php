<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScaleEsas;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChScaleEsasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        if ($request->latest) {
            $ChScaleEsas = ChScaleEsas::where('ch_record_id', $request->ch_record_id)->orderBy('created_at', 'desc')->take(1)->get()->toArray();
        } else {

            $ChScaleEsas = ChScaleEsas::select();

            if ($request->_sort) {
                $ChScaleEsas->orderBy($request->_sort, $request->_order);
            }

            if ($request->search) {
                $ChScaleEsas->where('name', 'like', '%' . $request->search . '%');
            }

            if ($request->ch_record_id) {
                $ChScaleEsas->where('ch_record_id', $request->ch_record_id);
            }
            if ($request->latest  && isset($request->latest)) {
            }
            if ($request->query("pagination", true) == "false") {
                $ChScaleEsas = $ChScaleEsas->get()->toArray();
            } else {
                $page = $request->query("current_page", 1);
                $per_page = $request->query("per_page", 10);

                $ChScaleEsas = $ChScaleEsas->paginate($per_page, '*', 'page', $page);
            }

        }
            return response()->json([
                'status' => true,
                'message' => 'Escalas obtenidos exitosamente',
                'data' => ['ch_scale_esas' => $ChScaleEsas]
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

        $ChScaleEsas = ChScaleEsas::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenidos exitosamente',
            'data' => ['ch_scale_esas' => $ChScaleEsas]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScaleEsas = new ChScaleEsas;
        $ChScaleEsas->pain_title = $request->pain_title;
        $ChScaleEsas->pain_value = $request->pain_value;
        $ChScaleEsas->tiredness_title = $request->tiredness_title;
        $ChScaleEsas->tiredness_value = $request->tiredness_value;
        $ChScaleEsas->retching_title = $request->retching_title;
        $ChScaleEsas->retching_value = $request->retching_value;
        $ChScaleEsas->depression_title = $request->depression_title;
        $ChScaleEsas->depression_value = $request->depression_value;
        $ChScaleEsas->anxiety_title = $request->anxiety_title;
        $ChScaleEsas->anxiety_value = $request->anxiety_value;
        $ChScaleEsas->drowsiness_title = $request->drowsiness_title;
        $ChScaleEsas->drowsiness_value = $request->drowsiness_value;
        $ChScaleEsas->appetite_title = $request->appetite_title;
        $ChScaleEsas->appetite_value = $request->appetite_value;
        $ChScaleEsas->breathing_title = $request->breathing_title;
        $ChScaleEsas->breathing_value = $request->breathing_value;
        $ChScaleEsas->welfare_title = $request->welfare_title;
        $ChScaleEsas->welfare_value = $request->welfare_value;
        $ChScaleEsas->sleep_title = $request->sleep_title;
        $ChScaleEsas->sleep_value = $request->sleep_value;
        $ChScaleEsas->observation = $request->observation;
        $ChScaleEsas->type_record_id = $request->type_record_id;
        $ChScaleEsas->ch_record_id = $request->ch_record_id;
        $ChScaleEsas->save();

        return response()->json([
            'status' => true,
            'message' => 'Escalas asociado al paciente exitosamente',
            'data' => ['ch_scale_esas' => $ChScaleEsas->toArray()]
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
        $ChScaleEsas = ChScaleEsas::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenido exitosamente',
            'data' => ['ch_scale_esas' => $ChScaleEsas]
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
        $ChScaleEsas = ChScaleEsas::find($id);
        $ChScaleEsas->pain_title = $request->pain_title;
        $ChScaleEsas->pain_value = $request->pain_value;
        $ChScaleEsas->tiredness_title = $request->tiredness_title;
        $ChScaleEsas->tiredness_value = $request->tiredness_value;
        $ChScaleEsas->retching_title = $request->retching_title;
        $ChScaleEsas->retching_value = $request->retching_value;
        $ChScaleEsas->depression_title = $request->depression_title;
        $ChScaleEsas->depression_value = $request->depression_value;
        $ChScaleEsas->anxiety_title = $request->anxiety_title;
        $ChScaleEsas->anxiety_value = $request->anxiety_value;
        $ChScaleEsas->drowsiness_title = $request->drowsiness_title;
        $ChScaleEsas->drowsiness_value = $request->drowsiness_value;
        $ChScaleEsas->appetite_title = $request->appetite_title;
        $ChScaleEsas->appetite_value = $request->appetite_value;
        $ChScaleEsas->breathing_title = $request->breathing_title;
        $ChScaleEsas->breathing_value = $request->breathing_value;
        $ChScaleEsas->welfare_title = $request->welfare_title;
        $ChScaleEsas->welfare_value = $request->welfare_value;
        $ChScaleEsas->sleep_title = $request->sleep_title;
        $ChScaleEsas->sleep_value = $request->sleep_value;
        $ChScaleEsas->observation = $request->observation;
        $ChScaleEsas->type_record_id = $request->type_record_id;
        $ChScaleEsas->ch_record_id = $request->ch_record_id;
        $ChScaleEsas->save();

        return response()->json([
            'status' => true,
            'message' => 'Escalas actualizado exitosamente',
            'data' => ['ch_scale_esas' => $ChScaleEsas]
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
            $ChScaleEsas = ChScaleEsas::find($id);

            $ChScaleEsas->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escalas eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escalas en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
