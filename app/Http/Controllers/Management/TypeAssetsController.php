<?php

namespace App\Http\Controllers\Management;

use App\Models\TypeAssets;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TypeAssetsRequest;
use Illuminate\Database\QueryException;

class TypeAssetsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $TypeAssets = TypeAssets::select();

        if($request->_sort){
            $TypeAssets->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $TypeAssets->where('name','like','%' . $request->search. '%')
            >orWhere('code', 'like', '%' . $request->search . '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $TypeAssets=$TypeAssets->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $TypeAssets=$TypeAssets->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Tipo de activo Fijo obtenidos exitosamente',
            'data' => ['type_assets' => $TypeAssets]
        ]);
    }
    

    public function store(TypeAssetsRequest $request): JsonResponse
    {
        $TypeAssets = new TypeAssets;
        $TypeAssets->name = $request->name;
        $TypeAssets->fixed_assets_id = $request->fixed_assets_id;
        $TypeAssets->plate_number = $request->plate_number;
        $TypeAssets->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de activo Fijo creado exitosamente',
            'data' => ['type_assets' => $TypeAssets->toArray()]
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
        $TypeAssets = TypeAssets::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de activo Fijo obtenido exitosamente',
            'data' => ['type_assets' => $TypeAssets]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TypeAssetsRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(TypeAssetsRequest $request, int $id): JsonResponse
    {
        $TypeAssets = TypeAssets ::find($id);
        $TypeAssets->name = $request->name;
        $TypeAssets->fixed_assets_id = $request->fixed_assets_id;
        $TypeAssets->plate_number = $request->plate_number;       
        $TypeAssets->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de activo Fijo actualizado exitosamente',
            'data' => ['type_assets' => $TypeAssets]
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
            $TypeAssets = TypeAssets::find($id);
            $TypeAssets->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de activo Fijo eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de activo Fijo esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
