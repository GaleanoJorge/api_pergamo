<?php

namespace App\Http\Controllers\Management;

use App\Models\Admissions;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdmissionsRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AdmissionsController extends Controller
{
    public function index(Request $request): JsonResponse
    {

        $Admissionss = Admissions::select('*');

        if ($request->_sort) {
            $Admissionss->orderBy($request->_sort, $request->_order);
        }

        if ($request->contract_id) {
            $Admissionss->where('Admissionss.contract_id', $request->contract_id);
        }

        if ($request->search) {
            $Admissionss->where('Admissionss.code','like','%' . $request->search. '%')
                    ->orWhere('Admissionss.code_technical_concept', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $Admissionss = $Admissionss->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Admissionss = $Admissionss->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Admisión obtenidos exitosamente',
            'data' => ['admissionss' => $Admissionss]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdmissionsRequest $request
     * @return JsonResponse
     */
    public function store(AdmissionsRequest $request): JsonResponse
    {
        $Admissions = new Admissions;
        $Admissions->admision_route = $request->admision_route;
        $Admissions->campus_id = $request->campus_id;
        $Admissions->scope_of_attention_id = $request->scope_of_attention_id;
        $Admissions->program_id = $request->program_id;
        $Admissions->pavilion_id = $request->pavilion_id;
        $Admissions->flat_id = $request->flat_id;
        $Admissions->bed_id = $request->bed_id;
        $Admissions->patient_data_id = $request->patient_data_id;
        $Admissions->contract_id = $request->contract_id;
        $Admissions->user_id = $request->user_id;
        
        $Admissions->save();
        

        return response()->json([
            'status' => true,
            'message' => 'Admisión creado exitosamente',
            'data' => ['admissions' => $Admissions->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $Admissions = Admissions::where('id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Admisión obtenido exitosamente',
            'data' => ['admissions' => $Admissions]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SectionalCouncilRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(AdmissionsRequest $request, int $id): JsonResponse
    {
        $Admissions = Admissions::find($id);
        $Admissions->admision_route = $request->admision_route;
        $Admissions->campus_id = $request->campus_id;
        $Admissions->scope_of_attention_id = $request->scope_of_attention_id;
        $Admissions->program_id = $request->program_id;
        $Admissions->pavilion_id = $request->pavilion_id;
        $Admissions->flat_id = $request->flat_id;
        $Admissions->bed_id = $request->bed_id;
        $Admissions->patient_data_id = $request->patient_data_id;
        $Admissions->contract_id = $request->contract_id;
        $Admissions->user_id = $request->user_id;
        $Admissions->save();

        return response()->json([
            'status' => true,
            'message' => 'Admisión actualizado exitosamente',
            'data' => ['admissions' => $Admissions]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $Admissions = Admissions::find($id);
            $Admissions->delete();

            return response()->json([
                'status' => true,
                'message' => 'Admisión eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Admisión está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
