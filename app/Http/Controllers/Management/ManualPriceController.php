<?php

namespace App\Http\Controllers\Management;

use App\Models\ManualPrice;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ManualPriceRequest;
use Illuminate\Database\QueryException;

class ManualPriceController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ManualPrice = ManualPrice::select();

        if($request->_sort){
            $ManualPrice->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ManualPrice->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ManualPrice=$ManualPrice->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ManualPrice=$ManualPrice->paginate($per_page,'*','page',$page); 
        } 

        return response()->json([
            'status' => true,
            'message' => 'Asociación de los manuales con los procedimientos y las tarifas exitosamente',
            'data' => ['manual_price' => $ManualPrice]
        ]);
    }
    

    public function store(ManualPriceRequest $request): JsonResponse
    {
        $ManualPrice = new ManualPrice;
        $ManualPrice->manual_id = $request->manual_id;
        $ManualPrice->procedure_id = $request->procedure_id;
        $ManualPrice->value = $request->value;
        $ManualPrice->price_type_id = $request->price_type_id;
        $ManualPrice->save();

        return response()->json([
            'status' => true,
            'message' => 'Asociación de los manuales con los procedimientos y las tarifas creada exitosamente',
            'data' => ['manual_price' => $ManualPrice->toArray()]
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
        $ManualPrice = ManualPrice::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Asociación de los manuales con los procedimientos y las tarifas obtenidos exitosamente',
            'data' => ['manual_price' => $ManualPrice]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ManualPriceRequest $request, int $id): JsonResponse
    {
        $ManualPrice = ManualPrice::find($id);
        $ManualPrice->manual_id = $request->manual_id;
        $ManualPrice->procedure_id = $request->procedure_id;
        $ManualPrice->value = $request->value;
        $ManualPrice->price_type_id = $request->price_type_id;
        $ManualPrice->save();

        return response()->json([
            'status' => true,
            'message' => 'Asociación de los manuales con los procedimientos y las tarifas actualizado exitosamente',
            'data' => ['manual_price' => $ManualPrice]
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
            $ManualPrice = ManualPrice::find($id);
            $ManualPrice->delete();

            return response()->json([
                'status' => true,
                'message' => 'Asociación de los manuales con los procedimientos y las tarifas eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Asociación de los manuales con los procedimientos y las tarifas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
