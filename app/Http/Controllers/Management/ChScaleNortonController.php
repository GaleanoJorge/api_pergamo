<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScaleNorton;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChScaleNortonController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChScaleNorton = ChScaleNorton::select();

        if($request->_sort){
            $ChScaleNorton->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChScaleNorton->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChScaleNorton=$ChScaleNorton->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChScaleNorton=$ChScaleNorton->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Escala Norton obtenida exitosamente',
            'data' => ['ch_scale_norton' => $ChScaleNorton]
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
       
        $ChScaleNorton = ChScaleNorton::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Escala Norton obtenida exitosamente',
            'data' => ['ch_scale_norton' => $ChScaleNorton]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScaleNorton = new ChScaleNorton; 
        $ChScaleNorton->physical_state = $request->physical_state; 
        $ChScaleNorton->state_mind= $request->state_mind;
        $ChScaleNorton->mobility= $request->mobility;
        $ChScaleNorton->activity= $request->activity;
        $ChScaleNorton->incontinence= $request->incontinence;
        $ChScaleNorton->total= $request->total;
        $ChScaleNorton->risk= $request->risk;
        $ChScaleNorton->type_record_id = $request->type_record_id; 
        $ChScaleNorton->ch_record_id = $request->ch_record_id; 
        $ChScaleNorton->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Norton asociada al paciente exitosamente',
            'data' => ['ch_scale_norton' => $ChScaleNorton->toArray()]
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
        $ChScaleNorton = ChScaleNorton::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escala Norton obtenida exitosamente',
            'data' => ['ch_scale_norton' => $ChScaleNorton]
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
        $ChScaleNorton = ChScaleNorton::find($id);  
        $ChScaleNorton->physical_state = $request->physical_state; 
        $ChScaleNorton->state_mind= $request->state_mind;
        $ChScaleNorton->mobility= $request->mobility;
        $ChScaleNorton->activity= $request->activity;
        $ChScaleNorton->incontinence= $request->incontinence;
        $ChScaleNorton->total= $request->total;
        $ChScaleNorton->risk= $request->risk;
        $ChScaleNorton->type_record_id = $request->type_record_id; 
        $ChScaleNorton->ch_record_id = $request->ch_record_id; 
        $ChScaleNorton->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Norton actualizada exitosamente',
            'data' => ['ch_scale_norton' => $ChScaleNorton]
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
            $ChScaleNorton = ChScaleNorton::find($id);
            
            $ChScaleNorton->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escala Norton eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escala Norton en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
