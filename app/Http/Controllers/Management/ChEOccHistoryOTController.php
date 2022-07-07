<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEOccHistoryOT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChEOccHistoryOTController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEOccHistoryOT = ChEOccHistoryOT::select();


        if($request->ch_record_id){
            $ChEOccHistoryOT->where('ch_record_id', $request->ch_record_id)->where('type_record_id',1);
        }  

        if($request->_sort){
            $ChEOccHistoryOT->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChEOccHistoryOT->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChEOccHistoryOT=$ChEOccHistoryOT->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChEOccHistoryOT=$ChEOccHistoryOT->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_occ_history_o_t' => $ChEOccHistoryOT]
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
        
       
        $ChEOccHistoryOT = ChEOccHistoryOT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->with('ch_e_occ_history_o_t')->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_occ_history_o_t' => $ChEOccHistoryOT]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        // $validate=ChEOccHistoryOT::where('ch_record_id', $request->ch_record_id)->where('type_record_id', $request->type_record_id);
       
        // if(!$validate){
        $ChEOccHistoryOT = new ChEOccHistoryOT; 
        $ChEOccHistoryOT->ocupation = $request-> ocupation; 
        $ChEOccHistoryOT->enterprice_employee = $request-> enterprice_employee;
        $ChEOccHistoryOT->work_employee = $request-> work_employee;
        $ChEOccHistoryOT->shift_employee = $request-> shift_employee;
        $ChEOccHistoryOT->observation_employee = $request-> observation_employee;
        $ChEOccHistoryOT->work_independent = $request-> work_independent;
        $ChEOccHistoryOT->shift_independent = $request-> shift_independent;
        $ChEOccHistoryOT->observation_independent = $request-> observation_independent;
        $ChEOccHistoryOT->observation_home = $request-> observation_home;

        $ChEOccHistoryOT->type_record_id = $request->type_record_id; 
        $ChEOccHistoryOT->ch_record_id = $request->ch_record_id; 
        $ChEOccHistoryOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_occ_history_o_t' => $ChEOccHistoryOT->toArray()]
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
        $ChEOccHistoryOT = ChEOccHistoryOT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_occ_history_o_t' => $ChEOccHistoryOT]
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
        $ChEOccHistoryOT = ChEOccHistoryOT::find($id);  
        $ChEOccHistoryOT->ocupation = $request-> ocupation; 
        $ChEOccHistoryOT->enterprice_employee = $request-> enterprice_employee;
        $ChEOccHistoryOT->work_employee = $request-> work_employee;
        $ChEOccHistoryOT->shift_employee = $request-> shift_employee;
        $ChEOccHistoryOT->observation_employee = $request-> observation_employee;
        $ChEOccHistoryOT->work_independent = $request-> work_independent;
        $ChEOccHistoryOT->shift_independent = $request-> shift_independent;
        $ChEOccHistoryOT->observation_independent = $request-> observation_independent;
        $ChEOccHistoryOT->observation_home = $request-> observation_home;
        
        $ChEOccHistoryOT->type_record_id = $request->type_record_id; 
        $ChEOccHistoryOT->ch_record_id = $request->ch_record_id; 
        $ChEOccHistoryOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_occ_history_o_t' => $ChEOccHistoryOT]
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
            $ChEOccHistoryOT = ChEOccHistoryOT::find($id);
            $ChEOccHistoryOT->delete();

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
