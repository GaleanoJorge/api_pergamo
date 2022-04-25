<?php

namespace App\Http\Controllers\Management;

use App\Models\HourlyFrequency;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HourlyFrequencyRequest;
use Illuminate\Database\QueryException;

class HourlyFrequencyController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $HourlyFrequency = HourlyFrequency::select();

        if($request->_sort){
            $HourlyFrequency->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $HourlyFrequency->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $HourlyFrequency=$HourlyFrequency->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $HourlyFrequency=$HourlyFrequency->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Frecuencia Horaria del Medicamento del medicamento obtenidos exitosamente',
            'data' => ['hourly_frequency' => $HourlyFrequency]
        ]);
    }
    

    public function store(HourlyFrequencyRequest $request): JsonResponse
    {
        $HourlyFrequency = new HourlyFrequency;
        $HourlyFrequency->name = $request->name;      
        $HourlyFrequency->save();

        return response()->json([
            'status' => true,
            'message' => 'Frecuencia Horaria del medicamento creado exitosamente',
            'data' => ['hourly_frequency' => $HourlyFrequency->toArray()]
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
        $HourlyFrequency = HourlyFrequency::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Frecuencia Horaria del medicamento obtenido exitosamente',
            'data' => ['hourly_frequency' => $HourlyFrequency]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  HourlyFrequencyRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(HourlyFrequencyRequest $request, int $id): JsonResponse
    {
        $HourlyFrequency = HourlyFrequency ::find($id);
        $HourlyFrequency->name = $request->name;   
        $HourlyFrequency->save();

        return response()->json([
            'status' => true,
            'message' => 'Frecuencia Horaria del medicamento actualizado exitosamente',
            'data' => ['hourly_frequency' => $HourlyFrequency]
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
            $HourlyFrequency = HourlyFrequency::find($id);
            $HourlyFrequency->delete();

            return response()->json([
                'status' => true,
                'message' => 'Frecuencia Horaria del medicamento eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Frecuencia Horaria del medicamento esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
