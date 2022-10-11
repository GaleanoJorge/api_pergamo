<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsSeveral;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsSeveralController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsSeveral = ChPsSeveral::select();

        if($request->_sort){
            $ChPsSeveral->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsSeveral->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsSeveral=$ChPsSeveral->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsSeveral=$ChPsSeveral->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Aspectos de alteraciones varias obtenidas exitosamente',
            'data' => ['ch_ps_several' => $ChPsSeveral]
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
        
       
        $ChPsSeveral = ChPsSeveral::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de alteraciones varias obtenidas exitosamente',
            'data' => ['ch_ps_several' => $ChPsSeveral]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsSeveral = new ChPsSeveral;
        $ChPsSeveral->name = $request->name; 
        $ChPsSeveral->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de alteraciones varias asociadas al paciente exitosamente',
            'data' => ['ch_ps_several' => $ChPsSeveral->toArray()]
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
        $ChPsSeveral = ChPsSeveral::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de alteraciones varias obtenidas exitosamente',
            'data' => ['ch_ps_several' => $ChPsSeveral]
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
        $ChPsSeveral = ChPsSeveral::find($id);  
        $ChPsSeveral->name = $request->name; 
        $ChPsSeveral->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de alteraciones varias actualizadas exitosamente',
            'data' => ['ch_ps_several' => $ChPsSeveral]
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
            $ChPsSeveral = ChPsSeveral::find($id);
            $ChPsSeveral->delete();

            return response()->json([
                'status' => true,
                'message' => 'Aspectos de alteraciones varias eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Aspectos de alteraciones varias en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
