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
use App\Models\ProcedurePackage;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
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
            ->with('billing_pad_status', 'admissions');

        if ($request->_sort) {
            $BillingPad->orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $BillingPad->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->admission_id) {
            $BillingPad->where('admissions_id', $request->admission_id);
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
        $BillingPad->save();

        return response()->json([
            'status' => true,
            'message' => 'facturas creadas exitosamente',
            'data' => ['billing_pad' => $BillingPad]
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
        ->where('admissions.discharge_date', '0000-00-00 00:00:00')
        ->leftJoin('contract', 'contract.id', 'admissions.contract_id');
    if ($request->pgp == "true") {
        $EnabledAdmissions->where('contract.type_contract_id', '=', 5);
    } else {
        $EnabledAdmissions->where('contract.type_contract_id', '<>', 5);
    }
    $EnabledAdmissions->orderBy('admissions.created_at', 'desc');

        if ($request->_sort) {
            $EnabledAdmissions->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $EnabledAdmissions->where('patients.name', 'like', '%' . $request->search . '%');
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
        $BillingPad = BillingPad::where('id', $request->billing_id)->get()->first();
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
            ->whereNull('authorization.auth_package_id')
            ->whereNotNull('authorization.assigned_management_plan_id')
            ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
            ->where('assigned_management_plan.execution_date', '!=', '0000-00-00')
            ->whereBetween('assigned_management_plan.created_at', [Carbon::parse($BillingPad->validation_date)->startOfMonth(), Carbon::parse($BillingPad->validation_date)->endOfMonth()])
            ->get()->toArray();
        $Authorizations = [];
        $AlreadyBilling = [];
        foreach ($eventos as $Authorization) {
            $AuthBillingPad = AuthBillingPad::where('authorization_id', $Authorization['id'])->get()->first();
            if (!$AuthBillingPad) {
                array_push($Authorizations, $Authorization);
            } else {
                array_push($AlreadyBilling, $Authorization);
            }
        }

        $Authorizationspackages = Authorization::select('authorization.*', 'manual_price.id AS manual_price_id')
            ->with(
                'services_briefcase',
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
            ->whereNull('authorization.assigned_management_plan_id')
            ->leftJoin('services_briefcase', 'authorization.services_briefcase_id', 'services_briefcase.id')
            ->leftJoin('manual_price', 'services_briefcase.manual_price_id', 'manual_price.id')
            ->get()->toArray();
        $hasPackages = false;
        foreach ($Authorizationspackages as $Authorizationpackages) {
            $AuthBillingPad = AuthBillingPad::where('authorization_id', $Authorizationpackages['id'])->get()->first();
            if (!$AuthBillingPad) {
                $hasPackages = true;
            }
        }

        $result_packages = [];
        foreach ($Authorizationspackages as $Authorizationspackage) {
            $is_package = false;
            $AuthsPacked = Authorization::select(
                'authorization.*',
                'management_plan.procedure_id AS procedure_id',
                DB::raw('COUNT(authorization.services_briefcase_id) AS quantity')
            )
                ->with(
                    'services_briefcase',
                    'assigned_management_plan',
                    'assigned_management_plan.management_plan',
                    'assigned_management_plan.management_plan.service_briefcase',
                    'assigned_management_plan.management_plan.procedure',
                    'manual_price',
                    'manual_price.procedure'
                )
                ->where('authorization.admissions_id', $admission_id)
                ->where('authorization.auth_package_id', $Authorizationspackage['id'])
                ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
                ->leftJoin('management_plan', 'assigned_management_plan.management_plan_id', 'management_plan.id')
                ->where('assigned_management_plan.execution_date', '!=', '0000-00-00')
                ->where('assigned_management_plan.created_at', '<=', Carbon::parse($BillingPad->validation_date)->endOfMonth())
                ->groupby('authorization.services_briefcase_id')
                ->get()->toArray();
            $total_max = 0;
            $total_done = 0;
            foreach ($AuthsPacked as $AuthPacked) {
                $ProcedurePackages = ProcedurePackage::select('procedure_package.*')
                    ->where('procedure_package.procedure_package_id', $Authorizationspackage['manual_price_id'])
                    ->where('procedure_package.procedure_id', $AuthPacked['procedure_id'])
                    ->first()->toArray();

                if (!$ProcedurePackages['min_quantity']) {
                    $ProcedurePackages['min_quantity'] = 1;
                }
                if (!$ProcedurePackages['max_quantity']) {
                    $ProcedurePackages['max_quantity'] = log(0);
                }
                if ($AuthPacked['quantity'] >= $ProcedurePackages['min_quantity'] && $AuthPacked['quantity'] <= $ProcedurePackages['max_quantity']) {
                    $is_package = true;
                    if ($ProcedurePackages['dynamic_charge'] == 1) {
                        $total_max += $ProcedurePackages['max_quantity'];
                        $total_done += $AuthPacked['quantity'];
                    }
                } else {
                    $is_package = false;
                    break;
                }
            }
            $Authsresponse = Authorization::select('authorization.*')
                ->with(
                    'services_briefcase',
                    'assigned_management_plan',
                    'assigned_management_plan.management_plan',
                    'assigned_management_plan.management_plan.service_briefcase',
                    'assigned_management_plan.management_plan.procedure',
                    'manual_price',
                    'manual_price.procedure'
                )
                ->where('authorization.admissions_id', $admission_id)
                ->where('authorization.auth_package_id', $Authorizationspackage['id'])
                ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
                ->where('assigned_management_plan.execution_date', '!=', '0000-00-00')
                ->whereBetween('assigned_management_plan.created_at', [Carbon::parse($BillingPad->validation_date)->startOfMonth(), Carbon::parse($BillingPad->validation_date)->endOfMonth()])
                ->get()->toArray();
            if ($is_package) {
                $Authorizationspackage['auth_package'] = $Authsresponse;
                if ($total_max > 0) {
                    $Authorizationspackage['services_briefcase']['value'] = ($Authorizationspackage['services_briefcase']['value'] / $total_max) * $total_done;
                }
                array_push($result_packages, $Authorizationspackage);
            } else {
                foreach ($Authsresponse as $Authresponse) {
                    array_push($result_packages, $Authresponse);
                }
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
     * Get procedures grouped by auth_package_id
     * 
     * @param Request $request
     * @param int $auth_package_id
     * @return JsonResponse
     */
    public function getProceduresByAuthPackage(Request $request, int $auth_package_id): JsonResponse
    {
        $Authorizations = Authorization::select()
            ->with(
                'services_briefcase',
                'assigned_management_plan',
                'assigned_management_plan.management_plan',
                'assigned_management_plan.management_plan.service_briefcase',
                'assigned_management_plan.management_plan.procedure',
                'manual_price',
                'manual_price.procedure'
            )
            ->where('auth_package_id', $auth_package_id)
            ->leftJoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
            ->where('assigned_management_plan.execution_date', '!=', '0000-00-00 00:00:00');

        if ($request->query("pagination", true) == "false") {
            $Authorizations = $Authorizations->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $Authorizations = $Authorizations->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'procedimientos autorizados obtenidos exitosamente',
            'data' => ['billing_pad' => $Authorizations]
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

        $AuthBillingPadDelete = AuthBillingPad::where('billing_pad_id', $id);
        $AuthBillingPadDelete->delete();
        $components = json_decode($request->authorizations);
        $total_value = 0;
        foreach ($components as $conponent) {
            $AuthBillingPad = new AuthBillingPad;
            $AuthBillingPad->billing_pad_id = $id;
            $AuthBillingPad->authorization_id = $conponent->id;
            $AuthBillingPad->value = $conponent->services_briefcase->value;
            $AuthBillingPad->save();
            $total_value += $conponent->services_briefcase->value;
        }

        $BillingPad = BillingPad::where('id', $id)->first();
        $BillingPad->billing_pad_status_id = 2;
        $BillingPad->total_value = $BillingPad->total_value + $total_value;
        $BillingPad->save();

        $BillingPadLog = new BillingPadLog();
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
}
