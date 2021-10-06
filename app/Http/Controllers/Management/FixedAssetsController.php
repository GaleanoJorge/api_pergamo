<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedAssets;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FixedAssetsRequest;
use Illuminate\Database\QueryException;

class FixedAssetsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FixedAssets = FixedAssets::select();

        if($request->_sort){
            $FixedAssets->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $FixedAssets->where('name','like','%' . $request->search. '%')
            >orWhere('code', 'like', '%' . $request->search . '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $FixedAssets=$FixedAssets->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $FixedAssets=$FixedAssets->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Activos Fijos obtenidos exitosamente',
            'data' => ['fixed_assets' => $FixedAssets]
        ]);
    }
    

    public function store(FixedAssetsRequest $request): JsonResponse
    {
        $FixedAssets = new FixedAssets;
        $FixedAssets->name = $request->name;
        $FixedAssets->product_subcategory_id = $request->product_subcategory_id;
        $FixedAssets->product_presentation_id = $request->product_presentation_id;
        $FixedAssets->consumption_unit_id = $request->consumption_unit_id; 
        $FixedAssets->factory_id = $request->factory_id; 
        $FixedAssets->type_assets_id = $request->type_assets_id;
        $FixedAssets->plate_number = $request->plate_number; 
        $FixedAssets->save();

        return response()->json([
            'status' => true,
            'message' => 'Activos Fijos creado exitosamente',
            'data' => ['fixed_assets' => $FixedAssets->toArray()]
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
        $FixedAssets = FixedAssets::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Activos Fijos obtenido exitosamente',
            'data' => ['fixed_assets' => $FixedAssets]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FixedAssetsRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(FixedAssetsRequest $request, int $id): JsonResponse
    {
        $FixedAssets = FixedAssets ::find($id);
        $FixedAssets->name = $request->name;
        $FixedAssets->product_subcategory_id = $request->product_subcategory_id;
        $FixedAssets->product_presentation_id = $request->product_presentation_id;
        $FixedAssets->consumption_unit_id = $request->consumption_unit_id; 
        $FixedAssets->factory_id = $request->factory_id;
        $FixedAssets->type_assets_id = $request->type_assets_id;
        $FixedAssets->plate_number = $request->plate_number;       
        $FixedAssets->save();

        return response()->json([
            'status' => true,
            'message' => 'Activos Fijos actualizado exitosamente',
            'data' => ['fixed_assets' => $FixedAssets]
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
            $FixedAssets = FixedAssets::find($id);
            $FixedAssets->delete();

            return response()->json([
                'status' => true,
                'message' => 'Activos Fijos eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Activos Fijos esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
