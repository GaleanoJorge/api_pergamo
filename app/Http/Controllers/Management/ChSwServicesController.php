<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwServices;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChSwServicesController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwServices = ChSwServices::select();

        if($request->_sort){
            $ChSwServices->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChSwServices->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChSwServices=$ChSwServices->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChSwServices=$ChSwServices->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Servicios de vivienda obtenidas exitosamente',
            'data' => ['ch_sw_services' => $ChSwServices]
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
        
       
        $ChSwServices = ChSwServices::where('ch_record_id', $id)
        ->where('type_record_id',$type_record_id)
        ->where('ch_sw_services.type_record_id', 1)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Servicios de vivienda obtenidas exitosamente',
            'data' => ['ch_sw_services' => $ChSwServices]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChSwServices = new ChSwServices;
        $ChSwServices->name = $request->name; 
        $ChSwServices->save();

        return response()->json([
            'status' => true,
            'message' => 'Servicios de vivienda asociadas al paciente exitosamente',
            'data' => ['ch_sw_services' => $ChSwServices->toArray()]
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
        $ChSwServices = ChSwServices::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Servicios de vivienda obtenidas exitosamente',
            'data' => ['ch_sw_services' => $ChSwServices]
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
        $ChSwServices = ChSwServices::find($id);  
        $ChSwServices->name = $request->name; 
        $ChSwServices->save();

        return response()->json([
            'status' => true,
            'message' => 'Servicios de vivienda actualizadas exitosamente',
            'data' => ['ch_sw_services' => $ChSwServices]
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
            $ChSwServices = ChSwServices::find($id);
            $ChSwServices->delete();

            return response()->json([
                'status' => true,
                'message' => 'Servicios de vivienda eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Servicios de vivienda en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
