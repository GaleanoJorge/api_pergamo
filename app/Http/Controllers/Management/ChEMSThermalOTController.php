<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEMSThermalOT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChEMSThermalOTController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEMSThermalOT = ChEMSThermalOT::select();

        if($request->ch_record_id){
            $ChEMSThermalOT->where('ch_record_id', $request->ch_record_id)->where('type_record_id',1);
        }  
        
        if($request->_sort){
            $ChEMSThermalOT->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChEMSThermalOT->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChEMSThermalOT=$ChEMSThermalOT->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChEMSThermalOT=$ChEMSThermalOT->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_thermal_o_t' => $ChEMSThermalOT]
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
        
       
        $ChEMSThermalOT = ChEMSThermalOT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_thermal_o_t' => $ChEMSThermalOT]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        // $validate=ChEMSThermalOT::where('ch_record_id', $request->ch_record_id)->where('type_record_id', $request->type_record_id);
       
        // if(!$validate){
        $ChEMSThermalOT = new ChEMSThermalOT; 
        $ChEMSThermalOT->heat = $request-> heat; 
        $ChEMSThermalOT->cold = $request-> cold;

        $ChEMSThermalOT->type_record_id = $request->type_record_id; 
        $ChEMSThermalOT->ch_record_id = $request->ch_record_id; 
        $ChEMSThermalOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_m_s_thermal_o_t' => $ChEMSThermalOT->toArray()]
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
        $ChEMSThermalOT = ChEMSThermalOT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_m_s_thermal_o_t' => $ChEMSThermalOT]
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
        $ChEMSThermalOT = ChEMSThermalOT::find($id);  
        $ChEMSThermalOT->heat = $request-> heat; 
        $ChEMSThermalOT->cold = $request-> cold;

        $ChEMSThermalOT->type_record_id = $request->type_record_id; 
        $ChEMSThermalOT->ch_record_id = $request->ch_record_id; 
        $ChEMSThermalOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_m_s_thermal_o_t' => $ChEMSThermalOT]
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
            $ChEMSThermalOT = ChEMSThermalOT::find($id);
            $ChEMSThermalOT->delete();

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
