<?php

namespace App\Http\Controllers\Management;

use App\Models\MaritalStatus;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MaritalStatusRequest;
use Illuminate\Database\QueryException;

class MaritalStatusController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $MaritalStatus = MaritalStatus::select();

        if($request->_sort){
            $MaritalStatus->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $MaritalStatus->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $MaritalStatus=$MaritalStatus->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $MaritalStatus=$MaritalStatus->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Estado Civil asociados exitosamente',
            'data' => ['marital_status' => $MaritalStatus]
        ]);
    }
    

    public function store(MaritalStatusRequest $request): JsonResponse
    {
        $MaritalStatus = new MaritalStatus;
       
        $MaritalStatus->name = $request->name; 
       
        $MaritalStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado Civil creada exitosamente',
            'data' => ['marital_status' => $MaritalStatus->toArray()]
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
        $MaritalStatus = MaritalStatus::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Estado Civil obtenido exitosamente',
            'data' => ['marital_status' => $MaritalStatus]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(MaritalStatusRequest $request, int $id): JsonResponse
    {
        $MaritalStatus = MaritalStatus::find($id);
      
        $MaritalStatus->name = $request->name; 
        
        $MaritalStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado Civil actualizado exitosamente',
            'data' => ['marital_status' => $MaritalStatus]
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
            $MaritalStatus = MaritalStatus::find($id);
            $MaritalStatus->delete();

            return response()->json([
                'status' => true,
                'message' => 'Estado Civil eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Estado Civil esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
