<?php

namespace App\Http\Controllers\Management;

use App\Models\ReasonExit;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ReasonExitRequest;
use Illuminate\Database\QueryException;

class ReasonExitController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ReasonExit = ReasonExit::select();

        if($request->_sort){
            $ReasonExit->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ReasonExit->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ReasonExit=$ReasonExit->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ReasonExit=$ReasonExit->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Motivo de la Salida del Paciente asociados exitosamente',
            'data' => ['reason_exit' => $ReasonExit]
        ]);
    }
    

    public function store(ReasonExitRequest $request): JsonResponse
    {
        $ReasonExit = new ReasonExit;
        $ReasonExit->name = $request->name; 
        $ReasonExit->save();

        return response()->json([
            'status' => true,
            'message' => 'Motivo de la Salida del Paciente creada exitosamente',
            'data' => ['reason_exit' => $ReasonExit->toArray()]
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
        $ReasonExit = ReasonExit::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Motivo de la Salida del Paciente obtenido exitosamente',
            'data' => ['reason_exit' => $ReasonExit]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ReasonExitRequest $request, int $id): JsonResponse
    {
        $ReasonExit = ReasonExit::find($id);
        $ReasonExit->name = $request->name; 
        $ReasonExit->save();

        return response()->json([
            'status' => true,
            'message' => 'Motivo de la Salida del Paciente actualizado exitosamente',
            'data' => ['reason_exit' => $ReasonExit]
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
            $ReasonExit = ReasonExit::find($id);
            $ReasonExit->delete();

            return response()->json([
                'status' => true,
                'message' => 'Motivo de la Salida del Paciente eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Motivo de la Salida del Paciente esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
