<?php

namespace App\Http\Controllers\Management;

use App\Models\ChAssSigns;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChAssSignsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChAssSigns = ChAssSigns::select();

        if($request->_sort){
            $ChAssSigns->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChAssSigns->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChAssSigns=$ChAssSigns->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChAssSigns=$ChAssSigns->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Signo de dificultad respiratoria obtenidos exitosamente',
            'data' => ['ch_ass_signs' => $ChAssSigns]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
            $ChAssSigns = new ChAssSigns;
    
            if (isset($request->ch_signs)) {
                
                $validator = array_search('ALETEO NASAL', $request->ch_signs);
                if(isset($validator)){
                    $ChAssSigns->distal = $request->ch_signs[$validator];
                };

                $validator = array_search('CIANOSIS DISTAL', $request->ch_signs);
                if($validator){
                    $ChAssSigns->distal = $request->ch_signs[$validator];
                };
    
                $validator = array_search('CIANOSIS GENERALIZADA', $request->ch_signs);
                if($validator){
                    $ChAssSigns->widespread = $request->ch_signs[$validator];
                };
    
                $validator = array_search('CIANOSIS PERIBUCAL', $request->ch_signs);
                if($validator){
                    $ChAssSigns->peribucal = $request->ch_signs[$validator];
                };
    
                $validator = array_search('CIANOSIS PERIORBITAL', $request->ch_signs);
                if($validator){
                    $ChAssSigns->periorbitary = $request->ch_signs[$validator];
                };

                $validator = array_search('NINGUNO', $request->ch_signs);
                if($validator){
                    $ChAssSigns->none = $request->ch_signs[$validator];
                };

                $validator = array_search('USO DE MUSCULOS INTERCOSTALES', $request->ch_signs);
                if($validator){
                    $ChAssSigns->intercostal = $request->ch_signs[$validator];
                };

                $validator = array_search('USO DE MUSCULOS SUPRACLAVICULARES', $request->ch_signs);
                if($validator){
                    $ChAssSigns->aupraclavicular = $request->ch_signs[$validator];
                };

            }
            
        $ChAssSigns->type_record_id = $request->type_record_id; 
        $ChAssSigns->ch_record_id = $request->ch_record_id; 
        $ChAssSigns->save();

        return response()->json([
            'status' => true,
            'message' => 'Signos de dificultad respiratoria asociado al paciente exitosamente',
            'data' => ['ch_ass_signs' => $ChAssSigns->toArray()]
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
        $ChAssSigns = ChAssSigns::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Signos de dificultad respiratoria obtenido exitosamente',
            'data' => ['ch_ass_signs' => $ChAssSigns]
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
        $ChAssSigns = ChAssSigns::find($id);  
        $ChAssSigns->fluter = $request->fluter; 
        $ChAssSigns->distal = $request->distal; 
        $ChAssSigns->widespread = $request->widespread; 
        $ChAssSigns->peribucal = $request->peribucal; 
        $ChAssSigns->periorbitary = $request->periorbitary; 
        $ChAssSigns->none = $request->none; 
        $ChAssSigns->intercostal = $request->intercostal; 
        $ChAssSigns->aupraclavicular = $request->aupraclavicular; 
        $ChAssSigns->type_record_id = $request->type_record_id; 
        $ChAssSigns->ch_record_id = $request->ch_record_id;
        $ChAssSigns->save();

        return response()->json([
            'status' => true,
            'message' => 'Signos de dificultad respiratoria actualizado exitosamente',
            'data' => ['ch_ass_signs' => $ChAssSigns]
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
            $ChAssSigns = ChAssSigns::find($id);
            $ChAssSigns->delete();

            return response()->json([
                'status' => true,
                'message' => 'Signos de dificultad respiratoriaeliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Signos de dificultad respiratoriaen uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
