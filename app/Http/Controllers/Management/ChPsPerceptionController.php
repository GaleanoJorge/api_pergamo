<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsPerception;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsPerceptionController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsPerception = ChPsPerception::select();

        if($request->_sort){
            $ChPsPerception->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsPerception->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsPerception=$ChPsPerception->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsPerception=$ChPsPerception->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Opciones de percepción obtenidas exitosamente',
            'data' => ['ch_ps_perception' => $ChPsPerception]
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
        
       
        $ChPsPerception = ChPsPerception::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Opciones de percepción obtenidas exitosamente',
            'data' => ['ch_ps_perception' => $ChPsPerception]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsPerception = new ChPsPerception;
        $ChPsPerception->name = $request->name; 
        $ChPsPerception->save();

        return response()->json([
            'status' => true,
            'message' => 'Opciones de percepción asociadas al paciente exitosamente',
            'data' => ['ch_ps_perception' => $ChPsPerception->toArray()]
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
        $ChPsPerception = ChPsPerception::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Opciones de percepción obtenidas exitosamente',
            'data' => ['ch_ps_perception' => $ChPsPerception]
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
        $ChPsPerception = ChPsPerception::find($id);  
        $ChPsPerception->name = $request->name; 
        $ChPsPerception->save();

        return response()->json([
            'status' => true,
            'message' => 'Opciones de percepción actualizadas exitosamente',
            'data' => ['ch_ps_perception' => $ChPsPerception]
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
            $ChPsPerception = ChPsPerception::find($id);
            $ChPsPerception->delete();

            return response()->json([
                'status' => true,
                'message' => 'Opciones de percepción eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Opciones de percepción en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
