<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwHousing;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChSwHousingController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwHousing = ChSwHousing::select();

        if($request->_sort){
            $ChSwHousing->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChSwHousing->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChSwHousing=$ChSwHousing->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChSwHousing=$ChSwHousing->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Vievienda obtenida exitosamente',
            'data' => ['ch_sw_housing' => $ChSwHousing]
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
        
       
        $ChSwHousing = ChSwHousing::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Vivienda obtenida exitosamente',
            'data' => ['ch_sw_housing' => $ChSwHousing]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChSwHousing = new ChSwHousing;
        $ChSwHousing->name = $request->name; 
        $ChSwHousing->save();

        return response()->json([
            'status' => true,
            'message' => 'Vivienda asociada al paciente exitosamente',
            'data' => ['ch_sw_housing' => $ChSwHousing->toArray()]
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
        $ChSwHousing = ChSwHousing::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Vivienda obtenida exitosamente',
            'data' => ['ch_sw_housing' => $ChSwHousing]
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
        $ChSwHousing = ChSwHousing::find($id);  
        $ChSwHousing->name = $request->name; 
        $ChSwHousing->save();

        return response()->json([
            'status' => true,
            'message' => 'Vivienda actualizada exitosamente',
            'data' => ['ch_sw_housing' => $ChSwHousing]
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
            $ChSwHousing = ChSwHousing::find($id);
            $ChSwHousing->delete();

            return response()->json([
                'status' => true,
                'message' => 'Vivienda eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Vivienda en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
