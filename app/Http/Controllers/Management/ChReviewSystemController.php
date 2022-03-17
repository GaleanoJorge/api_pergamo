<?php

namespace App\Http\Controllers\Management;

use App\Models\ChReviewSystem;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChReviewSystemController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChReviewSystem = ChReviewSystem::select();

        if($request->_sort){
            $ChReviewSystem->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChReviewSystem->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChReviewSystem=$ChReviewSystem->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChReviewSystem=$ChReviewSystem->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico obtenidos exitosamente',
            'data' => ['ch_review_system' => $ChReviewSystem]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChReviewSystem = new ChReviewSystem; 
        $ChReviewSystem->name = $request->name; 
        $ChReviewSystem->save();

        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico asociado al paciente exitosamente',
            'data' => ['ch_review_system' => $ChReviewSystem->toArray()]
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
        $ChReviewSystem = ChReviewSystem::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico obtenido exitosamente',
            'data' => ['ch_review_system' => $ChReviewSystem]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $ChReviewSystem = ChReviewSystem::find($id);  
        $ChReviewSystem->name = $request->name; 
          
        
        
        $ChReviewSystem->save();

        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico actualizado exitosamente',
            'data' => ['ch_review_system' => $ChReviewSystem]
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
            $ChReviewSystem = ChReviewSystem::find($id);
            $ChReviewSystem->delete();

            return response()->json([
                'status' => true,
                'message' => 'Clase de diagnostico eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Clase de diagnostico en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
