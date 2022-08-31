<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEMSCommunicationOT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChEMSCommunicationOTController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEMSCommunicationOT = ChEMSCommunicationOT::select();

        if($request->ch_record_id){
            $ChEMSCommunicationOT->where('ch_record_id', $request->ch_record_id)->where('type_record_id',1);
        }  
        
        if($request->_sort){
            $ChEMSCommunicationOT->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChEMSCommunicationOT->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChEMSCommunicationOT=$ChEMSCommunicationOT->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChEMSCommunicationOT=$ChEMSCommunicationOT->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_communication_o_t' => $ChEMSCommunicationOT]
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
        
       
        $ChEMSCommunicationOT = ChEMSCommunicationOT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_communication_o_t' => $ChEMSCommunicationOT]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        // $validate=ChEMSCommunicationOT::where('ch_record_id', $request->ch_record_id)->where('type_record_id', $request->type_record_id);
       
        // if(!$validate){
        $ChEMSCommunicationOT = new ChEMSCommunicationOT; 
        $ChEMSCommunicationOT->community = $request-> community; 
        $ChEMSCommunicationOT->relatives = $request-> relatives;
        $ChEMSCommunicationOT->friends = $request-> friends; 
        $ChEMSCommunicationOT->health = $request-> health; 
        $ChEMSCommunicationOT->shopping = $request-> shopping;
        $ChEMSCommunicationOT->foods = $request-> foods; 
        $ChEMSCommunicationOT->bathe = $request-> bathe; 
        $ChEMSCommunicationOT->dress = $request-> dress;
        $ChEMSCommunicationOT->animals = $request-> animals; 

        $ChEMSCommunicationOT->type_record_id = $request->type_record_id; 
        $ChEMSCommunicationOT->ch_record_id = $request->ch_record_id; 
        $ChEMSCommunicationOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_m_s_communication_o_t' => $ChEMSCommunicationOT->toArray()]
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
        $ChEMSCommunicationOT = ChEMSCommunicationOT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_m_s_communication_o_t' => $ChEMSCommunicationOT]
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
        $ChEMSCommunicationOT = ChEMSCommunicationOT::find($id);  
        $ChEMSCommunicationOT->community = $request-> community; 
        $ChEMSCommunicationOT->relatives = $request-> relatives;
        $ChEMSCommunicationOT->friends = $request-> friends; 
        $ChEMSCommunicationOT->health = $request-> health; 
        $ChEMSCommunicationOT->shopping = $request-> shopping;
        $ChEMSCommunicationOT->foods = $request-> foods; 
        $ChEMSCommunicationOT->bathe = $request-> bathe; 
        $ChEMSCommunicationOT->dress = $request-> dress;
        $ChEMSCommunicationOT->animals = $request-> animals; 

        $ChEMSCommunicationOT->type_record_id = $request->type_record_id; 
        $ChEMSCommunicationOT->ch_record_id = $request->ch_record_id; 
        $ChEMSCommunicationOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_m_s_communication_o_t' => $ChEMSCommunicationOT]
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
            $ChEMSCommunicationOT = ChEMSCommunicationOT::find($id);
            $ChEMSCommunicationOT->delete();

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
