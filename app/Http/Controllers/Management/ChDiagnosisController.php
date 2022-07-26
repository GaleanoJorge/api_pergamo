<?php

namespace App\Http\Controllers\Management;

use App\Models\ChDiagnosis;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChDiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChDiagnosis = ChDiagnosis::select()
            ->with('diagnosis');

        if ($request->_sort) {
            $ChDiagnosis->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChDiagnosis->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChDiagnosis = $ChDiagnosis->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChDiagnosis = $ChDiagnosis->paginate($per_page, '*', 'page', $page);
        }
        if ($request->ch_diagnosis_class_id == 1) {
             ChDiagnosis::where('ch_record_id', $request->ch_record_id)->where('ch_diagnosis_class_id', 1)->first();


        } else {
             ChDiagnosis::where('ch_record_id', $request->ch_record_id)->where('ch_diagnosis_class_id', 3)->first();


        
        }


        return response()->json([
            'status' => true,
            'message' => 'Diagnósticos obtenidos exitosamente',
            'data' => ['ch_diagnosis' => $ChDiagnosis]
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
        $ChDiagnosis = ChDiagnosis::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->with('diagnosis', 'ch_diagnosis_class', 'ch_diagnosis_type')->get()->toArray();
        return response()->json([
            'status' => true,
            'message' => 'Diagnóstico obtenido exitosamente',
            'data' => ['ch_diagnosis' => $ChDiagnosis]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
       
        
            $ChDiagnosis = new ChDiagnosis;
            $ChDiagnosis->ch_diagnosis_type_id = $request->ch_diagnosis_type_id;
            $ChDiagnosis->ch_diagnosis_class_id = $request->ch_diagnosis_class_id;
            $ChDiagnosis->diagnosis_id = $request->diagnosis_id;
            $ChDiagnosis->diagnosis_observation = $request->diagnosis_observation;
            $ChDiagnosis->type_record_id = $request->type_record_id;
            $ChDiagnosis->ch_record_id = $request->ch_record_id;
            $ChDiagnosis->save();

            return response()->json([
                'status' => true,
                'message' => 'Diagnóstico asociado al paciente exitosamente',
                'data' => ['ch_diagnosis' => $ChDiagnosis->toArray()]
            ]);
        }
        // } else {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Ya tiene un diagnostico principal asociado'
        //     ], 423);
        // }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChDiagnosis = ChDiagnosis::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Diagnóstico obtenido exitosamente',
            'data' => ['ch_diagnosis' => $ChDiagnosis]
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
        $ChDiagnosis = ChDiagnosis::find($id);
        $ChDiagnosis->ch_diagnosis_type_id = $request->ch_diagnosis_type_id;
        $ChDiagnosis->ch_diagnosis_class_id = $request->ch_diagnosis_class_id;
        $ChDiagnosis->diagnosis_id = $request->diagnosis_id;
        $ChDiagnosis->diagnosis_observation = $request->diagnosis_observation;
        $ChDiagnosis->type_record_id = $request->type_record_id;
        $ChDiagnosis->ch_record_id = $request->ch_record_id;
        $ChDiagnosis->save();

        return response()->json([
            'status' => true,
            'message' => 'Diagnóstico actualizado exitosamente',
            'data' => ['ch_diagnosis' => $ChDiagnosis]
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
            $ChDiagnosis = ChDiagnosis::find($id);
            $ChDiagnosis->delete();

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
