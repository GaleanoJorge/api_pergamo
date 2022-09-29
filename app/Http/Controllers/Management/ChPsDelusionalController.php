<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsDelusional;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsDelusionalController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsDelusional = ChPsDelusional::select();

        if($request->_sort){
            $ChPsDelusional->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsDelusional->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsDelusional=$ChPsDelusional->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsDelusional=$ChPsDelusional->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Aspectos de delirantes obtenidas exitosamente',
            'data' => ['ch_ps_delusional' => $ChPsDelusional]
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
        
       
        $ChPsDelusional = ChPsDelusional::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de delirantes obtenidas exitosamente',
            'data' => ['ch_ps_delusional' => $ChPsDelusional]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsDelusional = new ChPsDelusional;
        $ChPsDelusional->name = $request->name; 
        $ChPsDelusional->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de delirantes asociadas al paciente exitosamente',
            'data' => ['ch_ps_delusional' => $ChPsDelusional->toArray()]
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
        $ChPsDelusional = ChPsDelusional::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de delirantes obtenidas exitosamente',
            'data' => ['ch_ps_delusional' => $ChPsDelusional]
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
        $ChPsDelusional = ChPsDelusional::find($id);  
        $ChPsDelusional->name = $request->name; 
        $ChPsDelusional->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de delirantes actualizadas exitosamente',
            'data' => ['ch_ps_delusional' => $ChPsDelusional]
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
            $ChPsDelusional = ChPsDelusional::find($id);
            $ChPsDelusional->delete();

            return response()->json([
                'status' => true,
                'message' => 'Aspectos de delirantes eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Aspectos de delirantes en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
