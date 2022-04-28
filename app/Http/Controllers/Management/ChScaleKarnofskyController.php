<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScaleKarnofsky;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChScaleKarnofskyController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChScaleKarnofsky = ChScaleKarnofsky::select();

        if($request->_sort){
            $ChScaleKarnofsky->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChScaleKarnofsky->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChScaleKarnofsky=$ChScaleKarnofsky->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChScaleKarnofsky=$ChScaleKarnofsky->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenidos exitosamente',
            'data' => ['ch_scale_karnofsky' => $ChScaleKarnofsky]
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
       
        $ChScaleKarnofsky = ChScaleKarnofsky::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenidos exitosamente',
            'data' => ['ch_scale_karnofsky' => $ChScaleKarnofsky]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScaleKarnofsky = new ChScaleKarnofsky; 
        $ChScaleKarnofsky->score = $request->score; 
        $ChScaleKarnofsky->type_record_id = $request->type_record_id; 
        $ChScaleKarnofsky->ch_record_id = $request->ch_record_id; 
        $ChScaleKarnofsky->save();

        return response()->json([
            'status' => true,
            'message' => 'Escalas asociado al paciente exitosamente',
            'data' => ['ch_scale_karnofsky' => $ChScaleKarnofsky->toArray()]
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
        $ChScaleKarnofsky = ChScaleKarnofsky::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenido exitosamente',
            'data' => ['ch_scale_karnofsky' => $ChScaleKarnofsky]
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
        $ChScaleKarnofsky = ChScaleKarnofsky::find($id);  
        $ChScaleKarnofsky->score = $request->score; 
        $ChScaleKarnofsky->type_record_id = $request->type_record_id; 
        $ChScaleKarnofsky->ch_record_id = $request->ch_record_id; 
        $ChScaleKarnofsky->save();

        return response()->json([
            'status' => true,
            'message' => 'Escalas actualizado exitosamente',
            'data' => ['ch_scale_karnofsky' => $ChScaleKarnofsky]
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
            $ChScaleKarnofsky = ChScaleKarnofsky::find($id);
            
            $ChScaleKarnofsky->delete();

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
