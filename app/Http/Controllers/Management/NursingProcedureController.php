<?php

namespace App\Http\Controllers\Management;

use App\Models\NursingProcedure;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NursingProcedureRequest;
use Illuminate\Database\QueryException;

class NursingProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $NursingProcedure = NursingProcedure::select('nursing_procedure.*');

        if($request->_sort){
            $NursingProcedure->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $NursingProcedure->where('name','like','%' . $request->search. '%');
        }
   
        if($request->query("pagination", true)=="false"){
            $NursingProcedure=$NursingProcedure->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $NursingProcedure=$NursingProcedure->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'procedimientos de enfermeria asociadas exitosamente',
            'data' => ['nursing_procedure' => $NursingProcedure]
        ]);
    }

    
    public function store(NursingProcedureRequest $request)
    {
        $NursingProcedure = new NursingProcedure;
        $NursingProcedure->name = $request->name; 
        $NursingProcedure->save();

        return response()->json([
            'status' => true,
            'message' => 'procedimientos de enfermeria creadas exitosamente',
            'data' => ['nursing_procedure' => $NursingProcedure->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $NursingProcedure = NursingProcedure::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'procedimientos de enfermeria obtenidas exitosamente',
            'data' => ['nursing_procedure' => $NursingProcedure]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(NursingProcedureRequest $request, int $id): JsonResponse
    {
        $NursingProcedure = NursingProcedure::find($id);
        $NursingProcedure->name = $request->name; 
        $NursingProcedure->save();

        return response()->json([
            'status' => true,
            'message' => 'procedimientos de enfermeria actualizadas exitosamente',
            'data' => ['nursing_procedure' => $NursingProcedure]
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
            $NursingProcedure = NursingProcedure::find($id);
            $NursingProcedure->delete();

            return response()->json([
                'status' => true,
                'message' => 'procedimientos de enfermeria eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'procedimientos de enfermeria estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
