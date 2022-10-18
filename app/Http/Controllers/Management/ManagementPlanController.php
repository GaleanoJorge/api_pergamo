<?php

namespace App\Http\Controllers\Management;

use App\Models\ManagementPlan;
use App\Models\Admissions;
use App\Models\ServicesPharmacyStock;
use App\Models\PharmacyProductRequest;
use App\Models\ServicesBriefcase;
use App\Models\LogManagement;
use App\Models\HumanTalentRequest;
use App\Models\AssignedManagementPlan;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManagementPlanRequest;
use App\Models\Authorization;
use App\Models\BaseLocationCapacity;
use App\Models\BillingPad;
use App\Models\LocationCapacity;
use App\Models\ManagementProcedure;
use App\Models\TypeContract;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Format;
use PhpParser\Node\Expr\Cast\Double;

class ManagementPlanController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        if ($request->management_id) {
            $ManagementPlan = ManagementPlan::where('id', $request->management_id)->with(
                'type_of_attention',
                'service_briefcase',
                'service_briefcase.manual_price',
                'procedure',
                'procedure.manual_price',
                'route_administration',
                'service_briefcase.manual_price.product.measurement_units',
                'management_procedure',
                'management_procedure.services_briefcase.manual_price',
            );
        } else {
            $ManagementPlan = ManagementPlan::select();
        }

        if ($request->type) {
            $ManagementPlan->where('type_of_attention_id', $request->type)->with('service_briefcase', 'service_briefcase.manual_price', 'admissions', 'admissions.ManagementPlan');
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
                                    WHEN "0000-00-00 00:00:00" THEN 1 
                                    ELSE 0 
                                END), 
                            -1) AS not_executed'),
            DB::raw('COUNT(assigned_management_plan.execution_date) AS created'),
            DB::raw('
                         
                            SUM(
                                IF( CURDATE() > assigned_management_plan.finish_date AND assigned_management_plan.execution_date = "0000-00-00 00:00:00" , 
                                   1,0 
                            )
                           ) AS incumplidas'),
        )
            ->with('authorization', 'type_of_attention', 'frequency', 'specialty', 'admissions', 'admissions.briefcase', 'assigned_user', 'route_administration', 'service_briefcase.manual_price.product.measurement_units')

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
        $consulta = 'IF(
            SUM(
                IF(management_plan.id > 0, 1,0)
            ) = 0
            
        ,
        IF(NOW() > (admissions.entry_date + INTERVAL 1 DAY),2,1)
        ,

             IF(
                 SUM(
                     IF(assigned_management_plan.id > 0, 1,0)
                 ) = 0
                 ,3
                 ,
                     IF(SUM(
                             IF(assigned_management_plan.user_id = null,1,0)
                         ) = 0
                         ,
                             IF(
                                 SUM(
                                     IF(assigned_management_plan.redo > ' . Carbon::now()->format('YmdHis') . ',1,0)
                                 ) = 0
                                 ,
                                    IF(
                                            SUM(
                                                IF( CURDATE() > assigned_management_plan.finish_date AND assigned_management_plan.execution_date = "0000-00-00 00:00:00" , 
                                                    1,0 
                                                )
                                            ) = 0
                                        ,
                                              IF(
                                                COUNT(assigned_management_plan.execution_date) = IF(COUNT(assigned_management_plan.execution_date) > 0, 
                                                                                                    SUM(
                                                                                                    CASE assigned_management_plan.execution_date 
                                                                                                        WHEN "0000-00-00 00:00:00" THEN 1 
                                                                                                        ELSE 0 
                                                                                                    END), 
                                                                                                    -1)
                                                    ,6
                                                    ,0
                                                )  
                                        ,5
                                    )
                                 ,4
                             )
                         ,3
                     )
             )
    )';
        $ManagementPlan = ManagementPlan::select(
            'management_plan.*',
            DB::raw('
            IF(COUNT(assigned_management_plan.execution_date) > 0, 
                SUM(
                    CASE assigned_management_plan.execution_date 
                        WHEN "0000-00-00 00:00:00" THEN 1 
                        ELSE 0 
                    END), 
                -1) AS not_executed'),
            DB::raw('COUNT(assigned_management_plan.execution_date) AS created'),
            DB::raw('
             
                SUM(
                    IF( CURDATE() > assigned_management_plan.finish_date AND assigned_management_plan.execution_date = "0000-00-00 00:00:00" , 
                       1,0 
                )
               ) AS incumplidas'),
            DB::raw('
                SUM(
                    IF( (CURDATE() <= assigned_management_plan.finish_date AND 
                        CURDATE() >= assigned_management_plan.start_date AND 
                        assigned_management_plan.execution_date = "0000-00-00 00:00:00") OR 
                        assigned_management_plan.redo >= ' . Carbon::now()->format('YmdHis') . '
                    ,IF (assigned_management_plan.start_hour != "00:00:00"
                        ,
                            IF((assigned_management_plan.start_hour <= "' . Carbon::now()->addHours(3)->format('H:i:s') . '") AND 
                            (assigned_management_plan.finish_hour >= "' . Carbon::now()->subHours(3)->format('H:i:s') . '") AND 
                            (assigned_management_plan.execution_date = "0000-00-00 00:00:00"),1,0)
                        ,1)
                    ,0 
                )
            ) AS por_ejecutar'),
            DB::raw($consulta . ' AS ingreso'),
        )
            ->with(
                'authorization',
                'procedure',
                'procedure.manual_price',
                'type_of_attention',
                'frequency',
                'specialty',
                'assigned_management_plan',
                'admissions',
                'admissions.briefcase',
                'admissions.location',
                'admissions.location.admission_route',
                'admissions.location.scope_of_attention',
                'admissions.location.program',
                'assigned_user',
                'service_briefcase',
                'service_briefcase.manual_price',
            )
            ->leftJoin('assigned_management_plan', 'assigned_management_plan.management_plan_id', '=', 'management_plan.id')
            ->leftJoin('admissions', 'admissions.id', '=', 'management_plan.admissions_id')
            ->where('admissions.patient_id', $id)
            ->groupBy('management_plan.id');
        if ($userId != 0) {
            $ManagementPlan
                ->where('assigned_management_plan.user_id', $userId);
        }

        if ($request->semaphore == 1) {
            //Cumplido
            $ManagementPlan->when($consulta . '= 0', function ($query) {
                $query->when('assigned_management_plan.redo < ' . Carbon::now()->format('YmdHis'), function ($q) {
                    $q->where('assigned_management_plan.execution_date', '!=', "0000-00-00 00:00:00");
                });
            });
        } else if ($request->semaphore == 2) {
            //Admisión creada
            $ManagementPlan->when($consulta . '= 1', function ($query) {
                $query->when('SUM(IF(management_plan.id > 0, 1,0)) = 0', function ($q) {
                    $q->where('admissions.entry_date', '>', Carbon::now()->subDay());
                    $q->whereNull('management_plan.id');
                });
            });
        } else if ($request->semaphore == 3) {
            //Sin agendar
            $ManagementPlan->when($consulta . '= 1', function ($query) {
                $query->when('SUM(IF(management_plan.id > 0, 1,0)) = 0', function ($q) {
                    $q->where('admissions.entry_date', '<=', Carbon::now()->subDay());
                    $q->whereNull('management_plan.id');
                });
            });
        } else if ($request->semaphore == 4) {
            //Sin asignar profesional
            $ManagementPlan->when($consulta . '= 3', function ($query) {
                $query->when('COUNT(assigned_management_plan.execution_date) = IF(COUNT(assigned_management_plan.execution_date) > 0, 
                SUM(
                CASE assigned_management_plan.execution_date 
                    WHEN "0000-00-00 00:00:00" THEN 1 
                    ELSE 0 
                END), 
                -1)', function ($q) {
                    $q->whereNotNull('management_plan.id');
                    $q->whereNull('assigned_management_plan.user_id');
                });
            });
        } else if ($request->semaphore == 5) {
            //Por subsanar
            $ManagementPlan->when('assigned_management_plan.finish_date <' . Carbon::now(), function ($query) {
                $query->where('assigned_management_plan.execution_date', '!=', "0000-00-00 00:00:00");
            });
            $ManagementPlan->when('assigned_management_plan.finish_date <' . Carbon::now(), function ($query) {
                $query->where('assigned_management_plan.redo', '>', Carbon::now()->format('YmdHis'));
            });
        } else if ($request->semaphore == 6) {
            //Pendiente por ejecutar
            $ManagementPlan->when($consulta . '= 5', function ($query) {
                $query->when('COUNT(assigned_management_plan.execution_date) = IF(COUNT(assigned_management_plan.execution_date) > 0, 
                SUM(
                CASE assigned_management_plan.execution_date 
                    WHEN "0000-00-00 00:00:00" THEN 1 
                    ELSE 0 
                END), 
                -1)', function ($q) {
                    $q->whereNotNull('management_plan.id');
                    $q->whereNotNull('assigned_management_plan.id');
                    $q->whereNotNull('assigned_management_plan.user_id');
                    $q->where('assigned_management_plan.execution_date', "0000-00-00 00:00:00");
                    $q->where('assigned_management_plan.finish_date', '<', Carbon::now());
                });
            });
        } else if ($request->semaphore == 7) {
            //Proyección creada
            $ManagementPlan->when($consulta . '= 6', function ($query) {
                $query->when('COUNT(assigned_management_plan.execution_date) = IF(COUNT(assigned_management_plan.execution_date) > 0, 
                SUM(
                CASE assigned_management_plan.execution_date 
                    WHEN "0000-00-00 00:00:00" THEN 1 
                    ELSE 0 
                END), 
                -1)', function ($q) {
                    $q->whereNotNull('management_plan.id');
                    $q->whereNotNull('assigned_management_plan.id');
                    $q->whereNotNull('assigned_management_plan.user_id');
                    $q->where('assigned_management_plan.execution_date', "0000-00-00 00:00:00");
                    $q->where('assigned_management_plan.finish_date', '>', Carbon::now());
                });
            });
        }

        if ($request->admission_id) {
            $ManagementPlan->where('admissions_id', $request->admission_id);
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
        $ManagementPlan->hours = $request->hours;
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

            $admissions = Admissions::where('admissions.id', $request->admissions_id)->select('location.scope_of_attention_id')->leftJoin('location', 'location.admissions_id', 'admissions.id')->get()->toArray();



            $PharmacyServices = ServicesPharmacyStock::where('scope_of_attention_id', $admissions[0]['scope_of_attention_id'])
                ->leftjoin('pharmacy_stock', 'services_pharmacy_stock.pharmacy_stock_id', 'pharmacy_stock.id')
                ->get()->toArray();
            if ($PharmacyServices) {
                $pharmacy = $PharmacyServices[0]['pharmacy_stock_id'];

                $PharmacyProductRequest = new PharmacyProductRequest;
                $PharmacyProductRequest->admissions_id = $request->admissions_id;
                $PharmacyProductRequest->services_briefcase_id = $request->product_id;

                $ServicesBriefcase = ServicesBriefcase::where('id', $request->product_id)->with('manual_price.product.measurement_units', 'manual_price.product.drug_concentration')->get()->toArray();
                if ($ServicesBriefcase[0]['manual_price']['product']['product_dose_id'] == 2) {
                    $elementos_x_aplicacion =  $request->dosage_administer / $this->getConcentration($ServicesBriefcase[0]['manual_price']['product']['dose']);
                } else {
                    $elementos_x_aplicacion =  ceil($request->dosage_administer / $this->getConcentration($ServicesBriefcase[0]['manual_price']['product']['drug_concentration']['value']));
                }

                $quantity = ceil($elementos_x_aplicacion * $request->number_doses);
                $PharmacyProductRequest->request_amount = $quantity;
                $PharmacyProductRequest->own_pharmacy_stock_id = $pharmacy;
                $PharmacyProductRequest->user_request_pad_id = Auth::user()->id;
                $ManagementPlan->save();
                $LogManagement = new LogManagement;
                $LogManagement->management_plan_id =$ManagementPlan->id;
                $LogManagement->user_id = Auth::user()->id;
                $LogManagement->status ='Plan de manejo creado';
                $LogManagement->save();
                $PharmacyProductRequest->management_plan_id = $ManagementPlan->id;
                $PharmacyProductRequest->status = 'PATIENT';
                $PharmacyProductRequest->save();
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Se debe asociar farmacia al servicio para poder dispensar el medicamento.',
                ], 423);
            }
        } else {
            $ManagementPlan->save();

            $LogManagement = new LogManagement;
            $LogManagement->management_plan_id =$ManagementPlan->id;
            $LogManagement->user_id = Auth::user()->id;
            $LogManagement->status ='Plan de manejo creado';
            $LogManagement->save();
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

            if ($request->type_of_attention_id == 12) {

                for ($i = 0; $i < $request->quantity; $i++) {


                    // $assigned = false;
                    if (Carbon::parse($request->start_date)->between($firstDateMonth, $lastDateMonth)) {
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
                                $newLocationCapacity->validation_date = $request->start_date;
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

                    $start_hour = Carbon::parse(Carbon::now()->format('Y-m-d') . ' 00:00:00')->addHours($i * (24 / $request->quantity))->format('H:i:s');
                    $finish_hour = Carbon::parse(Carbon::now()->format('Y-m-d') . ' 00:00:00')->addHours(($i + 1) * (24 / $request->quantity))->format('H:i:s');

                    $assignedManagement = new AssignedManagementPlan;
                    $assignedManagement->start_date = $request->start_date;
                    $assignedManagement->finish_date =  $request->finish_date;
                    $assignedManagement->start_hour =  $start_hour;
                    $assignedManagement->finish_hour =  $finish_hour;
                    $assignedManagement->redo =  '00000000000000';
                    $assignedManagement->approved =  false;
                    if ($request->type_of_attention_id != 20) {
                    $assignedManagement->user_id = !$error ? $request->assigned_user_id : null;
                    }else{
                        $assignedManagement->user_id =  $request->assigned_user_id ;
                    }
                    $assignedManagement->management_plan_id = $ManagementPlan->id;
                    $assignedManagement->save();

                    if ($request->type_of_attention_id != 20) {
                    $Authorization = new Authorization;
                    $Authorization->services_briefcase_id =  $request->procedure_id;
                    $Authorization->admissions_id = $request->admissions_id;
                    $Authorization->assigned_management_plan_id = $assignedManagement->id;
                    $Authorization->auth_status_id = $auth_status;
                    $Authorization->save();
                }
            }
            } else if ($request->type_of_attention_id != 17 && $request->type_of_attention_id != 13 && $request->type_of_attention_id != 12) {
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
                    $assignedManagement->redo =  '00000000000000';
                    $assignedManagement->approved =  false;
                    if ($request->type_of_attention_id != 20) {
                        $assignedManagement->user_id = !$error ? $request->assigned_user_id : null;
                        }else{
                            $assignedManagement->user_id =  $request->assigned_user_id ;
                        }
                    $assignedManagement->management_plan_id = $ManagementPlan->id;
                    $assignedManagement->save();

                    
                if ($request->type_of_attention_id != 20) {
                    $Authorization = new Authorization;
                    $Authorization->services_briefcase_id =  $request->procedure_id;
                    $Authorization->admissions_id = $request->admissions_id;
                    $Authorization->assigned_management_plan_id = $assignedManagement->id;
                    $Authorization->auth_status_id = $auth_status;
                    $Authorization->save();
                }
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
                $assignedManagement->redo =  '00000000000000';
                $assignedManagement->approved =  false;
                $assignedManagement->finish_date =  $finish;
                if ($request->type_of_attention_id != 20) {
                    $assignedManagement->user_id = !$error ? $request->assigned_user_id : null;
                    }else{
                        $assignedManagement->user_id =  $request->assigned_user_id ;
                    }
                $assignedManagement->management_plan_id = $ManagementPlan->id;
                $assignedManagement->save();

                if ($request->type_of_attention_id != 20) {
                $Authorization = new Authorization;
                $Authorization->services_briefcase_id =  $request->procedure_id;
                $Authorization->admissions_id = $request->admissions_id;
                $Authorization->assigned_management_plan_id = $assignedManagement->id;
                $Authorization->auth_status_id = $auth_status;
                $Authorization->save();
                }
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
                    $assignedManagement->redo =  '00000000000000';
                    $assignedManagement->approved =  false;
                    if ($request->type_of_attention_id != 20) {
                        $assignedManagement->user_id = !$error ? $request->assigned_user_id : null;
                        }else{
                            $assignedManagement->user_id =  $request->assigned_user_id ;
                        }
                    $assignedManagement->management_plan_id = $ManagementPlan->id;
                    $assignedManagement->save();

                    if ($request->type_of_attention_id != 20) {
                    $Authorization = new Authorization;
                    $Authorization->services_briefcase_id =  $request->procedure_id;
                    $Authorization->admissions_id = $request->admissions_id;
                    $Authorization->assigned_management_plan_id = $assignedManagement->id;
                    $Authorization->auth_status_id = $auth_status;
                    $Authorization->save();
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

        if ($request->type_of_attention_id == 16) {
            $request->laboratories;
            foreach ($request->laboratories as $item) {
                $managementProcedure = new ManagementProcedure;
                $managementProcedure->management_plan_id = $ManagementPlan->id;
                $managementProcedure->procedure_id = $item;
                $managementProcedure->save();

                $Authorization = new Authorization;
                $Authorization->services_briefcase_id =  $item;
                $Authorization->admissions_id = $request->admissions_id;
                $Authorization->assigned_management_plan_id = $assignedManagement->id;
                $Authorization->auth_status_id = $auth_status;
                $Authorization->save();
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


    public function getConcentration($value)
    {
        $rr = 0;
        if (str_contains($value, '/')) {
            $spl = explode('/', $value);
            $num = $spl[0];
            // $den = +$spl[1];
            $rr = $this->numWithPlus($num);
        } else {
            $rr = $this->numWithPlus($value);
        }
        return $rr;
    }

    public function numWithPlus($num)
    {
        if (str_contains($num, '(') || str_contains($num, ')')) {
            $num = substr($num, 1, -1);
            //   $num = $num.slice($num.length - 1, $num.length);
            if (str_contains($num, '+')) {
                $spl2 = explode('+', $num);
                $r = 0;
                foreach ($spl2 as $element) {
                    $r += $element;
                };
                return $r;
            }
        } else {
            if (str_contains($num, '+')) {
                $spl2 = explode('+', $num);
                $r = 0;
                foreach ($spl2 as $element) {
                    $r += $element;
                };
                return $r;
            } else {
                return $num;
            }
        }
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
        $error = 0;
        $ManagementPlan = ManagementPlan::find($id);
        $ManagementPlan->type_of_attention_id = $request->type_of_attention_id;
        $ManagementPlan->frequency_id = $request->frequency_id;
        $ManagementPlan->quantity = $request->quantity;
        $ManagementPlan->specialty_id = $request->specialty_id;
        $ManagementPlan->admissions_id = $request->admissions_id;
        $ManagementPlan->assigned_user_id = $request->assigned_user_id;
        $ManagementPlan->procedure_id = $request->procedure_id;
        $ManagementPlan->phone_consult = $request->phone_consult;
        // $ManagementPlan->authorization_id = $Authorization->id;
        if ($request->type_of_attention_id == 17 && $request->edit != null) {
            $ManagementPlan->preparation = $request->preparation;
            $ManagementPlan->product_id = $request->product_id;
            $ManagementPlan->route_of_administration = $request->route_of_administration;
            $ManagementPlan->blend = $request->blend;
            $ManagementPlan->administration_time = $request->administration_time;
            $ManagementPlan->observation = $request->observation;
            $ManagementPlan->number_doses = $request->number_doses;
            $ManagementPlan->dosage_administer = $request->dosage_administer;
            $ManagementPlan->save();
            $LogManagement = new LogManagement;
            $LogManagement->management_plan_id =$ManagementPlan->id;
            $LogManagement->user_id = Auth::user()->id;
            $LogManagement->status ='Plan de manejo actualizado';
            $LogManagement->save();
            $admissions = Admissions::where('admissions.id', $request->admissions_id)->select('location.scope_of_attention_id')->leftJoin('location', 'location.admissions_id', 'admissions.id')->get()->toArray();



            // $PharmacyServices = ServicesPharmacyStock::where('scope_of_attention_id', $admissions[0]['scope_of_attention_id'])
            //     ->leftjoin('pharmacy_stock', 'services_pharmacy_stock.pharmacy_stock_id', 'pharmacy_stock.id')
            //     ->get()->toArray();
            // if ($PharmacyServices) {
            //     $pharmacy = $PharmacyServices[0]['pharmacy_stock_id'];

            //     $PharmacyProductRequest = new PharmacyProductRequest;
            //     $PharmacyProductRequest->admissions_id = $request->admissions_id;
            //     $PharmacyProductRequest->services_briefcase_id = $request->product_id;

            //     $ServicesBriefcase = ServicesBriefcase::where('id', $request->product_id)->with('manual_price.product.measurement_units', 'manual_price.product.drug_concentration')->get()->toArray();
            //     if ($ServicesBriefcase[0]['manual_price']['product']['product_dose_id'] == 2) {
            //         $elementos_x_aplicacion =  $request->dosage_administer / $this->getConcentration($ServicesBriefcase[0]['manual_price']['product']['dose']);
            //     } else {
            //         $elementos_x_aplicacion =  ceil($request->dosage_administer / $this->getConcentration($ServicesBriefcase[0]['manual_price']['product']['drug_concentration']['value']));
            //     }

            //     $quantity = ceil($elementos_x_aplicacion * $request->number_doses);
            //     $PharmacyProductRequest->request_amount = $quantity;
            //     $PharmacyProductRequest->own_pharmacy_stock_id = $pharmacy;
            //     $PharmacyProductRequest->user_request_pad_id = Auth::user()->id;
            //     $ManagementPlan->save();
            //     $PharmacyProductRequest->management_plan_id = $ManagementPlan->id;
            //     $PharmacyProductRequest->status = 'PATIENT';
            //     $PharmacyProductRequest->save();
            //     return response()->json([
            //         'status' => true,
            //         'message' => 'Plan de manejo actualizado exitosamente',
            //         'message_error' => 'No se pudo asignar el plan de manejo de los meses posteriores ya que el médico no cuenta con capacidad instalada base en la Comuna, Localidad o Vereda',
            //         'data' => ['management_plan' => $ManagementPlan->toArray()]
            //     ]);
            // } else {
            //     return response()->json([
            //         'status' => false,
            //         'message' => 'Se debe asociar farmacia al servivio para poder dispensar el medicamento.',
            //     ], 423);
            // }
        } else {
            $ManagementPlan->save();

            $LogManagement = new LogManagement;
            $LogManagement->management_plan_id =$ManagementPlan->id;
            $LogManagement->user_id = Auth::user()->id;
            $LogManagement->status ='Plan de manejo actualizado';
            $LogManagement->save();
        }
        if ($request->edit == null) {
            $TypeContract = TypeContract::select('type_contract.*')
                ->leftJoin('contract', 'contract.type_contract_id', 'type_contract.id')
                ->leftJoin('admissions', 'admissions.contract_id', 'contract.id')
                ->where('admissions.id', $request->admissions_id)
                ->first();
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
            if ($TypeContract->id == 5) {
                $auth_status = 3;
            } else {
                if ($request->type_auth == 0) {
                    $auth_status = 1;
                } else {
                    $auth_status = 2;
                }
            }

            $error_count = 0;
            $firstDateMonth = Carbon::now()->startOfMonth();
            $lastDateMonth = Carbon::now()->endOfMonth();
            if ($request->type_of_attention_id == 12) {
            
                for ($i = 0; $i < $request->quantity; $i++) {


                    // $assigned = false;
                    if (Carbon::parse($request->start_date)->between($firstDateMonth, $lastDateMonth)) {
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
                                $newLocationCapacity->validation_date = $request->start_date;
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

                    $start_hour = Carbon::parse(Carbon::now()->format('Y-m-d') . ' 00:00:00')->addHours($i * (24 / $request->quantity))->format('H:i:s');
                    $finish_hour = Carbon::parse(Carbon::now()->format('Y-m-d') . ' 00:00:00')->addHours(($i + 1) * (24 / $request->quantity))->format('H:i:s');

                    $assignedManagement = new AssignedManagementPlan;
                    $assignedManagement->start_date = $request->start_date;
                    $assignedManagement->finish_date =  $request->finish_date;
                    $assignedManagement->start_hour =  $start_hour;
                    $assignedManagement->finish_hour =  $finish_hour;
                    $assignedManagement->redo =  '00000000000000';
                    $assignedManagement->approved =  false;
                    if ($request->type_of_attention_id != 20) {
                        $assignedManagement->user_id = !$error ? $request->assigned_user_id : null;
                        }else{
                            $assignedManagement->user_id =  $request->assigned_user_id ;
                        }
                    $assignedManagement->management_plan_id = $ManagementPlan->id;
                    $assignedManagement->save();
                    
                    if ($request->type_of_attention_id != 20) {
                    $Authorization = new Authorization;
                    $Authorization->services_briefcase_id =  $request->procedure_id;
                    $Authorization->admissions_id = $request->admissions_id;
                    $Authorization->assigned_management_plan_id = $assignedManagement->id;
                    $Authorization->auth_status_id = $auth_status;
                    $Authorization->save();
                }
            }
                
            }else if ($request->type_of_attention_id != 17 && $request->type_of_attention_id != 13 && $request->type_of_attention_id != 12) {
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
                    $assignedManagement->redo =  '00000000000000';
                    $assignedManagement->approved =  false;
                    if ($request->type_of_attention_id != 20) {
                        $assignedManagement->user_id = !$error ? $request->assigned_user_id : null;
                        }else{
                            $assignedManagement->user_id =  $request->assigned_user_id ;
                        }
                    $assignedManagement->management_plan_id = $ManagementPlan->id;
                    $assignedManagement->save();

                    if ($request->type_of_attention_id != 20) {
                    $Authorization = new Authorization;
                    $Authorization->services_briefcase_id =  $request->procedure_id;
                    $Authorization->admissions_id = $request->admissions_id;
                    $Authorization->assigned_management_plan_id = $assignedManagement->id;
                    $Authorization->auth_status_id = $auth_status;
                    $Authorization->save();
                }
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
                $assignedManagement->redo =  '00000000000000';
                $assignedManagement->approved =  false;
                $assignedManagement->finish_date =  $finish;
                if ($request->type_of_attention_id != 20) {
                    $assignedManagement->user_id = !$error ? $request->assigned_user_id : null;
                    }else{
                        $assignedManagement->user_id =  $request->assigned_user_id ;
                    }
                $assignedManagement->management_plan_id = $ManagementPlan->id;
                $assignedManagement->save();

                if ($request->type_of_attention_id != 20) {
                $Authorization = new Authorization;
                $Authorization->services_briefcase_id =  $request->procedure_id;
                $Authorization->admissions_id = $request->admissions_id;
                $Authorization->assigned_management_plan_id = $assignedManagement->id;
                $Authorization->auth_status_id = $auth_status;
                $Authorization->save();
                }
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
                    $assignedManagement->redo =  '00000000000000';
                    $assignedManagement->approved =  false;
                    if ($request->type_of_attention_id != 20) {
                        $assignedManagement->user_id = !$error ? $request->assigned_user_id : null;
                        }else{
                            $assignedManagement->user_id =  $request->assigned_user_id ;
                        }
                    $assignedManagement->management_plan_id = $ManagementPlan->id;
                    $assignedManagement->save();
                    
                    if ($request->type_of_attention_id != 20) {
                    $Authorization = new Authorization;
                    $Authorization->services_briefcase_id =  $request->procedure_id;
                    $Authorization->admissions_id = $request->admissions_id;
                    $Authorization->assigned_management_plan_id = $assignedManagement->id;
                    $Authorization->auth_status_id = $auth_status;
                    $Authorization->save();
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
