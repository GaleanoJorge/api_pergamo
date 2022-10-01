<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsOthers;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsOthersController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsOthers = ChPsOthers::select();

        if($request->_sort){
            $ChPsOthers->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsOthers->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsOthers=$ChPsOthers->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsOthers=$ChPsOthers->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Opciones de otros obtenidas exitosamente',
            'data' => ['ch_ps_others' => $ChPsOthers]
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
        
       
        $ChPsOthers = ChPsOthers::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Opciones de otros obtenidas exitosamente',
            'data' => ['ch_ps_others' => $ChPsOthers]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsOthers = new ChPsOthers;
        $ChPsOthers->name = $request->name; 
        $ChPsOthers->save();

        return response()->json([
            'status' => true,
            'message' => 'Opciones de otros asociadas al paciente exitosamente',
            'data' => ['ch_ps_others' => $ChPsOthers->toArray()]
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
        $ChPsOthers = ChPsOthers::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Opciones de otros obtenidas exitosamente',
            'data' => ['ch_ps_others' => $ChPsOthers]
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
        $ChPsOthers = ChPsOthers::find($id);  
        $ChPsOthers->name = $request->name; 
        $ChPsOthers->save();

        return response()->json([
            'status' => true,
            'message' => 'Opciones de otros actualizadas exitosamente',
            'data' => ['ch_ps_others' => $ChPsOthers]
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
            $ChPsOthers = ChPsOthers::find($id);
            $ChPsOthers->delete();

            return response()->json([
                'status' => true,
                'message' => 'Opciones de otros eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Opciones de otros en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
