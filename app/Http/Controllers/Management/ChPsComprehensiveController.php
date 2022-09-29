<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsComprehensive;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsComprehensiveController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsComprehensive = ChPsComprehensive::select();

        if($request->_sort){
            $ChPsComprehensive->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsComprehensive->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsComprehensive=$ChPsComprehensive->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsComprehensive=$ChPsComprehensive->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Opciones de compresivo obtenidas exitosamente',
            'data' => ['ch_ps_comprehensive' => $ChPsComprehensive]
        ]);
    }
  /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id,int $type_record_id): JsonResponse
    {
        
       
        $ChPsComprehensive = ChPsComprehensive::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Opciones de compresivo obtenidas exitosamente',
            'data' => ['ch_ps_comprehensive' => $ChPsComprehensive]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsComprehensive = new ChPsComprehensive;
        $ChPsComprehensive->name = $request->name; 
        $ChPsComprehensive->save();

        return response()->json([
            'status' => true,
            'message' => 'Opciones de compresivo asociadas al paciente exitosamente',
            'data' => ['ch_ps_comprehensive' => $ChPsComprehensive->toArray()]
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChPsComprehensive = ChPsComprehensive::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Opciones de compresivo obtenidas exitosamente',
            'data' => ['ch_ps_comprehensive' => $ChPsComprehensive]
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
        $ChPsComprehensive = ChPsComprehensive::find($id);  
        $ChPsComprehensive->name = $request->name; 
        $ChPsComprehensive->save();

        return response()->json([
            'status' => true,
            'message' => 'Opciones de compresivo actualizadas exitosamente',
            'data' => ['ch_ps_comprehensive' => $ChPsComprehensive]
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
            $ChPsComprehensive = ChPsComprehensive::find($id);
            $ChPsComprehensive->delete();

            return response()->json([
                'status' => true,
                'message' => 'Opciones de compresivo eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Opciones de compresivo en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
