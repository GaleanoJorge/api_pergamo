<?php

namespace App\Http\Controllers\Management;

use App\Models\PriceType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PriceTypeRequest;
use Illuminate\Database\QueryException;

class PriceTypeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $PriceType = PriceType::select();

        if($request->_sort){
            $PriceType->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $PriceType->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $PriceType=$PriceType->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $PriceType=$PriceType->paginate($per_page,'*','page',$page); 
        } 

        return response()->json([
            'status' => true,
            'message' => 'Tipo de precio que uilizan las tarifas en salud exitosamente',
            'data' => ['price_type' => $PriceType]
        ]);
    }
    

    public function store(PriceTypeRequest $request): JsonResponse
    {
        $PriceType = new PriceType;
        $PriceType->name = $request->name;
        $PriceType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de precio que uilizan las tarifas en salud creada exitosamente',
            'data' => ['price_type' => $PriceType->toArray()]
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
        $PriceType = PriceType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de precio que uilizan las tarifas en salud obtenidos exitosamente',
            'data' => ['price_type' => $PriceType]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(PriceTypeRequest $request, int $id): JsonResponse
    {
        $PriceType = PriceType::find($id);
        $PriceType->name = $request->name;
        $PriceType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de precio que uilizan las tarifas en salud actualizado exitosamente',
            'data' => ['price_type' => $PriceType]
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
            $PriceType = PriceType::find($id);
            $PriceType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de precio que uilizan las tarifas en salud eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de precio que uilizan las tarifas en salud esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
