<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEMSDisAuditoryOT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\ChRecord;
use Illuminate\Database\QueryException;

class ChEMSDisAuditoryOTController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEMSDisAuditoryOT = ChEMSDisAuditoryOT::select();

        if($request->ch_record_id){
            $ChEMSDisAuditoryOT->where('ch_record_id', $request->ch_record_id)->where('type_record_id',1);
        }  
        
        if($request->_sort){
            $ChEMSDisAuditoryOT->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChEMSDisAuditoryOT->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChEMSDisAuditoryOT=$ChEMSDisAuditoryOT->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChEMSDisAuditoryOT=$ChEMSDisAuditoryOT->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_dis_auditory_o_t' => $ChEMSDisAuditoryOT]
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
        
       
        $ChEMSDisAuditoryOT = ChEMSDisAuditoryOT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $ChEMSDisAuditoryOT = ChEMSDisAuditoryOT::select('ch_e_m_s_dis_auditory_o_t.*')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->leftJoin('ch_record', 'ch_record.id', 'ch_e_m_s_dis_auditory_o_t.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }
        

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_dis_auditory_o_t' => $ChEMSDisAuditoryOT]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        // $validate=ChEMSDisAuditoryOT::where('ch_record_id', $request->ch_record_id)->where('type_record_id', $request->type_record_id);
       
        // if(!$validate){
        $ChEMSDisAuditoryOT = new ChEMSDisAuditoryOT; 
        $ChEMSDisAuditoryOT->sound_sources = $request-> sound_sources; 
        $ChEMSDisAuditoryOT->auditory_hyposensitivity = $request-> auditory_hyposensitivity;
        $ChEMSDisAuditoryOT->auditory_hypersensitivity = $request-> auditory_hypersensitivity;
        $ChEMSDisAuditoryOT->auditory_stimuli = $request-> auditory_stimuli;
        $ChEMSDisAuditoryOT->auditive_discrimination = $request-> auditive_discrimination;

        $ChEMSDisAuditoryOT->type_record_id = $request->type_record_id; 
        $ChEMSDisAuditoryOT->ch_record_id = $request->ch_record_id; 
        $ChEMSDisAuditoryOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_m_s_dis_auditory_o_t' => $ChEMSDisAuditoryOT->toArray()]
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
        $ChEMSDisAuditoryOT = ChEMSDisAuditoryOT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_m_s_dis_auditory_o_t' => $ChEMSDisAuditoryOT]
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
        $ChEMSDisAuditoryOT = ChEMSDisAuditoryOT::find($id);  
        $ChEMSDisAuditoryOT->sound_sources = $request-> sound_sources; 
        $ChEMSDisAuditoryOT->auditory_hyposensitivity = $request-> auditory_hyposensitivity;
        $ChEMSDisAuditoryOT->auditory_hypersensitivity = $request-> auditory_hypersensitivity;
        $ChEMSDisAuditoryOT->auditory_stimuli = $request-> auditory_stimuli;
        $ChEMSDisAuditoryOT->auditive_discrimination = $request-> auditive_discrimination;

        $ChEMSDisAuditoryOT->type_record_id = $request->type_record_id; 
        $ChEMSDisAuditoryOT->ch_record_id = $request->ch_record_id; 
        $ChEMSDisAuditoryOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_m_s_dis_auditory_o_t' => $ChEMSDisAuditoryOT]
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
            $ChEMSDisAuditoryOT = ChEMSDisAuditoryOT::find($id);
            $ChEMSDisAuditoryOT->delete();

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
