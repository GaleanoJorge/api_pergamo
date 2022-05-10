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
        $ChScalePpi = ChScalePpi::select();

        if($request->_sort){
            $ChScalePpi->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChScalePpi->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChScalePpi=$ChScalePpi->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChScalePpi=$ChScalePpi->paginate($per_page,'*','page',$page); 
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
        $ChScalePpi->pps = $request->pps; 
        $ChScalePpi->oral= $request->oral;
        $ChScalePpi->edema= $request->edema;
        $ChScalePpi->dyspnoea= $request->dyspnoea;
        $ChScalePpi->delirium= $request->delirium;
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
        $ChScalePpi->pps = $request->pps; 
        $ChScalePpi->oral= $request->oral;
        $ChScalePpi->edema= $request->edema;
        $ChScalePpi->dyspnoea= $request->dyspnoea;
        $ChScalePpi->delirium= $request->delirium;
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
