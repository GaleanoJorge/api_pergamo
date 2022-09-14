<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwHousingType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChSwHousingTypeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwHousingType = ChSwHousingType::select();

        if($request->_sort){
            $ChSwHousingType->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChSwHousingType->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChSwHousingType=$ChSwHousingType->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChSwHousingType=$ChSwHousingType->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Tipo de vivienda obtenida exitosamente',
            'data' => ['ch_sw_housing_type' => $ChSwHousingType]
        ]);
    }
  /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id,int $type_record_id): JsonResponse
    {
        
       
        $ChSwHousingType = ChSwHousingType::where('ch_record_id', $id)
        ->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Tipo de vivienda obtenida exitosamente',
            'data' => ['ch_sw_housing_type' => $ChSwHousingType]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChSwHousingType = new ChSwHousingType;
        $ChSwHousingType->name = $request->name; 
        $ChSwHousingType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de vivienda asociada al paciente exitosamente',
            'data' => ['ch_sw_housing_type' => $ChSwHousingType->toArray()]
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
        $ChSwHousingType = ChSwHousingType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de vivienda obtenida exitosamente',
            'data' => ['ch_sw_housing_type' => $ChSwHousingType]
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
        $ChSwHousingType = ChSwHousingType::find($id);  
        $ChSwHousingType->name = $request->name; 
        $ChSwHousingType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de vivienda actualizada exitosamente',
            'data' => ['ch_sw_housing_type' => $ChSwHousingType]
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
            $ChSwHousingType = ChSwHousingType::find($id);
            $ChSwHousingType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de vivienda eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de vivienda en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
