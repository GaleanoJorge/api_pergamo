<?php

namespace App\Http\Controllers\Management;

use App\Models\ChReasonConsultation;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChReasonConsultationController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChReasonConsultation = ChReasonConsultation::select();


        if($request->ch_record_id){
            $ChReasonConsultation->where('ch_record_id', $request->ch_record_id)->where('type_record_id',1);
        }      

        if($request->_sort){
            $ChReasonConsultation->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChReasonConsultation->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChReasonConsultation=$ChReasonConsultation->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChReasonConsultation=$ChReasonConsultation->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Valoración  obtenida exitosamente',
            'data' => ['ch_reason_consultation' => $ChReasonConsultation]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChReasonConsultation = new ChReasonConsultation; 
        $ChReasonConsultation->reason_consultation = $request->reason_consultation; 
        $ChReasonConsultation->current_illness = $request->current_illness; 
        $ChReasonConsultation->ch_external_cause_id = $request->ch_external_cause_id; 
        $ChReasonConsultation->type_record_id = $request->type_record_id; 
        $ChReasonConsultation->ch_record_id = $request->ch_record_id; 
        $ChReasonConsultation->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoración asociada al registro del paciente exitosamente',
            'data' => ['ch_reason_consultation' => $ChReasonConsultation->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChReasonConsultation = ChReasonConsultation::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoración  obtenida exitosamente',
            'data' => ['ch_reason_consultation' => $ChReasonConsultation]
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
        $ChReasonConsultation = ChReasonConsultation::find($id);  
        $ChReasonConsultation->reason_consultation = $request->reason_consultation; 
        $ChReasonConsultation->current_illness = $request->current_illness; 
        $ChReasonConsultation->ch_external_cause_id = $request->ch_external_cause_id; 
        $ChReasonConsultation->type_record_id = $request->type_record_id; 
        $ChReasonConsultation->ch_record_id = $request->ch_record_id; 
          
        
        
        $ChReasonConsultation->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoración actualizada exitosamente',
            'data' => ['ch_reason_consultation' => $ChReasonConsultation]
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
            $ChReasonConsultation = ChReasonConsultation::find($id);
            $ChReasonConsultation->delete();

            return response()->json([
                'status' => true,
                'message' => 'Valoración eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Valoración en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
