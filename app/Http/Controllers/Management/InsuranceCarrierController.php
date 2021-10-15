<?php

namespace App\Http\Controllers\Management;

use App\Models\InsuranceCarrier;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\InsuranceCarrierRequest;
use Illuminate\Database\QueryException;

class InsuranceCarrierController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $InsuranceCarrier = InsuranceCarrier::select();

        if($request->_sort){
            $InsuranceCarrier->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $InsuranceCarrier->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $InsuranceCarrier=$InsuranceCarrier->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $InsuranceCarrier=$InsuranceCarrier->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Aseguradora obtenidas exitosamente',
            'data' => ['insurance_carrier' => $InsuranceCarrier]
        ]);
    }

    public function store(InsuranceCarrierRequest $request): JsonResponse
    {
        $InsuranceCarrier = new InsuranceCarrier;
        $InsuranceCarrier->name = $request->name;
        
        $InsuranceCarrier->save();

        return response()->json([
            'status' => true,
            'message' => 'Aseguradora creada exitosamente',
            'data' => ['insurance_carrier' => $InsuranceCarrier->toArray()]
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
        $InsuranceCarrier = InsuranceCarrier::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Aseguradora obtenida exitosamente',
            'data' => ['insurance_carrier' => $InsuranceCarrier]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(InsuranceCarrierRequest $request, int $id): JsonResponse
    {
        $InsuranceCarrier = InsuranceCarrier::find($id);
        $InsuranceCarrier->name = $request->name;
        
        $InsuranceCarrier->save();

        return response()->json([
            'status' => true,
            'message' => 'Aseguradora actualizada exitosamente',
            'data' => ['insurance_carrier' => $InsuranceCarrier]
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
            $InsuranceCarrier = InsuranceCarrier::find($id);
            $InsuranceCarrier->delete();

            return response()->json([
                'status' => true,
                'message' => 'Aseguradora eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Aseguradora esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
