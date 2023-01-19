<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsFear;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsFearController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsFear = ChPsFear::select();

        if($request->_sort){
            $ChPsFear->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsFear->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsFear=$ChPsFear->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsFear=$ChPsFear->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Aspectos de temor o miedo obtenidas exitosamente',
            'data' => ['ch_ps_fear' => $ChPsFear]
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
        
       
        $ChPsFear = ChPsFear::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de temor o miedo obtenidas exitosamente',
            'data' => ['ch_ps_fear' => $ChPsFear]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsFear = new ChPsFear;
        $ChPsFear->name = $request->name; 
        $ChPsFear->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de temor o miedo asociadas al paciente exitosamente',
            'data' => ['ch_ps_fear' => $ChPsFear->toArray()]
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
        $ChPsFear = ChPsFear::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de temor o miedo obtenidas exitosamente',
            'data' => ['ch_ps_fear' => $ChPsFear]
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
        $ChPsFear = ChPsFear::find($id);  
        $ChPsFear->name = $request->name; 
        $ChPsFear->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de temor o miedo actualizadas exitosamente',
            'data' => ['ch_ps_fear' => $ChPsFear]
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
            $ChPsFear = ChPsFear::find($id);
            $ChPsFear->delete();

            return response()->json([
                'status' => true,
                'message' => 'Aspectos de temor o miedo eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Aspectos de temor o miedo en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
