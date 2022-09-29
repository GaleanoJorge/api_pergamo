<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsAttention;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsAttentionController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsAttention = ChPsAttention::select();

        if($request->_sort){
            $ChPsAttention->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsAttention->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsAttention=$ChPsAttention->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsAttention=$ChPsAttention->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Opciones de atención obtenidas exitosamente',
            'data' => ['ch_ps_attention' => $ChPsAttention]
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
        
       
        $ChPsAttention = ChPsAttention::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Opciones de atención obtenidas exitosamente',
            'data' => ['ch_ps_attention' => $ChPsAttention]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsAttention = new ChPsAttention;
        $ChPsAttention->name = $request->name; 
        $ChPsAttention->save();

        return response()->json([
            'status' => true,
            'message' => 'Opciones de atención asociadas al paciente exitosamente',
            'data' => ['ch_ps_attention' => $ChPsAttention->toArray()]
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
        $ChPsAttention = ChPsAttention::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Opciones de atención obtenidas exitosamente',
            'data' => ['ch_ps_attention' => $ChPsAttention]
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
        $ChPsAttention = ChPsAttention::find($id);  
        $ChPsAttention->name = $request->name; 
        $ChPsAttention->save();

        return response()->json([
            'status' => true,
            'message' => 'Opciones de atención actualizadas exitosamente',
            'data' => ['ch_ps_attention' => $ChPsAttention]
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
            $ChPsAttention = ChPsAttention::find($id);
            $ChPsAttention->delete();

            return response()->json([
                'status' => true,
                'message' => 'Opciones de atención eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Opciones de atención en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
