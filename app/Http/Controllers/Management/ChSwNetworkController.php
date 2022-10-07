<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwNetwork;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChSwNetworkController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwNetwork = ChSwNetwork::select();

        if($request->_sort){
            $ChSwNetwork->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChSwNetwork->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChSwNetwork=$ChSwNetwork->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChSwNetwork=$ChSwNetwork->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Redes de apoyo obtenidas exitosamente',
            'data' => ['ch_sw_network' => $ChSwNetwork]
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
        
       
        $ChSwNetwork = ChSwNetwork::where('ch_record_id', $id)
        ->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Redes de apoyo obtenidas exitosamente',
            'data' => ['ch_sw_network' => $ChSwNetwork]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChSwNetwork = new ChSwNetwork;
        $ChSwNetwork->name = $request->name; 
        $ChSwNetwork->save();

        return response()->json([
            'status' => true,
            'message' => 'Redes de apoyo asociadas al paciente exitosamente',
            'data' => ['ch_sw_network' => $ChSwNetwork->toArray()]
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
        $ChSwNetwork = ChSwNetwork::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Redes de apoyo obtenidas exitosamente',
            'data' => ['ch_sw_network' => $ChSwNetwork]
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
        $ChSwNetwork = ChSwNetwork::find($id);  
        $ChSwNetwork->name = $request->name; 
        $ChSwNetwork->save();

        return response()->json([
            'status' => true,
            'message' => 'Redes de apoyo actualizadas exitosamente',
            'data' => ['ch_sw_network' => $ChSwNetwork]
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
            $ChSwNetwork = ChSwNetwork::find($id);
            $ChSwNetwork->delete();

            return response()->json([
                'status' => true,
                'message' => 'Redes de apoyo eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Redes de apoyo en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
