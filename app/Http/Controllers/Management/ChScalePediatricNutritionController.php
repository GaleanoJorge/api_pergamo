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
        if ($request->latest) {
        $ChScalePediatricNutrition = ChScalePediatricNutrition::where('ch_record_id', $request->ch_record_id)->orderBy('created_at', 'desc')->take(1)->get()->toArray();
    
    } else {
        $ChScalePediatricNutrition = ChScalePediatricNutrition::select();

        if($request->_sort){
            $ChScalePediatricNutrition->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChScalePediatricNutrition->where('name','like','%' . $request->search. '%');
        }
        if ($request->ch_record_id) {
            $ChScalePediatricNutrition->where('ch_record_id', $request->ch_record_id);
        }

        if ($request->latest  && isset($request->latest)) {
        }
        if($request->query("pagination", true)=="false"){
            $ChScalePediatricNutrition=$ChScalePediatricNutrition->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChScalePediatricNutrition=$ChScalePediatricNutrition->paginate($per_page,'*','page',$page); 
        } 
    }

        return response()->json([
            'status' => true,
            'message' => 'Escala Tamizaje Nutricional Pediátrico obtenida exitosamente',
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
            'message' => 'Escala Tamizaje Nutricional Pediátrico obtenida exitosamente',
            'data' => ['ch_scale_pediatric_nutrition' => $ChScalePediatricNutrition]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScalePediatricNutrition = new ChScalePediatricNutrition; 
        $ChScalePediatricNutrition-> score_one_title = $request->score_one_title; 
        $ChScalePediatricNutrition-> score_one_value = $request->score_one_value; 
        $ChScalePediatricNutrition-> score_one_detail = $request->score_one_detail; 
        $ChScalePediatricNutrition-> score_two_title = $request->score_two_title; 
        $ChScalePediatricNutrition-> score_two_value = $request->score_two_value; 
        $ChScalePediatricNutrition-> score_two_detail = $request->score_two_detail; 
        $ChScalePediatricNutrition-> score_three_title = $request->score_three_title; 
        $ChScalePediatricNutrition-> score_three_value = $request->score_three_value; 
        $ChScalePediatricNutrition-> score_three_detail = $request->score_three_detail; 
        $ChScalePediatricNutrition-> score_four_title = $request->score_four_title; 
        $ChScalePediatricNutrition-> score_four_value = $request->score_four_value; 
        $ChScalePediatricNutrition-> score_four_detail = $request->score_four_detail; 
        $ChScalePediatricNutrition-> total = $request->total; 
        $ChScalePediatricNutrition->risk = $request->risk; 
        $ChScalePediatricNutrition->classification = $request->classification; 
        $ChScalePediatricNutrition->type_record_id = $request->type_record_id; 
        $ChScalePediatricNutrition->ch_record_id = $request->ch_record_id; 
        $ChScalePediatricNutrition->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Tamizaje Nutricional Pediátrico asociada al paciente exitosamente',
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
            'message' => 'Escala Tamizaje Nutricional Pediátrico obtenida exitosamente',
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
        $ChScalePediatricNutrition-> score_one_title = $request->score_one_title; 
        $ChScalePediatricNutrition-> score_one_value = $request->score_one_value; 
        $ChScalePediatricNutrition-> score_one_detail = $request->score_one_detail; 
        $ChScalePediatricNutrition-> score_two_title = $request->score_two_title; 
        $ChScalePediatricNutrition-> score_two_value = $request->score_two_value; 
        $ChScalePediatricNutrition-> score_two_detail = $request->score_two_detail; 
        $ChScalePediatricNutrition-> score_three_title = $request->score_three_title; 
        $ChScalePediatricNutrition-> score_three_value = $request->score_three_value; 
        $ChScalePediatricNutrition-> score_three_detail = $request->score_three_detail; 
        $ChScalePediatricNutrition-> score_four_title = $request->score_four_title; 
        $ChScalePediatricNutrition-> score_four_value = $request->score_four_value; 
        $ChScalePediatricNutrition-> score_four_detail = $request->score_four_detail; 
        $ChScalePediatricNutrition-> total = $request->total; 
        $ChScalePediatricNutrition->risk = $request->risk; 
        $ChScalePediatricNutrition->classification = $request->classification; 
        $ChScalePediatricNutrition->type_record_id = $request->type_record_id; 
        $ChScalePediatricNutrition->ch_record_id = $request->ch_record_id; 
        $ChScalePediatricNutrition->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Tamizaje Nutricional Pediátrico actualizada exitosamente',
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
                'message' => 'Escala Tamizaje Nutricional Pediátrico eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escala Tamizaje Nutricional Pediátrico en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
