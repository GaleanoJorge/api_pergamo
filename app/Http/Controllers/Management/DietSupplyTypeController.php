<?php

namespace App\Http\Controllers\Management;

use App\Models\DietSupplyType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DietSupplyTypeRequest;
use Illuminate\Database\QueryException;

class DietSupplyTypeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $DietSupplyType = DietSupplyType::select();

        if($request->_sort){
            $DietSupplyType->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $DietSupplyType->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $DietSupplyType=$DietSupplyType->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $DietSupplyType=$DietSupplyType->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Tipos de insumo de dietas obtenidos exitosamente',
            'data' => ['diet_supply_type' => $DietSupplyType]
        ]);
    }

    public function store(DietSupplyTypeRequest $request): JsonResponse
    {
        $DietSupplyType = new DietSupplyType;
        $DietSupplyType->name = $request->name;
        
        $DietSupplyType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipos de insumo de dietas creados exitosamente',
            'data' => ['diet_supply_type' => $DietSupplyType->toArray()]
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
        $DietSupplyType = DietSupplyType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipos de insumo de dietas obtenidos exitosamente',
            'data' => ['diet_supply_type' => $DietSupplyType]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(DietSupplyTypeRequest $request, int $id): JsonResponse
    {
        $DietSupplyType = DietSupplyType::find($id);
        $DietSupplyType->name = $request->name;
        
        $DietSupplyType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipos de insumo de dietas actualizados exitosamente',
            'data' => ['diet_supply_type' => $DietSupplyType]
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
            $DietSupplyType = DietSupplyType::find($id);
            $DietSupplyType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipos de insumo de dietas eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipos de insumo de dietas estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
