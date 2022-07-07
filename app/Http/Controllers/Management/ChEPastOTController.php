<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEPastOT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChEPastOTController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEPastOT = ChEPastOT::select();

        if($request->ch_record_id){
            $ChEPastOT->where('ch_record_id', $request->ch_record_id)->where('type_record_id',1);
        }  
        
        if($request->_sort){
            $ChEPastOT->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChEPastOT->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChEPastOT=$ChEPastOT->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChEPastOT=$ChEPastOT->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_past_o_t' => $ChEPastOT]
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
        
       
        $ChEPastOT = ChEPastOT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->with('ch_e_past_o_t')->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_past_o_t' => $ChEPastOT]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        // $validate=ChEPastOT::where('ch_record_id', $request->ch_record_id)->where('type_record_id', $request->type_record_id);
       
        // if(!$validate){
        $ChEPastOT = new ChEPastOT; 
        $ChEPastOT->family_base = $request-> family_base; 
        $ChEPastOT->number_childrens = $request-> number_childrens;
        $ChEPastOT->observation_family_struct = $request-> observation_family_struct;
        $ChEPastOT->academy = $request-> academy;
        $ChEPastOT->level_academy = $request-> level_academy;
        $ChEPastOT->observation_schooling_training = $request-> observation_schooling_training;
        $ChEPastOT->terapy = $request-> terapy;
        $ChEPastOT->observation_terapy = $request-> observation_terapy;
        $ChEPastOT->smoke = $request-> smoke;
        $ChEPastOT->f_smoke = $request-> f_smoke;
        $ChEPastOT->alcohol = $request-> alcohol;
        $ChEPastOT->f_alcohol = $request-> f_alcohol;
        $ChEPastOT->sport = $request-> sport;
        $ChEPastOT->f_sport = $request-> f_sport;
        $ChEPastOT->sport_practice_observation = $request-> sport_practice_observation;
        $ChEPastOT->observation = $request-> observation;

        $ChEPastOT->type_record_id = $request->type_record_id; 
        $ChEPastOT->ch_record_id = $request->ch_record_id; 
        $ChEPastOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_past_o_t' => $ChEPastOT->toArray()]
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
        $ChEPastOT = ChEPastOT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_past_o_t' => $ChEPastOT]
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
        $ChEPastOT = ChEPastOT::find($id);  
        $ChEPastOT->family_base = $request-> family_base; 
        $ChEPastOT->number_childrens = $request-> number_childrens;
        $ChEPastOT->observation_family_struct = $request-> observation_family_struct;
        $ChEPastOT->academy = $request-> academy;
        $ChEPastOT->level_academy = $request-> level_academy;
        $ChEPastOT->observation_schooling_training = $request-> observation_schooling_training;
        $ChEPastOT->terapy = $request-> terapy;
        $ChEPastOT->observation_terapy = $request-> observation_terapy;
        $ChEPastOT->smoke = $request-> smoke;
        $ChEPastOT->f_smoke = $request-> f_smoke;
        $ChEPastOT->alcohol = $request-> alcohol;
        $ChEPastOT->f_alcohol = $request-> f_alcohol;
        $ChEPastOT->sport = $request-> sport;
        $ChEPastOT->f_sport = $request-> f_sport;
        $ChEPastOT->sport_practice_observation = $request-> sport_practice_observation;
        $ChEPastOT->observation = $request-> observation;
        
        $ChEPastOT->type_record_id = $request->type_record_id; 
        $ChEPastOT->ch_record_id = $request->ch_record_id; 
        $ChEPastOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_past_o_t' => $ChEPastOT]
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
            $ChEPastOT = ChEPastOT::find($id);
            $ChEPastOT->delete();

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
