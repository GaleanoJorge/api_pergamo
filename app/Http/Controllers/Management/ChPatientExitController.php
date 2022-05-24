<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPatientExit;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChPatientExitRequest;
use Illuminate\Database\QueryException;

class ChPatientExitController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPatientExit = ChPatientExit::select();

        if($request->_sort){
            $ChPatientExit->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPatientExit->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPatientExit=$ChPatientExit->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPatientExit=$ChPatientExit->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Salida del Paciente  obtenidos exitosamente',
            'data' => ['ch_patient_exit' => $ChPatientExit]
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
        $ChPatientExit = ChPatientExit::where('ch_record_id', $id)->where('type_record_id',$type_record_id)->with('death_diagnosis','ch_diagnosis','exit_diagnosis','relations_diagnosis','reason_exit')
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Formula del paciente exitosamente',
            'data' => ['ch_patient_exit' => $ChPatientExit]
        ]);
    }

    public function store(ChPatientExitRequest $request): JsonResponse
    {
        $ChPatientExit = new ChPatientExit;
        $ChPatientExit->exit_status = $request->exit_status;   
        $ChPatientExit->legal_medicine_transfer = $request->legal_medicine_transfer; 
        $ChPatientExit->date_time = $request->date_time; 
        $ChPatientExit->death_diagnosis_id = $request->death_diagnosis_id; 
        $ChPatientExit->medical_signature = $request->medical_signature; 
        $ChPatientExit->death_certificate_number = $request->death_certificate_number; 
        $ChPatientExit->ch_diagnosis_id = $request->ch_diagnosis_id; 
        $ChPatientExit->exit_diagnosis_id = $request->exit_diagnosis_id; 
        $ChPatientExit->relations_diagnosis_id = $request->relations_diagnosis_id; 
        $ChPatientExit->reason_exit_id = $request->reason_exit_id; 
        $ChPatientExit->type_record_id = $request->type_record_id; 
        $ChPatientExit->ch_record_id = $request->ch_record_id; 

        $ChPatientExit->save();

        return response()->json([
            'status' => true,
            'message' => 'Salida del Paciente  creado exitosamente',
            'data' => ['ch_patient_exit' => $ChPatientExit->toArray()]
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
        $ChPatientExit = ChPatientExit::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Salida del Paciente  obtenido exitosamente',
            'data' => ['ch_patient_exit' => $ChPatientExit]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ChPatientExitRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ChPatientExitRequest $request, int $id): JsonResponse
    {
        $ChPatientExit = ChPatientExit ::find($id);
        $ChPatientExit->exit_status = $request->exit_status;   
        $ChPatientExit->legal_medicine_transfer = $request->legal_medicine_transfer; 
        $ChPatientExit->date_time = $request->date_time; 
        $ChPatientExit->death_diagnosis_id = $request->death_diagnosis_id; 
        $ChPatientExit->medical_signature = $request->medical_signature; 
        $ChPatientExit->death_certificate_number = $request->death_certificate_number; 
        $ChPatientExit->ch_diagnosis_id = $request->ch_diagnosis_id; 
        $ChPatientExit->exit_diagnosis_id = $request->exit_diagnosis_id; 
        $ChPatientExit->relations_diagnosis_id = $request->relations_diagnosis_id; 
        $ChPatientExit->reason_exit_id = $request->reason_exit_id; 
        $ChPatientExit->type_record_id = $request->type_record_id; 
        $ChPatientExit->ch_record_id = $request->ch_record_id;  
        $ChPatientExit->save();

        return response()->json([
            'status' => true,
            'message' => 'Salida del Paciente  actualizado exitosamente',
            'data' => ['ch_patient_exit' => $ChPatientExit]
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
            $ChPatientExit = ChPatientExit::find($id);
            $ChPatientExit->delete();

            return response()->json([
                'status' => true,
                'message' => 'Salida del Paciente  eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Salida del Paciente  esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
