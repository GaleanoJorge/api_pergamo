<?php

namespace App\Http\Controllers\Management;

use App\Models\PatientPosition;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PatientPositionRequest;
use Illuminate\Database\QueryException;

class PatientPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $PatientPosition = PatientPosition::select();

        if($request->_sort){
            $PatientPosition->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $PatientPosition->where('name','like','%' . $request->search. '%');
        }
   
        if($request->query("pagination", true)=="false"){
            $PatientPosition=$PatientPosition->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $PatientPosition=$PatientPosition->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Posiciones de paciente asociadas exitosamente',
            'data' => ['patient_position' => $PatientPosition]
        ]);
    }

    
    public function store(PatientPositionRequest $request)
    {
        $PatientPosition = new PatientPosition;
        $PatientPosition->name = $request->name; 
        $PatientPosition->save();

        return response()->json([
            'status' => true,
            'message' => 'Posiciones de paciente creadas exitosamente',
            'data' => ['patient_position' => $PatientPosition->toArray()]
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
        $PatientPosition = PatientPosition::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Posiciones de paciente obtenidas exitosamente',
            'data' => ['patient_position' => $PatientPosition]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(PatientPositionRequest $request, int $id): JsonResponse
    {
        $PatientPosition = PatientPosition::find($id);
        $PatientPosition->name = $request->name; 
        $PatientPosition->save();

        return response()->json([
            'status' => true,
            'message' => 'Posiciones de paciente actualizadas exitosamente',
            'data' => ['patient_position' => $PatientPosition]
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
            $PatientPosition = PatientPosition::find($id);
            $PatientPosition->delete();

            return response()->json([
                'status' => true,
                'message' => 'Posiciones de paciente eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Posiciones de paciente estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
