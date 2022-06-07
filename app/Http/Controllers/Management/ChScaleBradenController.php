<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScaleBraden;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChScaleBradenController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        if ($request->latest) {
            $ChScaleBraden = ChScaleBraden::where('ch_record_id', $request->ch_record_id)->orderBy('created_at', 'desc')->take(1)->get()->toArray();
       
        } else {
            $ChScaleBraden = ChScaleBraden::select();
    
            if($request->_sort){
                $ChScaleBraden->orderBy($request->_sort, $request->_order);
            }            
    
            if ($request->search) {
                $ChScaleBraden->where('name','like','%' . $request->search. '%');
            }
            if ($request->ch_record_id) {
                $ChScaleBraden->where('ch_record_id', $request->ch_record_id);
            }
    
            if ($request->latest  && isset($request->latest)) {
              
            }
            
            if($request->query("pagination", true)=="false"){
                $ChScaleBraden=$ChScaleBraden->get()->toArray();    
            }
            else{
                $page= $request->query("current_page", 1);
                $per_page=$request->query("per_page", 10);
                
                $ChScaleBraden=$ChScaleBraden->paginate($per_page,'*','page',$page); 
            } 
        }
        


        return response()->json([
            'status' => true,
            'message' => 'Escala Braden obtenida exitosamente',
            'data' => ['ch_scale_braden' => $ChScaleBraden]
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
       
        $ChScaleBraden = ChScaleBraden::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Escala Braden obtenida exitosamente',
            'data' => ['ch_scale_braden' => $ChScaleBraden]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScaleBraden = new ChScaleBraden; 
        $ChScaleBraden->sensory_title = $request->sensory_title; 
        $ChScaleBraden->sensory_value= $request->sensory_value;
        $ChScaleBraden->sensory_detail= $request->sensory_detail;
        $ChScaleBraden->humidity_title= $request->humidity_title;
        $ChScaleBraden->humidity_value= $request->humidity_value;
        $ChScaleBraden->humidity_detail = $request->humidity_detail; 
        $ChScaleBraden->activity_title= $request->activity_title;
        $ChScaleBraden->activity_value= $request->activity_value;
        $ChScaleBraden->activity_detail= $request->activity_detail;
        $ChScaleBraden->mobility_title= $request->mobility_title;
        $ChScaleBraden->mobility_value = $request->mobility_value; 
        $ChScaleBraden->mobility_detail= $request->mobility_detail;
        $ChScaleBraden->nutrition_title= $request->nutrition_title;
        $ChScaleBraden->nutrition_value= $request->nutrition_value;
        $ChScaleBraden->nutrition_detail= $request->nutrition_detail;
        $ChScaleBraden->lesion_title= $request->lesion_title;
        $ChScaleBraden->lesion_value= $request->lesion_value;
        $ChScaleBraden->lesion_detail= $request->lesion_detail;
        $ChScaleBraden->total= $request->total;
        $ChScaleBraden->risk= $request->risk;
        $ChScaleBraden->type_record_id = $request->type_record_id; 
        $ChScaleBraden->ch_record_id = $request->ch_record_id; 
        $ChScaleBraden->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Braden asociada al paciente exitosamente',
            'data' => ['ch_scale_braden' => $ChScaleBraden->toArray()]
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
        $ChScaleBraden = ChScaleBraden::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escala Braden obtenida exitosamente',
            'data' => ['ch_scale_braden' => $ChScaleBraden]
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
        $ChScaleBraden = ChScaleBraden::find($id);  
        $ChScaleBraden->sensory_title = $request->sensory_title; 
        $ChScaleBraden->sensory_value= $request->sensory_value;
        $ChScaleBraden->sensory_detail= $request->sensory_detail;
        $ChScaleBraden->humidity_title= $request->humidity_title;
        $ChScaleBraden->humidity_value= $request->humidity_value;
        $ChScaleBraden->humidity_detail = $request->humidity_detail; 
        $ChScaleBraden->activity_title= $request->activity_title;
        $ChScaleBraden->activity_value= $request->activity_value;
        $ChScaleBraden->activity_detail= $request->activity_detail;
        $ChScaleBraden->mobility_title= $request->mobility_title;
        $ChScaleBraden->mobility_value = $request->mobility_value; 
        $ChScaleBraden->mobility_detail= $request->mobility_detail;
        $ChScaleBraden->nutrition_title= $request->nutrition_title;
        $ChScaleBraden->nutrition_value= $request->nutrition_value;
        $ChScaleBraden->nutrition_detail= $request->nutrition_detail;
        $ChScaleBraden->lesion_title= $request->lesion_title;
        $ChScaleBraden->lesion_value= $request->lesion_value;
        $ChScaleBraden->lesion_detail= $request->lesion_detail;
        $ChScaleBraden->total= $request->total;
        $ChScaleBraden->risk= $request->risk;
        $ChScaleBraden->type_record_id = $request->type_record_id; 
        $ChScaleBraden->ch_record_id = $request->ch_record_id; 
        $ChScaleBraden->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Braden actualizada exitosamente',
            'data' => ['ch_scale_braden' => $ChScaleBraden]
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
            $ChScaleBraden = ChScaleBraden::find($id);
            
            $ChScaleBraden->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escala Braden eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escala Braden en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
