<?php

namespace App\Http\Controllers\Management;

use App\Models\BillingPad;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BillingPadRequest;
use App\Models\Admissions;
use App\Models\AuthBillingPad;
use App\Models\Authorization;
use App\Models\BillingPadLog;
use App\Models\BillingPadPgp;
use App\Models\Company;
use App\Models\Contract;
use App\Models\ProcedurePackage;
use App\Actions\Transform\NumerosEnLetras;
use App\Models\BillingPadConsecutive;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use stdClass;

class BillingPadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $BillingPad = BillingPad::select()
            ->with(
                'billing_pad_consecutive',
                'billing_pad_prefix',
                'billing_pad_status',
                'admissions',
                'billing_pad_pgp',
                'admissions',
                'admissions.patients',
            );

        if ($request->_sort) {
            $BillingPad->orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $BillingPad->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->id) {
            $BillingPad->where('id', $request->id);
        }

        if ($request->admission_id) {
            if ($request->admission_id != 0) {
                $BillingPad->where('admissions_id', $request->admission_id);
            }
        }

        if ($request->descendente) {
            $BillingPad->orderBy('id', 'desc');
        }

        if ($request->billing_pad_status_id) {
            $BillingPad->where('billing_pad_status_id', $request->billing_pad_status_id);
        }

        if ($request->query("pagination", true) == "false") {
            $BillingPad = $BillingPad->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $BillingPad = $BillingPad->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'facturas obtenidas exitosamente',
            'data' => ['billing_pad' => $BillingPad]
        ]);
    }

    public function store(BillingPadRequest $request): JsonResponse
    {
        $BillingPad = new BillingPad;
        $BillingPad->total_value = $request->total_value;
        $BillingPad->validation_date = $request->validation_date;
        $BillingPad->billing_pad_status_id = $request->billing_pad_status_id;
        $BillingPad->admissions_id = $request->admissions_id;
        $BillingPad->billing_pad_pgp_id = $request->billing_pad_pgp_id;
        $BillingPad->save();

        return response()->json([
            'status' => true,
            'message' => 'facturas creadas exitosamente',
            'data' => ['billing_pad' => $BillingPad]
        ]);
    }

    public function newBillingPad(Request $request): JsonResponse
    {
        $BillingPad = new BillingPad;
        $BillingPad->total_value = 0;
        $BillingPad->validation_date = Carbon::now();
        $BillingPad->billing_pad_status_id = 1;
        $BillingPad->admissions_id = $request->admissions_id;
        $BillingPad->billing_pad_pgp_id = null;
        $BillingPad->save();

        return response()->json([
            'status' => true,
            'message' => 'factura creadas exitosamente',
            'data' => ['billing_pad' => $BillingPad]
        ]);
    }

    /**
     * Get pgp contacts.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function getPgpContracts(Request $request, int $id): JsonResponse
    {
        $Contract = Contract::select()
            ->with('type_contract', 'company')
            ->where('type_contract_id', $id);

        if ($request->query("pagination", true) == "false") {
            $Contract = $Contract->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $Contract = $Contract->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'facturas obtenidas exitosamente',
            'data' => ['billing_pad' => $Contract]
        ]);
    }

    /**
     * Get pgp billings.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function getPgpBillings(Request $request, int $id): JsonResponse
    {
        $BillingPadPgp = BillingPadPgp::select()
            ->with('contract', 'billing_pad_status')
            ->where('contract_id', $id);

        if ($request->query("pagination", true) == "false") {
            $BillingPadPgp = $BillingPadPgp->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $BillingPadPgp = $BillingPadPgp->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'facturas obtenidas exitosamente',
            'data' => ['billing_pad' => $BillingPadPgp]
        ]);
    }

    /**
     * Generate Pgp billing.
     *
     * @param  int  $contract_id
     * @return JsonResponse
     */
    public function generatePgpBilling(Request $request, int $contract_id): JsonResponse
    {
        // $firstDateLastMonth = Carbon::now()->startOfMonth()->subMonth();
        // $lastDateLastMonth = Carbon::now()->endOfMonth()->subMonth();
        $firstDateLastMonth = Carbon::now()->startOfMonth();
        $lastDateLastMonth = Carbon::now()->endOfMonth();

        $checkBillingPgp = BillingPadPgp::where('contract_id', $contract_id)
            ->whereBetween('validation_date', [$firstDateLastMonth, $lastDateLastMonth])
            ->first();

        if ($checkBillingPgp) {
            return response()->json([
                'status' => false,
                'message' => 'Ya existe una factura para este contrato en el mes requerido',
                'data' => []
            ]);
        }

        $Contract = Contract::find($contract_id);

        $BillingPadPgp = new BillingPadPgp;
        $BillingPadPgp->total_value = $Contract->amount;
        $BillingPadPgp->contract_id = $contract_id;
        $BillingPadPgp->billing_pad_status_id = 1;
        $BillingPadPgp->validation_date = Carbon::now();
        $BillingPadPgp->save();

        $BillingsPad = BillingPad::select('billing_pad.*')
            ->leftJoin('admissions', 'admissions.id', 'billing_pad.admissions_id')
            ->whereBetween('billing_pad.validation_date', [$firstDateLastMonth, $lastDateLastMonth])
            ->where('admissions.contract_id', $contract_id)
            ->get()
            ->toArray();

        foreach ($BillingsPad as $element) {
            $BillingPad = BillingPad::where('id', $element['id'])->first();
            $BillingPad->billing_pad_pgp_id = $BillingPadPgp->id;
            $BillingPad->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'factura creada exitosamente',
            'data' => ['billing_pad' => $BillingPadPgp]
        ]);
    }

    /**
     * Get get enabled admissions with their EPS
     * 
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function getEnabledAdmissions(Request $request, int $id): JsonResponse
    {
        $EnabledAdmissions =  Admissions::Leftjoin('patients', 'admissions.patient_id', 'patients.id')
            ->select(
                'admissions.*',
                DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')
            )
            ->with(
                'patients',
                'briefcase',
                'campus',
                'contract',
                'contract.company',
                'location',
                'location.admission_route',
                'location.scope_of_attention',
                'location.program',
            )
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('briefcase', 'briefcase.contract_id', 'contract.id')
            ->leftJoin('billing_pad', 'billing_pad.admissions_id', 'admissions.id')
            ->groupBy('admissions.id');
        if ($request->pgp == "true") {
            $EnabledAdmissions->where('contract.type_contract_id', '=', 5);
            if ($request->billing_pad_pgp_id) {
                $EnabledAdmissions->where('billing_pad.billing_pad_pgp_id', $request->billing_pad_pgp_id);
            } else {
                $EnabledAdmissions->where('admissions.discharge_date', '0000-00-00 00:00:00');
            }
        } else {
            $EnabledAdmissions->where('contract.type_contract_id', '<>', 5);
            if ($request->briefcase_id) {
                $EnabledAdmissions->where('briefcase.id', $request->briefcase_id);
            }
            $EnabledAdmissions->where('admissions.discharge_date', '0000-00-00 00:00:00');
        }
        $EnabledAdmissions->orderBy('admissions.created_at', 'desc');

        if ($request->_sort) {
            $EnabledAdmissions->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $EnabledAdmissions->where(function ($query) use ($request) {
                $query->where('patients.firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.middlelastname', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.identification', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $EnabledAdmissions = $EnabledAdmissions->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $EnabledAdmissions = $EnabledAdmissions->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'admisiones obtenidas exitosamente',
            'data' => ['billing_pad' => $EnabledAdmissions]
        ]);
    }

    /**
     * Get athorized procedures by admission and month
     * 
     * @param Request $request
     * @param int $admission_id
     * @return JsonResponse
     */
    public function getAuthorizedProcedures(Request $request, int $admission_id): JsonResponse
    {
        if ($request->billing_id) {
            $billing_id = $request->billing_id;
            $BillingPad = BillingPad::where('id', $billing_id)->get()->first();
        } else if ($request->billing_pad_pgp_id) {
            $billing_pad_pgp = BillingPadPgp::where('id', $request->billing_pad_pgp_id)->get()->first();
            $BillingPad = BillingPad::where('billing_pad_pgp_id', $request->billing_pad_pgp_id)
                ->where('admissions_id', $admission_id)
                ->whereBetween('validation_date', [Carbon::parse($billing_pad_pgp->validation_date)->startOfMonth(), Carbon::createFromFormat('Y-m-d', $billing_pad_pgp->validation_date)->endOfMonth()])
                ->get()->first();
        }

        // BÚSQUEDA DE AUTORIZACIONES QUE SEAN PROCEDIMIENTOS Y POR EVENTO (NO PAQUETIZADAS)
        $eventos = Authorization::select('authorization.*')
            ->with(
                'services_briefcase',
                'services_briefcase.manual_price',
                'services_briefcase.manual_price.procedure',
                'assigned_management_plan',
                'assigned_management_plan.management_plan',
                'assigned_management_plan.management_plan.service_briefcase',
                'assigned_management_plan.management_plan.procedure',
                'manual_price',
                'manual_price.procedure',
            )
            ->where('authorization.admissions_id', $admission_id)
            ->where('authorization.auth_status_id', 3)
            ->whereNull('authorization.supplies_com_id')
            ->whereNull('authorization.product_com_id')
            ->whereNull('authorization.application_id')
            ->whereNull('authorization.auth_package_id')
            ->whereNotNull('authorization.assigned_management_plan_id')
            ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
            ->where('assigned_management_plan.execution_date', '!=', '0000-00-00')
            ->whereBetween('assigned_management_plan.created_at', [Carbon::parse($BillingPad->validation_date)->startOfMonth(), Carbon::parse($BillingPad->validation_date)->endOfMonth()])
            ->get()->toArray();
        $Authorizations = []; // COSAS NO FACTURADAS
        $AlreadyBilling = []; // COSAS FACTURADAS
        foreach ($eventos as $Authorization) {
            $AuthBillingPad = AuthBillingPad::where('authorization_id', $Authorization['id'])->get()->first();
            if (!$AuthBillingPad) {
                array_push($Authorizations, $Authorization);
            } else {
                array_push($AlreadyBilling, $Authorization);
            }
        }




        // BÚSQUEDA DE AUTORIZACIONES QUE SEAN MEDICAMENTOS Y POR EVENTO (NO PAQUETIZADAS)
        $MedicamentosEventos = Authorization::select('authorization.*')
            ->with(
                'services_briefcase',
                'services_briefcase.manual_price',
                'services_briefcase.manual_price.procedure',
                'assigned_management_plan',
                'assigned_management_plan.management_plan',
                'assigned_management_plan.management_plan.service_briefcase',
                'assigned_management_plan.management_plan.procedure',
                'manual_price',
                'manual_price.procedure',
            )
            ->where('authorization.admissions_id', $admission_id)
            ->where('authorization.auth_status_id', 3)
            ->whereNull('authorization.auth_package_id')
            ->whereNull('authorization.supplies_com_id')
            ->whereNotNull('authorization.product_com_id')
            ->whereNotNull('authorization.application_id')
            ->whereNotNull('authorization.assigned_management_plan_id')
            ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
            ->where('assigned_management_plan.execution_date', '!=', '0000-00-00')
            ->whereBetween('assigned_management_plan.created_at', [Carbon::parse($BillingPad->validation_date)->startOfMonth(), Carbon::parse($BillingPad->validation_date)->endOfMonth()])
            ->get()->toArray();

        foreach ($MedicamentosEventos as $Authorization) {
            $AuthBillingPad = AuthBillingPad::where('authorization_id', $Authorization['id'])->get()->first();
            if (!$AuthBillingPad) {
                array_push($Authorizations, $Authorization);
            } else {
                array_push($AlreadyBilling, $Authorization);
            }
        }





        // BÚSQUEDA DE AUTORIZACIONES QUE SEAN INSUMOS Y POR EVENTO (NO PAQUETIZADAS)
        $InsumosEventos = Authorization::select('authorization.*')
            ->with(
                'services_briefcase',
                'services_briefcase.manual_price',
                'services_briefcase.manual_price.procedure',
                'assigned_management_plan',
                'assigned_management_plan.management_plan',
                'assigned_management_plan.management_plan.service_briefcase',
                'assigned_management_plan.management_plan.procedure',
                'manual_price',
                'manual_price.procedure',
            )
            ->where('authorization.admissions_id', $admission_id)
            ->where('authorization.auth_status_id', 3)
            ->whereNull('authorization.auth_package_id')
            ->whereNotNull('authorization.supplies_com_id')
            ->whereNull('authorization.product_com_id')
            ->whereNotNull('authorization.application_id')
            ->whereNotNull('authorization.assigned_management_plan_id')
            ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
            ->where('assigned_management_plan.execution_date', '!=', '0000-00-00')
            ->whereBetween('assigned_management_plan.created_at', [Carbon::parse($BillingPad->validation_date)->startOfMonth(), Carbon::parse($BillingPad->validation_date)->endOfMonth()])
            ->get()->toArray();

        foreach ($InsumosEventos as $Authorization) {
            $AuthBillingPad = AuthBillingPad::where('authorization_id', $Authorization['id'])->get()->first();
            if (!$AuthBillingPad) {
                array_push($Authorizations, $Authorization);
            } else {
                array_push($AlreadyBilling, $Authorization);
            }
        }






        // BÚSQUEDA DE AUTORIZACIONES POR PAQUETE
        $Authorizationspackages = Authorization::select('authorization.*')
            ->with(
                'services_briefcase',
                'services_briefcase.manual_price',
                'assigned_management_plan',
                'assigned_management_plan.management_plan',
                'assigned_management_plan.management_plan.service_briefcase',
                'assigned_management_plan.management_plan.procedure',
                'manual_price',
                'manual_price.procedure'
            )
            ->where('authorization.admissions_id', $admission_id)
            ->where('authorization.auth_status_id', 3)
            ->whereNull('authorization.auth_package_id')
            ->whereNull('authorization.supplies_com_id')
            ->whereNull('authorization.product_com_id')
            ->whereNull('authorization.application_id')
            ->whereNull('authorization.assigned_management_plan_id')
            ->leftJoin('services_briefcase', 'authorization.services_briefcase_id', 'services_briefcase.id')
            ->get()->toArray();

        // VALIDACIÓN SI LA FACTURA YA CUENTA CON PAQUETES
        $hasPackages = false;
        foreach ($Authorizationspackages as $Authorizationpackages) {
            $AuthBillingPad = AuthBillingPad::where('authorization_id', $Authorizationpackages['id'])->get()->first();
            if (!$AuthBillingPad) {
                $hasPackages = true;
            }
        }

        // VALIDACIÓN SI LOS PAQUETES ENCONTRADOS CUMPLAN CON LAS CONDICIONES DESCRITAS EN EL MANUAL TARIFARIO
        $result_packages = []; // VARIABLE QUE ALMACENA LOS PAQUETES RESULTANTES
        foreach ($Authorizationspackages as $Authorizationspackage) {
            $is_package = false;
            // procedimientos
            $AuthsPackedProc = Authorization::select(
                'authorization.*',
                'management_plan.procedure_id AS procedure_id',
                DB::raw('COUNT(authorization.services_briefcase_id) AS quantity')
            )
                ->with(
                    'services_briefcase',
                    'services_briefcase.manual_price',
                    'assigned_management_plan',
                    'assigned_management_plan.management_plan',
                    'assigned_management_plan.management_plan.service_briefcase',
                    'assigned_management_plan.management_plan.procedure',
                    'manual_price',
                    'manual_price.procedure'
                )
                ->where('authorization.admissions_id', $admission_id)
                ->where('authorization.auth_package_id', $Authorizationspackage['id'])
                ->whereNull('authorization.supplies_com_id')
                ->whereNull('authorization.product_com_id')
                ->whereNull('authorization.application_id')
                ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
                ->leftJoin('management_plan', 'assigned_management_plan.management_plan_id', 'management_plan.id')
                ->where('assigned_management_plan.execution_date', '!=', '0000-00-00')
                ->where('assigned_management_plan.created_at', '<=', Carbon::parse($BillingPad->validation_date)->endOfMonth())
                ->groupby('authorization.services_briefcase_id')
                ->get()->toArray();

            // medicamentos
            $AuthsPackedMed = Authorization::select(
                'authorization.*',
                'management_plan.procedure_id AS procedure_id',
                DB::raw('COUNT(authorization.services_briefcase_id) AS quantity')
            )
                ->with(
                    'services_briefcase',
                    'services_briefcase.manual_price',
                    'assigned_management_plan',
                    'assigned_management_plan.management_plan',
                    'assigned_management_plan.management_plan.service_briefcase',
                    'assigned_management_plan.management_plan.procedure',
                    'manual_price',
                    'manual_price.procedure'
                )
                ->where('authorization.admissions_id', $admission_id)
                ->where('authorization.auth_package_id', $Authorizationspackage['id'])
                ->whereNull('authorization.supplies_com_id')
                ->whereNotNull('authorization.product_com_id')
                ->whereNotNull('authorization.application_id')
                ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
                ->leftJoin('management_plan', 'assigned_management_plan.management_plan_id', 'management_plan.id')
                ->where('assigned_management_plan.execution_date', '!=', '0000-00-00')
                ->where('assigned_management_plan.created_at', '<=', Carbon::parse($BillingPad->validation_date)->endOfMonth())
                ->groupby('authorization.services_briefcase_id')
                ->get()->toArray();



            // medicamentos
            $AuthsPackedSupp = Authorization::select(
                'authorization.*',
                'management_plan.procedure_id AS procedure_id',
                DB::raw('COUNT(authorization.services_briefcase_id) AS quantity')
            )
                ->with(
                    'services_briefcase',
                    'services_briefcase.manual_price',
                    'assigned_management_plan',
                    'assigned_management_plan.management_plan',
                    'assigned_management_plan.management_plan.service_briefcase',
                    'assigned_management_plan.management_plan.procedure',
                    'manual_price',
                    'manual_price.procedure'
                )
                ->where('authorization.admissions_id', $admission_id)
                ->where('authorization.auth_package_id', $Authorizationspackage['id'])
                ->whereNotNull('authorization.supplies_com_id')
                ->whereNull('authorization.product_com_id')
                ->whereNotNull('authorization.application_id')
                ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
                ->leftJoin('management_plan', 'assigned_management_plan.management_plan_id', 'management_plan.id')
                ->where('assigned_management_plan.execution_date', '!=', '0000-00-00')
                ->where('assigned_management_plan.created_at', '<=', Carbon::parse($BillingPad->validation_date)->endOfMonth())
                ->groupby('authorization.services_briefcase_id')
                ->get()->toArray();

            // procdimientos
            $AuthsresponseProc = Authorization::select('authorization.*')
                ->with(
                    'services_briefcase',
                    'services_briefcase.manual_price',
                    'assigned_management_plan',
                    'assigned_management_plan.management_plan',
                    'assigned_management_plan.management_plan.service_briefcase',
                    'assigned_management_plan.management_plan.procedure',
                    'manual_price',
                    'manual_price.procedure'
                )
                ->where('authorization.admissions_id', $admission_id)
                ->where('authorization.auth_package_id', $Authorizationspackage['id'])
                ->whereNull('authorization.supplies_com_id')
                ->whereNull('authorization.product_com_id')
                ->whereNull('authorization.application_id')
                ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
                ->where('assigned_management_plan.execution_date', '!=', '0000-00-00')
                ->whereBetween('assigned_management_plan.created_at', [Carbon::parse($BillingPad->validation_date)->startOfMonth(), Carbon::parse($BillingPad->validation_date)->endOfMonth()])
                ->get()->toArray();

            // Medicamentos
            $AuthsresponseMed = Authorization::select('authorization.*')
                ->with(
                    'services_briefcase',
                    'services_briefcase.manual_price',
                    'assigned_management_plan',
                    'assigned_management_plan.management_plan',
                    'assigned_management_plan.management_plan.service_briefcase',
                    'assigned_management_plan.management_plan.procedure',
                    'manual_price',
                    'manual_price.procedure'
                )
                ->where('authorization.admissions_id', $admission_id)
                ->where('authorization.auth_package_id', $Authorizationspackage['id'])
                ->whereNull('authorization.supplies_com_id')
                ->whereNotNull('authorization.product_com_id')
                ->whereNotNull('authorization.application_id')
                ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
                ->where('assigned_management_plan.execution_date', '!=', '0000-00-00')
                ->whereBetween('assigned_management_plan.created_at', [Carbon::parse($BillingPad->validation_date)->startOfMonth(), Carbon::parse($BillingPad->validation_date)->endOfMonth()])
                ->get()->toArray();

            // Insumos
            $AuthsresponseSupp = Authorization::select('authorization.*')
                ->with(
                    'services_briefcase',
                    'services_briefcase.manual_price',
                    'assigned_management_plan',
                    'assigned_management_plan.management_plan',
                    'assigned_management_plan.management_plan.service_briefcase',
                    'assigned_management_plan.management_plan.procedure',
                    'manual_price',
                    'manual_price.procedure'
                )
                ->where('authorization.admissions_id', $admission_id)
                ->where('authorization.auth_package_id', $Authorizationspackage['id'])
                ->whereNotNull('authorization.supplies_com_id')
                ->whereNull('authorization.product_com_id')
                ->whereNotNull('authorization.application_id')
                ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
                ->where('assigned_management_plan.execution_date', '!=', '0000-00-00')
                ->whereBetween('assigned_management_plan.created_at', [Carbon::parse($BillingPad->validation_date)->startOfMonth(), Carbon::parse($BillingPad->validation_date)->endOfMonth()])
                ->get()->toArray();

            $Authorizationspackage['auth_package'] = [];
            // foreach ($AuthsresponseProc as $element) {
            //     array_push($Authsresponse, $element);
            // }
            // foreach ($AuthsresponseMed as $element) {
            //     array_push($Authsresponse, $element);
            // }
            // foreach ($AuthsresponseSupp as $element) {
            //     array_push($Authsresponse, $element);
            // }

            $AuthsPacked = [];
            foreach ($AuthsPackedProc as $element) {
                array_push($AuthsPacked, $element);
            }
            foreach ($AuthsPackedMed as $element) {
                array_push($AuthsPacked, $element);
            }
            foreach ($AuthsPackedSupp as $element) {
                array_push($AuthsPacked, $element);
            }

            $total_max = 0;
            $total_done = 0;
            foreach ($AuthsPacked as $AuthPacked) {
                $type_validator = 0;
                $ProcedurePackages = ProcedurePackage::select('procedure_package.*')
                    ->where('procedure_package.procedure_package_id', $Authorizationspackage['manual_price_id']);
                //
                //
                // el id de producto y el de insumo están permutados
                // corrección por parte de ivan
                //
                //


                if ($AuthPacked['product_com_id']) {
                    $ProcedurePackages->where('procedure_package.product_com_id', $AuthPacked['product_com_id']);
                    $type_validator = 1;
                } else if ($AuthPacked['supplies_com_id']) {
                    $ProcedurePackages->where('procedure_package.supplies_com_id', $AuthPacked['supplies_com_id']);
                    $type_validator = 2;
                } else if ($AuthPacked['procedure_id']) {
                    $ProcedurePackages->where('procedure_package.procedure_id', $AuthPacked['procedure_id']);
                    $type_validator = 3;
                }

                $ProcedurePackages = $ProcedurePackages->get()->toArray();
                if (count($ProcedurePackages) > 0) {

                    if (!$ProcedurePackages[0]['min_quantity']) {
                        $ProcedurePackages[0]['min_quantity'] = 1;
                    }
                    if (!$ProcedurePackages[0]['max_quantity']) {
                        $ProcedurePackages[0]['max_quantity'] = log(0);
                    }
                    if ($AuthPacked['quantity'] >= $ProcedurePackages[0]['min_quantity'] && $AuthPacked['quantity'] <= $ProcedurePackages[0]['max_quantity']) {
                        if ($ProcedurePackages[0]['dynamic_charge'] == 1) {
                            $total_max += $ProcedurePackages[0]['max_quantity'];
                            $total_done += $AuthPacked['quantity'];
                        }
                        if ($type_validator == 1) {
                            foreach ($AuthsresponseProc as $element) {
                                array_push($Authorizationspackage['auth_package'], $element);
                            }
                        } else if ($type_validator == 2) {
                            foreach ($AuthsresponseMed as $element) {
                                array_push($Authorizationspackage['auth_package'], $element);
                            }
                        } else if ($type_validator == 3) {
                            foreach ($AuthsresponseSupp as $element) {
                                array_push($Authorizationspackage['auth_package'], $element);
                            }
                        }
                    } else {
                        if ($type_validator == 1) {
                            foreach ($AuthsresponseProc as $element) {
                                array_push($result_packages, $element);
                            }
                        } else if ($type_validator == 2) {
                            foreach ($AuthsresponseMed as $element) {
                                array_push($result_packages, $element);
                            }
                        } else if ($type_validator == 3) {
                            foreach ($AuthsresponseSupp as $element) {
                                array_push($result_packages, $element);
                            }
                        }
                    }
                } else {
                    if ($type_validator == 1) {
                        foreach ($AuthsresponseProc as $element) {
                            array_push($result_packages, $element);
                        }
                    } else if ($type_validator == 2) {
                        foreach ($AuthsresponseMed as $element) {
                            array_push($result_packages, $element);
                        }
                    } else if ($type_validator == 3) {
                        foreach ($AuthsresponseSupp as $element) {
                            array_push($result_packages, $element);
                        }
                    }
                }
            }

            if (count($Authorizationspackage['auth_package']) > 0) {
                if ($total_max > 0) {
                    $Authorizationspackage['services_briefcase']['value'] = ($Authorizationspackage['services_briefcase']['value'] / $total_max) * $total_done;
                }
                array_push($result_packages, $Authorizationspackage);
            }
        }

        foreach ($result_packages as $result_package) {
            if ($hasPackages) {
                array_push($Authorizations, $result_package);
            } else {
                array_push($AlreadyBilling, $result_package);
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'procedimientos autorizados obtenidos exitosamente',
            'data' => [
                'billing_pad' => $Authorizations,
                'already_billing' => $AlreadyBilling,
            ]
        ]);
    }

    /**
     * Get all procedures by admission and month to view pre-billing
     * 
     * @param Request $request
     * @param int $admission_id
     * @return JsonResponse
     */
    public function getPreBillingProcedures(Request $request, int $admission_id): JsonResponse
    {
        if ($request->billing_id) {
            $billing_id = $request->billing_id;
            $BillingPad = BillingPad::where('id', $billing_id)->get()->first();
        } else if ($request->billing_pad_pgp_id) {
            $billing_pad_pgp = BillingPadPgp::where('id', $request->billing_pad_pgp_id)->get()->first();
            $BillingPad = BillingPad::where('billing_pad_pgp_id', $request->billing_pad_pgp_id)
                ->where('admissions_id', $admission_id)
                ->whereBetween('validation_date', [Carbon::parse($billing_pad_pgp->validation_date)->startOfMonth(), Carbon::parse($billing_pad_pgp->validation_date)->endOfMonth()])
                ->get()->first();
        }

        // BÚSQUEDA DE AUTORIZACIONES QUE SEAN PROCEDIMIENTOS Y POR EVENTO (NO PAQUETIZADAS)
        $eventos = Authorization::select('authorization.*')
            ->with(
                'services_briefcase',
                'services_briefcase.manual_price',
                'services_briefcase.manual_price.procedure',
                'assigned_management_plan',
                'assigned_management_plan.management_plan',
                'assigned_management_plan.management_plan.service_briefcase',
                'assigned_management_plan.management_plan.procedure',
                'manual_price',
                'manual_price.procedure',
            )
            ->where('authorization.admissions_id', $admission_id)
            // ->where('authorization.auth_status_id', 3)
            ->whereNull('authorization.supplies_com_id')
            ->whereNull('authorization.product_com_id')
            ->whereNull('authorization.application_id')
            ->whereNull('authorization.auth_package_id')
            ->whereNotNull('authorization.assigned_management_plan_id')
            ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
            // ->where('assigned_management_plan.execution_date', '!=', '0000-00-00')
            ->whereBetween('assigned_management_plan.created_at', [Carbon::parse($BillingPad->validation_date)->startOfMonth(), Carbon::parse($BillingPad->validation_date)->endOfMonth()])
            ->get()->toArray();
        $Authorizations = []; // COSAS NO FACTURADAS
        // $AlreadyBilling = []; // COSAS FACTURADAS
        foreach ($eventos as $Authorization) {
            array_push($Authorizations, $Authorization);
            // $AuthBillingPad = AuthBillingPad::where('authorization_id', $Authorization['id'])->get()->first();
            // if (!$AuthBillingPad) {
            //     array_push($Authorizations, $Authorization);
            // } else {
            //     array_push($AlreadyBilling, $Authorization);
            // }
        }







        // BÚSQUEDA DE AUTORIZACIONES QUE SEAN MEDICAMENTOS Y POR EVENTO (NO PAQUETIZADAS)
        $MedicamentosEventos = Authorization::select('authorization.*')
            ->with(
                'services_briefcase',
                'services_briefcase.manual_price',
                'services_briefcase.manual_price.procedure',
                'assigned_management_plan',
                'assigned_management_plan.management_plan',
                'assigned_management_plan.management_plan.service_briefcase',
                'assigned_management_plan.management_plan.procedure',
                'manual_price',
                'manual_price.procedure',
            )
            ->where('authorization.admissions_id', $admission_id)
            ->where('authorization.auth_status_id', 3)
            ->whereNull('authorization.auth_package_id')
            ->whereNull('authorization.supplies_com_id')
            ->whereNotNull('authorization.product_com_id')
            // ->whereNotNull('authorization.application_id')
            ->whereNotNull('authorization.assigned_management_plan_id')
            ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
            // ->where('assigned_management_plan.execution_date', '!=', '0000-00-00')
            ->whereBetween('assigned_management_plan.created_at', [Carbon::parse($BillingPad->validation_date)->startOfMonth(), Carbon::parse($BillingPad->validation_date)->endOfMonth()])
            ->get()->toArray();

        foreach ($MedicamentosEventos as $Authorization) {
            array_push($Authorizations, $Authorization);
            // $AuthBillingPad = AuthBillingPad::where('authorization_id', $Authorization['id'])->get()->first();
            // if (!$AuthBillingPad) {
            //     array_push($Authorizations, $Authorization);
            // } else {
            //     array_push($AlreadyBilling, $Authorization);
            // }
        }





        // BÚSQUEDA DE AUTORIZACIONES QUE SEAN INSUMOS Y POR EVENTO (NO PAQUETIZADAS)
        $InsumosEventos = Authorization::select('authorization.*')
            ->with(
                'services_briefcase',
                'services_briefcase.manual_price',
                'services_briefcase.manual_price.procedure',
                'assigned_management_plan',
                'assigned_management_plan.management_plan',
                'assigned_management_plan.management_plan.service_briefcase',
                'assigned_management_plan.management_plan.procedure',
                'manual_price',
                'manual_price.procedure',
            )
            ->where('authorization.admissions_id', $admission_id)
            ->where('authorization.auth_status_id', 3)
            ->whereNull('authorization.auth_package_id')
            ->whereNotNull('authorization.supplies_com_id')
            ->whereNull('authorization.product_com_id')
            // ->whereNotNull('authorization.application_id')
            ->whereNotNull('authorization.assigned_management_plan_id')
            ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
            // ->where('assigned_management_plan.execution_date', '!=', '0000-00-00')
            ->whereBetween('assigned_management_plan.created_at', [Carbon::parse($BillingPad->validation_date)->startOfMonth(), Carbon::parse($BillingPad->validation_date)->endOfMonth()])
            ->get()->toArray();

        foreach ($InsumosEventos as $Authorization) {
            array_push($Authorizations, $Authorization);
            // $AuthBillingPad = AuthBillingPad::where('authorization_id', $Authorization['id'])->get()->first();
            // if (!$AuthBillingPad) {
            //     array_push($Authorizations, $Authorization);
            // } else {
            //     array_push($AlreadyBilling, $Authorization);
            // }
        }






        // BÚSQUEDA DE AUTORIZACIONES POR PAQUETE
        $Authorizationspackages = Authorization::select('authorization.*')
            ->with(
                'services_briefcase',
                'services_briefcase.manual_price',
                'assigned_management_plan',
                'assigned_management_plan.management_plan',
                'assigned_management_plan.management_plan.service_briefcase',
                'assigned_management_plan.management_plan.procedure',
                'manual_price',
                'manual_price.procedure'
            )
            ->where('authorization.admissions_id', $admission_id)
            // ->where('authorization.auth_status_id', 3)
            ->whereNull('authorization.auth_package_id')
            ->whereNull('authorization.supplies_com_id')
            ->whereNull('authorization.product_com_id')
            ->whereNull('authorization.application_id')
            ->whereNull('authorization.assigned_management_plan_id')
            ->leftJoin('services_briefcase', 'authorization.services_briefcase_id', 'services_briefcase.id')
            ->get()->toArray();


        // VALIDACIÓN SI LA FACTURA YA CUENTA CON PAQUETES
        $hasPackages = false;
        foreach ($Authorizationspackages as $Authorizationpackages) {
            $AuthBillingPad = AuthBillingPad::where('authorization_id', $Authorizationpackages['id'])->get()->first();
            if (!$AuthBillingPad) {
                $hasPackages = true;
            }
        }

        // VALIDACIÓN SI LOS PAQUETES ENCONTRADOS CUMPLAN CON LAS CONDICIONES DESCRITAS EN EL MANUAL TARIFARIO
        $result_packages = []; // VARIABLE QUE ALMACENA LOS PAQUETES RESULTANTES
        foreach ($Authorizationspackages as $Authorizationspackage) {
            // procedimientos
            $AuthsPackedProc = Authorization::select(
                'authorization.*',
                'management_plan.procedure_id AS procedure_id',
                DB::raw('COUNT(authorization.services_briefcase_id) AS quantity')
            )
                ->with(
                    'services_briefcase',
                    'services_briefcase.manual_price',
                    'assigned_management_plan',
                    'assigned_management_plan.management_plan',
                    'assigned_management_plan.management_plan.service_briefcase',
                    'assigned_management_plan.management_plan.procedure',
                    'manual_price',
                    'manual_price.procedure'
                )
                ->where('authorization.admissions_id', $admission_id)
                ->where('authorization.auth_package_id', $Authorizationspackage['id'])
                ->whereNull('authorization.supplies_com_id')
                ->whereNull('authorization.product_com_id')
                ->whereNull('authorization.application_id')
                ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
                ->leftJoin('management_plan', 'assigned_management_plan.management_plan_id', 'management_plan.id')
                //  ->where('assigned_management_plan.execution_date', '!=', '0000-00-00')
                ->where('assigned_management_plan.created_at', '<=', Carbon::parse($BillingPad->validation_date)->endOfMonth())
                ->groupby('authorization.services_briefcase_id')
                ->get()->toArray();

            // medicamentos
            $AuthsPackedMed = Authorization::select(
                'authorization.*',
                'management_plan.procedure_id AS procedure_id',
                DB::raw('COUNT(authorization.services_briefcase_id) AS quantity')
            )
                ->with(
                    'services_briefcase',
                    'services_briefcase.manual_price',
                    'assigned_management_plan',
                    'assigned_management_plan.management_plan',
                    'assigned_management_plan.management_plan.service_briefcase',
                    'assigned_management_plan.management_plan.procedure',
                    'manual_price',
                    'manual_price.procedure'
                )
                ->where('authorization.admissions_id', $admission_id)
                ->where('authorization.auth_package_id', $Authorizationspackage['id'])
                ->whereNull('authorization.supplies_com_id')
                ->whereNotNull('authorization.product_com_id')
                //  ->whereNotNull('authorization.application_id')
                ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
                ->leftJoin('management_plan', 'assigned_management_plan.management_plan_id', 'management_plan.id')
                //  ->where('assigned_management_plan.execution_date', '!=', '0000-00-00')
                ->where('assigned_management_plan.created_at', '<=', Carbon::parse($BillingPad->validation_date)->endOfMonth())
                ->groupby('authorization.services_briefcase_id')
                ->get()->toArray();



            // medicamentos
            $AuthsPackedSupp = Authorization::select(
                'authorization.*',
                'management_plan.procedure_id AS procedure_id',
                DB::raw('COUNT(authorization.services_briefcase_id) AS quantity')
            )
                ->with(
                    'services_briefcase',
                    'services_briefcase.manual_price',
                    'assigned_management_plan',
                    'assigned_management_plan.management_plan',
                    'assigned_management_plan.management_plan.service_briefcase',
                    'assigned_management_plan.management_plan.procedure',
                    'manual_price',
                    'manual_price.procedure'
                )
                ->where('authorization.admissions_id', $admission_id)
                ->where('authorization.auth_package_id', $Authorizationspackage['id'])
                ->whereNotNull('authorization.supplies_com_id')
                ->whereNull('authorization.product_com_id')
                //  ->whereNotNull('authorization.application_id')
                ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
                ->leftJoin('management_plan', 'assigned_management_plan.management_plan_id', 'management_plan.id')
                //  ->where('assigned_management_plan.execution_date', '!=', '0000-00-00')
                ->where('assigned_management_plan.created_at', '<=', Carbon::parse($BillingPad->validation_date)->endOfMonth())
                ->groupby('authorization.services_briefcase_id')
                ->get()->toArray();



            // procdimientos
            $AuthsresponseProc = Authorization::select('authorization.*')
                ->with(
                    'services_briefcase',
                    'services_briefcase.manual_price',
                    'assigned_management_plan',
                    'assigned_management_plan.management_plan',
                    'assigned_management_plan.management_plan.service_briefcase',
                    'assigned_management_plan.management_plan.procedure',
                    'manual_price',
                    'manual_price.procedure'
                )
                ->where('authorization.admissions_id', $admission_id)
                ->where('authorization.auth_package_id', $Authorizationspackage['id'])
                ->whereNull('authorization.supplies_com_id')
                ->whereNull('authorization.product_com_id')
                ->whereNull('authorization.application_id')
                ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
                //  ->where('assigned_management_plan.execution_date', '!=', '0000-00-00')
                ->whereBetween('assigned_management_plan.created_at', [Carbon::parse($BillingPad->validation_date)->startOfMonth(), Carbon::parse($BillingPad->validation_date)->endOfMonth()])
                ->get()->toArray();

            // Medicamentos
            $AuthsresponseMed = Authorization::select('authorization.*')
                ->with(
                    'services_briefcase',
                    'services_briefcase.manual_price',
                    'assigned_management_plan',
                    'assigned_management_plan.management_plan',
                    'assigned_management_plan.management_plan.service_briefcase',
                    'assigned_management_plan.management_plan.procedure',
                    'manual_price',
                    'manual_price.procedure'
                )
                ->where('authorization.admissions_id', $admission_id)
                ->where('authorization.auth_package_id', $Authorizationspackage['id'])
                ->whereNull('authorization.supplies_com_id')
                ->whereNotNull('authorization.product_com_id')
                //  ->whereNotNull('authorization.application_id')
                ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
                //  ->where('assigned_management_plan.execution_date', '!=', '0000-00-00')
                ->whereBetween('assigned_management_plan.created_at', [Carbon::parse($BillingPad->validation_date)->startOfMonth(), Carbon::parse($BillingPad->validation_date)->endOfMonth()])
                ->get()->toArray();

            // Insumos
            $AuthsresponseSupp = Authorization::select('authorization.*')
                ->with(
                    'services_briefcase',
                    'services_briefcase.manual_price',
                    'assigned_management_plan',
                    'assigned_management_plan.management_plan',
                    'assigned_management_plan.management_plan.service_briefcase',
                    'assigned_management_plan.management_plan.procedure',
                    'manual_price',
                    'manual_price.procedure'
                )
                ->where('authorization.admissions_id', $admission_id)
                ->where('authorization.auth_package_id', $Authorizationspackage['id'])
                ->whereNotNull('authorization.supplies_com_id')
                ->whereNull('authorization.product_com_id')
                //  ->whereNotNull('authorization.application_id')
                ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
                //  ->where('assigned_management_plan.execution_date', '!=', '0000-00-00')
                ->whereBetween('assigned_management_plan.created_at', [Carbon::parse($BillingPad->validation_date)->startOfMonth(), Carbon::parse($BillingPad->validation_date)->endOfMonth()])
                ->get()->toArray();

            $Authorizationspackage['auth_package'] = [];
            // foreach ($AuthsresponseProc as $element) {
            //     array_push($Authsresponse, $element);
            // }
            // foreach ($AuthsresponseMed as $element) {
            //     array_push($Authsresponse, $element);
            // }
            // foreach ($AuthsresponseSupp as $element) {
            //     array_push($Authsresponse, $element);
            // }

            $AuthsPacked = [];
            foreach ($AuthsPackedProc as $element) {
                array_push($AuthsPacked, $element);
            }
            foreach ($AuthsPackedMed as $element) {
                array_push($AuthsPacked, $element);
            }
            foreach ($AuthsPackedSupp as $element) {
                array_push($AuthsPacked, $element);
            }

            $total_max = 0;
            $total_done = 0;
            foreach ($AuthsPacked as $AuthPacked) {
                $type_validator = 0;
                $ProcedurePackages = ProcedurePackage::select('procedure_package.*')
                    ->where('procedure_package.procedure_package_id', $Authorizationspackage['manual_price_id']);
                //
                //
                // el id de producto y el de insumo están permutados
                // corrección por parte de ivan
                //
                //


                if ($AuthPacked['product_com_id']) {
                    $ProcedurePackages->where('procedure_package.product_com_id', $AuthPacked['product_com_id']);
                    $type_validator = 1;
                } else if ($AuthPacked['supplies_com_id']) {
                    $ProcedurePackages->where('procedure_package.supplies_com_id', $AuthPacked['supplies_com_id']);
                    $type_validator = 2;
                } else if ($AuthPacked['procedure_id']) {
                    $ProcedurePackages->where('procedure_package.procedure_id', $AuthPacked['procedure_id']);
                    $type_validator = 3;
                }

                $ProcedurePackages = $ProcedurePackages->get()->toArray();
                if (count($ProcedurePackages) > 0) {

                    if (!$ProcedurePackages[0]['min_quantity']) {
                        $ProcedurePackages[0]['min_quantity'] = 1;
                    }
                    if (!$ProcedurePackages[0]['max_quantity']) {
                        $ProcedurePackages[0]['max_quantity'] = log(0);
                    }
                    if ($AuthPacked['quantity'] >= $ProcedurePackages[0]['min_quantity'] && $AuthPacked['quantity'] <= $ProcedurePackages[0]['max_quantity']) {
                        if ($ProcedurePackages[0]['dynamic_charge'] == 1) {
                            $total_max += $ProcedurePackages[0]['max_quantity'];
                            $total_done += $AuthPacked['quantity'];
                        }
                        if ($type_validator == 1) {
                            foreach ($AuthsresponseProc as $element) {
                                array_push($Authorizationspackage['auth_package'], $element);
                            }
                        } else if ($type_validator == 2) {
                            foreach ($AuthsresponseMed as $element) {
                                array_push($Authorizationspackage['auth_package'], $element);
                            }
                        } else if ($type_validator == 3) {
                            foreach ($AuthsresponseSupp as $element) {
                                array_push($Authorizationspackage['auth_package'], $element);
                            }
                        }
                    } else {
                        if ($type_validator == 1) {
                            foreach ($AuthsresponseProc as $element) {
                                array_push($result_packages, $element);
                            }
                        } else if ($type_validator == 2) {
                            foreach ($AuthsresponseMed as $element) {
                                array_push($result_packages, $element);
                            }
                        } else if ($type_validator == 3) {
                            foreach ($AuthsresponseSupp as $element) {
                                array_push($result_packages, $element);
                            }
                        }
                    }
                } else {
                    if ($type_validator == 1) {
                        foreach ($AuthsresponseProc as $element) {
                            array_push($result_packages, $element);
                        }
                    } else if ($type_validator == 2) {
                        foreach ($AuthsresponseMed as $element) {
                            array_push($result_packages, $element);
                        }
                    } else if ($type_validator == 3) {
                        foreach ($AuthsresponseSupp as $element) {
                            array_push($result_packages, $element);
                        }
                    }
                }
            }

            if (count($Authorizationspackage['auth_package']) > 0) {
                if ($total_max > 0) {
                    $Authorizationspackage['services_briefcase']['value'] = ($Authorizationspackage['services_briefcase']['value'] / $total_max) * $total_done;
                }
                array_push($result_packages, $Authorizationspackage);
            }
        }

        foreach ($result_packages as $result_package) {
            array_push($Authorizations, $result_package);
            // if ($hasPackages) {
            //     array_push($Authorizations, $result_package);
            // } else {
            //     array_push($AlreadyBilling, $result_package);
            // }
        }

        return response()->json([
            'status' => true,
            'message' => 'procedimientos autorizados obtenidos exitosamente',
            'data' => [
                'billing_pad' => $Authorizations,
                // 'already_billing' => $AlreadyBilling,
            ]
        ]);
    }

    /**
     * Get procedures grouped by auth_package_id
     * 
     * @param Request $request
     * @param int $auth_package_id
     * @return JsonResponse
     */
    public function getProceduresByAuthPackage(Request $request, int $auth_package_id): JsonResponse
    {
        if ($request->billing_id) {
            $billing_id = $request->billing_id;
            $BillingPad = BillingPad::where('id', $billing_id)->get()->first();
        }


        $Authorizationspackages = Authorization::select('authorization.*')
            ->with(
                'services_briefcase',
                'services_briefcase.manual_price',
                'assigned_management_plan',
                'assigned_management_plan.management_plan',
                'assigned_management_plan.management_plan.service_briefcase',
                'assigned_management_plan.management_plan.procedure',
                'manual_price',
                'manual_price.procedure'
            )
            ->where('authorization.id', $auth_package_id);
        if ($request->route == 1) {
            $Authorizationspackages->where('authorization.auth_status_id', 3);
        } else if ($request->route == 2) {
        }
        $Authorizationspackages->whereNull('authorization.auth_package_id')
            ->whereNull('authorization.supplies_com_id')
            ->whereNull('authorization.product_com_id')
            ->whereNull('authorization.application_id')
            ->whereNull('authorization.assigned_management_plan_id')
            ->leftJoin('services_briefcase', 'authorization.services_briefcase_id', 'services_briefcase.id');
        $Authorizationspackages = $Authorizationspackages->get()->toArray();

        // VALIDACIÓN SI LOS PAQUETES ENCONTRADOS CUMPLAN CON LAS CONDICIONES DESCRITAS EN EL MANUAL TARIFARIO
        $result_packages = []; // VARIABLE QUE ALMACENA LOS PAQUETES RESULTANTES
        foreach ($Authorizationspackages as $Authorizationspackage) {
            // procedimientos
            $AuthsPackedProc = Authorization::select(
                'authorization.*',
                'management_plan.procedure_id AS procedure_id',
                DB::raw('COUNT(authorization.services_briefcase_id) AS quantity')
            )
                ->with(
                    'services_briefcase',
                    'services_briefcase.manual_price',
                    'assigned_management_plan',
                    'assigned_management_plan.management_plan',
                    'assigned_management_plan.management_plan.service_briefcase',
                    'assigned_management_plan.management_plan.procedure',
                    'manual_price',
                    'manual_price.procedure'
                )
                ->where('authorization.admissions_id', $Authorizationspackage['admissions_id'])
                ->where('authorization.auth_package_id', $Authorizationspackage['id'])
                ->whereNull('authorization.supplies_com_id')
                ->whereNull('authorization.product_com_id')
                ->whereNull('authorization.application_id')
                ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
                ->leftJoin('management_plan', 'assigned_management_plan.management_plan_id', 'management_plan.id');
            if ($request->route == 1) {
                $AuthsPackedProc->where('assigned_management_plan.execution_date', '!=', '0000-00-00');
            } else if ($request->route == 2) {
            }
            $AuthsPackedProc->where('assigned_management_plan.created_at', '<=', Carbon::parse($BillingPad->validation_date)->endOfMonth())
                ->groupby('authorization.services_briefcase_id');
            $AuthsPackedProc = $AuthsPackedProc->get()->toArray();

            // medicamentos
            $AuthsPackedMed = Authorization::select(
                'authorization.*',
                'management_plan.procedure_id AS procedure_id',
                DB::raw('COUNT(authorization.services_briefcase_id) AS quantity')
            )
                ->with(
                    'services_briefcase',
                    'services_briefcase.manual_price',
                    'assigned_management_plan',
                    'assigned_management_plan.management_plan',
                    'assigned_management_plan.management_plan.service_briefcase',
                    'assigned_management_plan.management_plan.procedure',
                    'manual_price',
                    'manual_price.procedure'
                )
                ->where('authorization.admissions_id', $Authorizationspackage['admissions_id'])
                ->where('authorization.auth_package_id', $Authorizationspackage['id'])
                ->whereNull('authorization.supplies_com_id')
                ->whereNotNull('authorization.product_com_id')
                ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
                ->leftJoin('management_plan', 'assigned_management_plan.management_plan_id', 'management_plan.id');
            if ($request->route == 1) {
                $AuthsPackedMed->whereNotNull('authorization.application_id')
                    ->where('assigned_management_plan.execution_date', '!=', '0000-00-00');
            } else if ($request->route == 2) {
            }
            $AuthsPackedMed->where('assigned_management_plan.created_at', '<=', Carbon::parse($BillingPad->validation_date)->endOfMonth())
                ->groupby('authorization.services_briefcase_id');
            $AuthsPackedMed = $AuthsPackedMed->get()->toArray();



            // medicamentos
            $AuthsPackedSupp = Authorization::select(
                'authorization.*',
                'management_plan.procedure_id AS procedure_id',
                DB::raw('COUNT(authorization.services_briefcase_id) AS quantity')
            )
                ->with(
                    'services_briefcase',
                    'services_briefcase.manual_price',
                    'assigned_management_plan',
                    'assigned_management_plan.management_plan',
                    'assigned_management_plan.management_plan.service_briefcase',
                    'assigned_management_plan.management_plan.procedure',
                    'manual_price',
                    'manual_price.procedure'
                )
                ->where('authorization.admissions_id', $Authorizationspackage['admissions_id'])
                ->where('authorization.auth_package_id', $Authorizationspackage['id'])
                ->whereNotNull('authorization.supplies_com_id')
                ->whereNull('authorization.product_com_id')
                ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
                ->leftJoin('management_plan', 'assigned_management_plan.management_plan_id', 'management_plan.id');
            if ($request->route == 1) {
                $AuthsPackedSupp->whereNotNull('authorization.application_id')
                    ->where('assigned_management_plan.execution_date', '!=', '0000-00-00');
            } else if ($request->route == 2) {
            }
            $AuthsPackedSupp->where('assigned_management_plan.created_at', '<=', Carbon::parse($BillingPad->validation_date)->endOfMonth())
                ->groupby('authorization.services_briefcase_id');
            $AuthsPackedSupp = $AuthsPackedSupp->get()->toArray();

            // procdimientos
            $AuthsresponseProc = Authorization::select('authorization.*')
                ->with(
                    'services_briefcase',
                    'services_briefcase.manual_price',
                    'assigned_management_plan',
                    'assigned_management_plan.management_plan',
                    'assigned_management_plan.management_plan.service_briefcase',
                    'assigned_management_plan.management_plan.procedure',
                    'manual_price',
                    'manual_price.procedure'
                )
                ->where('authorization.admissions_id', $Authorizationspackage['admissions_id'])
                ->where('authorization.auth_package_id', $Authorizationspackage['id'])
                ->whereNull('authorization.supplies_com_id')
                ->whereNull('authorization.product_com_id')
                ->whereNull('authorization.application_id')
                ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id');
            if ($request->route == 1) {
                $AuthsresponseProc->where('assigned_management_plan.execution_date', '!=', '0000-00-00');
            } else if ($request->route == 2) {
            }
            $AuthsresponseProc->whereBetween('assigned_management_plan.created_at', [Carbon::parse($BillingPad->validation_date)->startOfMonth(), Carbon::parse($BillingPad->validation_date)->endOfMonth()]);
            $AuthsresponseProc = $AuthsresponseProc->get()->toArray();

            // Medicamentos
            $AuthsresponseMed = Authorization::select('authorization.*')
                ->with(
                    'services_briefcase',
                    'services_briefcase.manual_price',
                    'assigned_management_plan',
                    'assigned_management_plan.management_plan',
                    'assigned_management_plan.management_plan.service_briefcase',
                    'assigned_management_plan.management_plan.procedure',
                    'manual_price',
                    'manual_price.procedure'
                )
                ->where('authorization.admissions_id', $Authorizationspackage['admissions_id'])
                ->where('authorization.auth_package_id', $Authorizationspackage['id'])
                ->whereNull('authorization.supplies_com_id')
                ->whereNotNull('authorization.product_com_id')
                ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id');
            if ($request->route == 1) {
                $AuthsresponseMed->whereNotNull('authorization.application_id')
                    ->where('assigned_management_plan.execution_date', '!=', '0000-00-00');
            } else if ($request->route == 2) {
            }
            $AuthsresponseMed->whereBetween('assigned_management_plan.created_at', [Carbon::parse($BillingPad->validation_date)->startOfMonth(), Carbon::parse($BillingPad->validation_date)->endOfMonth()]);
            $AuthsresponseMed = $AuthsresponseMed->get()->toArray();

            // Insumos
            $AuthsresponseSupp = Authorization::select('authorization.*')
                ->with(
                    'services_briefcase',
                    'services_briefcase.manual_price',
                    'assigned_management_plan',
                    'assigned_management_plan.management_plan',
                    'assigned_management_plan.management_plan.service_briefcase',
                    'assigned_management_plan.management_plan.procedure',
                    'manual_price',
                    'manual_price.procedure'
                )
                ->where('authorization.admissions_id', $Authorizationspackage['admissions_id'])
                ->where('authorization.auth_package_id', $Authorizationspackage['id'])
                ->whereNotNull('authorization.supplies_com_id')
                ->whereNull('authorization.product_com_id')
                ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id');
            if ($request->route == 1) {
                $AuthsresponseSupp->whereNotNull('authorization.application_id')
                    ->where('assigned_management_plan.execution_date', '!=', '0000-00-00');
            } else if ($request->route == 2) {
            }
            $AuthsresponseSupp->whereBetween('assigned_management_plan.created_at', [Carbon::parse($BillingPad->validation_date)->startOfMonth(), Carbon::parse($BillingPad->validation_date)->endOfMonth()]);
            $AuthsresponseSupp = $AuthsresponseSupp->get()->toArray();

            $Authorizationspackage['auth_package'] = [];
            // foreach ($AuthsresponseProc as $element) {
            //     array_push($Authsresponse, $element);
            // }
            // foreach ($AuthsresponseMed as $element) {
            //     array_push($Authsresponse, $element);
            // }
            // foreach ($AuthsresponseSupp as $element) {
            //     array_push($Authsresponse, $element);
            // }

            $AuthsPacked = [];
            foreach ($AuthsPackedProc as $element) {
                array_push($AuthsPacked, $element);
            }
            foreach ($AuthsPackedMed as $element) {
                array_push($AuthsPacked, $element);
            }
            foreach ($AuthsPackedSupp as $element) {
                array_push($AuthsPacked, $element);
            }

            $total_max = 0;
            $total_done = 0;
            foreach ($AuthsPacked as $AuthPacked) {
                $type_validator = 0;
                $ProcedurePackages = ProcedurePackage::select('procedure_package.*')
                    ->where('procedure_package.procedure_package_id', $Authorizationspackage['manual_price_id']);
                //
                //
                // el id de producto y el de insumo están permutados
                // corrección por parte de ivan
                //
                //


                if ($AuthPacked['product_com_id']) {
                    $ProcedurePackages->where('procedure_package.product_com_id', $AuthPacked['product_com_id']);
                    $type_validator = 1;
                } else if ($AuthPacked['supplies_com_id']) {
                    $ProcedurePackages->where('procedure_package.supplies_com_id', $AuthPacked['supplies_com_id']);
                    $type_validator = 2;
                } else if ($AuthPacked['procedure_id']) {
                    $ProcedurePackages->where('procedure_package.procedure_id', $AuthPacked['procedure_id']);
                    $type_validator = 3;
                }

                $ProcedurePackages = $ProcedurePackages->get()->toArray();
                if (count($ProcedurePackages) > 0) {

                    if (!$ProcedurePackages[0]['min_quantity']) {
                        $ProcedurePackages[0]['min_quantity'] = 1;
                    }
                    if (!$ProcedurePackages[0]['max_quantity']) {
                        $ProcedurePackages[0]['max_quantity'] = log(0);
                    }
                    if ($AuthPacked['quantity'] >= $ProcedurePackages[0]['min_quantity'] && $AuthPacked['quantity'] <= $ProcedurePackages[0]['max_quantity']) {
                        if ($ProcedurePackages[0]['dynamic_charge'] == 1) {
                            $total_max += $ProcedurePackages[0]['max_quantity'];
                            $total_done += $AuthPacked['quantity'];
                        }
                        if ($type_validator == 1) {
                            foreach ($AuthsresponseProc as $element) {
                                array_push($result_packages, $element);
                            }
                        } else if ($type_validator == 2) {
                            foreach ($AuthsresponseMed as $element) {
                                array_push($result_packages, $element);
                            }
                        } else if ($type_validator == 3) {
                            foreach ($AuthsresponseSupp as $element) {
                                array_push($result_packages, $element);
                            }
                        }
                    }
                }
            }
        }



        return response()->json([
            'status' => true,
            'message' => 'procedimientos autorizados obtenidos exitosamente',
            'data' => ['billing_pad' => $result_packages]
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
        $BillingPad = BillingPad::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'facturas obtenidas exitosamente',
            'data' => ['billing_pad' => $BillingPad]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(BillingPadRequest $request, int $id): JsonResponse
    {
        $billingInfo = $this->getBillingPadInformation($id);

        $BillingPadConsecutive = BillingPadConsecutive::where('status_id', 1)
            ->where('billing_pad_prefix_id', $billingInfo[0]['campus_billing_pad_prefix_id'])
            ->where('final_consecutive', '>', 'actual_consecutive')
            ->where('expiracy_date', '>', Carbon::now())
            ->get()->first();

        if (!$BillingPadConsecutive) {
            return response()->json([
                'status' => false,
                'message' => 'No es posible facturar ya que no se encuentran resoluciones activas para el prefijo: ' . $billingInfo[0]['campus_billing_pad_prefix'],
                'data' => ['billing_pad' => []]
            ]);
        }

        $AuthBillingPadDelete = AuthBillingPad::where('billing_pad_id', $id);
        $AuthBillingPadDelete->delete();
        $components = json_decode($request->authorizations);
        $total_value = 0;
        foreach ($components as $conponent) {
            $AuthBillingPad = new AuthBillingPad;
            $AuthBillingPad->billing_pad_id = $id;
            $AuthBillingPad->authorization_id = $conponent->id;
            if ($conponent->manual_price) {
                $AuthBillingPad->value = $conponent->manual_price->value;
            } else {
                $AuthBillingPad->value = $conponent->services_briefcase->value;
            }
            $AuthBillingPad->save();
            $total_value += $AuthBillingPad->value;
        }

        $consecutive = ($BillingPadConsecutive->consecutive == 0 ?  $BillingPadConsecutive->initial_consecutive : $BillingPadConsecutive->consecutive + 1);
        if ($consecutive == $BillingPadConsecutive->final_consecutive) {
            $BillingPadConsecutive->stats_id = 2;
        }
        $BillingPadConsecutive->actual_consecutive = $consecutive;
        $BillingPadConsecutive->save();

        $BillingPad = BillingPad::where('id', $id)->first();
        $BillingPad->billing_pad_status_id = 2;
        $BillingPad->total_value = $total_value;
        $BillingPad->consecutive = $consecutive;
        $BillingPad->billing_pad_consecutive_id = $BillingPadConsecutive->id;
        $BillingPad->billing_pad_prefix_id = $billingInfo[0]['campus_billing_pad_prefix_id'];
        $BillingPad->save();
        $this->generateBillingDat($id);

        $BillingPadLog = new BillingPadLog;
        $BillingPadLog->billing_pad_id = $id;
        $BillingPadLog->billing_pad_status_id = 2;
        $BillingPadLog->user_id = $request->user_id;
        $BillingPadLog->save();

        return response()->json([
            'status' => true,
            'message' => 'factura actualizada exitosamente',
            'data' => ['billing_pad' => $BillingPad]
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
            $BillingPadDelete = BillingPad::where('procedure_id', $id);
            $BillingPadDelete->delete();

            return response()->json([
                'status' => true,
                'message' => 'facturas eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'facturas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }

    /**
     * Generate PDF file with all information of the account receivable
     * 
     * @param  int  $id
     */
    public function generateBillingDat(int $id): JsonResponse
    {
        $BillingPad = $this->getBillingPadInformation($id);

        $billMaker = BillingPadLog::select(
            'users.firstname AS billing_maker_firstname',
            'users.lastname AS billing_maker_lastname',
        )
            ->leftJoin('users', 'users.id', 'billing_pad_log.user_id')
            ->where('billing_pad_log.billing_pad_id', $id)
            ->get()->toArray();
        if ($billMaker) {
            $billMakerName = $this->nameBuilder($billMaker[0]['billing_maker_firstname'], null, $billMaker[0]['billing_maker_lastname'], null);
        } else {
            $billMakerName = $this->nameBuilder('PEPITO', null, 'PEREZ', null);
        }

        $CompanyLocationInfo = Company::where('company.id', $BillingPad[0]['eps_id'])
            ->select(
                'company.registration AS eps_registration',
                'region.code AS eps_departament_code',
                'identification_type.code AS eps_identification_type',
                'municipality.sga_origin_fk AS company_city_code',
            )
            ->leftJoin('region', 'region.id', 'company.city_id')
            ->leftJoin('municipality', 'municipality.id', 'company.municipality_id')
            ->leftJoin('identification_type', 'identification_type.id', 'company.identification_type_id')
            ->groupBy('company.id')
            ->get()->toArray();

        $copago = false; // VALIDAR SI ES UN COPAGO
        $payer_type = '';
        $payer_identification = '';
        $payer_identification_type = '';
        $payer_firstname = '';
        $payer_lastname = '';
        $payer_middlelastname = '';
        $payer_email = '';
        $payer_phone = '';
        $payer_address = '';
        $payer_registration = '';
        $payer_fiscal_characteristics = '';
        $user_departament_code = ($BillingPad[0]['user_departament_code'] == 5 || $BillingPad[0]['user_departament_code'] == 8 ? "0" . $BillingPad[0]['user_departament_code'] : $BillingPad[0]['user_departament_code']);
        $eps_name = '';
        if ($copago) {
            $payer_type = '2';
            $payer_identification = $BillingPad[0]['identification'];
            $payer_identification_type = $BillingPad[0]['patient_identification_type'];
            $payer_firstname = $BillingPad[0]['firstname'];
            $payer_lastname = $BillingPad[0]['lastname'];
            $payer_middlelastname = $BillingPad[0]['middlelastname'];
            $payer_email = $BillingPad[0]['email'];
            $payer_phone = $BillingPad[0]['phone'];
            $payer_address = $BillingPad[0]['residence_address'];
            $payer_departament_code = $user_departament_code;
            $payer_city_code = $BillingPad[0]['user_city_code'];
        } else {
            $payer_registration = $CompanyLocationInfo[0]['eps_registration'];
            $payer_fiscal_characteristics = 'O-13';
            $payer_type = '1';
            $payer_identification = $BillingPad[0]['eps_identification'];
            $payer_identification_type = $this->getDocTipe($CompanyLocationInfo[0]['eps_identification_type']);
            $eps_name = $BillingPad[0]['eps_name'];
            $payer_email = $BillingPad[0]['eps_mail'];
            $payer_phone = $BillingPad[0]['eps_phone'];
            $payer_address = $BillingPad[0]['eps_address'];
            $payer_departament_code = ($CompanyLocationInfo[0]['eps_departament_code'] == 5 || $CompanyLocationInfo[0]['eps_departament_code'] == 8 ? "0" . $CompanyLocationInfo[0]['eps_departament_code'] : $CompanyLocationInfo[0]['eps_departament_code']);
            $payer_city_code = $CompanyLocationInfo[0]['company_city_code'];
        }

        $full_name = $this->nameBuilder($BillingPad[0]['firstname'], $BillingPad[0]['middlefirstname'], $BillingPad[0]['lastname'], $BillingPad[0]['middlelastname']);


        $totalToPay = $this->NumToLetters($BillingPad[0]['billing_total_value']);

        $consecutivo = 1;
        $billing_line = '';
        $assistance_name = '';
        $services_date = array();
        $components = AuthBillingPad::where('billing_pad_id', $id)->get()->toArray();
        foreach ($components as $component) {
            $Auth = Authorization::where('authorization.id', $component['authorization_id'])
                ->select(
                    'authorization.id AS authorization_id',
                    'authorization.auth_number AS auth_number',
                    'authorization.observation AS observation',
                    'authorization.file_auth AS file_auth',
                    'authorization.services_briefcase_id AS services_briefcase_id',
                    'authorization.assigned_management_plan_id AS assigned_management_plan_id',
                    'authorization.admissions_id AS admissions_id',
                    'authorization.authorized_amount AS authorized_amount',
                    'authorization.auth_status_id AS auth_status_id',
                    'authorization.auth_package_id AS auth_package_id',
                    'authorization.manual_price_id AS manual_price_id',
                )
                ->with(
                    'services_briefcase',
                    'services_briefcase.manual_price',
                    'services_briefcase.manual_price.procedure',
                    'assigned_management_plan',
                    'assigned_management_plan.user',
                    'assigned_management_plan.management_plan',
                    'assigned_management_plan.management_plan.service_briefcase',
                    'assigned_management_plan.management_plan.procedure',
                    'manual_price',
                    'manual_price.procedure',
                )
                ->leftJoin('services_briefcase', 'authorization.services_briefcase_id', 'services_briefcase.id')
                ->groupBy('authorization.id')
                ->get()->toArray();

            if ($Auth[0]['assigned_management_plan'] != null) {
                array_push($services_date, $Auth[0]['assigned_management_plan']['execution_date']);
                if ($assistance_name == '') {
                    $assistance_name = $Auth[0]['assigned_management_plan']['user']['firstname'] . ' ' . $Auth[0]['assigned_management_plan']['user']['lastname'];
                }
            } else {
                $packedAuths = Authorization::where('authorization.auth_package_id', $Auth[0]['authorization_id'])
                    ->select(
                        'authorization.auth_number AS auth_number',
                        'authorization.observation AS observation',
                        'authorization.file_auth AS file_auth',
                        'authorization.services_briefcase_id AS services_briefcase_id',
                        'authorization.assigned_management_plan_id AS assigned_management_plan_id',
                        'authorization.admissions_id AS admissions_id',
                        'authorization.authorized_amount AS authorized_amount',
                        'authorization.auth_status_id AS auth_status_id',
                        'authorization.auth_package_id AS auth_package_id',
                        'authorization.manual_price_id AS manual_price_id',
                    )
                    ->with(
                        'services_briefcase',
                        'services_briefcase.manual_price',
                        'services_briefcase.manual_price.procedure',
                        'assigned_management_plan',
                        'assigned_management_plan.user',
                        'assigned_management_plan.management_plan',
                        'assigned_management_plan.management_plan.service_briefcase',
                        'assigned_management_plan.management_plan.procedure',
                        'manual_price',
                        'manual_price.procedure',
                    )
                    ->leftJoin('services_briefcase', 'authorization.services_briefcase_id', 'services_briefcase.id')
                    ->groupBy('authorization.id')
                    ->get()->toArray();
                foreach ($packedAuths as $element) {
                    $A = $element['assigned_management_plan']['execution_date'];
                    $b = $element['assigned_management_plan']['user']['firstname'] . ' ' . $element['assigned_management_plan']['user']['lastname'];;
                    if ($assistance_name == '') {
                        $assistance_name = $b;
                    }
                    array_push($services_date, $A);
                }
            }


            $value = $Auth[0]['services_briefcase']['value'];
            $service = $Auth[0]['services_briefcase']['manual_price']['name'];
            $code = $Auth[0]['services_briefcase']['manual_price']['homologous_id'];

            $line = $consecutivo . ';' . $service . ';999;' . $code . ';94;;;;1;' . $value . ';' . $value . ';0;0;' . $value . ';0;0;01';
            if (strlen($billing_line) == 0) {
                $billing_line = $line;
            } else {
                $billing_line = $billing_line . '
' . $line;
            }
            $consecutivo++;
        }


        $file = [];
        $collection = collect($services_date);
        $sortDates = $collection->sort()->toArray();
        $first_date = (count($sortDates) > 0 ? $sortDates[0] : '');
        $last_date = (count($sortDates) > 0 ? $sortDates[count($sortDates) - 1] : '');
        $now_date = Carbon::now();
        $year = Carbon::now()->year;

        // FACTURAS NO PGP

        $file_no_pgp = [
            $BillingPad[0]['billing_prefix'] . $BillingPad[0]['billing_consecutive'] . ';;FA;01;10;;COP;' . $now_date . ';;;;;' . $BillingPad[0]['billing_prefix'] . ';;;;;' . $BillingPad[0]['billing_resolution'] . ';;;;;' . $BillingPad[0]['patient_admission_address'] . ';' . $user_departament_code . ';' . $BillingPad[0]['user_city_code'] . ';;' . $BillingPad[0]['user_city_code'] . ';CO;
;;;
900900122-7;;;;;;;;;;;;;;;;;;;
' . $payer_identification . ';' . $payer_identification_type . ';49;' . $eps_name . ';' . $payer_firstname . ';' . $payer_lastname . ';' . $payer_middlelastname . ';' . $payer_type . ';' . $payer_address . ';' . $payer_departament_code . ';' . $payer_city_code . ';;' . $payer_city_code . ';' . $payer_phone . ';' . $payer_email . ';CO;' . $payer_registration . ';' . $payer_fiscal_characteristics . ';;
' . $BillingPad[0]['billing_total_value'] . ';0;0;;0;' . $BillingPad[0]['billing_total_value'] . ';' . $BillingPad[0]['billing_total_value'] . '
' . $BillingPad[0]['billing_total_value'] . ';0;0;01
;;;
A;' . $BillingPad[0]['briefcase_name'] . ';1;A;;2;A;' . $full_name . ';3;A;' . $BillingPad[0]['patient_identification_type'] . ' ' . $BillingPad[0]['identification'] . ';4;A;' . $assistance_name . ';5;A;;6;A;' . $first_date . ';7;A;' . $last_date . ';8;A;;9;A;' . $totalToPay . ';10;A;;11;A;' . $billMakerName . ';12
2;1;;;;
;;;

SALUD;SS-SinAporte;' . $BillingPad[0]['patient_admission_enable_code'] . ';' . $BillingPad[0]['patient_identification_type'] . ';' . $BillingPad[0]['identification'] . ';' . $BillingPad[0]['lastname'] . ';' . $BillingPad[0]['middlelastname'] . ';' . $BillingPad[0]['firstname'] . ';' . $BillingPad[0]['middlefirstname'] . ';04;12;01;;;;;;' . $first_date . ';' . $last_date . ';0;0;0;0;;;;;;;
' . $billing_line,
        ];



        // FACTURAS PGP

        $file_pgp = [
            $BillingPad[0]['billing_prefix'] . $BillingPad[0]['billing_consecutive'] . ';;FA;01;10;;COP;' . $now_date . ';;;;;' . $BillingPad[0]['billing_prefix'] . ';;;;;' . $BillingPad[0]['billing_resolution'] . ';;;;;' . $BillingPad[0]['patient_admission_address'] . ';' . $user_departament_code . ';' . $BillingPad[0]['user_city_code'] . ';;' . $BillingPad[0]['user_city_code'] . ';CO;
;;;
900900122-7;;;;;;;;;;;;;;;;;;;
' . $payer_identification . ';' . $payer_identification_type . ';49;' . $eps_name . ';' . $payer_firstname . ';' . $payer_lastname . ';' . $payer_middlelastname . ';' . $payer_type . ';' . $payer_address . ';' . $payer_departament_code . ';' . $payer_city_code . ';;' . $payer_city_code . ';' . $payer_phone . ';' . $payer_email . ';CO;' . $payer_registration . ';' . $payer_fiscal_characteristics . ';;
' . $BillingPad[0]['billing_total_value'] . ';0;0;;0;' . $BillingPad[0]['billing_total_value'] . ';' . $BillingPad[0]['billing_total_value'] . '
' . $BillingPad[0]['billing_total_value'] . ';0;0;01
;;;
A;;1;A;;2;A;;3;A;;4;A;;5;A;;6;A;;7;A;;8;A;;9;A;' . $totalToPay . ';10;A;;11;A;' . $billMakerName . ';12
2;1;;;;
;;;

1;PRESUPUESTO GLOBAL AJUSTADO A CONDICIÓN MÉDICA SALUD MENTAL - REGIMEN SUBSIDIADO - REGIONAL BOGOTÁ;999;1 SUBSIDIADO;94;;;;1;28779320;28779320;0;0;28779320;0;0;01',
        ];

        $file = $file_no_pgp;

        $name = '900900122-7_' . $year . '_' . $BillingPad[0]['billing_prefix'] . $BillingPad[0]['billing_consecutive'] . '_.dat';

        Storage::disk('public')->put($name, $file);

        return response()->json([
            'status' => true,
            'message' => 'Factura generada exitosamente',
            'url' => asset('/storage' .  '/' . $name),
        ]);
    }

    public function getBillingPadInformation(int $billing_id): array
    {
        return BillingPad::find($billing_id)
            ->select(
                'patients.firstname AS firstname',
                'patients.middlefirstname AS middlefirstname',
                'patients.lastname AS lastname',
                'patients.middlelastname AS middlelastname',
                'patients.identification AS identification',
                'patients.residence_address AS residence_address',
                'patients.email AS email',
                'patients.phone AS phone',
                'campus.address AS patient_admission_address',
                'campus.enable_code AS patient_admission_enable_code',
                'campus.billing_pad_prefix_id AS campus_billing_pad_prefix_id',
                'billing_pad_prefix.name AS campus_billing_pad_prefix',
                'briefcase.name AS briefcase_name',
                'municipality.sga_origin_fk AS user_city_code',
                'region.code AS user_departament_code',
                'identification_type.code AS patient_identification_type',
                'company.id AS eps_id',
                'company.name AS eps_name', // --------------------------------------------------------
                'company.identification AS eps_identification', //       PARA COPAGOS
                'company.address AS eps_address', //              USAR INFORMACIÌN DEL PACIETE
                'company.phone AS eps_phone', //
                'company.mail AS eps_mail', // --------------------------------------------------------
                'billing_pad_consecutive.resolution AS billing_resolution',
                'PF.name AS billing_prefix',
                'billing_pad.billing_pad_prefix_id AS billing_prefix_id',
                'billing_pad.total_value AS billing_total_value',
                'billing_pad.consecutive AS billing_consecutive',
            )
            ->leftJoin('admissions', 'admissions.id', 'billing_pad.admissions_id')
            ->leftJoin('billing_pad_prefix AS PF', 'PF.id', 'billing_pad.billing_pad_prefix_id')
            ->leftJoin('billing_pad_consecutive', 'billing_pad_consecutive.id', 'billing_pad.billing_pad_consecutive_id')
            ->leftJoin('campus', 'campus.id', 'admissions.campus_id')
            ->leftJoin('billing_pad_prefix', 'billing_pad_prefix.id', 'campus.billing_pad_prefix_id')
            ->leftJoin('briefcase', 'briefcase.id', 'admissions.briefcase_id')
            ->leftJoin('region', 'region.id', 'campus.region_id')
            ->leftJoin('municipality', 'municipality.id', 'campus.municipality_id')
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('identification_type', 'identification_type.id', 'patients.identification_type_id')
            ->get()->toArray();
    }


    public function NumToLetters(int $value): string
    {
        return NumerosEnLetras::convertir($value, 'PESOS M CTE', false, 'Centavos', true);
    }

    public function nameBuilder($fn, $sn, $ln, $sln): string
    {
        return $fn . ' ' . '' . $sn . ($sn ? ' ' : '') . '' . $ln . '' . ($sln ? ' ' : '') . $sln;
    }

    public function getDocTipe(string $internal_code): string
    {
        $doc_types[0]['internal_code'] = 'RC';
        $doc_types[0]['name'] = 'Registro civil';
        $doc_types[0]['code'] = '11';
        $doc_types[1]['internal_code'] = 'TI';
        $doc_types[1]['name'] = 'Tarjeta de identidad';
        $doc_types[1]['code'] = '12';
        $doc_types[2]['internal_code'] = 'CC';
        $doc_types[2]['name'] = 'Cédula de ciudadanía';
        $doc_types[2]['code'] = '13';
        $doc_types[3]['internal_code'] = null;
        $doc_types[3]['name'] = 'Tarjeta de extranjería';
        $doc_types[3]['code'] = '21';
        $doc_types[4]['internal_code'] = 'CE';
        $doc_types[4]['name'] = 'Cédula de extranjería';
        $doc_types[4]['code'] = '22';
        $doc_types[5]['internal_code'] = 'NIT';
        $doc_types[5]['name'] = 'NIT';
        $doc_types[5]['code'] = '31';
        $doc_types[6]['internal_code'] = 'PA';
        $doc_types[6]['name'] = 'Pasaporte';
        $doc_types[6]['code'] = '41';
        $doc_types[7]['internal_code'] = null;
        $doc_types[7]['name'] = 'Documento de identificación extranjero';
        $doc_types[7]['code'] = '42';
        $doc_types[8]['internal_code'] = null;
        $doc_types[8]['name'] = 'PEP';
        $doc_types[8]['code'] = '47';
        $doc_types[9]['internal_code'] = 'NUIP';
        $doc_types[9]['name'] = 'NUIP';
        $doc_types[9]['code'] = '91';
        $doc_types[10]['internal_code'] = null;
        $doc_types[10]['name'] = 'NIT de otro país';
        $doc_types[10]['code'] = '50';

        $res = '';
        foreach ($doc_types as $element) {
            if ($element['internal_code'] == $internal_code) {
                $res = $element['code'];
            }
        }

        return $res;
    }
}
