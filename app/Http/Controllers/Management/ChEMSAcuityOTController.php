<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEMSAcuityOT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\ChRecord;
use Illuminate\Database\QueryException;

class ChEMSAcuityOTController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEMSAcuityOT = ChEMSAcuityOT::select();

        if($request->ch_record_id){
            $ChEMSAcuityOT->where('ch_record_id', $request->ch_record_id)->where('type_record_id',1);
        }  
        
        if($request->_sort){
            $ChEMSAcuityOT->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChEMSAcuityOT->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChEMSAcuityOT=$ChEMSAcuityOT->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChEMSAcuityOT=$ChEMSAcuityOT->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_acuity_o_t' => $ChEMSAcuityOT]
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
        
       
        $ChEMSAcuityOT = ChEMSAcuityOT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $ChEMSAcuityOT = ChEMSAcuityOT::select('ch_e_m_s_acuity_o_t.*')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->where('ch_e_m_s_acuity_o_t.type_record_id', 1)
                    ->leftJoin('ch_record', 'ch_record.id', 'ch_e_m_s_acuity_o_t.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }
        

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_acuity_o_t' => $ChEMSAcuityOT]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        // $validate=ChEMSAcuityOT::where('ch_record_id', $request->ch_record_id)->where('type_record_id', $request->type_record_id);
       
        // if(!$validate){
        $ChEMSAcuityOT = new ChEMSAcuityOT; 
        $ChEMSAcuityOT->follow_up = $request-> follow_up; 
        $ChEMSAcuityOT->object_identify = $request-> object_identify;
        $ChEMSAcuityOT->figures = $request-> figures; 
        $ChEMSAcuityOT->color_design = $request-> color_design;
        $ChEMSAcuityOT->categorization = $request-> categorization; 
        $ChEMSAcuityOT->special_relation = $request-> special_relation;

        $ChEMSAcuityOT->type_record_id = $request->type_record_id; 
        $ChEMSAcuityOT->ch_record_id = $request->ch_record_id; 
        $ChEMSAcuityOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_m_s_acuity_o_t' => $ChEMSAcuityOT->toArray()]
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
        $ChEMSAcuityOT = ChEMSAcuityOT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_m_s_acuity_o_t' => $ChEMSAcuityOT]
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
        $ChEMSAcuityOT = ChEMSAcuityOT::find($id);  
        $ChEMSAcuityOT->follow_up = $request-> follow_up; 
        $ChEMSAcuityOT->object_identify = $request-> object_identify;
        $ChEMSAcuityOT->figures = $request-> figures; 
        $ChEMSAcuityOT->color_design = $request-> color_design;
        $ChEMSAcuityOT->categorization = $request-> categorization; 
        $ChEMSAcuityOT->special_relation = $request-> special_relation;

        $ChEMSAcuityOT->type_record_id = $request->type_record_id; 
        $ChEMSAcuityOT->ch_record_id = $request->ch_record_id; 
        $ChEMSAcuityOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_m_s_acuity_o_t' => $ChEMSAcuityOT]
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
            $ChEMSAcuityOT = ChEMSAcuityOT::find($id);
            $ChEMSAcuityOT->delete();

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
