<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwDiagnosis;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChSwDiagnosisRequest;
use Illuminate\Database\QueryException;

class ChSwDiagnosisController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwDiagnosis = ChSwDiagnosis::with('ch_diagnosis', 'ch_diagnosis.diagnosis');

        if($request->_sort){
            $ChSwDiagnosis->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChSwDiagnosis->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChSwDiagnosis=$ChSwDiagnosis->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChSwDiagnosis=$ChSwDiagnosis->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Diagnositco obtenidos exitosamente',
            'data' => ['ch_sw_diagnosis' => $ChSwDiagnosis]
        ]);
    }
    
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(Request $request, int $id,int $type_record_id): JsonResponse
    {
        $ChSwDiagnosis = ChSwDiagnosis::with('ch_diagnosis', 'ch_diagnosis.diagnosis')
         ->where('ch_record_id', $id)
         ->where('type_record_id',$type_record_id);
           
        if ($request->query("pagination", true) == "false") {
            $ChSwDiagnosis = $ChSwDiagnosis->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChSwDiagnosis = $ChSwDiagnosis->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Diagnositco del paciente exitosamente',
            'data' => ['ch_sw_diagnosis' => $ChSwDiagnosis]
        ]);
    }

    public function store(ChSwDiagnosisRequest $request): JsonResponse
    {
        $ChSwDiagnosis = new ChSwDiagnosis;
        $ChSwDiagnosis->ch_diagnosis_id = $request->ch_diagnosis_id;   
        $ChSwDiagnosis->sw_diagnosis = $request->sw_diagnosis; 
        $ChSwDiagnosis->type_record_id = $request->type_record_id; 
        $ChSwDiagnosis->ch_record_id = $request->ch_record_id; 

        $ChSwDiagnosis->save();

        return response()->json([
            'status' => true,
            'message' => 'Diagnositco creado exitosamente',
            'data' => ['ch_sw_diagnosis' => $ChSwDiagnosis->toArray()]
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
        $ChSwDiagnosis = ChSwDiagnosis::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Diagnositco obtenido exitosamente',
            'data' => ['ch_sw_diagnosis' => $ChSwDiagnosis]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ChSwDiagnosisRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ChSwDiagnosisRequest $request, int $id): JsonResponse
    {
        $ChSwDiagnosis = ChSwDiagnosis ::find($id);
        $ChSwDiagnosis->ch_diagnosis_id = $request->ch_diagnosis_id;   
        $ChSwDiagnosis->sw_diagnosis = $request->sw_diagnosis; 
        $ChSwDiagnosis->type_record_id = $request->type_record_id; 
        $ChSwDiagnosis->ch_record_id = $request->ch_record_id;  
        $ChSwDiagnosis->save();

        return response()->json([
            'status' => true,
            'message' => 'Diagnositco actualizado exitosamente',
            'data' => ['ch_sw_diagnosis' => $ChSwDiagnosis]
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
            $ChSwDiagnosis = ChSwDiagnosis::find($id);
            $ChSwDiagnosis->delete();

            return response()->json([
                'status' => true,
                'message' => 'Diagnositco eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Diagnositco esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
