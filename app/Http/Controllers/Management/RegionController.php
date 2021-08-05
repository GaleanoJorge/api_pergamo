<?php

namespace App\Http\Controllers\Management;

use App\Models\Region;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegionRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $regions = Region::with('country');

        if($request->_sort){
            $regions->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $regions->where('name','like','%' . $request->search. '%');
            $regions->orWhere('code','like','%' . $request->search. '%');
        }
        
        if ($request->country_id) {
            $regions->where('country_id', $request->country_id);
        }
        if($request->query("pagination", true)=="false"){
            $regions=$regions->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $regions=$regions->paginate($per_page,'*','page',$page); 
        }

        return response()->json([
            'status' => true,
            'message' => 'Departamentos obtenidos exitosamente',
            'data' => ['regions' => $regions]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RegionRequest $request
     * @return JsonResponse
     */
    public function store(RegionRequest $request): JsonResponse
    {
        $Region = new Region;
        $Region->country_id = $request->country_id;
        $Region->code = $request->code;
        $Region->name = $request->name;
        $Region->save();

        return response()->json([
            'status' => true,
            'message' => 'Departamento creado exitosamente',
            'data' => ['region' => $Region->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $Region = Region::where('id', $id)->with('country')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Departamento obtenido exitosamente',
            'data' => ['region' => $Region]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RegionRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(RegionRequest $request, int $id): JsonResponse
    {
        $Region = Region::find($id);
        $Region->country_id = $request->country_id;
        $Region->code = $request->code;
        $Region->name = $request->name;
        $Region->save();

        return response()->json([
            'status' => true,
            'message' => 'Departamento actualizado exitosamente',
            'data' => ['region' => $Region]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $Region = Region::find($id);
            $Region->delete();

            return response()->json([
                'status' => true,
                'message' => 'Departamento eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El Departamento está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
