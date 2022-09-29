<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsExamOthers;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsExamOthersController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsExamOthers = ChPsExamOthers::select();

        if($request->_sort){
            $ChPsExamOthers->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsExamOthers->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsExamOthers=$ChPsExamOthers->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsExamOthers=$ChPsExamOthers->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Otros tipo de sueño  obtenidas exitosamente',
            'data' => ['ch_ps_exam_others' => $ChPsExamOthers]
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
        
       
        $ChPsExamOthers = ChPsExamOthers::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Otros tipo de sueño  obtenidas exitosamente',
            'data' => ['ch_ps_exam_others' => $ChPsExamOthers]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsExamOthers = new ChPsExamOthers;
        $ChPsExamOthers->name = $request->name; 
        $ChPsExamOthers->save();

        return response()->json([
            'status' => true,
            'message' => 'Otros tipo de sueño  asociadas al paciente exitosamente',
            'data' => ['ch_ps_exam_others' => $ChPsExamOthers->toArray()]
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
        $ChPsExamOthers = ChPsExamOthers::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Otros tipo de sueño  obtenidas exitosamente',
            'data' => ['ch_ps_exam_others' => $ChPsExamOthers]
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
        $ChPsExamOthers = ChPsExamOthers::find($id);  
        $ChPsExamOthers->name = $request->name; 
        $ChPsExamOthers->save();

        return response()->json([
            'status' => true,
            'message' => 'Otros tipo de sueño  actualizadas exitosamente',
            'data' => ['ch_ps_exam_others' => $ChPsExamOthers]
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
            $ChPsExamOthers = ChPsExamOthers::find($id);
            $ChPsExamOthers->delete();

            return response()->json([
                'status' => true,
                'message' => 'Otros tipo de sueño  eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Otros tipo de sueño  en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
