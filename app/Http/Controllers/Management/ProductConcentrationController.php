<?php

namespace App\Http\Controllers\Management;

use App\Models\ProductConcentration;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductConcentrationRequest;
use Illuminate\Database\QueryException;

class ProductConcentrationController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ProductConcentration = ProductConcentration::select();

        if($request->_sort){
            $ProductConcentration->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ProductConcentration->where('value','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ProductConcentration=$ProductConcentration->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ProductConcentration=$ProductConcentration->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Cantidad de la sustancia(s) que componen el medicamento obtenidos exitosamente',
            'data' => ['product_concentration' => $ProductConcentration]
        ]);
    }
    

    public function store(ProductConcentrationRequest $request): JsonResponse
    {
        $ProductConcentration = new ProductConcentration;
        $ProductConcentration->value = $request->value;      
        $ProductConcentration->save();

        return response()->json([
            'status' => true,
            'message' => 'Cantidad de la sustancia(s) que componen el medicamento creado exitosamente',
            'data' => ['product_concentration' => $ProductConcentration->toArray()]
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
        $ProductConcentration = ProductConcentration::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Cantidad de la sustancia(s) que componen el medicamento obtenido exitosamente',
            'data' => ['product_concentration' => $ProductConcentration]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductConcentrationRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ProductConcentrationRequest $request, int $id): JsonResponse
    {
        $ProductConcentration = ProductConcentration ::find($id);
        $ProductConcentration->value = $request->value;   
        $ProductConcentration->save();

        return response()->json([
            'status' => true,
            'message' => 'Cantidad de la sustancia(s) que componen el medicamento actualizado exitosamente',
            'data' => ['product_concentration' => $ProductConcentration]
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
            $ProductConcentration = ProductConcentration::find($id);
            $ProductConcentration->delete();

            return response()->json([
                'status' => true,
                'message' => 'Cantidad de la sustancia(s) que componen el medicamento eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Cantidad de la sustancia(s) que componen el medicamento esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
