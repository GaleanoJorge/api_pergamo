<?php

namespace App\Http\Controllers\Management;

use App\Models\Program;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProgramRequest;
use Illuminate\Database\QueryException;

class ProgramController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Program = Program::select();

        if($request->_sort){
            $Program->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Program->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Program=$Program->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Program=$Program->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Programa de atencion para el paciente asociados exitosamente',
            'data' => ['program' => $Program]
        ]);
    }
    

    public function store(ProgramRequest $request): JsonResponse
    {
        $Program = new Program;
        $Program->code = $request->code; 
        $Program->name = $request->name;
        $Program->save();

        return response()->json([
            'status' => true,
            'message' => 'Programa de atencion para el paciente creada exitosamente',
            'data' => ['program' => $Program->toArray()]
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
        $Program = Program::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Programa de atencion para el paciente obtenido exitosamente',
            'data' => ['program' => $Program]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ProgramRequest $request, int $id): JsonResponse
    {
        $Program = Program::find($id); 
        $Program->code = $request->code; 
        $Program->name = $request->name; 
        
        
        $Program->save();

        return response()->json([
            'status' => true,
            'message' => 'Programa de atencion para el paciente actualizado exitosamente',
            'data' => ['program' => $Program]
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
            $Program = Program::find($id);
            $Program->delete();

            return response()->json([
                'status' => true,
                'message' => 'Programa de atencion para el paciente eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Programa de atencion para el paciente esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
