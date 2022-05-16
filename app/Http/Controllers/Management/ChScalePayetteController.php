<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScalePayette;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChScalePayetteController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChScalePayette = ChScalePayette::select();

        if($request->_sort){
            $ChScalePayette->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChScalePayette->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChScalePayette=$ChScalePayette->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChScalePayette=$ChScalePayette->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Escala payette obtenida exitosamente',
            'data' => ['ch_scale_payette' => $ChScalePayette]
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
       
        $ChScalePayette = ChScalePayette::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Escala Payette obtenida exitosamente',
            'data' => ['ch_scale_payette' => $ChScalePayette]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScalePayette = new ChScalePayette; 
        $ChScalePayette->question_one = $request->question_one; 
        $ChScalePayette->question_two = $request->question_two; 
        $ChScalePayette->question_three = $request->question_three; 
        $ChScalePayette->question_four = $request->question_four; 
        $ChScalePayette->question_five = $request->question_five; 
        $ChScalePayette->question_six = $request->question_six; 
        $ChScalePayette->question_seven = $request->question_seven; 
        $ChScalePayette->question_eight = $request->question_eight; 
        $ChScalePayette->question_nine = $request->question_nine; 
        $ChScalePayette->question_ten = $request->question_ten; 
        $ChScalePayette->classification = $request->classification; 
        $ChScalePayette->risk = $request->risk; 
        $ChScalePayette->recommendations = $request->recommendations; 
        $ChScalePayette->type_record_id = $request->type_record_id; 
        $ChScalePayette->ch_record_id = $request->ch_record_id; 
        $ChScalePayette->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Payette asociada al paciente exitosamente',
            'data' => ['ch_scale_payette' => $ChScalePayette->toArray()]
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
        $ChScalePayette = ChScalePayette::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escala Payette obtenida exitosamente',
            'data' => ['ch_scale_payette' => $ChScalePayette]
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
        $ChScalePayette = ChScalePayette::find($id);  
        $ChScalePayette->question_one = $request->question_one; 
        $ChScalePayette->question_two = $request->question_two; 
        $ChScalePayette->question_three = $request->question_three; 
        $ChScalePayette->question_four = $request->question_four; 
        $ChScalePayette->question_five = $request->question_five; 
        $ChScalePayette->question_six = $request->question_six; 
        $ChScalePayette->question_seven = $request->question_seven; 
        $ChScalePayette->question_eight = $request->question_eight; 
        $ChScalePayette->question_nine = $request->question_nine; 
        $ChScalePayette->question_ten = $request->question_ten; 
        $ChScalePayette->classification = $request->classification; 
        $ChScalePayette->risk = $request->risk; 
        $ChScalePayette->recommendations = $request->recommendations; 
        $ChScalePayette->type_record_id = $request->type_record_id; 
        $ChScalePayette->ch_record_id = $request->ch_record_id; 
        $ChScalePayette->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Payette actualizada exitosamente',
            'data' => ['ch_scale_payette' => $ChScalePayette]
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
            $ChScalePayette = ChScalePayette::find($id);
            
            $ChScalePayette->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escala Payette eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escala Payette en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
