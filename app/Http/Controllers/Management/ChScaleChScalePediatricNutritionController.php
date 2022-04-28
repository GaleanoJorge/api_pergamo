<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScalePediatricNutrition;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChScalePediatricNutritionController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChScalePediatricNutrition = ChScalePediatricNutrition::select();

        if($request->_sort){
            $ChScalePediatricNutrition->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChScalePediatricNutrition->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChScalePediatricNutrition=$ChScalePediatricNutrition->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChScalePediatricNutrition=$ChScalePediatricNutrition->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenidos exitosamente',
            'data' => ['ch_scale_pediatric_nutrition' => $ChScalePediatricNutrition]
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
       
        $ChScalePediatricNutrition = ChScalePediatricNutrition::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenidos exitosamente',
            'data' => ['ch_scale_pediatric_nutrition' => $ChScalePediatricNutrition]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScalePediatricNutrition = new ChScalePediatricNutrition; 
        $ChScalePediatricNutrition-> score_one = $request->score_one; 
        $ChScalePediatricNutrition-> score_two = $request->score_two; 
        $ChScalePediatricNutrition-> score_three = $request->score_three; 
        $ChScalePediatricNutrition-> score_four = $request->score_four; 
        $ChScalePediatricNutrition-> total = $request->total; 
        $ChScalePediatricNutrition->risk = $request->risk; 
        $ChScalePediatricNutrition->classification = $request->classification; 
        $ChScalePediatricNutrition->type_record_id = $request->type_record_id; 
        $ChScalePediatricNutrition->ch_record_id = $request->ch_record_id; 
        $ChScalePediatricNutrition->save();

        return response()->json([
            'status' => true,
            'message' => 'Escalas asociado al paciente exitosamente',
            'data' => ['ch_scale_pediatric_nutrition' => $ChScalePediatricNutrition->toArray()]
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
        $ChScalePediatricNutrition = ChScalePediatricNutrition::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenido exitosamente',
            'data' => ['ch_scale_pediatric_nutrition' => $ChScalePediatricNutrition]
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
        $ChScalePediatricNutrition = ChScalePediatricNutrition::find($id);  
        $ChScalePediatricNutrition-> score_one = $request->score_one; 
        $ChScalePediatricNutrition-> score_two = $request->score_two; 
        $ChScalePediatricNutrition-> score_three = $request->score_three; 
        $ChScalePediatricNutrition-> score_four = $request->score_four;  
        $ChScalePediatricNutrition-> total = $request->total; 
        $ChScalePediatricNutrition->risk = $request->risk; 
        $ChScalePediatricNutrition->classification = $request->classification; 
        $ChScalePediatricNutrition->type_record_id = $request->type_record_id; 
        $ChScalePediatricNutrition->ch_record_id = $request->ch_record_id; 
        $ChScalePediatricNutrition->save();

        return response()->json([
            'status' => true,
            'message' => 'Escalas actualizado exitosamente',
            'data' => ['ch_scale_pediatric_nutrition' => $ChScalePediatricNutrition]
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
            $ChScalePediatricNutrition = ChScalePediatricNutrition::find($id);
            
            $ChScalePediatricNutrition->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escalas eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escalas en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
