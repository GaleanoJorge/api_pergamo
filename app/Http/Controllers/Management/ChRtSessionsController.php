<?php

namespace App\Http\Controllers\Management;

use App\Models\ChRtSessions;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;
use App\Models\ChRecord;

class ChRtSessionsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChRtSessions = ChRtSessions::select();

        if($request->_sort){
            $ChRtSessions->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChRtSessions->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChRtSessions=$ChRtSessions->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChRtSessions=$ChRtSessions->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Sesiones obtenidos exitosamente',
            'data' => ['ch_rt_sessions' => $ChRtSessions]
        ]);
    }
    
      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(Request $request, int $id, int $type_record_id): JsonResponse
    {


        $ChRtSessions = ChRtSessions::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $ChRtSessions = ChRtSessions::select('ch_rt_sessions.*')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->leftJoin('ch_record', 'ch_record.id', 'ch_rt_sessions.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_rt_sessions' => $ChRtSessions]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChRtSessions = new ChRtSessions; 
        $ChRtSessions->month = $request->month; 
        $ChRtSessions->week = $request->week; 
        $ChRtSessions->recommendations = $request->recommendations; 
        $ChRtSessions->type_record_id = $request->type_record_id; 
        $ChRtSessions->ch_record_id = $request->ch_record_id; 
        $ChRtSessions->save();

        return response()->json([
            'status' => true,
            'message' => 'Sesiones asociadas al paciente exitosamente',
            'data' => ['ch_rt_sessions' => $ChRtSessions->toArray()]
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
        $ChRtSessions = ChRtSessions::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Sesiones obtenidas exitosamente',
            'data' => ['ch_rt_sessions' => $ChRtSessions]
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
        $ChRtSessions = ChRtSessions::find($id);  
        $ChRtSessions->month = $request->month; 
        $ChRtSessions->week = $request->week; 
        $ChRtSessions->recommendations = $request->recommendations;         
        $ChRtSessions->type_record_id = $request->type_record_id; 
        $ChRtSessions->ch_record_id = $request->ch_record_id; 
          
        
        
        $ChRtSessions->save();

        return response()->json([
            'status' => true,
            'message' => 'Sesiones actualizadas exitosamente',
            'data' => ['ch_rt_sessions' => $ChRtSessions]
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
            $ChRtSessions = ChRtSessions::find($id);
            $ChRtSessions->delete();

            return response()->json([
                'status' => true,
                'message' => 'Sesiones eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Sesiones en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
