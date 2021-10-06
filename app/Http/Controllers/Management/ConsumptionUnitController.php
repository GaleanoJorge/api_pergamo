<?php

namespace App\Http\Controllers\Management;

use App\Models\ConsumptionUnit;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ConsumptionUnitRequest;
use Illuminate\Database\QueryException;

class ConsumptionUnitController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ConsumptionUnit = ConsumptionUnit::select();

        if($request->_sort){
            $ConsumptionUnit->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ConsumptionUnit->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ConsumptionUnit=$ConsumptionUnit->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ConsumptionUnit=$ConsumptionUnit->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Unidad de consumo obtenidos exitosamente',
            'data' => ['consumption_unit' => $ConsumptionUnit]
        ]);
    }
    

    public function store(ConsumptionUnitRequest $request): JsonResponse
    {
        $ConsumptionUnit = new ConsumptionUnit;
        $ConsumptionUnit->name = $request->name;     
        $ConsumptionUnit->save();

        return response()->json([
            'status' => true,
            'message' => 'Unidad de consumo creado exitosamente',
            'data' => ['consumption_unit' => $ConsumptionUnit->toArray()]
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
        $ConsumptionUnit = ConsumptionUnit::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Unidad de consumo obtenido exitosamente',
            'data' => ['consumption_unit' => $ConsumptionUnit]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ConsumptionUnitRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ConsumptionUnitRequest $request, int $id): JsonResponse
    {
        $ConsumptionUnit = ConsumptionUnit ::find($id);
        $ConsumptionUnit->name = $request->name;      
        $ConsumptionUnit->save();

        return response()->json([
            'status' => true,
            'message' => 'Unidad de consumo actualizado exitosamente',
            'data' => ['consumption_unit' => $ConsumptionUnit]
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
            $ConsumptionUnit = ConsumptionUnit::find($id);
            $ConsumptionUnit->delete();

            return response()->json([
                'status' => true,
                'message' => 'Unidad de consumo eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Unidad de consumo esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
