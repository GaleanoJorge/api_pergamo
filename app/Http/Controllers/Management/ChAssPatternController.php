<?php

namespace App\Http\Controllers\Management;

use App\Models\ChAssPattern;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChAssPatternController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChAssPattern = ChAssPattern::select();

        if($request->_sort){
            $ChAssPattern->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChAssPattern->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChAssPattern=$ChAssPattern->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChAssPattern=$ChAssPattern->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Signos de dificultad respiratoria  obtenidos exitosamente',
            'data' => ['ch_ass_pattern' => $ChAssPattern]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChAssPattern = new ChAssPattern; 
        $ChAssPattern->name = $request->name; 
        $ChAssPattern->type_record_id = $request->type_record_id; 
        $ChAssPattern->ch_record_id = $request->ch_record_id;  
        $ChAssPattern->save();

        return response()->json([
            'status' => true,
            'message' => 'Signos de dificultad respiratoria  asociado al paciente exitosamente',
            'data' => ['ch_ass_pattern' => $ChAssPattern->toArray()]
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
        $ChAssPattern = ChAssPattern::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Signos de dificultad respiratoria  obtenido exitosamente',
            'data' => ['ch_ass_pattern' => $ChAssPattern]
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
        $ChAssPattern = ChAssPattern::find($id);  
        $ChAssPattern->name = $request->name;         
        $ChAssPattern->type_record_id = $request->type_record_id; 
        $ChAssPattern->ch_record_id = $request->ch_record_id;        
        $ChAssPattern->save();

        return response()->json([
            'status' => true,
            'message' => 'Signos de dificultad respiratoria  actualizado exitosamente',
            'data' => ['ch_ass_pattern' => $ChAssPattern]
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
            $ChAssPattern = ChAssPattern::find($id);
            $ChAssPattern->delete();

            return response()->json([
                'status' => true,
                'message' => 'Signos de dificultad respiratoria eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Signos de dificultad respiratoria en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
