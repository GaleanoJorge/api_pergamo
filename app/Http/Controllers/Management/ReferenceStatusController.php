<?php

namespace App\Http\Controllers\Management;

use App\Models\ReferenceStatus;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ReferenceStatusController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ReferenceStatus = ReferenceStatus::select();

        if($request->_sort){
            $ReferenceStatus->orderBy($request->_sort, $request->_order);
        }            

        if ($request->arr) {
            $ReferenceStatus->whereIn('id', json_decode($request->arr));
        }

        if ($request->search) {
            $ReferenceStatus->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ReferenceStatus=$ReferenceStatus->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ReferenceStatus=$ReferenceStatus->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Días de dieta obtenidos exitosamente',
            'data' => ['reference_status' => $ReferenceStatus]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ReferenceStatus = new ReferenceStatus;
        $ReferenceStatus->name = $request->name;
        
        $ReferenceStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'Días de dieta creados exitosamente',
            'data' => ['reference_status' => $ReferenceStatus->toArray()]
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
        $ReferenceStatus = ReferenceStatus::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Días de dieta obtenidos exitosamente',
            'data' => ['reference_status' => $ReferenceStatus]
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
        $ReferenceStatus = ReferenceStatus::find($id);
        $ReferenceStatus->name = $request->name;
        
        $ReferenceStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'Días de dieta actualizados exitosamente',
            'data' => ['reference_status' => $ReferenceStatus]
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
            $ReferenceStatus = ReferenceStatus::find($id);
            $ReferenceStatus->delete();

            return response()->json([
                'status' => true,
                'message' => 'Días de dieta eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Días de dieta estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
