<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsExcretion;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsExcretionController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsExcretion = ChPsExcretion::select();

        if($request->_sort){
            $ChPsExcretion->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsExcretion->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsExcretion=$ChPsExcretion->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsExcretion=$ChPsExcretion->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Aspectos de excreción obtenidas exitosamente',
            'data' => ['ch_ps_excretion' => $ChPsExcretion]
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
        
       
        $ChPsExcretion = ChPsExcretion::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de excreción obtenidas exitosamente',
            'data' => ['ch_ps_excretion' => $ChPsExcretion]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsExcretion = new ChPsExcretion;
        $ChPsExcretion->name = $request->name; 
        $ChPsExcretion->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de excreción asociadas al paciente exitosamente',
            'data' => ['ch_ps_excretion' => $ChPsExcretion->toArray()]
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
        $ChPsExcretion = ChPsExcretion::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de excreción obtenidas exitosamente',
            'data' => ['ch_ps_excretion' => $ChPsExcretion]
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
        $ChPsExcretion = ChPsExcretion::find($id);  
        $ChPsExcretion->name = $request->name; 
        $ChPsExcretion->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de excreción actualizadas exitosamente',
            'data' => ['ch_ps_excretion' => $ChPsExcretion]
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
            $ChPsExcretion = ChPsExcretion::find($id);
            $ChPsExcretion->delete();

            return response()->json([
                'status' => true,
                'message' => 'Aspectos de excreción eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Aspectos de excreción en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
