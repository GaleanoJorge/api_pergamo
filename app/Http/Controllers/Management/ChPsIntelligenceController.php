<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsIntelligence;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsIntelligenceController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsIntelligence = ChPsIntelligence::select();

        if($request->_sort){
            $ChPsIntelligence->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsIntelligence->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsIntelligence=$ChPsIntelligence->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsIntelligence=$ChPsIntelligence->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Aspectos de prospección obtenidas exitosamente',
            'data' => ['ch_ps_intelligence' => $ChPsIntelligence]
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
        
       
        $ChPsIntelligence = ChPsIntelligence::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de prospección obtenidas exitosamente',
            'data' => ['ch_ps_intelligence' => $ChPsIntelligence]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsIntelligence = new ChPsIntelligence;
        $ChPsIntelligence->name = $request->name; 
        $ChPsIntelligence->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de prospección asociadas al paciente exitosamente',
            'data' => ['ch_ps_intelligence' => $ChPsIntelligence->toArray()]
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
        $ChPsIntelligence = ChPsIntelligence::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de prospección obtenidas exitosamente',
            'data' => ['ch_ps_intelligence' => $ChPsIntelligence]
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
        $ChPsIntelligence = ChPsIntelligence::find($id);  
        $ChPsIntelligence->name = $request->name; 
        $ChPsIntelligence->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de prospección actualizadas exitosamente',
            'data' => ['ch_ps_intelligence' => $ChPsIntelligence]
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
            $ChPsIntelligence = ChPsIntelligence::find($id);
            $ChPsIntelligence->delete();

            return response()->json([
                'status' => true,
                'message' => 'Aspectos de prospección eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Aspectos de prospección en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
