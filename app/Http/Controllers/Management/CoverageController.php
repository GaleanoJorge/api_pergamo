<?php

namespace App\Http\Controllers\Management;

use App\Models\Coverage;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CoverageRequest;
use Illuminate\Database\QueryException;

class CoverageController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Coverage = Coverage::select();

        if($request->_sort){
            $Coverage->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Coverage->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Coverage=$Coverage->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Coverage=$Coverage->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Cobertura obtenidos exitosamente',
            'data' => ['coverage' => $Coverage]
        ]);
    }

    public function store(CoverageRequest $request): JsonResponse
    {
        $Coverage = new Coverage;
        $Coverage->name = $request->name;
        $Coverage->modality_id = $request->modality_id;
        
        $Coverage->save();

        return response()->json([
            'status' => true,
            'message' => 'Cobertura creada exitosamente',
            'data' => ['coverage' => $Coverage->toArray()]
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
        $Coverage = Coverage::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Cobertura obtenido exitosamente',
            'data' => ['coverage' => $Coverage]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CoverageRequest $request, int $id): JsonResponse
    {
        $Coverage = Coverage::find($id);
        $Coverage->name = $request->name;
        $Coverage->modality_id = $request->modality_id;
        
        $Coverage->save();

        return response()->json([
            'status' => true,
            'message' => 'Cobertura actualizado exitosamente',
            'data' => ['coverage' => $Coverage]
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
            $Coverage = Coverage::find($id);
            $Coverage->delete();

            return response()->json([
                'status' => true,
                'message' => 'Cobertura eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Cobertura esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
