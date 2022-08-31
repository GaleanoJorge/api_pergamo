<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEMSIntPatOT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChEMSIntPatOTController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEMSIntPatOT = ChEMSIntPatOT::select();

        if($request->ch_record_id){
            $ChEMSIntPatOT->where('ch_record_id', $request->ch_record_id)->where('type_record_id',1);
        }  
        
        if($request->_sort){
            $ChEMSIntPatOT->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChEMSIntPatOT->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChEMSIntPatOT=$ChEMSIntPatOT->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChEMSIntPatOT=$ChEMSIntPatOT->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_int_pat_o_t' => $ChEMSIntPatOT]
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
        
       
        $ChEMSIntPatOT = ChEMSIntPatOT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_int_pat_o_t' => $ChEMSIntPatOT]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        // $validate=ChEMSIntPatOT::where('ch_record_id', $request->ch_record_id)->where('type_record_id', $request->type_record_id);
       
        // if(!$validate){
        $ChEMSIntPatOT = new ChEMSIntPatOT; 
        $ChEMSIntPatOT->up_right = $request-> up_right; 
        $ChEMSIntPatOT->up_left = $request-> up_left;
        $ChEMSIntPatOT->side_right = $request-> side_right;
        $ChEMSIntPatOT->side_left = $request-> side_left;
        $ChEMSIntPatOT->backend_right = $request-> backend_right;
        $ChEMSIntPatOT->backend_left = $request-> backend_left;
        $ChEMSIntPatOT->frontend_right = $request-> frontend_right;
        $ChEMSIntPatOT->frontend_left = $request-> frontend_left;
        $ChEMSIntPatOT->down_right = $request-> down_right;
        $ChEMSIntPatOT->down_left = $request-> down_left;
        $ChEMSIntPatOT->full_hand_right = $request-> full_hand_right;
        $ChEMSIntPatOT->full_hand_left = $request-> full_hand_left;
        $ChEMSIntPatOT->cylindric_right = $request-> cylindric_right;
        $ChEMSIntPatOT->cylindric_left = $request-> cylindric_left;
        $ChEMSIntPatOT->hooking_right = $request-> hooking_right; 
        $ChEMSIntPatOT->hooking_left = $request-> hooking_left;
        $ChEMSIntPatOT->fine_clamp_right = $request-> fine_clamp_right;
        $ChEMSIntPatOT->fine_clamp_left = $request-> fine_clamp_left;
        $ChEMSIntPatOT->tripod_right = $request-> tripod_right;
        $ChEMSIntPatOT->tripod_left = $request-> tripod_left;
        $ChEMSIntPatOT->opposition_right = $request-> opposition_right;
        $ChEMSIntPatOT->opposition_left = $request-> opposition_left;
        $ChEMSIntPatOT->coil_right = $request-> coil_right;
        $ChEMSIntPatOT->coil_left = $request-> coil_left;

        $ChEMSIntPatOT->type_record_id = $request->type_record_id; 
        $ChEMSIntPatOT->ch_record_id = $request->ch_record_id; 
        $ChEMSIntPatOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_m_s_int_pat_o_t' => $ChEMSIntPatOT->toArray()]
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
        $ChEMSIntPatOT = ChEMSIntPatOT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_m_s_int_pat_o_t' => $ChEMSIntPatOT]
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
        $ChEMSIntPatOT = ChEMSIntPatOT::find($id);  
        $ChEMSIntPatOT->up_right = $request-> up_right; 
        $ChEMSIntPatOT->up_left = $request-> up_left;
        $ChEMSIntPatOT->side_right = $request-> side_right;
        $ChEMSIntPatOT->side_left = $request-> side_left;
        $ChEMSIntPatOT->backend_right = $request-> backend_right;
        $ChEMSIntPatOT->backend_left = $request-> backend_left;
        $ChEMSIntPatOT->frontend_right = $request-> frontend_right;
        $ChEMSIntPatOT->frontend_left = $request-> frontend_left;
        $ChEMSIntPatOT->down_right = $request-> down_right;
        $ChEMSIntPatOT->down_left = $request-> down_left;
        $ChEMSIntPatOT->full_hand_right = $request-> full_hand_right;
        $ChEMSIntPatOT->full_hand_left = $request-> full_hand_left;
        $ChEMSIntPatOT->cylindric_right = $request-> cylindric_right;
        $ChEMSIntPatOT->cylindric_left = $request-> cylindric_left;
        $ChEMSIntPatOT->hooking_right = $request-> hooking_right; 
        $ChEMSIntPatOT->hooking_left = $request-> hooking_left;
        $ChEMSIntPatOT->fine_clamp_right = $request-> fine_clamp_right;
        $ChEMSIntPatOT->fine_clamp_left = $request-> fine_clamp_left;
        $ChEMSIntPatOT->tripod_right = $request-> tripod_right;
        $ChEMSIntPatOT->tripod_left = $request-> tripod_left;
        $ChEMSIntPatOT->opposition_right = $request-> opposition_right;
        $ChEMSIntPatOT->opposition_left = $request-> opposition_left;
        $ChEMSIntPatOT->coil_right = $request-> coil_right;
        $ChEMSIntPatOT->coil_left = $request-> coil_left;

        $ChEMSIntPatOT->type_record_id = $request->type_record_id; 
        $ChEMSIntPatOT->ch_record_id = $request->ch_record_id; 
        $ChEMSIntPatOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_m_s_int_pat_o_t' => $ChEMSIntPatOT]
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
            $ChEMSIntPatOT = ChEMSIntPatOT::find($id);
            $ChEMSIntPatOT->delete();

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
