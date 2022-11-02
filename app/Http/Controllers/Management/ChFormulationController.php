<?php

namespace App\Http\Controllers\Management;

use App\Models\ChFormulation;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChFormulationRequest;
use Illuminate\Database\QueryException;

class ChFormulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChFormulation = ChFormulation::select();

        if ($request->_sort) {
            $ChFormulation->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChFormulation->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChFormulation = $ChFormulation->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChFormulation = $ChFormulation->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Formulación Medica  obtenidos exitosamente',
            'data' => ['ch_formulation' => $ChFormulation]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByAdmission(int $admission_id): JsonResponse
    {
        $ChFormulation = ChFormulation::select('ch_formulation.*')
            ->leftJoin('ch_record','ch_record.id','ch_formulation.ch_record_id')
            ->leftJoin('admissions','admissions.id','ch_record.admissions_id')
            ->where('admissions.id', $admission_id)
            ->where('ch_formulation.medical_formula', 0)
            ->with(
                'services_briefcase',
                'services_briefcase.manual_price',
                'administration_route',
                'hourly_frequency',
                'product_generic',
                'product_generic.drug_concentration',
                'product_generic.measurement_units',
                'product_generic.multidose_concentration',
            )
            ->orderBy('ch_formulation.created_at', 'DESC')
            ->groupBy('ch_formulation.id')
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Formula del paciente exitosamente',
            'data' => ['ch_formulation' => $ChFormulation]
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
        $ChFormulation = ChFormulation::where('ch_record_id', $id)
            ->where('type_record_id', $type_record_id)
            ->with(
                'services_briefcase',
                'services_briefcase.manual_price',
                'administration_route',
                'hourly_frequency',
                'product_generic',
            )
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Formula del paciente exitosamente',
            'data' => ['ch_formulation' => $ChFormulation]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChFormulation = new ChFormulation;
        $ChFormulation->product_generic_id = $request->product_generic_id;
        $ChFormulation->administration_route_id = $request->administration_route_id;
        $ChFormulation->hourly_frequency_id = $request->hourly_frequency_id;
        $ChFormulation->services_briefcase_id = $request->services_briefcase_id;
        $ChFormulation->medical_formula = $request->medical_formula;
        $ChFormulation->treatment_days = $request->treatment_days;
        $ChFormulation->outpatient_formulation = $request->outpatient_formulation;
        $ChFormulation->dose = $request->dose;
        $ChFormulation->observation = $request->observation;
        $ChFormulation->number_mipres = $request->number_mipres;
        $ChFormulation->type_record_id = $request->type_record_id;
        $ChFormulation->ch_record_id = $request->ch_record_id;

        $ChFormulation->save();

        return response()->json([
            'status' => true,
            'message' => 'Formulación Medica  creado exitosamente',
            'data' => ['ch_formulation' => $ChFormulation->toArray()]
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
        $ChFormulation = ChFormulation::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Formulación Medica  obtenido exitosamente',
            'data' => ['ch_formulation' => $ChFormulation]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ChFormulationRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ChFormulationRequest $request, int $id): JsonResponse
    {
        $ChFormulation = ChFormulation::find($id);
        $ChFormulation->product_generic_id = $request->product_generic_id;
        $ChFormulation->administration_route_id = $request->administration_route_id;
        $ChFormulation->hourly_frequency_id = $request->hourly_frequency_id;
        $ChFormulation->medical_formula = $request->medical_formula;
        $ChFormulation->services_briefcase_id = $request->services_briefcase_id;
        $ChFormulation->treatment_days = $request->treatment_days;
        $ChFormulation->outpatient_formulation = $request->outpatient_formulation;
        $ChFormulation->dose = $request->dose;
        $ChFormulation->observation = $request->observation;
        $ChFormulation->number_mipres = $request->number_mipres;
        $ChFormulation->type_record_id = $request->type_record_id;
        $ChFormulation->ch_record_id = $request->ch_record_id;
        $ChFormulation->save();

        return response()->json([
            'status' => true,
            'message' => 'Formulación Medica  actualizado exitosamente',
            'data' => ['ch_formulation' => $ChFormulation]
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
            $ChFormulation = ChFormulation::find($id);
            $ChFormulation->delete();

            return response()->json([
                'status' => true,
                'message' => 'Formulación Medica  eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Formulación Medica  esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
