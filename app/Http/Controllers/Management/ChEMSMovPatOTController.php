<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEMSMovPatOT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\ChRecord;
use Illuminate\Database\QueryException;

class ChEMSMovPatOTController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEMSMovPatOT = ChEMSMovPatOT::select();

        if($request->ch_record_id){
            $ChEMSMovPatOT->where('ch_record_id', $request->ch_record_id)->where('type_record_id',1);
        }  
        
        if($request->_sort){
            $ChEMSMovPatOT->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChEMSMovPatOT->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChEMSMovPatOT=$ChEMSMovPatOT->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChEMSMovPatOT=$ChEMSMovPatOT->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_mov_pat_o_t' => $ChEMSMovPatOT]
        ]);
    }


        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(Request $request, int $id,int $type_record_id): JsonResponse
    {
        
       
        $ChEMSMovPatOT = ChEMSMovPatOT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $ChEMSMovPatOT = ChEMSMovPatOT::select('ch_e_m_s_mov_pat_o_t.*')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->where('ch_e_m_s_mov_pat_o_t.type_record_id', 1)
                    ->leftJoin('ch_record', 'ch_record.id', 'ch_e_m_s_mov_pat_o_t.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }
        

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_mov_pat_o_t' => $ChEMSMovPatOT]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        // $validate=ChEMSMovPatOT::where('ch_record_id', $request->ch_record_id)->where('type_record_id', $request->type_record_id);
       
        // if(!$validate){
        $ChEMSMovPatOT = new ChEMSMovPatOT; 
        $ChEMSMovPatOT->scroll_right = $request-> scroll_right; 
        $ChEMSMovPatOT->scroll_left = $request-> scroll_left;
        $ChEMSMovPatOT->get_up_right = $request-> get_up_right;
        $ChEMSMovPatOT->get_up_left = $request-> get_up_left;
        $ChEMSMovPatOT->push_right = $request-> push_right;
        $ChEMSMovPatOT->push_left = $request-> push_left;
        $ChEMSMovPatOT->pull_right = $request-> pull_right;
        $ChEMSMovPatOT->pull_left = $request-> pull_left;
        $ChEMSMovPatOT->transport_right = $request-> transport_right;
        $ChEMSMovPatOT->transport_left = $request-> transport_left;
        $ChEMSMovPatOT->attain_right = $request-> attain_right;
        $ChEMSMovPatOT->attain_left = $request-> attain_left;
        $ChEMSMovPatOT->bipedal_posture_right = $request-> bipedal_posture_right;
        $ChEMSMovPatOT->bipedal_posture_left = $request-> bipedal_posture_left;
        $ChEMSMovPatOT->sitting_posture_right = $request-> sitting_posture_right; 
        $ChEMSMovPatOT->sitting_posture_left = $request-> sitting_posture_left;
        $ChEMSMovPatOT->squat_posture_right = $request-> squat_posture_right;
        $ChEMSMovPatOT->squat_posture_left = $request-> squat_posture_left;
        $ChEMSMovPatOT->use_both_hands_right = $request-> use_both_hands_right;
        $ChEMSMovPatOT->use_both_hands_left = $request-> use_both_hands_left;
        $ChEMSMovPatOT->alternating_movements_right = $request-> alternating_movements_right;
        $ChEMSMovPatOT->alternating_movements_left = $request-> alternating_movements_left;
        $ChEMSMovPatOT->dissociated_movements_right = $request-> dissociated_movements_right;
        $ChEMSMovPatOT->dissociated_movements_left = $request-> dissociated_movements_left;
        $ChEMSMovPatOT->Simultaneous_movements_right = $request-> Simultaneous_movements_right;
        $ChEMSMovPatOT->Simultaneous_movements_left = $request-> Simultaneous_movements_left;
        $ChEMSMovPatOT->bimanual_coordination_right = $request-> bimanual_coordination_right;
        $ChEMSMovPatOT->bimanual_coordination_left = $request-> bimanual_coordination_left;
        $ChEMSMovPatOT->hand_eye_coordination_right = $request-> hand_eye_coordination_right;
        $ChEMSMovPatOT->hand_eye_coordination_left = $request-> hand_eye_coordination_left;
        $ChEMSMovPatOT->hand_foot_coordination_right = $request-> hand_foot_coordination_right;
        $ChEMSMovPatOT->hand_foot_coordination_left = $request-> hand_foot_coordination_left;

        $ChEMSMovPatOT->type_record_id = $request->type_record_id; 
        $ChEMSMovPatOT->ch_record_id = $request->ch_record_id; 
        $ChEMSMovPatOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_m_s_mov_pat_o_t' => $ChEMSMovPatOT->toArray()]
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
        $ChEMSMovPatOT = ChEMSMovPatOT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_m_s_mov_pat_o_t' => $ChEMSMovPatOT]
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
        $ChEMSMovPatOT = ChEMSMovPatOT::find($id);  
        $ChEMSMovPatOT->scroll_right = $request-> scroll_right; 
        $ChEMSMovPatOT->scroll_left = $request-> scroll_left;
        $ChEMSMovPatOT->get_up_right = $request-> get_up_right;
        $ChEMSMovPatOT->get_up_left = $request-> get_up_left;
        $ChEMSMovPatOT->push_right = $request-> push_right;
        $ChEMSMovPatOT->push_left = $request-> push_left;
        $ChEMSMovPatOT->pull_right = $request-> pull_right;
        $ChEMSMovPatOT->pull_left = $request-> pull_left;
        $ChEMSMovPatOT->transport_right = $request-> transport_right;
        $ChEMSMovPatOT->transport_left = $request-> transport_left;
        $ChEMSMovPatOT->attain_right = $request-> attain_right;
        $ChEMSMovPatOT->attain_left = $request-> attain_left;
        $ChEMSMovPatOT->bipedal_posture_right = $request-> bipedal_posture_right;
        $ChEMSMovPatOT->bipedal_posture_left = $request-> bipedal_posture_left;
        $ChEMSMovPatOT->sitting_posture_right = $request-> sitting_posture_right; 
        $ChEMSMovPatOT->sitting_posture_left = $request-> sitting_posture_left;
        $ChEMSMovPatOT->squat_posture_right = $request-> squat_posture_right;
        $ChEMSMovPatOT->squat_posture_left = $request-> squat_posture_left;
        $ChEMSMovPatOT->use_both_hands_right = $request-> use_both_hands_right;
        $ChEMSMovPatOT->use_both_hands_left = $request-> use_both_hands_left;
        $ChEMSMovPatOT->alternating_movements_right = $request-> alternating_movements_right;
        $ChEMSMovPatOT->alternating_movements_left = $request-> alternating_movements_left;
        $ChEMSMovPatOT->dissociated_movements_right = $request-> dissociated_movements_right;
        $ChEMSMovPatOT->dissociated_movements_left = $request-> dissociated_movements_left;
        $ChEMSMovPatOT->Simultaneous_movements_right = $request-> Simultaneous_movements_right;
        $ChEMSMovPatOT->Simultaneous_movements_left = $request-> Simultaneous_movements_left;
        $ChEMSMovPatOT->bimanual_coordination_right = $request-> bimanual_coordination_right;
        $ChEMSMovPatOT->bimanual_coordination_left = $request-> bimanual_coordination_left;
        $ChEMSMovPatOT->hand_eye_coordination_right = $request-> hand_eye_coordination_right;
        $ChEMSMovPatOT->hand_eye_coordination_left = $request-> hand_eye_coordination_left;
        $ChEMSMovPatOT->hand_foot_coordination_right = $request-> hand_foot_coordination_right;
        $ChEMSMovPatOT->hand_foot_coordination_left = $request-> hand_foot_coordination_left;

        $ChEMSMovPatOT->type_record_id = $request->type_record_id; 
        $ChEMSMovPatOT->ch_record_id = $request->ch_record_id; 
        $ChEMSMovPatOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_m_s_mov_pat_o_t' => $ChEMSMovPatOT]
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
            $ChEMSMovPatOT = ChEMSMovPatOT::find($id);
            $ChEMSMovPatOT->delete();

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
