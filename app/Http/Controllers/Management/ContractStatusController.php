<?php

namespace App\Http\Controllers\Management;

use App\Models\ContractStatus;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContractStatusRequest;
use Illuminate\Database\QueryException;

class ContractStatusController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ContractStatus = ContractStatus::select();

        if($request->_sort){
            $ContractStatus->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ContractStatus->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ContractStatus=$ContractStatus->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ContractStatus=$ContractStatus->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Estado del contracto obtenidos exitosamente',
            'data' => ['contract_status' => $ContractStatus]
        ]);
    }

    public function store(ContractStatusRequest $request): JsonResponse
    {
        $ContractStatus = new ContractStatus;
        $ContractStatus->name = $request->name;
        $ContractStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado del contracto creada exitosamente',
            'data' => ['contract_status' => $ContractStatus->toArray()]
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
        $ContractStatus = ContractStatus::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Estado del contracto obtenido exitosamente',
            'data' => ['contract_status' => $ContractStatus]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ContractStatusRequest $request, int $id): JsonResponse
    {
        $ContractStatus = ContractStatus::find($id);
        $ContractStatus->name = $request->name;
        $ContractStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado del contracto actualizado exitosamente',
            'data' => ['contract_status' => $ContractStatus]
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
            $ContractStatus = ContractStatus::find($id);
            $ContractStatus->delete();

            return response()->json([
                'status' => true,
                'message' => 'Estado del contracto eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Estado del contracto esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
