<?php

namespace App\Http\Controllers\Management;

use App\Models\ChOxygenTherapy;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;
use App\Models\ChRecord;

class ChOxygenTherapyController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChOxygenTherapy = ChOxygenTherapy::select();

        if($request->ch_record_id){
            $ChOxygenTherapy->where('ch_record_id', $request->ch_record_id)->where('type_record_id',1);
        }     
        if($request->_sort){
            $ChOxygenTherapy->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChOxygenTherapy->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChOxygenTherapy=$ChOxygenTherapy->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChOxygenTherapy=$ChOxygenTherapy->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Destete de oxigeno obtenidos exitosamente',
            'data' => ['ch_oxygen_therapy' => $ChOxygenTherapy]
        ]);
    }


    
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */

    public function getByRecord(Request $request, int $id, int $type_record_id): JsonResponse
    {


        $ChOxygenTherapy = ChOxygenTherapy::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $ChOxygenTherapy = ChOxygenTherapy::select('ch_oxygen_therapy.*')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->leftJoin('ch_record', 'ch_record.id', 'ch_oxygen_therapy.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_oxygen_therapy' => $ChOxygenTherapy]
        ]);
    }
    


    public function store(Request $request): JsonResponse
    {
        $ChOxygenTherapy = new ChOxygenTherapy; 
        $ChOxygenTherapy->revision = $request->revision; 
        $ChOxygenTherapy->observation = $request->observation; 
        $ChOxygenTherapy->type_record_id = $request->type_record_id; 
        $ChOxygenTherapy->ch_record_id = $request->ch_record_id; 
        $ChOxygenTherapy->save();

        return response()->json([
            'status' => true,
            'message' => 'Destete de oxigeno asociados al paciente exitosamente',
            'data' => ['ch_oxygen_therapy' => $ChOxygenTherapy->toArray()]
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
        $ChOxygenTherapy = ChOxygenTherapy::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Destete de oxigeno obtenido exitosamente',
            'data' => ['ch_oxygen_therapy' => $ChOxygenTherapy]
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
        $ChOxygenTherapy = ChOxygenTherapy::find($id);  
        $ChOxygenTherapy->revision = $request->revision; 
        $ChOxygenTherapy->observation = $request->observation; 
        $ChOxygenTherapy->type_record_id = $request->type_record_id; 
        $ChOxygenTherapy->ch_record_id = $request->ch_record_id; 
        $ChOxygenTherapy->save();

        return response()->json([
            'status' => true,
            'message' => 'Destete de oxigeno actualizados exitosamente',
            'data' => ['ch_oxygen_therapy' => $ChOxygenTherapy]
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
            $ChOxygenTherapy = ChOxygenTherapy::find($id);
            $ChOxygenTherapy->delete();

            return response()->json([
                'status' => true,
                'message' => 'Antecedente eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Antecedente en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
