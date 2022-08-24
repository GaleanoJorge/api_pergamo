<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedNomProduct;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FixedNomProductRequest;
use Illuminate\Database\QueryException;

class FixedNomProductController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FixedNomProduct = FixedNomProduct::with('fixed_clasification','fixed_clasification.fixed_code', 'fixed_clasification.fixed_type');

        if($request->_sort){
            $FixedNomProduct->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $FixedNomProduct->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $FixedNomProduct=$FixedNomProduct->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $FixedNomProduct=$FixedNomProduct->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Descripción del activo obtenidos exitosamente',
            'data' => ['fixed_nom_product' => $FixedNomProduct]
        ]);
    }

                /**
     * Display a listing of the resource
     *
     * @param integer $fixed_type_id
     * @return JsonResponse
     */
    public function getCategoryByGroup(int $fixed_type_id): JsonResponse
    {
        $FixedNomProduct = FixedNomProduct::where('fixed_type_id', $fixed_type_id)
            ->orderBy('name', 'asc')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Categoria del insumo obtenidos exitosamente',
            'data' => ['fixed_nom_product' => $FixedNomProduct]
        ]);
    }


     
             /**
     * Display a listing of the resource
     *
     * @param integer $fixed_clasification_id
     * @return JsonResponse
     */
    public function getSubcategoryByCategory(int $fixed_clasification_id): JsonResponse
    {
        $FixedNomProduct = FixedNomProduct::where('fixed_clasification_id', $fixed_clasification_id)
            ->orderBy('name', 'asc')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Descripción del activo obtenidos exitosamente',
            'data' => ['fixed_nom_product' => $FixedNomProduct]
        ]);
    }




    public function store(FixedNomProductRequest $request): JsonResponse
    {
        $FixedNomProduct = new FixedNomProduct;
        $FixedNomProduct->name = $request->name;
        $FixedNomProduct->fixed_clasification_id = $request->fixed_clasification_id;
        $FixedNomProduct->save();

        return response()->json([
            'status' => true,
            'message' => 'Descripción del activo creado exitosamente',
            'data' => ['fixed_nom_product' => $FixedNomProduct->toArray()]
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
        $FixedNomProduct = FixedNomProduct::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Descripción del activo obtenido exitosamente',
            'data' => ['fixed_nom_product' => $FixedNomProduct]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FixedNomProductRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(FixedNomProductRequest $request, int $id): JsonResponse
    {
        $FixedNomProduct = FixedNomProduct ::find($id);
        $FixedNomProduct->name = $request->name;
        $FixedNomProduct->fixed_clasification_id = $request->fixed_clasification_id;
        $FixedNomProduct->save();
        return response()->json([
            'status' => true,
            'message' => 'Descripción del activo actualizado exitosamente',
            'data' => ['fixed_nom_product' => $FixedNomProduct]
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
            $FixedNomProduct = FixedNomProduct::find($id);
            $FixedNomProduct->delete();

            return response()->json([
                'status' => true,
                'message' => 'Descripción del activo eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Descripción del activoesta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
