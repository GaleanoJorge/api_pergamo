<?php

namespace App\Http\Controllers\Management;

use App\Models\MeasurementUnits;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MeasurementUnitsRequest;
use Illuminate\Database\QueryException;

class MeasurementUnitsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $MeasurementUnits = MeasurementUnits::select();

        if($request->_sort){
            $MeasurementUnits->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $MeasurementUnits->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $MeasurementUnits=$MeasurementUnits->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $MeasurementUnits=$MeasurementUnits->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Contiene las unidades de medida obtenidos exitosamente',
            'data' => ['measurement_units' => $MeasurementUnits]
        ]);
    }
    

    public function store(MeasurementUnitsRequest $request): JsonResponse
    {
        $MeasurementUnits = new MeasurementUnits;
        $MeasurementUnits->code = $request->code; 
        $MeasurementUnits->name = $request->name;      
        $MeasurementUnits->save();

        return response()->json([
            'status' => true,
            'message' => 'Contiene las unidades de medida creado exitosamente',
            'data' => ['measurement_units' => $MeasurementUnits->toArray()]
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
        $MeasurementUnits = MeasurementUnits::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Contiene las unidades de medida obtenido exitosamente',
            'data' => ['measurement_units' => $MeasurementUnits]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MeasurementUnitsRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(MeasurementUnitsRequest $request, int $id): JsonResponse
    {
        $MeasurementUnits = MeasurementUnits ::find($id);
        $MeasurementUnits->code = $request->code;
        $MeasurementUnits->name = $request->name;   
        $MeasurementUnits->save();

        return response()->json([
            'status' => true,
            'message' => 'Contiene las unidades de medida actualizado exitosamente',
            'data' => ['measurement_units' => $MeasurementUnits]
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
            $MeasurementUnits = MeasurementUnits::find($id);
            $MeasurementUnits->delete();

            return response()->json([
                'status' => true,
                'message' => 'Contiene las unidades de medida eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Contiene las unidades de medida esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
