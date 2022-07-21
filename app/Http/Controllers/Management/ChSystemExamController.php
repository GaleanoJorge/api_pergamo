<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSystemExam;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChSystemExamController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSystemExam = ChSystemExam::with('type_ch_system_exam');

        if($request->_sort){
            $ChSystemExam->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChSystemExam->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChSystemExam=$ChSystemExam->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChSystemExam=$ChSystemExam->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Revisión Por  Sistema obtenidos exitosamente',
            'data' => ['ch_system_exam' => $ChSystemExam]
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
        
       
        $ChSystemExam = ChSystemExam::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->with('type_ch_system_exam')->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Revisión Por  Sistema obtenido exitosamente',
            'data' => ['ch_system_exam' => $ChSystemExam]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $validate=ChSystemExam::where('ch_record_id', $request->ch_record_id)->where('type_ch_system_exam_id',$request->type_ch_system_exam_id)->first();
        if(!$validate){
        $ChSystemExam = new ChSystemExam; 
        $ChSystemExam->revision = $request->revision; 
        $ChSystemExam->observation = $request->observation; 
        $ChSystemExam->type_ch_system_exam_id = $request->type_ch_system_exam_id; 
        $ChSystemExam->type_record_id = $request->type_record_id; 
        $ChSystemExam->ch_record_id = $request->ch_record_id; 
        $ChSystemExam->save();

        return response()->json([
            'status' => true,
            'message' => 'Revisión Por  Sistema asociado al paciente exitosamente',
            'data' => ['ch_system_exam' => $ChSystemExam->toArray()]
        ]);
    }else{
        return response()->json([
            'status' => false,
            'message' => 'Ya tiene observación'
        ], 423);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChSystemExam = ChSystemExam::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Revisión Por  Sistema obtenido exitosamente',
            'data' => ['ch_system_exam' => $ChSystemExam]
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
        $ChSystemExam = ChSystemExam::find($id);  
        $ChSystemExam->revision = $request->revision; 
        $ChSystemExam->observation = $request->observation; 
        $ChSystemExam->type_ch_system_exam_id = $request->type_ch_system_exam_id; 
        $ChSystemExam->type_record_id = $request->type_record_id; 
        $ChSystemExam->ch_record_id = $request->ch_record_id; 
        $ChSystemExam->save();

        return response()->json([
            'status' => true,
            'message' => 'Revisión Por  Sistema actualizado exitosamente',
            'data' => ['ch_system_exam' => $ChSystemExam]
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
            $ChSystemExam = ChSystemExam::find($id);
            $ChSystemExam->delete();

            return response()->json([
                'status' => true,
                'message' => 'Revisión Por  Sistema eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Revisión Por  Sistema en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
