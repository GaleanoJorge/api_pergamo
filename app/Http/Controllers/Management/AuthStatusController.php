<?php

namespace App\Http\Controllers\Management;

use App\Models\AuthStatus;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthStatusRequest;
use Illuminate\Database\QueryException;

class AuthStatusController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $AuthStatus = AuthStatus::select();

        if($request->_sort){
            $AuthStatus->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $AuthStatus->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $AuthStatus=$AuthStatus->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $AuthStatus=$AuthStatus->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Estado de autorización obtenidos exitosamente',
            'data' => ['auth_status' => $AuthStatus]
        ]);
    }

    public function store(AuthStatusRequest $request): JsonResponse
    {
        $AuthStatus = new AuthStatus;
        $AuthStatus->name = $request->name;
        $AuthStatus->code = $request->code;
        
        $AuthStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado de autorización creado exitosamente',
            'data' => ['auth_status' => $AuthStatus->toArray()]
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
        $AuthStatus = AuthStatus::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Estados de autorización obtenidos exitosamente',
            'data' => ['auth_status' => $AuthStatus]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AuthStatusRequest $request, int $id): JsonResponse
    {
        $AuthStatus = AuthStatus::find($id);
        $AuthStatus->name = $request->name;
        $AuthStatus->code = $request->code;
        
        $AuthStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado de autorización actualizado exitosamente',
            'data' => ['auth_status' => $AuthStatus]
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
            $AuthStatus = AuthStatus::find($id);
            $AuthStatus->delete();

            return response()->json([
                'status' => true,
                'message' => 'Estado de autorización eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Estado de autorización en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
