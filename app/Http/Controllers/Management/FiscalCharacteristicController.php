<?php

namespace App\Http\Controllers\Management;

use App\Models\FiscalCharacteristic;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FiscalCharacteristicRequest;
use Illuminate\Database\QueryException;

class FiscalCharacteristicController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FiscalCharacteristic = FiscalCharacteristic::select();

        if($request->_sort){
            $FiscalCharacteristic->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $FiscalCharacteristic->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $FiscalCharacteristic=$FiscalCharacteristic->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $FiscalCharacteristic=$FiscalCharacteristic->paginate($per_page,'*','page',$page); 
        } 

        return response()->json([
            'status' => true,
            'message' => 'Responsabilidad fiscal del contribuyente de la compañía obtenida exitosamente',
            'data' => ['fiscal_characteristic' => $FiscalCharacteristic]
        ]);
    }
    

    public function store(FiscalCharacteristicRequest $request): JsonResponse
    {
        $FiscalCharacteristic = new FiscalCharacteristic;
        $FiscalCharacteristic->code = $request->code;
        $FiscalCharacteristic->name = $request->name;
        $FiscalCharacteristic->save();

        return response()->json([
            'status' => true,
            'message' => 'Responsabilidad fiscal del contribuyente de la compañía creada exitosamente',
            'data' => ['fiscal_characteristic' => $FiscalCharacteristic->toArray()]
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
        $FiscalCharacteristic = FiscalCharacteristic::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Responsabilidad fiscal del contribuyente de la compañía obtenido exitosamente',
            'data' => ['fiscal_characteristic' => $FiscalCharacteristic]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(FiscalCharacteristicRequest $request, int $id): JsonResponse
    {
        $FiscalCharacteristic =  FiscalCharacteristic::find($id);
        $FiscalCharacteristic->code = $request->code;
        $FiscalCharacteristic->name = $request->name;
        $FiscalCharacteristic->save();;

        return response()->json([
            'status' => true,
            'message' => 'Responsabilidad fiscal del contribuyente de la compañía actualizado exitosamente',
            'data' => ['fiscal_characteristic' => $FiscalCharacteristic]
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
            $FiscalCharacteristic = FiscalCharacteristic::find($id);
            $FiscalCharacteristic->delete();

            return response()->json([
                'status' => true,
                'message' => 'Responsabilidad fiscal del contribuyente de la compañía eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Responsabilidad fiscal del contribuyente de la compañía esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
