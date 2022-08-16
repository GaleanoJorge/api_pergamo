<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwCommunications;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChSwCommunicationsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwCommunications = ChSwCommunications::select();

        if($request->_sort){
            $ChSwCommunications->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChSwCommunications->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChSwCommunications=$ChSwCommunications->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChSwCommunications=$ChSwCommunications->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Comunicación obtenidas exitosamente',
            'data' => ['ch_sw_communications' => $ChSwCommunications]
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
       
        $ChSwCommunications = ChSwCommunications::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Comunicación obtenidas exitosamente',
            'data' => ['ch_sw_communications' => $ChSwCommunications]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChSwCommunications = new ChSwCommunications;
        $ChSwCommunications->name = $request->name; 
        $ChSwCommunications->save();

        return response()->json([
            'status' => true,
            'message' => 'Comunicación asociadas al paciente exitosamente',
            'data' => ['ch_sw_communications' => $ChSwCommunications->toArray()]
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
        $ChSwCommunications = ChSwCommunications::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Comunicación obtenidas exitosamente',
            'data' => ['ch_sw_communications' => $ChSwCommunications]
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
        $ChSwCommunications = ChSwCommunications::find($id);  
        $ChSwCommunications->name = $request->name; 
        $ChSwCommunications->save();

        return response()->json([
            'status' => true,
            'message' => 'Comunicación actualizadas exitosamente',
            'data' => ['ch_sw_communications' => $ChSwCommunications]
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
            $ChSwCommunications = ChSwCommunications::find($id);
            $ChSwCommunications->delete();

            return response()->json([
                'status' => true,
                'message' => 'Comunicación eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Comunicación en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
