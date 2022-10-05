<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsParaphasias;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsParaphasiasController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsParaphasias = ChPsParaphasias::select();

        if($request->_sort){
            $ChPsParaphasias->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsParaphasias->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsParaphasias=$ChPsParaphasias->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsParaphasias=$ChPsParaphasias->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Opciones de parafasias obtenidas exitosamente',
            'data' => ['ch_ps_paraphasias' => $ChPsParaphasias]
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
        
       
        $ChPsParaphasias = ChPsParaphasias::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Opciones de parafasias obtenidas exitosamente',
            'data' => ['ch_ps_paraphasias' => $ChPsParaphasias]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsParaphasias = new ChPsParaphasias;
        $ChPsParaphasias->name = $request->name; 
        $ChPsParaphasias->save();

        return response()->json([
            'status' => true,
            'message' => 'Opciones de parafasias asociadas al paciente exitosamente',
            'data' => ['ch_ps_paraphasias' => $ChPsParaphasias->toArray()]
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
        $ChPsParaphasias = ChPsParaphasias::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Opciones de parafasias obtenidas exitosamente',
            'data' => ['ch_ps_paraphasias' => $ChPsParaphasias]
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
        $ChPsParaphasias = ChPsParaphasias::find($id);  
        $ChPsParaphasias->name = $request->name; 
        $ChPsParaphasias->save();

        return response()->json([
            'status' => true,
            'message' => 'Opciones de parafasias actualizadas exitosamente',
            'data' => ['ch_ps_paraphasias' => $ChPsParaphasias]
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
            $ChPsParaphasias = ChPsParaphasias::find($id);
            $ChPsParaphasias->delete();

            return response()->json([
                'status' => true,
                'message' => 'Opciones de parafasias eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Opciones de parafasias en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
