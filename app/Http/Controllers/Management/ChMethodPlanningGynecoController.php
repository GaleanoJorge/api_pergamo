<?php

namespace App\Http\Controllers\Management;

use App\Models\ChMethodPlanningGyneco;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChMethodPlanningGynecoController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChMethodPlanningGyneco = ChMethodPlanningGyneco::select();

        if($request->_sort){
            $ChMethodPlanningGyneco->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChMethodPlanningGyneco->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChMethodPlanningGyneco=$ChMethodPlanningGyneco->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChMethodPlanningGyneco=$ChMethodPlanningGyneco->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos obtenidos exitosamente',
            'data' => ['ch_method_planning_gyneco' => $ChMethodPlanningGyneco]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChMethodPlanningGyneco = new ChMethodPlanningGyneco; 
        $ChMethodPlanningGyneco->name = $request->name; 
        $ChMethodPlanningGyneco->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos asociado al paciente exitosamente',
            'data' => ['ch_method_planning_gyneco' => $ChMethodPlanningGyneco->toArray()]
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
        $ChMethodPlanningGyneco = ChMethodPlanningGyneco::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos obtenido exitosamente',
            'data' => ['ch_method_planning_gyneco' => $ChMethodPlanningGyneco]
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
        $ChMethodPlanningGyneco = ChMethodPlanningGyneco::find($id);  
        $ChMethodPlanningGyneco->name = $request->name; 
          
        
        
        $ChMethodPlanningGyneco->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos actualizado exitosamente',
            'data' => ['ch_method_planning_gyneco' => $ChMethodPlanningGyneco]
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
            $ChMethodPlanningGyneco = ChMethodPlanningGyneco::find($id);
            $ChMethodPlanningGyneco->delete();

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
