<?php

namespace App\Http\Controllers\Management;

use App\Models\ParametersSigns;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ParametersSignsRequest;
use Illuminate\Database\QueryException;

class ParametersSignsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ParametersSigns = ParametersSigns::select();

        if($request->_sort){
            $ParametersSigns->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ParametersSigns->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ParametersSigns=$ParametersSigns->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ParametersSigns=$ParametersSigns->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Parametros asociados exitosamente',
            'data' => ['parameters_signs' => $ParametersSigns]
        ]);
    }
    

    public function store(ParametersSignsRequest $request): JsonResponse
    {
        $ParametersSigns = new ParametersSigns;
        $ParametersSigns->name = $request->name; 
        $ParametersSigns->save();

        return response()->json([
            'status' => true,
            'message' => 'Parametros creada exitosamente',
            'data' => ['parameters_signs' => $ParametersSigns->toArray()]
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
        $ParametersSigns = ParametersSigns::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Parametros obtenido exitosamente',
            'data' => ['parameters_signs' => $ParametersSigns]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ParametersSignsRequest $request, int $id): JsonResponse
    {
        $ParametersSigns = ParametersSigns::find($id);
        $ParametersSigns->name = $request->name; 
        $ParametersSigns->save();

        return response()->json([
            'status' => true,
            'message' => 'Parametros actualizado exitosamente',
            'data' => ['parameters_signs' => $ParametersSigns]
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
            $ParametersSigns = ParametersSigns::find($id);
            $ParametersSigns->delete();

            return response()->json([
                'status' => true,
                'message' => 'Parametros eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Parametros esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
