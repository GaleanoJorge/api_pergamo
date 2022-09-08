<?php

namespace App\Http\Controllers\Management;

use App\Models\ProductDose;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductDoseRequest;
use Illuminate\Database\QueryException;

class ProductDoseController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ProductDose = ProductDose::select();

        if($request->_sort){
            if ($request->_sort != "actions") {

            $ProductDose->orderBy($request->_sort, $request->_order);
        }            
    }            

        if ($request->search) {
            $ProductDose->where('name','like','%' . $request->search. '%')
            ->orWhere('description', 'like', '%' . $request->search . '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ProductDose=$ProductDose->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ProductDose=$ProductDose->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Dosis (medicamento) obtenidos exitosamente',
            'data' => ['product_dose' => $ProductDose]
        ]);
    }
    

    public function store(ProductDoseRequest $request): JsonResponse
    {
        $ProductDose = new ProductDose;
        $ProductDose->name = $request->name;
        $ProductDose->save();

        return response()->json([
            'status' => true,
            'message' => 'Dosis (medicamento) creado exitosamente',
            'data' => ['product_dose' => $ProductDose->toArray()]
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
        $ProductDose = ProductDose::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Dosis (medicamento) obtenido exitosamente',
            'data' => ['product_dose' => $ProductDose]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductDoseRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ProductDoseRequest $request, int $id): JsonResponse
    {
        $ProductDose = ProductDose ::find($id);
        $ProductDose->name = $request->name;
        $ProductDose->save();

        return response()->json([
            'status' => true,
            'message' => 'Dosis (medicamento) actualizado exitosamente',
            'data' => ['product_dose' => $ProductDose]
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
            $ProductDose = ProductDose::find($id);
            $ProductDose->delete();

            return response()->json([
                'status' => true,
                'message' => 'Dosis (medicamento) eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Dosis (medicamento) esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
