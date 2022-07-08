<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSigns;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChSignsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSigns = ChSigns::select();

        if($request->_sort){
            $ChSigns->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChSigns->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChSigns=$ChSigns->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChSigns=$ChSigns->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Signos de dificultad respiratoria  obtenidos exitosamente',
            'data' => ['ch_signs' => $ChSigns]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChSigns = new ChSigns; 
        $ChSigns->name = $request->name; 
        $ChSigns->type_record_id = $request->type_record_id; 
        $ChSigns->ch_record_id = $request->ch_record_id;  
        $ChSigns->save();

        return response()->json([
            'status' => true,
            'message' => 'Signos de dificultad respiratoria  asociado al paciente exitosamente',
            'data' => ['ch_signs' => $ChSigns->toArray()]
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
        $ChSigns = ChSigns::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Signos de dificultad respiratoria  obtenido exitosamente',
            'data' => ['ch_signs' => $ChSigns]
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
        $ChSigns = ChSigns::find($id);  
        $ChSigns->name = $request->name;         
        $ChSigns->type_record_id = $request->type_record_id; 
        $ChSigns->ch_record_id = $request->ch_record_id;        
        $ChSigns->save();

        return response()->json([
            'status' => true,
            'message' => 'Signos de dificultad respiratoria  actualizado exitosamente',
            'data' => ['ch_signs' => $ChSigns]
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
            $ChSigns = ChSigns::find($id);
            $ChSigns->delete();

            return response()->json([
                'status' => true,
                'message' => 'Signos de dificultad respiratoria eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Signos de dificultad respiratoria en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
