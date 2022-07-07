<?php

namespace App\Http\Controllers\Management;

use App\Models\ChInability;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChInabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChInability = ChInability::with('ch_contingency_code','diagnosis_id','ch_type_inability','ch_type_procedure');

        if ($request->_sort) {
            $ChInability->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChInability->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChInability = $ChInability->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChInability = $ChInability->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Incapacidad obtenidos exitosamente',
            'data' => ['ch_inability' => $ChInability]
        ]);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id,int $type_record_id): JsonResponse
    {
        
       
        $ChInability = ChInability::with('ch_contingency_code', 'diagnosis','ch_type_inability', 'ch_type_procedure', 'type_record', 'ch_record')->where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Incapacidad asociado al paciente exitosamente',
            'data' => ['ch_inability' => $ChInability]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChInability = new ChInability;
        $ChInability->ch_contingency_code_id = $request->ch_contingency_code_id;
        $ChInability->extension = $request->extension;
        $ChInability->initial_date = $request->initial_date;
        $ChInability->final_date = $request->final_date;
        $ChInability->diagnosis_id = $request->diagnosis_id;
        $ChInability->ch_type_inability_id = $request->ch_type_inability_id;
        $ChInability->ch_type_procedure_id = $request->ch_type_procedure_id;
        $ChInability->observation = $request->observation;
        $ChInability->total_days = $request->total_days;
        $ChInability->type_record_id = $request->type_record_id;
        $ChInability->ch_record_id = $request->ch_record_id;
        $ChInability->save();

        return response()->json([
            'status' => true,
            'message' => 'Incapacidad asociado al paciente exitosamente',
            'data' => ['ch_inability' => $ChInability->toArray()]
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
        $ChInability = ChInability::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Incapacidad obtenido exitosamente',
            'data' => ['ch_inability' => $ChInability]
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
        $ChInability = ChInability::find($id);
        $ChInability->ch_contingency_code_id = $request->ch_contingency_code_id;
        $ChInability->extension = $request->extension;
        $ChInability->initial_date = $request->initial_date;
        $ChInability->final_date = $request->final_date;
        $ChInability->diagnosis_id = $request->diagnosis_id;
        $ChInability->ch_type_inability_id = $request->ch_type_inability_id;
        $ChInability->ch_type_procedure_id = $request->ch_type_procedure_id;
        $ChInability->observation = $request->observation;
        $ChInability->total_days = $request->total_days;
        $ChInability->type_record_id = $request->type_record_id;
        $ChInability->ch_record_id = $request->ch_record_id;
        $ChInability->save();

        return response()->json([
            'status' => true,
            'message' => 'Incapacidad actualizado exitosamente',
            'data' => ['ch_inability' => $ChInability]
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
            $ChInability = ChInability::find($id);
            $ChInability->delete();

            return response()->json([
                'status' => true,
                'message' => 'Incapacidad eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Incapacidad en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
