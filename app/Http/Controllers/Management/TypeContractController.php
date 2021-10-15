<?php

namespace App\Http\Controllers\Management;

use App\Models\TypeContract;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TypeContractRequest;
use Illuminate\Database\QueryException;

class TypeContractController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $TypeContract = TypeContract::select();

        if($request->_sort){
            $TypeContract->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $TypeContract->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $TypeContract=$TypeContract->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $TypeContract=$TypeContract->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Tipos de contratos obtenidos exitosamente',
            'data' => ['type_contract' => $TypeContract]
        ]);
    }

    public function store(TypeContractRequest $request): JsonResponse
    {
        $TypeContract = new TypeContract;
        $TypeContract->name = $request->name;
        $TypeContract->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de contratos de entidades de salud creada exitosamente',
            'data' => ['type_contract' => $TypeContract->toArray()]
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
        $TypeContract = TypeContract::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de contratos de entidades de salud obtenido exitosamente',
            'data' => ['type_contract' => $TypeContract]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(TypeContractRequest $request, int $id): JsonResponse
    {
        $TypeContract = TypeContract::find($id);
        $TypeContract->name = $request->name;
        $TypeContract->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de contratos de entidades de salud actualizado exitosamente',
            'data' => ['type_contract' => $TypeContract]
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
            $TypeContract = TypeContract::find($id);
            $TypeContract->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de contratos de entidad de salud eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de contratos de entidad de salud esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
