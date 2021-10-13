<?php

namespace App\Http\Controllers\Management;

use App\Models\InvimaStatus;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\InvimaStatusRequest;
use Illuminate\Database\QueryException;

class InvimaStatusController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $InvimaStatus = InvimaStatus::select();

        if($request->_sort){
            $InvimaStatus->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $InvimaStatus->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $InvimaStatus=$InvimaStatus->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $InvimaStatus=$InvimaStatus->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Estados del invima listados exitosamente',
            'data' => ['invima_status' => $InvimaStatus]
        ]);
    }
    

    public function store(InvimaStatusRequest $request): JsonResponse
    {
        $InvimaStatus = new InvimaStatus;
        $InvimaStatus->name = $request->name; 
        $InvimaStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'Estados del invima creada exitosamente',
            'data' => ['invima_status' => $InvimaStatus->toArray()]
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
        $InvimaStatus = InvimaStatus::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Estados del invima obtenido exitosamente',
            'data' => ['invima_status' => $InvimaStatus]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(InvimaStatusRequest $request, int $id): JsonResponse
    {
        $InvimaStatus = InvimaStatus::find($id);
        $InvimaStatus->name = $request->name; 
        $InvimaStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'Estados del invima actualizado exitosamente',
            'data' => ['invima_status' => $InvimaStatus]
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
            $InvimaStatus = InvimaStatus::find($id);
            $InvimaStatus->delete();

            return response()->json([
                'status' => true,
                'message' => 'Estados del invima eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Estados del invima esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
