<?php

namespace App\Http\Controllers\Management;

use App\Models\ChTypeFluid;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChTypeFluidRequest;
use Illuminate\Database\QueryException;

class ChTypeFluidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $ChTypeFluid = ChTypeFluid::select();

        if(isset($request->ch_route_fluid_id)){
            $ChTypeFluid->orderBy('name', 'desc')->where('ch_route_fluid_id',$request->ch_route_fluid_id);
        }

        if($request->_sort){
            $ChTypeFluid->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChTypeFluid->where('name','like','%' . $request->search. '%');
        }
   
        if($request->query("pagination", true)=="false"){
            $ChTypeFluid=$ChTypeFluid->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChTypeFluid=$ChTypeFluid->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'tipos de fluido obtenidos satisfactoriamente',
            'data' => ['ch_type_fluid' => $ChTypeFluid]
        ]);
    }

    
    public function store(ChTypeFluidRequest $request)
    {
        $ChTypeFluid = new ChTypeFluid;
        $ChTypeFluid->name = $request->name; 
        $ChTypeFluid->type = $request->type;
        $ChTypeFluid->save();

        return response()->json([
            'status' => true,
            'message' => 'tipo de fluido creado exitosamente',
            'data' => ['ch_type_fluid' => $ChTypeFluid->toArray()]
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
        $ChTypeFluid = ChTypeFluid::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'tipo de fluido obtenida exitosamente',
            'data' => ['ch_type_fluid' => $ChTypeFluid]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ChTypeFluidRequest $request, int $id): JsonResponse
    {
        $ChTypeFluid = ChTypeFluid::find($id);
        $ChTypeFluid->name = $request->name; 
        $ChTypeFluid->save();

        return response()->json([
            'status' => true,
            'message' => 'tipo de fluido actualizada exitosamente',
            'data' => ['ch_type_fluid' => $ChTypeFluid]
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
            $ChTypeFluid = ChTypeFluid::find($id);
            $ChTypeFluid->delete();

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
