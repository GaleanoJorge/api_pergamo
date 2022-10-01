<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsMemory;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsMemoryController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsMemory = ChPsMemory::select();

        if($request->_sort){
            $ChPsMemory->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsMemory->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsMemory=$ChPsMemory->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsMemory=$ChPsMemory->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Opciones de memoria obtenidas exitosamente',
            'data' => ['ch_ps_memory' => $ChPsMemory]
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
        
       
        $ChPsMemory = ChPsMemory::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Opciones de memoria obtenidas exitosamente',
            'data' => ['ch_ps_memory' => $ChPsMemory]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsMemory = new ChPsMemory;
        $ChPsMemory->name = $request->name; 
        $ChPsMemory->save();

        return response()->json([
            'status' => true,
            'message' => 'Opciones de memoria asociadas al paciente exitosamente',
            'data' => ['ch_ps_memory' => $ChPsMemory->toArray()]
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
        $ChPsMemory = ChPsMemory::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Opciones de memoria obtenidas exitosamente',
            'data' => ['ch_ps_memory' => $ChPsMemory]
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
        $ChPsMemory = ChPsMemory::find($id);  
        $ChPsMemory->name = $request->name; 
        $ChPsMemory->save();

        return response()->json([
            'status' => true,
            'message' => 'Opciones de memoria actualizadas exitosamente',
            'data' => ['ch_ps_memory' => $ChPsMemory]
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
            $ChPsMemory = ChPsMemory::find($id);
            $ChPsMemory->delete();

            return response()->json([
                'status' => true,
                'message' => 'Opciones de memoria eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Opciones de memoria en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
