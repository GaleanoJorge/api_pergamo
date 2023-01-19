<?php

namespace App\Http\Controllers\Management;

use App\Models\ChTypePhysicalExam;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChTypePhysicalExamController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChTypePhysicalExam = ChTypePhysicalExam::select();

        if($request->_sort){
            $ChTypePhysicalExam->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChTypePhysicalExam->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChTypePhysicalExam=$ChTypePhysicalExam->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChTypePhysicalExam=$ChTypePhysicalExam->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico obtenidos exitosamente',
            'data' => ['type_ch_physical_exam' => $ChTypePhysicalExam]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChTypePhysicalExam = new ChTypePhysicalExam; 
        $ChTypePhysicalExam->name = $request->name; 
        $ChTypePhysicalExam->description = $request->description; 
        $ChTypePhysicalExam->save();

        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico asociado al paciente exitosamente',
            'data' => ['type_ch_physical_exam' => $ChTypePhysicalExam->toArray()]
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
        $ChTypePhysicalExam = ChTypePhysicalExam::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico obtenido exitosamente',
            'data' => ['type_ch_physical_exam' => $ChTypePhysicalExam]
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
        $ChTypePhysicalExam = ChTypePhysicalExam::find($id);  
        $ChTypePhysicalExam->name = $request->name; 
        $ChTypePhysicalExam->description = $request->description;
          
        
        
        $ChTypePhysicalExam->save();

        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico actualizado exitosamente',
            'data' => ['type_ch_physical_exam' => $ChTypePhysicalExam]
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
            $ChTypePhysicalExam = ChTypePhysicalExam::find($id);
            $ChTypePhysicalExam->delete();

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
