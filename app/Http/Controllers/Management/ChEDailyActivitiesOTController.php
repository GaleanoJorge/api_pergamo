<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEDailyActivitiesOT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChEDailyActivitiesOTController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEDailyActivitiesOT = ChEDailyActivitiesOT::select();

        if($request->ch_record_id){
            $ChEDailyActivitiesOT->where('ch_record_id', $request->ch_record_id)->where('type_record_id',1);
        }  
        
        if($request->_sort){
            $ChEDailyActivitiesOT->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChEDailyActivitiesOT->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChEDailyActivitiesOT=$ChEDailyActivitiesOT->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChEDailyActivitiesOT=$ChEDailyActivitiesOT->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_daily_activities_o_t' => $ChEDailyActivitiesOT]
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
        
       
        $ChEDailyActivitiesOT = ChEDailyActivitiesOT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_daily_activities_o_t' => $ChEDailyActivitiesOT]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        // $validate=ChEDailyActivitiesOT::where('ch_record_id', $request->ch_record_id)->where('type_record_id', $request->type_record_id);
       
        // if(!$validate){
        $ChEDailyActivitiesOT = new ChEDailyActivitiesOT; 
        $ChEDailyActivitiesOT->cook = $request-> cook; 
        $ChEDailyActivitiesOT->kids = $request-> kids;
        $ChEDailyActivitiesOT->wash = $request-> wash;
        $ChEDailyActivitiesOT->game = $request-> game;
        $ChEDailyActivitiesOT->ironing = $request-> ironing;
        $ChEDailyActivitiesOT->walk = $request-> walk;
        $ChEDailyActivitiesOT->clean = $request-> clean;
        $ChEDailyActivitiesOT->sport = $request-> sport;
        $ChEDailyActivitiesOT->decorate = $request-> decorate;
        $ChEDailyActivitiesOT->social = $request-> social;
        $ChEDailyActivitiesOT->act_floristry = $request-> act_floristry;
        $ChEDailyActivitiesOT->friends = $request-> friends;
        $ChEDailyActivitiesOT->read = $request-> read;
        $ChEDailyActivitiesOT->politic = $request-> politic;
        $ChEDailyActivitiesOT->view_tv = $request-> view_tv;
        $ChEDailyActivitiesOT->religion = $request-> religion;
        $ChEDailyActivitiesOT->write = $request-> write;
        $ChEDailyActivitiesOT->look = $request-> look;
        $ChEDailyActivitiesOT->arrange = $request-> arrange;
        $ChEDailyActivitiesOT->travel = $request-> travel;
        $ChEDailyActivitiesOT->observation_activity = $request-> observation_activity;
        $ChEDailyActivitiesOT->test = $request-> test;
        $ChEDailyActivitiesOT->observation_test = $request-> observation_test;

        $ChEDailyActivitiesOT->type_record_id = $request->type_record_id; 
        $ChEDailyActivitiesOT->ch_record_id = $request->ch_record_id; 
        $ChEDailyActivitiesOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_daily_activities_o_t' => $ChEDailyActivitiesOT->toArray()]
        ]);
    // }else{
    //     return response()->json([
    //         'status' => false,
    //         'message' => 'Ya tiene observación'
    //     ], 423);
    // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChEDailyActivitiesOT = ChEDailyActivitiesOT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_daily_activities_o_t' => $ChEDailyActivitiesOT]
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
        $ChEDailyActivitiesOT = ChEDailyActivitiesOT::find($id);  
        $ChEDailyActivitiesOT->cook = $request-> cook; 
        $ChEDailyActivitiesOT->kids = $request-> kids;
        $ChEDailyActivitiesOT->wash = $request-> wash;
        $ChEDailyActivitiesOT->game = $request-> game;
        $ChEDailyActivitiesOT->ironing = $request-> ironing;
        $ChEDailyActivitiesOT->walk = $request-> walk;
        $ChEDailyActivitiesOT->clean = $request-> clean;
        $ChEDailyActivitiesOT->sport = $request-> sport;
        $ChEDailyActivitiesOT->decorate = $request-> decorate;
        $ChEDailyActivitiesOT->social = $request-> social;
        $ChEDailyActivitiesOT->act_floristry = $request-> act_floristry;
        $ChEDailyActivitiesOT->friends = $request-> friends;
        $ChEDailyActivitiesOT->read = $request-> read;
        $ChEDailyActivitiesOT->politic = $request-> politic;
        $ChEDailyActivitiesOT->view_tv = $request-> view_tv;
        $ChEDailyActivitiesOT->religion = $request-> religion;
        $ChEDailyActivitiesOT->write = $request-> write;
        $ChEDailyActivitiesOT->look = $request-> look;
        $ChEDailyActivitiesOT->arrange = $request-> arrange;
        $ChEDailyActivitiesOT->travel = $request-> travel;
        $ChEDailyActivitiesOT->observation_activity = $request-> observation_activity;
        $ChEDailyActivitiesOT->test = $request-> test;
        $ChEDailyActivitiesOT->observation_test = $request-> observation_test;

        $ChEDailyActivitiesOT->type_record_id = $request->type_record_id; 
        $ChEDailyActivitiesOT->ch_record_id = $request->ch_record_id; 
        $ChEDailyActivitiesOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_daily_activities_o_t' => $ChEDailyActivitiesOT]
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
            $ChEDailyActivitiesOT = ChEDailyActivitiesOT::find($id);
            $ChEDailyActivitiesOT->delete();

            return response()->json([
                'status' => true,
                'message' => 'valoracion eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'valoracion en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
