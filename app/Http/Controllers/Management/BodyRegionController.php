<?php

namespace App\Http\Controllers\Management;

use App\Models\BodyRegion;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BodyRegionRequest;
use Illuminate\Database\QueryException;

class BodyRegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $BodyRegion = BodyRegion::select('body_region.*');

        if($request->_sort){
            $BodyRegion->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $BodyRegion->where('name','like','%' . $request->search. '%');
        }
   
        if($request->query("pagination", true)=="false"){
            $BodyRegion=$BodyRegion->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $BodyRegion=$BodyRegion->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Regiones corporales asociadas exitosamente',
            'data' => ['body_region' => $BodyRegion]
        ]);
    }

    
    public function store(BodyRegionRequest $request)
    {
        $BodyRegion = new BodyRegion;
        $BodyRegion->name = $request->name; 
        $BodyRegion->save();

        return response()->json([
            'status' => true,
            'message' => 'Regiones corporales creadas exitosamente',
            'data' => ['body_region' => $BodyRegion->toArray()]
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
        $BodyRegion = BodyRegion::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Regiones corporales obtenidas exitosamente',
            'data' => ['body_region' => $BodyRegion]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(BodyRegionRequest $request, int $id): JsonResponse
    {
        $BodyRegion = BodyRegion::find($id);
        $BodyRegion->name = $request->name; 
        $BodyRegion->save();

        return response()->json([
            'status' => true,
            'message' => 'Regiones corporales actualizadas exitosamente',
            'data' => ['body_region' => $BodyRegion]
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
            $BodyRegion = BodyRegion::find($id);
            $BodyRegion->delete();

            return response()->json([
                'status' => true,
                'message' => 'Regiones corporales eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Regiones corporales estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
