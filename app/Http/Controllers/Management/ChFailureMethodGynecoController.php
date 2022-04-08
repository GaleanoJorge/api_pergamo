<?php

namespace App\Http\Controllers\Management;

use App\Models\ChFailureMethodGyneco;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChFailureMethodGynecoController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChFailureMethodGyneco = ChFailureMethodGyneco::select();

        if($request->_sort){
            $ChFailureMethodGyneco->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChFailureMethodGyneco->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChFailureMethodGyneco=$ChFailureMethodGyneco->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChFailureMethodGyneco=$ChFailureMethodGyneco->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos obtenidos exitosamente',
            'data' => ['ch_failure_method_gyneco' => $ChFailureMethodGyneco]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChFailureMethodGyneco = new ChFailureMethodGyneco; 
        $ChFailureMethodGyneco->name = $request->name; 
        $ChFailureMethodGyneco->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos asociado al paciente exitosamente',
            'data' => ['ch_failure_method_gyneco' => $ChFailureMethodGyneco->toArray()]
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
        $ChFailureMethodGyneco = ChFailureMethodGyneco::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos obtenido exitosamente',
            'data' => ['ch_failure_method_gyneco' => $ChFailureMethodGyneco]
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
        $ChFailureMethodGyneco = ChFailureMethodGyneco::find($id);  
        $ChFailureMethodGyneco->name = $request->name; 
          
        
        
        $ChFailureMethodGyneco->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos actualizado exitosamente',
            'data' => ['ch_failure_method_gyneco' => $ChFailureMethodGyneco]
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
            $ChFailureMethodGyneco = ChFailureMethodGyneco::find($id);
            $ChFailureMethodGyneco->delete();

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
