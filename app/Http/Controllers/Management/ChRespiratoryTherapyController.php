<?php

namespace App\Http\Controllers\Management;

use App\Models\ChRespiratoryTherapy;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChRespiratoryTherapyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChRespiratoryTherapy = ChRespiratoryTherapy::select();

        if ($request->_sort) {
            $ChRespiratoryTherapy->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChRespiratoryTherapy->where('name', 'like', '%' . $request->search . '%');
        }
        
        if ($request->ch_record_id) {
            $ChRespiratoryTherapy->where('ch_record_id', $request->ch_record_id);
        }

        if ($request->query("pagination", true) == "false") {
            $ChRespiratoryTherapy = $ChRespiratoryTherapy->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChRespiratoryTherapy = $ChRespiratoryTherapy->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Diagnósticos obtenidos exitosamente',
            'data' => ['ch_respiratory_therapy' => $ChRespiratoryTherapy]
        ]);
    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id,int $type_record_id): JsonResponse
    {
        $ChRespiratoryTherapy = ChRespiratoryTherapy::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->with('medical_diagnosis') ->get()->toArray();
        return response()->json([
            'status' => true,
            'message' => 'Diagnóstico obtenido exitosamente',
            'data' => ['ch_respiratory_therapy' => $ChRespiratoryTherapy]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        if($request->ch_respiratory_therapy_class_id==1){
        $validate=ChRespiratoryTherapy::where('ch_record_id', $request->ch_record_id)->where('medical_diagnosis_id',$request->medical_diagnosis_id)->first();
        }else{
            $validate=null;
        }
        if(!$validate){
        $ChRespiratoryTherapy = new ChRespiratoryTherapy;
        $ChRespiratoryTherapy->medical_diagnosis_id = $request->medical_diagnosis_id;
        $ChRespiratoryTherapy->therapeutic_diagnosis = $request->therapeutic_diagnosis;
        $ChRespiratoryTherapy->reason_consultation = $request->reason_consultation;
        $ChRespiratoryTherapy->type_record_id = $request->type_record_id;
        $ChRespiratoryTherapy->ch_record_id = $request->ch_record_id;
        $ChRespiratoryTherapy->save();

        return response()->json([
            'status' => true,
            'message' => 'Diagnóstico asociado al paciente exitosamente',
            'data' => ['ch_respiratory_therapy' => $ChRespiratoryTherapy->toArray()]
        ]);
    }else{
        return response()->json([
            'status' => false,
            'message' => 'Ya tiene un diagnostico principal asociado'
        ], 423);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChRespiratoryTherapy = ChRespiratoryTherapy::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Diagnóstico obtenido exitosamente',
            'data' => ['ch_respiratory_therapy' => $ChRespiratoryTherapy]
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
        $ChRespiratoryTherapy = ChRespiratoryTherapy::find($id);
        $ChRespiratoryTherapy->medical_diagnosis_id = $request->medical_diagnosis_id;
        $ChRespiratoryTherapy->therapeutic_diagnosis = $request->therapeutic_diagnosis;
        $ChRespiratoryTherapy->reason_consultation = $request->reason_consultation;
        $ChRespiratoryTherapy->type_record_id = $request->type_record_id;
        $ChRespiratoryTherapy->ch_record_id = $request->ch_record_id;
        $ChRespiratoryTherapy->save();

        return response()->json([
            'status' => true,
            'message' => 'Diagnóstico actualizado exitosamente',
            'data' => ['ch_respiratory_therapy' => $ChRespiratoryTherapy]
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
            $ChRespiratoryTherapy = ChRespiratoryTherapy::find($id);
            $ChRespiratoryTherapy->delete();

            return response()->json([
                'status' => true,
                'message' => 'Diagnóstico eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Diagnóstico en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
