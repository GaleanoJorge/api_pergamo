<?php

namespace App\Http\Controllers\Management;

use App\Models\ChType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $ChType = ChType::select();

        if(isset($request->ch_route_fluid_id)){
            $ChType->orderBy('name', 'desc')->where('ch_route_fluid_id',$request->ch_route_fluid_id);
        }

        if($request->_sort){
            $ChType->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChType->where('name','like','%' . $request->search. '%');
        }
   
        if($request->query("pagination", true)=="false"){
            $ChType=$ChType->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChType=$ChType->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'tipos de fluido obtenidos satisfactoriamente',
            'data' => ['ch_type' => $ChType]
        ]);
    }

    
    public function store(Request $request)
    {
        $ChType = new ChType;
        $ChType->name = $request->name; 
        $ChType->type = $request->type;
        $ChType->save();

        return response()->json([
            'status' => true,
            'message' => 'tipo de fluido creado exitosamente',
            'data' => ['ch_type_fluid' => $ChType->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChType = ChType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'tipo de fluido obtenida exitosamente',
            'data' => ['ch_type_fluid' => $ChType]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $ChType = ChType::find($id);
        $ChType->name = $request->name; 
        $ChType->save();

        return response()->json([
            'status' => true,
            'message' => 'tipo de fluido actualizada exitosamente',
            'data' => ['ch_type_fluid' => $ChType]
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
            $ChType = ChType::find($id);
            $ChType->delete();

            return response()->json([
                'status' => true,
                'message' => 'tipo de fluido eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'tipo de fluido estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
