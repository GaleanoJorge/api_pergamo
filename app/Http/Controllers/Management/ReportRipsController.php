<?php

namespace App\Http\Controllers\Management;

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
            'message' => 'Reporte Rips exitosamente',
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
        //--US
        $hoja1 = BillingPad::select(
            'identification_type.code AS Tipo de Identifiación del Usuario en el Sistema',
            'patients.identification AS Número de Identifiación del Usuario en el Sistema',
            'company.administrator AS Código Entidad Administradora', //Codigo Entidad Administradora
            'type_briefcase.name AS Tipo de Usuario', // validar info para arreglar json
            'patients.lastname AS Primer Apellido del Usuario',
            'patients.middlelastname AS Segundo Apellido del Usuario',
            'patients.firstname AS Primer Nombre del Usuario',
            'patients.middlefirstname AS Segundo Nombre del Usuario',
            'patients.age AS Edad',
            //Unidad de medida de la Edad  /la data que llegue a traer // 1 años //2 meses //3 dias
            'gender.name AS Sexo',
            'region.code AS Código del departamento de residencia habitual',
            'municipality.id AS Código de municipios de residencia habitual',
            'residence.name AS Zona de residencia habitual',
        )
            ->leftJoin('auth_billing_pad', 'auth_billing_pad.billing_pad_id', 'billing_pad.id')
            ->leftJoin('authorization', 'authorization.id', 'auth_billing_pad.authorization_id')
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
            ->where('company.id', $id)
            ->where('billing_pad.billing_pad_status_id', 2)
            ->whereBetween('billing_pad.validation_date', [$request->initial_report, $request->final_report])
            ->groupBy('patients.id')
            ->get()->toArray();
        $hoja1 = $this->TypeUser($hoja1);
        $hoja1 = $this->TypeSex($hoja1);
        $hoja1 = $this->TypeZone($hoja1);
        

        //--AC
        $hoja2 = BillingPad::select(
            DB::raw('CONCAT_WS("-",billing_pad_prefix.name,admissions.consecutive) AS factura'),
            'campus.enable_code AS Codigo del prestador salud',
            'identification_type.code AS Identificacion del Usuario',
            'patients.identification AS Numero de identificacion del usuario en el sistema',
            'assigned_management_plan.execution_date AS Fecha de la consulta',
            'authorization.auth_number AS Numero de Autorizacion',
            'procedure.code AS Codigo de consulta',
            'procedure.name AS Finalidad de la consulta', //el motivo validar campos con excel 1-2-3-4-5-6-7-8-9 finalidad de la consulta
            'ch_external_cause.name AS Causa externa', //Causa externa
            'diagnosis.code AS Codigo del Diagnostico principal', //Codigo del Diagnostico principal  CIE10
            //Codigo del diagnostico relacionado N° 1
            //Codigo del diagnostico relacionado N° 2
            //Codigo del diagnostico relacionado N° 3
            //Tipo de diagnostico principal
            'services_briefcase.value AS Valor de la consulta', //Valor de la consulta
            //'0 AS Valor de la cuota moderadora', //Valor de la consulta
            'services_briefcase.value AS Valor Neto a pagar', //Valor Neto a pagar
        )
            ->leftJoin('auth_billing_pad', 'auth_billing_pad.billing_pad_id', 'billing_pad.id')
            ->leftJoin('authorization', 'authorization.id', 'auth_billing_pad.authorization_id')
            ->leftJoin('assigned_management_plan', 'assigned_management_plan.id', 'authorization.assigned_management_plan_id')
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'authorization.services_briefcase_id')
            ->leftJoin('billing_pad_prefix', 'billing_pad_prefix.id', 'billing_pad.billing_pad_prefix_id')
            ->leftJoin('admissions', 'admissions.id', 'billing_pad.admissions_id')
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('campus', 'campus.id', 'admissions.campus_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('diagnosis', 'diagnosis.id', 'admissions.diagnosis_id')
            ->leftJoin('procedure', 'procedure.id', 'admissions.procedure_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')
            ->leftJoin('identification_type', 'identification_type.id', 'patients.identification_type_id')
            ->leftJoin('ch_record', 'ch_record.admissions_id', 'admissions.id')
            ->leftJoin('ch_reason_consultation', 'ch_reason_consultation.ch_record_id', 'ch_record.id')
            ->leftJoin('ch_external_cause', 'ch_external_cause.id', 'ch_reason_consultation.ch_external_cause_id')
            ->where('company.id', $id)
            ->where('billing_pad.billing_pad_status_id', 2)
            ->whereBetween('billing_pad.validation_date', [$request->initial_report, $request->final_report])
            ->groupBy('patients.id')
            ->get()->toArray();
        $hoja2 = $this->ExternalCause($hoja2);

        //--AP
        $hoja3 = BillingPad::select(
            DB::raw('CONCAT_WS("-",billing_pad_prefix.name,admissions.consecutive) AS factura'),
            'campus.enable_code AS Codigo del prestador salud', // Codigo del prestador de servicios de salud
            'identification_type.code AS Tipo de Identificacion del Usuario',
            'patients.identification AS Numero de identificacion del usuario en el sistema',
            'assigned_management_plan.execution_date AS Fecha del procedimiento', //Fecha del procedimiento
            'authorization.auth_number AS Numero de Autorizacion',          //Numero de Autorizacion
            'procedure.code AS Codigo del procedimiento', //Codigo del procedimiento
            'admission_route.name AS Ambito de realizacion del procedimiento', //Ambito de realizacion del procedimiento
            'type_of_attention.name AS Finalidad del procedimiento', //Causa externa
            //Personal que atiende
            'diagnosis.code AS Diagnostico principal', //Diagnostico principal
            // 'diagnosis.code AS Codigo del diagnostico relacionado', //Codigo del diagnostico relacionado
            //nada    //Codigo del diagnostico de la Complicacion
            //nada   //Forma de realizacion del acto quirurgico
            'manual_price.value AS Valor del Procedimiento', //Valor del Procedimiento
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
            ->leftJoin('procedure', 'procedure.id', 'admissions.procedure_id')
            ->leftJoin('location', 'location.admissions_id', 'admissions.id')
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'authorization.services_briefcase_id')
            ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')
            ->leftJoin('ch_reason_consultation', 'ch_reason_consultation.ch_record_id', 'ch_record.id')
            ->leftJoin('ch_external_cause', 'ch_external_cause.id', 'ch_reason_consultation.ch_external_cause_id')
            ->leftJoin('identification_type', 'identification_type.id', 'patients.identification_type_id')
            ->leftJoin('admission_route', 'admission_route.id', 'location.admission_route_id')
            ->leftJoin('gender', 'gender.id', 'patients.gender_id')
            ->where('company.id', $id)
            ->where('billing_pad.billing_pad_status_id', 2)
            ->whereBetween('billing_pad.validation_date', [$request->initial_report, $request->final_report])
            ->groupBy('patients.id')
            ->get()->toArray();
        $hoja3 = $this->Ambit($hoja3);

        //--AT
        $hoja4 = BillingPad::select(
            DB::raw('CONCAT_WS("-",billing_pad_prefix.name,admissions.consecutive) AS factura'),
            'campus.enable_code AS Codigo del prestador salud', // Codigo del prestador de servicios de salud
            'identification_type.code AS Tipo de Identificacion del Usuario',
            'patients.identification AS Numero de identificacion del usuario en el sistema',
            'authorization.auth_number AS Numero de Autorizacion',          //Numero de Autorizacion
            // '1 AS Tipo de servicio '
            //Codigo del servicio
            //Nombre del servicio
            //Cantidad 
            //Valor unitario del material e insumo
            //Valor total del material e insumo
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
            ->where('company.id', $id)
            ->where('billing_pad.billing_pad_status_id', 2)
            ->whereBetween('billing_pad.validation_date', [$request->initial_report, $request->final_report])
            ->groupBy('patients.id')
            ->get()->toArray();

        //--AM
        $hoja5 = BillingPad::select(
            DB::raw('CONCAT_WS("-",billing_pad_prefix.name,admissions.consecutive) AS factura'),
            'identification_type.code AS Tipo de Identificacion del Usuario',
            'patients.identification AS Numero de identificacion del usuario en el sistema',
            'authorization.auth_number AS Numero de Autorizacion',          //Numero de Autorizacion
            //DB::raw('CONCAT_WS("-",product.code_cum_file,product.code_cum_consecutive) AS Codigo del medicamento'),
            'pbs_type.name as Tipo de medicamento',
            'nom_product.name as Nombre genérico del medicamento',
            'product_presentation.name as Forma farmaceutica',
            'product_concentration.value as Concentracion',
            'measurement_units.name as Unidad de medida del medicamento',
            'management_plan.quantity as Numero de unidades',
            'manual_price.value as Valor unitario del medicamento',
            'manual_price.value as Valor total del medicamento'
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
            ->where('company.id', $id)
            ->where('billing_pad.billing_pad_status_id', 2)
            ->whereBetween('billing_pad.validation_date', [$request->initial_report, $request->final_report])
            ->groupBy('patients.id')
            ->get()->toArray();

        //--AH
        $hoja6 = BillingPad::select(
            DB::raw('CONCAT_WS("-",billing_pad_prefix.name,admissions.consecutive) AS factura'),
            'campus.enable_code AS Codigo del prestador de salud',
            'identification_type.code AS Tipo de Identificacion del Usuario',
            'patients.identification AS Numero de identificacion del usuario en el sistema',
            //'3 AS Via de ingreso a la institucion',
            'admissions.entry_date AS Fecha de ingreso del usuario a la institucion',
            'admissions.entry_date AS Hora de ingreso del usuario a la institucion',
            'authorization.auth_number AS Numero de Autorizacion', //Numero de Autorizacion
            'ch_external_cause.name AS Causa externa',
            'diagnosis.code AS Diagnostico prinicipal de ingreso',
            //'exit_diagnosis.name as Diagnostico principal de egreso ',
            //'relations_diagnosis.code as Codigo del diagnostico relacionado N° 1',
            //Codigo del diagnostico relacionado N° 2
            //Codigo del diagnostico relacionado N° 3
            //Diagnostico de la complicacion 
            'ch_patient_exit.exit_status as Estado a la salida',
            //'death_diagnosis.name as Diagnostico de la causa básica de muerte',
            'admissions.discharge_date AS Fecha de egreso del usuario a la institucion',
            'admissions.discharge_date AS Hora de egreso del usuario a la institucion',
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
            ->where('company.id', $id)
            ->where('billing_pad.billing_pad_status_id', 2)
            ->whereBetween('billing_pad.validation_date', [$request->initial_report, $request->final_report])
            ->groupBy('patients.id')
            ->get()->toArray();

        //--AF
        $hoja7 = BillingPad::select(
            'campus.enable_code AS Codigo del prestador salud',
            // 'HEALTH LIFE IPS   AS      Razon Social o Apellidos y nombres del prestador',
            // 'NI                AS      Tipo de Identificacion',
            // '900900122         AS      Numero de Identificacion',
            'billing_pad_prefix.name AS factura',
            'billing_pad.created_at AS Fecha de expedicion de la factura',
            'assigned_management_plan.start_date AS Fecha de Inicio',
            'assigned_management_plan.start_date AS Fecha final',
            //  'company.administrador AS Codigo entidad Administradora',
            //  'company.name AS Nombre entidad administradora',
            //Numero del Contrato
            //Plan de Beneficios
            //Numero de la poliza
            //Valor total del pago compartido COPAGO
            //Valor de la comision
            //Valor total de Descuentos
            //Valor Neto a Pagar por la entidad Contratante
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
            ->where('company.id', $id)
            ->where('billing_pad.billing_pad_status_id', 2)
            ->whereBetween('billing_pad.validation_date', [$request->initial_report, $request->final_report])
            ->groupBy('patients.id')
            ->get()->toArray();

        //--CT
        $hoja8 = BillingPad::select(
            'campus.enable_code AS Codigo del prestador de salud',
            // Fecha de remision
            // Codigo del archivo
            // Total de Registros
        )
            ->leftJoin('auth_billing_pad', 'auth_billing_pad.billing_pad_id', 'billing_pad.id')
            ->leftJoin('billing_pad_prefix', 'billing_pad_prefix.id', 'billing_pad.billing_pad_prefix_id')
            ->leftJoin('admissions', 'admissions.id', 'billing_pad.admissions_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('gender', 'gender.id', 'patients.gender_id')
            ->leftJoin('campus', 'campus.id', 'admissions.campus_id')
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')


            ->where('company.id', $id)
            ->where('billing_pad.billing_pad_status_id', 2)
            ->whereBetween('billing_pad.validation_date', [$request->initial_report, $request->final_report])
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

        return response()->json([
            'status' => true,
            'message' => 'Reporte Rips solicitado exitosamente',
            'data' => ['report_rips' => $response]
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
            "Evento catrastrofico" => "6",
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
            "Intramural" => "1",
            "Domiciliario" => "2"
        ];
        foreach ($arr as $ele) {
            $ele['Ambito de realizacion del procedimiento'] = $codes[$ele['Ambito de realizacion del procedimiento']];
            $aux[$i]['Ambito de realizacion del procedimiento'] = $ele['Ambito de realizacion del procedimiento'];
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
            $ele['Zona de residencia habitual'] = $codes[$ele['Zona de residencia habitual']];
            $aux[$i]['Zona de residencia habitual'] = $ele['Zona de residencia habitual'];
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
                'message' => 'Reporte Rips en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
