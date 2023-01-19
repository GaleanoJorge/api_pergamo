<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScaleFlacc;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChScaleFlaccController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        if ($request->latest) {
            $ChScaleFlacc = ChScaleFlacc::where('ch_record_id', $request->ch_record_id)->orderBy('created_at', 'desc')->take(1)->get()->toArray();
        } else {

        $ChScaleFlacc = ChScaleFlacc::select();

        if($request->_sort){
            $ChScaleFlacc->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChScaleFlacc->where('name','like','%' . $request->search. '%');
        }
        if ($request->ch_record_id) {
            $ChScaleFlacc->where('ch_record_id', $request->ch_record_id);
        }
        if ($request->latest  && isset($request->latest)) {
        }
        if($request->query("pagination", true)=="false"){
            $ChScaleFlacc=$ChScaleFlacc->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChScaleFlacc=$ChScaleFlacc->paginate($per_page,'*','page',$page); 
        } 

}
        return response()->json([
            'status' => true,
            'message' => 'Escala Flacc obtenida exitosamente',
            'data' => ['ch_scale_flacc' => $ChScaleFlacc]
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
       
        $ChScaleFlacc = ChScaleFlacc::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Escala Flacc obtenida exitosamente',
            'data' => ['ch_scale_flacc' => $ChScaleFlacc]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScaleFlacc = new ChScaleFlacc; 
        $ChScaleFlacc->face_title = $request->face_title; 
        $ChScaleFlacc->face_value= $request->face_value;
        $ChScaleFlacc->face_detail= $request->face_detail;
        $ChScaleFlacc->leg_titles= $request->leg_titles;
        $ChScaleFlacc->legs_value= $request->legs_value;
        $ChScaleFlacc->legs_detail = $request->legs_detail; 
        $ChScaleFlacc->activity_title= $request->activity_title;
        $ChScaleFlacc->activity_value= $request->activity_value;
        $ChScaleFlacc->activity_detail= $request->activity_detail;
        $ChScaleFlacc->crying_title= $request->crying_title;
        $ChScaleFlacc->crying_value = $request->crying_value; 
        $ChScaleFlacc->crying_detail= $request->crying_detail;
        $ChScaleFlacc->comfor_titlet= $request->comfor_titlet;
        $ChScaleFlacc->comfort_value= $request->comfort_value;
        $ChScaleFlacc->comfort_detail= $request->comfort_detail;
        $ChScaleFlacc->total= $request->total;
        $ChScaleFlacc->classification= $request->classification;
        $ChScaleFlacc->type_record_id = $request->type_record_id; 
        $ChScaleFlacc->ch_record_id = $request->ch_record_id; 
        $ChScaleFlacc->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Flacc obtenida paciente exitosamente',
            'data' => ['ch_scale_flacc' => $ChScaleFlacc->toArray()]
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
        $ChScaleFlacc = ChScaleFlacc::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Esscala Flacc obtenida exitosamente',
            'data' => ['ch_scale_flacc' => $ChScaleFlacc]
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
        $ChScaleFlacc = ChScaleFlacc::find($id);  
        $ChScaleFlacc->face_title = $request->face_title; 
        $ChScaleFlacc->face_value= $request->face_value;
        $ChScaleFlacc->face_detail= $request->face_detail;
        $ChScaleFlacc->leg_titles= $request->leg_titles;
        $ChScaleFlacc->legs_value= $request->legs_value;
        $ChScaleFlacc->legs_detail = $request->legs_detail; 
        $ChScaleFlacc->activity_title= $request->activity_title;
        $ChScaleFlacc->activity_value= $request->activity_value;
        $ChScaleFlacc->activity_detail= $request->activity_detail;
        $ChScaleFlacc->crying_title= $request->crying_title;
        $ChScaleFlacc->crying_value = $request->crying_value; 
        $ChScaleFlacc->crying_detail= $request->crying_detail;
        $ChScaleFlacc->comfor_titlet= $request->comfor_titlet;
        $ChScaleFlacc->comfort_value= $request->comfort_value;
        $ChScaleFlacc->comfort_detail= $request->comfort_detail;
        $ChScaleFlacc->total= $request->total;
        $ChScaleFlacc->classification= $request->classification;
        $ChScaleFlacc->type_record_id = $request->type_record_id; 
        $ChScaleFlacc->ch_record_id = $request->ch_record_id; 
        $ChScaleFlacc->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Flacc actualizada exitosamente',
            'data' => ['ch_scale_flacc' => $ChScaleFlacc]
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
            $ChScaleFlacc = ChScaleFlacc::find($id);
            
            $ChScaleFlacc->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escala Flacc  eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escala Flacc  en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
