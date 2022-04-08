<?php

namespace App\Http\Controllers\Management;

use App\Models\ChFlowGynecologists;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChFlowGynecologistsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChFlowGynecologists = ChFlowGynecologists::select();

        if($request->_sort){
            $ChFlowGynecologists->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChFlowGynecologists->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChFlowGynecologists=$ChFlowGynecologists->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChFlowGynecologists=$ChFlowGynecologists->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos obtenidos exitosamente',
            'data' => ['ch_flow_gynecologists' => $ChFlowGynecologists]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChFlowGynecologists = new ChFlowGynecologists; 
        $ChFlowGynecologists->name = $request->name; 
        $ChFlowGynecologists->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos asociado al paciente exitosamente',
            'data' => ['ch_flow_gynecologists' => $ChFlowGynecologists->toArray()]
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
        $ChFlowGynecologists = ChFlowGynecologists::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos obtenido exitosamente',
            'data' => ['ch_flow_gynecologists' => $ChFlowGynecologists]
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
        $ChFlowGynecologists = ChFlowGynecologists::find($id);  
        $ChFlowGynecologists->name = $request->name; 
          
        
        
        $ChFlowGynecologists->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos actualizado exitosamente',
            'data' => ['ch_flow_gynecologists' => $ChFlowGynecologists]
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
            $ChFlowGynecologists = ChFlowGynecologists::find($id);
            $ChFlowGynecologists->delete();

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

