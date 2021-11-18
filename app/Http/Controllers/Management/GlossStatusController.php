<?php

namespace App\Http\Controllers\Management;

use App\Models\GlossStatus;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GlossStatusRequest;
use Illuminate\Database\QueryException;

class GlossStatusController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $GlossStatus = GlossStatus::select();

        if($request->_sort){
            $GlossStatus->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $GlossStatus->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $GlossStatus=$GlossStatus->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $GlossStatus=$GlossStatus->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Estados de glosas obtenidos exitosamente',
            'data' => ['objetion_type' => $GlossStatus]
        ]);
    }

    public function store(GlossStatusRequest $request): JsonResponse
    {
        $GlossStatus = new GlossStatus;
        $GlossStatus->name = $request->name;
        
        $GlossStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'Estados de glosas creados exitosamente',
            'data' => ['objetion_type' => $GlossStatus->toArray()]
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
        $GlossStatus = GlossStatus::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Estados de glosas obtenidos exitosamente',
            'data' => ['objetion_type' => $GlossStatus]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(GlossStatusRequest $request, int $id): JsonResponse
    {
        $GlossStatus = GlossStatus::find($id);
        $GlossStatus->name = $request->name;
        
        $GlossStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'Estados de glosas actualizados exitosamente',
            'data' => ['objetion_type' => $GlossStatus]
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
            $GlossStatus = GlossStatus::find($id);
            $GlossStatus->delete();

            return response()->json([
                'status' => true,
                'message' => 'Estados de glosas eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Estados de glosas estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
