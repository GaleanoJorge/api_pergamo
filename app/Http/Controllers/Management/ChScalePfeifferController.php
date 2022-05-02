<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScalePfeiffer;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChScalePfeifferController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChScalePfeiffer = ChScalePfeiffer::select();

        if($request->_sort){
            $ChScalePfeiffer->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChScalePfeiffer->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChScalePfeiffer=$ChScalePfeiffer->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChScalePfeiffer=$ChScalePfeiffer->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenidos exitosamente',
            'data' => ['ch_scale_pfeiffer' => $ChScalePfeiffer]
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
       
        $ChScalePfeiffer = ChScalePfeiffer::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenidos exitosamente',
            'data' => ['ch_scale_pfeiffer' => $ChScalePfeiffer]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScalePfeiffer = new ChScalePfeiffer; 
        $ChScalePfeiffer->study= $request->study;
        $ChScalePfeiffer->question_one= $request->question_one;
        $ChScalePfeiffer->question_two= $request->question_two;
        $ChScalePfeiffer->question_three= $request->question_three;
        $ChScalePfeiffer->question_four= $request->question_four;
        $ChScalePfeiffer->question_five= $request->question_five;
        $ChScalePfeiffer->question_six= $request->question_six;
        $ChScalePfeiffer->question_seven= $request->question_seven;
        $ChScalePfeiffer->question_eight= $request->question_eight;
        $ChScalePfeiffer->question_nine= $request->question_nine;
        $ChScalePfeiffer->question_ten= $request->question_ten;
        $ChScalePfeiffer->total= $request->total;
        $ChScalePfeiffer->classification= $request->classification;
        $ChScalePfeiffer->type_record_id = $request->type_record_id; 
        $ChScalePfeiffer->ch_record_id = $request->ch_record_id; 
        $ChScalePfeiffer->save();

        return response()->json([
            'status' => true,
            'message' => 'Escalas asociado al paciente exitosamente',
            'data' => ['ch_scale_pfeiffer' => $ChScalePfeiffer->toArray()]
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
        $ChScalePfeiffer = ChScalePfeiffer::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenido exitosamente',
            'data' => ['ch_scale_pfeiffer' => $ChScalePfeiffer]
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
        $ChScalePfeiffer = ChScalePfeiffer::find($id);  
        $ChScalePfeiffer->study= $request->study;
        $ChScalePfeiffer->question_one= $request->question_one;
        $ChScalePfeiffer->question_two= $request->question_two;
        $ChScalePfeiffer->question_three= $request->question_three;
        $ChScalePfeiffer->question_four= $request->question_four;
        $ChScalePfeiffer->question_five= $request->question_five;
        $ChScalePfeiffer->question_six= $request->question_six;
        $ChScalePfeiffer->question_seven= $request->question_seven;
        $ChScalePfeiffer->question_eight= $request->question_eight;
        $ChScalePfeiffer->question_nine= $request->question_nine;
        $ChScalePfeiffer->question_ten= $request->question_ten;
        $ChScalePfeiffer->total= $request->total;
        $ChScalePfeiffer->classification= $request->classification;
        $ChScalePfeiffer->type_record_id = $request->type_record_id; 
        $ChScalePfeiffer->ch_record_id = $request->ch_record_id; 
        $ChScalePfeiffer->save();

        return response()->json([
            'status' => true,
            'message' => 'Escalas actualizado exitosamente',
            'data' => ['ch_scale_pfeiffer' => $ChScalePfeiffer]
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
            $ChScalePfeiffer = ChScalePfeiffer::find($id);
            
            $ChScalePfeiffer->delete();

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
