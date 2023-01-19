<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsAwareness;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsAwarenessController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsAwareness = ChPsAwareness::select();

        if($request->_sort){
            $ChPsAwareness->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsAwareness->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsAwareness=$ChPsAwareness->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsAwareness=$ChPsAwareness->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Estado de conciencia obtenidas exitosamente',
            'data' => ['ch_ps_awareness' => $ChPsAwareness]
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
        
       
        $ChPsAwareness = ChPsAwareness::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Estado de conciencia obtenidas exitosamente',
            'data' => ['ch_ps_awareness' => $ChPsAwareness]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsAwareness = new ChPsAwareness;
        $ChPsAwareness->name = $request->name; 
        $ChPsAwareness->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado de conciencia asociadas al paciente exitosamente',
            'data' => ['ch_ps_awareness' => $ChPsAwareness->toArray()]
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
        $ChPsAwareness = ChPsAwareness::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Estado de conciencia obtenidas exitosamente',
            'data' => ['ch_ps_awareness' => $ChPsAwareness]
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
        $ChPsAwareness = ChPsAwareness::find($id);  
        $ChPsAwareness->name = $request->name; 
        $ChPsAwareness->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado de conciencia actualizadas exitosamente',
            'data' => ['ch_ps_awareness' => $ChPsAwareness]
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
            $ChPsAwareness = ChPsAwareness::find($id);
            $ChPsAwareness->delete();

            return response()->json([
                'status' => true,
                'message' => 'Estado de conciencia eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Estado de conciencia en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
