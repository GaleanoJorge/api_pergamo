<?php

namespace App\Http\Controllers\Management;

use App\Models\TechnologicalMedium;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TechnologicalMediumController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $TechnologicalMedium = TechnologicalMedium::select();

        if($request->_sort){
            $TechnologicalMedium->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $TechnologicalMedium->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $TechnologicalMedium=$TechnologicalMedium->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $TechnologicalMedium=$TechnologicalMedium->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Días de dieta obtenidos exitosamente',
            'data' => ['technological_medium' => $TechnologicalMedium]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $TechnologicalMedium = new TechnologicalMedium;
        $TechnologicalMedium->name = $request->name;
        
        $TechnologicalMedium->save();

        return response()->json([
            'status' => true,
            'message' => 'Días de dieta creados exitosamente',
            'data' => ['technological_medium' => $TechnologicalMedium->toArray()]
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
        $TechnologicalMedium = TechnologicalMedium::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Días de dieta obtenidos exitosamente',
            'data' => ['technological_medium' => $TechnologicalMedium]
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
        $TechnologicalMedium = TechnologicalMedium::find($id);
        $TechnologicalMedium->name = $request->name;
        
        $TechnologicalMedium->save();

        return response()->json([
            'status' => true,
            'message' => 'Días de dieta actualizados exitosamente',
            'data' => ['technological_medium' => $TechnologicalMedium]
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
            $TechnologicalMedium = TechnologicalMedium::find($id);
            $TechnologicalMedium->delete();

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
