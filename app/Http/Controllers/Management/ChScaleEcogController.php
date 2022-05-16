<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScaleEcog;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChScaleEcogController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChScaleEcog = ChScaleEcog::select();

        if($request->_sort){
            $ChScaleEcog->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChScaleEcog->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChScaleEcog=$ChScaleEcog->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChScaleEcog=$ChScaleEcog->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Escala ECOG obtenida exitosamente',
            'data' => ['ch_scale_ecog' => $ChScaleEcog]
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
       
        $ChScaleEcog = ChScaleEcog::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Escala ECOG obtenida exitosamente',
            'data' => ['ch_scale_ecog' => $ChScaleEcog]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScaleEcog = new ChScaleEcog; 
        $ChScaleEcog->grade = $request->grade; 
        $ChScaleEcog->definition = $request->definition; 
        $ChScaleEcog->type_record_id = $request->type_record_id; 
        $ChScaleEcog->ch_record_id = $request->ch_record_id; 
        $ChScaleEcog->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala ECOG asociada al paciente exitosamente',
            'data' => ['ch_scale_ecog' => $ChScaleEcog->toArray()]
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
        $ChScaleEcog = ChScaleEcog::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escala ECOG obtenida exitosamente',
            'data' => ['ch_scale_ecog' => $ChScaleEcog]
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
        $ChScaleEcog = ChScaleEcog::find($id);  
        $ChScaleEcog->grade = $request->grade; 
        $ChScaleEcog->definition = $request->definition; 
        $ChScaleEcog->type_record_id = $request->type_record_id; 
        $ChScaleEcog->ch_record_id = $request->ch_record_id; 
        $ChScaleEcog->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala ECOG actualizada exitosamente',
            'data' => ['ch_scale_ecog' => $ChScaleEcog]
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
            $ChScaleEcog = ChScaleEcog::find($id);
            
            $ChScaleEcog->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escala ECOG eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escala ECOG en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
