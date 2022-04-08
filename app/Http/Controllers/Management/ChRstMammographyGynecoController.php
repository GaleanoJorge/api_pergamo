<?php

namespace App\Http\Controllers\Management;

use App\Models\ChRstMammographyGyneco;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChRstMammographyGynecoController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChRstMammographyGyneco = ChRstMammographyGyneco::select();

        if($request->_sort){
            $ChRstMammographyGyneco->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChRstMammographyGyneco->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChRstMammographyGyneco=$ChRstMammographyGyneco->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChRstMammographyGyneco=$ChRstMammographyGyneco->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos obtenidos exitosamente',
            'data' => ['ch_rst_mammography_gyneco' => $ChRstMammographyGyneco]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChRstMammographyGyneco = new ChRstMammographyGyneco; 
        $ChRstMammographyGyneco->name = $request->name; 
        $ChRstMammographyGyneco->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos asociado al paciente exitosamente',
            'data' => ['ch_rst_mammography_gyneco' => $ChRstMammographyGyneco->toArray()]
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
        $ChRstMammographyGyneco = ChRstMammographyGyneco::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos obtenido exitosamente',
            'data' => ['ch_rst_mammography_gyneco' => $ChRstMammographyGyneco]
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
        $ChRstMammographyGyneco = ChRstMammographyGyneco::find($id);  
        $ChRstMammographyGyneco->name = $request->name; 
          
        
        
        $ChRstMammographyGyneco->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos actualizado exitosamente',
            'data' => ['ch_rst_mammography_gyneco' => $ChRstMammographyGyneco]
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
            $ChRstMammographyGyneco = ChRstMammographyGyneco::find($id);
            $ChRstMammographyGyneco->delete();

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
