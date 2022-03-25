<?php

namespace App\Http\Controllers\Management;

use App\Models\ChDiagnosisClass;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChDiagnosisClassController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChDiagnosisClass = ChDiagnosisClass::select();

        if($request->_sort){
            $ChDiagnosisClass->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChDiagnosisClass->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChDiagnosisClass=$ChDiagnosisClass->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChDiagnosisClass=$ChDiagnosisClass->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico obtenidos exitosamente',
            'data' => ['ch_diagnosis_class' => $ChDiagnosisClass]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChDiagnosisClass = new ChDiagnosisClass; 
        $ChDiagnosisClass->name = $request->name; 
        $ChDiagnosisClass->save();

        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico asociado al paciente exitosamente',
            'data' => ['ch_diagnosis_class' => $ChDiagnosisClass->toArray()]
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
        $ChDiagnosisClass = ChDiagnosisClass::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico obtenido exitosamente',
            'data' => ['ch_diagnosis_class' => $ChDiagnosisClass]
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
        $ChDiagnosisClass = ChDiagnosisClass::find($id);  
        $ChDiagnosisClass->name = $request->name; 
          
        
        
        $ChDiagnosisClass->save();

        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico actualizado exitosamente',
            'data' => ['ch_diagnosis_class' => $ChDiagnosisClass]
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
            $ChDiagnosisClass = ChDiagnosisClass::find($id);
            $ChDiagnosisClass->delete();

            return response()->json([
                'status' => true,
                'message' => 'Clase de diagnostico eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Clase de diagnostico en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
