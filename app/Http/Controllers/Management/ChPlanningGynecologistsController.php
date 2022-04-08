<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPlanningGynecologists;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPlanningGynecologistsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPlanningGynecologists = ChPlanningGynecologists::select();

        if($request->_sort){
            $ChPlanningGynecologists->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPlanningGynecologists->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPlanningGynecologists=$ChPlanningGynecologists->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPlanningGynecologists=$ChPlanningGynecologists->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos obtenidos exitosamente',
            'data' => ['ch_planning_gynecologists' => $ChPlanningGynecologists]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChPlanningGynecologists = new ChPlanningGynecologists; 
        $ChPlanningGynecologists->name = $request->name; 
        $ChPlanningGynecologists->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos asociado al paciente exitosamente',
            'data' => ['ch_planning_gynecologists' => $ChPlanningGynecologists->toArray()]
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
        $ChPlanningGynecologists = ChPlanningGynecologists::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos obtenido exitosamente',
            'data' => ['ch_planning_gynecologists' => $ChPlanningGynecologists]
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
        $ChPlanningGynecologists = ChPlanningGynecologists::find($id);  
        $ChPlanningGynecologists->name = $request->name; 
          
        
        
        $ChPlanningGynecologists->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos actualizado exitosamente',
            'data' => ['ch_planning_gynecologists' => $ChPlanningGynecologists]
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
            $ChPlanningGynecologists = ChPlanningGynecologists::find($id);
            $ChPlanningGynecologists->delete();

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
