<?php

namespace App\Http\Controllers\Management;

use App\Models\ContractLog;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContractLogRequest;
use Illuminate\Database\QueryException;

class ContractLogController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ContractLog = ContractLog::select();

        if($request->_sort){
            $ContractLog->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ContractLog->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ContractLog=$ContractLog->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ContractLog=$ContractLog->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Registro de contracto obtenidos exitosamente',
            'data' => ['contract_log' => $ContractLog]
        ]);
    }

    public function store(ContractLogRequest $request): JsonResponse
    {
        $ContractLog = new ContractLog;
        $ContractLog->name = $request->name;
        $ContractLog->date_log = $request->date_log;
        $ContractLog->contract_id = $request->name;
        $ContractLog->save();

        return response()->json([
            'status' => true,
            'message' => 'Registro de contracto creada exitosamente',
            'data' => ['contract_log' => $ContractLog->toArray()]
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
        $ContractLog = ContractLog::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Registro de contracto obtenido exitosamente',
            'data' => ['contract_log' => $ContractLog]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ContractLogRequest $request, int $id): JsonResponse
    {
        $ContractLog = ContractLog::find($id);
        $ContractLog->name = $request->name;
        $ContractLog->date_log = $request->date_log;
        $ContractLog->contract_id = $request->name;
        $ContractLog->save();

        return response()->json([
            'status' => true,
            'message' => 'Registro de contracto actualizado exitosamente',
            'data' => ['contract_log' => $ContractLog]
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
            $ContractLog = ContractLog::find($id);
            $ContractLog->delete();

            return response()->json([
                'status' => true,
                'message' => 'Registro de contracto eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Registro de contracto esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
