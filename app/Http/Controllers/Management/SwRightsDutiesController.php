<?php

namespace App\Http\Controllers\Management;

use App\Models\SwRightsDuties;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class SwRightsDutiesController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $SwRightsDuties = SwRightsDuties::select();

        if($request->_sort){
            $SwRightsDuties->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $SwRightsDuties->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $SwRightsDuties=$SwRightsDuties->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $SwRightsDuties=$SwRightsDuties->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Derechos y Deberes obtenidas exitosamente',
            'data' => ['sw_rights_duties' => $SwRightsDuties]
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
        
       
        $SwRightsDuties = SwRightsDuties::where('ch_record_id', $id)
        ->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Derechos y Deberes obtenidas exitosamente',
            'data' => ['sw_rights_duties' => $SwRightsDuties]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $SwRightsDuties = new SwRightsDuties;
        $SwRightsDuties->name = $request->name; 
        $SwRightsDuties->save();

        return response()->json([
            'status' => true,
            'message' => 'Derechos y Deberes asociadas al paciente exitosamente',
            'data' => ['sw_rights_duties' => $SwRightsDuties->toArray()]
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
        $SwRightsDuties = SwRightsDuties::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Derechos y Deberes obtenidas exitosamente',
            'data' => ['sw_rights_duties' => $SwRightsDuties]
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
        $SwRightsDuties = SwRightsDuties::find($id);  
        $SwRightsDuties->name = $request->name; 
        $SwRightsDuties->save();

        return response()->json([
            'status' => true,
            'message' => 'Derechos y Deberes actualizadas exitosamente',
            'data' => ['sw_rights_duties' => $SwRightsDuties]
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
            $SwRightsDuties = SwRightsDuties::find($id);
            $SwRightsDuties->delete();

            return response()->json([
                'status' => true,
                'message' => 'Derechos y Deberes eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Derechos y Deberes en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
