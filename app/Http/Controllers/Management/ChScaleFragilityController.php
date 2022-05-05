<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScaleFragility;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChScaleFragilityController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChScaleFragility = ChScaleFragility::select();

        if($request->_sort){
            $ChScaleFragility->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChScaleFragility->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChScaleFragility=$ChScaleFragility->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChScaleFragility=$ChScaleFragility->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Escala Fragilidad obtenida exitosamente',
            'data' => ['ch_scale_fragility' => $ChScaleFragility]
        ]);
    }
    
    
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function getByRecord(int $id,int $type_record_id): JsonResponse
    {       
       
        $ChScaleFragility = ChScaleFragility::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenidos exitosamente',
            'data' => ['ch_scale_fragility' => $ChScaleFragility]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScaleFragility = new ChScaleFragility; 
        $ChScaleFragility->question_one = $request->question_one; 
        $ChScaleFragility->question_two = $request->question_two; 
        $ChScaleFragility->question_three = $request->question_three; 
        $ChScaleFragility->question_four = $request->question_four; 
        $ChScaleFragility->question_five = $request->question_five; 
        $ChScaleFragility->question_six = $request->question_six; 
        $ChScaleFragility->total = $request->total; 
        $ChScaleFragility->classification = $request->classification; 
        $ChScaleFragility->type_record_id = $request->type_record_id; 
        $ChScaleFragility->ch_record_id = $request->ch_record_id; 
        $ChScaleFragility->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Fragilidad asociada al paciente exitosamente',
            'data' => ['ch_scale_fragility' => $ChScaleFragility->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChScaleFragility = ChScaleFragility::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escala Fragilidad obtenida exitosamente',
            'data' => ['ch_scale_fragility' => $ChScaleFragility]
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
        $ChScaleFragility = ChScaleFragility::find($id);  
        $ChScaleFragility->question_one = $request->question_one; 
        $ChScaleFragility->question_two = $request->question_two; 
        $ChScaleFragility->question_three = $request->question_three; 
        $ChScaleFragility->question_four = $request->question_four; 
        $ChScaleFragility->question_five = $request->question_five; 
        $ChScaleFragility->question_six = $request->question_six; 
        $ChScaleFragility->total = $request->total; 
        $ChScaleFragility->classification = $request->classification; 
        $ChScaleFragility->type_record_id = $request->type_record_id; 
        $ChScaleFragility->ch_record_id = $request->ch_record_id; 
        $ChScaleFragility->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Fragilidad actualizada exitosamente',
            'data' => ['ch_scale_fragility' => $ChScaleFragility]
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
            $ChScaleFragility = ChScaleFragility::find($id);
            
            $ChScaleFragility->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escala Fragilidad eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escalas Fragilidad en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
