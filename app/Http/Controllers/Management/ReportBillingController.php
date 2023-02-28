<?php

namespace App\Http\Controllers\Management;

use App\Models\ReportBilling;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BillingPad;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ReportBillingController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ReportBilling = ReportBilling::select();

        if ($request->_sort) {
            $ReportBilling->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ReportBilling->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ReportBilling = $ReportBilling->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ReportBilling = $ReportBilling->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Reporte facturación encontrado exitosamente',
            'data' => ['report_billing' => $ReportBilling]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ReportBilling = new ReportBilling;
        $ReportBilling->initial_report = $request->initial_report;
        $ReportBilling->final_report = $request->final_report;
        $ReportBilling->company_id = $request->company_id;
        $ReportBilling->user_id = $request->user_id;
        $ReportBilling->save();

        return response()->json([
            'status' => true,
            'message' => 'Reporte facturación creado exitosamente',
            'data' => ['report_billing' => $ReportBilling->toArray()]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function exportBilling(Request $request, int $id): JsonResponse
    {
        //!--Facturadas
        $hoja1 = BillingPad::select(
            DB::raw('CONCAT_WS("-", billing_pad.billing_pad_prefix_id, billing_pad.consecutive) AS "Número de Factura"'),
            'billing_pad.facturation_date AS Fecha de Facturación',
            'identification_type.name AS Tipo de Identificación',
            'patients.identification AS Identificación de Paciente',
            DB::raw('CONCAT_WS(" ", patients.firstname, patients.middlefirstname, patients.lastname, patients.middlelastname) AS Paciente'),
            'billing_pad.total_value AS Total Facturado'
        )
            ->leftJoin('auth_billing_pad', 'billing_pad.id', 'auth_billing_pad.billing_pad_id')
            ->leftJoin('billing_pad AS bp2', 'bp2.billing_credit_note_id', 'billing_pad.id')
            ->leftJoin('billing_pad_prefix', 'billing_pad.billing_pad_prefix_id', 'billing_pad_prefix.id')
            ->leftJoin('campus', 'campus.billing_pad_prefix_id', 'billing_pad_prefix.id')
            ->leftJoin('authorization', 'authorization.id', 'auth_billing_pad.authorization_id')
            ->leftJoin('admissions', 'admissions.id', 'authorization.admissions_id')
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'authorization.services_briefcase_id')
            ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('identification_type', 'identification_type.id', 'patients.identification_type_id')
            //* Condiciones
            //? Consulta Entre Fechas
            ->whereBetween('auth_billing_pad.created_at', [$request->initial_report, $request->final_report])
            //? Consulta por EPS
            ->where('company.id', $request->company_id)
            //? Consulta por Estado de Facturación
            ->where('billing_pad.billing_pad_status_id', 2) // ID Facturadas
            ->whereNull('bp2.id')
            ->whereNotNull('campus.id')
            //? Agrupa Datos por ID de Facturación
            ->groupBy('billing_pad.id')
            //? Ordena Datos por Paciente
            ->orderBy('patients.id', 'ASC')
            ->get()->toArray();

        //!--Notas Credito
        $hoja2 = BillingPad::select(
            DB::raw('CONCAT_WS("-", billing_pad_prefix.name, billing_pad.consecutive) AS "Número de Factura"'),
            'billing_pad.facturation_date AS Fecha de Facturación',
            'identification_type.name AS Tipo de Identificación',
            'patients.identification AS Identificación de Paciente',
            DB::raw('CONCAT_WS(" ", patients.firstname, patients.middlefirstname, patients.lastname, patients.middlelastname) AS Paciente'),
            'billing_pad.total_value AS Total Facturado',
            'services_briefcase.value AS Valor Procedimiento',
            DB::raw('IF(authorization.quantity = !null, authorization.quantity, 1) AS Cantidad'),
            'manual_price.name AS Procedimiento'
        )
            ->leftJoin('auth_billing_pad', 'billing_pad.id', 'auth_billing_pad.billing_pad_id')
            ->leftJoin('billing_pad AS bp2', 'bp2.billing_credit_note_id', 'billing_pad.id')
            ->leftJoin('billing_pad_prefix', 'billing_pad.billing_pad_prefix_id', 'billing_pad_prefix.id')
            ->leftJoin('campus', 'campus.billing_pad_credit_note_prefix_id', 'billing_pad_prefix.id')
            ->leftJoin('authorization', 'authorization.id', 'auth_billing_pad.authorization_id')
            ->leftJoin('admissions', 'admissions.id', 'billing_pad.admissions_id')
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'authorization.services_briefcase_id')
            ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('identification_type', 'identification_type.id', 'patients.identification_type_id')
            ->whereBetween('auth_billing_pad.created_at', [$request->initial_report, $request->final_report])
            ->where('company.id', $request->company_id)
            ->where('billing_pad.billing_pad_status_id', 2)
            ->whereNotNull('bp2.id')
            // ->where('billing_pad.id' != 447)
            ->groupBy('billing_pad.id')
            ->orderBy('billing_pad.id', 'ASC')
            ->get()->toArray();

        // //!--Anuladas
        $hoja3 = BillingPad::select(
            'billing_pad_prefix.name AS Prefijo Factura',
            'billing_pad.consecutive AS Consecutivo',
            'billing_pad.facturation_date AS Fecha de Facturación',
            'identification_type.name AS Tipo de Identificación',
            'patients.identification AS Identificación de Paciente',
            DB::raw('CONCAT_WS(" ", patients.firstname, patients.middlefirstname, patients.lastname, patients.middlelastname) AS Paciente'),
            'billing_pad.total_value AS Total Facturado',
            'services_briefcase.value AS Valor Procedimiento',
            DB::raw('IF(authorization.quantity = !null, authorization.quantity, 1) AS Cantidad'),
            'manual_price.name AS Procedimiento',
            DB::raw('CONCAT_WS("-", bpp2.name, bp3.consecutive) AS "Nota Crédito"'),
        )
            ->leftJoin('auth_billing_pad', 'billing_pad.id', 'auth_billing_pad.billing_pad_id')
            ->leftJoin('billing_pad AS bp2', 'bp2.billing_credit_note_id', 'billing_pad.id')
            ->leftJoin('billing_pad AS bp3', 'bp3.id', 'billing_pad.billing_credit_note_id')
            ->leftJoin('billing_pad_prefix', 'billing_pad.billing_pad_prefix_id', 'billing_pad_prefix.id')
            ->leftJoin('billing_pad_prefix AS bpp2', 'bp3.billing_pad_prefix_id', 'bpp2.id')
            ->leftJoin('campus', 'campus.billing_pad_prefix_id', 'billing_pad_prefix.id')
            ->leftJoin('authorization', 'authorization.id', 'auth_billing_pad.authorization_id')
            ->leftJoin('admissions', 'admissions.id', 'billing_pad.admissions_id')
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'authorization.services_briefcase_id')
            ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('identification_type', 'identification_type.id', 'patients.identification_type_id')
            ->whereBetween('auth_billing_pad.created_at', [$request->initial_report, $request->final_report])
            ->where('company.id', $request->company_id)
            ->where('billing_pad.billing_pad_status_id', 4) // ID Anuladas
            ->whereNotNull('campus.id')
            ->groupBy('billing_pad.id')
            ->orderBy('billing_pad.id', 'ASC')
            ->get()->toArray();

        $response = [
            'h1' => $hoja1,
            'h2' => $hoja2,
            'h3' => $hoja3,
        ];

        return response()->json([
            'status' => true,
            'message' => 'Reporte de facturación solicitado exitosamente',
            'data' => $response,
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
        $ReportBilling = ReportBilling::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Reporte facturación encontrado exitosamente',
            'data' => ['report_billing' => $ReportBilling]
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
        $ReportBilling = ReportBilling::find($id);
        $ReportBilling->initial_report = $request->initial_report;
        $ReportBilling->final_report = $request->final_report;
        $ReportBilling->company_id = $request->company_id;
        $ReportBilling->user_id = $request->user_id;
        $ReportBilling->save();

        return response()->json([
            'status' => true,
            'message' => 'Reporte facturación actualizado exitosamente',
            'data' => ['report_billing' => $ReportBilling]
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
            $ReportBilling = ReportBilling::find($id);
            $ReportBilling->delete();

            return response()->json([
                'status' => true,
                'message' => 'Reporte facturación eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Reporte facturación en uso, imposible eliminarlo'
            ], 423);
        }
    }
}