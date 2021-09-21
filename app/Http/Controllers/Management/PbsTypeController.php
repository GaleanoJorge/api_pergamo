<?php

namespace App\Http\Controllers\Management;

use App\Models\PbsType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PbsTypeRequest;
use Illuminate\Database\QueryException;

class PbsTypeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $PbsType = PbsType::select();

        if($request->_sort){
            $PbsType->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $PbsType->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $PbsType=$PbsType->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $PbsType=$PbsType->paginate($per_page,'*','page',$page); 
        } 

        return response()->json([
            'status' => true,
            'message' => 'Tipo de PBS (plan básico de salud) obtenidas exitosamente',
            'data' => ['pbs_type' => $PbsType]
        ]);
    }
    

    public function store(PbsTypeRequest $request): JsonResponse
    {
        $PbsType = new PbsType;
        $PbsType->name = $request->name;
      
      
        $PbsType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de PBS (plan básico de salud) creado exitosamente',
            'data' => ['pbs_type' => $PbsType->toArray()]
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
        $PbsType = PbsType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de PBS (plan básico de salud) obtenido exitosamente',
            'data' => ['pbs_type' => $PbsType]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PbsTypeRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(PbsTypeRequest $request, int $id): JsonResponse
    {
        $PbsType = PbsType::find($id);
        $PbsType->name = $request->name;
       
    
        $PbsType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de PBS (plan básico de salud) actualizado exitosamente',
            'data' => ['pbs_type' => $PbsType]
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
            $PbsType = PbsType::find($id);
            $PbsType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de PBS (plan básico de salud) eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de PBS (plan básico de salud) esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
