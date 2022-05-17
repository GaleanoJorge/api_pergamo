<?php

namespace App\Http\Controllers\Management;

use App\Models\TaxValueUnit;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TaxValueUnitRequest;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class TaxValueUnitController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $TaxValueUnit = TaxValueUnit::select();

        if($request->_sort){
            $TaxValueUnit->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $TaxValueUnit->where('year','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $TaxValueUnit=$TaxValueUnit->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $TaxValueUnit=$TaxValueUnit->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Unidades de valor tributario obtenidos exitosamente',
            'data' => ['tax_value_unit' => $TaxValueUnit]
        ]);
    }

    public function getLatestTaxValueUnit(Request $request, int $id): JsonResponse
    {
        $year = Carbon::now()->year;
        $TaxValueUnit = TaxValueUnit::select()->where('year', $year)->first();

        return response()->json([
            'status' => true,
            'message' => 'Unidades de valor tributario obtenidos exitosamente',
            'data' => ['tax_value_unit' => $TaxValueUnit]
        ]);
    }

    public function store(TaxValueUnitRequest $request): JsonResponse
    {
        $TaxValueUnit = new TaxValueUnit;
        $TaxValueUnit->value = $request->value;
        $TaxValueUnit->year = $request->year;
        
        $TaxValueUnit->save();

        return response()->json([
            'status' => true,
            'message' => 'Unidades de valor tributario creados exitosamente',
            'data' => ['tax_value_unit' => $TaxValueUnit->toArray()]
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
        $TaxValueUnit = TaxValueUnit::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Unidades de valor tributario obtenidos exitosamente',
            'data' => ['tax_value_unit' => $TaxValueUnit]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(TaxValueUnitRequest $request, int $id): JsonResponse
    {
        $TaxValueUnit = TaxValueUnit::find($id);
        $TaxValueUnit->value = $request->value;
        $TaxValueUnit->year = $request->year;
        
        $TaxValueUnit->save();

        return response()->json([
            'status' => true,
            'message' => 'Unidades de valor tributario actualizados exitosamente',
            'data' => ['tax_value_unit' => $TaxValueUnit]
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
            $TaxValueUnit = TaxValueUnit::find($id);
            $TaxValueUnit->delete();

            return response()->json([
                'status' => true,
                'message' => 'Unidades de valor tributario eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Unidades de valor tributario estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
