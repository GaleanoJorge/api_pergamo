<?php

namespace App\Http\Controllers\Management;

use App\Models\Authorization;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorizationRequest;
use App\Models\AssignedManagementPlan;
use App\Models\AssistanceSupplies;
use App\Models\AuthLog;
use App\Models\Briefcase;
use App\Models\ManagementPlan;
use App\Models\ProductSupplies;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;


require('ManagementPlanController.php');


class AuthorizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Authorization = Authorization::select('authorization.*');

        if ($request->_sort) {
            $Authorization->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Authorization->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $Authorization = $Authorization->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Authorization = $Authorization->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Estados de glosas obtenidos exitosamente',
            'data' => ['authorization' => $Authorization]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function InProcess(Request $request, int $algo = null): JsonResponse
    {
        $Authorization = Authorization::leftjoin('admissions', 'authorization.admissions_id', 'admissions.id')
            ->leftjoin('location', 'admissions.id', 'location.admissions_id')
            ->leftjoin('patients', 'admissions.patient_id', 'patients.id')
            ->leftjoin('briefcase', 'admissions.briefcase_id', 'briefcase.id')
            ->leftjoin('services_briefcase', 'authorization.services_briefcase_id', 'services_briefcase.id')
            ->leftjoin('manual_price', 'services_briefcase.manual_price_id', 'manual_price.id')
            ->leftjoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
            ->leftjoin('management_plan', 'assigned_management_plan.management_plan_id', 'management_plan.id')
            ->leftjoin('authorization as AUTH', 'AUTH.auth_package_id', 'authorization.id')
            ->select(
                'authorization.*',
                DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo'),
                DB::raw('DATE(authorization.created_at) as date'),
                DB::raw('COUNT(AUTH.id) as paquetes'),
            )
            ->wherenull('authorization.auth_package_id')
            ->leftjoin('auth_billing_pad', 'authorization.id', 'auth_billing_pad.authorization_id')
            ->whereNull('auth_billing_pad.authorization_id')
            ->with(
                'admissions',
                'admissions.location.scope_of_attention',
                'admissions.patients',
                'admissions.patients.identification_type',
                'admissions.patients.status',
                'admissions.patients.gender',
                'admissions.patients.inability',
                'admissions.patients.academic_level',
                'admissions.patients.residence_municipality',
                'admissions.patients.neighborhood_or_residence',
                'admissions.patients.residence',
                'services_briefcase',
                'services_briefcase.manual_price',
                'auth_status',
                'assigned_management_plan',
                'assigned_management_plan.management_plan',
                'assigned_management_plan.management_plan.type_of_attention',
                'assigned_management_plan.user',
                'assigned_management_plan.ch_record',
                'fixed_add',
                'fixed_add.fixed_assets',
                'fixed_add.fixed_assets.fixed_nom_product',
                'fixed_add.fixed_assets.fixed_clasification',
                'applications.users',
                'medical_diary_days.ch_record',
                'location',
                'ch_interconsultation',
                'ch_interconsultation.many_ch_record',
                'product_com',
                'supplies_com',
                'assigned_management_plan.ch_record.user',
                'assigned_management_plan.management_plan.service_briefcase',
                'assigned_management_plan.management_plan.procedure',
                'manual_price',
                'auth_package',
                'manual_price.procedure',
            )->where(
                function ($query) use ($request) {
                    $query->where('management_plan.status_id', 1);
                    // ->WhereNull('auth_number');
                    $query->orWhere(function ($que) use ($request) {
                        $que->WhereNull('authorization.assigned_management_plan_id')
                            ->WhereNull('authorization.auth_package_id')
                            ->WhereNull('authorization.fixed_add_id')
                            ->WhereNotNull('authorization.manual_price_id')
                            ->WhereNull('authorization.application_id')
                            ->WhereNull('authorization.procedure_id')
                            ->WhereNull('authorization.supplies_com_id')
                            ->WhereNull('authorization.product_com_id')
                            ->WhereNull('authorization.auth_number');
                    })->orWhere(function ($que) use ($request) {
                        $que->WhereNull('authorization.assigned_management_plan_id')
                            ->WhereNull('authorization.auth_package_id')
                            ->WhereNotNull('authorization.medical_diary_days_id')
                            ->orWhere(function ($que) use ($request) {
                                $que->WhereNotNull('authorization.ch_interconsultation_id');
                            });
                    });
                }
            );

        if ($request->status_id === '0') {
            $Authorization->where(function ($query) use ($request) {
                $query->where('authorization.auth_status_id', '<', 3);
                // ->WhereNull('auth_number');
                $query->orWhere(function ($que) use ($request) {
                    $que->WherenotNull('authorization.application_id')
                        ->where('authorization.auth_status_id', '=', 3)
                        ->WhereNull('authorization.auth_number');
                })->orWhere(function ($que) use ($request) {
                    $que->WherenotNull('authorization.medical_diary_days_id')
                        ->where('authorization.auth_status_id', '=', 3)
                        ->WhereNull('authorization.auth_number');
                })->orWhere(function ($que) use ($request) {
                    $que->WherenotNull('authorization.ch_interconsultation_id')
                        ->where('authorization.auth_status_id', '<', 3)
                        ->WhereNull('authorization.auth_number');
                })->orWhere(function ($que) use ($request) {
                    $que->WhereNotNull('authorization.location_id');
                });
            });
        } else if ($request->status_id === 'E') {
            $Authorization->where(function ($query) use ($request) {
                $query->where('authorization.auth_status_id', '<', 3);
                // ->WhereNull('auth_number');
                $query->orWhere(function ($que) use ($request) {
                    $que->WherenotNull('authorization.application_id')
                        ->where('authorization.auth_status_id', '=', 3)
                        ->WhereNull('authorization.auth_number');
                });
            });
            $Authorization->when('authorization.assigned_management_plan_id' != null, function ($que) use ($request) {
                $que->where('assigned_management_plan.execution_date', '!=', '0000-00-00 00:00:00');
            });
        } else if ($request->status_id === 'P') {
            $Authorization->where(function ($query) use ($request) {
                $query->where('authorization.auth_status_id', '<', 3);
                // ->WhereNull('auth_number');
                $query->orWhere(function ($que) use ($request) {
                    $que->WherenotNull('authorization.application_id')
                        ->where('authorization.auth_status_id', '<', 3)
                        ->WhereNull('authorization.auth_number');
                });
            });
            $Authorization->when('authorization.assigned_management_plan_id' != null, function ($que) use ($request) {
                $que->where('assigned_management_plan.execution_date', '=', '0000-00-00 00:00:00');
            });
        } else if ($request->status_id == 'PAQ') {
            $Authorization = Authorization::leftjoin('admissions', 'authorization.admissions_id', 'admissions.id')
                ->leftjoin('location', 'admissions.id', 'location.admissions_id')
                ->leftjoin('patients', 'admissions.patient_id', 'patients.id')
                ->leftjoin('briefcase', 'admissions.briefcase_id', 'briefcase.id')
                ->leftjoin('services_briefcase', 'authorization.services_briefcase_id', 'services_briefcase.id')
                ->leftjoin('manual_price', 'services_briefcase.manual_price_id', 'manual_price.id')
                ->leftjoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
                ->leftjoin('management_plan', 'assigned_management_plan.management_plan_id', 'management_plan.id')
                ->leftjoin('authorization as AUTH', 'AUTH.auth_package_id', 'authorization.id')
                ->select(
                    'authorization.*',
                    DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo'),
                    DB::raw('DATE(authorization.created_at) as date'),
                    DB::raw('COUNT(AUTH.id) as paquetes'),
                )
                ->wherenull('authorization.auth_package_id')
                ->leftjoin('auth_billing_pad', 'authorization.id', 'auth_billing_pad.authorization_id')
                ->whereNull('auth_billing_pad.authorization_id')
                ->with(
                    'admissions',
                    'admissions.location.scope_of_attention',
                    'admissions.patients',
                    'admissions.patients.identification_type',
                    'admissions.patients.status',
                    'admissions.patients.gender',
                    'admissions.patients.inability',
                    'admissions.patients.academic_level',
                    'admissions.patients.residence_municipality',
                    'admissions.patients.neighborhood_or_residence',
                    'admissions.patients.residence',
                    'services_briefcase',
                    'services_briefcase.manual_price',
                    'auth_status',
                    'assigned_management_plan',
                    'assigned_management_plan.management_plan',
                    'assigned_management_plan.management_plan.type_of_attention',
                    'assigned_management_plan.user',
                    'assigned_management_plan.ch_record',
                    'fixed_add',
                    'fixed_add.fixed_assets',
                    'fixed_add.fixed_assets.fixed_nom_product',
                    'fixed_add.fixed_assets.fixed_clasification',
                    'applications.users',
                    'medical_diary_days.ch_record',
                    'location',
                    'ch_interconsultation',
                    'ch_interconsultation.many_ch_record',
                    'product_com',
                    'supplies_com',
                    'assigned_management_plan.ch_record.user',
                    'assigned_management_plan.management_plan.service_briefcase',
                    'assigned_management_plan.management_plan.procedure',
                    'manual_price',
                    'auth_package',
                    'manual_price.procedure',
                );
            $Authorization->where(function ($query) use ($request) {
                $query->where('authorization.auth_status_id', '<', 3);
                // ->WhereNull('auth_number');
                $query->Where(function ($que) use ($request) {
                    $que->WhereNull('authorization.assigned_management_plan_id')
                        ->WhereNull('authorization.auth_package_id')
                        ->WhereNull('authorization.fixed_add_id')
                        ->WhereNotNull('authorization.manual_price_id')
                        ->WhereNull('authorization.application_id')
                        ->WhereNull('authorization.procedure_id')
                        ->WhereNull('authorization.supplies_com_id')
                        ->WhereNull('authorization.product_com_id')
                        ->WhereNull('authorization.auth_number');
                });
            });
        } else {
            $Authorization
                ->where('authorization.auth_status_id', $request->status_id);
            $Authorization->orwhere(function ($query) use ($request) {
                $query->WhereNotNull('authorization.application_id');
            });
        }


        if ($request->eps_id != 'null' && isset($request->eps_id)) {
            $Authorization
                ->leftjoin('contract', 'briefcase.contract_id', 'contract.id')
                ->where('contract.company_id', $request->eps_id);
        }

        if ($request->contract_id != 'null' && isset($request->contract_id)) {
            $Authorization
                ->where('contract.id', $request->contract_id);
        }

        if ($request->briefcase_id != 'null' && isset($request->briefcase_id)) {
            $Authorization
                ->where('briefcase.id', $request->briefcase_id);
        }

        if ($request->program_id != 'null' && isset($request->program_id)) {
            $Authorization
                ->where('location.program_id', $request->program_id);
        }

        if ($request->scope_of_attention_id != 'null' && isset($request->scope_of_attention_id)) {
            $Authorization
                ->where('location.scope_of_attention_id', $request->scope_of_attention_id);
        }

        if ($request->type_of_attention_id != 'null' && isset($request->type_of_attention_id)) {
            $Authorization->when('authorization.assigned_management_plan_id' != null, function ($query) use ($request) {
                $query->where('management_plan.type_of_attention_id', $request->type_of_attention_id);
            });
        }

        if ($request->initial_date != 'null' && isset($request->initial_date)) {
            $init_date = Carbon::parse($request->initial_date);

            $Authorization
                ->where('authorization.created_at', '>=', $init_date);
        }

        if ($request->final_date != 'null' && isset($request->final_date)) {
            $finish_date = new DateTime($request->final_date . 'T23:59:59.9');
            $Authorization->where('authorization.created_at', '<=', $finish_date);
        }

        if ($request->_sort) {
            $Authorization->orderBy($request->_sort, $request->_order);
        }

        if ($request->number_id != 'null' && isset($request->number_id)) {
            $Authorization
                ->where('identification', $request->number_id);
        }

        if ($request->search) {
            $Authorization->where(function ($query) use ($request) {
                $query->where('patients.identification', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.email', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.middlelastname', 'like', '%' . $request->search . '%')
                    ->orWhere('authorization.auth_number', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.email', 'like', '%' . $request->search . '%')
                    ->orWhere('manual_price.name', 'like', '%' . $request->search . '%');
            });
        }


        $Authorization = $Authorization->groupBy('authorization.id');


        if ($request->query("pagination", true) == "false") {
            $Authorization = $Authorization->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);


            $Authorization = $Authorization->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Autorizaciones obtenidas exitosamente',
            'data' => ['authorization' => $Authorization]
        ]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function InHistoric(Request $request, int $statusId): JsonResponse
    {
        $Authorization = Authorization::leftjoin('admissions', 'authorization.admissions_id', 'admissions.id')
            ->leftjoin('location', 'admissions.id', 'location.admissions_id')
            ->leftjoin('patients', 'admissions.patient_id', 'patients.id')
            ->leftjoin('briefcase', 'admissions.briefcase_id', 'briefcase.id')
            ->leftjoin('services_briefcase', 'authorization.services_briefcase_id', 'services_briefcase.id')
            ->leftjoin('manual_price', 'services_briefcase.manual_price_id', 'manual_price.id')
            ->select(
                'authorization.*',
                DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo'),
                DB::raw('DATE(authorization.created_at) as date'),
            )
            ->wherenull('auth_package_id')
            ->with(
                'admissions',
                'admissions.location.scope_of_attention',
                'admissions.patients',
                'admissions.patients.identification_type',
                'admissions.patients.status',
                'admissions.patients.gender',
                'admissions.patients.inability',
                'admissions.patients.academic_level',
                'admissions.patients.residence_municipality',
                'admissions.patients.neighborhood_or_residence',
                'admissions.patients.residence',
                'services_briefcase',
                'services_briefcase.manual_price',
                'auth_status',
                'assigned_management_plan',
                'assigned_management_plan.management_plan',
                'assigned_management_plan.management_plan.type_of_attention',
                'assigned_management_plan.user',
                'assigned_management_plan.ch_record',
                'fixed_add',
                'fixed_add.fixed_assets',
                'fixed_add.fixed_assets.fixed_nom_product',
                'fixed_add.fixed_assets.fixed_clasification',
                'applications.users',
                'medical_diary_days.ch_record',
                'location',
                'ch_interconsultation',
                'ch_interconsultation.many_ch_record',
                'product_com',
                'supplies_com',
                'assigned_management_plan.ch_record.user',
                'assigned_management_plan.management_plan.service_briefcase',
                'assigned_management_plan.management_plan.procedure',
                'manual_price',
                'auth_package',
                'manual_price.procedure',
            )
            ->groupBy('authorization.id');

        if ($statusId == 0) {
            // $Authorization->where('auth_status_id', 3)
            //     ->orwhere('auth_status_id', 4);
            $Authorization->where(function ($query) use ($request) {
                $query->where('auth_status_id', '>=', 3)
                    ->WhereNotNull('auth_number');
            });
        } else {
            $Authorization->where(function ($query) use ($request, $statusId) {
                $query->where('auth_status_id', '=', $statusId)
                    ->WhereNotNull('auth_number');
            });
        }

        if ($request->eps_id) {
            $Authorization
                ->leftjoin('contract', 'briefcase.contract_id', 'contract.id')
                ->where('company_id', $request->eps_id);
        }

        if ($request->_sort) {
            $Authorization->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Authorization->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%')
                    ->orWhere('auth_number', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $Authorization = $Authorization->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Authorization = $Authorization->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Historico de autorizciones obtenido exitosamente',
            'data' => ['authorization' => $Authorization]
        ]);
    }

    /**
     * Get authorizations by open admissions .
     * 
     * @param int admissions_id
     * @return jsonResponse
     */
    public function GetByAdmissions(Request $request, int $admissionsId): JsonResponse
    {
        $Authorization = Authorization::select(
            'authorization.*',
            DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo'),
            DB::raw('DATE(authorization.created_at) as date'),
        )
            ->leftjoin('admissions', 'authorization.admissions_id', 'admissions.id')
            ->leftjoin('patients', 'admissions.patient_id', 'patients.id')
            ->leftjoin('briefcase', 'admissions.briefcase_id', 'briefcase.id')
            // ->leftjoin('briefcase', 'admissions.briefcase_id', 'briefcase.id')
            ->leftjoin('assigned_management_plan', 'authorization.assigned_management_plan_id', 'assigned_management_plan.id')
            ->leftjoin('management_plan', 'assigned_management_plan.management_plan_id', 'management_plan.id')
            ->leftjoin('services_briefcase', 'authorization.services_briefcase_id', 'services_briefcase.id')
            ->leftjoin('manual_price', 'services_briefcase.manual_price_id', 'manual_price.id')

            // ->wherenull('auth_package_id')
            ->with(
                'admissions',
                'admissions.location.scope_of_attention',
                'admissions.patients',
                'admissions.patients.identification_type',
                'admissions.patients.status',
                'admissions.patients.gender',
                'admissions.patients.inability',
                'admissions.patients.academic_level',
                'admissions.patients.residence_municipality',
                'admissions.patients.neighborhood_or_residence',
                'admissions.patients.residence',
                'services_briefcase',
                'services_briefcase.manual_price',
                'auth_status',
                'assigned_management_plan',
                'assigned_management_plan.management_plan',
                'assigned_management_plan.management_plan.type_of_attention',
                'assigned_management_plan.user',
                'assigned_management_plan.ch_record',
                'fixed_add',
                'fixed_add.fixed_assets',
                'fixed_add.fixed_assets.fixed_nom_product',
                'fixed_add.fixed_assets.fixed_clasification',
                'applications.users',
                'medical_diary_days.ch_record',
                'location',
                'ch_interconsultation',
                'ch_interconsultation.many_ch_record',
                'product_com',
                'supplies_com',
                'assigned_management_plan.ch_record.user',
                'assigned_management_plan.management_plan.service_briefcase',
                'assigned_management_plan.management_plan.procedure',
                'manual_price',
                'auth_package',
                'manual_price.procedure',
            )
            ->where('authorization.admissions_id', $admissionsId)
            ->where(
                function ($query) use ($request) {
                    $query->where('management_plan.status_id', 1);
                    // ->WhereNull('auth_number');
                    $query->orWhere(function ($que) use ($request) {
                        $que->WhereNull('authorization.assigned_management_plan_id')
                            ->WhereNull('authorization.auth_package_id')
                            ->WhereNull('authorization.fixed_add_id')
                            ->WhereNotNull('authorization.manual_price_id')
                            ->WhereNull('authorization.application_id')
                            ->WhereNull('authorization.procedure_id')
                            ->WhereNull('authorization.supplies_com_id')
                            ->WhereNull('authorization.product_com_id')
                            ->WhereNull('authorization.auth_number');
                    })->orWhere(function ($que) use ($request) {
                        $que->WhereNotNull('authorization.location_id');
                    });
                }
            )
            ->groupBy('authorization.id');

        if ($request->edit) {
            $Authorization->where(function ($query) use ($request, $admissionsId) {
                $query->where('authorization.auth_package_id', $request->id)
                    ->orWhere('authorization.auth_package_id', null)
                    ->whereNotNull('authorization.assigned_management_plan_id');
                $query->where(function ($que) use ($request) {
                    $que->where('authorization.auth_status_id', '<', 3);
                    $que->orWhere(function ($q) use ($request) {
                        $q->WherenotNull('authorization.application_id')
                            ->where('authorization.auth_status_id', '<=', 3)
                            ->WhereNull('authorization.auth_number');
                    });
                });
            });
        }

        if ($request->view) {
            $Authorization->where('authorization.auth_package_id', $request->id);
        };

        if ($request->_sort) {
            $Authorization->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Authorization->where(function ($query) use ($request) {
                $query->where('patients.identification', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.email', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.middlelastname', 'like', '%' . $request->search . '%')
                    ->orWhere('authorization.auth_number', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $Authorization = $Authorization->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $Authorization = $Authorization->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Historico de autorizciones obtenido exitosamente',
            'data' => ['authorization' => $Authorization]
        ]);
    }

    /**
     * generate hospital auths for supplies
     * 
     */

    public function generateHospitalSupplies(Request $request, int $id): JsonResponse
    {
        $product_supplies = AssistanceSupplies::select(
            'ppr.services_briefcase_id as services_briefcase_id',
            'cr.assigned_management_plan_id as assigned_management_plan_id',
            'ppr.admissions_id as admissions_id',
            'assistance_supplies.id as assistance_supplies_id',
            'bs.product_supplies_com_id as product_supplies_com_id'
        )
            ->leftJoin('pharmacy_product_request AS ppr', 'ppr.id', 'assistance_supplies.pharmacy_product_request_id')
            ->leftJoin('admissions AS a', 'a.id', 'ppr.admissions_id')
            ->leftJoin('location AS l', 'l.admissions_id', 'a.id')
            ->leftJoin('ch_record AS cr', 'cr.id', 'assistance_supplies.ch_record_id')
            ->leftJoin('pharmacy_request_shipping AS prs', 'prs.pharmacy_product_request_id', 'ppr.id')
            ->leftJoin('pharmacy_lot_stock AS pls', 'pls.id', 'prs.pharmacy_lot_stock_id')
            ->leftJoin('billing_stock AS bs', 'bs.id', 'pls.billing_stock_id')
            ->where('assistance_supplies.supplies_status_id', 2)
            ->whereNull('assistance_supplies.authorization_id')
            ->whereNotNull('ppr.product_supplies_id')
            ->whereNotNull('ppr.admissions_id')
            ->where('l.scope_of_attention_id', 1)
            ->groupBy('assistance_supplies.id')
            ->get()->toArray();

        foreach($product_supplies as $element) {
            $new_auth = new Authorization;
            $new_auth->services_briefcase_id = $element['services_briefcase_id'];
            $new_auth->assigned_management_plan_id = $element['assigned_management_plan_id'];
            $new_auth->admissions_id = $element['admissions_id'];
            $new_auth->application_id = $element['assistance_supplies_id'];
            $new_auth->supplies_com_id = $element['product_supplies_com_id'];
            $new_auth->auth_status_id = 3;
            $new_auth->save();
            
            $product_supplies_2 = AssistanceSupplies::find($element['assistance_supplies_id']);
            $product_supplies_2->authorization_id = $new_auth->id;
            $product_supplies_2->save();

        }

        return response()->json([
            'status' => true,
            'message' => 'Autorizaciones de insumos creados exitosamente',
            'data' => ['authorization' => $product_supplies]
        ]);
    }

    /**
     * consultate not created authorizatons of medicament applications
     * @return \Illuminate\Http\Response
     */
    public function ConsultateNotCreatedAuths(Request $request, int $management_plan_id): JsonResponse
    {
        $Authorization = AssignedManagementPlan::select('assigned_management_plan.*')
            ->leftJoin('ch_record as  cr', 'cr.assigned_management_plan_id ', ' amp.id')
            ->leftJoin('assistance_supplies as  assistance_supplies', 'cr.id ', ' assistance_supplies.ch_record_id')
            ->leftJoin('pharmacy_product_request as  ppr', 'ppr.id ', ' assistance_supplies.pharmacy_product_request_id')
            ->leftJoin('authorization as a', 'a.application_id  ', ' assistance_supplies.id')
            ->leftJoin('services_briefcase as  sb', 'sb.id ', ' ppr.services_briefcase_id')
            ->leftJoin('manual_price as  mp', 'mp.id ', ' sb.manual_price_id')
            ->where('amp.execution_date', '!=', '0000-00-00 00:00:00')
            ->where('amp.management_plan_id', $management_plan_id)
            ->whereNull('a.id')
            ->whereNotNull('mp.product_id')
            ->groupBy('assistance_supplies.id')
            ->get()->toArray();
        return response()->json([
            'status' => true,
            'message' => 'Estados de glosas obtenidos exitosamente',
            'data' => ['authorization' => count($Authorization)]
        ]);
    }

    /**
     * Registrate not created authorizatons of medicament applications
     * @return \Illuminate\Http\Response
     */
    public function RegistrateNotCreatedAuths(Request $request, int $management_plan_id): JsonResponse
    {
        $Authorization = AssignedManagementPlan::select(
            DB::raw('assistance_supplies.id as application_id'),
            DB::raw('amp.id as assigned_management_plan_id'),
            DB::raw('sb.id as services_briefcase_id'),
            DB::raw('cr.admissions_id as admissions_id'),
            DB::raw('bs.product_id  as product_id'),
        )
            ->leftJoin('ch_record as  cr', 'cr.assigned_management_plan_id ', ' amp.id')
            ->leftJoin('assistance_supplies as  assistance_supplies', 'cr.id ', ' assistance_supplies.ch_record_id')
            ->leftJoin('pharmacy_product_request as  ppr', 'ppr.id ', ' assistance_supplies.pharmacy_product_request_id')
            ->leftJoin('authorization as a', 'a.application_id  ', ' assistance_supplies.id')
            ->leftJoin('services_briefcase as  sb', 'sb.id ', ' ppr.services_briefcase_id')
            ->leftJoin('manual_price as  mp', 'mp.id ', ' sb.manual_price_id')
            ->leftJoin('pharmacy_request_shipping as prs', 'prs.pharmacy_product_request_id ', ' ppr.id')
            ->leftJoin('pharmacy_lot_stock as pls', 'pls.id ', ' prs.pharmacy_lot_stock_id')
            ->leftJoin('billing_stock as bs', 'bs.id ', ' pls.billing_stock_id')
            ->where('amp.execution_date', '!=', '0000-00-00 00:00:00')
            ->where('amp.management_plan_id', $management_plan_id)
            ->whereNull('a.id')
            ->whereNotNull('mp.product_id')
            ->groupBy('assistance_supplies.id')
            ->get()->toArray();

        foreach ($Authorization as $element) {
            $auth = new Authorization;
            $auth->services_briefcase_id = $element['services_briefcase_id'];
            $auth->assigned_management_plan_id = $element['assigned_management_plan_id'];
            $auth->admissions_id = $element['admissions_id'];
            $auth->auth_status_id = 3;
            $auth->product_com_id =  $element['product_id'];
            $auth->application_id = $element['application_id'];
            $auth->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Estados de glosas obtenidos exitosamente',
            'data' => ['authorization' => count($Authorization)]
        ]);
    }

    public function store(AuthorizationRequest $request): JsonResponse
    {
        $Authorization = new Authorization;
        $Authorization->services_briefcase_id =  $request->services_briefcase_id;
        $Authorization->admissions_id =  $request->id;
        $validate = Briefcase::select('briefcase.*')->where('id',  $request->briefcase_id)->first();
        if ($validate->type_auth == 1) {
            $Authorization->auth_status_id =  2;
        } else {
            $Authorization->auth_status_id =  1;
        }

        $Authorization->save();

        return response()->json([
            'status' => true,
            'message' => 'Estados de glosas creados exitosamente',
            'data' => ['authorization' => $Authorization->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function saveGroup(AuthorizationRequest $request, int $id): JsonResponse
    {

        $auth_array = json_decode($request->authorizations);
        $i = 0;
        foreach ($auth_array as $item) {
            $Auth = Authorization::find($item->id);

            $Auth->observation = $request->observation;
            $Auth->auth_number = $request->auth_number;
            $Auth->auth_status_id = 3;
            $Auth->copay_id = $request->copay;
            $Auth->copay_value = $request->copay_value;
            if ($request->file('file_auth')) {
                $path = Storage::disk('public')->put('file_auth', $request->file('file_auth'));
                $Auth->file_auth = $path;
            }
            $Auth->save();
            $i++;
        }

        return response()->json([
            'status' => true,
            'message' => $i . ' autorizaciones actualizadas exitosamente',
            // 'data' => ['authorization' => $Authorization->toArray()]
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
        $Authorization = Authorization::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Estados de glosas obtenidos exitosamente',
            'data' => ['authorization' => $Authorization]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AuthorizationRequest $request, int $id): JsonResponse
    {
        $Authorization = Authorization::find($id);

        if ($request->auth_status_id) {
            $Authorization->auth_number = $request->auth_number;
            $Authorization->auth_status_id = $request->auth_status_id;
            $Authorization->observation = $request->observation;
            $Authorization->copay_id = $request->copay;
            $Authorization->copay_value = $request->copay_value;
            if ($request->file('file_auth')) {
                $path = Storage::disk('public')->put('file_auth', $request->file('file_auth'));
                $Authorization->file_auth = $path;
            }
        } else {
            $Authorization->auth_number = $request->auth_number;
            $Authorization->observation = $request->observation;
            $copay_id = $request->copay == 'null' ? null:$request->copay;
            $copay_value = $request->copay_value == 'null' ? null:$request->copay_value;
            $Authorization->copay_id = $copay_id;
            $Authorization->copay_value = $copay_value;
            if ($request->file('file_auth')) {
                $path = Storage::disk('public')->put('file_auth', $request->file('file_auth'));
                $Authorization->file_auth = $path;
            }
        }

        $Authorization->save();

        $auth_log = new AuthLog;

        $auth_log->current_status_id = $Authorization->auth_status_id;
        $auth_log->authorization_id = $Authorization->id;
        $auth_log->user_id = Auth::user()->id;

        $auth_log->save();



        return response()->json([
            'status' => true,
            'message' => 'Estado de autorización actualizado exitosamente',
            'data' => ['authorization' => $Authorization]
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
            $Authorization = Authorization::find($id);
            $Authorization->delete();

            return response()->json([
                'status' => true,
                'message' => 'Estados de glosas eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Estados de glosas estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
