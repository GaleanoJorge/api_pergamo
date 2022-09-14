<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwActivity;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChSwActivityController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwActivity = ChSwActivity::select();

        if($request->_sort){
            $ChSwActivity->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChSwActivity->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChSwActivity=$ChSwActivity->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChSwActivity=$ChSwActivity->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Actividad obtenida exitosamente',
            'data' => ['ch_sw_activity' => $ChSwActivity]
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
        
       
        $ChSwActivity = ChSwActivity::where('ch_record_id', $id)
        ->where('type_record_id',$type_record_id)
        ->where('ch_sw_activity.type_record_id', 1)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Actividad obtenida exitosamente',
            'data' => ['ch_sw_activity' => $ChSwActivity]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChSwActivity = new ChSwActivity;
        $ChSwActivity->name = $request->name; 
        $ChSwActivity->save();

        return response()->json([
            'status' => true,
            'message' => 'Actividad asociada al paciente exitosamente',
            'data' => ['ch_sw_activity' => $ChSwActivity->toArray()]
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
        $ChSwActivity = ChSwActivity::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Actividad obtenida exitosamente',
            'data' => ['ch_sw_activity' => $ChSwActivity]
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
        $ChSwActivity = ChSwActivity::find($id);  
        $ChSwActivity->name = $request->name; 
        $ChSwActivity->save();

        return response()->json([
            'status' => true,
            'message' => 'Actividad actualizada exitosamente',
            'data' => ['ch_sw_activity' => $ChSwActivity]
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
            $ChSwActivity = ChSwActivity::find($id);
            $ChSwActivity->delete();

            return response()->json([
                'status' => true,
                'message' => 'Actividad eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Actividad en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
