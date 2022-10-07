<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEMSDisTactileOT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\ChRecord;
use Illuminate\Database\QueryException;

class ChEMSDisTactileOTController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEMSDisTactileOT = ChEMSDisTactileOT::select();

        if($request->ch_record_id){
            $ChEMSDisTactileOT->where('ch_record_id', $request->ch_record_id)->where('type_record_id',1);
        }  
        
        if($request->_sort){
            $ChEMSDisTactileOT->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChEMSDisTactileOT->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChEMSDisTactileOT=$ChEMSDisTactileOT->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChEMSDisTactileOT=$ChEMSDisTactileOT->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_dis_tactile_o_t' => $ChEMSDisTactileOT]
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
        
       
        $ChEMSDisTactileOT = ChEMSDisTactileOT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $ChEMSDisTactileOT = ChEMSDisTactileOT::select('ch_e_m_s_dis_tactile_o_t.*')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->where('ch_e_m_s_dis_tactile_o_t.type_record_id', 1)
                    ->leftJoin('ch_record', 'ch_record.id', 'ch_e_m_s_dis_tactile_o_t.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }
        

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_dis_tactile_o_t' => $ChEMSDisTactileOT]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        // $validate=ChEMSDisTactileOT::where('ch_record_id', $request->ch_record_id)->where('type_record_id', $request->type_record_id);
       
        // if(!$validate){
        $ChEMSDisTactileOT = new ChEMSDisTactileOT; 
        $ChEMSDisTactileOT->right = $request-> right; 
        $ChEMSDisTactileOT->left = $request-> left;

        $ChEMSDisTactileOT->type_record_id = $request->type_record_id; 
        $ChEMSDisTactileOT->ch_record_id = $request->ch_record_id; 
        $ChEMSDisTactileOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_m_s_dis_tactile_o_t' => $ChEMSDisTactileOT->toArray()]
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
        $ChEMSDisTactileOT = ChEMSDisTactileOT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_m_s_dis_tactile_o_t' => $ChEMSDisTactileOT]
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
        $ChEMSDisTactileOT = ChEMSDisTactileOT::find($id);  
        $ChEMSDisTactileOT->right = $request-> right; 
        $ChEMSDisTactileOT->left = $request-> left;

        $ChEMSDisTactileOT->type_record_id = $request->type_record_id; 
        $ChEMSDisTactileOT->ch_record_id = $request->ch_record_id; 
        $ChEMSDisTactileOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_m_s_dis_tactile_o_t' => $ChEMSDisTactileOT]
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
            $ChEMSDisTactileOT = ChEMSDisTactileOT::find($id);
            $ChEMSDisTactileOT->delete();

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
