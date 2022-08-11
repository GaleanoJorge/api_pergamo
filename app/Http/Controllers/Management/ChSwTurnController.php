<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwTurn;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChSwTurnController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwTurn = ChSwTurn::select();

        if($request->_sort){
            $ChSwTurn->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChSwTurn->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChSwTurn=$ChSwTurn->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChSwTurn=$ChSwTurn->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Truno laboral obtenido exitosamente',
            'data' => ['ch_sw_turn' => $ChSwTurn]
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
        
       
        $ChSwTurn = ChSwTurn::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Truno laboral obtenidas exitosamente',
            'data' => ['ch_sw_turn' => $ChSwTurn]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChSwTurn = new ChSwTurn;
        $ChSwTurn->name = $request->name; 
        $ChSwTurn->save();

        return response()->json([
            'status' => true,
            'message' => 'Truno laboral asociado al paciente exitosamente',
            'data' => ['ch_sw_turn' => $ChSwTurn->toArray()]
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
        $ChSwTurn = ChSwTurn::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Truno laboral obtenido exitosamente',
            'data' => ['ch_sw_turn' => $ChSwTurn]
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
        $ChSwTurn = ChSwTurn::find($id);  
        $ChSwTurn->name = $request->name; 
        $ChSwTurn->save();

        return response()->json([
            'status' => true,
            'message' => 'Truno laboral actualizado exitosamente',
            'data' => ['ch_sw_turn' => $ChSwTurn]
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
            $ChSwTurn = ChSwTurn::find($id);
            $ChSwTurn->delete();

            return response()->json([
                'status' => true,
                'message' => 'Truno laboral eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Truno laboral en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
