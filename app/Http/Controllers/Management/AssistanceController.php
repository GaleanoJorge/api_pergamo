<?php

namespace App\Http\Controllers\Management;

use App\Models\Assistance;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AssistanceRequest;
use Illuminate\Database\QueryException;

class AssistanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Assistance = Assistance::select();

        if($request->_sort){
            $Assistance->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Assistance->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Assistance=$Assistance->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Assistance=$Assistance->paginate($per_page,'*','page',$page); 
        } 
        return response()->json([
            'status' => true,
            'message' => 'Personal Asistencial obtenido exitosamente',
            'data' => ['assistance' => $Assistance]
        ]);
    }    
    

    public function store(AssistanceRequest $request): JsonResponse
    {
        $Assistance =new Assistance;
        $Assistance->user_id = $request->user_id;
        $Assistance->medical_record = $request->medical_record;
        $Assistance->contract_type_id= $request->contract_type_id;
        $Assistance->cost_center_id = $request->cost_center_id;
        $Assistance->PAD_service = $request->PAD_service;
        $Assistance->PAD_patient_quantity = $request->PAD_patient_quantity;
        $Assistance->medium_signature_file_id = $request->medium_signature_file_id;
        $Assistance->attends_external_consultation = $request->attends_external_consultation;
        $Assistance->serve_multiple_patients = $request->serve_multiple_patients;
        $Assistance->special_field_id = $request->special_field_id;
        $Assistance->save();

        return response()->json([
            'status' => true,
            'message' => 'Personal Asistencial creada exitosamente',
            'data' => ['assistance' => $Assistance->toArray()]
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
        $Assistance = Assistance::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Personal Asistencial obtenido exitosamente',
            'data' => ['assistance' => $Assistance]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AssistanceRequest $request, int $id): JsonResponse
    {
        $Assistance = Assistance::find($id);
        $Assistance->user_id = $request->user_id;
        $Assistance->medical_record = $request->medical_record;
        $Assistance->contract_type_id= $request->contract_type_id;
        $Assistance->cost_center_id = $request->cost_center_id;
        $Assistance->PAD_service = $request->PAD_service;
        $Assistance->PAD_patient_quantity = $request->PAD_patient_quantity;
        $Assistance->attends_external_consultation = $request->attends_external_consultation;
        $Assistance->serve_multiple_patients = $request->serve_multiple_patients;
        $Assistance->special_field = $request->special_field;
        $Assistance->file_firm = $request->file_firm;
        $Assistance->save();

        return response()->json([
            'status' => true,
            'message' => 'Personal Asistencial actualizado exitosamente',
            'data' => ['assistance' => $Assistance]
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
            $Assistance = Assistance::find($id);
            $Assistance->delete();

            return response()->json([
                'status' => true,
                'message' => 'Personal Asistencial eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Personal Asistencial esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
