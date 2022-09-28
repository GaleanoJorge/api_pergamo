<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsSadness;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsSadnessController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsSadness = ChPsSadness::select();

        if($request->_sort){
            $ChPsSadness->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsSadness->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsSadness=$ChPsSadness->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsSadness=$ChPsSadness->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Aspectos de tristeza obtenidas exitosamente',
            'data' => ['ch_ps_sadness' => $ChPsSadness]
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
        
       
        $ChPsSadness = ChPsSadness::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de tristeza obtenidas exitosamente',
            'data' => ['ch_ps_sadness' => $ChPsSadness]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsSadness = new ChPsSadness;
        $ChPsSadness->name = $request->name; 
        $ChPsSadness->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de tristeza asociadas al paciente exitosamente',
            'data' => ['ch_ps_sadness' => $ChPsSadness->toArray()]
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
        $ChPsSadness = ChPsSadness::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de tristeza obtenidas exitosamente',
            'data' => ['ch_ps_sadness' => $ChPsSadness]
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
        $ChPsSadness = ChPsSadness::find($id);  
        $ChPsSadness->name = $request->name; 
        $ChPsSadness->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de tristeza actualizadas exitosamente',
            'data' => ['ch_ps_sadness' => $ChPsSadness]
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
            $ChPsSadness = ChPsSadness::find($id);
            $ChPsSadness->delete();

            return response()->json([
                'status' => true,
                'message' => 'Aspectos de tristeza eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Aspectos de tristeza en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
