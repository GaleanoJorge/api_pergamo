<?php

namespace App\Http\Controllers\Management;

use App\Models\ProductSubcategory;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductSubcategoryRequest;
use Illuminate\Database\QueryException;

class ProductSubcategoryController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ProductSubcategory = ProductSubcategory::select();

        if($request->_sort){
            $ProductSubcategory->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ProductSubcategory->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ProductSubcategory=$ProductSubcategory->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ProductSubcategory=$ProductSubcategory->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Subcategoria obtenidos exitosamente',
            'data' => ['product_subcategory' => $ProductSubcategory]
        ]);
    }
    
            /**
     * Display a listing of the resource
     *
     * @param integer $product_category_id
     * @return JsonResponse
     */
    public function getSubcategoryByCategory(int $product_category_id): JsonResponse
    {
        $ProductSubcategory = ProductSubcategory::where('product_category_id', $product_category_id)
            ->orderBy('name', 'asc')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'SubCategoria de producto obtenidos exitosamente',
            'data' => ['product_subcategory' => $ProductSubcategory]
        ]);
    }

    public function store(ProductSubcategoryRequest $request): JsonResponse
    {
        $ProductSubcategory = new ProductSubcategory;
        $ProductSubcategory->name = $request->name;
        $ProductSubcategory->product_category_id = $request->product_category_id;     
        $ProductSubcategory->save();

        return response()->json([
            'status' => true,
            'message' => 'Subcategoria creado exitosamente',
            'data' => ['product_subcategory' => $ProductSubcategory->toArray()]
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
        $ProductSubcategory = ProductSubcategory::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Subcategoria obtenido exitosamente',
            'data' => ['product_subcategory' => $ProductSubcategory]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductSubcategoryRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ProductSubcategoryRequest $request, int $id): JsonResponse
    {
        $ProductSubcategory = ProductSubcategory ::find($id);
        $ProductSubcategory->name = $request->name;
        $ProductSubcategory->product_group_id = $request->product_group_id;     
        $ProductSubcategory->save();
        
        return response()->json([
            'status' => true,
            'message' => 'Subcategoria actualizado exitosamente',
            'data' => ['product_subcategory' => $ProductSubcategory]
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
            $ProductSubcategory = ProductSubcategory::find($id);
            $ProductSubcategory->delete();

            return response()->json([
                'status' => true,
                'message' => 'Subcategoria eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Subcategoria esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
