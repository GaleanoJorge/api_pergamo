<?php

namespace App\Http\Controllers\Management;

use App\Models\MultidoseConcentration;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MultidoseConcentrationRequest;
use Illuminate\Database\QueryException;

class MultidoseConcentrationController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $MultidoseConcentration = MultidoseConcentration::select();

        if($request->_sort){
            $MultidoseConcentration->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $MultidoseConcentration->where('value','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $MultidoseConcentration=$MultidoseConcentration->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $MultidoseConcentration=$MultidoseConcentration->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Multidosis tipo obtenidos exitosamente',
            'data' => ['multidose_concentration' => $MultidoseConcentration]
        ]);
    }
    

    public function store(MultidoseConcentrationRequest $request): JsonResponse
    {
        $MultidoseConcentration = new MultidoseConcentration;
        $MultidoseConcentration->value = $request->value;      
        $MultidoseConcentration->save();

        return response()->json([
            'status' => true,
            'message' => 'Multidosis tipo creado exitosamente',
            'data' => ['multidose_concentration' => $MultidoseConcentration->toArray()]
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
        $MultidoseConcentration = MultidoseConcentration::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Multidosis tipo obtenido exitosamente',
            'data' => ['multidose_concentration' => $MultidoseConcentration]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MultidoseConcentrationRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(MultidoseConcentrationRequest $request, int $id): JsonResponse
    {
        $MultidoseConcentration = MultidoseConcentration ::find($id);
        $MultidoseConcentration->value = $request->value;   
        $MultidoseConcentration->save();

        return response()->json([
            'status' => true,
            'message' => 'Multidosis tipo actualizado exitosamente',
            'data' => ['multidose_concentration' => $MultidoseConcentration]
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
            $MultidoseConcentration = MultidoseConcentration::find($id);
            $MultidoseConcentration->delete();

            return response()->json([
                'status' => true,
                'message' => 'Multidosis tipo eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Multidosis tipo esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
