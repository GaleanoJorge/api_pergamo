<?php

namespace App\Http\Controllers\Management;

use App\Models\ChExamGynecologists;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChExamGynecologistsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChExamGynecologists = ChExamGynecologists::select();

        if($request->_sort){
            $ChExamGynecologists->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChExamGynecologists->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChExamGynecologists=$ChExamGynecologists->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChExamGynecologists=$ChExamGynecologists->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos obtenidos exitosamente',
            'data' => ['ch_exam_gynecologists' => $ChExamGynecologists]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChExamGynecologists = new ChExamGynecologists; 
        $ChExamGynecologists->name = $request->name; 
        $ChExamGynecologists->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos asociado al paciente exitosamente',
            'data' => ['ch_exam_gynecologists' => $ChExamGynecologists->toArray()]
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
        $ChExamGynecologists = ChExamGynecologists::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos obtenido exitosamente',
            'data' => ['ch_exam_gynecologists' => $ChExamGynecologists]
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
        $ChExamGynecologists = ChExamGynecologists::find($id);  
        $ChExamGynecologists->name = $request->name; 
          
        
        
        $ChExamGynecologists->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos actualizado exitosamente',
            'data' => ['ch_exam_gynecologists' => $ChExamGynecologists]
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
            $ChExamGynecologists = ChExamGynecologists::find($id);
            $ChExamGynecologists->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo Ginecoobstetricos eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo Ginecoobstetricos en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
