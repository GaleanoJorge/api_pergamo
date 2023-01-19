<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsEpisodes;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsEpisodesController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsEpisodes = ChPsEpisodes::select('ch_ps_episodes.*');

        if($request->_sort){
            $ChPsEpisodes->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsEpisodes->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsEpisodes=$ChPsEpisodes->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsEpisodes=$ChPsEpisodes->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Episodios obtenidas exitosamente',
            'data' => ['ch_ps_episodes' => $ChPsEpisodes]
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
        
       
        $ChPsEpisodes = ChPsEpisodes::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Episodios obtenidas exitosamente',
            'data' => ['ch_ps_episodes' => $ChPsEpisodes]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsEpisodes = new ChPsEpisodes;
        $ChPsEpisodes->name = $request->name; 
        $ChPsEpisodes->save();

        return response()->json([
            'status' => true,
            'message' => 'Episodios asociadas al paciente exitosamente',
            'data' => ['ch_ps_episodes' => $ChPsEpisodes->toArray()]
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
        $ChPsEpisodes = ChPsEpisodes::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Episodios obtenidas exitosamente',
            'data' => ['ch_ps_episodes' => $ChPsEpisodes]
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
        $ChPsEpisodes = ChPsEpisodes::find($id);  
        $ChPsEpisodes->name = $request->name; 
        $ChPsEpisodes->save();

        return response()->json([
            'status' => true,
            'message' => 'Episodios actualizadas exitosamente',
            'data' => ['ch_ps_episodes' => $ChPsEpisodes]
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
            $ChPsEpisodes = ChPsEpisodes::find($id);
            $ChPsEpisodes->delete();

            return response()->json([
                'status' => true,
                'message' => 'Episodios eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Episodios en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
