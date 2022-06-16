<?php

namespace App\Http\Controllers\Management;

use App\Models\TlTherapyLanguage;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TlTherapyLanguageRequest;
use Illuminate\Database\QueryException;

class TlTherapyLanguageController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $TlTherapyLanguage = TlTherapyLanguage::select();

        if($request->_sort){
            $TlTherapyLanguage->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $TlTherapyLanguage->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $TlTherapyLanguage=$TlTherapyLanguage->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $TlTherapyLanguage=$TlTherapyLanguage->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Evolución T. Lenguaje del Paciente  obtenidos exitosamente',
            'data' => ['tl_therapy_language' => $TlTherapyLanguage]
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
        $TlTherapyLanguage = TlTherapyLanguage::with('medical_diagnostic','therapeutic_diagnosis') ->where('ch_record_id', $id)->where('type_record_id',$type_record_id);
           
        if ($request->query("pagination", true) == "false") {
            $TlTherapyLanguage = $TlTherapyLanguage->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $TlTherapyLanguage = $TlTherapyLanguage->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Evolución T. Lenguaje del paciente del paciente exitosamente',
            'data' => ['tl_therapy_language' => $TlTherapyLanguage]
        ]);
    }

    public function store(TlTherapyLanguageRequest $request): JsonResponse
    {
        $TlTherapyLanguage = new TlTherapyLanguage;
        $TlTherapyLanguage->medical_diagnostic_id = $request->medical_diagnostic_id;   
        $TlTherapyLanguage->therapeutic_diagnosis_id = $request->therapeutic_diagnosis_id; 
        $TlTherapyLanguage->reason_consultation = $request->reason_consultation; 
        $TlTherapyLanguage->type_record_id = $request->type_record_id; 
        $TlTherapyLanguage->ch_record_id = $request->ch_record_id; 

        $TlTherapyLanguage->save();

        return response()->json([
            'status' => true,
            'message' => 'Evolución T. Lenguaje del Paciente  creado exitosamente',
            'data' => ['tl_therapy_language' => $TlTherapyLanguage->toArray()]
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
        $TlTherapyLanguage = TlTherapyLanguage::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Evolución T. Lenguaje del Paciente  obtenido exitosamente',
            'data' => ['tl_therapy_language' => $TlTherapyLanguage]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TlTherapyLanguageRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(TlTherapyLanguageRequest $request, int $id): JsonResponse
    {
        $TlTherapyLanguage = TlTherapyLanguage ::find($id);
        $TlTherapyLanguage->medical_diagnostic_id = $request->medical_diagnostic_id;   
        $TlTherapyLanguage->therapeutic_diagnosis_id = $request->therapeutic_diagnosis_id; 
        $TlTherapyLanguage->reason_consultation = $request->reason_consultation; 
        $TlTherapyLanguage->type_record_id = $request->type_record_id; 
        $TlTherapyLanguage->ch_record_id = $request->ch_record_id;  
        $TlTherapyLanguage->save();

        return response()->json([
            'status' => true,
            'message' => 'Evolución T. Lenguaje del Paciente  actualizado exitosamente',
            'data' => ['tl_therapy_language' => $TlTherapyLanguage]
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
            $TlTherapyLanguage = TlTherapyLanguage::find($id);
            $TlTherapyLanguage->delete();

            return response()->json([
                'status' => true,
                'message' => 'Evolución T. Lenguaje del Paciente  eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Evolución T. Lenguaje del Paciente  esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
