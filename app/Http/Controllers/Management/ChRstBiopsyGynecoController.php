<?php

namespace App\Http\Controllers\Management;

use App\Models\ChRstBiopsyGyneco;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChRstBiopsyGynecoController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChRstBiopsyGyneco = ChRstBiopsyGyneco::select();

        if($request->_sort){
            $ChRstBiopsyGyneco->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChRstBiopsyGyneco->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChRstBiopsyGyneco=$ChRstBiopsyGyneco->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChRstBiopsyGyneco=$ChRstBiopsyGyneco->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos obtenidos exitosamente',
            'data' => ['ch_rst_biopsy_gyneco' => $ChRstBiopsyGyneco]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChRstBiopsyGyneco = new ChRstBiopsyGyneco; 
        $ChRstBiopsyGyneco->name = $request->name; 
        $ChRstBiopsyGyneco->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos asociado al paciente exitosamente',
            'data' => ['ch_rst_biopsy_gyneco' => $ChRstBiopsyGyneco->toArray()]
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
        $ChRstBiopsyGyneco = ChRstBiopsyGyneco::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos obtenido exitosamente',
            'data' => ['ch_rst_biopsy_gyneco' => $ChRstBiopsyGyneco]
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
        $ChRstBiopsyGyneco = ChRstBiopsyGyneco::find($id);  
        $ChRstBiopsyGyneco->name = $request->name; 
          
        
        
        $ChRstBiopsyGyneco->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos actualizado exitosamente',
            'data' => ['ch_rst_biopsy_gyneco' => $ChRstBiopsyGyneco]
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
            $ChRstBiopsyGyneco = ChRstBiopsyGyneco::find($id);
            $ChRstBiopsyGyneco->delete();

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
