<?php

namespace App\Http\Controllers\Management;

use App\Models\Admissions;
use App\Models\Location;
use App\Models\Bed;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdmissionsRequest;
use App\Models\Authorization;
use App\Models\BillingPad;
use App\Models\Briefcase;
use App\Models\ChInterconsultation;
use App\Models\LogAdmissions;
use App\Models\MedicalDiaryDays;
use App\Models\Patient;
use App\Models\Reference;
use App\Models\TypeContract;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AdmissionsController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $Admissions = Admissions::Leftjoin('patients', 'admissions.patient_id', 'patients.id')
            ->select(
                'admissions.*',
                DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')
            )->with(
                'patients',
                'patients.identification_type',
                'patients.gender',
                'patients.admissions',
                'patients.admissions.briefcase',
                'patients.admissions.contract',
                'patients.admissions.contract.company',
                'briefcase',
                'campus',
                'contract',
                'contract.company',
                'location',
                'location.flat',
                'location.pavilion',
                'location.bed',
                'location.admission_route',
                'location.scope_of_attention',
                'location.program',
                'diagnosis',
                'regime',
            );
        if ($request->admissions_id) {
            $Admissions->orderBy('created_at', 'desc')->where('admissions.id', $request->admissions_id);
        } else {
            $Admissions->orderBy('created_at', 'desc');
        }
        if ($request->_sort) {
            $Admissions->orderBy($request->_sort, $request->_order);
        }

        if ($request->contract_id) {
            $Admissions->where('Admissions.contract_id', $request->contract_id);
        }

        if ($request->search) {
            $Admissions->where('Admissions.code', 'like', '%' . $request->search . '%')
                ->orWhere('Admissions.code_technical_concept', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $Admissions = $Admissions->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Admissions = $Admissions->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Admisi??n obtenidos exitosamente',
            'data' => ['admissions' => $Admissions]
        ]);
    }

    /**
     * Get admissions by identification patient
     * @param  int  $identification
     * @return JsonResponse
     */
    public function getByIdentification(Request $request, int $identification): JsonResponse
    {
        $Admissions = Admissions::Leftjoin('patients', 'admissions.patient_id', 'patients.id')
            ->select(
                'admissions.*',
            )
            ->where('patients.identification', $identification)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Admisi??n obtenidos exitosamente',
            'data' => ['admissions' => $Admissions]
        ]);
    }

    /**
     * Get Active admission
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function getActive(Request $request, int $id): JsonResponse
    {
        $EnabledAdmissions =  Admissions::Leftjoin('patients', 'admissions.patient_id', 'patients.id')
            ->select(
                'admissions.*',
                DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')
            )
            ->with(
                'patients',
                'briefcase',
                'regime',
                'campus',
                'contract',
                'contract.company',
                'location',
                'location.admission_route',
                'location.scope_of_attention',
                'location.program',
            )
            ->where('discharge_date', '0000-00-00 00:00:00')
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Admisiones obtenidas exitosamente',
            'data' => ['admissions' => $EnabledAdmissions]
        ]);
    }

    /**
     * @param  int  $pacientId
     * Get procedure by briefcase.
     *
     * @return JsonResponse
     */
    public function getByPacient(Request $request, int $pacientId): JsonResponse
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
        $Admissions = Admissions::select(
            'admissions.*',
            'company.name AS company',
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
            DB::raw($consulta . ' AS ingreso'),
            DB::raw('SUM(IF(assigned_management_plan.id > 0, 1, 0)) AS total_agendado'),
            DB::raw('SUM(IF(assigned_management_plan.execution_date != "0000-00-00 00:00:00", 1, 0)) AS total_ejecutado'),
        )
            ->where('patient_id', $pacientId)
            ->with(
                'patients',
                'briefcase',
                'campus',
                'contract',
                'location',
                'regime',
                'diagnosis',
                'management_plan',
                'management_plan.assigned_management_plan',
                'location.admission_route',
                'location.scope_of_attention',
                'location.program',
                'location.flat',
                'location.pavilion',
                'location.bed',
            )
            ->leftJoin('management_plan', 'management_plan.admissions_id', 'admissions.id')
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')
            ->leftJoin('assigned_management_plan', 'assigned_management_plan.management_plan_id', '=', 'management_plan.id')
            ->groupBy('admissions.id')
            ->orderBy('created_at', 'desc');

        if ($request->search) {
            $Admissions->where('company.name', 'like', '%' . $request->search . '%')
                ->Orwhere('id', 'like', '%' . $request->search . '%');
        }

        if ($request->semaphore == 1) {
            //Cumplido
            $Admissions->when($consulta . '= 0', function ($query) {
                $query->when('assigned_management_plan.redo < ' . Carbon::now()->format('YmdHis'), function ($q) {
                    $q->where('assigned_management_plan.execution_date', '!=', "0000-00-00 00:00:00");
                });
            });
        } else if ($request->semaphore == 2) {
            //Admisi??n creada
            $Admissions->when($consulta . '= 1', function ($query) {
                $query->when('SUM(IF(management_plan.id > 0, 1,0)) = 0', function ($q) {
                    $q->where('admissions.entry_date', '>', Carbon::now()->subDay());
                    $q->whereNull('management_plan.id');
                });
            });
        } else if ($request->semaphore == 3) {
            //Sin agendar
            $Admissions->when($consulta . '= 1', function ($query) {
                $query->when('SUM(IF(management_plan.id > 0, 1,0)) = 0', function ($q) {
                    $q->where('admissions.entry_date', '<=', Carbon::now()->subDay());
                    $q->whereNull('management_plan.id');
                });
            });
        } else if ($request->semaphore == 4) {
            //Sin asignar profesional
            $Admissions->when($consulta . '= 3', function ($query) {
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
            $Admissions->when('assigned_management_plan.finish_date <' . Carbon::now(), function ($query) {
                $query->where('assigned_management_plan.execution_date', '!=', "0000-00-00 00:00:00");
            });
            $Admissions->when('assigned_management_plan.finish_date <' . Carbon::now(), function ($query) {
                $query->where('assigned_management_plan.redo', '>', Carbon::now()->format('YmdHis'));
            });
        } else if ($request->semaphore == 6) {
            //Pendiente por ejecutar
            $Admissions->when($consulta . '= 5', function ($query) {
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
            //Proyecci??n creada
            $Admissions->when($consulta . '= 6', function ($query) {
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

        if ($request->query("pagination", true) === "false") {
            $Admissions = $Admissions->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Admissions = $Admissions->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Admisiones por paciente obtenidos exitosamente',
            'data' => ['admissions' => $Admissions]
        ]);
    }


    /**
     * @param  int  $briefcase
     * Get open admissions by briefcase.
     *
     * @return JsonResponse
     */
    public function getByBriefcase(Request $request, int $briefcase_id): JsonResponse
    {
        $Admissions = Admissions::Leftjoin('patients', 'admissions.patient_id', 'patients.id')
            ->select(
                'admissions.*',
                'patients.identification_type_id',
                'patients.identification',
                'patients.email',
                'patients.residence_address',
                'patients.residence_municipality_id',
                'patients.neighborhood_or_residence_id',
                DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')
            )
            ->with(
                'patients',
                'regime',
                'location',
                'location.scope_of_attention',
                'location.program',
            )
            ->where('briefcase_id', $briefcase_id)
            ->where('discharge_date', '0000-00-00 00:00:00')
            ->orderBy('created_at', 'desc')->get()->toArray();

        // if ($request->search) {
        //     $Admissions->where('name', 'like', '%' . $request->search . '%')
        //         ->Orwhere('id', 'like', '%' . $request->search . '%');
        // }
        // if ($request->query("pagination", true) === "false") {
        //     $Admissions = $Admissions->get()->toArray();
        // } else {
        //     $page = $request->query("current_page", 1);
        //     $per_page = $request->query("per_page", 10);

        //     $Admissions = $Admissions->paginate($per_page, '*', 'page', $page);
        // }

        return response()->json([
            'status' => true,
            'message' => 'Admisiones por portafolio-paciente obtenidos exitosamente',
            'data' => ['admissions' => $Admissions]
        ]);
    }

    /**
     * @param  int  $pacientId
     * Get procedure by briefcase.
     *
     * @return JsonResponse
     */
    public function ByPac(Request $request, int $roleId): JsonResponse
    {
        $Admissions = Admissions::Leftjoin('patients', 'admissions.patient_id', 'patients.id')
            ->select(
                'admissions.*',
                'patients.identification_type_id',
                'patients.identification',
                'patients.email',
                'patients.residence_address',
                'patients.residence_municipality_id',
                'patients.neighborhood_or_residence_id',
                DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')
            )
            ->LeftJoin('location', 'location.admissions_id', 'admissions.id')
            // ->Join('pac_monitoring', 'pac_monitoring.admissions_id', 'admissions.id')
            // ->Join('reason_consultation', 'reason_consultation.admissions_id', 'admissions.id')

            ->where('admissions.discharge_date', '!=', "0000-00-00 00:00:00")
            ->where('location.program_id', 22)
            ->with(
                'status',
                'gender',
                'regime',
                'identification_type',
                'residence_municipality',
                'residence',
                'campus',
                'contract',
                'pac_monitoring',
                'reason_consultation',
                'location',
                'location.admission_route',
                'location.scope_of_attention',
                'location.program',
                'location.flat',
                'location.pavilion',
            )->orderBy('admissions.entry_date', 'DESC')->groupBy('id');


        // if ($request->search) {
        //     $Admissions->where('nombre_completo', 'like', '%' . $request->search . '%')
        //         ->Orwhere('id', 'like', '%' . $request->search . '%');
        // }
        // if ($request->query("pagination", true) === "false") {
        //     $Admissions = $Admissions->get()->toArray();
        // } else {
        //     $page = $request->query("current_page", 1);
        //     $per_page = $request->query("per_page", 10);

        //     $Admissions = $Admissions->paginate($per_page, '*', 'page', $page);
        // }

        if ($request->_sort) {
            $Admissions->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Admissions->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $Admissions = $Admissions->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Admissions = $Admissions->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Admisiones por paciente obtenidos exitosamente',
            'data' => ['admissions' => $Admissions]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdmissionsRequest $request
     * @return JsonResponse
     */
    public function store(AdmissionsRequest $request): JsonResponse
    {
        $count = 0;
        global $Admission;
        $admissions = Admissions::where('patient_id', $request->patient_id)->get()->toArray();
        foreach ($admissions as $admission) {
            $nowlocation = Location::where('admissions_id', $admission['id'])->where('program_id', $request->program_id)->where('scope_of_attention_id', '!=', 2)->get()->toArray();
            if (sizeof($nowlocation) > 0) {
                $count++;
            }
        }

        if ($count == 0) {
            $count      = Admissions::where('patient_id', $request->patient_id)->count();
            $Admissions = new Admissions;
            $Admissions->consecutive = $count + 1;
            $Admissions->diagnosis_id = $request->diagnosis_id;;
            $Admissions->campus_id = $request->campus_id;
            $Admissions->contract_id = $request->contract_id;
            $Admissions->briefcase_id = $request->briefcase_id;
            $Admissions->regime_id = $request->regime_id;
            $Admissions->patient_id = $request->patient_id;
            $Admissions->entry_date = Carbon::now();
            $Admissions->save();
            $LogAdmissions = new LogAdmissions;
            $LogAdmissions->user_id = Auth::user()->id;;
            $LogAdmissions->admissions_id = $Admissions->id;
            $LogAdmissions->status = 'Admisi??n creada';
            $LogAdmissions->save();

            $Location = new Location;
            $Location->admissions_id = $Admissions->id;
            $Location->admission_route_id = $request->admission_route_id;
            $Location->scope_of_attention_id = $request->scope_of_attention_id;
            $Location->procedure_id = $request->procedure_id;
            $Location->program_id = $request->program_id;
            $Location->pavilion_id = $request->pavilion_id;
            $Location->flat_id = $request->flat_id;
            $Location->bed_id = $request->bed_id;
            $Location->user_id = Auth::user()->id;
            $Location->entry_date = Carbon::now();
            $Location->save();
            $LogAdmissions = new LogAdmissions;
            $LogAdmissions->user_id = Auth::user()->id;;
            $LogAdmissions->admissions_id = $Admissions->id;
            $LogAdmissions->status = 'Admisi??n creada';
            $LogAdmissions->save();

            if ($request->admission_route_id == 2) {
                $Admission = Admissions::where('id', $Admissions->id)->with('locationUnique')->first();
            } else if ($request->admission_route_id == 1 && (!isset($request->ambulatory_data) || !$request->ambulatory_data || $request->ambulatory_data == 'null') && $request->scope_of_attention_id) {

                $BillingPad = BillingPad::where('admissions_id', $Admissions->id)
                    ->whereBetween('validation_date', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
                    ->first();
                $TypeContract = TypeContract::select('type_contract.*')
                    ->leftJoin('contract', 'contract.type_contract_id', 'type_contract.id')
                    ->leftJoin('admissions', 'admissions.contract_id', 'contract.id')
                    ->where('admissions.id', $Admissions->id)
                    ->first();
                if (!$BillingPad) {
                    $BillingPad = new BillingPad;
                    $BillingPad->admissions_id = $Admissions->id;
                    $BillingPad->validation_date = Carbon::now();
                    if ($TypeContract->id == 5) {
                        $BillingPad->billing_pad_status_id = 2;
                    } else {
                        $BillingPad->billing_pad_status_id = 1;
                    }
                    $BillingPad->total_value = 0;
                    $BillingPad->save();
                }

                $ChInterconsultation = new ChInterconsultation;
                $ChInterconsultation->services_briefcase_id = $Location->procedure_id;
                $ChInterconsultation->admissions_id = $Admissions->id;
                $ChInterconsultation->save();

                $Authorization = new Authorization;
                $Authorization->services_briefcase_id = $request->procedure_id;
                $Authorization->admissions_id = $Admissions->id;
                $Authorization->auth_number = $request->auth_number;
                $Authorization->file_auth = $request->file_auth;
                $Authorization->location_id = $Location->id;
                $Authorization->ch_interconsultation_id = $ChInterconsultation->id;
                $Authorization->auth_status_id = 3;
                $Authorization->open_date = Carbon::now();
                $Authorization->save();
            }

            if ($request->ambulatory_data && $request->ambulatory_data != 'null') {

                $medical_diary_days = MedicalDiaryDays::find($request->ambulatory_data);
                $medical_diary_days->admissions_id = $Admissions->id;
                $medical_diary_days->medical_status_id = 4;
                if($request->copay_id){
                    $medical_diary_days->copay_id = $request->copay_id;
                }
                if($request->copay_value){
                    $medical_diary_days->copay_value = $request->copay_value;
                }
                $medical_diary_days->save();

                $BillingPad = BillingPad::where('admissions_id', $Admissions->id)
                    ->whereBetween('validation_date', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
                    ->first();
                $TypeContract = TypeContract::select('type_contract.*')
                    ->leftJoin('contract', 'contract.type_contract_id', 'type_contract.id')
                    ->leftJoin('admissions', 'admissions.contract_id', 'contract.id')
                    ->where('admissions.id', $Admissions->id)
                    ->first();
                if (!$BillingPad) {
                    $BillingPad = new BillingPad;
                    $BillingPad->admissions_id = $Admissions->id;
                    $BillingPad->validation_date = Carbon::now();
                    if ($TypeContract->id == 5) {
                        $BillingPad->billing_pad_status_id = 2;
                    } else {
                        $BillingPad->billing_pad_status_id = 1;
                    }
                    $BillingPad->total_value = 0;
                    $BillingPad->save();
                }

                $Authorization = new Authorization;
                $Authorization->services_briefcase_id =  $medical_diary_days->services_briefcase_id;
                $Authorization->admissions_id = $Admissions->id;
                $Authorization->medical_diary_days_id = $request->ambulatory_data;
                // $Authorization->medical_diary_days_id = $request->ambulatory_data;
                if ($request->file('file_auth')) {
                    $path = Storage::disk('public')->put('file_auth', $request->file('file_auth'));
                    $Authorization->file_auth = $path;
                }

                $Authorization->auth_number = $request->auth_number;

                $Authorization->auth_status_id =  2;
                if($request->copay_value != 0){
                    $Authorization->copay = 1;
                } else {
                    $Authorization->copay = null;
                }


                $Authorization->copay_value =  $medical_diary_days->copay_value;
                $Authorization->auth_status_id = $request->auth_number == null ? $Authorization->auth_status_id : 3;
                $Authorization->save();
            }

            /**
             * se quita Else para creaci??n de auth pad
             * @param int $procedure_id
             */
            // else {
            //     $Authorization = new  Authorization;
            //     $Authorization->services_briefcase_id =  $request->procedure_id;
            //     $Authorization->admissions_id =  $Admissions->id;
            //     $validate = Briefcase::select('briefcase.*')->where('id',  $request->briefcase_id)->first();
            //     if ($validate->type_auth == 1) {
            //         $Authorization->auth_status_id =  2;
            //     } else {
            //         $Authorization->auth_status_id =  1;
            //     }

            //     $Authorization->save();
            // }

            // if ($Admissions->procedure_id) {
            //     $Authorization = new  Authorization;
            //     $Authorization->services_briefcase_id =  $Admissions->procedure_id;
            //     $Authorization->admissions_id =  $Admissions->id;
            //     $validate = Briefcase::select('briefcase.*')->where('id',  $request->briefcase_id)->first();
            //     if ($validate->type_auth == 1) {
            //         $Authorization->auth_status_id =  2;
            //     } else {
            //         $Authorization->auth_status_id =  1;
            //     }

            //     $Authorization->save();
            // }

            $pattient = Patient::where('id', $request->patient_id)->get()->toArray();
            $ref = Reference::where('identification', $pattient[0]['identification'])
                ->whereNull('admissions_id')
                ->where('reference_status_id', 3)
                ->orderBy('reference.id', 'DESC')
                ->get()->first();
            if ($ref) {
                $ref->admissions_id = $Admissions->id;
                $ref->save();
            }


            if ($request->bed_id) {
                $Bed = Bed::find($request->bed_id);
                $Bed->status_bed_id = 2;
                $Bed->identification = null;
                $Bed->reservation_date = null;
                $Bed->save();
            }

            if ($request->ambulatory_data && $request->ambulatory_data != 'null') {

                $medical_diary_days = MedicalDiaryDays::find($request->ambulatory_data);
                $medical_diary_days->admissions_id = $Admissions->id;
                $medical_diary_days->medical_status_id = 4;
                $medical_diary_days->save();
            }

            if ($request->reference_id) {
                $Reference = Reference::find($request->reference_id);
                $Reference->reference_status_id = 4;
                $Reference->save();
            }


            return response()->json([
                'status' => true,
                'message' => 'Admisi??n creado exitosamente',
                'data' => ['admissions' => $Admissions->toArray()],
                'dataAux' => ['aux' =>  $Admission ? $Admission->toArray() : null]
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Ya se creo una admisi??n con el mismo programa',
            ]);
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
        $Admissions = Admissions::where('id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Admisi??n obtenido exitosamente',
            'data' => ['admissions' => $Admissions]
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
        if ($request->medical_date == '0000-00-00 00:00:00') {
            $Admissions = Admissions::find($id);
            $Admissions->discharge_date = Carbon::now();
            $Admissions->save();

            if ($request->bed_id != null) {
                $Bed = Bed::find($request->bed_id);
                $Bed->status_bed_id = 1;
                $Bed->identification = null;
                $Bed->reservation_date = null;
                $Bed->save();
            }
        } else if ($request->reversion == true) {
            $Admissions = Admissions::find($id);
            $Admissions->medical_date = '0000-00-00 00:00:00';
            $Admissions->save();
        } else if ($request->user_medical_id) {
            $Admissions = Admissions::find($id);
            $Admissions->medical_date = Carbon::now();
            $Admissions->user_medical_id = $request->user_medical_id;
            $Admissions->save();
        } else {
            $Admissions = Admissions::find($id);
            $Admissions->campus_id = $request->campus_id;
            $Admissions->contract_id = $request->contract_id;
            $Admissions->briefcase_id = $request->briefcase_id;
            // $Admissions->procedure_id = $request->procedure_id;
            $Admissions->patient_id = $request->patient_id;
            $Admissions->save();
        }

        $LogAdmissions = new LogAdmissions;
        $LogAdmissions->user_id = Auth::user()->id;;
        $LogAdmissions->admissions_id = $Admissions->id;
        $LogAdmissions->status = 'Admisi??n actualizada';
        $LogAdmissions->save();

        return response()->json([
            'status' => true,
            'message' => 'Admisi??n actualizado exitosamente',
            'data' => ['admissions' => $Admissions]
        ]);
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
            $Admissions = Admissions::find($id);
            $Admissions->delete();

            return response()->json([
                'status' => true,
                'message' => 'Admisi??n eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Admisi??n est?? en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
