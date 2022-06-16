<?php

namespace App\Http\Controllers\Management;

use App\Models\ChAssFrequency;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChAssFrequencyController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChAssFrequency = ChAssFrequency::select();

        if($request->_sort){
            $ChAssFrequency->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChAssFrequency->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChAssFrequency=$ChAssFrequency->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChAssFrequency=$ChAssFrequency->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Frecuencia respiratoria obtenidos exitosamente',
            'data' => ['ch_ass_frequency' => $ChAssFrequency]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChAssFrequency = new ChAssFrequency; 
        $ChAssFrequency->name = $request->name;         
        $ChAssFrequency->type_record_id = $request->type_record_id; 
        $ChAssFrequency->ch_record_id = $request->ch_record_id;  
        $ChAssFrequency->save();

        return response()->json([
            'status' => true,
            'message' => 'Frecuencia respiratoria asociado al paciente exitosamente',
            'data' => ['ch_ass_frequency' => $ChAssFrequency->toArray()]
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
        $ChAssFrequency = ChAssFrequency::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Frecuencia respiratoria obtenido exitosamente',
            'data' => ['ch_ass_frequency' => $ChAssFrequency]
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
        $ChAssFrequency = ChAssFrequency::find($id);  
        $ChAssFrequency->name = $request->name; 
        $ChAssFrequency->type_record_id = $request->type_record_id; 
        $ChAssFrequency->ch_record_id = $request->ch_record_id;  
        $ChAssFrequency->save();

        return response()->json([
            'status' => true,
            'message' => 'Frecuencia respiratoria actualizado exitosamente',
            'data' => ['ch_ass_frequency' => $ChAssFrequency]
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
            $ChAssFrequency = ChAssFrequency::find($id);
            $ChAssFrequency->delete();

            return response()->json([
                'status' => true,
                'message' => 'Frecuencia respiratoriaeliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Frecuencia respiratoriaen uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
