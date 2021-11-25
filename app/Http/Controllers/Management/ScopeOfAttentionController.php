<?php

namespace App\Http\Controllers\Management;

use App\Models\ScopeOfAttention;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ScopeOfAttentionRequest;
use Illuminate\Database\QueryException;

class ScopeOfAttentionController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ScopeOfAttention = ScopeOfAttention::select();

        if($request->_sort){
            $ScopeOfAttention->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ScopeOfAttention->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ScopeOfAttention=$ScopeOfAttention->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ScopeOfAttention=$ScopeOfAttention->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Ambito de atencion para el paciente asociados exitosamente',
            'data' => ['scope_of_attention' => $ScopeOfAttention]
        ]);
    }

           /**
     * Display a listing of the resource
     *
     * @param integer $admissions_route_id
     * @return JsonResponse
     */
    public function getScopeByAdmission(int $admissions_route_id): JsonResponse
    {
        $ScopeOfAttention = ScopeOfAttention::where('admission_route_id', $admissions_route_id)
            ->orderBy('name', 'asc')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Ambito de atencion obtenidos exitosamente',
            'data' => ['scope_of_attention' => $ScopeOfAttention]
        ]);
    }
    

    public function store(ScopeOfAttentionRequest $request): JsonResponse
    {
        $ScopeOfAttention = new ScopeOfAttention;
        $ScopeOfAttention->name = $request->name; 
        $ScopeOfAttention->admission_route_id = $request->admission_route_id;
        $ScopeOfAttention->save();

        return response()->json([
            'status' => true,
            'message' => 'Ambito de atencion para el paciente creada exitosamente',
            'data' => ['scope_of_attention' => $ScopeOfAttention->toArray()]
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
        $ScopeOfAttention = ScopeOfAttention::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Ambito de atencion para el paciente obtenido exitosamente',
            'data' => ['scope_of_attention' => $ScopeOfAttention]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ScopeOfAttentionRequest $request, int $id): JsonResponse
    {
        $ScopeOfAttention = ScopeOfAttention::find($id); 
        $ScopeOfAttention->name = $request->name; 
        $ScopeOfAttention->admission_route_id = $request->admission_route_id;
        
        $ScopeOfAttention->save();

        return response()->json([
            'status' => true,
            'message' => 'Ambito de atencion para el paciente actualizado exitosamente',
            'data' => ['scope_of_attention' => $ScopeOfAttention]
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
            $ScopeOfAttention = ScopeOfAttention::find($id);
            $ScopeOfAttention->delete();

            return response()->json([
                'status' => true,
                'message' => 'Ambito de atencion para el paciente eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Ambito de atencion para el paciente esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
