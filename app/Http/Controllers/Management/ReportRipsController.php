<?php

namespace App\Http\Controllers\Management;

use App\Models\AuthBillingPad;
use App\Models\ReportRips;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BillingPad;
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
        $RipsUnico = DB::table('auth_billing_pad')
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

        //!--US - Archivo de Usuarios
        $hoja1 = AuthBillingPad::select(
            'identification_type.code AS Tipo de Identificación',
            DB::raw('CAST(patients.identification AS INT) AS "Identificación del Usuario"'),
            'company.administrator AS Código de Entidad Administradora',
            DB::raw('CAST(type_briefcase.name AS INT) AS "Tipo de Usuario"'),
            'patients.lastname AS Primer Apellido',
            'patients.middlelastname AS Segundo Apellido',
            'patients.firstname AS Primer Nombre',
            'patients.middlefirstname AS Segundo Nombre',
            DB::raw('IF((DATEDIFF(NOW(), patients.birthday) / 365.25) >= 1, FLOOR(DATEDIFF(NOW(), patients.birthday) / 365.25), if((DATEDIFF(NOW(), patients.birthday) / 30) >= 1, FLOOR(DATEDIFF(NOW(), patients.birthday) / 30), FLOOR(DATEDIFF(NOW(), patients.birthday)))) AS Edad'),
            DB::raw('IF((DATEDIFF(NOW(), patients.birthday)/365.25) >= 1, 1, IF((DATEDIFF(NOW(), patients.birthday)/30) >= 1, 2, 3)) AS "Unidad de Medida de Edad"'),
            'gender.name AS Sexo',
            'region.code AS Código del Departamento Residencial',
            'municipality.id AS Código del Municipio Residencial',
            'residence.name AS Zona de Residecial Habitual',
        )
            ->leftJoin('authorization', 'authorization.id', 'auth_billing_pad.authorization_id')
            ->leftJoin('billing_pad', 'billing_pad.id', 'auth_billing_pad.billing_pad_id')
            ->leftJoin('admissions', 'admissions.id', 'billing_pad.admissions_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')
            ->leftJoin('identification_type', 'identification_type.id', 'patients.identification_type_id')
            ->leftJoin('type_briefcase', 'type_briefcase.id', 'admissions.regime_id')
            ->leftJoin('gender', 'gender.id', 'patients.gender_id')
            ->leftJoin('region', 'region.id', 'patients.residence_region_id')
            ->leftJoin('municipality', 'municipality.id', 'patients.residence_municipality_id')
            ->leftJoin('residence', 'residence.id', 'patients.residence_id')
            ->whereBetween('billing_pad.validation_date', [$request->initial_report, $request->final_report])
            ->where('company.id', $request->id)
            // ->where('billing_pad.billing_pad_status_id', 2)
            ->groupBy('patients.id')
            ->get()->toArray();
        // $hoja1 = $this->TypeUser($hoja1);
        // $hoja1 = $this->TypeSex($hoja1);
        // $hoja1 = $this->TypeZone($hoja1);

        //!--AC - Archivo de Consulta
        $hoja2 = AuthBillingPad::select(
            DB::raw('CONCAT_WS("-", billing_pad_prefix.name, billing_pad.consecutive) AS "Número de Factura"'),
            'campus.enable_code AS Código del Prestador de Servicios',
            'identification_type.code AS Tipo de Identificación',
            'patients.identification AS Identificación del Usuario',
            'assigned_management_plan.execution_date AS Fecha de Consulta',
            'authorization.auth_number AS Número de Autorización',
            'procedure.code AS Código de Consulta',
            'procedure.name AS Finalidad de Consulta',
            //el motivo validar campos con excel 1-2-3-4-5-6-7-8-9 finalidad de la consulta
            'ch_external_cause.id AS Causa externa',
            'diagnosis.code AS Código del Diagnóstico Principal', //Codigo del Diagnostico principal  CIE10
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Código del Diagnóstico Relacionado N°1"'), //? Falta Consulta
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Código del Diagnóstico Relacionado N°2"'), //? Falta Consulta
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Código del Diagnóstico Relacionado N°3"'), //? Falta Consulta
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Tipo de Diagnóstico Principal"'),
            //? Falta Consulta
            'services_briefcase.value AS Valor de Consulta',
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Valor de Cuota Moderadora"'),
            //? Falta Consulta
            'services_briefcase.value AS Valor Neto',
        )
            ->leftJoin('billing_pad', 'billing_pad.id', 'auth_billing_pad.billing_pad_id')
            ->leftJoin('authorization', 'authorization.id', 'auth_billing_pad.authorization_id')
            ->leftJoin('assigned_management_plan', 'assigned_management_plan.id', 'authorization.assigned_management_plan_id')
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'authorization.services_briefcase_id')
            ->leftJoin('billing_pad_prefix', 'billing_pad_prefix.id', 'billing_pad.billing_pad_prefix_id')
            ->leftJoin('admissions', 'admissions.id', 'billing_pad.admissions_id')
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('campus', 'campus.id', 'admissions.campus_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('diagnosis', 'diagnosis.id', 'admissions.diagnosis_id')
            ->leftJoin('location', 'location.admissions_id', 'admissions.id')
            ->leftJoin('services_briefcase AS SB', 'SB.id', 'location.procedure_id')
            ->leftJoin('manual_price AS MP', 'MP.id', 'SB.manual_price_id')
            ->leftJoin('procedure', 'procedure.id', 'MP.procedure_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')
            ->leftJoin('identification_type', 'identification_type.id', 'patients.identification_type_id')
            ->leftJoin('ch_record', 'ch_record.admissions_id', 'admissions.id')
            ->leftJoin('ch_reason_consultation', 'ch_reason_consultation.ch_record_id', 'ch_record.id')
            ->leftJoin('ch_external_cause', 'ch_external_cause.id', 'ch_reason_consultation.ch_external_cause_id')
            ->whereBetween('billing_pad.validation_date', [$request->initial_report, $request->final_report])
            ->where('company.id', $request->id)
            // ->where('billing_pad.billing_pad_status_id', 2)
            ->groupBy('patients.id')
            ->get()->toArray();
        //  $hoja2 = $this->ExternalCause($hoja2);
        // $hoja2 = $this->QueryPurpose($hoja2);

        //!--AP - Archivo de Procedimientos
        $hoja3 = BillingPad::select(
            DB::raw('CONCAT_WS("-", billing_pad_prefix.name, billing_pad.consecutive) AS "Número de Factura"'),
            'campus.enable_code AS Código del Prestador de Servicios',
            'identification_type.code AS Tipo de Identificación',
            'patients.identification AS Identificación del Usuario',
            'assigned_management_plan.execution_date AS Fecha del Procedimiento',
            'authorization.auth_number AS Número de Autorización',
            'procedure.code AS Código del Procedimiento',
            'admission_route.name AS Ámbito de Realización del Procedimiento',
            'type_of_attention.name AS Finalidad Procedimiento',
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Personal que Atiende"'),
            //? Falta Consulta
            'diagnosis.code AS Diagnóstico Principal',
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Código del Diagnóstico Relacionado"'), //? Falta Consulta
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Código del Diagnóstico de Complicación"'), //? Falta Consulta
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Forma de Realización del Acto Quirúrgico"'),
            //? Falta Consulta
            'services_briefcase.value AS Valor Procedimiento',
        )
            ->leftJoin('auth_billing_pad', 'auth_billing_pad.billing_pad_id', 'billing_pad.id')
            ->leftJoin('billing_pad_prefix', 'billing_pad_prefix.id', 'billing_pad.billing_pad_prefix_id')
            ->leftJoin('authorization', 'authorization.id', 'auth_billing_pad.authorization_id')
            ->leftJoin('assigned_management_plan', 'assigned_management_plan.id', 'authorization.assigned_management_plan_id')
            ->leftJoin('management_plan', 'management_plan.id', 'assigned_management_plan.management_plan_id')
            ->leftJoin('type_of_attention', 'type_of_attention.id', 'management_plan.type_of_attention_id')
            ->leftJoin('admissions', 'admissions.id', 'billing_pad.admissions_id')
            ->leftJoin('campus', 'campus.id', 'admissions.campus_id')
            ->leftJoin('ch_record', 'ch_record.admissions_id', 'admissions.id')
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('diagnosis', 'diagnosis.id', 'admissions.diagnosis_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('location', 'location.admissions_id', 'admissions.id')
            ->leftJoin('services_briefcase AS SB', 'SB.id', 'location.procedure_id')
            ->leftJoin('manual_price AS MP', 'MP.id', 'SB.manual_price_id')
            ->leftJoin('procedure', 'procedure.id', 'MP.procedure_id')
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'authorization.services_briefcase_id')
            ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')
            ->leftJoin('ch_reason_consultation', 'ch_reason_consultation.ch_record_id', 'ch_record.id')
            ->leftJoin('ch_external_cause', 'ch_external_cause.id', 'ch_reason_consultation.ch_external_cause_id')
            ->leftJoin('identification_type', 'identification_type.id', 'patients.identification_type_id')
            ->leftJoin('admission_route', 'admission_route.id', 'location.admission_route_id')
            ->leftJoin('gender', 'gender.id', 'patients.gender_id')
            ->whereBetween('billing_pad.validation_date', [$request->initial_report, $request->final_report])
            ->where('company.id', $request->id)
            // ->where('billing_pad.billing_pad_status_id', 2)
            ->groupBy('patients.id')
            ->get()->toArray();
        $hoja3 = $this->Ambit($hoja3);

        //!--AT - Archivo de Otros Servicios
        $hoja4 = BillingPad::select(
            DB::raw('CONCAT_WS("-", billing_pad_prefix.name, billing_pad.consecutive) AS "Número de Factura"'),
            'campus.enable_code AS Código del Prestador de Servicios',
            'identification_type.code AS Tipo de Identificación',
            'patients.identification AS Identificación del Usuario',
            'authorization.auth_number AS Número de Autorización',
            //? Campos por Consultar
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Tipo de Servicio"'),
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Código del Servicio"'),
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Nombre del Servicio"'),
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Cantidad"'),
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Valor Unitario del Insumo"'),
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Valor Total del Insumo"'),
        )
            ->leftJoin('auth_billing_pad', 'auth_billing_pad.billing_pad_id', 'billing_pad.id')
            ->leftJoin('billing_pad_prefix', 'billing_pad_prefix.id', 'billing_pad.billing_pad_prefix_id')
            ->leftJoin('admissions', 'admissions.id', 'billing_pad.admissions_id')
            ->leftJoin('campus', 'campus.id', 'admissions.campus_id')
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')
            ->leftJoin('authorization', 'authorization.id', 'auth_billing_pad.authorization_id')
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'authorization.services_briefcase_id')
            ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
            ->leftJoin('identification_type', 'identification_type.id', 'patients.identification_type_id')
            ->whereBetween('billing_pad.validation_date', [$request->initial_report, $request->final_report])
            ->where('company.id', $request->id)
            // ->where('billing_pad.billing_pad_status_id', 2)
            ->groupBy('patients.id')
            ->get()->toArray();

        //!--AM - Archivo de Medicamentos
        $hoja5 = BillingPad::select(
            DB::raw('CONCAT_WS("-", billing_pad_prefix.name, billing_pad.consecutive) AS "Número de Factura"'),
            'identification_type.code AS Tipo de Identificación',
            'patients.identification AS Identificación del Usuario',
            'authorization.auth_number AS Número de Autorización',
            DB::raw('CONCAT_WS("-", product.code_cum_file, product.code_cum_consecutive) AS "Código del Medicamento"'),
            'pbs_type.name AS Tipo de Medicamento',
            'nom_product.name AS Nombre Genérico',
            'product_presentation.name AS Forma Farmacéutica',
            'product_concentration.value AS Concentración',
            'measurement_units.name AS Unidad de Medida',
            'management_plan.quantity AS Unidades',
            'manual_price.value AS Valor Unitario',
            'manual_price.value AS Valor Total'
        )
            ->leftJoin('auth_billing_pad', 'auth_billing_pad.billing_pad_id', 'billing_pad.id')
            ->leftJoin('billing_pad_prefix', 'billing_pad_prefix.id', 'billing_pad.billing_pad_prefix_id')
            ->leftJoin('authorization', 'authorization.id', 'auth_billing_pad.authorization_id')
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'authorization.services_briefcase_id')
            ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
            ->leftJoin('product', 'product.id', 'authorization.product_com_id')
            ->leftJoin('assigned_management_plan', 'assigned_management_plan.id', 'authorization.assigned_management_plan_id')
            ->leftJoin('management_plan', 'management_plan.id', 'assigned_management_plan.management_plan_id')
            ->leftJoin('product_generic', 'product_generic.id', 'product.product_generic_id')
            ->leftJoin('pbs_type', 'pbs_type.id', 'product_generic.pbs_type_id')
            ->leftJoin('nom_product', 'nom_product.id', 'product_generic.nom_product_id')
            ->leftJoin('product_presentation', 'product_presentation.id', 'product_generic.product_presentation_id')
            ->leftJoin('product_concentration', 'product_concentration.id', 'product_generic.drug_concentration_id')
            ->leftJoin('measurement_units', 'measurement_units.id', 'product_generic.measurement_units_id')
            ->leftJoin('admissions', 'admissions.id', 'billing_pad.admissions_id')
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')
            ->leftJoin('identification_type', 'identification_type.id', 'patients.identification_type_id')
            ->whereBetween('billing_pad.validation_date', [$request->initial_report, $request->final_report])
            ->where('company.id', $request->id)
            // ->where('billing_pad.billing_pad_status_id', 2)
            ->groupBy('patients.id')
            ->get()->toArray();

        //!--AH - Archivo Hospitalario
        $hoja6 = BillingPad::select(
            DB::raw('CONCAT_WS("-", billing_pad_prefix.name, billing_pad.consecutive) AS "Número de Factura"'),
            'campus.enable_code AS Código del Prestador de Servicios',
            'identification_type.code AS Tipo de Identificación',
            'patients.identification AS Identificación de Usuario',
            DB::raw('IF(billing_pad.id > 0, 3, 0) AS "Vía de Ingreso a la Institución"'),
            'admissions.entry_date AS Fecha de Ingreso',
            'admissions.entry_date AS Hora de Ingreso',
            'authorization.auth_number AS Número de Autorización',
            'ch_external_cause.name AS Causa externa',
            'diagnosis.code AS Diagnóstico Prinicipal de Ingreso',
            //? Campos por Consultar
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Diagnóstico Principal de Egreso"'),
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Código del Diagnóstico Relacionado N° 1"'),
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Código del Diagnóstico Relacionado N° 2"'),
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Código del Diagnóstico Relacionado N° 3"'),
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Diagnóstico de Complicación"'),
            DB::raw('IF(ch_patient_exit.exit_status > 0, 1, "Medio Vivo") AS "Estado de Salida"'),
            DB::raw('if(billing_pad.id > 0, NULL, 0) AS "Diagnóstico de Causa Básica de Muerte"'),
            'admissions.discharge_date AS Fecha de Egreso',
            'admissions.discharge_date AS Hora de Egreso',
        )
            ->leftJoin('auth_billing_pad', 'auth_billing_pad.billing_pad_id', 'billing_pad.id')
            ->leftJoin('billing_pad_prefix', 'billing_pad_prefix.id', 'billing_pad.billing_pad_prefix_id')
            ->leftJoin('admissions', 'admissions.id', 'billing_pad.admissions_id')
            ->leftJoin('authorization', 'authorization.id', 'auth_billing_pad.authorization_id')
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('ch_record', 'ch_record.admissions_id', 'admissions.id')
            ->leftJoin('campus', 'campus.id', 'admissions.campus_id')
            ->leftJoin('diagnosis', 'diagnosis.id', 'admissions.diagnosis_id')
            // $ch_patient_exit =  DB::table('ch_patient_exit')
            // ->join('exit_diagnosis', 'ch_patient_exit.id', '=', 'exit_diagnosis.diagnosis_id')
            // ->join('relations_diagnosis', 'ch_patient_exit.id', '=', 'relations_diagnosis.diagnosis_id')
            // ->join('death_diagnosis', 'ch_patient_exit.id', '=', 'death_diagnosis.diagnosis_id')
            // ->select('ch_patient_exit.*', 'exit_diagnosis.name', 'relations_diagnosis.name', 'death_diagnosis.name')->get()
            ->leftJoin('ch_patient_exit', 'ch_patient_exit.ch_record_id', 'ch_record.id')
            //->leftJoin('diagnosis', 'diagnosis.id', 'ch_patient_exit.exit_diagnosis_id')
            //->leftJoin('diagnosis', 'diagnosis.id', 'ch_patient_exit.relations_diagnosis_id')
            //->leftJoin('diagnosis', 'diagnosis.id', 'ch_patient_exit.death_diagnosis_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')
            ->leftJoin('ch_reason_consultation', 'ch_reason_consultation.ch_record_id', 'ch_record.id')
            ->leftJoin('ch_external_cause', 'ch_external_cause.id', 'ch_reason_consultation.ch_external_cause_id')
            ->leftJoin('identification_type', 'identification_type.id', 'patients.identification_type_id')
            ->whereBetween('billing_pad.validation_date', [$request->initial_report, $request->final_report])
            ->where('company.id', $request->id)
            // ->where('billing_pad.billing_pad_status_id', 2)
            ->groupBy('patients.id')
            ->get()->toArray();
        // $hoja6 = $this->ExternalCause($hoja6);

        //!--AF - Archivo de Transacciones
        $hoja7 = BillingPad::select(
            'campus.enable_code AS Código del Prestador de Servicios',
            DB::raw('IF(billing_pad.id > 0, "HEALTH & LIFE IPS", 0) AS "Razón Social o Nombre del Prestador"'),
            DB::raw('IF(billing_pad.id > 0, "NIT", 0) AS "Tipo de Identificación"'),
            DB::raw('IF(billing_pad.id > 0, "900900122", 0) AS "Número de Identificación"'),
            DB::raw('CONCAT_WS("-", billing_pad_prefix.name, billing_pad.consecutive) AS "Número de Factura"'),
            'billing_pad.created_at AS Fecha de Expedición Factura',
            'assigned_management_plan.start_date AS Fecha Inicio',
            'assigned_management_plan.start_date AS Fecha Final',
            'company.administrator AS Código de Entidad Administradora',
            'company.name AS Nombre Entidad Administradora',
            //? Campos por Consultar
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Número de Contrato"'),
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Plan de Beneficios"'),
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Número de Póliza"'),
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Valor Total del COPAGO"'),
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Valor de Comisión"'),
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Valor Total de Descuentos"'),
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Valor Neto para Entidad Contratante"'),
        )
            ->leftJoin('auth_billing_pad', 'auth_billing_pad.billing_pad_id', 'billing_pad.id')
            ->leftJoin('billing_pad_prefix', 'billing_pad_prefix.id', 'billing_pad.billing_pad_prefix_id')
            ->leftJoin('authorization', 'authorization.id', 'auth_billing_pad.authorization_id')
            ->leftJoin('assigned_management_plan', 'assigned_management_plan.id', 'authorization.assigned_management_plan_id')
            ->leftJoin('admissions', 'admissions.id', 'billing_pad.admissions_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('campus', 'campus.id', 'admissions.campus_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')
            ->whereBetween('billing_pad.validation_date', [$request->initial_report, $request->final_report])
            ->where('company.id', $request->id)
            // ->where('billing_pad.billing_pad_status_id', 2)
            ->groupBy('patients.id')
            ->get()->toArray();

        //!--CT - Archivo de Control
        $hoja8 = BillingPad::select(
            'campus.enable_code AS Código del Prestador de Servicios',
            //? Campos por Consultar
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Fecha de Remisión"'),
            DB::raw('IF(billing_pad.id > 0, NULL, 0) AS "Código del Archivo"'),
            DB::raw('count(billing_pad.id) AS "Total de Registros"'),
        )
            ->leftJoin('auth_billing_pad', 'auth_billing_pad.billing_pad_id', 'billing_pad.id')
            ->leftJoin('billing_pad_prefix', 'billing_pad_prefix.id', 'billing_pad.billing_pad_prefix_id')
            ->leftJoin('admissions', 'admissions.id', 'billing_pad.admissions_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('gender', 'gender.id', 'patients.gender_id')
            ->leftJoin('campus', 'campus.id', 'admissions.campus_id')
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')
            ->whereBetween('billing_pad.validation_date', [$request->initial_report, $request->final_report])
            ->where('company.id', $request->id)
            // ->where('billing_pad.billing_pad_status_id', 2)
            ->groupBy('patients.id')
            ->get()->toArray();

        // $hoja8 = response($hoja8);

        $response = [
            'h1' => $hoja1,
            'h2' => $hoja2,
            'h3' => $hoja3,
            'h4' => $hoja4,
            'h5' => $hoja5,
            'h6' => $hoja6,
            'h7' => $hoja7,
            'h8' => $hoja8,
        ];
        $unico = [
            'rips' => $RipsUnico,
        ];

        return response()->json([
            'status' => true,
            'message' => 'Reporte Rips solicitado exitosamente',
            'data' => ['report_rips' => $unico],
        ]);
    }
    public function TypeUser(array $arr)
    {
        $aux = $arr;
        $i = 0;
        $codes = [
            "Contributivo cotizante" => "1",
            "Contributivo beneficiario" => "1",
            "Contributivo adicional" => "1",
            "Subsidiado" => "2",
            "Sin régimen" => "5",
            "Especiales o de Excepción cotizante" => "5",
            "Especiales o de Excepción beneficiario" => "5",
            "Particular" => "5",
            "Tomador/Amparado ARL" => "5",
            "Tomador/Amparado SOAT" => "5",
            "Tomador/Amparado Planes voluntarios de salud" => "5",
        ];
        foreach ($arr as $ele) {
            $ele['Tipo de Usuario'] = $codes[$ele['Tipo de Usuario']];
            $aux[$i]['Tipo de Usuario'] = $ele['Tipo de Usuario'];
            $i++;
        }
        return $aux;
    }
    public function ExternalCause(array $arr)
    {
        $aux = $arr;
        $i = 0;
        $codes = [
            "Accidente de trabajo" => "1",
            "Accidente de transito" => "2",
            "Accidente rabico" => "3",
            "Accidente ofidico" => "4",
            "Otro tipo de accidente" => "5",
            "Evento catastrofico" => "6",
            "Lesion por agresion" => "7",
            "Lesion autoinfligida" => "8",
            "Sospecha por matrato fisico" => "9",
            "Sospecha de abuso sexual" => "10",
            "Sospecha de violencia sexual" => "11",
            "Sospecha de maltrato emocional" => "12",
            "Enfermedad general" => "13",
            "Enfermedad profesional" => "14",
            "otra" => "15"
        ];
        foreach ($arr as $ele) {
            $ele['Causa externa'] = $codes[$ele['Causa externa']];
            $aux[$i]['Causa externa'] = $ele['Causa externa'];
            $i++;
        }

        return $aux;
    }
    public function QueryPurpose(array $arr)
    {
        $aux = $arr;
        $i = 0;
        $codes = [
            "Atención del parto(Atención del embarazo y del postparto)" => "1",
            "Atención Recién Nacido" => "2",
            "Atención Planificación familiar" => "3",
            "Detección alteraciones de crecimiento y desarrollo en menor de 10 años" => "4",
            "Detección de alteración del desarrollo joven" => "5",
            "Detección de alteraciones del embarazo" => "6",
            "Detección de alteraciones del adulto" => "7",
            "Detección de alteracions de agudeza visual" => "8",
            "Detección de Enfermedad Profesional" => "9",
            "No Aplica" => "10",
        ];
        foreach ($arr as $ele) {
            $ele['Finalidad de Consulta'] = $codes[$ele['Finalidad de Consulta']];
            $aux[$i]['Finalidad de Consulta'] = $ele['Finalidad de Consulta'];
            $i++;
        }
        return $aux;
    }
    public function TypeSex(array $arr)
    {
        $aux = $arr;
        $i = 0;
        $codes = [
            "Femenino" => "F",
            "Masculino" => "M",
            "Ambos" => "A",
            "Otro" => "O",
        ];
        foreach ($arr as $ele) {
            $ele['Sexo'] = $codes[$ele['Sexo']];
            $aux[$i]['Sexo'] = $ele['Sexo'];
            $i++;
        }
        return $aux;
    }
    public function Ambit(array $arr)
    {
        $aux = $arr;
        $i = 0;
        $codes = [
            "Hospitalario" => "1",
            "Domiciliario" => "2"
        ];
        foreach ($arr as $ele) {
            $ele['Ámbito de Realización del Procedimiento'] = $codes[$ele['Ámbito de Realización del Procedimiento']];
            $aux[$i]['Ámbito de Realización del Procedimiento'] = $ele['Ámbito de Realización del Procedimiento'];
            $i++;
        }
        return $aux;
    }
    public function TypeZone(array $arr)
    {
        $aux = $arr;
        $i = 0;
        $codes = [
            "RURAL" => "R",
            "URBANA" => "U",
            "RURAL DISPERSA" => "R",
            "URBANA DISPERSA" => "U",
        ];
        foreach ($arr as $ele) {
            $ele['Zona de Residecial Habitual'] = $codes[$ele['Zona de Residecial Habitual']];
            $aux[$i]['Zona de Residecial Habitual'] = $ele['Zona de Residecial Habitual'];
            $i++;
        }
        return $aux;
    }
    public function getAge(array $arr)
    {
        $aux = $arr;
        $i = 0;
        foreach ($arr as $ele) {
            $ele['real_age'] = 15;
            $aux[$i]['real_age'] = $ele['real_age'];
            $i++;
        }
        return $aux;
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