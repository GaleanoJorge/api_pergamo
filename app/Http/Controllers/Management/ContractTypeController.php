<?php

namespace App\Http\Controllers\Management;

use App\Models\ContractType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContractTypeRequest;
use Illuminate\Database\QueryException;

class ContractTypeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse

    {
        $ContractType = ContractType::select();

        if($request->_sort){
            $ContractType->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ContractType->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ContractType=$ContractType->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ContractType=$ContractType->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Tipo de contracto del empleado asociados exitosamente',
            'data' => ['contract_type' => $ContractType]
        ]);
    }
    

    public function store(ContractTypeRequest $request): JsonResponse
    {
        $ContractType = new ContractType;
        $ContractType->name = $request->name;
        $ContractType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de contracto del empleado creada exitosamente',
            'data' => ['contract_type' => $ContractType->toArray()]
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
        $ContractType = ContractType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de contracto del empleado obtenido exitosamente',
            'data' => ['contract_type' => $ContractType]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ContractTypeRequest $request, int $id): JsonResponse
    {
        $ContractType = ContractType::find($id);

        $ContractType->name = $request->name; 
        $ContractType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de contracto del empleado actualizado exitosamente',
            'data' => ['contract_type' => $ContractType]
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
            $ContractType = ContractType::find($id);
            $ContractType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de contracto del empleado eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de contracto del empleado esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
