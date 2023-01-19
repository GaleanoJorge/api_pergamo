<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScalePpi;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChScalePpiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        if ($request->latest) {
            $ChScalePpi = ChScalePpi::where('ch_record_id', $request->ch_record_id)->orderBy('created_at', 'desc')->take(1)->get()->toArray();
        } else {

        $ChScalePpi = ChScalePpi::select();

        if($request->_sort){
            $ChScalePpi->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChScalePpi->where('name','like','%' . $request->search. '%');
        }
        if ($request->ch_record_id) {
                $ChScalePpi->where('ch_record_id', $request->ch_record_id);
            }

            if ($request->latest  && isset($request->latest)) {
            }
        if($request->query("pagination", true)=="false"){
            $ChScalePpi=$ChScalePpi->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChScalePpi=$ChScalePpi->paginate($per_page,'*','page',$page); 
        } 
    }

        return response()->json([
            'status' => true,
            'message' => 'Escala PPI obtenida exitosamente',
            'data' => ['ch_scale_ppi' => $ChScalePpi]
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
       
        $ChScalePpi = ChScalePpi::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Escala PPI obtenida exitosamente',
            'data' => ['ch_scale_ppi' => $ChScalePpi]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScalePpi = new ChScalePpi; 
        $ChScalePpi->pps_title = $request->pps_title; 
        $ChScalePpi->pps_value= $request->pps_value;
        $ChScalePpi->pps_detail= $request->pps_detail;
        $ChScalePpi->oral_title= $request->oral_title;
        $ChScalePpi->oral_value= $request->oral_value;
        $ChScalePpi->oral_detail = $request->oral_detail; 
        $ChScalePpi->edema_title= $request->edema_title;
        $ChScalePpi->edema_value= $request->edema_value;
        $ChScalePpi->edema_detail= $request->edema_detail;
        $ChScalePpi->dyspnoea_title= $request->dyspnoea_title;
        $ChScalePpi->dyspnoea_value = $request->dyspnoea_value; 
        $ChScalePpi->dyspnoea_detail= $request->dyspnoea_detail;
        $ChScalePpi->delirium_title= $request->delirium_title;
        $ChScalePpi->delirium_value= $request->delirium_value;
        $ChScalePpi->delirium_detail= $request->delirium_detail;
        $ChScalePpi->total= $request->total;
        $ChScalePpi->classification= $request->classification;
        $ChScalePpi->type_record_id = $request->type_record_id; 
        $ChScalePpi->ch_record_id = $request->ch_record_id; 
        $ChScalePpi->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala PPI asociada al paciente exitosamente',
            'data' => ['ch_scale_ppi' => $ChScalePpi->toArray()]
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
        $ChScalePpi = ChScalePpi::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escala PPI obtenida exitosamente',
            'data' => ['ch_scale_ppi' => $ChScalePpi]
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
        $ChScalePpi = ChScalePpi::find($id);  
        $ChScalePpi->pps_title = $request->pps_title; 
        $ChScalePpi->pps_value= $request->pps_value;
        $ChScalePpi->pps_detail= $request->pps_detail;
        $ChScalePpi->oral_title= $request->oral_title;
        $ChScalePpi->oral_value= $request->oral_value;
        $ChScalePpi->oral_detail = $request->oral_detail; 
        $ChScalePpi->edema_title= $request->edema_title;
        $ChScalePpi->edema_value= $request->edema_value;
        $ChScalePpi->edema_detail= $request->edema_detail;
        $ChScalePpi->dyspnoea_title= $request->dyspnoea_title;
        $ChScalePpi->dyspnoea_value = $request->dyspnoea_value; 
        $ChScalePpi->dyspnoea_detail= $request->dyspnoea_detail;
        $ChScalePpi->delirium_title= $request->delirium_title;
        $ChScalePpi->delirium_value= $request->delirium_value;
        $ChScalePpi->delirium_detail= $request->delirium_detail;
        $ChScalePpi->total= $request->total;
        $ChScalePpi->classification= $request->classification;
        $ChScalePpi->type_record_id = $request->type_record_id; 
        $ChScalePpi->ch_record_id = $request->ch_record_id; 
        $ChScalePpi->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala PPI actualizada exitosamente',
            'data' => ['ch_scale_ppi' => $ChScalePpi]
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
            $ChScalePpi = ChScalePpi::find($id);
            
            $ChScalePpi->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escala PPI eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escala PPI en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
