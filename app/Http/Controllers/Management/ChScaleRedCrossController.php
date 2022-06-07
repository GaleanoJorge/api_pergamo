<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScaleRedCross;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChScaleRedCrossController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        if ($request->latest) {
            $ChScaleRedCross = ChScaleRedCross::where('ch_record_id', $request->ch_record_id)->orderBy('created_at', 'desc')->take(1)->get()->toArray();
        } else {

        $ChScaleRedCross = ChScaleRedCross::select();

        if($request->_sort){
            $ChScaleRedCross->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChScaleRedCross->where('name','like','%' . $request->search. '%');
        }
        if ($request->ch_record_id) {
            $ChScaleRedCross->where('ch_record_id', $request->ch_record_id);
        }

        if ($request->latest  && isset($request->latest)) {
        }
        if($request->query("pagination", true)=="false"){
            $ChScaleRedCross=$ChScaleRedCross->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChScaleRedCross=$ChScaleRedCross->paginate($per_page,'*','page',$page); 
        } 

    }
        return response()->json([
            'status' => true,
            'message' => 'Escala Cruz roja obtenida exitosamente',
            'data' => ['ch_scale_red_cross' => $ChScaleRedCross]
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
       
        $ChScaleRedCross = ChScaleRedCross::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Escala Cruz roja obtenida exitosamente',
            'data' => ['ch_scale_red_cross' => $ChScaleRedCross]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScaleRedCross = new ChScaleRedCross; 
        $ChScaleRedCross->grade_title = $request->grade_title; 
        $ChScaleRedCross->grade_value = $request->grade_value; 
        $ChScaleRedCross->definition = $request->definition; 
        $ChScaleRedCross->type_record_id = $request->type_record_id; 
        $ChScaleRedCross->ch_record_id = $request->ch_record_id; 
        $ChScaleRedCross->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Cruz roja asociada al paciente exitosamente',
            'data' => ['ch_scale_red_cross' => $ChScaleRedCross->toArray()]
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
        $ChScaleRedCross = ChScaleRedCross::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escala Cruz roja obtenida exitosamente',
            'data' => ['ch_scale_red_cross' => $ChScaleRedCross]
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
        $ChScaleRedCross = ChScaleRedCross::find($id);  
        $ChScaleRedCross->grade_title = $request->grade_title; 
        $ChScaleRedCross->grade_value = $request->grade_value; 
        $ChScaleRedCross->definition = $request->definition; 
        $ChScaleRedCross->type_record_id = $request->type_record_id; 
        $ChScaleRedCross->ch_record_id = $request->ch_record_id; 
        $ChScaleRedCross->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Cruz roja actualizada exitosamente',
            'data' => ['ch_scale_red_cross' => $ChScaleRedCross]
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
            $ChScaleRedCross = ChScaleRedCross::find($id);
            
            $ChScaleRedCross->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escala Cruz roja eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escala Cruz roja en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
