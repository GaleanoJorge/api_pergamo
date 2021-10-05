<?php

namespace App\Http\Controllers\Management;

use App\Models\ProductCategory;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductCategoryRequest;
use Illuminate\Database\QueryException;

class ProductCategoryController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ProductCategory = ProductCategory::select();

        if($request->_sort){
            $ProductCategory->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ProductCategory->where('name','like','%' . $request->search. '%')
            >orWhere('code', 'like', '%' . $request->search . '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ProductCategory=$ProductCategory->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ProductCategory=$ProductCategory->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Seleccionar Categoria obtenidos exitosamente',
            'data' => ['product_category' => $ProductCategory]
        ]);
    }
    
        /**
     * Display a listing of the resource
     *
     * @param integer $product_group_id
     * @return JsonResponse
     */
    public function getCategoryByGroup(int $product_group_id): JsonResponse
    {
        $ProductCategory = ProductCategory::where('product_group_id', $product_group_id)
            ->orderBy('name', 'asc')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Categoria de producto obtenidos exitosamente',
            'data' => ['product_category' => $ProductCategory]
        ]);
    }

    public function store(ProductCategoryRequest $request): JsonResponse
    {
        $ProductCategory = new ProductCategory;
        $ProductCategory->name = $request->name;
        $ProductCategory->product_group_id = $request->product_group_id;     
        $ProductCategory->save();

        return response()->json([
            'status' => true,
            'message' => 'Seleccionar Categoria creado exitosamente',
            'data' => ['product_category' => $ProductCategory->toArray()]
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
        $ProductCategory = ProductCategory::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Seleccionar Categoria obtenido exitosamente',
            'data' => ['product_category' => $ProductCategory]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductCategoryRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ProductCategoryRequest $request, int $id): JsonResponse
    {
        $ProductCategory = ProductCategory ::find($id);
        $ProductCategory->name = $request->name;
        $ProductCategory->product_group_id = $request->product_group_id;     
        $ProductCategory->save();
        
        return response()->json([
            'status' => true,
            'message' => 'Seleccionar Categoria actualizado exitosamente',
            'data' => ['product_category' => $ProductCategory]
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
            $ProductCategory = ProductCategory::find($id);
            $ProductCategory->delete();

            return response()->json([
                'status' => true,
                'message' => 'Seleccionar Categoria eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Seleccionar Categoria esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
