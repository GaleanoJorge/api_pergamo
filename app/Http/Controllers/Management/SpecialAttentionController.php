<?php

namespace App\Http\Controllers\Management;

use App\Models\SpecialAttention;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SpecialAttentionRequest;
use Illuminate\Database\QueryException;

class SpecialAttentionController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $SpecialAttention = SpecialAttention::select();

        if($request->_sort){
            $SpecialAttention->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $SpecialAttention->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $SpecialAttention=$SpecialAttention->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $SpecialAttention=$SpecialAttention->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Atención Especial asociados exitosamente',
            'data' => ['special_attention' => $SpecialAttention]
        ]);
    }
    

    public function store(SpecialAttentionRequest $request): JsonResponse
    {
        $SpecialAttention = new SpecialAttention;
         
        $SpecialAttention->name = $request->name; 
       
        $SpecialAttention->save();

        return response()->json([
            'status' => true,
            'message' => 'Atención Especial creada exitosamente',
            'data' => ['special_attention' => $SpecialAttention->toArray()]
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
        $SpecialAttention = SpecialAttention::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Atención Especial obtenido exitosamente',
            'data' => ['special_attention' => $SpecialAttention]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(SpecialAttentionRequest $request, int $id): JsonResponse
    {
        $SpecialAttention = SpecialAttention::find($id);
     
        $SpecialAttention->name = $request->name; 
        
        $SpecialAttention->save();

        return response()->json([
            'status' => true,
            'message' => 'Atención Especial actualizado exitosamente',
            'data' => ['activitspecial_attentionies' => $SpecialAttention]
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
            $SpecialAttention = SpecialAttention::find($id);
            $SpecialAttention->delete();

            return response()->json([
                'status' => true,
                'message' => 'Atención Especial eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Atención Especial esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
