<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEMSTestOT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChEMSTestOTController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEMSTestOT = ChEMSTestOT::select();

        if($request->ch_record_id){
            $ChEMSTestOT->where('ch_record_id', $request->ch_record_id)->where('type_record_id',1);
        }  
        
        if($request->_sort){
            $ChEMSTestOT->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChEMSTestOT->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChEMSTestOT=$ChEMSTestOT->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChEMSTestOT=$ChEMSTestOT->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_test_o_t' => $ChEMSTestOT]
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
        
       
        $ChEMSTestOT = ChEMSTestOT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_test_o_t' => $ChEMSTestOT]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        // $validate=ChEMSTestOT::where('ch_record_id', $request->ch_record_id)->where('type_record_id', $request->type_record_id);
       
        // if(!$validate){
        $ChEMSTestOT = new ChEMSTestOT; 
        $ChEMSTestOT->appearance = $request-> appearance; 
        $ChEMSTestOT->consent = $request-> consent;
        $ChEMSTestOT->Attention = $request-> Attention; 
        $ChEMSTestOT->humor = $request-> humor; 
        $ChEMSTestOT->language = $request-> language;
        $ChEMSTestOT->sensory_perception = $request-> sensory_perception; 
        $ChEMSTestOT->grade = $request-> grade; 
        $ChEMSTestOT->contents = $request-> contents;
        $ChEMSTestOT->orientation = $request-> orientation; 
        $ChEMSTestOT->sleep = $request-> sleep; 
        $ChEMSTestOT->memory = $request-> memory;

        $ChEMSTestOT->type_record_id = $request->type_record_id; 
        $ChEMSTestOT->ch_record_id = $request->ch_record_id; 
        $ChEMSTestOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_m_s_test_o_t' => $ChEMSTestOT->toArray()]
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
        $ChEMSTestOT = ChEMSTestOT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_m_s_test_o_t' => $ChEMSTestOT]
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
        $ChEMSTestOT = ChEMSTestOT::find($id);  
        $ChEMSTestOT->appearance = $request-> appearance; 
        $ChEMSTestOT->consent = $request-> consent;
        $ChEMSTestOT->Attention = $request-> Attention; 
        $ChEMSTestOT->humor = $request-> humor; 
        $ChEMSTestOT->language = $request-> language;
        $ChEMSTestOT->sensory_perception = $request-> sensory_perception; 
        $ChEMSTestOT->grade = $request-> grade; 
        $ChEMSTestOT->contents = $request-> contents;
        $ChEMSTestOT->orientation = $request-> orientation; 
        $ChEMSTestOT->sleep = $request-> sleep; 
        $ChEMSTestOT->memory = $request-> memory;

        $ChEMSTestOT->type_record_id = $request->type_record_id; 
        $ChEMSTestOT->ch_record_id = $request->ch_record_id; 
        $ChEMSTestOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_m_s_test_o_t' => $ChEMSTestOT]
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
            $ChEMSTestOT = ChEMSTestOT::find($id);
            $ChEMSTestOT->delete();

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
