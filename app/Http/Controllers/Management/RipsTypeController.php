<?php

namespace App\Http\Controllers\Management;

use App\Models\RipsType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RipsTypeRequest;
use Illuminate\Database\QueryException;

class RipsTypeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $RipsType = RipsType::with('rips_typefile');

        if($request->_sort){
            $RipsType->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $RipsType->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $RipsType=$RipsType->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $RipsType=$RipsType->paginate($per_page,'*','page',$page); 
        } 

        return response()->json([
            'status' => true,
            'message' => 'Tipo de registros individuales de prestación de servicios de salud obtenidas exitosamente',
            'data' => ['rips_type' => $RipsType]
        ]);
    }
    

    public function store(RipsTypeRequest $request): JsonResponse
    {
        $RipsType = new RipsType;
        $RipsType->name = $request->name;
        $RipsType->rips_typefile_id = $request->rips_typefile_id;
        $RipsType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de registros individuales de prestación de servicios de salud creado exitosamente',
            'data' => ['rips_type' => $RipsType->toArray()]
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
        $RipsType = RipsType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de registros individuales de prestación de servicios de salud obtenido exitosamente',
            'data' => ['rips_type' => $RipsType]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RipsTypeRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(RipsTypeRequest $request, int $id): JsonResponse
    {
        $RipsType = RipsType::find($id);
        $RipsType->name = $request->name;
        $RipsType->rips_typefile_id = $request->rips_typefile_id;
       
    
        $RipsType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de registros individuales de prestación de servicios de salud actualizado exitosamente',
            'data' => ['rips_type' => $RipsType]
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
            $RipsType = RipsType::find($id);
            $RipsType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de registros individuales de prestación de servicios de salud eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de registros individuales de prestación de servicios de salud esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
