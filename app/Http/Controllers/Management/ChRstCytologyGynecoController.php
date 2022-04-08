<?php

namespace App\Http\Controllers\Management;

use App\Models\ChRstCytologyGyneco;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChRstCytologyGynecoController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChRstCytologyGyneco = ChRstCytologyGyneco::select();

        if($request->_sort){
            $ChRstCytologyGyneco->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChRstCytologyGyneco->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChRstCytologyGyneco=$ChRstCytologyGyneco->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChRstCytologyGyneco=$ChRstCytologyGyneco->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos obtenidos exitosamente',
            'data' => ['ch_rst_cytology_gyneco' => $ChRstCytologyGyneco]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChRstCytologyGyneco = new ChRstCytologyGyneco; 
        $ChRstCytologyGyneco->name = $request->name; 
        $ChRstCytologyGyneco->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos asociado al paciente exitosamente',
            'data' => ['ch_rst_cytology_gyneco' => $ChRstCytologyGyneco->toArray()]
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
        $ChRstCytologyGyneco = ChRstCytologyGyneco::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos obtenido exitosamente',
            'data' => ['ch_rst_cytology_gyneco' => $ChRstCytologyGyneco]
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
        $ChRstCytologyGyneco = ChRstCytologyGyneco::find($id);  
        $ChRstCytologyGyneco->name = $request->name; 
          
        
        
        $ChRstCytologyGyneco->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos actualizado exitosamente',
            'data' => ['ch_rst_cytology_gyneco' => $ChRstCytologyGyneco]
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
            $ChRstCytologyGyneco = ChRstCytologyGyneco::find($id);
            $ChRstCytologyGyneco->delete();

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
