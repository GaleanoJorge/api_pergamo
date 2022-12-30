<?php

namespace App\Http\Controllers\Management;

use App\Models\Base\ReportBilling;
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
        $Reports = ReportBilling::select();

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
            'data' => ['report_billing' => $Reports]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $Reports = new ReportBilling;
        $Reports->initial_report = $request->initial_report;
        $Reports->final_report = $request->final_report;
        $Reports->billing_id = $request->billing_id;
        $Reports->status = $request->status;
        $Reports->user_id = $request->user_id;
        $Reports->save();

        return response()->json([
            'status' => true,
            'message' => 'Reporte Creado exitosamente',
            'data' => ['report_billing' => $Reports->toArray()]
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
        //--Facturación
        $hoja1 = BillingPad::select(
            DB::raw('CONCAT_WS("-", billing_pad_prefix.name, billing_pad.consecutive) AS Factura - Consecutivo'), // Concatena Datos de Factura - Consecutivo
            'billing_pad.facturation_date AS Fecha de Facturación',
            'identification_type.name AS Tipo de Documento',
            DB::raw('CONCAT_WS(" ", patients.firstname, patients.middlefirstname, patients.lastname, patients.middlelastname) AS Paciente'), // Concatena Datos de Paciente
            'patients.identification AS Identificación de Paciente',
            'billing_pad.total_value AS Total Facturado'
        )
            ->leftJoin('billing_pad', 'billing_pad.id', 'auth_billing_pad.billing_id')
            ->leftJoin('billing_pad AS bp2 ', 'bp2.billing_credit_note_id', 'billing_pad.id')
            ->leftJoin('billing_pad_prefix', 'billing_pad.billing_pad_prefix_id', 'billing_pad_prefix.id')
            ->leftJoin('campus', 'campus.billing_pad_prefix_id', 'billing_pad_prefix.id')
            ->leftJoin('authorization', 'authorization.id', 'auth_billing_pad.authorization_id')
            ->leftJoin('admissions', 'admissions.id', 'authorization.admissions_id')
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'authorization.services_briefcase_id')
            ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('identification_type', 'identification_type.id', 'patients.identification_type_id')
            ->whereBetween('auth_billing_pad.created_at', [$request->initial_report, $request->final_report])
            ->where('billing_pad.billing_pad_status_id', 2)
            ->whereNull('bp2.id')
            ->whereNotNull('campus.id')
            ->groupBy('billing_pad.id')
            ->orderBy('patients.id', 'ASC')
            ->get()->toArray();
        // --Nota Credito
        $hoja2 = BillingPad::select(
            DB::raw('CONCAT_WS("-", billing_pad_prefix.name, billing_pad.consecutive) AS Factura - Consecutivo'), // Concatena Datos de Factura - Consecutivo
            'billing_pad.facturation_date AS Fecha de Facturación',
            'identification_type.name AS Tipo de Documento',
            DB::raw('CONCAT_WS(" ", patients.firstname, patients.middlefirstname, patients.lastname, patients.middlelastname) AS Paciente'), // Concatena Datos de Paciente
            'patients.identification AS Identificación de Paciente',
            'billing_pad.total_value AS Total Facturado',
            'services_briefcase.value AS Valor Procedimiento',
            'if(authorization.quantity = !null, authorization.quantity, 1) AS Cantidad',
            'manual_price.name AS Procedimiento'
        )
            // ->leftJoin('auth_billing_pad', 'auth_billing_pad.billing_id', 'billing_pad.id')
            ->leftJoin('billing_pad', 'billing_pad.id', 'auth_billing_pad.billing_id')
            ->leftJoin('billing_pad AS bp2', 'bp2.billing_credit_note_id', 'billing_pad.id')
            ->leftJoin('billing_pad_prefix', 'billing_pad.billing_pad_prefix_id', 'billing_pad_prefix.id')
            ->leftJoin('campus', 'campus.billing_pad_prefix_id', 'billing_pad_prefix.id')
            ->leftJoin('authorization', 'authorization.id', 'auth_billing_pad.authorization_id')
            ->leftJoin('admissions', 'admissions.id', 'authorization.admissions_id')
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'authorization.services_briefcase_id')
            ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('identification_type', 'identification_type.id', 'patients.identification_type_id')
            ->whereBetween('auth_billing_pad.created_at', [$request->initial_report, $request->final_report])
            ->where('billing_pad.billing_pad_status_id', 2)
            ->whereNotNull('campus.id')
            ->groupBy('patients.id')
            ->orderBy('billing_pad.id', 'ASC')
            ->get()->toArray();
            //--Anulación
        $hoja3 = BillingPad::select(
            'billing_pad_prefix.name AS Prefijo de Factura',
            'billing_pad.consecutive AS Consecutivo de Factura',
            'billing_pad.facturation_date AS Fecha de Facturación',
            'identification_type.name AS Tipo de Documento',
            DB::raw('CONCAT_WS(" ", patients.firstname, patients.middlefirstname, patients.lastname, patients.middlelastname) AS Paciente'), // Concatena Datos de Paciente
            'patients.identification AS Identificación de Paciente',
            'billing_pad.total_value AS Total Facturado',
            'services_briefcase.value AS Valor procedimiento',
            'if(authorization.quantity = !null, authorization.quantity, 1) AS Cantidad',
            'manual_price.name AS Procedimiento',
            DB::raw('CONCAT_WS("-", bpp2.name, bp3.consecutive) AS Nota Crédito'), // Concatena Datos de Factura - Consecutivo
        )
            // ->leftJoin('auth_billing_pad', 'auth_billing_pad.billing_id', 'billing_pad.id')
            ->leftJoin('billing_pad', 'billing_pad.id', 'auth_billing_pad.billing_id')
            ->leftJoin('billing_pad AS bp2', 'bp2.billing_credit_note_id', 'billing_pad.id')
            ->leftJoin('billing_pad AS bp3', 'bp3.id', 'billing_pad.billing_credit_note_id')
            ->leftJoin('billing_pad_prefix', 'billing_pad.billing_pad_prefix_id', 'billing_pad_prefix.id')
            ->leftJoin('billing_pad_prefix AS bpp2', 'bp3.billing_pad_prefix_id', 'bpp2.id')
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
            'nota_credito' => $hoja2,
            'anulacion' => $hoja3,
        ];

        return response()->json([
            'status' => true,
            'message' => 'Reporte Facturación solicitado exitosamente',
            'data' => ['reports_billing' => $response]
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
        $Reports = ReportBilling::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Reporte encontrado exitosamente',
            'data' => ['reports_billing' => $Reports]
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
        $Reports = ReportBilling::find($id);
        $Reports->initial_report = $request->initial_report;
        $Reports->final_report = $request->final_report;
        $Reports->billing_id = $request->billing_id;
        $Reports->status = $request->status;
        $Reports->user_id = $request->user_id;
        $Reports->save();

        return response()->json([
            'status' => true,
            'message' => 'Reporte actualizado exitosamente',
            'data' => ['report_billing' => $Reports]
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
            $Reports = ReportBilling::find($id);
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
