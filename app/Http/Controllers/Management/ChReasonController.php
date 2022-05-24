<?php

namespace App\Http\Controllers\Management;

use App\Models\ChReason;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChReasonRequest;
use Illuminate\Database\QueryException;

class ChReasonController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChReason = ChReason::select();

        if($request->_sort){
            $ChReason->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChReason->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChReason=$ChReason->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChReason=$ChReason->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Motivo asociados exitosamente',
            'data' => ['ch_reason' => $ChReason]
        ]);
    }
    

    public function store(ChReasonRequest $request): JsonResponse
    {
        $ChReason = new ChReason;
        $ChReason->name = $request->name; 
        $ChReason->save();

        return response()->json([
            'status' => true,
            'message' => 'Motivo creada exitosamente',
            'data' => ['ch_reason' => $ChReason->toArray()]
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
        $ChReason = ChReason::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Motivo obtenido exitosamente',
            'data' => ['ch_reason' => $ChReason]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ChReasonRequest $request, int $id): JsonResponse
    {
        $ChReason = ChReason::find($id);
        $ChReason->name = $request->name; 
        $ChReason->save();

        return response()->json([
            'status' => true,
            'message' => 'Motivo actualizado exitosamente',
            'data' => ['ch_reason' => $ChReason]
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
            $ChReason = ChReason::find($id);
            $ChReason->delete();

            return response()->json([
                'status' => true,
                'message' => 'Motivo eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Motivo esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
