<?php

namespace App\Http\Controllers\Management;

use App\Models\PolicyType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PolicyTypeRequest;
use Illuminate\Database\QueryException;

class PolicyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    
    {
        $policy_type = PolicyType::select();

        if($request->_sort){
            $policy_type->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $policy_type->where('name','like','%' . $request->search. '%');
        }
   
        if($request->query("pagination", true)=="false"){
            $policy_type=$policy_type->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $policy_type=$policy_type->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Tipos de pólizas asociadas exitosamente',
            'data' => ['policy_type' => $policy_type]
        ]);
    }

    
    public function store(PolicyTypeRequest $request)
    
    {
        $policy_type = new PolicyType;
        
        $policy_type->name = $request->name; 
     
        $policy_type->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de póliza creada exitosamente',
            'data' => ['policy_type' => $policy_type->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    
    {
        $policy_type = PolicyType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipos de pólizas obtenidas exitosamente',
            'data' => ['policy_type' => $policy_type]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(PolicyTypeRequest $request, int $id): JsonResponse
   
    {
        $policy_type = PolicyType::find($id);
    
        $policy_type->name = $request->name; 

        $policy_type->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de póliza actualizada exitosamente',
            'data' => ['policy_type' => $policy_type]
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
            $policy_type = PolicyType::find($id);
            $policy_type->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de póliza eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de póliza estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
