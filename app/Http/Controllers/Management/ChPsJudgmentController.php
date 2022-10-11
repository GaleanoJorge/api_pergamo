<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsJudgment;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsJudgmentController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsJudgment = ChPsJudgment::select();

        if($request->_sort){
            $ChPsJudgment->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsJudgment->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsJudgment=$ChPsJudgment->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsJudgment=$ChPsJudgment->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Aspectos de juicio y raciocinio obtenidas exitosamente',
            'data' => ['ch_ps_judgment' => $ChPsJudgment]
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
        
       
        $ChPsJudgment = ChPsJudgment::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de juicio y raciocinio obtenidas exitosamente',
            'data' => ['ch_ps_judgment' => $ChPsJudgment]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsJudgment = new ChPsJudgment;
        $ChPsJudgment->name = $request->name; 
        $ChPsJudgment->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de juicio y raciocinio asociadas al paciente exitosamente',
            'data' => ['ch_ps_judgment' => $ChPsJudgment->toArray()]
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
        $ChPsJudgment = ChPsJudgment::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de juicio y raciocinio obtenidas exitosamente',
            'data' => ['ch_ps_judgment' => $ChPsJudgment]
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
        $ChPsJudgment = ChPsJudgment::find($id);  
        $ChPsJudgment->name = $request->name; 
        $ChPsJudgment->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de juicio y raciocinio actualizadas exitosamente',
            'data' => ['ch_ps_judgment' => $ChPsJudgment]
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
            $ChPsJudgment = ChPsJudgment::find($id);
            $ChPsJudgment->delete();

            return response()->json([
                'status' => true,
                'message' => 'Aspectos de juicio y raciocinio eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Aspectos de juicio y raciocinio en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
