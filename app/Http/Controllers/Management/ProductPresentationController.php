<?php

namespace App\Http\Controllers\Management;

use App\Models\ProductPresentation;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductPresentationRequest;
use Illuminate\Database\QueryException;

class ProductPresentationController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ProductPresentation = ProductPresentation::select();

        if($request->_sort){
            $ProductPresentation->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ProductPresentation->where('name','like','%' . $request->search. '%')
            >orWhere('code', 'like', '%' . $request->search . '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ProductPresentation=$ProductPresentation->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ProductPresentation=$ProductPresentation->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Presentación de los productos obtenidos exitosamente',
            'data' => ['product_presentation' => $ProductPresentation]
        ]);
    }
    

    public function store(ProductPresentationRequest $request): JsonResponse
    {
        $ProductPresentation = new ProductPresentation;
        $ProductPresentation->name = $request->name;      
        $ProductPresentation->save();

        return response()->json([
            'status' => true,
            'message' => 'Presentación de los productos creado exitosamente',
            'data' => ['product_presentation' => $ProductPresentation->toArray()]
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
        $ProductPresentation = ProductPresentation::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Presentación de los productos obtenido exitosamente',
            'data' => ['product_presentation' => $ProductPresentation]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductPresentationRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ProductPresentationRequest $request, int $id): JsonResponse
    {
        $ProductPresentation = ProductPresentation ::find($id);
        $ProductPresentation->name = $request->name;   
        $ProductPresentation->save();

        return response()->json([
            'status' => true,
            'message' => 'Presentación de los productos actualizado exitosamente',
            'data' => ['product_presentation' => $ProductPresentation]
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
            $ProductPresentation = ProductPresentation::find($id);
            $ProductPresentation->delete();

            return response()->json([
                'status' => true,
                'message' => 'Presentación de los productos eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Presentación de los productos esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
