<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPhysicalExam;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPhysicalExamController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPhysicalExam = ChPhysicalExam::select();

        if($request->_sort){
            $ChPhysicalExam->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPhysicalExam->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPhysicalExam=$ChPhysicalExam->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPhysicalExam=$ChPhysicalExam->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico obtenidos exitosamente',
            'data' => ['ch_physical_exam' => $ChPhysicalExam]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChPhysicalExam = new ChPhysicalExam; 
        $ChPhysicalExam->revision = $request->revision; 
        $ChPhysicalExam->observation = $request->observation; 
        $ChPhysicalExam->type_ch_physical_exam_id = $request->type_ch_physical_exam_id; 
        $ChPhysicalExam->type_record_id = $request->type_record_id; 
        $ChPhysicalExam->ch_record_id = $request->ch_record_id; 
        $ChPhysicalExam->save();

        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico asociado al paciente exitosamente',
            'data' => ['ch_physical_exam' => $ChPhysicalExam->toArray()]
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
        $ChPhysicalExam = ChPhysicalExam::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico obtenido exitosamente',
            'data' => ['ch_physical_exam' => $ChPhysicalExam]
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
        $ChPhysicalExam = ChPhysicalExam::find($id);  
        $ChPhysicalExam->revision = $request->revision; 
        $ChPhysicalExam->observation = $request->observation; 
        $ChPhysicalExam->type_ch_physical_exam_id = $request->type_ch_physical_exam_id; 
        $ChPhysicalExam->type_record_id = $request->type_record_id; 
        $ChPhysicalExam->ch_record_id = $request->ch_record_id; 
        $ChPhysicalExam->save();

        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico actualizado exitosamente',
            'data' => ['ch_physical_exam' => $ChPhysicalExam]
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
            $ChPhysicalExam = ChPhysicalExam::find($id);
            $ChPhysicalExam->delete();

            return response()->json([
                'status' => true,
                'message' => 'Clase de diagnostico eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Clase de diagnostico en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
