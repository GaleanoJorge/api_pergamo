<?php

namespace App\Http\Controllers\Management;

use App\Models\ChDiagnosisType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChDiagnosisTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChDiagnosisType = ChDiagnosisType::select();

        if ($request->_sort) {
            $ChDiagnosisType->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChDiagnosisType->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChDiagnosisType = $ChDiagnosisType->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChDiagnosisType = $ChDiagnosisType->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Tipo de diagnostico obtenidos exitosamente',
            'data' => ['ch_diagnosis_type' => $ChDiagnosisType]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ChDiagnosisType = new ChDiagnosisType;
        $ChDiagnosisType->name = $request->name;


        $ChDiagnosisType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de diagnostico asociado al paciente exitosamente',
            'data' => ['ch_diagnosis_type' => $ChDiagnosisType->toArray()]
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
        $ChDiagnosisType = ChDiagnosisType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de diagnostico obtenido exitosamente',
            'data' => ['ch_diagnosis_type' => $ChDiagnosisType]
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
        $ChDiagnosisType = ChDiagnosisType::find($id);
        $ChDiagnosisType->name = $request->name; 

        $ChDiagnosisType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de diagnostico actualizado exitosamente',
            'data' => ['ch_diagnosis_type' => $ChDiagnosisType]
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
            $ChDiagnosisType = ChDiagnosisType::find($id);
            $ChDiagnosisType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de diagnostico eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de diagnostico en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
