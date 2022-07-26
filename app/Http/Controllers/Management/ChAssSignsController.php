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

 /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id, int $type_record_id): JsonResponse
    {


        $ChAssSigns = ChAssSigns::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Valoración terapéutica obtenida exitosamente',
            'data' => ['ch_ass_signs' => $ChAssSigns]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
            $ChAssSigns = new ChAssSigns;
   
            if (isset($request->ch_signs)) {
                        foreach ($request->ch_signs as $element) {
                            if ($element == 'ALETEO NASAL') {
                                $ChAssSigns->fluter = $element;
                            } else if ($element == 'CIANOSIS DISTAL') {
                                $ChAssSigns->distal = $element;
                            } else if ($element == 'CIANOSIS GENERALIZADA') {
                                $ChAssSigns->widespread = $element;
                            } else if ($element == 'CIANOSIS PERIBUCAL') {
                                $ChAssSigns->peribucal = $element;
                            } else if ($element == 'CIANOSIS PERIORBITAL') {
                                $ChAssSigns->periorbitary = $element;
                            } else if ($element == 'NINGUNO') {
                                $ChAssSigns->none = $element;
                            } else if ($element == 'USO DE MUSCULOS INTERCOSTALES') {
                                $ChAssSigns->intercostal = $element;
                            } else if ($element == 'USO DE MUSCULOS SUPRACLAVICULARES') {
                                $ChAssSigns->aupraclavicular = $element;
                        }
                    }
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
