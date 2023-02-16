<?php

namespace App\Http\Controllers\Management;

use App\Models\Base\ReportGloss;
use DB;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BillingPad;
use Illuminate\Database\QueryException;
class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Reports = ReportGloss::select();

        if ($request->_sort) {
            $Reports->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Reports->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $Reports = $Reports->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Reports = $Reports->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Reporte encontrado exitosamente',
            'data' => ['report_gloss' => $Reports]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $Reports = new ReportGloss;
        $Reports->initial_report = $request->initial_report;
        $Reports->final_report = $request->final_report;
        $Reports->gloss_id = $request->gloss_id;
        $Reports->status = $request->status;
        $Reports->user_id = $request->user_id;
        $Reports->save();

        return response()->json([
            'status' => true,
            'message' => 'Reporte Creado exitosamente',
            'data' => ['report_gloss' => $Reports->toArray()]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function exportGloss(Request $request, int $id): JsonResponse
    {
        //--Facturación
        $hoja1 = BillingPad::select(
            'auth_billing_pad.id AS Identificador',
            DB::raw('CONCAT_WS("-", billing_pad_prefix.name, billing_pad.consecutive) AS Factura - Consecutivo'), // Concatena Datos de Factura - Consecutivo
            'billing_pad.facturation_date AS Fecha de Facturación',
            'assigned_management_plan.start_date AS Fecha de Servicio',
            'identification_type.name AS Tipo de Documento',
            'patients.identification AS Identificación de Paciente',
            'company.administrator AS Código EPS',
            'type_briefcase.name AS Régimen',
            'patients.lastname AS Primer Apellido',
            'patients.middlelastname AS Segundo Apellido',
            'patients.firstname AS Primer Nombre',
            'patients.middlefirstname AS Segundo Nombre',
            'patients.age AS Edad',
            'gender.name AS Género',
            'region.code AS Código Departamento',
            'municipality.sga_origin_fk AS Código Municipio',
            'product.code_cum AS Cums',
            'manual_price.name AS Procedimiento',
            'authorization.quantity AS Cantidad',
            'manual_price.value AS Valor Unitario',
            '(authorization.quantity * manual_price.value) AS Valor Total Procedimiento',
            'SUM(IF(ISNULL(product.name), 0, 1)) * manual_price.value AS Valor Total',
            'billing_pad.total_value AS Valor Total Facturado'
        )
            // ->leftJoin('auth_billing_pad', 'auth_billing_pad.billing_pad_id', 'billing_pad.id')
            ->leftJoin('authorization', 'authorization.id', 'auth_billing_pad.authorization_id')
            ->leftJoin('assigned_management_plan', 'assigned_management_plan.id', 'authorization.assigned_management_plan_id')
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'authorization.services_briefcase_id')
            ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
            ->leftJoin('admissions', 'admissions.id', 'authorization.admissions_id')
            ->leftJoin('type_briefcase', 'type_briefcase.id', 'admissions.regime_id')
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('region', 'region.id', 'patients.residence_region_id')
            ->leftJoin('municipality', 'municipality.id', 'patients.residence_municipality_id')
            ->leftJoin('gender', 'gender.id', 'patients.gender_id')
            ->leftJoin('identification_type', 'identification_type.id', 'patients.identification_type_id')
            ->leftJoin('billing_pad', 'billing_pad.id', 'auth_billing_pad.billing_pad_id')
            ->leftJoin('billing_pad AS bp2', 'bp2.billing_credit_note_id', 'billing_pad.id')
            ->leftJoin('billing_pad_prefix', 'billing_pad.billing_pad_prefix_id', 'billing_pad_prefix.id')
            ->leftJoin('product', 'product.id', 'authorization.product_com_id')
            ->leftJoin('campus', 'campus.billing_pad_prefix_id', 'billing_pad_prefix.id')
            ->whereBetween('auth_billing_pad.created_at', [$request->initial_report, $request->final_report])
            ->where('billing_pad.billing_pad_status_id', 2)
            ->whereNull('bp2.id')
            ->whereNotNull('campus.id')
            ->groupBy('auth_billing_pad.id')
            ->orderBy('patients.identification', 'ASC')
            ->get()->toArray();
        // --Anulación Nota Credito
        $hoja2 = BillingPad::select(
            'billing_pad_prefix.name AS Prefijo de Factura',
            'billing_pad.consecutive AS Consecutivo de Factura',
            'billing_pad.facturation_date AS Fecha de Facturación',
            'identification_type.name AS Tipo de Documento',
            DB::raw('CONCAT_WS(" ", patients.firstname, patients.middlefirstname, patients.lastname, patients.middlelastname) AS Paciente'), // Concatena Datos de Paciente
            'patients.identification AS Identificación de Paciente',
            'billing_pad.total_value AS Total Facturado',
            'services_briefcase.value AS Valor Procediemiento',
            'if(authorization.quantity = !null, authorization.quantity, 1) AS Cantidad',
            // 'if (authorization.quantity, !null, authorization.quantity, 1) AS Cantidad',
            'manual_price.name AS Procedimiento',
            DB::raw('CONCAT_WS("-", bpp2.name, bp3.consecutive) AS Nota Crédito'), // Concatena Datos de Crédito
        )
            // ->leftJoin('auth_billing_pad', 'auth_billing_pad.billing_pad_id', 'billing_pad.id')
            ->leftJoin('billing_pad', 'billing_pad.id', 'auth_billing_pad.billing_pad_id')
            ->leftJoin('billing_pad AS bp2', 'bp2.billing_credit_note_id', 'billing_pad.id')
            ->leftJoin('billing_pad AS bp3', 'bp3.id', 'billing_pad.billing_credit_note_id')
            ->leftJoin('billing_pad_prefix', 'bp3.billing_pad_prefix_id', 'billing_pad_prefix.id')
            ->leftJoin('billing_pad_prefix AS bpp2', 'billing_pad.billing_pad_prefix_id', 'bpp2.id')
            ->leftJoin('campus', 'campus.billing_pad_prefix_id', 'billing_pad_prefix.id')
            ->leftJoin('authorization', 'authorization.id', 'auth_billing_pad.authorization_id')
            ->leftJoin('admissions', 'admissions.id', 'authorization.admissions_id')
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'authorization.services_briefcase_id')
            ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('identification_type', 'identification_type.id', 'patients.identification_type_id')
            ->whereBetween('auth_billing_pad.created_at', [$request->initial_report, $request->final_report])
            ->where('billing_pad.billing_pad_status_id', 4)
            ->whereNotNull('campus.id')
            ->groupBy('billing_pad.id')
            ->orderBy('billing_pad.id', 'ASC')
            ->get()->toArray();

        $response = [
            'facturacion' => $hoja1,
            'anulacion' => $hoja2,
        ];

        return response()->json([
            'status' => true,
            'message' => 'Reporte Glosas solicitado exitosamente',
            'data' => ['report_gloss' => $response]
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
        $Reports = ReportGloss::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Reporte encontrado exitosamente',
            'data' => ['report_gloss' => $Reports]
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
        $Reports = ReportGloss::find($id);
        $Reports->initial_report = $request->initial_report;
        $Reports->final_report = $request->final_report;
        $Reports->pharmacy_product_request_id = $request->pharmacy_product_request_id;
        $Reports->billing_id = $request->billing_id;
        $Reports->gloss_id = $request->gloss_id;
        $Reports->status = $request->status;
        $Reports->user_id = $request->user_id;
        $Reports->save();

        return response()->json([
            'status' => true,
            'message' => 'Reporte actualizado exitosamente',
            'data' => ['report_gloss' => $Reports]
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
            $Reports = ReportGloss::find($id);
            $Reports->delete();

            return response()->json([
                'status' => true,
                'message' => 'Reporte eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Reporte en uso, imposible eliminarlo'
            ], 423);
        }
    }
}
