<?php

namespace App\Http\Controllers\Management;

use App\Models\NursingCarePlan;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NursingCarePlanRequest;
use Illuminate\Database\QueryException;

class NursingCarePlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $NursingCarePlan = NursingCarePlan::select();

        if($request->_sort){
            $NursingCarePlan->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $NursingCarePlan->where('description','like','%' . $request->search. '%');
        }
   
        if($request->query("pagination", true)=="false"){
            $NursingCarePlan=$NursingCarePlan->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $NursingCarePlan=$NursingCarePlan->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Planes de cuidado asociadas exitosamente',
            'data' => ['nursing_care_plan' => $NursingCarePlan]
        ]);
    }

    
    public function store(NursingCarePlanRequest $request)
    {
        $NursingCarePlan = new NursingCarePlan;
        $NursingCarePlan->description = $request->name; 
        $NursingCarePlan->save();

        return response()->json([
            'status' => true,
            'message' => 'Posiciones de paciente creadas exitosamente',
            'data' => ['nursing_care_plan' => $NursingCarePlan->toArray()]
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
        $NursingCarePlan = NursingCarePlan::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Posiciones de paciente obtenidas exitosamente',
            'data' => ['nursing_care_plan' => $NursingCarePlan]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(NursingCarePlanRequest $request, int $id): JsonResponse
    {
        $NursingCarePlan = NursingCarePlan::find($id);
        $NursingCarePlan->description = $request->description; 
        $NursingCarePlan->save();

        return response()->json([
            'status' => true,
            'message' => 'Posiciones de paciente actualizadas exitosamente',
            'data' => ['nursing_care_plan' => $NursingCarePlan]
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
            $NursingCarePlan = NursingCarePlan::find($id);
            $NursingCarePlan->delete();

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
