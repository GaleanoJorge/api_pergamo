<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwActivities;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChSwActivitiesController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwActivities = ChSwActivities::select();

        if($request->_sort){
            $ChSwActivities->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChSwActivities->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChSwActivities=$ChSwActivities->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChSwActivities=$ChSwActivities->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Actividades obtenidas exitosamente',
            'data' => ['ch_sw_activities' => $ChSwActivities]
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
        
       
        $ChSwActivities = ChSwActivities::where('ch_record_id', $id)
        ->where('type_record_id',$type_record_id)
        ->where('ch_sw_activities.type_record_id', 1)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Actividades obtenidas exitosamente',
            'data' => ['ch_sw_activities' => $ChSwActivities]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChSwActivities = new ChSwActivities;
        $ChSwActivities->name = $request->name; 
        $ChSwActivities->save();

        return response()->json([
            'status' => true,
            'message' => 'Actividades asociadas al paciente exitosamente',
            'data' => ['ch_sw_activities' => $ChSwActivities->toArray()]
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
        $ChSwActivities = ChSwActivities::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Actividades obtenidas exitosamente',
            'data' => ['ch_sw_activities' => $ChSwActivities]
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
        $ChSwActivities = ChSwActivities::find($id);  
        $ChSwActivities->name = $request->name; 
        $ChSwActivities->save();

        return response()->json([
            'status' => true,
            'message' => 'Actividades actualizadas exitosamente',
            'data' => ['ch_sw_activities' => $ChSwActivities]
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
            $ChSwActivities = ChSwActivities::find($id);
            $ChSwActivities->delete();

            return response()->json([
                'status' => true,
                'message' => 'Actividades eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Actividades en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
