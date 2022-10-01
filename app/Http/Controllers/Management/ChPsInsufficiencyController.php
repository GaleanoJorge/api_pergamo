<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsInsufficiency;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsInsufficiencyController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsInsufficiency = ChPsInsufficiency::select();

        if($request->_sort){
            $ChPsInsufficiency->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsInsufficiency->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsInsufficiency=$ChPsInsufficiency->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsInsufficiency=$ChPsInsufficiency->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Aspectos de insuficiencias obtenidas exitosamente',
            'data' => ['ch_ps_insufficiency' => $ChPsInsufficiency]
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
        
       
        $ChPsInsufficiency = ChPsInsufficiency::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de insuficiencias obtenidas exitosamente',
            'data' => ['ch_ps_insufficiency' => $ChPsInsufficiency]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsInsufficiency = new ChPsInsufficiency;
        $ChPsInsufficiency->name = $request->name; 
        $ChPsInsufficiency->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de insuficiencias asociadas al paciente exitosamente',
            'data' => ['ch_ps_insufficiency' => $ChPsInsufficiency->toArray()]
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
        $ChPsInsufficiency = ChPsInsufficiency::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de insuficiencias obtenidas exitosamente',
            'data' => ['ch_ps_insufficiency' => $ChPsInsufficiency]
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
        $ChPsInsufficiency = ChPsInsufficiency::find($id);  
        $ChPsInsufficiency->name = $request->name; 
        $ChPsInsufficiency->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de insuficiencias actualizadas exitosamente',
            'data' => ['ch_ps_insufficiency' => $ChPsInsufficiency]
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
            $ChPsInsufficiency = ChPsInsufficiency::find($id);
            $ChPsInsufficiency->delete();

            return response()->json([
                'status' => true,
                'message' => 'Aspectos de insuficiencias eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Aspectos de insuficiencias en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
