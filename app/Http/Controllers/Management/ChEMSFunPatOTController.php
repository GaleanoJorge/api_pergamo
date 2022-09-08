<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEMSFunPatOT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\ChRecord;
use Illuminate\Database\QueryException;

class ChEMSFunPatOTController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEMSFunPatOT = ChEMSFunPatOT::select();

        if($request->ch_record_id){
            $ChEMSFunPatOT->where('ch_record_id', $request->ch_record_id);
        }
        
        if($request->type_record_id){
            $ChEMSFunPatOT->where('type_record_id', $request->type_record_id);
        }
        
        if($request->_sort){
            $ChEMSFunPatOT->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChEMSFunPatOT->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChEMSFunPatOT=$ChEMSFunPatOT->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChEMSFunPatOT=$ChEMSFunPatOT->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_fun_pat_o_t' => $ChEMSFunPatOT]
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
        
       
        $ChEMSFunPatOT = ChEMSFunPatOT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();
        
        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $ChEMSFunPatOT = ChEMSFunPatOT::select('ch_e_m_s_fun_pat_o_t.*')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->leftJoin('ch_record', 'ch_record.id', 'ch_e_m_s_fun_pat_o_t.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_fun_pat_o_t' => $ChEMSFunPatOT]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        // $validate=ChEMSFunPatOT::where('ch_record_id', $request->ch_record_id)->where('type_record_id', $request->type_record_id);
       
        // if(!$validate){
        $ChEMSFunPatOT = new ChEMSFunPatOT; 
        $ChEMSFunPatOT->head_right = $request-> head_right; 
        $ChEMSFunPatOT->head_left = $request-> head_left;
        $ChEMSFunPatOT->mouth_right = $request-> mouth_right;
        $ChEMSFunPatOT->mouth_left = $request-> mouth_left;
        $ChEMSFunPatOT->shoulder_right = $request-> shoulder_right;
        $ChEMSFunPatOT->shoulder_left = $request-> shoulder_left;
        $ChEMSFunPatOT->back_right = $request-> back_right;
        $ChEMSFunPatOT->back_left = $request-> back_left;
        $ChEMSFunPatOT->waist_right = $request-> waist_right;
        $ChEMSFunPatOT->waist_left = $request-> waist_left;
        $ChEMSFunPatOT->knee_right = $request-> knee_right;
        $ChEMSFunPatOT->knee_left = $request-> knee_left;
        $ChEMSFunPatOT->foot_right = $request-> foot_right;
        $ChEMSFunPatOT->foot_left = $request-> foot_left;

        $ChEMSFunPatOT->type_record_id = $request->type_record_id; 
        $ChEMSFunPatOT->ch_record_id = $request->ch_record_id; 
        $ChEMSFunPatOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_m_s_fun_pat_o_t' => $ChEMSFunPatOT->toArray()]
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
        $ChEMSFunPatOT = ChEMSFunPatOT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_m_s_fun_pat_o_t' => $ChEMSFunPatOT]
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
        $ChEMSFunPatOT = ChEMSFunPatOT::find($id);  
        $ChEMSFunPatOT->head_right = $request-> head_right; 
        $ChEMSFunPatOT->head_left = $request-> head_left;
        $ChEMSFunPatOT->mouth_right = $request-> mouth_right;
        $ChEMSFunPatOT->mouth_left = $request-> mouth_left;
        $ChEMSFunPatOT->shoulder_right = $request-> shoulder_right;
        $ChEMSFunPatOT->shoulder_left = $request-> shoulder_left;
        $ChEMSFunPatOT->back_right = $request-> back_right;
        $ChEMSFunPatOT->back_left = $request-> back_left;
        $ChEMSFunPatOT->waist_right = $request-> waist_right;
        $ChEMSFunPatOT->waist_left = $request-> waist_left;
        $ChEMSFunPatOT->knee_right = $request-> knee_right;
        $ChEMSFunPatOT->knee_left = $request-> knee_left;
        $ChEMSFunPatOT->foot_right = $request-> foot_right;
        $ChEMSFunPatOT->foot_left = $request-> foot_left;

        $ChEMSFunPatOT->type_record_id = $request->type_record_id; 
        $ChEMSFunPatOT->ch_record_id = $request->ch_record_id; 
        $ChEMSFunPatOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_m_s_fun_pat_o_t' => $ChEMSFunPatOT]
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
            $ChEMSFunPatOT = ChEMSFunPatOT::find($id);
            $ChEMSFunPatOT->delete();

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
