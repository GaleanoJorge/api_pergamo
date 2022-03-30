<?php

namespace App\Http\Controllers\Management;

use App\Models\ChTypeSystemExam;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChTypeSystemExamController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChTypeSystemExam = ChTypeSystemExam::select();

        if($request->_sort){
            $ChTypeSystemExam->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChTypeSystemExam->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChTypeSystemExam=$ChTypeSystemExam->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChTypeSystemExam=$ChTypeSystemExam->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico obtenidos exitosamente',
            'data' => ['type_ch_system_exam' => $ChTypeSystemExam]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChTypeSystemExam = new ChTypeSystemExam; 
        $ChTypeSystemExam->name = $request->name; 
        $ChTypeSystemExam->save();

        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico asociado al paciente exitosamente',
            'data' => ['type_ch_system_exam' => $ChTypeSystemExam->toArray()]
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
        $ChTypeSystemExam = ChTypeSystemExam::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico obtenido exitosamente',
            'data' => ['type_ch_system_exam' => $ChTypeSystemExam]
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
        $ChTypeSystemExam = ChTypeSystemExam::find($id);  
        $ChTypeSystemExam->name = $request->name; 
          
        
        
        $ChTypeSystemExam->save();

        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico actualizado exitosamente',
            'data' => ['type_ch_system_exam' => $ChTypeSystemExam]
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
            $ChTypeSystemExam = ChTypeSystemExam::find($id);
            $ChTypeSystemExam->delete();

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
