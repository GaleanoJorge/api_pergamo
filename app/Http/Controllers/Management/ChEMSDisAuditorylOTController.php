<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEMSDisAuditorylOT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChEMSDisAuditorylOTController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEMSDisAuditorylOT = ChEMSDisAuditorylOT::select();

        if($request->ch_record_id){
            $ChEMSDisAuditorylOT->where('ch_record_id', $request->ch_record_id)->where('type_record_id',1);
        }  
        
        if($request->_sort){
            $ChEMSDisAuditorylOT->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChEMSDisAuditorylOT->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChEMSDisAuditorylOT=$ChEMSDisAuditorylOT->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChEMSDisAuditorylOT=$ChEMSDisAuditorylOT->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_dis_auditory_o_t' => $ChEMSDisAuditorylOT]
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
        
       
        $ChEMSDisAuditorylOT = ChEMSDisAuditorylOT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->with('ch_e_m_s_dis_auditory_o_t')->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_dis_auditory_o_t' => $ChEMSDisAuditorylOT]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        // $validate=ChEMSDisAuditorylOT::where('ch_record_id', $request->ch_record_id)->where('type_record_id', $request->type_record_id);
       
        // if(!$validate){
        $ChEMSDisAuditorylOT = new ChEMSDisAuditorylOT; 
        $ChEMSDisAuditorylOT->sound_sources = $request-> sound_sources; 
        $ChEMSDisAuditorylOT->auditory_hyposensitivity = $request-> auditory_hyposensitivity;
        $ChEMSDisAuditorylOT->auditory_hypersensitivity = $request-> auditory_hypersensitivity;
        $ChEMSDisAuditorylOT->auditory_stimuli = $request-> auditory_stimuli;
        $ChEMSDisAuditorylOT->auditive_discrimination = $request-> auditive_discrimination;

        $ChEMSDisAuditorylOT->type_record_id = $request->type_record_id; 
        $ChEMSDisAuditorylOT->ch_record_id = $request->ch_record_id; 
        $ChEMSDisAuditorylOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_m_s_dis_auditory_o_t' => $ChEMSDisAuditorylOT->toArray()]
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
        $ChEMSDisAuditorylOT = ChEMSDisAuditorylOT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_m_s_dis_auditory_o_t' => $ChEMSDisAuditorylOT]
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
        $ChEMSDisAuditorylOT = ChEMSDisAuditorylOT::find($id);  
        $ChEMSDisAuditorylOT->sound_sources = $request-> sound_sources; 
        $ChEMSDisAuditorylOT->auditory_hyposensitivity = $request-> auditory_hyposensitivity;
        $ChEMSDisAuditorylOT->auditory_hypersensitivity = $request-> auditory_hypersensitivity;
        $ChEMSDisAuditorylOT->auditory_stimuli = $request-> auditory_stimuli;
        $ChEMSDisAuditorylOT->auditive_discrimination = $request-> auditive_discrimination;

        $ChEMSDisAuditorylOT->type_record_id = $request->type_record_id; 
        $ChEMSDisAuditorylOT->ch_record_id = $request->ch_record_id; 
        $ChEMSDisAuditorylOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_m_s_dis_auditory_o_t' => $ChEMSDisAuditorylOT]
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
            $ChEMSDisAuditorylOT = ChEMSDisAuditorylOT::find($id);
            $ChEMSDisAuditorylOT->delete();

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
