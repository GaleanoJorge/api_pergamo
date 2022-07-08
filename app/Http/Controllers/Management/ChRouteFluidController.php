<?php

namespace App\Http\Controllers\Management;

use App\Models\ChRouteFluid;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChRouteFluidRequest;
use Illuminate\Database\QueryException;

class ChRouteFluidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $ChRouteFluid = ChRouteFluid::select();

        if(isset($request->type)){
            $ChRouteFluid->orderBy('name', 'desc')->where('type',$request->type);
        }



        if($request->_sort){
            $ChRouteFluid->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChRouteFluid->where('name','like','%' . $request->search. '%');
        }
   
        if($request->query("pagination", true)=="false"){
            $ChRouteFluid=$ChRouteFluid->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChRouteFluid=$ChRouteFluid->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Rutas de fluidos obtenidas satisfactoriamente',
            'data' => ['ch_route_fluid' => $ChRouteFluid]
        ]);
    }

    
    public function store(ChRouteFluidRequest $request)
    {
        $ChRouteFluid = new ChRouteFluid;
        $ChRouteFluid->name = $request->name; 
        $ChRouteFluid->type = $request->type;
        $ChRouteFluid->save();

        return response()->json([
            'status' => true,
            'message' => 'Ruta de fluido creada exitosamente',
            'data' => ['ch_route_fluid' => $ChRouteFluid->toArray()]
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
        $ChRouteFluid = ChRouteFluid::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Ruta de fluido obtenida exitosamente',
            'data' => ['ch_route_fluid' => $ChRouteFluid]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ChRouteFluidRequest $request, int $id): JsonResponse
    {
        $ChRouteFluid = ChRouteFluid::find($id);
        $ChRouteFluid->name = $request->name; 
        $ChRouteFluid->save();

        return response()->json([
            'status' => true,
            'message' => 'Ruta de fluido actualizada exitosamente',
            'data' => ['ch_route_fluid' => $ChRouteFluid]
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
            $ChRouteFluid = ChRouteFluid::find($id);
            $ChRouteFluid->delete();

            return response()->json([
                'status' => true,
                'message' => 'Posiciones de paciente eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Posiciones de paciente estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
