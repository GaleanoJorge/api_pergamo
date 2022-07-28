<?php

namespace App\Http\Controllers\Management;

use App\Models\ManagementPlan;
use App\Models\PharmacyProductRequest;
use App\Models\ServicesBriefcase;
use App\Models\HumanTalentRequest;
use App\Models\AssignedManagementPlan;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManagementPlanRequest;
use App\Models\Authorization;
use App\Models\BaseLocationCapacity;
use App\Models\BillingPad;
use App\Models\LocationCapacity;
use App\Models\TypeContract;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManagementPlanController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        if ($request->management_id) {
            $ManagementPlan = ManagementPlan::where('id', $request->management_id)->with('type_of_attention');
        } else {
            $ManagementPlan = ManagementPlan::select();
        }

        if ($request->type) {
            $ManagementPlan->where('type_of_attention_id', $request->type)->with('service_briefcase', 'service_briefcase.manual_price', 'admissions', 'admissions.patients');
        }

        if ($request->_sort) {
            $ManagementPlan->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ManagementPlan->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $ManagementPlan = $ManagementPlan->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ManagementPlan = $ManagementPlan->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Plan de manejo obtenidos exitosamente',
            'data' => ['management_plan' => $ManagementPlan]
        ]);
    }

    public function getByAdmission(Request $request, int $id): JsonResponse
    {

        $ManagementPlan = ManagementPlan::select(
            'management_plan.*',
            DB::raw('
                        IF(COUNT(assigned_management_plan.execution_date) > 0, 
                            SUM(
                                CASE assigned_management_plan.execution_date 
                                    WHEN "0000-00-00" THEN 1 
                                    ELSE 0 
                                END), 
                            -1) AS not_executed'),
            DB::raw('COUNT(assigned_management_plan.execution_date) AS created'),
            DB::raw('
                         
                            SUM(
                                IF( CURDATE() > assigned_management_plan.finish_date , 
                                   1,0 
                            )
                           ) AS incumplidas'),
        )
            ->with('authorization', 'type_of_attention', 'frequency', 'specialty', 'admissions', 'admissions.briefcase', 'assigned_user')
            ->leftJoin('assigned_management_plan', 'assigned_management_plan.management_plan_id', '=', 'management_plan.id')
            ->where('admissions_id', $id)
            ->groupBy('management_plan.id');

        if ($request->_sort) {
            $ManagementPlan->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ManagementPlan->where('invoice_prefix', 'like', '%' . $request->search . '%')
                ->orWhere('invoice_consecutive', 'like', '%' . $request->search . '%')
                ->orWhere('received_date', 'like', '%' . $request->search . '%')
                ->orWhere('company.name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ManagementPlan = $ManagementPlan->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $ManagementPlan = $ManagementPlan->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Planes obtenidos exitosamente',
            'data' => ['management_plan' => $ManagementPlan]
        ]);
    }


    public function getByPatient(Request $request, int $id, int $userId): JsonResponse
    {
        if ($userId == 0) {
            $ManagementPlan = ManagementPlan::select(
                'management_plan.*',
                DB::raw('
                        IF(COUNT(assigned_management_plan.execution_date) > 0, 
                            SUM(
                                CASE assigned_management_plan.execution_date 
                                    WHEN "0000-00-00" THEN 1 
                                    ELSE 0 
                                END), 
                            -1) AS not_executed'),
                DB::raw('COUNT(assigned_management_plan.execution_date) AS created'),
                DB::raw('
                         
                            SUM(
                                IF( CURDATE() > assigned_management_plan.finish_date , 
                                   1,0 
                            )
                           ) AS incumplidas'),
            )
                ->with(
                    'authorization',
                    'type_of_attention',
                    'frequency',
                    'specialty',
                    'admissions',
                    'admissions.briefcase',
                    'admissions.location',
                    'admissions.location.admission_route',
                    'admissions.location.scope_of_attention',
                    'admissions.location.program',
                    'assigned_user'
                )
                ->leftJoin('assigned_management_plan', 'assigned_management_plan.management_plan_id', '=', 'management_plan.id')
                ->leftJoin('admissions', 'admissions.id', '=', 'management_plan.admissions_id')
                ->where('admissions.patient_id', $id)
                ->groupBy('management_plan.id');
        } else {
            $ManagementPlan = ManagementPlan::select(
                'management_plan.*',
                DB::raw('
                            IF(COUNT(assigned_management_plan.execution_date) > 0, 
                                SUM(
                                    CASE assigned_management_plan.execution_date 
                                        WHEN "0000-00-00" THEN 1 
                                        ELSE 0 
                                    END), 
                                -1) AS not_executed'),
                DB::raw('COUNT(assigned_management_plan.execution_date) AS created'),
                DB::raw('
                             
                                SUM(
                                    IF( CURDATE() > assigned_management_plan.finish_date , 
                                       1,0 
                                )
                               ) AS incumplidas'),
            )
                ->with(
                    'authorization',
                    'type_of_attention',
                    'frequency',
                    'specialty',
                    'admissions',
                    'admissions.briefcase',
                    'admissions.location',
                    'admissions.location.admission_route',
                    'admissions.location.scope_of_attention',
                    'admissions.location.program',
                    'assigned_user'
                )
                ->leftJoin('assigned_management_plan', 'assigned_management_plan.management_plan_id', '=', 'management_plan.id')
                ->leftJoin('admissions', 'admissions.id', '=', 'management_plan.admissions_id')
                ->where('admissions.patient_id', $id)
                ->where('management_plan.assigned_user_id', $userId)
                ->groupBy('management_plan.id');
        }

        if ($request->_sort) {
            $ManagementPlan->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ManagementPlan->where('invoice_prefix', 'like', '%' . $request->search . '%')
                ->orWhere('invoice_consecutive', 'like', '%' . $request->search . '%')
                ->orWhere('received_date', 'like', '%' . $request->search . '%')
                ->orWhere('company.name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ManagementPlan = $ManagementPlan->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $ManagementPlan = $ManagementPlan->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Planes obtenidos exitosamente',
            'data' => ['management_plan' => $ManagementPlan]
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param ManagementPlanRequest $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        // $Authorization = new Authorization;
        // $Authorization->procedure_id =  $request->procedure_id;
        // $Authorization->admissions_id =  $request->admissions_id;
        // if ($request->type_auth == 1) {
        //     $Authorization->auth_status_id =  2;
        // } else {
        //     $Authorization->auth_status_id =  1;
        // }
        // $Authorization->save();
        $TypeContract = TypeContract::select('type_contract.*')
            ->leftJoin('contract', 'contract.type_contract_id', 'type_contract.id')
            ->leftJoin('admissions', 'admissions.contract_id', 'contract.id')
            ->where('admissions.id', $request->admissions_id)
            ->first();

        $ManagementPlan = new ManagementPlan;
        $ManagementPlan->type_of_attention_id = $request->type_of_attention_id;
        $ManagementPlan->frequency_id = $request->frequency_id;
        $ManagementPlan->quantity = $request->quantity;
        $ManagementPlan->specialty_id = $request->specialty_id;
        $ManagementPlan->admissions_id = $request->admissions_id;
        $ManagementPlan->assigned_user_id = $request->assigned_user_id;
        $ManagementPlan->procedure_id = $request->procedure_id;
        $ManagementPlan->phone_consult = $request->phone_consult;
        // $ManagementPlan->authorization_id = $Authorization->id;
        if ($request->type_of_attention_id == 17) {
            $ManagementPlan->preparation = $request->preparation;
            $ManagementPlan->product_id = $request->product_id;
            $ManagementPlan->route_of_administration = $request->route_of_administration;
            $ManagementPlan->blend = $request->blend;
            $ManagementPlan->administration_time = $request->administration_time;
            $ManagementPlan->observation = $request->observation;
            $ManagementPlan->number_doses = $request->number_doses;
            $ManagementPlan->dosage_administer = $request->dosage_administer;

            $PharmacyProductRequest = new PharmacyProductRequest;
            $PharmacyProductRequest->admissions_id = $request->admissions_id;
            $PharmacyProductRequest->services_briefcase_id = $request->product_id;

            $ServicesBriefcase = ServicesBriefcase::where('id', $request->product_id)->with('manual_price.product.measurement_units', 'manual_price.product.drug_concentration')->get()->toArray();
            $value = (double) $ServicesBriefcase[0]['manual_price']['product']['drug_concentration']['value'];
            // $ServicesBriefcase[0]['manual_price']['product']['drug_concentration']['value']
            $quantity = ($request->dosage_administer * $request->number_doses) / $value;
            $PharmacyProductRequest->request_amount = round($quantity, PHP_ROUND_HALF_UP);
            $PharmacyProductRequest->user_request_id = Auth::user()->id;
            $ManagementPlan->save();
            $PharmacyProductRequest->management_plan_id = $ManagementPlan->id;
            $PharmacyProductRequest->save();
        } else {
            $ManagementPlan->save();
        }

        if ($request->isnewrequest == 1) {
            $HumanTalentRequest = new HumanTalentRequest;
            $HumanTalentRequest->admissions_id = $request->admissions_id;
            $HumanTalentRequest->management_plan_id = $ManagementPlan->id;
            $HumanTalentRequest->status = 'Creada';
            $HumanTalentRequest->save();
        }


        $BillingPad = BillingPad::where('admissions_id', $request->admissions_id)
            ->whereBetween('validation_date', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->first();
        if (!$BillingPad) {
            $BillingPad = new BillingPad;
            $BillingPad->admissions_id = $request->admissions_id;
            $BillingPad->validation_date = Carbon::now();
            if ($TypeContract->id == 5) {
                $BillingPad->billing_pad_status_id = 2;
            } else {
                $BillingPad->billing_pad_status_id = 1;
            }
            $BillingPad->total_value = 0;
            $BillingPad->save();
        }

        $error = 0;
        $error_count = 0;
        $firstDateMonth = Carbon::now()->startOfMonth();
        $lastDateMonth = Carbon::now()->endOfMonth();
        // $frequency = Frequency::where('id', $request->frequency_id)->get()->toArray();
        // foreach ($frequency as $key => $row) {
        //     $diferencei = $row['days'] / $request->quantity;
        // }

        // $admission_present = Admissions::find($request->admissions_id)->get()->first();
        // $act_briefcase = Briefcase::find($admission_present->briefcase_id)->get()->first();
        if ($TypeContract->id == 5) {
            $auth_status = 3;
        } else {
            if ($request->type_auth == 0) {
                $auth_status = 1;
            } else {
                $auth_status = 2;
            }
        }

        if ($request->medical == false &&  $request->isnewrequest != 1) {
            if ($request->type_of_attention_id != 17 && $request->type_of_attention_id != 13 && $request->type_of_attention_id != 12) {
                $now = Carbon::createFromDate($request->start_date);
                $finish = Carbon::createFromDate($request->finish_date);
                $diasDiferencia = $finish->diffInDays($now);
                $diferencei = $diasDiferencia / $request->quantity;
                $finish = Carbon::createFromDate($request->start_date)->addDays($diferencei);
                $diference = $diferencei;

                for ($i = 0; $i < $request->quantity; $i++) {

                    if ($i == 0) {
                        $start = $request->start_date;
                        $finish = $finish;
                    } else {
                        $diference = $diference + $diferencei;
                        $start = $finish->addDays(1)->copy();
                        $finish = Carbon::createFromDate($request->start_date)->addDays($diference);
                    }

                    // $assigned = false;
                    if (Carbon::parse($start)->between($firstDateMonth, $lastDateMonth)) {
                        if (!$request->phone_consult) {
                            $locattionCapacity = LocationCapacity::where('assistance_id', $request->assistance_id)
                                ->where('locality_id', $request->locality_id)
                                ->where('validation_date', '>=', $firstDateMonth)->where('validation_date', '<=', $lastDateMonth)->first();
                        } else {
                            $locattionCapacity = LocationCapacity::where('assistance_id', $request->assistance_id)
                                ->whereNull('locality_id')
                                ->where('validation_date', '>=', $firstDateMonth)->where('validation_date', '<=', $lastDateMonth)->first();
                        }
                        if ($locattionCapacity) {
                            if ($locattionCapacity->PAD_patient_actual_capacity > 0) {
                                $locattionCapacity->PAD_patient_actual_capacity = $locattionCapacity->PAD_patient_actual_capacity - 1;
                                $locattionCapacity->save();
                                // $assigned = true;
                            } else {
                                $error = 1;
                                $error_count = $request->quantity - $i;
                            }
                        } else {
                            if (!$request->phone_consult) {
                                $baseLocationCapacity = BaseLocationCapacity::where('assistance_id', $request->assistance_id)
                                    ->where('locality_id', $request->locality_id)->first();
                            } else {
                                $baseLocationCapacity = BaseLocationCapacity::where('assistance_id', $request->assistance_id)
                                    ->whereNull('locality_id')->first();
                            }
                            if ($baseLocationCapacity) {
                                $newLocationCapacity = new LocationCapacity;
                                $newLocationCapacity->assistance_id = $request->assistance_id;
                                $newLocationCapacity->locality_id = $baseLocationCapacity->locality_id;
                                $newLocationCapacity->phone_consult = $baseLocationCapacity->phone_consult;
                                $newLocationCapacity->PAD_patient_quantity = $baseLocationCapacity->PAD_base_patient_quantity;
                                $newLocationCapacity->PAD_patient_attended = 0;
                                $newLocationCapacity->PAD_patient_actual_capacity = $baseLocationCapacity->PAD_base_patient_quantity - 1;
                                $newLocationCapacity->validation_date = $start;
                                $newLocationCapacity->save();
                                // $assigned = true;
                            } else {
                                $error = 2;
                            }
                        }
                    } else {
                        $firstDateMonth->addMonth();
                        $lastDateMonth->subDays(15)->addMonth()->endOfMonth();
                    }
                    // while (!$assigned && $error == 0) {
                    // }

                    $assignedManagement = new AssignedManagementPlan;
                    $assignedManagement->start_date = $start;
                    $assignedManagement->finish_date =  $finish;
                    $assignedManagement->user_id = !$error ? $request->assigned_user_id : null;
                    $assignedManagement->management_plan_id = $ManagementPlan->id;
                    $assignedManagement->save();

                    $Authorization = new Authorization;
                    $Authorization->services_briefcase_id =  $request->procedure_id;
                    $Authorization->admissions_id = $request->admissions_id;
                    $Authorization->assigned_management_plan_id = $assignedManagement->id;
                    $Authorization->auth_status_id = $auth_status;
                    $Authorization->save();
                }
            } else if ($request->type_of_attention_id != 17 && $request->type_of_attention_id == 13 || $request->type_of_attention_id == 12) {
                $now = Carbon::createFromDate($request->start_date);
                $finish = Carbon::createFromDate($request->finish_date);



                if (Carbon::parse($now)->between($firstDateMonth, $lastDateMonth)) {
                    if (!$request->phone_consult) {
                        $locattionCapacity = LocationCapacity::where('assistance_id', $request->assistance_id)
                            ->where('locality_id', $request->locality_id)
                            ->where('validation_date', '>=', $firstDateMonth)->where('validation_date', '<=', $lastDateMonth)->first();
                    } else {
                        $locattionCapacity = LocationCapacity::where('assistance_id', $request->assistance_id)
                            ->whereNull('locality_id')
                            ->where('validation_date', '>=', $firstDateMonth)->where('validation_date', '<=', $lastDateMonth)->first();
                    }
                    if ($locattionCapacity) {
                        if ($locattionCapacity->PAD_patient_actual_capacity > 0) {
                            $locattionCapacity->PAD_patient_actual_capacity = $locattionCapacity->PAD_patient_actual_capacity - 1;
                            $locattionCapacity->save();
                        } else {
                            $error = 1;
                        }
                    } else {
                        if (!$request->phone_consult) {
                            $baseLocationCapacity = BaseLocationCapacity::where('assistance_id', $request->assistance_id)
                                ->where('locality_id', $request->locality_id)->first();
                        } else {
                            $baseLocationCapacity = BaseLocationCapacity::where('assistance_id', $request->assistance_id)
                                ->whereNull('locality_id')->first();
                        }
                        if ($baseLocationCapacity) {
                            $newLocationCapacity = new LocationCapacity;
                            $newLocationCapacity->assistance_id = $request->assistance_id;
                            $newLocationCapacity->locality_id = $baseLocationCapacity->locality_id;
                            $newLocationCapacity->phone_consult = $baseLocationCapacity->phone_consult;
                            $newLocationCapacity->PAD_patient_quantity = $baseLocationCapacity->PAD_base_patient_quantity;
                            $newLocationCapacity->PAD_patient_attended = 0;
                            $newLocationCapacity->PAD_patient_actual_capacity = $baseLocationCapacity->PAD_base_patient_quantity - 1;
                            $newLocationCapacity->validation_date = $now;
                            $newLocationCapacity->save();
                        } else {
                            $error = 2;
                        }
                    }
                } else {
                    $firstDateMonth->addMonth();
                    $lastDateMonth->subDays(15)->addMonth()->endOfMonth();
                }


                $assignedManagement = new AssignedManagementPlan;
                $assignedManagement->start_date = $now;
                $assignedManagement->finish_date =  $finish;
                $assignedManagement->user_id = !$error ? $request->assigned_user_id : null;
                $assignedManagement->management_plan_id = $ManagementPlan->id;
                $assignedManagement->save();

                $Authorization = new Authorization;
                $Authorization->services_briefcase_id =  $request->procedure_id;
                $Authorization->admissions_id = $request->admissions_id;
                $Authorization->assigned_management_plan_id = $assignedManagement->id;
                $Authorization->auth_status_id = $auth_status;
                $Authorization->save();
            } else {
                $countam = 0;
                $fechastartnow = $request->start_date . " " . $request->start_hours;
                $start = Carbon::createFromDate($fechastartnow);
                $now = Carbon::createFromDate($fechastartnow);
                $finish = Carbon::createFromDate($request->finish_date)->endOfDay();

                for ($i = 0; $i < $request->number_doses; $i++) {
                    if ($countam == 0) {
                        $now = Carbon::createFromDate($fechastartnow);
                    } else {
                        $now = $now->addHours($request->quantity);
                    }
                    $countam++;
                    $assignedManagement = new AssignedManagementPlan;
                    $assignedManagement->start_date = $now->format('Y-m-d');
                    $assignedManagement->start_hour = $now->format('H:i:s');
                    $assignedManagement->finish_date =  $now->format('Y-m-d');
                    $assignedManagement->finish_hour =  $now->format('H:i:s');
                    $assignedManagement->user_id = !$error ? $request->assigned_user_id : null;
                    $assignedManagement->management_plan_id = $ManagementPlan->id;
                    $assignedManagement->save();

                    $Authorization = new Authorization;
                    $Authorization->services_briefcase_id =  $request->procedure_id;
                    $Authorization->admissions_id = $request->admissions_id;
                    $Authorization->assigned_management_plan_id = $assignedManagement->id;
                    $Authorization->auth_status_id = $auth_status;
                    $Authorization->save();
                    // $assigned = false;
                    if (Carbon::parse($start)->between($firstDateMonth, $lastDateMonth)) {
                        if (!$request->phone_consult) {
                            $locattionCapacity = LocationCapacity::where('assistance_id', $request->assistance_id)
                                ->where('locality_id', $request->locality_id)
                                ->where('validation_date', '>=', $firstDateMonth)->where('validation_date', '<=', $lastDateMonth)->first();
                        } else {
                            $locattionCapacity = LocationCapacity::where('assistance_id', $request->assistance_id)
                                ->whereNull('locality_id')
                                ->where('validation_date', '>=', $firstDateMonth)->where('validation_date', '<=', $lastDateMonth)->first();
                        }
                        if ($locattionCapacity) {
                            if ($locattionCapacity->PAD_patient_actual_capacity > 0) {
                                $locattionCapacity->PAD_patient_actual_capacity = $locattionCapacity->PAD_patient_actual_capacity - 1;
                                $locattionCapacity->save();
                                // $assigned = true;
                            } else {
                                $error = 1;
                                $error_count = $request->quantity - $i;
                            }
                        } else {
                            if (!$request->phone_consult) {
                                $baseLocationCapacity = BaseLocationCapacity::where('assistance_id', $request->assistance_id)
                                    ->where('locality_id', $request->locality_id)->first();
                            } else {
                                $baseLocationCapacity = BaseLocationCapacity::where('assistance_id', $request->assistance_id)
                                    ->whereNull('locality_id')->first();
                            }
                            if ($baseLocationCapacity) {
                                $newLocationCapacity = new LocationCapacity;
                                $newLocationCapacity->assistance_id = $request->assistance_id;
                                $newLocationCapacity->locality_id = $baseLocationCapacity->locality_id;
                                $newLocationCapacity->PAD_patient_quantity = $baseLocationCapacity->PAD_base_patient_quantity;
                                $newLocationCapacity->PAD_patient_attended = 0;
                                $newLocationCapacity->PAD_patient_actual_capacity = $baseLocationCapacity->PAD_base_patient_quantity - 1;
                                $newLocationCapacity->validation_date = $start;
                                $newLocationCapacity->save();
                                // $assigned = true;
                            } else {
                                $error = 2;
                            }
                        }
                    } else {
                        $firstDateMonth->addMonth();
                        $lastDateMonth->subDays(15)->addMonth()->endOfMonth();
                    }
                }
            }
        }

        if ($request->type_auth == 0) {
            return response()->json([
                'status' => true,
                'message' => 'Plan de manejo creado exitosamente',
                // 'message_error' => 'Pendiente por autorizar',
                'data' => ['management_plan' => $ManagementPlan->toArray()]
            ]);
        } else {
            if ($request->type_auth == 1) {
                return response()->json([
                    'status' => true,
                    'message' => 'Plan de manejo creado exitosamente',
                    'data' => ['management_plan' => $ManagementPlan->toArray()]
                ]);
            } else            if ($error == 0) {
                return response()->json([
                    'status' => true,
                    'message' => 'Plan de manejo creado exitosamente',
                    'data' => ['management_plan' => $ManagementPlan->toArray()]
                ]);
            } else if ($error == 1) {
                return response()->json([
                    'status' => true,
                    'message' => 'Plan de manejo creado exitosamente',
                    'message_error' => 'No ha sido posible asignar ' . $error_count . ' planes de manejo ya que supera la capacidad instalada del profesional seleccionado',
                    'data' => ['management_plan' => $ManagementPlan->toArray()]
                ]);
            } else if ($error == 2) {
                return response()->json([
                    'status' => true,
                    'message' => 'Plan de manejo creado exitosamente',
                    'message_error' => 'No se pudo asignar el plan de manejo de los meses posteriores ya que el médico no cuenta con capacidad instalada base en la Comuna, Localidad o Vereda',
                    'data' => ['management_plan' => $ManagementPlan->toArray()]
                ]);
            }
        }
    }

    /**
     * Create authorizations for assignedManagementPlan pre or post.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function createAuth($request, AssignedManagementPlan $assignedManagement, ManagementPlan $ManagementPlan): Authorization
    {
        $TypeContract = TypeContract::select('type_contract.*')
            ->leftJoin('contract', 'contract.type_contract_id', 'type_contract.id')
            ->leftJoin('admissions', 'admissions.contract_id', 'contract.id')
            ->where('admissions.id', $request->admissions_id)
            ->first();

        

        $Authorization = new Authorization;
        $Authorization->services_briefcase_id = $ManagementPlan->procedure_id;
        $Authorization->assigned_management_plan_id = $assignedManagement->id;
        $Authorization->admissions_id = $request->admissions_id;
        if ($TypeContract->id == 5) {
            $Authorization->auth_status_id =  3;
        } else {
            $briefcase = ServicesBriefcase::find($ManagementPlan->procedure_id)
                ->leftJoin('briefcase', 'briefcase.id', 'services_briefcase.briefcase_id')
                ->first();
            if ($briefcase->type_auth == 1) {
                $Authorization->auth_status_id =  2;
            } else {
                $Authorization->auth_status_id =  1;
            }
        }

        $Authorization->save();

        return $Authorization;
    }

    /** 
     * Display the specified resource.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ManagementPlan = ManagementPlan::where('id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Plan de manejo obtenido exitosamente',
            'data' => ['management_plan' => $ManagementPlan]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SectionalCouncilRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $ManagementPlan = ManagementPlan::find($id);
        $ManagementPlan->type_of_attention_id = $request->type_of_attention_id;
        $ManagementPlan->frequency_id = $request->frequency_id;
        $ManagementPlan->quantity = $request->quantity;
        $ManagementPlan->specialty_id = $request->specialty_id;
        $ManagementPlan->admissions_id = $request->admissions_id;
        $ManagementPlan->assigned_user_id = $request->assigned_user_id;
        $ManagementPlan->save();

        $validate = AssignedManagementPlan::where('management_plan_id', $id)->get()->toArray();
        foreach ($validate as $key => $value) {
            $assignedManagement = AssignedManagementPlan::find($value['id']);
            $assignedManagement->user_id = $request->assigned_user_id;
            $assignedManagement->save();
        }

        $error = 0;
        $error_count = 0;
        $firstDateMonth = Carbon::now()->startOfMonth();
        $lastDateMonth = Carbon::now()->endOfMonth();

        if ($request->authorized_amount) {
            $quantity = $request->authorized_amount;
        } else {
            $quantity = $request->quantity;
        }

        $now = Carbon::createFromDate($request->start_date);
        $finish = Carbon::createFromDate($request->finish_date);
        $diasDiferencia = $finish->diffInDays($now);
        $diferencei = $diasDiferencia / $quantity;
        $finish = Carbon::createFromDate($request->start_date)->addDays($diferencei);
        $diference = $diferencei;
        for ($i = 0; $i < $quantity; $i++) {

            if ($i == 0) {
                $start = $request->start_date;
                $finish = $finish;
            } else {
                $diference = $diference + $diferencei;
                $start = $finish->addDays(1);
                $finish = Carbon::createFromDate($request->start_date)->addDays($diference);
            }

            if (Carbon::parse($start)->between($firstDateMonth, $lastDateMonth)) {
                $locattionCapacity = LocationCapacity::where('assistance_id', $request->assistance_id)
                    ->where('locality_id', $request->locality_id)
                    ->where('validation_date', '>=', $firstDateMonth)->where('validation_date', '<=', $lastDateMonth)->first();
                if ($locattionCapacity) {
                    if ($locattionCapacity->PAD_patient_actual_capacity > 0) {
                        $locattionCapacity->PAD_patient_actual_capacity = $locattionCapacity->PAD_patient_actual_capacity - 1;
                        $locattionCapacity->save();
                    } else {
                        $error = 1;
                        $error_count = $request->quantity - $i;
                    }
                } else {
                    $baseLocationCapacity = BaseLocationCapacity::where('assistance_id', $request->assistance_id)
                        ->where('locality_id', $request->locality_id)->first();
                    if ($baseLocationCapacity) {
                        $newLocationCapacity = new LocationCapacity;
                        $newLocationCapacity->assistance_id = $request->assistance_id;
                        $newLocationCapacity->locality_id = $baseLocationCapacity->locality_id;
                        $newLocationCapacity->PAD_patient_quantity = $baseLocationCapacity->PAD_base_patient_quantity;
                        $newLocationCapacity->PAD_patient_attended = 0;
                        $newLocationCapacity->PAD_patient_actual_capacity = $baseLocationCapacity->PAD_base_patient_quantity - 1;
                        $newLocationCapacity->validation_date = $start;
                        $newLocationCapacity->save();
                    } else {
                        $error = 2;
                    }
                }
            } else {
                $firstDateMonth->addMonth();
                $lastDateMonth->subDays(15)->addMonth()->endOfMonth();
            }

            $assignedManagement = new AssignedManagementPlan;
            $assignedManagement->start_date = $start;
            $assignedManagement->finish_date =  $finish;
            $assignedManagement->user_id = $request->assigned_user_id;
            $assignedManagement->management_plan_id = $id;
            $assignedManagement->save();

            $this->createAuth($request, $assignedManagement, $ManagementPlan);
        }

        if ($error == 0) {
            return response()->json([
                'status' => true,
                'message' => 'Plan de manejo actualizado exitosamente',
                'data' => ['management_plan' => $ManagementPlan]
            ]);
        } else if ($error == 1) {
            return response()->json([
                'status' => true,
                'message' => 'Plan de manejo actualizado exitosamente',
                'message_error' => 'No ha sido posible asignar asignar ' . $error_count . ' planes de manejo ya que supera la capacidad instalada del profesional seleccionado',
                'data' => ['management_plan' => $ManagementPlan->toArray()]
            ]);
        } else if ($error == 2) {
            return response()->json([
                'status' => true,
                'message' => 'Plan de manejo actualizado exitosamente',
                'message_error' => 'No se pudo asignar el plan de manejo de los meses posteriores ya que el médico no cuenta con capacidad instalada base en la Comuna, Localidad o Vereda',
                'data' => ['management_plan' => $ManagementPlan->toArray()]
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $ManagementPlan = ManagementPlan::find($id);
            $ManagementPlan->delete();

            return response()->json([
                'status' => true,
                'message' => 'Plan de manejo eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Plan de manejo está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
