<?php

namespace App\Http\Controllers\Management;

use App\Models\ReportRips;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ReportRipsController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ReportRips = ReportRips::select();

        if ($request->_sort) {
            $ReportRips->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ReportRips->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ReportRips = $ReportRips->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);
            $ReportRips = $ReportRips->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Reporte Rips Exitoso',
            'data' => ['report_rips' => $ReportRips]
        ]);
    }
    public function store(Request $request): JsonResponse
    {
        $ReportRips = new ReportRips;
        $ReportRips->initial_report = $request->initial_report;
        $ReportRips->final_report = $request->final_report;
        $ReportRips->company_id = $request->company_id;
        $ReportRips->user_id = $request->user_id;
        $ReportRips->save();

        return response()->json([
            'status' => true,
            'message' => 'Creado Reporte Rips exitosamente',
            'data' => ['report_rips' => $ReportRips->toArray()]
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function exportRips(Request $request, int $id): JsonResponse
    {
        //! Rips Simplificado
        $SimplifiedRips = DB::table('auth_billing_pad')
            ->select(
                'auth_billing_pad.id AS ID',
                DB::raw('CONCAT_WS("-", billing_pad_prefix.name, billing_pad.consecutive) AS Factura'),
                DB::raw('CAST(billing_pad.facturation_date AS DATE) AS Fecha_Factura'),
                DB::raw('assigned_management_plan.start_date AS Fecha_Servicio'),
                'identification_type.code AS Tipo_Documento',
                'patients.identification AS Documento',
                DB::raw('IF(type_briefcase.name = "Subsidiado", 2, 1) AS Regimen'),
                'patients.lastname AS 1er_Apellido',
                'patients.middlelastname AS 2do_Apellido',
                'patients.firstname AS 1er_Nombre',
                'patients.middlefirstname AS 2do_Nombre',
                DB::raw('IF((DATEDIFF(NOW(), patients.birthday) / 365.25) >= 1, FLOOR(DATEDIFF(NOW(), patients.birthday) / 365.25), if((DATEDIFF(NOW(), patients.birthday) / 30) >= 1, FLOOR(DATEDIFF(NOW(), patients.birthday) / 30), FLOOR(DATEDIFF(NOW(), patients.birthday)))) AS Edad'),
                DB::raw('IF((DATEDIFF(NOW(), patients.birthday) / 365.25) >= 1, 1, IF((DATEDIFF(NOW(), patients.birthday) / 30) >= 1, 2, 3)) AS "Unidad de Medida de Edad"'),
                DB::raw('IF(gender.name = "Masculino", "M", "F") AS Genero'),
                'region.code AS Departamento',
                'municipality.sga_origin_fk AS Municipio',
                DB::raw('IF(residence.name = "URBANA", "U", IF(residence.name = "URBANA DISPERSA", "UD", IF(residence.name = "RURAL DISPERSA", "RD", IF(residence.name = "RURAL", "R", NULL)))) AS Zona_Residencial'),
                DB::raw('IF(ISNULL(product.code_cum), manual_price.own_code, product.code_cum) AS Cums_Cups'),
                'manual_price.name AS Procedimiento',
                'authorization.id AS Autorizacion_ID',
                'services_briefcase.id AS Paquete_ID',
                // 'diagnosis.name AS Diagnostico',
                DB::raw('SUM(IF(ISNULL(authorization.quantity), 1, authorization.quantity)) AS Cantidad'),
                'services_briefcase.value AS Valor_Unitario',
                'authorization.copay_value AS COPAGO',
                DB::raw('SUM(IF(ISNULL(authorization.quantity), 1, authorization.quantity)) * manual_price.value AS Total'),
                'company.name AS EPS',
                'company.administrator AS Cod_EPS'
            )
            ->leftJoin('authorization', 'authorization.id', 'auth_billing_pad.authorization_id')
            ->leftJoin('assigned_management_plan', 'assigned_management_plan.id', 'authorization.assigned_management_plan_id')
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'authorization.services_briefcase_id')
            ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
            ->leftJoin('admissions', 'admissions.id', 'authorization.admissions_id')
            ->leftJoin('type_briefcase', 'type_briefcase.id', 'admissions.regime_id')
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('diagnosis', 'diagnosis.id', 'admissions.diagnosis_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('region', 'region.id', '=', 'patients.residence_region_id')
            ->leftJoin('municipality', 'municipality.id', 'patients.residence_municipality_id')
            ->leftJoin('residence', 'residence.id', 'patients.residence_id')
            ->leftJoin('gender', 'gender.id', '=', 'patients.gender_id')
            ->leftJoin('identification_type', 'identification_type.id', 'patients.identification_type_id')
            ->leftJoin('billing_pad', 'billing_pad.id', 'auth_billing_pad.billing_pad_id')
            ->leftJoin('billing_pad AS bp', 'bp.billing_credit_note_id', 'billing_pad.id')
            ->leftJoin('billing_pad_prefix', 'billing_pad_prefix.id', 'billing_pad.billing_pad_prefix_id')
            ->leftJoin('product', 'product.id', 'authorization.product_com_id')
            ->leftJoin('campus', 'campus.billing_pad_prefix_id', 'billing_pad_prefix.id')
            ->where('billing_pad.billing_pad_status_id', 2)
            // ->where('billing_pad.facturation_date', '>=', '2023-01-00 00:00:00')
            ->whereBetween('billing_pad.facturation_date', [$request->initial_report, $request->final_report])
            ->where('company.id', $request->company_id)
            ->whereNull('bp.id')
            ->whereNotNull('campus.id')
            ->groupBy('product.code_cum', 'billing_pad.consecutive', 'manual_price.id')
            ->orderBy('patients.identification', 'ASC')
            ->get()->toArray();

        // $unico = [
        //     'rips' => $RipsUnico,
        // ];

        return response()->json([
            'status' => true,
            'message' => 'Reporte Rips solicitado exitosamente',
            // 'data' => ['report_rips' => $unico],
            'data' => $SimplifiedRips,
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
        $ReportRips = ReportRips::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Reporte Rips exitosamente',
            'data' => ['report_rips' => $ReportRips]
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
        $ReportRips = ReportRips::find($id);
        $ReportRips->initial_report = $request->initial_report;
        $ReportRips->final_report = $request->final_report;
        $ReportRips->company_id = $request->company_id;
        $ReportRips->user_id = $request->user_id;
        $ReportRips->save();

        return response()->json([
            'status' => true,
            'message' => 'Reporte Rips actualizado exitosamente',
            'data' => ['report_rips' => $ReportRips]
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
            $ReportRips = ReportRips::find($id);
            $ReportRips->delete();

            return response()->json([
                'status' => true,
                'message' => 'Reporte Rips eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Reporte Rips en uso, imposible eliminarlo'
            ], 423);
        }
    }
}