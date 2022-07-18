<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEMSComponentOT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChEMSComponentOTController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEMSComponentOT = ChEMSComponentOT::select();

        if($request->ch_record_id){
            $ChEMSComponentOT->where('ch_record_id', $request->ch_record_id)->where('type_record_id',1);
        }  
        
        if($request->_sort){
            $ChEMSComponentOT->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChEMSComponentOT->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChEMSComponentOT=$ChEMSComponentOT->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChEMSComponentOT=$ChEMSComponentOT->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_component_o_t' => $ChEMSComponentOT]
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
        
       
        $ChEMSComponentOT = ChEMSComponentOT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->with('ch_e_m_s_component_o_t')->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_component_o_t' => $ChEMSComponentOT]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        // $validate=ChEMSComponentOT::where('ch_record_id', $request->ch_record_id)->where('type_record_id', $request->type_record_id);
       
        // if(!$validate){
        $ChEMSComponentOT = new ChEMSComponentOT; 
        $ChEMSComponentOT->dynamic_balance = $request-> dynamic_balance; 
        $ChEMSComponentOT->static_balance = $request-> static_balance;
        $ChEMSComponentOT->observation_component = $request-> observation_component; 

        $ChEMSComponentOT->type_record_id = $request->type_record_id; 
        $ChEMSComponentOT->ch_record_id = $request->ch_record_id; 
        $ChEMSComponentOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_m_s_component_o_t' => $ChEMSComponentOT->toArray()]
        ]);
    // }else{
    //     return response()->json([
    //         'status' => false,
    //         'message' => 'Ya tiene observación'
    //     ], 423);
    // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChEMSComponentOT = ChEMSComponentOT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_m_s_component_o_t' => $ChEMSComponentOT]
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
        $ChEMSComponentOT = ChEMSComponentOT::find($id);  
        $ChEMSComponentOT->dynamic_balance = $request-> dynamic_balance; 
        $ChEMSComponentOT->static_balance = $request-> static_balance;
        $ChEMSComponentOT->observation_component = $request-> observation_component; 

        $ChEMSComponentOT->type_record_id = $request->type_record_id; 
        $ChEMSComponentOT->ch_record_id = $request->ch_record_id; 
        $ChEMSComponentOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_m_s_component_o_t' => $ChEMSComponentOT]
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
            $ChEMSComponentOT = ChEMSComponentOT::find($id);
            $ChEMSComponentOT->delete();

            return response()->json([
                'status' => true,
                'message' => 'valoracion eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'valoracion en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
