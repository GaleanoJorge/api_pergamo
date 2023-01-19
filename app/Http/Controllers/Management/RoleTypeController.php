<?php

namespace App\Http\Controllers\Management;

use App\Models\RoleType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RoleTypeRequest;
use Illuminate\Database\QueryException;

class RoleTypeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $RoleType = RoleType::select();

        if($request->_sort){
            $RoleType->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $RoleType->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $RoleType=$RoleType->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $RoleType=$RoleType->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Tipos de rol obtenidos exitosamente',
            'data' => ['role_type' => $RoleType]
        ]);
    }

    public function store(RoleTypeRequest $request): JsonResponse
    {
        $RoleType = new RoleType;
        $RoleType->name = $request->name;
        
        $RoleType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipos de rol creados exitosamente',
            'data' => ['role_type' => $RoleType->toArray()]
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
        $RoleType = RoleType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipos de rol obtenidos exitosamente',
            'data' => ['role_type' => $RoleType]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(RoleTypeRequest $request, int $id): JsonResponse
    {
        $RoleType = RoleType::find($id);
        $RoleType->name = $request->name;
        
        $RoleType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipos de rol actualizados exitosamente',
            'data' => ['role_type' => $RoleType]
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
            $RoleType = RoleType::find($id);
            $RoleType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipos de rol eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipos de rol estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
