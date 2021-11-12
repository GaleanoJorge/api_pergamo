<?php

namespace App\Http\Controllers\Management;

use App\Models\ReceivedBy;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ReceivedByRequest;
use Illuminate\Database\QueryException;

class ReceivedByController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ReceivedBy = ReceivedBy::select();

        if($request->_sort){
            $ReceivedBy->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ReceivedBy->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ReceivedBy=$ReceivedBy->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ReceivedBy=$ReceivedBy->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Medio de Recibido  obtenidos exitosamente',
            'data' => ['received_by' => $ReceivedBy]
        ]);
    }

    public function store(ReceivedByRequest $request): JsonResponse
    {
        $ReceivedBy = new ReceivedBy;
        $ReceivedBy->name = $request->name;
        
        $ReceivedBy->save();

        return response()->json([
            'status' => true,
            'message' => 'Medio de Recibido  creados exitosamente',
            'data' => ['received_by' => $ReceivedBy->toArray()]
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
        $ReceivedBy = ReceivedBy::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Medio de Recibido  obtenidos exitosamente',
            'data' => ['received_by' => $ReceivedBy]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ReceivedByRequest $request, int $id): JsonResponse
    {
        $ReceivedBy = ReceivedBy::find($id);
        $ReceivedBy->name = $request->name;
        
        $ReceivedBy->save();

        return response()->json([
            'status' => true,
            'message' => 'Medio de Recibido  actualizados exitosamente',
            'data' => ['received_by' => $ReceivedBy]
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
            $ReceivedBy = ReceivedBy::find($id);
            $ReceivedBy->delete();

            return response()->json([
                'status' => true,
                'message' => 'Medio de Recibido  eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Medio de Recibido  estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
