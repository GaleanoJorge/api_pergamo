<?php

namespace App\Http\Controllers\Management;

use iio\libmergepdf\Merger;
use App\Http\Controllers\Controller;
use App\Models\AccountReceivable;
use App\Models\Admissions;
use App\Models\AssignedManagementPlan;
use App\Models\Assistance;
use App\Models\AssistanceSpecial;
use App\Models\AssistanceSupplies;
use App\Models\AuthBillingPad;
use App\Models\Authorization;
use App\Models\Base\SwEducation;
use App\Models\ChNursingNote;
use App\Models\ChSwSupportNetwork;
use App\Models\ServicesBriefcase;
use App\Models\BillingPad;
use App\Models\BillUserActivity;
use App\Models\ChAp;
use DateTime;
use App\Models\ChAssSigns;
use App\Models\ChAuscultation;
use App\Models\ChBackground;
use App\Models\ChCarePlan;
use App\Models\ChDiagnosis;
use App\Models\ChDiagnosticAids;
use App\Models\ChDietsEvo;
use App\Models\ChEBalanceFT;
use App\Models\ChEDailyActivitiesOT;
use App\Models\ChEDiagnosisFT;
use App\Models\ChEFlexibilityFT;
use App\Models\ChEMarchFT;
use App\Models\ChEMSAcuityOT;
use App\Models\ChEMSAssessmentOT;
use App\Models\ChEMSCommunicationOT;
use App\Models\ChEMSComponentOT;
use App\Models\ChEMSDisAuditoryOT;
use App\Models\ChEMSDisTactileOT;
use App\Models\ChEMSFunPatOT;
use App\Models\ChEMSIntPatOT;
use App\Models\ChEMSMovPatOT;
use App\Models\ChEMSTestOT;
use App\Models\ChEMSThermalOT;
use App\Models\ChEMSWeeklyOT;
use App\Models\ChEMuscularStrengthFT;
use App\Models\ChEMuscularToneFT;
use App\Models\ChEOccHistoryOT;
use App\Models\ChEPainFT;
use App\Models\ChEPastOT;
use App\Models\ChEPositionFT;
use App\Models\ChEReflectionFT;
use App\Models\ChESensibilityFT;
use App\Models\ChESysIntegumentaryFT;
use App\Models\ChESysMusculoskeletalFT;
use App\Models\ChETherGoalsFT;
use App\Models\ChEValorationFT;
use App\Models\ChEValorationOT;
use App\Models\ChEValorationTherFT;
use App\Models\ChEvoSoap;
use App\Models\ChEWeeklyFT;
use App\Models\ChFailed;
use App\Models\ChFormulation;
use App\Models\ChGynecologists;
use App\Models\ChHairValoration;
use App\Models\ChInability;
use App\Models\ChInterconsultation;
use App\Models\ChLiquidControl;
use App\Models\ChMedicalCertificate;
use App\Models\ChMedicalOrders;
use App\Models\ChNotesDescription;
use App\Models\ChNursingProcedure;
use App\Models\ChObjectivesTherapy;
use App\Models\ChOstomies;
use App\Models\ChOxigen;
use App\Models\ChOxygenTherapy;
use App\Models\ChPatientExit;
use App\Models\ChPhysicalExam;
use App\Models\ChPosition;
use App\Models\ChReasonConsultation;
use App\Models\ChRecommendationsEvo;
use App\Models\ChRecord;
use App\Models\ChRespiratoryTherapy;
use App\Models\ChRNMaterialsOT;
use App\Models\ChRNValorationOT;
use App\Models\ChRtInspection;
use App\Models\ChRtSessions;
use App\Models\ChScaleBarthel;
use App\Models\ChScaleBraden;
use App\Models\ChScaleEcog;
use App\Models\ChScaleFac;
use App\Models\ChScaleFragility;
use App\Models\ChScaleGlasgow;
use App\Models\ChScaleJhDownton;
use App\Models\ChScaleKarnofsky;
use App\Models\ChScaleNews;
use App\Models\ChScaleNorton;
use App\Models\ChScalePain;
use App\Models\ChScalePayette;
use App\Models\ChScalePediatricNutrition;
use App\Models\ChScaleRedCross;
use App\Models\ChScaleScreening;
use App\Models\ChScaleWongBaker;
use App\Models\ChScaleZarit;
use App\Models\ChSkinValoration;
use App\Models\ChSystemExam;
use App\Models\ChTherapeuticAss;
use App\Models\ChVitalSigns;
use App\Models\CifDiagnosisTl;
use App\Models\CognitiveTl;
use App\Models\CommunicationTl;
use App\Models\HearingTl;
use App\Models\InputMaterialsUsedTl;
use App\Models\InterventionTl;
use App\Models\LanguageTl;
use App\Models\Location;
use App\Models\LocationCapacity;
use App\Models\ManagementPlan;
use App\Models\MinimumSalary;
use App\Models\NeighborhoodOrResidence;
use App\Models\NumberMonthlySessionsTl;
use App\Models\OrofacialTl;
use App\Models\OstomiesTl;
use App\Models\Patient;
use App\Models\SpecificTestsTl;
use App\Models\SpeechTl;
use App\Models\SwallowingDisordersTL;
use App\Models\Tariff;
use App\Models\TherapeuticGoalsTl;
use App\Models\TherapyConceptTl;
use App\Models\TlTherapyLanguage;
use App\Models\TlTherapyLanguageRegular;
use App\Models\TypeContract;
use App\Models\VoiceAlterationsTl;
use App\Models\ChNutritionAnthropometry;
use App\Models\ChNutritionGastrointestinal;
use App\Models\ChNutritionFoodHistory;
use App\Models\ChNutritionInterpretation;
use App\Models\ChNutritionParenteral;
use App\Models\PharmacyProductRequest;
use App\Models\ChSwDiagnosis;
use App\Models\ChSwFamily;
use App\Models\ChSwNursing;
use App\Models\ChSwOccupationalHistory;
use App\Models\ChSwFamilyDynamics;
use App\Models\ChSwRiskFactors;
use App\Models\ChSwHousingAspect;
use App\Models\ChSwConditionHousing;
use App\Models\ChSwHygieneHousing;
use App\Models\ChSwIncome;
use App\Models\ChSwExpenses;
use App\Models\ChSwEconomicAspects;
use App\Models\ChSwArmedConflict;
use App\Models\ChPsAssessment;
use App\Models\ChPsConsciousness;
use App\Models\ChPsRelationship;
use App\Models\ChPsIntellective;
use App\Models\ChPsIntervention;
use App\Models\ChPsThought;
use App\Models\ChPsLanguage;
use App\Models\ChPsMultiaxial;
use App\Models\ChPsObjectives;
use App\Models\ChPsOperationalization;
use App\Models\ChPsSphere;
use App\Models\ChPsSynthesis;
use App\Models\RoleAttention;
use App\Models\Tracing;
use App\Models\ChNRMaterialsFT;
use App\Models\MedicalDiaryDays;
use App\Models\Disclaimer;
use App\Models\PadRisk;
use App\Models\Program;
use App\Models\TypeOfAttention;
use App\Models\User;
use Carbon\Carbon;
use Dompdf\Dompdf as PDF;
use Dompdf\Options;
use FontLib\Table\Type\post;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Ramsey\Uuid\Type\Integer;

class ChRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChRecord = ChRecord::with(
            'user',
            'admissions',
            'admissions.location',
            'admissions.location.program',
            'admissions.patients',
        );

        if ($request->_sort) {
            $ChRecord->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChRecord->where('status', 'like', '%' . $request->search . '%');
        }

        if ($request->record_id) {
            $ChRecord->where('id', $request->record_id)
                ->with(
                    'assigned_management_plan.management_plan.management_procedure.services_briefcase.manual_price'
                );
        }

        if ($request->query("pagination", true) == "false") {
            $ChRecord = $ChRecord->get()->toArray();
            if ($request->record_id) {
                $validate = ChRecord::select()
                    // ->leftJoin('ch_reason_consultation', 'ch_reason_consultation.ch_record_id', 'ch_record.id')
                    // ->leftJoin('ch_position', 'ch_position.ch_record_id', 'ch_record.id')
                    // ->leftJoin('ch_e_valoration_o_t', 'ch_e_valoration_o_t.ch_record_id', 'ch_record.id')
                    // ->leftJoin('ch_nutrition_anthropometry', 'ch_nutrition_anthropometry.ch_record_id', 'ch_record.id')
                    // ->leftJoin('tl_therapy_language', 'tl_therapy_language.ch_record_id', 'ch_record.id')
                    // ->leftJoin('ch_respiratory_therapy', 'ch_respiratory_therapy.ch_record_id', 'ch_record.id')
                    // ->leftJoin('ch_e_valoration_f_t', 'ch_e_valoration_f_t.ch_record_id', 'ch_record.id')
                    // ->leftJoin('ch_sw_diagnosis', 'ch_sw_diagnosis.ch_record_id', 'ch_record.id')
                    // ->leftJoin('ch_ps_assessment', 'ch_ps_assessment.ch_record_id', 'ch_record.id')




                    // ->where(function ($query) {
                    //     $query->where(function ($q) {
                    //         $q->where('ch_reason_consultation.type_record_id', 1)
                    //             ->whereNotNull('ch_reason_consultation.id');
                    //     })
                    //         ->orWhere(function ($q) {
                    //             $q->where('ch_position.type_record_id', 1)
                    //                 ->whereNotNull('ch_position.id');
                    //         })
                    //         ->orWhere(function ($q) {
                    //             $q->where('ch_e_valoration_o_t.type_record_id', 1)
                    //                 ->whereNotNull('ch_e_valoration_o_t.id');
                    //         })
                    //         ->orWhere(function ($q) {
                    //             $q->where('ch_nutrition_anthropometry.type_record_id', 1)
                    //                 ->whereNotNull('ch_nutrition_anthropometry.id');
                    //         })
                    //         ->orWhere(function ($q) {
                    //             $q->where('tl_therapy_language.type_record_id', 1)
                    //                 ->whereNotNull('tl_therapy_language.id');
                    //         })
                    //         ->orWhere(function ($q) {
                    //             $q->where('ch_respiratory_therapy.type_record_id', 1)
                    //                 ->whereNotNull('ch_respiratory_therapy.id');
                    //         })
                    //         ->orWhere(function ($q) {
                    //             $q->where('ch_e_valoration_f_t.type_record_id', 1)
                    //                 ->whereNotNull('ch_e_valoration_f_t.id');
                    //         })
                    //         ->orWhere(function ($q) {
                    //             $q->where('ch_sw_diagnosis.type_record_id', 1)
                    //                 ->whereNotNull('ch_sw_diagnosis.id');
                    //         })
                    //         ->orWhere(function ($q) {
                    //             $q->where('ch_ps_assessment.type_record_id', 1)
                    //                 ->whereNotNull('ch_ps_assessment.id');
                    //         });
                    // })

                    ->where('ch_record.admissions_id', $ChRecord[0]['admissions_id'])
                    ->where('ch_record.ch_type_id', $ChRecord[0]['ch_type_id'])
                    ->where('status', 'CERRADO')
                    ->get()->toArray();
                if (count($validate) > 0 || $ChRecord[0]['ch_type_id'] == 20) {
                    $ChRecord[0]['has_input'] = true;
                } else {
                    $ChRecord[0]['has_input'] = false;
                }
            }
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChRecord = $ChRecord->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Registro paciente obtenidos exitosamente',
            'data' => ['ch_record' => $ChRecord],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ValidateSpeciality()
    {
        $array_aux = array(
            137 => 5,
            135 => 7,
            136 => 6,
            134 => 4
        );

        $user_id = Auth::user()->id;
        $AssitanceSpecial =  AssistanceSpecial::select('assistance_special.*')
            ->leftJoin('assistance', 'assistance_special.assistance_id', 'assistance.id')
            ->with(
                'specialty'
            )
            ->where('assistance.user_id', $user_id)
            ->get()->toArray();

        if (count($AssitanceSpecial) > 0) {
            return $array_aux[$AssitanceSpecial[0]['specialty_id']];
        } else {

            return  $AssitanceSpecial;
            // $this->SendSelect($AssitanceSpecial);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SendSelect($selectorsend): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => 'Se requiere seleccionar especializaci??n',
            'data' => ['assictance_special' => $selectorsend],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byadmission(Request $request, int $id, int $id2): JsonResponse
    {
        $ChRecord = ChRecord::with(
            'user',
            'admissions',
            'admissions.patients',
            'assigned_management_plan',
            'assigned_management_plan.management_plan',
            'assigned_management_plan.management_plan.type_of_attention',
        )->where('admissions_id', $id);

        if ($request->ext_con) {
            $ChRecord->where('medical_diary_days_id', $id2);
        } else {
            $ChRecord->where('assigned_management_plan_id', $id2);
        }

        if ($request->_sort) {
            $ChRecord->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChRecord->where('status', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChRecord = $ChRecord->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChRecord = $ChRecord->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Registro paciente obtenidos exitosamente',
            'data' => ['ch_record' => $ChRecord],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byInterconsultation(Request $request, int $id, int $id2): JsonResponse
    {

        $ChInterconsultation = ChInterconsultation::find($id2);

        $ChRecord = ChRecord::select('ch_record.*')
            ->with(
                'ch_type',
                'user',
                'admissions',
                'admissions.patients',
                'assigned_management_plan',
                'assigned_management_plan.management_plan',
                'assigned_management_plan.management_plan.type_of_attention',
            )
            ->leftJoin('admissions', 'admissions.id', 'ch_record.admissions_id')
            ->leftJoin('location', 'location.admissions_id', 'admissions.id')
            ->leftJoin('ch_interconsultation', 'ch_interconsultation.id', 'ch_record.ch_interconsultation_id')
            ->where('ch_record.admissions_id', $id)
            ->where(function ($q) use ($ChInterconsultation, $id2) {
                if ($ChInterconsultation->ch_record_id) {
                    $q->where('ch_record.ch_interconsultation_id', $id2);
                } else {
                    // $q->whereNull('ch_interconsultation.ch_record_id');
                }
            })
            ->groupBy('ch_record.id');

        $ChRecord->orderBy('ch_record.created_at', 'DESC');

        if ($request->_sort) {
            $ChRecord->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChRecord->where('ch_record.status', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChRecord = $ChRecord->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChRecord = $ChRecord->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Registro paciente obtenidos exitosamente',
            'data' => ['ch_record' => $ChRecord],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ViewCertification(int $id)
    {
        $fecharecord = 0;



        ///Certificado
        ///////////////////////////////////////////////////////////////////////////////////////



        $ChSwSupportNetwork = ChSwSupportNetwork::with(
            'ch_sw_network',
            'ch_sw_entity'
        )->where('id', $id)->get()->toArray();


        $ChRecord = ChRecord::with(
            'user',
            'user.assistance',
            'user.user_role.role',
            'admissions.contract',
            'admissions.contract.company',
            'admissions',
            'admissions.patients',
            'admissions.patients.academic_level',
            'admissions.patients.municipality',
            'admissions.patients.ethnicity',
            'admissions.patients.gender',
            'admissions.patients.identification_type',
            'admissions.patients.residence_municipality',
            'admissions.patients.residence',
            'admissions.patients.marital_status',
            'admissions.patients.population_group',
            'admissions.patients.activities',
            'admissions.contract.type_briefcase',
            'assigned_management_plan',
            'assigned_management_plan.management_plan',
            'assigned_management_plan.management_plan.type_of_attention',
            'assigned_management_plan.management_plan.procedure.manual_price',
            'assigned_management_plan.management_plan.service_briefcase.manual_price',
            'assigned_management_plan.management_plan.route_administration',
            // 'assistance_supplies',
            // 'assistance_supplies.user_incharge_id',
            // 'assistance_supplies.application_hour',
        )->where('id', $ChSwSupportNetwork[0]['ch_record_id'])->get()->toArray();


        $imagenComoBase64 = null;

        $fecharecord = Carbon::parse($ChRecord[0]['updated_at'])->format('d-m-Y h:i:s');


        if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
            $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
            $contenidoBinario = file_get_contents($rutaImagen);
            $imagenComoBase64 = base64_encode($contenidoBinario);
        } else {
            $imagenComoBase64 = null;
            return response()->json([
                'status' => false,
                'message' => 'No se encontr?? firma por parte del personal asistencial para generar este documento, por favor diligenciar su firma desde su perfil',

            ]);
        }

        $today = Carbon::now();

        $Patients = $ChRecord[0]['admissions']['patients'];


        $html = view('mails.SWCertification', [
            'chrecord' => $ChRecord,
            'ChSwSupportNetwork' => $ChSwSupportNetwork,
            'fecharecord' => $fecharecord,

            'firm' => $imagenComoBase64,
            'today' => $today,

        ])->render();

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new PDF($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('Carta', 'portrait');
        $dompdf->render();
        $this->injectPageCount($dompdf);
        $file = $dompdf->output();

        $name = 'prueba.pdf';

        Storage::disk('public')->put($name, $file);



        return response()->json([
            'status' => true,
            'persona' => $Patients,
            'ch' => $ChRecord,
            'message' => 'Reporte generado exitosamente',
            'url' => asset('/storage' . '/' . $name),
        ]);
    }

    public function ViewFormulation(int $id)
    {
        $fecharecord = 0;



        ///Fomula M??dica
        ///////////////////////////////////////////////////////////////////////////////////////


        //Formulaci??n
        $ChFormulation = ChFormulation::with(
            'product_generic',
            'product_generic.measurement_units',
            'product_generic.multidose_concentration',
            'administration_route',
            'hourly_frequency',
            'product_supplies'
        )
            ->where('id', $id)->get()->toArray();


        $ChRecord = ChRecord::with(
            'user',
            'user.assistance',
            'user.user_role.role',
            'admissions.contract',
            'admissions.contract.company',
            'admissions',
            'admissions.patients',
            'admissions.patients.academic_level',
            'admissions.patients.municipality',
            'admissions.patients.ethnicity',
            'admissions.patients.gender',
            'admissions.patients.identification_type',
            'admissions.patients.residence_municipality',
            'admissions.patients.residence',
            'admissions.patients.marital_status',
            'admissions.patients.population_group',
            'admissions.patients.activities',
            'admissions.contract.type_briefcase',
            'assigned_management_plan',
            'assigned_management_plan.management_plan',
            'assigned_management_plan.management_plan.type_of_attention',
            'assigned_management_plan.management_plan.procedure.manual_price',
            'assigned_management_plan.management_plan.service_briefcase.manual_price',
            'assigned_management_plan.management_plan.route_administration',
            // 'assistance_supplies',
            // 'assistance_supplies.user_incharge_id',
            // 'assistance_supplies.application_hour',
        )->where('id', $ChFormulation[0]['ch_record_id'])


            ->get()->toArray();



        $imagenComoBase64 = null;

        $fecharecord = Carbon::parse($ChRecord[0]['updated_at'])->format('d-m-Y h:i:s');



        if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
            $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
            $contenidoBinario = file_get_contents($rutaImagen);
            $imagenComoBase64 = base64_encode($contenidoBinario);
        } else {
            $imagenComoBase64 = null;
            return response()->json([
                'status' => false,
                'message' => 'No se encontr?? firma por parte del personal asistencial para generar este documento, por favor diligenciar su firma desde su perfil',

            ]);
        }

        $today = Carbon::now();

        $Patients = $ChRecord[0]['admissions']['patients'];


        $html = view('mails.chFormulation', [
            'chrecord' => $ChRecord,
            'ChFormulation' => $ChFormulation,
            'fecharecord' => $fecharecord,
            'firm' => $imagenComoBase64,
            'today' => $today,

        ])->render();

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new PDF($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('Carta', 'portrait');
        $dompdf->render();
        $this->injectPageCount($dompdf);
        $file = $dompdf->output();

        $name = 'formula.pdf';

        Storage::disk('public')->put($name, $file);




        return response()->json([
            'status' => true,
            'persona' => $ChFormulation,
            'ch' => $ChRecord,
            'message' => 'Reporte generado exitosamente',
            'url' => asset('/storage' . '/' . $name),
        ]);
    }

    public function ViewAllFormulation(int $id)
    {
        $fecharecord = 0;

        ///Fomula M??dica
        ///////////////////////////////////////////////////////////////////////////////////////

        $ChRecord = ChRecord::select('ch_record.*')
            ->with(
                'user',
                'user.assistance',
                'user.user_role.role',
                'admissions.contract',
                'admissions.contract.company',
                'admissions',
                'admissions.patients',
                'admissions.patients.academic_level',
                'admissions.patients.municipality',
                'admissions.patients.ethnicity',
                'admissions.patients.gender',
                'admissions.patients.identification_type',
                'admissions.patients.residence_municipality',
                'admissions.patients.residence',
                'admissions.patients.marital_status',
                'admissions.patients.population_group',
                'admissions.patients.activities',
                'admissions.contract.type_briefcase',
                'assigned_management_plan',
                'assigned_management_plan.management_plan',
                'assigned_management_plan.management_plan.type_of_attention',
                'assigned_management_plan.management_plan.procedure.manual_price',
                'assigned_management_plan.management_plan.service_briefcase.manual_price',
                'assigned_management_plan.management_plan.route_administration',
                // 'assistance_supplies',
                // 'assistance_supplies.user_incharge_id',
                // 'assistance_supplies.application_hour',
            )
            ->where('id', $id)->get()->toArray();

        $ChFormulation = ChFormulation::with(
            'product_generic',
            'product_generic.measurement_units',
            'product_generic.multidose_concentration',
            'administration_route',
            'hourly_frequency',
            'product_supplies'
        )
            ->leftJoin('ch_record', 'ch_formulation.ch_record_id', 'ch_record.id')
            ->where('ch_record.id', $ChRecord[0]['id'])->get()->toArray();

        $imagenComoBase64 = null;

        $fecharecord = Carbon::parse($ChRecord[0]['updated_at'])->format('d-m-Y h:i:s');



        if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
            $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
            $contenidoBinario = file_get_contents($rutaImagen);
            $imagenComoBase64 = base64_encode($contenidoBinario);
        } else {
            $imagenComoBase64 = null;
            return response()->json([
                'status' => false,
                'message' => 'No se encontr?? firma por parte del personal asistencial para generar este documento, por favor diligenciar su firma desde su perfil',

            ]);
        }

        $today = Carbon::now();

        $Patients = $ChRecord[0]['admissions']['patients'];


        $html = view('mails.chAllFormulation', [
            'chrecord' => $ChRecord,
            'ChFormulation' => $ChFormulation,
            'fecharecord' => $fecharecord,
            'firm' => $imagenComoBase64,
            'today' => $today,

        ])->render();

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new PDF($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('Carta', 'portrait');
        $dompdf->render();
        $this->injectPageCount($dompdf);
        $file = $dompdf->output();

        $name = 'formulaciones.pdf';

        Storage::disk('public')->put($name, $file);




        return response()->json([
            'status' => true,
            'persona' => $ChFormulation,
            'ch' => $ChRecord,
            'message' => 'Reporte generado exitosamente',
            'url' => asset('/storage' . '/' . $name),
        ]);
    }

    public function ViewMedicalOrder(int $id)
    {
        $fecharecord = 0;



        //Ordenes M??dicas
        $ChMedicalOrders = ChMedicalOrders::with(
            'procedure',
            'frequency',
            'services_briefcase',
            'services_briefcase.manual_price',
            'services_briefcase.manual_price.procedure',
        )
            ->where('id', $id)->get()->toArray();


        $ChRecord = ChRecord::with(
            'user',
            'user.assistance',
            'user.user_role.role',
            'admissions.contract',
            'admissions.contract.company',
            'admissions',
            'admissions.patients',
            'admissions.patients.academic_level',
            'admissions.patients.municipality',
            'admissions.patients.ethnicity',
            'admissions.patients.gender',
            'admissions.patients.identification_type',
            'admissions.patients.residence_municipality',
            'admissions.patients.residence',
            'admissions.patients.marital_status',
            'admissions.patients.population_group',
            'admissions.patients.activities',
            'admissions.contract.type_briefcase',
            'assigned_management_plan',
            'assigned_management_plan.management_plan',
            'assigned_management_plan.management_plan.type_of_attention',
            'assigned_management_plan.management_plan.procedure.manual_price',
            'assigned_management_plan.management_plan.service_briefcase.manual_price',
            'assigned_management_plan.management_plan.route_administration',
            // 'assistance_supplies',
            // 'assistance_supplies.user_incharge_id',
            // 'assistance_supplies.application_hour',
        )


            ->where('id', $ChMedicalOrders[0]['ch_record_id'])->get()->toArray();

        $imagenComoBase64 = null;

        $fecharecord = Carbon::parse($ChRecord[0]['updated_at'])->format('d-m-Y h:i:s');



        if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
            $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
            $contenidoBinario = file_get_contents($rutaImagen);
            $imagenComoBase64 = base64_encode($contenidoBinario);
        } else {
            $imagenComoBase64 = null;
            return response()->json([
                'status' => false,
                'message' => 'No se encontr?? firma por parte del personal asistencial para generar este documento, por favor diligenciar su firma desde su perfil',

            ]);
        }

        $today = Carbon::now();

        $Patients = $ChRecord[0]['admissions']['patients'];


        $html = view('mails.chMedicalOrder', [
            'chrecord' => $ChRecord,
            'ChMedicalOrders' => $ChMedicalOrders,
            'fecharecord' => $fecharecord,
            'firm' => $imagenComoBase64,
            'today' => $today,

        ])->render();

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new PDF($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('Carta', 'portrait');
        $dompdf->render();
        $this->injectPageCount($dompdf);
        $file = $dompdf->output();

        $name = 'ordenmedica.pdf';

        Storage::disk('public')->put($name, $file);



        $Patients = $ChRecord[0]['admissions']['patients'];

        return response()->json([
            'status' => true,
            'persona' => $ChMedicalOrders,
            'ch' => $ChRecord,
            'message' => 'Reporte generado exitosamente',
            'url' => asset('/storage' . '/' . $name),
        ]);
    }

    public function ViewAllMedicalOrder(int $id)
    {
        $fecharecord = 0;

        ///Orden M??dica
        ///////////////////////////////////////////////////////////////////////////////////////

        $ChRecord = ChRecord::select('ch_record.*')
            ->with(
                'user',
                'user.assistance',
                'user.user_role.role',
                'admissions.contract',
                'admissions.contract.company',
                'admissions',
                'admissions.patients',
                'admissions.patients.academic_level',
                'admissions.patients.municipality',
                'admissions.patients.ethnicity',
                'admissions.patients.gender',
                'admissions.patients.identification_type',
                'admissions.patients.residence_municipality',
                'admissions.patients.residence',
                'admissions.patients.marital_status',
                'admissions.patients.population_group',
                'admissions.patients.activities',
                'admissions.contract.type_briefcase',
                'assigned_management_plan',
                'assigned_management_plan.management_plan',
                'assigned_management_plan.management_plan.type_of_attention',
                'assigned_management_plan.management_plan.procedure.manual_price',
                'assigned_management_plan.management_plan.service_briefcase.manual_price',
                'assigned_management_plan.management_plan.route_administration',
                // 'assistance_supplies',
                // 'assistance_supplies.user_incharge_id',
                // 'assistance_supplies.application_hour',
            )
            ->where('id', $id)->get()->toArray();

        $ChMedicalOrders = ChMedicalOrders::with(
            'procedure',
            'frequency',
            'services_briefcase',
            'services_briefcase.manual_price',
            'services_briefcase.manual_price.procedure',    

        )

            ->leftJoin('ch_record', 'ch_medical_orders.ch_record_id', 'ch_record.id')
            ->where('ch_record.id', $ChRecord[0]['id'])->get()->toArray();

        $imagenComoBase64 = null;

        $fecharecord = Carbon::parse($ChRecord[0]['updated_at'])->format('d-m-Y h:i:s');



        if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
            $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
            $contenidoBinario = file_get_contents($rutaImagen);
            $imagenComoBase64 = base64_encode($contenidoBinario);
        } else {
            $imagenComoBase64 = null;
            return response()->json([
                'status' => false,
                'message' => 'No se encontr?? firma por parte del personal asistencial para generar este documento, por favor diligenciar su firma desde su perfil',

            ]);
        }

        $today = Carbon::now();

        $Patients = $ChRecord[0]['admissions']['patients'];


        $html = view('mails.chAllMedicalOrder', [
            'chrecord' => $ChRecord,
            'ChMedicalOrders' => $ChMedicalOrders,
            'fecharecord' => $fecharecord,
            'firm' => $imagenComoBase64,
            'today' => $today,

        ])->render();

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new PDF($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('Carta', 'portrait');
        $dompdf->render();
        $this->injectPageCount($dompdf);
        $file = $dompdf->output();

        $name = 'ordenesmedicas.pdf';

        Storage::disk('public')->put($name, $file);




        return response()->json([
            'status' => true,
            'persona' => $ChMedicalOrders,
            'ch' => $ChRecord,
            'message' => 'Reporte generado exitosamente',
            'url' => asset('/storage' . '/' . $name),
        ]);
    }

    public function ViewInability(int $id)
    {
        $fecharecord = 0;



        //Incapacidad
        $ChInability = ChInability::with(
            'ch_contingency_code',
            'ch_type_inability',
            'ch_type_procedure',
            'diagnosis'
        )
            ->where('id', $id)->get()->toArray();


        $ChRecord = ChRecord::with(
            'user',
            'user.assistance',
            'user.user_role.role',
            'admissions.contract',
            'admissions.contract.company',
            'admissions',
            'admissions.patients',
            'admissions.patients.academic_level',
            'admissions.patients.municipality',
            'admissions.patients.ethnicity',
            'admissions.patients.gender',
            'admissions.patients.identification_type',
            'admissions.patients.residence_municipality',
            'admissions.patients.residence',
            'admissions.patients.marital_status',
            'admissions.patients.population_group',
            'admissions.patients.activities',
            'admissions.contract.type_briefcase',
            'assigned_management_plan',
            'assigned_management_plan.management_plan',
            'assigned_management_plan.management_plan.type_of_attention',
            'assigned_management_plan.management_plan.procedure.manual_price',
            'assigned_management_plan.management_plan.service_briefcase.manual_price',
            'assigned_management_plan.management_plan.route_administration',
            // 'assistance_supplies',
            // 'assistance_supplies.user_incharge_id',
            // 'assistance_supplies.application_hour',
        )


            ->where('id', $ChInability[0]['ch_record_id'])->get()->toArray();

        $imagenComoBase64 = null;

        $fecharecord = Carbon::parse($ChRecord[0]['updated_at'])->format('d-m-Y h:i:s');

        $Patients = $ChRecord[0]['admissions']['patients'];


        if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
            $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
            $contenidoBinario = file_get_contents($rutaImagen);
            $imagenComoBase64 = base64_encode($contenidoBinario);
        } else {
            $imagenComoBase64 = null;
            return response()->json([
                'status' => false,
                'message' => 'No se encontr?? firma por parte del personal asistencial para generar este documento, por favor diligenciar su firma desde su perfil',

            ]);
        }

        $today = Carbon::now();

        $Patients = $ChRecord[0]['admissions']['patients'];


        $html = view('mails.chInability', [
            'chrecord' => $ChRecord,
            'ChInability' => $ChInability,
            'fecharecord' => $fecharecord,
            'firm' => $imagenComoBase64,
            'today' => $today,

        ])->render();

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new PDF($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('Carta', 'portrait');
        $dompdf->render();
        $this->injectPageCount($dompdf);
        $file = $dompdf->output();

        $name = 'Incapacidad M??dica.pdf';

        Storage::disk('public')->put($name, $file);




        return response()->json([
            'status' => true,
            'persona' => $ChInability,
            'ch' => $ChRecord,
            'message' => 'Reporte generado exitosamente',
            'url' => asset('/storage' . '/' . $name),
        ]);
    }

    public function ViewCertificate(int $id)
    {
        $fecharecord = 0;



        //Certificado
        $ChMedicalCertificate = ChMedicalCertificate::where('id', $id)->get()->toArray();


        $ChRecord = ChRecord::with(
            'user',
            'user.assistance',
            'user.user_role.role',
            'admissions.contract',
            'admissions.contract.company',
            'admissions',
            'admissions.patients',
            'admissions.patients.academic_level',
            'admissions.patients.municipality',
            'admissions.patients.ethnicity',
            'admissions.patients.gender',
            'admissions.patients.identification_type',
            'admissions.patients.residence_municipality',
            'admissions.patients.residence',
            'admissions.patients.marital_status',
            'admissions.patients.population_group',
            'admissions.patients.activities',
            'admissions.contract.type_briefcase',
            'assigned_management_plan',
            'assigned_management_plan.management_plan',
            'assigned_management_plan.management_plan.type_of_attention',
            'assigned_management_plan.management_plan.procedure.manual_price',
            'assigned_management_plan.management_plan.service_briefcase.manual_price',
            'assigned_management_plan.management_plan.route_administration',
            // 'assistance_supplies',
            // 'assistance_supplies.user_incharge_id',
            // 'assistance_supplies.application_hour',
        )


            ->where('id', $ChMedicalCertificate[0]['ch_record_id'])->get()->toArray();

        $imagenComoBase64 = null;

        $fecharecord = Carbon::parse($ChRecord[0]['updated_at'])->format('d-m-Y h:i:s');

        $Patients = $ChRecord[0]['admissions']['patients'];


        if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
            $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
            $contenidoBinario = file_get_contents($rutaImagen);
            $imagenComoBase64 = base64_encode($contenidoBinario);
        } else {
            $imagenComoBase64 = null;
            return response()->json([
                'status' => false,
                'message' => 'No se encontr?? firma por parte del personal asistencial para generar este documento, por favor diligenciar su firma desde su perfil',

            ]);
        }

        $today = Carbon::now();

        $Patients = $ChRecord[0]['admissions']['patients'];


        $html = view('mails.chMedicalCertificate', [
            'chrecord' => $ChRecord,
            'ChMedicalCertificate' => $ChMedicalCertificate,
            'fecharecord' => $fecharecord,
            'firm' => $imagenComoBase64,
            'today' => $today,

        ])->render();

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new PDF($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('Carta', 'portrait');
        $dompdf->render();
        $this->injectPageCount($dompdf);
        $file = $dompdf->output();

        $name = 'Certificado M??dico.pdf';

        Storage::disk('public')->put($name, $file);




        return response()->json([
            'status' => true,
            'persona' => $ChMedicalCertificate,
            'ch' => $ChRecord,
            'message' => 'Reporte generado exitosamente',
            'url' => asset('/storage' . '/' . $name),
        ]);
    }

    public function ViewInterconsultation(int $id)
    {
        $fecharecord = 0;



        $ChInterconsultation = ChInterconsultation::with(
            'specialty',
            'frequency'
        )->where('id', $id)->get()->toArray();


        $ChRecord = ChRecord::with(
            'user',
            'user.assistance',
            'user.user_role.role',
            'admissions.contract',
            'admissions.contract.company',
            'admissions',
            'admissions.patients',
            'admissions.patients.academic_level',
            'admissions.patients.municipality',
            'admissions.patients.ethnicity',
            'admissions.patients.gender',
            'admissions.patients.identification_type',
            'admissions.patients.residence_municipality',
            'admissions.patients.residence',
            'admissions.patients.marital_status',
            'admissions.patients.population_group',
            'admissions.patients.activities',
            'admissions.contract.type_briefcase',
            'assigned_management_plan',
            'assigned_management_plan.management_plan',
            'assigned_management_plan.management_plan.type_of_attention',
            'assigned_management_plan.management_plan.procedure.manual_price',
            'assigned_management_plan.management_plan.service_briefcase.manual_price',
            'assigned_management_plan.management_plan.route_administration',
            // 'assistance_supplies',
            // 'assistance_supplies.user_incharge_id',
            // 'assistance_supplies.application_hour',
        )


            ->where('id', $ChInterconsultation[0]['ch_record_id'])->get()->toArray();

        $imagenComoBase64 = null;

        $fecharecord = Carbon::parse($ChRecord[0]['updated_at'])->format('d-m-Y h:i:s');

        $Patients = $ChRecord[0]['admissions']['patients'];


        if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
            $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
            $contenidoBinario = file_get_contents($rutaImagen);
            $imagenComoBase64 = base64_encode($contenidoBinario);
        } else {
            $imagenComoBase64 = null;
            return response()->json([
                'status' => false,
                'message' => 'No se encontr?? firma por parte del personal asistencial para generar este documento, por favor diligenciar su firma desde su perfil',

            ]);
        }

        $today = Carbon::now();

        $Patients = $ChRecord[0]['admissions']['patients'];


        $html = view('mails.chInterconsultation', [
            'chrecord' => $ChRecord,
            'ChInterconsultation' => $ChInterconsultation,
            'fecharecord' => $fecharecord,
            'firm' => $imagenComoBase64,
            'today' => $today,

        ])->render();

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new PDF($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('Carta', 'portrait');
        $dompdf->render();
        $this->injectPageCount($dompdf);
        $file = $dompdf->output();

        $name = 'Interconsulta.pdf';

        Storage::disk('public')->put($name, $file);




        return response()->json([
            'status' => true,
            'persona' => $ChInterconsultation,
            'ch' => $ChRecord,
            'message' => 'Reporte generado exitosamente',
            'url' => asset('/storage' . '/' . $name),
        ]);
    }


    public function ViewHC(int $id)
    {

        $ChRecord = ChRecord::with(
            'user',
            'user.assistance',
            'user.user_role.role',
            'user.identification_type',
            'admissions.contract',
            'admissions.contract.company',
            'admissions',
            'admissions.patients',
            'admissions.patients.academic_level',
            'admissions.patients.municipality',
            'admissions.patients.ethnicity',
            'admissions.patients.gender',
            'admissions.patients.identification_type',
            'admissions.patients.residence_municipality',
            'admissions.patients.residence',
            'admissions.patients.marital_status',
            'admissions.patients.population_group',
            'admissions.patients.activities',
            'admissions.contract.type_briefcase',
            'assigned_management_plan',
            'assigned_management_plan.management_plan',
            'assigned_management_plan.management_plan.type_of_attention',
            'assigned_management_plan.management_plan.procedure.manual_price',
            'assigned_management_plan.management_plan.service_briefcase.manual_price',
            'assigned_management_plan.management_plan.route_administration',
            // 'assistance_supplies',
            // 'assistance_supplies.user_incharge_id',
            // 'assistance_supplies.application_hour',
        )->where('id', $id)->get()->toArray();
        $imagenComoBase64 = null;
        $fecharecord = Carbon::parse($ChRecord[0]['updated_at'])->setTimezone('America/Bogota');

        if ($ChRecord[0]['ch_type_id'] != 10) {

            if ($ChRecord[0]['firm_file']) {
                $rutaImagenPatient = storage_path('app/public/' . $ChRecord[0]['firm_file']);
                $contenidoBinarioPatient = file_get_contents($rutaImagenPatient);
                $imagenPAtient = base64_encode($contenidoBinarioPatient);
}else {
                $imagenPAtient = null;
            }
        }

        $Patients = $ChRecord[0]['admissions']['patients'];

        if ($ChRecord[0]['status'] != 'CERRADO') {
            return response()->json([
                'status' => false,
                'message' => 'El folio de historia cl??nica no ha sido finalizado',
                'data' => ['ch_record' => $ChRecord],
            ]);
        }

        ///Medicina General
        ///////////////////////////////////////////////////////////////////////////////////////

        if ($ChRecord[0]['ch_type_id'] == 1) {
            //Ingreso
            $ChReasonConsultation = ChReasonConsultation::with('ch_external_cause')->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChSystemExam = ChSystemExam::with('type_ch_system_exam')->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChPhysicalExam = ChPhysicalExam::with('type_ch_physical_exam')->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChVitalSigns = ChVitalSigns::with(
                'ch_vital_hydration',
                'ch_vital_ventilated',
                'ch_vital_temperature',
                'ch_vital_neurological',
                'oxygen_type',
                'liters_per_minute',
                'parameters_signs'
            )
                ->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChDiagnosis = ChDiagnosis::with('diagnosis', 'ch_diagnosis_class', 'ch_diagnosis_type')->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChOstomies = ChOstomies::with('ostomy')->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChAp = ChAp::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChRecommendations = ChRecommendationsEvo::with('recommendations_evo')->where('type_record_id', 1)->where('ch_record_id', $id)->get()->toArray();
            $ChDiets = ChDietsEvo::with('enterally_diet')->where('type_record_id', 1)->where('ch_record_id', $id)->get()->toArray();
            //Antecedentes
            $ChBackground = ChBackground::with('ch_type_background')->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            //Antecedentes Gyneco
            $ChGynecologists = ChGynecologists::with(
                'ch_type_gynecologists',
                'ch_planning_gynecologists',
                'ch_exam_gynecologists',
                'ch_flow_gynecologists',
                'ch_rst_cytology_gyneco',
                'ch_rst_biopsy_gyneco',
                'ch_rst_mammography_gyneco',
                'ch_rst_colposcipia_gyneco',
                'ch_failure_method_gyneco',
                'ch_method_planning_gyneco'
            )->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();

            //Evoluci??n
            $ChEvoSoap = ChEvoSoap::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChPhysicalExamEvo = ChPhysicalExam::with('type_ch_physical_exam')->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            //Antecedentes
            $ChBackgroundEvo = ChBackground::with('ch_type_background')->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            //Antecedentes Gyneco
            $ChGynecologistsEvo = ChGynecologists::with(
                'ch_type_gynecologists',
                'ch_planning_gynecologists',
                'ch_exam_gynecologists',
                'ch_flow_gynecologists',
                'ch_rst_cytology_gyneco',
                'ch_rst_biopsy_gyneco',
                'ch_rst_mammography_gyneco',
                'ch_rst_colposcipia_gyneco',
                'ch_failure_method_gyneco',
                'ch_method_planning_gyneco'
            )->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();

            $ChVitalSignsEvo = ChVitalSigns::with(
                'ch_vital_hydration',
                'ch_vital_ventilated',
                'ch_vital_temperature',
                'ch_vital_neurological',
                'oxygen_type',
                'liters_per_minute',
                'parameters_signs'
            )
                ->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChDiagnosisEvo = ChDiagnosis::with('diagnosis', 'ch_diagnosis_class', 'ch_diagnosis_type')->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChOstomiesEvo = ChOstomies::with('ostomy')->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChApEvo = ChAp::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChRecommendationsEvo = ChRecommendationsEvo::with('recommendations_evo')->where('type_record_id', 3)->where('ch_record_id', $id)->get()->toArray();
            $ChDietsEvo = ChDietsEvo::with('enterally_diet')->where('type_record_id', 3)->where('ch_record_id', $id)->get()->toArray();

            //Escalas
            $ChScaleNorton = ChScaleNorton::where('ch_record_id', $id)->where('type_record_id', 4)->get()->toArray();
            $ChScaleFac = ChScaleFac::where('ch_record_id', $id)->where('type_record_id', 4)->get()->toArray();
            $ChScaleGlasgow = ChScaleGlasgow::where('ch_record_id', $id)->where('type_record_id', 4)->get()->toArray();
            $ChScaleBarthel = ChScaleBarthel::where('ch_record_id', $id)->where('type_record_id', 4)->get()->toArray();
            $ChScaleRedCross = ChScaleRedCross::where('ch_record_id', $id)->where('type_record_id', 4)->get()->toArray();
            $ChScaleBraden = ChScaleBraden::where('ch_record_id', $id)->where('type_record_id', 4)->get()->toArray();
            $ChScaleKarnofsky = ChScaleKarnofsky::where('ch_record_id', $id)->where('type_record_id', 4)->get()->toArray();
            $ChScaleEcog = ChScaleEcog::where('ch_record_id', $id)->where('type_record_id', 4)->get()->toArray();
            $ChScalePediatricNutrition = ChScalePediatricNutrition::where('ch_record_id', $id)->where('type_record_id', 4)->get()->toArray();
            $ChScaleScreening = ChScaleScreening::where('ch_record_id', $id)->where('type_record_id', 4)->get()->toArray();
            $ChScalePayette = ChScalePayette::where('ch_record_id', $id)->where('type_record_id', 4)->get()->toArray();
            $ChScaleFragility = ChScaleFragility::where('ch_record_id', $id)->where('type_record_id', 4)->get()->toArray();
            $ChScaleNews = ChScaleNews::where('ch_record_id', $id)->where('type_record_id', 4)->get()->toArray();
            $ChScaleZarit = ChScaleZarit::where('ch_record_id', $id)->where('type_record_id', 4)->get()->toArray();

            //Formulaci??n
            $ChFormulation = ChFormulation::with(
                'product_generic',
                'product_generic.measurement_units',
                'product_generic.multidose_concentration',
                'administration_route',
                'hourly_frequency',
                'product_supplies'
            )
                ->where('ch_record_id', $id)->where('type_record_id', 5)->get()->toArray();

            //Ordenes M??dicas
            $ChMedicalOrders = ChMedicalOrders::with(
                'procedure',
                'frequency',
                'services_briefcase',
                'services_briefcase.manual_price',
                'services_briefcase.manual_price.procedure',
            )
                ->where('ch_record_id', $id)->where('type_record_id', 6)->get()->toArray();
            //Interconsulta
            $ChInterconsultation = ChInterconsultation::with(
                'specialty',
                'frequency'
            )
                ->where('ch_record_id', $id)->where('type_record_id', 6)->get()->toArray();
            //Plan de manejo
            $ManagementPlan = ChRecord::where('id', $id)->with(
                'assigned_management_plan',
                'assigned_management_plan.management_plan',
                'assigned_management_plan.management_plan.type_of_attention',
                'assigned_management_plan.management_plan.procedure',
                'assigned_management_plan.management_plan.frequency',
                'assigned_management_plan.management_plan.procedure.manual_price'
            )->get()->toArray();
            // $ManagementPlan = ManagementPlan::with(
            //     'type_of_attention',
            //     'frequency',
            //     'service_briefcase',
            //     'service_briefcase.manual_price',
            // )->get()->toArray();
            // ->where('ch_record_id', $id)->where('type_record_id', 6)->get()->toArray();
            //Incapacidad
            $ChInability = ChInability::with(
                'ch_contingency_code',
                'ch_type_inability',
                'ch_type_procedure',
                'diagnosis'
            )
                ->where('ch_record_id', $id)->where('type_record_id', 7)->get()->toArray();
            //Certificado
            $ChMedicalCertificate = ChMedicalCertificate::where('ch_record_id', $id)->where('type_record_id', 8)->get()->toArray();
            //Fallida
            $ChFailed = ChFailed::with(
                'ch_reason'
            )
                ->where('ch_record_id', $id)->where('type_record_id', 9)->get()->toArray();
            //Salida
            $ChPatientExit = ChPatientExit::with(
                'death_diagnosis',
                'ch_diagnosis',
                'exit_diagnosis',
                'relations_diagnosis',
                'reason_exit'
            )
                ->where('ch_record_id', $id)->where('type_record_id', 10)->get()->toArray();
            //Nota aclaratoria
            $Disclaimer = Disclaimer::where('ch_record_id', $id)->get()->toArray();

            // $img=asset('storage/'.$ChRecord[0]['user']['assistance'][0]['file_firm']);
            // $imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($img));
            if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
                $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
                $contenidoBinario = file_get_contents($rutaImagen);
                $imagenComoBase64 = base64_encode($contenidoBinario);
            } else {
                $imagenComoBase64 = null;
            }

            $today = Carbon::now();

            $Patients = $ChRecord[0]['admissions']['patients'];

            // $patient=$ChRecord['admissions'];

            $html = view('mails.medicalhistory', [
                'chrecord' => $ChRecord,
                'chrecord2' => $ChRecord[0],
                'ChReasonConsultation' => $ChReasonConsultation,
                'ChSystemExam' => $ChSystemExam,
                'ChPhysicalExam' => $ChPhysicalExam,
                'ChVitalSigns' => $ChVitalSigns,
                'ChDiagnosis' => $ChDiagnosis,
                'ChOstomies' => $ChOstomies,
                'ChAp' => $ChAp,
                'ChRecommendations' => $ChRecommendations,
                'ChDiets' => $ChDiets,

                'ChBackground' => $ChBackground,
                'ChGynecologists' => $ChGynecologists,

                'ChEvoSoap' => $ChEvoSoap,
                'ChPhysicalExamEvo' => $ChPhysicalExamEvo,
                'ChBackgroundEvo' => $ChBackgroundEvo,
                'ChGynecologistsEvo' => $ChGynecologistsEvo,
                'ChVitalSignsEvo' => $ChVitalSignsEvo,
                'ChDiagnosisEvo' => $ChDiagnosisEvo,
                'ChOstomiesEvo' => $ChOstomiesEvo,
                'ChApEvo' => $ChApEvo,
                'ChRecommendationsEvo' => $ChRecommendationsEvo,
                'ChDietsEvo' => $ChDietsEvo,

                'ChScaleNorton' => $ChScaleNorton,
                'ChScaleFac' => $ChScaleFac,
                'ChScaleGlasgow' => $ChScaleGlasgow,
                'ChScaleBarthel' => $ChScaleBarthel,
                'ChScaleRedCross' => $ChScaleRedCross,
                'ChScaleBraden' => $ChScaleBraden,
                'ChScaleKarnofsky' => $ChScaleKarnofsky,
                'ChScaleEcog' => $ChScaleEcog,
                'ChScalePediatricNutrition' => $ChScalePediatricNutrition,
                'ChScaleScreening' => $ChScaleScreening,
                'ChScalePayette' => $ChScalePayette,
                'ChScaleFragility' => $ChScaleFragility,
                'ChScaleNews' => $ChScaleNews,
                'ChScaleZarit' => $ChScaleZarit,

                'ChFormulation' => $ChFormulation,

                'ChMedicalOrders' => $ChMedicalOrders,
                'ChInterconsultation' => $ChInterconsultation,
                'ManagementPlan' => $ManagementPlan,
                'ChInability' => $ChInability,
                'ChMedicalCertificate' => $ChMedicalCertificate,
                'ChFailed' => $ChFailed,
                'ChPatientExit' => $ChPatientExit,
                'Disclaimer' => $Disclaimer,
                'firmPatient' => $imagenPAtient,
                'fecharecord' => $fecharecord,
                'firm' => $imagenComoBase64,
                'today' => $today,
                //   asset('storage/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),
                //   'http://localhost:8000/storage/app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm'],
                //   storage_path('app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),

            ])->render();

            $options = new Options();
            $options->set('isRemoteEnabled', true);
            $dompdf = new PDF($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('Carta', 'portrait');
            $dompdf->render();
            $this->injectPageCount($dompdf);
            $file = $dompdf->output();

            $name =  $ChRecord[0]['admissions']['patients']['identification'] . $ChRecord[0]['id'] . '.pdf';

            Storage::disk('public')->put($name, $file);

            // Efermeria

        } else if ($ChRecord[0]['ch_type_id'] == 2) {

            // INGRESO
            $ChPosition = ChPosition::with('patient_position')->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChHairValoration = ChHairValoration::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChOstomies = ChOstomies::with('ostomy')->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChPhysicalExam = ChPhysicalExam::with('type_ch_physical_exam')->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChVitalSigns = ChVitalSigns::with(
                'ch_vital_hydration',
                'ch_vital_ventilated',
                'ch_vital_temperature',
                'ch_vital_neurological',
                'oxygen_type',
                'liters_per_minute',
                'parameters_signs'
            )->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();

            // NOTA DE ENFERMERIA
            $ChPositionNE = ChPosition::with('patient_position')->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChNursingNote = ChNursingNote::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChHairValorationNE = ChHairValoration::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChOstomiesNE = ChOstomies::with('ostomy')->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChPhysicalExamNE = ChPhysicalExam::with('type_ch_physical_exam')->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChVitalSignsNE = ChVitalSigns::with(
                'ch_vital_hydration',
                'ch_vital_ventilated',
                'ch_vital_temperature',
                'ch_vital_neurological',
                'oxygen_type',
                'liters_per_minute',
                'parameters_signs'
            )->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChOxigenNE = ChOxigen::with('oxygen_type', 'liters_per_minute')->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChNursingProcedure = ChNursingProcedure::with('nursing_procedure')->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChCarePlan = ChCarePlan::with('nursing_care_plan')->where('ch_record_id', $id)->get()->toArray();
            $ChLiquidControl = ChLiquidControl::with('ch_route_fluid', 'ch_type_fluid')->where('ch_record_id', $id)->get()->toArray();
            $ChNotesDescription = ChNotesDescription::with('patient_position')->where('ch_record_id', $id)->get()->toArray();
            $ChRecommendationsEvo = ChRecommendationsEvo::with('recommendations_evo')->where('ch_record_id', $id)->where('type_record_id', 3)->where('ch_record_id', $id)->get()->toArray();
            // VALORACI??N EN LA PIEL
            $ChSkinValoration = ChSkinValoration::with('body_region', 'skin_status', 'diagnosis')->where('ch_record_id', $id)->get()->toArray();

            // ESCALAS
            $ChScaleNorton = ChScaleNorton::where('ch_record_id', $id)->get()->toArray();
            $ChScaleGlasgow = ChScaleGlasgow::where('ch_record_id', $id)->get()->toArray();
            $ChScaleJhDownton = ChScaleJhDownton::where('ch_record_id', $id)->get()->toArray();
            $ChScaleBraden = ChScaleBraden::where('ch_record_id', $id)->get()->toArray();

            //Nota aclaratoria
            $Disclaimer = Disclaimer::where('ch_record_id', $id)->get()->toArray();

            //APLICACION DE MEDICAMENTOS

            $AssistanceSupplies = AssistanceSupplies::select('assistance_supplies.*')
                ->with('users', 'pharmacy_product_request.services_briefcase.manual_price')
                ->leftJoin('pharmacy_product_request', 'assistance_supplies.pharmacy_product_request_id', 'pharmacy_product_request.id')
                ->leftJoin('services_briefcase', 'pharmacy_product_request.services_briefcase_id', 'services_briefcase.id')
                ->leftJoin('manual_price', 'services_briefcase.manual_price_id', 'manual_price.id')
                ->where('ch_record_id', $id)->whereNotNull('manual_price.product_id')
                ->get()->toArray();

            if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
                $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
                $contenidoBinario = file_get_contents($rutaImagen);
                $imagenComoBase64 = base64_encode($contenidoBinario);
            } else {
                $imagenComoBase64 = null;
            }
            $today = Carbon::now();

            $Patients = $ChRecord[0]['admissions']['patients'];

            //busqueda medicamentos
            $PharmacyProductRequest = PharmacyProductRequest::select(
                'pharmacy_product_request.*',
                DB::raw('
                    SUM(
                        IF( assistance_supplies.supplies_status_id = 1,
                            1,0
                        )
                    ) AS disponibles'),
                DB::raw('
                    SUM(
                        IF( assistance_supplies.supplies_status_id = 3,
                           1,0
                        )
                   ) AS da??adas'),
                DB::raw('
                   SUM(
                       IF( assistance_supplies.supplies_status_id = 2,
                           1,0
                       )
                   ) AS Usadas'),
            )
                ->leftJoin('assistance_supplies', 'assistance_supplies.pharmacy_product_request_id', 'pharmacy_product_request.id')

                ->with(
                    'product_generic',
                    'product_supplies',
                    'admissions',
                    'admissions.patients',
                    'services_briefcase',
                    'services_briefcase.briefcase',
                    'services_briefcase.manual_price',
                    'user_request_pad',
                    'management_plan',
                    'own_pharmacy_stock',
                    'request_pharmacy_stock',
                    'request_pharmacy_stock.campus',
                    'own_pharmacy_stock.campus',
                    'pharmacy_request_shipping',
                    'pharmacy_request_shipping.pharmacy_lot_stock',
                    'pharmacy_request_shipping.pharmacy_lot_stock.billing_stock.product',
                    'pharmacy_request_shipping.pharmacy_lot_stock.billing_stock.product.product_generic',
                    'pharmacy_request_shipping.pharmacy_lot_stock.billing_stock.product_supplies_com.product_supplies',
                    'pharmacy_request_shipping.pharmacy_lot_stock.billing_stock.product_supplies_com',
                    'user_request'
                )->groupBy('pharmacy_product_request.id');
                if( $ChRecord[0]['assigned_management_plan']){
            $PharmacyProductRequest->leftJoin('services_briefcase', 'services_briefcase.id', 'pharmacy_product_request.services_briefcase_id')
                ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
                ->where('pharmacy_product_request.management_plan_id', $ChRecord[0]['assigned_management_plan']['management_plan_id'])
                ->whereNotNull('manual_price.product_id');
            $PharmacyProductRequest = $PharmacyProductRequest->get()->toArray();
                }else{
                    $PharmacyProductRequest=null;
                }

            $patient = $ChRecord[0]['admissions'];
            $html = view('mails.hcEnfermeria', [
                'chrecord' => $ChRecord,
                'chrecord2' => $ChRecord[0],
                'ChPosition' => $ChPosition,
                'ChNursingNote' => $ChNursingNote,
                'ChHairValoration' => $ChHairValoration,
                'ChOstomies' => $ChOstomies,
                'ChPhysicalExam' => $ChPhysicalExam,
                'ChVitalSigns' => $ChVitalSigns,
                'ChPositionNE' => $ChPositionNE,
                'ChHairValorationNE' => $ChHairValorationNE,
                'ChOstomiesNE' => $ChOstomiesNE,
                'ChPhysicalExamNE' => $ChPhysicalExamNE,
                'ChVitalSignsNE' => $ChVitalSignsNE,
                'ChNursingProcedure' => $ChNursingProcedure,
                'ChCarePlan' => $ChCarePlan,
                'ChLiquidControl' => $ChLiquidControl,
                'ChSkinValoration' => $ChSkinValoration,
                'ChScaleNorton' => $ChScaleNorton,
                'ChScaleGlasgow' => $ChScaleGlasgow,
                'ChScaleJhDownton' => $ChScaleJhDownton,
                'ChScaleBraden' => $ChScaleBraden,
                'ChOxigenNE' => $ChOxigenNE,
                'ChNotesDescription' => $ChNotesDescription,
                'ChRecommendationsEvo' => $ChRecommendationsEvo,
                'PharmacyProductRequest' => $PharmacyProductRequest,
                'AssistanceSupplies' => $AssistanceSupplies,
                'Disclaimer' => $Disclaimer,
                'fecharecord' => $fecharecord,

                'firmPatient' => $imagenPAtient,
                'fecharecord' => $fecharecord,

                'firm' => $imagenComoBase64,
                'today' => $today,
                //   asset('storage/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),
                //   'http://localhost:8000/storage/app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm'],
                //   storage_path('app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),

            ])->render();

            $options = new Options();
            $options->set('isRemoteEnabled', true);
            $dompdf = new PDF($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('Carta', 'portrait');
            $dompdf->render();
            $this->injectPageCount($dompdf);
            $file = $dompdf->output();

             $name =  $ChRecord[0]['admissions']['patients']['identification'] . $ChRecord[0]['id'] . '.pdf';

            Storage::disk('public')->put($name, $file);

            ///////////////////////////////
            // Terapia Respiratoria
            //////////////////////////////////////////////////////////
        } else if ($ChRecord[0]['ch_type_id'] == 5) {
            //Ingreso
            $ChRespiratoryTherapy = ChRespiratoryTherapy::with('medical_diagnosis')->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChBackground = ChBackground::with('ch_type_background')->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChGynecologists = ChGynecologists::with(
                'ch_type_gynecologists',
                'ch_planning_gynecologists',
                'ch_exam_gynecologists',
                'ch_flow_gynecologists',
                'ch_rst_cytology_gyneco',
                'ch_rst_biopsy_gyneco',
                'ch_rst_mammography_gyneco',
                'ch_rst_colposcipia_gyneco',
                'ch_failure_method_gyneco',
                'ch_method_planning_gyneco'
            )->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();

            $ChVitalSigns = ChVitalSigns::with(
                'ch_vital_hydration',
                'ch_vital_ventilated',
                'ch_vital_temperature',
                'ch_vital_neurological',
                'oxygen_type',
                'liters_per_minute',
                'parameters_signs'
            )
                ->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChOxygenTherapy = ChOxygenTherapy::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChTherapeuticAss = ChTherapeuticAss::with(
                'ch_ass_pattern',
                'ch_ass_swing',
                'ch_ass_frequency',
                'ch_ass_mode',
                'ch_ass_cough',
                'ch_ass_chest_type',
                'ch_ass_chest_symmetry',
                'ch_ass_signs'
            )
                ->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChAssSigns = ChAssSigns::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChScalePain = ChScalePain::where('ch_record_id', $id)->where('type_record_id', 4)->get()->toArray();
            $ChScaleWongBaker = ChScaleWongBaker::where('ch_record_id', $id)->where('type_record_id', 4)->get()->toArray();
            $ChRtInspection = ChRtInspection::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChAuscultation = ChAuscultation::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChDiagnosticAids = ChDiagnosticAids::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChObjectivesTherapy = ChObjectivesTherapy::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $PharmacyProductRequest = PharmacyProductRequest::with(
                'product_supplies',
                'request_pharmacy_stock'
            )->get()->toArray();
            $ChRtSessions = ChRtSessions::with('frequency')->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();

            //Regular
            $ChRespiratoryTherapyEvo = ChRespiratoryTherapy::with('medical_diagnosis')->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChBackgroundEvo = ChBackground::with('ch_type_background')->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            //Antecedentes Gyneco
            $ChGynecologistsEvo = ChGynecologists::with(
                'ch_type_gynecologists',
                'ch_planning_gynecologists',
                'ch_exam_gynecologists',
                'ch_flow_gynecologists',
                'ch_rst_cytology_gyneco',
                'ch_rst_biopsy_gyneco',
                'ch_rst_mammography_gyneco',
                'ch_rst_colposcipia_gyneco',
                'ch_failure_method_gyneco',
                'ch_method_planning_gyneco'
            )->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();

            $ChVitalSignsEvo = ChVitalSigns::with(
                'ch_vital_hydration',
                'ch_vital_ventilated',
                'ch_vital_temperature',
                'ch_vital_neurological',
                'oxygen_type',
                'liters_per_minute',
                'parameters_signs'
            )
                ->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChOxygenTherapyEvo = ChOxygenTherapy::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $PharmacyProductRequestEvo = PharmacyProductRequest::with(
                'product_supplies',
                'request_pharmacy_stock'
            )->get()->toArray();
            $ChRtSessionsEvo = ChRtSessions::with('frequency')->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChPsIntervention = ChPsIntervention::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChRecommendationsEvo = ChRecommendationsEvo::with('recommendations_evo')->where('type_record_id', 3)->where('ch_record_id', $id)->get()->toArray();
            //Nota aclaratoria
            $Disclaimer = Disclaimer::where('ch_record_id', $id)->get()->toArray();

            if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
                if ($ChRecord[0]['user']['assistance'][0]['file_firm'] != 'null') {
                    $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
                    $contenidoBinario = file_get_contents($rutaImagen);
                    $imagenComoBase64 = base64_encode($contenidoBinario);
                }
            } else {
                $imagenComoBase64 = null;
            }
            $today = Carbon::now();
            $Patients = $ChRecord[0]['admissions']['patients'];

            // $patient=$ChRecord['admissions'];

            $html = view('mails.respiratoryhistory', [
                'chrecord' => $ChRecord,
                'chrecord2' => $ChRecord[0],

                'ChRespiratoryTherapy' => $ChRespiratoryTherapy,
                'ChBackground' => $ChBackground,
                'ChGynecologists' => $ChGynecologists,
                'ChVitalSigns' => $ChVitalSigns,
                'ChOxygenTherapy' => $ChOxygenTherapy,
                'ChAssSigns' => $ChAssSigns,
                'ChTherapeuticAss' => $ChTherapeuticAss,
                'ChScalePain' => $ChScalePain,
                'ChScaleWongBaker' => $ChScaleWongBaker,
                'ChRtInspection' => $ChRtInspection,
                'ChAuscultation' => $ChAuscultation,
                'ChDiagnosticAids' => $ChDiagnosticAids,
                'ChObjectivesTherapy' => $ChObjectivesTherapy,
                'PharmacyProductRequest' => $PharmacyProductRequest,
                'ChRtSessions' => $ChRtSessions,
                'Disclaimer' => $Disclaimer,
                'fecharecord' => $fecharecord,

                'ChRespiratoryTherapyEvo' => $ChRespiratoryTherapyEvo,
                'ChBackgroundEvo' => $ChBackgroundEvo,
                'ChGynecologistsEvo' => $ChGynecologistsEvo,
                'ChVitalSignsEvo' => $ChVitalSignsEvo,
                'ChOxygenTherapyEvo' => $ChOxygenTherapyEvo,
                'ChRtSessionsEvo' => $ChRtSessionsEvo,
                'ChPsIntervention' => $ChPsIntervention,
                'ChRecommendationsEvo' => $ChRecommendationsEvo,
                'PharmacyProductRequestEvo' => $PharmacyProductRequestEvo,
                'firmPatient' => $imagenPAtient,

                'fecharecord' => $fecharecord,
                'firm' => $imagenComoBase64,
                'today' => $today,
                //   asset('storage/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),
                //   'http://localhost:8000/storage/app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm'],
                //   storage_path('app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),

            ])->render();

            $options = new Options();
            $options->set('isRemoteEnabled', true);
            $dompdf = new PDF($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('Carta', 'portrait');
            $dompdf->render();
            $this->injectPageCount($dompdf);
            $file = $dompdf->output();

             $name =  $ChRecord[0]['admissions']['patients']['identification'] . $ChRecord[0]['id'] . '.pdf';

            Storage::disk('public')->put($name, $file);

            //Terapia de Lenguaje////

        } else if ($ChRecord[0]['ch_type_id'] == 4) {

            // INGRESO
            $TlTherapyLanguage = TlTherapyLanguage::with('medical_diagnostic', 'therapeutic_diagnosis')->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChVitalSigns = ChVitalSigns::with(
                'ch_vital_hydration',
                'ch_vital_ventilated',
                'ch_vital_temperature',
                'ch_vital_neurological',
                'oxygen_type',
                'liters_per_minute',
                'parameters_signs'
            )->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();

            //Antecedentes
            $ChBackground = ChBackground::with('ch_type_background')->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            //Antecedentes Gyneco
            $ChGynecologists = ChGynecologists::with(
                'ch_type_gynecologists',
                'ch_planning_gynecologists',
                'ch_exam_gynecologists',
                'ch_flow_gynecologists',
                'ch_rst_cytology_gyneco',
                'ch_rst_biopsy_gyneco',
                'ch_rst_mammography_gyneco',
                'ch_rst_colposcipia_gyneco',
                'ch_failure_method_gyneco',
                'ch_method_planning_gyneco'
            )->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();

            //Evoluci??n
            $OstomiesTl = OstomiesTl::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $SwallowingDisordersTL = SwallowingDisordersTL::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $VoiceAlterationsTl = VoiceAlterationsTl::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $HearingTl = HearingTl::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $LanguageTl = LanguageTl::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $CommunicationTl = CommunicationTl::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $CognitiveTl = CognitiveTl::where('ch_record_id', $id)->get()->toArray();
            $OrofacialTl = OrofacialTl::where('ch_record_id', $id)->get()->toArray();
            $SpeechTl = SpeechTl::where('ch_record_id', $id)->get()->toArray();
            $SpecificTestsTl = SpecificTestsTl::where('ch_record_id', $id)->get()->toArray();
            $TherapeuticGoalsTl = TherapeuticGoalsTl::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $CifDiagnosisTl = CifDiagnosisTl::where('ch_record_id', $id)->get()->toArray();
            $NumberMonthlySessionsTl = NumberMonthlySessionsTl::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();

            // REGULAR
            // Valoraci??n
            $TlTherapyLanguageRegular = TlTherapyLanguageRegular::with('diagnosis',)->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChVitalSignsEvotl = ChVitalSigns::with(
                'ch_vital_hydration',
                'ch_vital_ventilated',
                'ch_vital_temperature',
                'ch_vital_neurological',
                'oxygen_type',
                'liters_per_minute',
                'parameters_signs'
            )->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();

            $TherapeuticGoalsTlEvo = TherapeuticGoalsTl::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $InterventionTl = InterventionTl::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $CifDiagnosisTlEvo = CifDiagnosisTl::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $TherapyConceptTl = TherapyConceptTl::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $NumberMonthlySessionsTlEvo = NumberMonthlySessionsTl::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $InputMaterialsUsedTl = InputMaterialsUsedTl::where('ch_record_id', $id)->get()->toArray();
            $ChRecommendationsEvo = ChRecommendationsEvo::with('recommendations_evo')->where('type_record_id', 3)->where('ch_record_id', $id)->get()->toArray();
            //Nota aclaratoria
            $Disclaimer = Disclaimer::where('ch_record_id', $id)->get()->toArray();


            if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
                $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
                $contenidoBinario = file_get_contents($rutaImagen);
                $imagenComoBase64 = base64_encode($contenidoBinario);
            } else {
                $imagenComoBase64 = null;
            }
            $today = Carbon::now();
            $Patients = $ChRecord[0]['admissions']['patients'];

            // $patient=$ChRecord['admissions'];
            $html = view('mails.lenguagehistory', [
                'chrecord' => $ChRecord,
                'chrecord2' => $ChRecord[0],

                'TlTherapyLanguage' => $TlTherapyLanguage,
                'OstomiesTl' => $OstomiesTl,

                'SwallowingDisordersTL' => $SwallowingDisordersTL,
                'VoiceAlterationsTl' => $VoiceAlterationsTl,
                'HearingTl' => $HearingTl,
                'LanguageTl' => $LanguageTl,
                'CommunicationTl' => $CommunicationTl,
                'CognitiveTl' => $CognitiveTl,
                'OrofacialTl' => $OrofacialTl,
                'SpeechTl' => $SpeechTl,
                'SpecificTestsTl' => $SpecificTestsTl,
                'TherapeuticGoalsTl' => $TherapeuticGoalsTl,
                'CifDiagnosisTl' => $CifDiagnosisTl,
                'NumberMonthlySessionsTl' => $NumberMonthlySessionsTl,
                'ChVitalSigns' => $ChVitalSigns,
                'ChBackground' => $ChBackground,
                'ChGynecologists' => $ChGynecologists,
                'TlTherapyLanguageRegular' => $TlTherapyLanguageRegular,
                'ChVitalSignsEvotl' => $ChVitalSignsEvotl,
                'TherapeuticGoalsTlEvo' => $TherapeuticGoalsTlEvo,
                'InterventionTl' => $InterventionTl,
                'CifDiagnosisTlEvo' => $CifDiagnosisTl,
                'CifDiagnosisTlEvo' => $CifDiagnosisTl,
                'TherapyConceptTl' => $TherapyConceptTl,
                'InputMaterialsUsedTl' => $InputMaterialsUsedTl,
                'NumberMonthlySessionsTlEvo' => $NumberMonthlySessionsTl,
                'ChRecommendationsEvo' => $ChRecommendationsEvo,
                'Disclaimer' => $Disclaimer,

                'firmPatient' => $imagenPAtient,
                'fecharecord' => $fecharecord,

                'firm' => $imagenComoBase64,
                'today' => $today,
                //   asset('storage/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),
                //   'http://localhost:8000/storage/app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm'],
                //   storage_path('app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),

            ])->render();

            $options = new Options();
            $options->set('isRemoteEnabled', true);
            $dompdf = new PDF($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('Carta', 'portrait');
            $dompdf->render();
            $this->injectPageCount($dompdf);
            $file = $dompdf->output();

            $name =  $ChRecord[0]['admissions']['patients']['identification'] . $ChRecord[0]['id'] . '.pdf';

            Storage::disk('public')->put($name, $file);
            ///Terapia ocupacional
            ///////////////////////////////////////

        } else if ($ChRecord[0]['ch_type_id'] == 6) {
            //Ingreso
            $ChEValorationOT = ChEValorationOT::with('ch_diagnosis')->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChVitalSigns = ChVitalSigns::with(
                'ch_vital_hydration',
                'ch_vital_ventilated',
                'ch_vital_temperature',
                'ch_vital_neurological',
                'oxygen_type',
                'liters_per_minute',
                'parameters_signs'
            )->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEOccHistoryOT = ChEOccHistoryOT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEPastOT = ChEPastOT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEDailyActivitiesOT = ChEDailyActivitiesOT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEMSFunPatOT = ChEMSFunPatOT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEMSIntPatOT = ChEMSIntPatOT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEMSMovPatOT = ChEMSMovPatOT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEMSThermalOT = ChEMSThermalOT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEMSDisAuditoryOT = ChEMSDisAuditoryOT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEMSDisTactileOT = ChEMSDisTactileOT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEMSAcuityOT = ChEMSAcuityOT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEMSComponentOT = ChEMSComponentOT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEMSTestOT = ChEMSTestOT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEMSCommunicationOT = ChEMSCommunicationOT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEMSAssessmentOT = ChEMSAssessmentOT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEMSWeeklyOT = ChEMSWeeklyOT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();

            $ChEValorationOTNT = ChEValorationOT::with('ch_diagnosis')->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();

            //Regular
            $ChRNValorationOT = ChRNValorationOT::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChVitalSignsNT = ChVitalSigns::with(
                'ch_vital_hydration',
                'ch_vital_ventilated',
                'ch_vital_temperature',
                'ch_vital_neurological',
                'oxygen_type',
                'liters_per_minute',
                'parameters_signs'
            )->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChEMSAssessmentOTNT = ChEMSAssessmentOT::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChRNMaterialsOTNT = ChRNMaterialsOT::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChEMSWeeklyOTNT = ChEMSWeeklyOT::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChRecommendationsEvo = ChRecommendationsEvo::with('recommendations_evo')->where('type_record_id', 3)->where('ch_record_id', $id)->get()->toArray();
            //Nota aclaratoria
            $Disclaimer = Disclaimer::where('ch_record_id', $id)->get()->toArray();


            if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
                $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
                $contenidoBinario = file_get_contents($rutaImagen);
                $imagenComoBase64 = base64_encode($contenidoBinario);
            } else {
                $imagenComoBase64 = null;
            }
            $today = Carbon::now();

            $Patients = $ChRecord[0]['admissions']['patients'];

            // $patient=$ChRecord['admissions'];
            $html = view('mails.occupationalhistory', [
                'chrecord' => $ChRecord,
                'chrecord2' => $ChRecord[0],
                'ChEValorationOT' => $ChEValorationOT,
                'ChVitalSigns' => $ChVitalSigns,
                'ChEOccHistoryOT' => $ChEOccHistoryOT,
                'ChEPastOT' => $ChEPastOT,
                'ChEDailyActivitiesOT' => $ChEDailyActivitiesOT,
                'ChEMSFunPatOT' => $ChEMSFunPatOT,
                'ChEMSIntPatOT' => $ChEMSIntPatOT,
                'ChEMSMovPatOT' => $ChEMSMovPatOT,
                'ChEMSThermalOT' => $ChEMSThermalOT,
                'ChEMSDisAuditoryOT' => $ChEMSDisAuditoryOT,
                'ChEMSDisTactileOT' => $ChEMSDisTactileOT,
                'ChEMSAcuityOT' => $ChEMSAcuityOT,
                'ChEMSComponentOT' => $ChEMSComponentOT,
                'ChEMSTestOT' => $ChEMSTestOT,
                'ChEMSCommunicationOT' => $ChEMSCommunicationOT,
                'ChEMSAssessmentOT' => $ChEMSAssessmentOT,
                'ChEMSWeeklyOT' => $ChEMSWeeklyOT,
                'ChEValorationOTNT' => $ChEValorationOTNT,
                'ChRNValorationOT' => $ChRNValorationOT,
                'ChVitalSignsNT' => $ChVitalSignsNT,
                'ChEMSAssessmentOTNT' => $ChEMSAssessmentOTNT,
                'ChRNMaterialsOTNT' => $ChRNMaterialsOTNT,
                'ChEMSWeeklyOTNT' => $ChEMSWeeklyOTNT,
                'ChRecommendationsEvo' => $ChRecommendationsEvo,

                'Disclaimer' => $Disclaimer,
                'firmPatient' => $imagenPAtient,
                'fecharecord' => $fecharecord,

                'firm' => $imagenComoBase64,
                'today' => $today,
                //   asset('storage/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),
                //   'http://localhost:8000/storage/app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm'],
                //   storage_path('app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),

            ])->render();

            $options = new Options();
            $options->set('isRemoteEnabled', true);
            $dompdf = new PDF($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('Carta', 'portrait');
            $dompdf->render();
            $this->injectPageCount($dompdf);
            $file = $dompdf->output();

             $name =  $ChRecord[0]['admissions']['patients']['identification'] . $ChRecord[0]['id'] . '.pdf';

            Storage::disk('public')->put($name, $file);

            ///Nutrici??n
            ///////////////////////////////////////

        } else if ($ChRecord[0]['ch_type_id'] == 3) {
            //Ingreso
            $ChNutritionAnthropometry = ChNutritionAnthropometry::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChNutritionGastrointestinal = ChNutritionGastrointestinal::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChNutritionFoodHistory = ChNutritionFoodHistory::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChNutritionInterpretation = ChNutritionInterpretation::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChNutritionParenteral  = ChNutritionParenteral::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChRecommendations = ChRecommendationsEvo::with('recommendations_evo')->where('type_record_id', 1)->where('ch_record_id', $id)->get()->toArray();

            //Antecedentes
            $ChBackground = ChBackground::with('ch_type_background')->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            //Antecedentes Gyneco
            $ChGynecologists = ChGynecologists::with(
                'ch_type_gynecologists',
                'ch_planning_gynecologists',
                'ch_exam_gynecologists',
                'ch_flow_gynecologists',
                'ch_rst_cytology_gyneco',
                'ch_rst_biopsy_gyneco',
                'ch_rst_mammography_gyneco',
                'ch_rst_colposcipia_gyneco',
                'ch_failure_method_gyneco',
                'ch_method_planning_gyneco'
            )->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();


            //Regular
            $ChNutritionAnthropometryNR = ChNutritionAnthropometry::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChNutritionParenteralNR  = ChNutritionParenteral::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChNutritionInterpretationNR  = ChNutritionInterpretation::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChRecommendationsNR = ChRecommendationsEvo::with('recommendations_evo')->where('type_record_id', 3)->where('ch_record_id', $id)->get()->toArray();

            //Escalas
            $ChScalePediatricNutrition = ChScalePediatricNutrition::where('ch_record_id', $id)->where('type_record_id', 4)->get()->toArray();
            $ChScaleScreening = ChScaleScreening::where('ch_record_id', $id)->where('type_record_id', 4)->get()->toArray();
            $ChScalePayette = ChScalePayette::where('ch_record_id', $id)->where('type_record_id', 4)->get()->toArray();
            $ChScaleFragility = ChScaleFragility::where('ch_record_id', $id)->where('type_record_id', 4)->get()->toArray();

            $ChFailed = ChFailed::with(
                'ch_reason'
            )
                ->where('ch_record_id', $id)->where('type_record_id', 9)->get()->toArray();

            //Nota aclaratoria
            $Disclaimer = Disclaimer::where('ch_record_id', $id)->get()->toArray();


            if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
                $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
                $contenidoBinario = file_get_contents($rutaImagen);
                $imagenComoBase64 = base64_encode($contenidoBinario);
            } else {
                $imagenComoBase64 = null;
            }
            $today = Carbon::now();

            $Patients = $ChRecord[0]['admissions']['patients'];

            // $patient=$ChRecord['admissions'];
            $html = view('mails.nutritionhistory', [
                'chrecord' => $ChRecord,
                'chrecord2' => $ChRecord[0],
                'ChNutritionAnthropometry' => $ChNutritionAnthropometry,
                'ChNutritionGastrointestinal' => $ChNutritionGastrointestinal,
                'ChNutritionFoodHistory' => $ChNutritionFoodHistory,
                'ChNutritionInterpretation' => $ChNutritionInterpretation,
                'ChNutritionParenteral' => $ChNutritionParenteral,
                'ChRecommendations' => $ChRecommendations,
                'ChBackground' => $ChBackground,
                'ChGynecologists' => $ChGynecologists,

                'ChNutritionAnthropometryNR' => $ChNutritionAnthropometryNR,
                'ChNutritionParenteralNR' => $ChNutritionParenteralNR,
                'ChNutritionInterpretationNR' => $ChNutritionInterpretationNR,
                'ChRecommendationsNR' => $ChRecommendationsNR,

                'ChScalePediatricNutrition' => $ChScalePediatricNutrition,
                'ChScaleScreening' => $ChScaleScreening,
                'ChScalePayette' => $ChScalePayette,
                'ChScaleFragility' => $ChScaleFragility,

                'ChFailed' => $ChFailed,
                'Disclaimer' => $Disclaimer,
                'fecharecord' => $fecharecord,


                'fecharecord' => $fecharecord,
                'firmPatient' => $imagenPAtient,

                'firm' => $imagenComoBase64,
                'today' => $today,
                //   asset('storage/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),
                //   'http://localhost:8000/storage/app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm'],
                //   storage_path('app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),

            ])->render();

            $options = new Options();
            $options->set('isRemoteEnabled', true);
            $dompdf = new PDF($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('Carta', 'portrait');
            $dompdf->render();
            $this->injectPageCount($dompdf);
            $file = $dompdf->output();

             $name =  $ChRecord[0]['admissions']['patients']['identification'] . $ChRecord[0]['id'] . '.pdf';

            Storage::disk('public')->put($name, $file);

            ///Terapia F??sica
            ///////////////////////////////////////////                
        } else if ($ChRecord[0]['ch_type_id'] == 7) {
            //Ingreso
            $ChEValorationFT = ChEValorationFT::with(
                'ch_diagnosis'
            )->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChVitalSigns = ChVitalSigns::with(
                'ch_vital_hydration',
                'ch_vital_ventilated',
                'ch_vital_temperature',
                'ch_vital_neurological',
                'oxygen_type',
                'liters_per_minute',
                'parameters_signs'
            )
                ->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEValorationTherFT = ChEValorationTherFT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEPainFT = ChEPainFT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChESysIntegumentaryFT = ChESysIntegumentaryFT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEMuscularStrengthFT = ChEMuscularStrengthFT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChESysMusculoskeletalFT = ChESysMusculoskeletalFT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChESensibilityFT = ChESensibilityFT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEMuscularToneFT = ChEMuscularToneFT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEReflectionFT = ChEReflectionFT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEFlexibilityFT = ChEFlexibilityFT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEBalanceFT = ChEBalanceFT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEPositionFT = ChEPositionFT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEMarchFT = ChEMarchFT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEDiagnosisFT = ChEDiagnosisFT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChETherGoalsFT = ChETherGoalsFT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChEWeeklyFT = ChEWeeklyFT::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChNRMaterialsFT = ChNRMaterialsFT::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();


            ///Regular
            $ChEValorationFTEvo = ChEValorationFT::with(
                'ch_diagnosis'
            )->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChVitalSignsEvo = ChVitalSigns::with(
                'ch_vital_hydration',
                'ch_vital_ventilated',
                'ch_vital_temperature',
                'ch_vital_neurological',
                'oxygen_type',
                'liters_per_minute',
                'parameters_signs'
            )
                ->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChETherGoalsFTEvo = ChETherGoalsFT::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChEDiagnosisFTEvo = ChEDiagnosisFT::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChEWeeklyFTEvo = ChEWeeklyFT::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChEMSAssessmentOTNT = ChEMSAssessmentOT::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChRecommendationsEvo = ChRecommendationsEvo::with('recommendations_evo')->where('type_record_id', 3)->where('ch_record_id', $id)->get()->toArray();
  
            //Nota aclaratoria
            $Disclaimer = Disclaimer::where('ch_record_id', $id)->get()->toArray();

            if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
                $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
                $contenidoBinario = file_get_contents($rutaImagen);
                $imagenComoBase64 = base64_encode($contenidoBinario);
            } else {
                $imagenComoBase64 = null;
            }
            $today = Carbon::now();
            $Patients = $ChRecord[0]['admissions']['patients'];

            // $patient=$ChRecord['admissions'];

            $html = view('mails.physicalhistory', [
                'chrecord' => $ChRecord,
                'chrecord2' => $ChRecord[0],

                'ChEValorationFT' => $ChEValorationFT,
                'ChVitalSigns' => $ChVitalSigns,
                'ChEValorationTherFT' => $ChEValorationTherFT,
                'ChEPainFT' => $ChEPainFT,
                'ChESysIntegumentaryFT' => $ChESysIntegumentaryFT,
                'ChESysMusculoskeletalFT' => $ChESysMusculoskeletalFT,
                'ChEMuscularStrengthFT' => $ChEMuscularStrengthFT,
                'ChESensibilityFT' => $ChESensibilityFT,
                'ChEMuscularToneFT' => $ChEMuscularToneFT,
                'ChEReflectionFT' => $ChEReflectionFT,
                'ChEFlexibilityFT' => $ChEFlexibilityFT,
                'ChEBalanceFT' => $ChEBalanceFT,
                'ChEPositionFT' => $ChEPositionFT,
                'ChEMarchFT' => $ChEMarchFT,
                'ChEDiagnosisFT' => $ChEDiagnosisFT,
                'ChETherGoalsFT' => $ChETherGoalsFT,
                'fecharecord' => $fecharecord,

                'ChEWeeklyFT' => $ChEWeeklyFT,

                'ChEValorationFTEvo' => $ChEValorationFTEvo,
                'ChVitalSignsEvo' => $ChVitalSignsEvo,
                'ChETherGoalsFTEvo' => $ChETherGoalsFTEvo,
                'ChEDiagnosisFTEvo' => $ChEDiagnosisFTEvo,
                'ChEWeeklyFTEvo' => $ChEWeeklyFTEvo,
                'ChEMSAssessmentOTNT' => $ChEMSAssessmentOTNT,
                'ChRecommendationsEvo' => $ChRecommendationsEvo,
                
                'Disclaimer' => $Disclaimer,

                'firmPatient' => $imagenPAtient,
                'ChNRMaterialsFT' => $ChNRMaterialsFT,

                'fecharecord' => $fecharecord,
                'firm' => $imagenComoBase64,
                'today' => $today,
                //   asset('storage/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),
                //   'http://localhost:8000/storage/app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm'],
                //   storage_path('app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),


            ])->render();

            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $dompdf = new PDF($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('Carta', 'portrait');
            $dompdf->render();
            $this->injectPageCount($dompdf);
            $file = $dompdf->output();

            $name =  $ChRecord[0]['admissions']['patients']['identification'] . $ChRecord[0]['id'] . '.pdf';

            Storage::disk('public')->put($name, $file);

            // Trabajo Social
            //////////////////////////////////

        } else if ($ChRecord[0]['ch_type_id'] == 8) {
            //Ingreso    
            $ChSwDiagnosis = ChSwDiagnosis::with(
                'ch_diagnosis',
                'ch_diagnosis.diagnosis'
            )->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChSwFamily = ChSwFamily::with(
                'relationship',
                'identification_type',
                'marital_status',
                'academic_level',
                'study_level_status',
                'activities',
                'inability'
            )->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChSwNursing = ChSwNursing::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChSwOccupationalHistory = ChSwOccupationalHistory::with(
                'ch_sw_occupation',
                'ch_sw_seniority',
                'ch_sw_hours',
                'ch_sw_turn'
            )->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChSwFamilyDynamics = ChSwFamilyDynamics::with(
                'decisions',
                'decisions.relationship',
                'authority',
                'authority.relationship',
                'ch_sw_communications',
                'ch_sw_expression'
            )->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChSwRiskFactors = ChSwRiskFactors::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChSwHousingAspect = ChSwHousingAspect::with(
                'ch_sw_housing_type',
                'ch_sw_housing'
            )->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChSwConditionHousing = ChSwConditionHousing::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChSwHygieneHousing = ChSwHygieneHousing::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChSwIncome = ChSwIncome::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChSwExpenses = ChSwExpenses::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChSwEconomicAspects = ChSwEconomicAspects::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChSwArmedConflict = ChSwArmedConflict::with(
                'municipality',
                'population_group',
                'ethnicity'
            )->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChSwSupportNetwork = ChSwSupportNetwork::with(
                'ch_sw_network'
            )->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $SwEducationDr = SwEducation::select('sw_education.*')->with(
                'sw_rights_duties'
            )->leftJoin('sw_rights_duties', 'sw_education.sw_rights_duties_id', 'sw_rights_duties.id')->where('ch_record_id', $id)->where('type_record_id', 1)
                ->where('sw_rights_duties.code', 1)->get()->toArray();
            $SwEducationDb = SwEducation::select('sw_education.*')->with(
                'sw_rights_duties'
            )->leftJoin('sw_rights_duties', 'sw_education.sw_rights_duties_id', 'sw_rights_duties.id')->where('ch_record_id', $id)->where('type_record_id', 1)
                ->where('sw_rights_duties.code', 2)->get()->toArray();

            //Regular
            $SwEducationEvoDr = SwEducation::select('sw_education.*')->with(
                'sw_rights_duties'
            )->leftJoin('sw_rights_duties', 'sw_education.sw_rights_duties_id', 'sw_rights_duties.id')->where('ch_record_id', $id)->where('type_record_id', 3)
                ->where('sw_rights_duties.code', 1)->get()->toArray();
            $SwEducationEvoDb = SwEducation::select('sw_education.*')->with(
                'sw_rights_duties'
            )->leftJoin('sw_rights_duties', 'sw_education.sw_rights_duties_id', 'sw_rights_duties.id')->where('ch_record_id', $id)->where('type_record_id', 3)
                ->where('sw_rights_duties.code', 2)->get()->toArray();
            $ChSwSupportNetworkEvo = ChSwSupportNetwork::with(
                'ch_sw_network'
            )->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChPsIntervention = ChPsIntervention::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();

            //Nota aclaratoria
            $Disclaimer = Disclaimer::where('ch_record_id', $id)->get()->toArray();



            if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
                $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
                $contenidoBinario = file_get_contents($rutaImagen);
                $imagenComoBase64 = base64_encode($contenidoBinario);
            } else {
                $imagenComoBase64 = null;
            }
            $today = Carbon::now();
            $Patients = $ChRecord[0]['admissions']['patients'];

            // $patient=$ChRecord['admissions'];

            $html = view('mails.sworkhistory', [
                'chrecord' => $ChRecord,
                'chrecord2' => $ChRecord[0],

                'ChSwDiagnosis' => $ChSwDiagnosis,
                'ChSwFamily' => $ChSwFamily,
                'ChSwNursing' => $ChSwNursing,
                'ChSwOccupationalHistory' => $ChSwOccupationalHistory,
                'ChSwFamilyDynamics' => $ChSwFamilyDynamics,
                'ChSwRiskFactors' => $ChSwRiskFactors,
                'ChSwHousingAspect' => $ChSwHousingAspect,
                'ChSwConditionHousing' => $ChSwConditionHousing,
                'ChSwHygieneHousing' => $ChSwHygieneHousing,
                'ChSwIncome' => $ChSwIncome,
                'ChSwExpenses' => $ChSwExpenses,
                'ChSwEconomicAspects' => $ChSwEconomicAspects,
                'ChSwArmedConflict' => $ChSwArmedConflict,
                'ChSwSupportNetwork' => $ChSwSupportNetwork,
                'SwEducationDr' => $SwEducationDr,
                'SwEducationDb' => $SwEducationDb,
                'ChSwSupportNetworkEvo' => $ChSwSupportNetworkEvo,
                'ChPsIntervention' => $ChPsIntervention,
                'SwEducationEvoDr' => $SwEducationEvoDr,
                'SwEducationEvoDb' => $SwEducationEvoDb,
                'Disclaimer' => $Disclaimer,
                'firmPatient' => $imagenPAtient,
                'fecharecord' => $fecharecord,

                'fecharecord' => $fecharecord,
                'firm' => $imagenComoBase64,
                'today' => $today,
                //   asset('storage/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),
                //   'http://localhost:8000/storage/app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm'],
                //   storage_path('app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),


            ])->render();

            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $dompdf = new PDF($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('Carta', 'portrait');
            $dompdf->render();
            $this->injectPageCount($dompdf);
            $file = $dompdf->output();

            $name = 'prueba.pdf';

            Storage::disk('public')->put($name, $file);
        } else if ($ChRecord[0]['ch_type_id'] == 9) {
            //Ingreso
            $ChPsAssessment = ChPsAssessment::with(
                'relationship',
                'ch_ps_episodes'
            )->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChPsRelationship = ChPsRelationship::with(
                'ch_ps_awareness',
                'ch_ps_sleep'
            )
                ->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChPsIntellective = ChPsIntellective::with(
                'ch_ps_attention'
            )
                ->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChPsThought = ChPsThought::with(
                'ch_ps_speed',
                'ch_ps_delusional',
                'ch_ps_overrated',
                'ch_ps_obsessive',
                'ch_ps_association'
            )
                ->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChPsLanguage = ChPsLanguage::with(
                'ch_ps_expressive',
                'ch_ps_comprehensive',
                'ch_ps_others',
                'ch_ps_paraphasias'
            )
                ->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChPsSphere = ChPsSphere::with(
                'ch_ps_sadness',
                'ch_ps_joy',
                'ch_ps_fear',
                'ch_ps_anger',
                'ch_ps_insufficiency',
                'ch_ps_several'
            )
                ->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChPsSynthesis = ChPsSynthesis::with(
                'ch_ps_judgment',
                'ch_ps_prospecting',
                'ch_ps_intelligence'
            )
                ->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChPsMultiaxial = ChPsMultiaxial::where('ch_record_id', $id)->with(
                'axis_one',
                'axis_two',
                'axis_three',
                'axis_four'
            )->where('type_record_id', 1)->get()->toArray();
            $ChPsIntervention = ChPsIntervention::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();

            //Regular
            $ChPsAssessmentEvo = ChPsAssessment::with(
                'relationship',
                'ch_ps_episodes'
            )->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChPsOperationalization = ChPsOperationalization::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChPsConsciousness = ChPsConsciousness::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChPsObjectives = ChPsObjectives::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChRecommendationsEvo = ChRecommendationsEvo::with('recommendations_evo')->where('type_record_id', 3)->where('ch_record_id', $id)->get()->toArray();
        
            //Nota aclaratoria
            $Disclaimer = Disclaimer::where('ch_record_id', $id)->get()->toArray();

            if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
                $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
                $contenidoBinario = file_get_contents($rutaImagen);
                $imagenComoBase64 = base64_encode($contenidoBinario);
            } else {
                $imagenComoBase64 = null;
            }
            $today = Carbon::now();
            $Patients = $ChRecord[0]['admissions']['patients'];

            // $patient=$ChRecord['admissions'];

            $html = view('mails.psychologyhistory', [
                'chrecord' => $ChRecord,
                'chrecord2' => $ChRecord[0],

                'ChPsAssessment' => $ChPsAssessment,
                'ChPsRelationship' => $ChPsRelationship,
                'ChPsIntellective' => $ChPsIntellective,
                'ChPsThought' => $ChPsThought,
                'ChPsLanguage' => $ChPsLanguage,
                'ChPsSphere' => $ChPsSphere,
                'ChPsSynthesis' => $ChPsSynthesis,
                'ChPsMultiaxial' => $ChPsMultiaxial,
                'ChPsIntervention' => $ChPsIntervention,
                'fecharecord' => $fecharecord,

                'ChPsAssessmentEvo' => $ChPsAssessmentEvo,
                'ChPsOperationalization' => $ChPsOperationalization,
                'ChPsConsciousness' => $ChPsConsciousness,
                'ChPsObjectives' => $ChPsObjectives,
                'ChRecommendationsEvo' => $ChRecommendationsEvo,
                'Disclaimer' => $Disclaimer,


                'firmPatient' => $imagenPAtient,

                'fecharecord' => $fecharecord,
                'firm' => $imagenComoBase64,
                'today' => $today,
                //   asset('storage/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),
                //   'http://localhost:8000/storage/app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm'],
                //   storage_path('app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),


            ])->render();

            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $dompdf = new PDF($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('Carta', 'portrait');
            $dompdf->render();
            $this->injectPageCount($dompdf);
            $file = $dompdf->output();

            $name =  $ChRecord[0]['admissions']['patients']['identification'] . $ChRecord[0]['id'] . '.pdf';

            Storage::disk('public')->put($name, $file);

            // Seguimiento
            //////////////////////////////////

        } else if ($ChRecord[0]['ch_type_id'] == 10) {
            //Seguimiento
            $ChTracing = Tracing::select('tracing.*')->Leftjoin('ch_record', 'ch_record.id', 'tracing.ch_record_id')
                ->where('ch_record.admissions_id', $ChRecord[0]['admissions_id'])
                ->get()->toArray();

            $today = Carbon::now();
            $Patients = $ChRecord[0]['admissions']['patients'];

            // $patient=$ChRecord['admissions'];

            $html = view('mails.tracing', [
                'chrecord' => $ChRecord,
                'fecharecord' => $fecharecord,
                'ChTracing' => $ChTracing,
                'firm' => $imagenComoBase64,
                'today' => $today,
                //   asset('storage/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),
                //   'http://localhost:8000/storage/app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm'],
                //   storage_path('app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),


            ])->render();

            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $dompdf = new PDF($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('Carta', 'portrait');
            $dompdf->render();
            $this->injectPageCount($dompdf);
            $file = $dompdf->output();

            $name = 'prueba.pdf';

            Storage::disk('public')->put($name, $file);
        }

        return response()->json([
            'status' => true,
            'persona' => $Patients,
            'ch' => $ChRecord,
            'message' => 'Reporte generado exitosamente',
            'url' => asset('/storage' . '/' . $name),
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ViewAllHC(Request $request)
    {
        $i = 0;
        $documentos = [];

        $ChRecord = ChRecord::select('ch_record.*')->with(
            'user',
            'user.assistance',
            'user.user_role.role',
            'admissions.contract',
            'admissions.contract.company',
            'admissions',
            'admissions.patients',
            'admissions.patients.academic_level',
            'admissions.patients.municipality',
            'admissions.patients.ethnicity',
            'admissions.patients.gender',
            'admissions.patients.identification_type',
            'admissions.patients.residence_municipality',
            'admissions.patients.residence',
            'admissions.patients.marital_status',
            'admissions.patients.population_group',
            'admissions.patients.activities',
            'admissions.contract.type_briefcase',
            'assigned_management_plan',
            'assigned_management_plan.management_plan',
            'assigned_management_plan.management_plan.type_of_attention',
            'assigned_management_plan.management_plan.procedure.manual_price',
            'assigned_management_plan.management_plan.service_briefcase.manual_price',
            // 'assistance_supplies',
            // 'assistance_supplies.user_incharge_id',
            // 'assistance_supplies.application_hour',
        )->leftJoin('admissions', 'ch_record.admissions_id', 'admissions.id')
            ->leftJoin('location', 'admissions.id', 'location.admissions_id')



            ->where('admissions.patient_id', $request->admissions)
            ->where('ch_record.status', 'CERRADO')
            ->where('ch_type_id', $request->ch_type)
            ->groupBy('ch_record.id');

        if ($request->start_date != 'null' && isset($request->start_date)) {
            $init_date = Carbon::parse($request->start_date);

            $ChRecord
                ->where('ch_record.date_attention', '>=', $init_date);
        }

        if ($request->finish_date != 'null' && isset($request->finish_date)) {
            $finish_date = new DateTime($request->finish_date . 'T23:59:59.9');
            $ChRecord->where('ch_record.date_attention', '<=', $finish_date);
        }

        if ($request->admission_route_id) {
            $ChRecord
                ->where('location.admission_route_id', $request->admission_route_id);
        }

        if ($request->scope_of_attention_id) {
            $ChRecord
                ->where('location.scope_of_attention_id', $request->scope_of_attention_id);
        }

        $ChRecord = $ChRecord->get()->toArray();



        $count = 0;

        if ($request->ch_type == 20) {

            $today = Carbon::now();


            $ChFormulation = ChFormulation::select('ch_formulation.*', 'assistance.file_firm', 'ch_record.id as record_id')->with(
                'product_generic',
                'product_generic.measurement_units',
                'product_generic.multidose_concentration',
                'administration_route',
                'hourly_frequency',
                'product_supplies'
            )->leftJoin('ch_record', 'ch_formulation.ch_record_id', 'ch_record.id')
                ->leftJoin('admissions', 'ch_record.admissions_id', 'admissions.id')
                ->leftJoin('users', 'ch_record.user_id', 'users.id')
                ->leftJoin('assistance', 'assistance.user_id', 'users.id')
                ->where('admissions.patient_id', $request->admissions)->where('type_record_id', 5)->get()->toArray();

            $ChRecord2 = ChRecord::select('ch_record.*')->with(
                'user',
                'user.assistance',
                'user.user_role.role',
                'admissions.contract',
                'admissions.contract.company',
                'admissions',
                'admissions.patients',
                'admissions.patients.academic_level',
                'admissions.patients.municipality',
                'admissions.patients.ethnicity',
                'admissions.patients.gender',
                'admissions.patients.identification_type',
                'admissions.patients.residence_municipality',
                'admissions.patients.residence',
                'admissions.patients.marital_status',
                'admissions.patients.population_group',
                'admissions.patients.activities',
                'admissions.contract.type_briefcase',
                'assigned_management_plan',
                'assigned_management_plan.management_plan',
                'assigned_management_plan.management_plan.type_of_attention',
                'assigned_management_plan.management_plan.procedure.manual_price',
                'assigned_management_plan.management_plan.service_briefcase.manual_price',
                // 'assistance_supplies',
                // 'assistance_supplies.user_incharge_id',
                // 'assistance_supplies.application_hour',
            )->where('ch_record.id', $ChFormulation[0]['record_id']);

            $ChRecord2 = $ChRecord2->get()->toArray();

            $fecharecord = Carbon::parse($ChRecord2[0]['updated_at'])->setTimezone('America/Bogota');

            if (count($ChFormulation) == 0) {
                return response()->json([
                    'status' => false,
                    'message' => 'No se encuentran Formulaciones asociadas al paciente',

                ]);
            }
            if (isset($ChFormulation[0]['file_firm']) && $ChFormulation[0]['file_firm'] != "null") {
                $rutaImagen = storage_path('app/public/' . $ChFormulation[0]['file_firm']);
                $contenidoBinario = file_get_contents($rutaImagen);
                $imagenComoBase64 = base64_encode($contenidoBinario);
            } else {
                $imagenComoBase64 = null;
            }
            $html = view('mails.chAllFormulation', [
                'chrecord' => $ChRecord2,
                'ChFormulation' => $ChFormulation,
                'fecharecord' => $fecharecord,
                'firm' => $imagenComoBase64,
                'today' => $today,

            ])->render();

            $options = new Options();
            $options->set('isRemoteEnabled', true);
            $dompdf = new PDF($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('Carta', 'portrait');
            $dompdf->render();
            $this->injectPageCount($dompdf);
            $file = $dompdf->output();

            $name = 'formulaciones.pdf';

            Storage::disk('public')->put($name, $file);




            return response()->json([
                'status' => true,
                'persona' => $ChFormulation,
                'ch' => $ChRecord,
                'message' => 'Reporte generado exitosamente',
                'url' => asset('/storage' . '/' . $name),
            ]);
        }
        if ($request->ch_type == 1) {
            if (count($ChRecord) > 0) {
                foreach ($ChRecord as $ch) {




                    ///Medicina General
                    /////////////////////////////////////////////////


                    $hcAll = [];
                    $fecharecord = Carbon::parse($ch['updated_at'])->setTimezone('America/Bogota');


                    array_push($hcAll, $ch);

                    $count++;
                    if ($ch['firm_file']) {
                        $rutaImagenPatient = storage_path('app/public/' . $ch['firm_file']);
                        $contenidoBinarioPatient = file_get_contents($rutaImagenPatient);
                        $imagenPAtient = base64_encode($contenidoBinarioPatient);

                    }else{
                        $imagenPAtient=null;
                    }

                    $ChReasonConsultation = ChReasonConsultation::with('ch_external_cause')->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChSystemExam = ChSystemExam::with('type_ch_system_exam')->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChPhysicalExam = ChPhysicalExam::with('type_ch_physical_exam')->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChVitalSigns = ChVitalSigns::with(
                        'ch_vital_hydration',
                        'ch_vital_ventilated',
                        'ch_vital_temperature',
                        'ch_vital_neurological',
                        'oxygen_type',
                        'liters_per_minute',
                        'parameters_signs'
                    )
                        ->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChDiagnosis = ChDiagnosis::with('diagnosis', 'ch_diagnosis_class', 'ch_diagnosis_type')->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChOstomies = ChOstomies::with('ostomy')->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChAp = ChAp::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChRecommendations = ChRecommendationsEvo::with('recommendations_evo')->where('type_record_id', 1)->where('ch_record_id', $ch['id'])->get()->toArray();
                    $ChDiets = ChDietsEvo::with('enterally_diet')->where('type_record_id', 1)->where('ch_record_id', $ch['id'])->get()->toArray();
                    //Antecedentes
                    $ChBackground = ChBackground::with('ch_type_background')->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    //Antecedentes Gyneco
                    $ChGynecologists = ChGynecologists::with(
                        'ch_type_gynecologists',
                        'ch_planning_gynecologists',
                        'ch_exam_gynecologists',
                        'ch_flow_gynecologists',
                        'ch_rst_cytology_gyneco',
                        'ch_rst_biopsy_gyneco',
                        'ch_rst_mammography_gyneco',
                        'ch_rst_colposcipia_gyneco',
                        'ch_failure_method_gyneco',
                        'ch_method_planning_gyneco'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();

                    //Evoluci??n
                    $ChEvoSoap = ChEvoSoap::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChPhysicalExamEvo = ChPhysicalExam::with('type_ch_physical_exam')->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    //Antecedentes
                    $ChBackgroundEvo = ChBackground::with('ch_type_background')->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    //Antecedentes Gyneco
                    $ChGynecologistsEvo = ChGynecologists::with(
                        'ch_type_gynecologists',
                        'ch_planning_gynecologists',
                        'ch_exam_gynecologists',
                        'ch_flow_gynecologists',
                        'ch_rst_cytology_gyneco',
                        'ch_rst_biopsy_gyneco',
                        'ch_rst_mammography_gyneco',
                        'ch_rst_colposcipia_gyneco',
                        'ch_failure_method_gyneco',
                        'ch_method_planning_gyneco'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();

                    $ChVitalSignsEvo = ChVitalSigns::with(
                        'ch_vital_hydration',
                        'ch_vital_ventilated',
                        'ch_vital_temperature',
                        'ch_vital_neurological',
                        'oxygen_type',
                        'liters_per_minute',
                        'parameters_signs'
                    )
                        ->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChDiagnosisEvo = ChDiagnosis::with('diagnosis', 'ch_diagnosis_class', 'ch_diagnosis_type')->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChOstomiesEvo = ChOstomies::with('ostomy')->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChApEvo = ChAp::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChRecommendationsEvo = ChRecommendationsEvo::with('recommendations_evo')->where('type_record_id', 3)->where('ch_record_id', $ch['id'])->get()->toArray();
                    $ChDietsEvo = ChDietsEvo::with('enterally_diet')->where('type_record_id', 3)->where('ch_record_id', $ch['id'])->get()->toArray();

                    //Escalas
                    $ChScaleNorton = ChScaleNorton::where('ch_record_id', $ch['id'])->where('type_record_id', 4)->get()->toArray();
                    $ChScaleFac = ChScaleFac::where('ch_record_id', $ch['id'])->where('type_record_id', 4)->get()->toArray();
                    $ChScaleGlasgow = ChScaleGlasgow::where('ch_record_id', $ch['id'])->where('type_record_id', 4)->get()->toArray();
                    $ChScaleBarthel = ChScaleBarthel::where('ch_record_id', $ch['id'])->where('type_record_id', 4)->get()->toArray();
                    $ChScaleRedCross = ChScaleRedCross::where('ch_record_id', $ch['id'])->where('type_record_id', 4)->get()->toArray();
                    $ChScaleBraden = ChScaleBraden::where('ch_record_id', $ch['id'])->where('type_record_id', 4)->get()->toArray();
                    $ChScaleKarnofsky = ChScaleKarnofsky::where('ch_record_id', $ch['id'])->where('type_record_id', 4)->get()->toArray();
                    $ChScaleEcog = ChScaleEcog::where('ch_record_id', $ch['id'])->where('type_record_id', 4)->get()->toArray();
                    $ChScalePediatricNutrition = ChScalePediatricNutrition::where('ch_record_id', $ch['id'])->where('type_record_id', 4)->get()->toArray();
                    $ChScaleScreening = ChScaleScreening::where('ch_record_id', $ch['id'])->where('type_record_id', 4)->get()->toArray();
                    $ChScalePayette = ChScalePayette::where('ch_record_id', $ch['id'])->where('type_record_id', 4)->get()->toArray();
                    $ChScaleFragility = ChScaleFragility::where('ch_record_id', $ch['id'])->where('type_record_id', 4)->get()->toArray();
                    $ChScaleNews = ChScaleNews::where('ch_record_id', $ch['id'])->where('type_record_id', 4)->get()->toArray();
                    $ChScaleZarit = ChScaleZarit::where('ch_record_id', $ch['id'])->where('type_record_id', 4)->get()->toArray();

                    //Formulaci??n
                    $ChFormulation = ChFormulation::with(
                        'product_generic',
                        'product_generic.measurement_units',
                        'product_generic.multidose_concentration',
                        'administration_route',
                        'hourly_frequency',
                        'product_supplies'
                    )
                        ->where('ch_record_id', $ch['id'])->where('type_record_id', 5)->get()->toArray();

                    //Ordenes M??dicas
                    $ChMedicalOrders = ChMedicalOrders::with(
                        'procedure',
                        'frequency',
                        'services_briefcase',
                        'services_briefcase.manual_price',
                        'services_briefcase.manual_price.procedure',
                    )
                        ->where('ch_record_id', $ch['id'])->where('type_record_id', 6)->get()->toArray();
                    //Interconsulta
                    $ChInterconsultation = ChInterconsultation::with(
                        'specialty',
                        'frequency'
                    )
                        ->where('ch_record_id', $ch['id'])->where('type_record_id', 6)->get()->toArray();
                    //Plan de manejo
                    $ManagementPlan = ChRecord::where('id', $ch['id'])->with(
                        'assigned_management_plan',
                        'assigned_management_plan.management_plan',
                        'assigned_management_plan.management_plan.type_of_attention',
                        'assigned_management_plan.management_plan.procedure',
                        'assigned_management_plan.management_plan.frequency',
                        'assigned_management_plan.management_plan.procedure.manual_price'
                    )->get()->toArray();
                    // $ManagementPlan = ManagementPlan::with(
                    //     'type_of_attention',
                    //     'frequency',
                    //     'service_briefcase',
                    //     'service_briefcase.manual_price',
                    // )->get()->toArray();
                    // ->where('ch_record_id', $id)->where('type_record_id', 6)->get()->toArray();
                    //Incapacidad
                    $ChInability = ChInability::with(
                        'ch_contingency_code',
                        'ch_type_inability',
                        'ch_type_procedure',
                        'diagnosis'
                    )
                        ->where('ch_record_id', $ch['id'])->where('type_record_id', 7)->get()->toArray();
                    //Certificado
                    $ChMedicalCertificate = ChMedicalCertificate::where('ch_record_id', $ch['id'])->where('type_record_id', 8)->get()->toArray();
                    //Fallida
                    $ChFailed = ChFailed::with(
                        'ch_reason'
                    )
                        ->where('ch_record_id', $ch['id'])->where('type_record_id', 9)->get()->toArray();
                    //Salida
                    $ChPatientExit = ChPatientExit::with(
                        'death_diagnosis',
                        'ch_diagnosis',
                        'exit_diagnosis',
                        'relations_diagnosis',
                        'reason_exit'
                    )
                        ->where('ch_record_id', $ch['id'])->where('type_record_id', 10)->get()->toArray();
                    //Nota aclaratoria
                    $Disclaimer = Disclaimer::where('ch_record_id', $ch['id'])->get()->toArray();

                    // $img=asset('storage/'.$ChRecord[0]['user']['assistance'][0]['file_firm']);
                    // $imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($img));
                    if (isset($ch['user']['assistance'][0]['file_firm']) && $ch['user']['assistance'][0]['file_firm'] != "null") {
                        $rutaImagen = storage_path('app/public/' . $ch['user']['assistance'][0]['file_firm']);
                        $contenidoBinario = file_get_contents($rutaImagen);
                        $imagenComoBase64 = base64_encode($contenidoBinario);
                    } else {
                        $imagenComoBase64 = null;
                    }
                    $ChTracing = Tracing::select('tracing.*')->Leftjoin('ch_record', 'ch_record.id', 'tracing.ch_record_id')
                        ->where('ch_record.admissions_id', $ChRecord[0]['admissions_id'])
                        ->get()->toArray();
                    $today = Carbon::now();



                    // $patient=$ChRecord['admissions'];

                    $html = view('mails.medicalhistory', [
                        'chrecord' => $ChRecord,
                        'chrecord2' => $ChRecord[$i],

                        'ChReasonConsultation' => $ChReasonConsultation,
                        'ChSystemExam' => $ChSystemExam,
                        'ChPhysicalExam' => $ChPhysicalExam,
                        'ChVitalSigns' => $ChVitalSigns,
                        'ChDiagnosis' => $ChDiagnosis,
                        'ChOstomies' => $ChOstomies,
                        'ChTracing' => $ChTracing,
                        'ChAp' => $ChAp,
                        'ChRecommendations' => $ChRecommendations,
                        'ChDiets' => $ChDiets,

                        'ChBackground' => $ChBackground,
                        'ChGynecologists' => $ChGynecologists,

                        'ChEvoSoap' => $ChEvoSoap,
                        'ChPhysicalExamEvo' => $ChPhysicalExamEvo,
                        'ChBackgroundEvo' => $ChBackgroundEvo,
                        'ChGynecologistsEvo' => $ChGynecologistsEvo,
                        'ChVitalSignsEvo' => $ChVitalSignsEvo,
                        'ChDiagnosisEvo' => $ChDiagnosisEvo,
                        'ChOstomiesEvo' => $ChOstomiesEvo,
                        'ChApEvo' => $ChApEvo,
                        'ChRecommendationsEvo' => $ChRecommendationsEvo,
                        'ChDietsEvo' => $ChDietsEvo,

                        'ChScaleNorton' => $ChScaleNorton,
                        'ChScaleFac' => $ChScaleFac,
                        'ChScaleGlasgow' => $ChScaleGlasgow,
                        'ChScaleBarthel' => $ChScaleBarthel,
                        'ChScaleRedCross' => $ChScaleRedCross,
                        'ChScaleBraden' => $ChScaleBraden,
                        'ChScaleKarnofsky' => $ChScaleKarnofsky,
                        'ChScaleEcog' => $ChScaleEcog,
                        'ChScalePediatricNutrition' => $ChScalePediatricNutrition,
                        'ChScaleScreening' => $ChScaleScreening,
                        'ChScalePayette' => $ChScalePayette,
                        'ChScaleFragility' => $ChScaleFragility,
                        'ChScaleNews' => $ChScaleNews,
                        'ChScaleZarit' => $ChScaleZarit,

                        'ChFormulation' => $ChFormulation,

                        'ChMedicalOrders' => $ChMedicalOrders,
                        'ChInterconsultation' => $ChInterconsultation,
                        'ManagementPlan' => $ManagementPlan,
                        'ChInability' => $ChInability,
                        'ChMedicalCertificate' => $ChMedicalCertificate,
                        'ChFailed' => $ChFailed,
                        'ChPatientExit' => $ChPatientExit,
                        'Disclaimer' => $Disclaimer,
                        'firmPatient' => $imagenPAtient,
                        'fecharecord' => $fecharecord,
                        'firm' => $imagenComoBase64,
                        'today' => $today,

                    ])->render();

                    $options = new Options();
                    $options->set('isRemoteEnabled', true);
                    $dompdf = new PDF($options);
                    $dompdf->loadHtml($html);
                    $dompdf->setPaper('Carta', 'portrait');
                    $dompdf->render();
                    $this->injectPageCount($dompdf);
                    $file = $dompdf->output();


                    $name =  $ChRecord[0]['admissions']['patients']['identification'] . $count . '.pdf';
                    $name2 = $ChRecord[0]['admissions']['patients']['identification'] . 'ALL.pdf';


                    Storage::disk('public')->put($name, $file);

                    array_push($documentos, $name);

                    $i++;
                }



                # Crear el "combinador"
                $combinador = new Merger;

                # Agregar archivo en cada iteraci??n
                foreach ($documentos as $documento) {
                    $combinador->addFile('storage' . '/' . $documento);
                }

                # Y combinar o unir
                $salida = $combinador->merge();
                $name2 = $ChRecord[0]['admissions']['patients']['identification'] . 'ALL.pdf';
                Storage::disk('public')->put($name2, $salida);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'No se encuentran Historias clinicas asociadas al paciente',

                ]);
            }


            // Efermeria
            ///////////////////////////////////////////////////

        } else if ($request->ch_type == 2) {
            if (count($ChRecord) > 0) {
                foreach ($ChRecord as $ch) {



                    $hcAll = [];
                    $fecharecord = Carbon::parse($ch['updated_at'])->setTimezone('America/Bogota');


                    array_push($hcAll, $ch);

                    $count++;
                    if ($ch['firm_file']) {
                        $rutaImagenPatient = storage_path('app/public/' . $ch['firm_file']);
                        $contenidoBinarioPatient = file_get_contents($rutaImagenPatient);
                        $imagenPAtient = base64_encode($contenidoBinarioPatient);

                    } else {
                        $imagenPAtient = null;
                    }


                    // INGRESO
                    $ChPosition = ChPosition::with('patient_position')->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChHairValoration = ChHairValoration::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChOstomies = ChOstomies::with('ostomy')->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChPhysicalExam = ChPhysicalExam::with('type_ch_physical_exam')->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChVitalSigns = ChVitalSigns::with(
                        'ch_vital_hydration',
                        'ch_vital_ventilated',
                        'ch_vital_temperature',
                        'ch_vital_neurological',
                        'oxygen_type',
                        'liters_per_minute',
                        'parameters_signs'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();

                    // NOTA DE ENFERMERIA
                    $ChPositionNE = ChPosition::with('patient_position')->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChNursingNote = ChNursingNote::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChHairValorationNE = ChHairValoration::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChOstomiesNE = ChOstomies::with('ostomy')->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChPhysicalExamNE = ChPhysicalExam::with('type_ch_physical_exam')->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChVitalSignsNE = ChVitalSigns::with(
                        'ch_vital_hydration',
                        'ch_vital_ventilated',
                        'ch_vital_temperature',
                        'ch_vital_neurological',
                        'oxygen_type',
                        'liters_per_minute',
                        'parameters_signs'
                    )->where('ch_record_id', $ch['id'])->get()->toArray();
                    $ChOxigenNE = ChOxigen::with('oxygen_type', 'liters_per_minute')->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChNursingProcedure = ChNursingProcedure::with('nursing_procedure')->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChCarePlan = ChCarePlan::with('nursing_care_plan')->where('ch_record_id', $ch['id'])->get()->toArray();
                    $ChLiquidControl = ChLiquidControl::with('ch_route_fluid', 'ch_type_fluid')->where('ch_record_id', $ch['id'])->get()->toArray();
                    $ChNotesDescription = ChNotesDescription::with('patient_position')->where('ch_record_id', $ch['id'])->get()->toArray();
                    $ChRecommendationsEvo = ChRecommendationsEvo::with('recommendations_evo')->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    
                    // VALORACI??N EN LA PIEL
                    $ChSkinValoration = ChSkinValoration::with('body_region', 'skin_status', 'diagnosis')->where('ch_record_id', $ch['id'])->get()->toArray();

                    // ESCALAS
                    $ChScaleNorton = ChScaleNorton::where('ch_record_id', $ch['id'])->get()->toArray();
                    $ChScaleGlasgow = ChScaleGlasgow::where('ch_record_id', $ch['id'])->get()->toArray();
                    $ChScaleJhDownton = ChScaleJhDownton::where('ch_record_id', $ch['id'])->get()->toArray();
                    $ChScaleBraden = ChScaleBraden::where('ch_record_id', $ch['id'])->get()->toArray();

                    //APLICACION DE MEDICAMENTOS

                    $AssistanceSupplies = AssistanceSupplies::select('assistance_supplies.*')
                        ->with('users', 'pharmacy_product_request.services_briefcase.manual_price')
                        ->leftJoin('pharmacy_product_request', 'assistance_supplies.pharmacy_product_request_id', 'pharmacy_product_request.id')
                        ->leftJoin('services_briefcase', 'pharmacy_product_request.services_briefcase_id', 'services_briefcase.id')
                        ->leftJoin('manual_price', 'services_briefcase.manual_price_id', 'manual_price.id')
                        ->where('ch_record_id', $ch['id'])->whereNotNull('manual_price.product_id')
                        ->get()->toArray();

                    if (isset($ch['user']['assistance'][0]['file_firm']) && $ch['user']['assistance'][0]['file_firm'] != "null") {
                        $rutaImagen = storage_path('app/public/' . $ch['user']['assistance'][0]['file_firm']);
                        $contenidoBinario = file_get_contents($rutaImagen);
                        $imagenComoBase64 = base64_encode($contenidoBinario);
                    } else {
                        $imagenComoBase64 = null;
                    }
                    $today = Carbon::now();

                    // if ($ch['assigned_management_plan']){
                    // $management = $ch['assigned_management_plan']['management_plan_id'];
                    // }
                    // else{$management =null;}
                    //                     //busqueda medicamentos
                    //                     $PharmacyProductRequest = PharmacyProductRequest::select(
                    //                         'pharmacy_product_request.*',
                    //                         DB::raw('
                    //         SUM(
                    //             IF( assistance_supplies.supplies_status_id = 1,
                    //                 1,0
                    //             )
                    //         ) AS disponibles'),
                    //                         DB::raw('
                    //         SUM(
                    //             IF( assistance_supplies.supplies_status_id = 3,
                    //                1,0
                    //             )
                    //        ) AS da??adas'),
                    //                         DB::raw('
                    //        SUM(
                    //            IF( assistance_supplies.supplies_status_id = 2,
                    //                1,0
                    //            )
                    //        ) AS Usadas'),
                    //                     )
                    //                         ->leftJoin('assistance_supplies', 'assistance_supplies.pharmacy_product_request_id', 'pharmacy_product_request.id')

                    //                         ->with(
                    //                             'product_generic',
                    //                             'product_supplies',
                    //                             'admissions',
                    //                             'admissions.patients',
                    //                             'services_briefcase',
                    //                             'services_briefcase.briefcase',
                    //                             'services_briefcase.manual_price',
                    //                             'user_request_pad',
                    //                             'management_plan',
                    //                             'own_pharmacy_stock',
                    //                             'request_pharmacy_stock',
                    //                             'request_pharmacy_stock.campus',
                    //                             'own_pharmacy_stock.campus',
                    //                             'pharmacy_request_shipping',
                    //                             'pharmacy_request_shipping.pharmacy_lot_stock',
                    //                             'pharmacy_request_shipping.pharmacy_lot_stock.billing_stock.product',
                    //                             'pharmacy_request_shipping.pharmacy_lot_stock.billing_stock.product.product_generic',
                    //                             'pharmacy_request_shipping.pharmacy_lot_stock.billing_stock.product_supplies_com.product_supplies',
                    //                             'pharmacy_request_shipping.pharmacy_lot_stock.billing_stock.product_supplies_com',
                    //                             'user_request'
                    //                         )->groupBy('pharmacy_product_request.id');
                    //                     $PharmacyProductRequest->leftJoin('services_briefcase', 'services_briefcase.id', 'pharmacy_product_request.services_briefcase_id')
                    //                         ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
                    //                         ->where('pharmacy_product_request.management_plan_id', $management)
                    //                         ->whereNotNull('manual_price.product_id');
                    //                     $PharmacyProductRequest = $PharmacyProductRequest->get()->toArray();

                    //Nota aclaratoria
                    $Disclaimer = Disclaimer::where('ch_record_id', $ch['id'])->get()->toArray();

                    $html = view('mails.hcEnfermeria', [
                        'chrecord' => $ChRecord,
                        'chrecord2' => $ChRecord[$i],
                        'ChPosition' => $ChPosition,
                        'ChNursingNote' => $ChNursingNote,
                        'ChHairValoration' => $ChHairValoration,
                        'ChOstomies' => $ChOstomies,
                        'ChPhysicalExam' => $ChPhysicalExam,
                        'ChVitalSigns' => $ChVitalSigns,
                        'ChPositionNE' => $ChPositionNE,
                        'ChHairValorationNE' => $ChHairValorationNE,
                        'ChOstomiesNE' => $ChOstomiesNE,
                        'ChPhysicalExamNE' => $ChPhysicalExamNE,
                        'ChVitalSignsNE' => $ChVitalSignsNE,
                        'ChNursingProcedure' => $ChNursingProcedure,
                        'ChCarePlan' => $ChCarePlan,
                        'ChLiquidControl' => $ChLiquidControl,
                        'ChSkinValoration' => $ChSkinValoration,
                        'ChScaleNorton' => $ChScaleNorton,
                        'ChScaleGlasgow' => $ChScaleGlasgow,
                        'ChScaleJhDownton' => $ChScaleJhDownton,
                        'ChScaleBraden' => $ChScaleBraden,
                        'ChOxigenNE' => $ChOxigenNE,
                        'ChNotesDescription' => $ChNotesDescription,
                        'ChRecommendationsEvo' => $ChRecommendationsEvo,
                        // 'PharmacyProductRequest' => $PharmacyProductRequest,
                        'AssistanceSupplies' => $AssistanceSupplies,
                        'fecharecord' => $fecharecord,
                        'Disclaimer' => $Disclaimer,
                        'firmPatient' => $imagenPAtient,

                        'firm' => $imagenComoBase64,
                        'today' => $today,
                        //   asset('storage/'.$ch['user']['assistance'][0]['file_firm']),
                        //   'http://localhost:8000/storage/app/public/'.$ch['user']['assistance'][0]['file_firm'],
                        //   storage_path('app/public/'.$ch['user']['assistance'][0]['file_firm']),

                    ])->render();

                    $options = new Options();
                    $options->set('isRemoteEnabled', true);
                    $dompdf = new PDF($options);
                    $dompdf->loadHtml($html);
                    $dompdf->setPaper('Carta', 'portrait');
                    $dompdf->render();
                    $this->injectPageCount($dompdf);
                    $file = $dompdf->output();

                    $name =  $ChRecord[0]['admissions']['patients']['identification'] . $count . '.pdf';

                    Storage::disk('public')->put($name, $file);

                    array_push($documentos, $name);
                    $i++;
                }
                # Crear el "combinador"
                $combinador = new Merger;

                # Agregar archivo en cada iteraci??n
                foreach ($documentos as $documento) {
                    $combinador->addFile('storage' . '/' . $documento);
                }

                # Y combinar o unir
                $salida = $combinador->merge();
                $name2 = $ChRecord[0]['admissions']['patients']['identification'] . 'ALL.pdf';
                Storage::disk('public')->put($name2, $salida);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'No se encuentran Historias clinicas asociadas al paciente',

                ]);
            }
        }


        ///Nutrici??n
        ///////////////////////////////////////

        else if ($request->ch_type == 3) {
            if (count($ChRecord) > 0) {
                foreach ($ChRecord as $ch) {



                    $hcAll = [];
                    $fecharecord = Carbon::parse($ch['updated_at'])->setTimezone('America/Bogota');

                    array_push($hcAll, $ch);

                    $count++;
                    if ($ch['firm_file']) {
                        $rutaImagenPatient = storage_path('app/public/' . $ch['firm_file']);
                        $contenidoBinarioPatient = file_get_contents($rutaImagenPatient);
                        $imagenPAtient = base64_encode($contenidoBinarioPatient);
}else{
 $imagenPAtient=null;
                    }



                    //Ingreso
                    $ChNutritionAnthropometry = ChNutritionAnthropometry::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChNutritionGastrointestinal = ChNutritionGastrointestinal::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChNutritionFoodHistory = ChNutritionFoodHistory::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChNutritionInterpretation = ChNutritionInterpretation::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChNutritionParenteral  = ChNutritionParenteral::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChRecommendations = ChRecommendationsEvo::with('recommendations_evo')->where('type_record_id', 1)->where('ch_record_id', $ch['id'])->get()->toArray();

                    //Antecedentes
                    $ChBackground = ChBackground::with('ch_type_background')->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    //Antecedentes Gyneco
                    $ChGynecologists = ChGynecologists::with(
                        'ch_type_gynecologists',
                        'ch_planning_gynecologists',
                        'ch_exam_gynecologists',
                        'ch_flow_gynecologists',
                        'ch_rst_cytology_gyneco',
                        'ch_rst_biopsy_gyneco',
                        'ch_rst_mammography_gyneco',
                        'ch_rst_colposcipia_gyneco',
                        'ch_failure_method_gyneco',
                        'ch_method_planning_gyneco'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();


                    //Regular
                    $ChNutritionAnthropometryNR = ChNutritionAnthropometry::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChNutritionParenteralNR  = ChNutritionParenteral::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChNutritionInterpretationNR  = ChNutritionInterpretation::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChRecommendationsNR = ChRecommendationsEvo::with('recommendations_evo')->where('type_record_id', 3)->where('ch_record_id', $ch['id'])->get()->toArray();

                    //Escalas
                    $ChScalePediatricNutrition = ChScalePediatricNutrition::where('ch_record_id', $ch['id'])->where('type_record_id', 4)->get()->toArray();
                    $ChScaleScreening = ChScaleScreening::where('ch_record_id', $ch['id'])->where('type_record_id', 4)->get()->toArray();
                    $ChScalePayette = ChScalePayette::where('ch_record_id', $ch['id'])->where('type_record_id', 4)->get()->toArray();
                    $ChScaleFragility = ChScaleFragility::where('ch_record_id', $ch['id'])->where('type_record_id', 4)->get()->toArray();

                    $ChFailed = ChFailed::with(
                        'ch_reason'
                    )
                        ->where('ch_record_id', $ch['id'])->where('type_record_id', 9)->get()->toArray();

                    if (isset($ch['user']['assistance'][0]['file_firm']) && $ch['user']['assistance'][0]['file_firm'] != "null") {
                        $rutaImagen = storage_path('app/public/' . $ch['user']['assistance'][0]['file_firm']);
                        $contenidoBinario = file_get_contents($rutaImagen);
                        $imagenComoBase64 = base64_encode($contenidoBinario);
                    } else {
                        $imagenComoBase64 = null;
                    }
                    $today = Carbon::now();

                    //Nota aclaratoria
                    $Disclaimer = Disclaimer::where('ch_record_id', $ch['id'])->get()->toArray();

                    // $patient=$ChRecord['admissions'];
                    $html = view('mails.nutritionhistory', [
                        'chrecord' => $ChRecord,
                        'chrecord2' => $ChRecord[$i],
                        'ChNutritionAnthropometry' => $ChNutritionAnthropometry,
                        'Disclaimer' => $Disclaimer,
                        'ChNutritionGastrointestinal' => $ChNutritionGastrointestinal,
                        'ChNutritionFoodHistory' => $ChNutritionFoodHistory,
                        'ChNutritionInterpretation' => $ChNutritionInterpretation,
                        'ChNutritionParenteral' => $ChNutritionParenteral,
                        'ChRecommendations' => $ChRecommendations,
                        'ChBackground' => $ChBackground,
                        'ChGynecologists' => $ChGynecologists,

                        'ChNutritionAnthropometryNR' => $ChNutritionAnthropometryNR,
                        'ChNutritionParenteralNR' => $ChNutritionParenteralNR,
                        'ChNutritionInterpretationNR' => $ChNutritionInterpretationNR,
                        'ChRecommendationsNR' => $ChRecommendationsNR,

                        'ChScalePediatricNutrition' => $ChScalePediatricNutrition,
                        'ChScaleScreening' => $ChScaleScreening,
                        'ChScalePayette' => $ChScalePayette,
                        'ChScaleFragility' => $ChScaleFragility,

                        'ChFailed' => $ChFailed,
                        'fecharecord' => $fecharecord,



                        'firmPatient' => $imagenPAtient,

                        'firm' => $imagenComoBase64,
                        'today' => $today,

                    ])->render();

                    $options = new Options();
                    $options->set('isRemoteEnabled', true);
                    $dompdf = new PDF($options);
                    $dompdf->loadHtml($html);
                    $dompdf->setPaper('Carta', 'portrait');
                    $dompdf->render();
                    $this->injectPageCount($dompdf);
                    $file = $dompdf->output();

                    $name =  $ChRecord[0]['admissions']['patients']['identification'] . $count . '.pdf';


                    Storage::disk('public')->put($name, $file);

                    array_push($documentos, $name);
                }


                # Crear el "combinador"
                $combinador = new Merger;

                # Agregar archivo en cada iteraci??n
                foreach ($documentos as $documento) {
                    $combinador->addFile('storage' . '/' . $documento);
                }

                # Y combinar o unir
                $salida = $combinador->merge();
                $name2 = $ChRecord[0]['admissions']['patients']['identification'] . 'ALL.pdf';
                Storage::disk('public')->put($name2, $salida);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'No se encuentran Historias clinicas asociadas al paciente',

                ]);
            }
        }

        //Terapia de Lenguaje////

        else if ($request->ch_type == 4) {
            if (count($ChRecord) > 0) {
                foreach ($ChRecord as $ch) {



                    $hcAll = [];
                    $fecharecord = Carbon::parse($ch['updated_at'])->setTimezone('America/Bogota');

                    array_push($hcAll, $ch);

                    $count++;
                    if ($ch['firm_file']) {
                        $rutaImagenPatient = storage_path('app/public/' . $ch['firm_file']);
                        $contenidoBinarioPatient = file_get_contents($rutaImagenPatient);
                        $imagenPAtient = base64_encode($contenidoBinarioPatient);
}else{
 $imagenPAtient=null;
                    }



                    // INGRESO
                    $TlTherapyLanguage = TlTherapyLanguage::with('medical_diagnostic', 'therapeutic_diagnosis')->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChVitalSigns = ChVitalSigns::with(
                        'ch_vital_hydration',
                        'ch_vital_ventilated',
                        'ch_vital_temperature',
                        'ch_vital_neurological',
                        'oxygen_type',
                        'liters_per_minute',
                        'parameters_signs'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();

                    //Antecedentes
                    $ChBackground = ChBackground::with('ch_type_background')->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    //Antecedentes Gyneco
                    $ChGynecologists = ChGynecologists::with(
                        'ch_type_gynecologists',
                        'ch_planning_gynecologists',
                        'ch_exam_gynecologists',
                        'ch_flow_gynecologists',
                        'ch_rst_cytology_gyneco',
                        'ch_rst_biopsy_gyneco',
                        'ch_rst_mammography_gyneco',
                        'ch_rst_colposcipia_gyneco',
                        'ch_failure_method_gyneco',
                        'ch_method_planning_gyneco'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();

                    //Evoluci??n
                    $OstomiesTl = OstomiesTl::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $SwallowingDisordersTL = SwallowingDisordersTL::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $VoiceAlterationsTl = VoiceAlterationsTl::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $HearingTl = HearingTl::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $LanguageTl = LanguageTl::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $CommunicationTl = CommunicationTl::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $CognitiveTl = CognitiveTl::where('ch_record_id', $ch['id'])->get()->toArray();
                    $OrofacialTl = OrofacialTl::where('ch_record_id', $ch['id'])->get()->toArray();
                    $SpeechTl = SpeechTl::where('ch_record_id', $ch['id'])->get()->toArray();
                    $SpecificTestsTl = SpecificTestsTl::where('ch_record_id', $ch['id'])->get()->toArray();
                    $TherapeuticGoalsTl = TherapeuticGoalsTl::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $CifDiagnosisTl = CifDiagnosisTl::where('ch_record_id', $ch['id'])->get()->toArray();
                    $NumberMonthlySessionsTl = NumberMonthlySessionsTl::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();

                    // REGULAR
                    // Valoraci??n
                    $TlTherapyLanguageRegular = TlTherapyLanguageRegular::with('diagnosis',)->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChVitalSignsEvotl = ChVitalSigns::with(
                        'ch_vital_hydration',
                        'ch_vital_ventilated',
                        'ch_vital_temperature',
                        'ch_vital_neurological',
                        'oxygen_type',
                        'liters_per_minute',
                        'parameters_signs'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();

                    $TherapeuticGoalsTlEvo = TherapeuticGoalsTl::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $InterventionTl = InterventionTl::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $CifDiagnosisTlEvo = CifDiagnosisTl::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $TherapyConceptTl = TherapyConceptTl::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $NumberMonthlySessionsTlEvo = NumberMonthlySessionsTl::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $InputMaterialsUsedTl = InputMaterialsUsedTl::where('ch_record_id', $ch['id'])->get()->toArray();
                    $ChRecommendationsEvo = ChRecommendationsEvo::with('recommendations_evo')->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    if (isset($ch['user']['assistance'][0]['file_firm']) && $ch['user']['assistance'][0]['file_firm'] != "null") {
                        $rutaImagen = storage_path('app/public/' . $ch['user']['assistance'][0]['file_firm']);
                        $contenidoBinario = file_get_contents($rutaImagen);
                        $imagenComoBase64 = base64_encode($contenidoBinario);
                    } else {
                        $imagenComoBase64 = null;
                    }
                    $today = Carbon::now();

                    //Nota aclaratoria
                    $Disclaimer = Disclaimer::where('ch_record_id', $ch['id'])->get()->toArray();

                    $Patients = $ch['admissions']['patients'];

                    // $patient=$ChRecord['admissions'];
                    $html = view('mails.lenguagehistory', [
                        'chrecord' => $ChRecord,
                        'chrecord2' => $ChRecord[$i],

                        'Disclaimer' => $Disclaimer,
                        'TlTherapyLanguage' => $TlTherapyLanguage,
                        'OstomiesTl' => $OstomiesTl,

                        'SwallowingDisordersTL' => $SwallowingDisordersTL,
                        'VoiceAlterationsTl' => $VoiceAlterationsTl,
                        'HearingTl' => $HearingTl,
                        'LanguageTl' => $LanguageTl,
                        'CommunicationTl' => $CommunicationTl,
                        'CognitiveTl' => $CognitiveTl,
                        'OrofacialTl' => $OrofacialTl,
                        'SpeechTl' => $SpeechTl,
                        'SpecificTestsTl' => $SpecificTestsTl,
                        'TherapeuticGoalsTl' => $TherapeuticGoalsTl,
                        'CifDiagnosisTl' => $CifDiagnosisTl,
                        'NumberMonthlySessionsTl' => $NumberMonthlySessionsTl,
                        'ChVitalSigns' => $ChVitalSigns,
                        'ChBackground' => $ChBackground,
                        'ChGynecologists' => $ChGynecologists,
                        'TlTherapyLanguageRegular' => $TlTherapyLanguageRegular,
                        'ChVitalSignsEvotl' => $ChVitalSignsEvotl,
                        'TherapeuticGoalsTlEvo' => $TherapeuticGoalsTlEvo,
                        'InterventionTl' => $InterventionTl,
                        'CifDiagnosisTlEvo' => $CifDiagnosisTl,
                        'CifDiagnosisTlEvo' => $CifDiagnosisTl,
                        'TherapyConceptTl' => $TherapyConceptTl,
                        'InputMaterialsUsedTl' => $InputMaterialsUsedTl,
                        'NumberMonthlySessionsTlEvo' => $NumberMonthlySessionsTl,
                        'ChRecommendationsEvo' => $ChRecommendationsEvo,
                        'firmPatient' => $imagenPAtient,
                        'fecharecord' => $fecharecord,

                        'firm' => $imagenComoBase64,
                        'today' => $today,
                        //   asset('storage/'.$ch['user']['assistance'][0]['file_firm']),
                        //   'http://localhost:8000/storage/app/public/'.$ch['user']['assistance'][0]['file_firm'],
                        //   storage_path('app/public/'.$ch['user']['assistance'][0]['file_firm']),

                    ])->render();

                    $options = new Options();
                    $options->set('isRemoteEnabled', true);
                    $dompdf = new PDF($options);
                    $dompdf->loadHtml($html);
                    $dompdf->setPaper('Carta', 'portrait');
                    $dompdf->render();
                    $this->injectPageCount($dompdf);
                    $file = $dompdf->output();

                    $name =  $ChRecord[0]['admissions']['patients']['identification'] . $count . '.pdf';


                    Storage::disk('public')->put($name, $file);


                    array_push($documentos, $name);
                }


                # Crear el "combinador"
                $combinador = new Merger;

                # Agregar archivo en cada iteraci??n
                foreach ($documentos as $documento) {
                    $combinador->addFile('storage' . '/' . $documento);
                }

                # Y combinar o unir
                $salida = $combinador->merge();
                $name2 = $ChRecord[0]['admissions']['patients']['identification'] . 'ALL.pdf';
                Storage::disk('public')->put($name2, $salida);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'No se encuentran Historias clinicas asociadas al paciente',

                ]);
            }
        }



        ///////////////////////////////
        // Terapia Respiratoria
        //////////////////////////////////////////////////////////
        else if ($request->ch_type == 5) {
            if (count($ChRecord) > 0) {
                foreach ($ChRecord as $ch) {



                    $hcAll = [];
                    $fecharecord = Carbon::parse($ch['updated_at'])->setTimezone('America/Bogota');

                    array_push($hcAll, $ch);

                    $count++;
                    if ($ch['firm_file']) {
                        $rutaImagenPatient = storage_path('app/public/' . $ch['firm_file']);
                        $contenidoBinarioPatient = file_get_contents($rutaImagenPatient);
                        $imagenPAtient = base64_encode($contenidoBinarioPatient);
}else{
 $imagenPAtient=null;}

                    //Ingreso
                    $ChRespiratoryTherapy = ChRespiratoryTherapy::with('medical_diagnosis')->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChBackground = ChBackground::with('ch_type_background')->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChGynecologists = ChGynecologists::with(
                        'ch_type_gynecologists',
                        'ch_planning_gynecologists',
                        'ch_exam_gynecologists',
                        'ch_flow_gynecologists',
                        'ch_rst_cytology_gyneco',
                        'ch_rst_biopsy_gyneco',
                        'ch_rst_mammography_gyneco',
                        'ch_rst_colposcipia_gyneco',
                        'ch_failure_method_gyneco',
                        'ch_method_planning_gyneco'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();

                    $ChVitalSigns = ChVitalSigns::with(
                        'ch_vital_hydration',
                        'ch_vital_ventilated',
                        'ch_vital_temperature',
                        'ch_vital_neurological',
                        'oxygen_type',
                        'liters_per_minute',
                        'parameters_signs'
                    )
                        ->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChOxygenTherapy = ChOxygenTherapy::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChTherapeuticAss = ChTherapeuticAss::with(
                        'ch_ass_pattern',
                        'ch_ass_swing',
                        'ch_ass_frequency',
                        'ch_ass_mode',
                        'ch_ass_cough',
                        'ch_ass_chest_type',
                        'ch_ass_chest_symmetry',
                        'ch_ass_signs'
                    )
                        ->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChAssSigns = ChAssSigns::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChScalePain = ChScalePain::where('ch_record_id', $ch['id'])->where('type_record_id', 4)->get()->toArray();
                    $ChScaleWongBaker = ChScaleWongBaker::where('ch_record_id', $ch['id'])->where('type_record_id', 4)->get()->toArray();
                    $ChRtInspection = ChRtInspection::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChAuscultation = ChAuscultation::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChDiagnosticAids = ChDiagnosticAids::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChObjectivesTherapy = ChObjectivesTherapy::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $PharmacyProductRequest = PharmacyProductRequest::with(
                        'product_supplies',
                        'request_pharmacy_stock'
                    )->get()->toArray();
                    $ChRtSessions = ChRtSessions::with('frequency')->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();

                    //Regular
                    $ChRespiratoryTherapyEvo = ChRespiratoryTherapy::with('medical_diagnosis')->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChBackgroundEvo = ChBackground::with('ch_type_background')->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    //Antecedentes Gyneco
                    $ChGynecologistsEvo = ChGynecologists::with(
                        'ch_type_gynecologists',
                        'ch_planning_gynecologists',
                        'ch_exam_gynecologists',
                        'ch_flow_gynecologists',
                        'ch_rst_cytology_gyneco',
                        'ch_rst_biopsy_gyneco',
                        'ch_rst_mammography_gyneco',
                        'ch_rst_colposcipia_gyneco',
                        'ch_failure_method_gyneco',
                        'ch_method_planning_gyneco'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();

                    $ChVitalSignsEvo = ChVitalSigns::with(
                        'ch_vital_hydration',
                        'ch_vital_ventilated',
                        'ch_vital_temperature',
                        'ch_vital_neurological',
                        'oxygen_type',
                        'liters_per_minute',
                        'parameters_signs'
                    )
                        ->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChOxygenTherapyEvo = ChOxygenTherapy::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $PharmacyProductRequestEvo = PharmacyProductRequest::with(
                        'product_supplies',
                        'request_pharmacy_stock'
                    )->get()->toArray();
                    $ChRtSessionsEvo = ChRtSessions::with('frequency')->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChPsIntervention = ChPsIntervention::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChRecommendationsEvo = ChRecommendationsEvo::with('recommendations_evo')->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();

                    if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
                        if ($ChRecord[0]['user']['assistance'][0]['file_firm'] != 'null') {
                            $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
                            $contenidoBinario = file_get_contents($rutaImagen);
                            $imagenComoBase64 = base64_encode($contenidoBinario);
                        }
                    } else {
                        $imagenComoBase64 = null;
                    }
                    $today = Carbon::now();
                    $Patients = $ChRecord[0]['admissions']['patients'];
                    //Nota aclaratoria
                    $Disclaimer = Disclaimer::where('ch_record_id', $ch['id'])->get()->toArray();

                    // $patient=$ChRecord['admissions'];

                    $html = view('mails.respiratoryhistory', [
                        'chrecord' => $ChRecord,
                        'chrecord2' => $ChRecord[$i],

                        'Disclaimer' => $Disclaimer,
                        'ChRespiratoryTherapy' => $ChRespiratoryTherapy,
                        'ChBackground' => $ChBackground,
                        'ChGynecologists' => $ChGynecologists,
                        'ChVitalSigns' => $ChVitalSigns,
                        'ChOxygenTherapy' => $ChOxygenTherapy,
                        'ChAssSigns' => $ChAssSigns,
                        'ChTherapeuticAss' => $ChTherapeuticAss,
                        'ChScalePain' => $ChScalePain,
                        'ChScaleWongBaker' => $ChScaleWongBaker,
                        'ChRtInspection' => $ChRtInspection,
                        'ChAuscultation' => $ChAuscultation,
                        'ChDiagnosticAids' => $ChDiagnosticAids,
                        'ChObjectivesTherapy' => $ChObjectivesTherapy,
                        'PharmacyProductRequest' => $PharmacyProductRequest,
                        'ChRtSessions' => $ChRtSessions,
                        'fecharecord' => $fecharecord,

                        'ChRespiratoryTherapyEvo' => $ChRespiratoryTherapyEvo,
                        'ChBackgroundEvo' => $ChBackgroundEvo,
                        'ChGynecologistsEvo' => $ChGynecologistsEvo,
                        'ChVitalSignsEvo' => $ChVitalSignsEvo,
                        'ChOxygenTherapyEvo' => $ChOxygenTherapyEvo,
                        'ChRtSessionsEvo' => $ChRtSessionsEvo,
                        'ChPsIntervention' => $ChPsIntervention,
                        'ChRecommendationsEvo' => $ChRecommendationsEvo,
                        'PharmacyProductRequestEvo' => $PharmacyProductRequestEvo,
                        'firmPatient' => $imagenPAtient,

                        'firm' => $imagenComoBase64,
                        'today' => $today,
                        //   asset('storage/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),
                        //   'http://localhost:8000/storage/app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm'],
                        //   storage_path('app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),

                    ])->render();

                    $options = new Options();
                    $options->set('isRemoteEnabled', true);
                    $dompdf = new PDF($options);
                    $dompdf->loadHtml($html);
                    $dompdf->setPaper('Carta', 'portrait');
                    $dompdf->render();
                    $this->injectPageCount($dompdf);
                    $file = $dompdf->output();

                    $name =  $ChRecord[0]['admissions']['patients']['identification'] . $count . '.pdf';
                    $name2 = $ChRecord[0]['admissions']['patients']['identification'] . 'ALL.pdf';


                    Storage::disk('public')->put($name, $file);
                    array_push($documentos, $name);

                    $i++;
                }


                # Crear el "combinador"
                $combinador = new Merger;

                # Agregar archivo en cada iteraci??n
                foreach ($documentos as $documento) {
                    $combinador->addFile('storage' . '/' . $documento);
                }

                # Y combinar o unir
                $salida = $combinador->merge();
                $name2 = $ChRecord[0]['admissions']['patients']['identification'] . 'ALL.pdf';
                Storage::disk('public')->put($name2, $salida);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'No se encuentran Historias clinicas asociadas al paciente',

                ]);
            }
        }



        ///Terapia ocupacional
        ///////////////////////////////////////

        else if ($request->ch_type == 6) {
            if (count($ChRecord) > 0) {
                foreach ($ChRecord as $ch) {



                    $hcAll = [];
                    $fecharecord = Carbon::parse($ch['updated_at'])->setTimezone('America/Bogota');
                    array_push($hcAll, $ch);

                    $count++;
                    if ($ch['firm_file']) {
                        $rutaImagenPatient = storage_path('app/public/' . $ch['firm_file']);
                        $contenidoBinarioPatient = file_get_contents($rutaImagenPatient);
                        $imagenPAtient = base64_encode($contenidoBinarioPatient);
}else{
 $imagenPAtient=null;}
                    //Ingreso
                    $ChEValorationOT = ChEValorationOT::with('ch_diagnosis')->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChVitalSigns = ChVitalSigns::with(
                        'ch_vital_hydration',
                        'ch_vital_ventilated',
                        'ch_vital_temperature',
                        'ch_vital_neurological',
                        'oxygen_type',
                        'liters_per_minute',
                        'parameters_signs'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEOccHistoryOT = ChEOccHistoryOT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEPastOT = ChEPastOT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEDailyActivitiesOT = ChEDailyActivitiesOT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEMSFunPatOT = ChEMSFunPatOT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEMSIntPatOT = ChEMSIntPatOT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEMSMovPatOT = ChEMSMovPatOT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEMSThermalOT = ChEMSThermalOT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEMSDisAuditoryOT = ChEMSDisAuditoryOT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEMSDisTactileOT = ChEMSDisTactileOT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEMSAcuityOT = ChEMSAcuityOT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEMSComponentOT = ChEMSComponentOT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEMSTestOT = ChEMSTestOT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEMSCommunicationOT = ChEMSCommunicationOT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEMSAssessmentOT = ChEMSAssessmentOT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEMSWeeklyOT = ChEMSWeeklyOT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();

                    $ChEValorationOTNT = ChEValorationOT::with('ch_diagnosis')->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();

                    //Regular
                    $ChRNValorationOT = ChRNValorationOT::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChVitalSignsNT = ChVitalSigns::with(
                        'ch_vital_hydration',
                        'ch_vital_ventilated',
                        'ch_vital_temperature',
                        'ch_vital_neurological',
                        'oxygen_type',
                        'liters_per_minute',
                        'parameters_signs'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();

                    $ChRNMaterialsOTNT = ChRNMaterialsOT::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChEMSWeeklyOTNT = ChEMSWeeklyOT::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChEMSAssessmentOTNT = ChEMSAssessmentOT::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChRecommendationsEvo = ChRecommendationsEvo::with('recommendations_evo')->where('type_record_id', 3)->where('ch_record_id', $ch['id'])->get()->toArray();
                    if (isset($ch['user']['assistance'][0]['file_firm']) && $ch['user']['assistance'][0]['file_firm'] != "null") {
                        $rutaImagen = storage_path('app/public/' . $ch['user']['assistance'][0]['file_firm']);
                        $contenidoBinario = file_get_contents($rutaImagen);
                        $imagenComoBase64 = base64_encode($contenidoBinario);
                    } else {
                        $imagenComoBase64 = null;
                    }
                    $today = Carbon::now();
                    //Nota aclaratoria
                    $Disclaimer = Disclaimer::where('ch_record_id', $ch['id'])->get()->toArray();


                    $Patients = $ch['admissions']['patients'];

                    // $patient=$ChRecord['admissions'];
                    $html = view('mails.occupationalhistory', [
                        'chrecord' => $ChRecord,
                        'chrecord2' => $ChRecord[$i],
                        'Disclaimer' => $Disclaimer,
                        'ChEValorationOT' => $ChEValorationOT,
                        'ChVitalSigns' => $ChVitalSigns,
                        'ChEOccHistoryOT' => $ChEOccHistoryOT,
                        'ChEPastOT' => $ChEPastOT,
                        'ChEDailyActivitiesOT' => $ChEDailyActivitiesOT,
                        'ChEMSFunPatOT' => $ChEMSFunPatOT,
                        'ChEMSIntPatOT' => $ChEMSIntPatOT,
                        'ChEMSMovPatOT' => $ChEMSMovPatOT,
                        'ChEMSThermalOT' => $ChEMSThermalOT,
                        'ChEMSDisAuditoryOT' => $ChEMSDisAuditoryOT,
                        'ChEMSDisTactileOT' => $ChEMSDisTactileOT,
                        'ChEMSAcuityOT' => $ChEMSAcuityOT,
                        'ChEMSComponentOT' => $ChEMSComponentOT,
                        'ChEMSTestOT' => $ChEMSTestOT,
                        'ChEMSCommunicationOT' => $ChEMSCommunicationOT,
                        'ChEMSAssessmentOT' => $ChEMSAssessmentOT,
                        'ChEMSWeeklyOT' => $ChEMSWeeklyOT,
                        'ChEValorationOTNT' => $ChEValorationOTNT,
                        'ChRNValorationOT' => $ChRNValorationOT,
                        'ChVitalSignsNT' => $ChVitalSignsNT,
                        'ChEMSAssessmentOTNT' => $ChEMSAssessmentOTNT,
                        'ChRNMaterialsOTNT' => $ChRNMaterialsOTNT,
                        'ChEMSWeeklyOTNT' => $ChEMSWeeklyOTNT,
                        'ChRecommendationsEvo' => $ChRecommendationsEvo,
                        'firmPatient' => $imagenPAtient,
                        'fecharecord' => $fecharecord,

                        'firm' => $imagenComoBase64,
                        'today' => $today,
                        //   asset('storage/'.$ch['user']['assistance'][0]['file_firm']),
                        //   'http://localhost:8000/storage/app/public/'.$ch['user']['assistance'][0]['file_firm'],
                        //   storage_path('app/public/'.$ch['user']['assistance'][0]['file_firm']),

                    ])->render();

                    $options = new Options();
                    $options->set('isRemoteEnabled', true);
                    $dompdf = new PDF($options);
                    $dompdf->loadHtml($html);
                    $dompdf->setPaper('Carta', 'portrait');
                    $dompdf->render();
                    $this->injectPageCount($dompdf);
                    $file = $dompdf->output();

                    $name =  $ChRecord[0]['admissions']['patients']['identification'] . $count . '.pdf';


                    Storage::disk('public')->put($name, $file);


                    array_push($documentos, $name);
                }


                # Crear el "combinador"
                $combinador = new Merger;

                # Agregar archivo en cada iteraci??n
                foreach ($documentos as $documento) {
                    $combinador->addFile('storage' . '/' . $documento);
                }

                # Y combinar o unir
                $salida = $combinador->merge();
                $name2 = $ChRecord[0]['admissions']['patients']['identification'] . 'ALL.pdf';
                Storage::disk('public')->put($name2, $salida);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'No se encuentran Historias clinicas asociadas al paciente',

                ]);
            }
        }


        ///Terapia F??sica
        ///////////////////////////////////////////                
        else if ($request->ch_type == 7) {
            if (count($ChRecord) > 0) {
                foreach ($ChRecord as $ch) {



                    $hcAll = [];
                    $fecharecord = Carbon::parse($ch['updated_at'])->setTimezone('America/Bogota');

                    array_push($hcAll, $ch);

                    $count++;
                    if ($ch['firm_file']) {
                        $rutaImagenPatient = storage_path('app/public/' . $ch['firm_file']);
                        $contenidoBinarioPatient = file_get_contents($rutaImagenPatient);
                        $imagenPAtient = base64_encode($contenidoBinarioPatient);
}else{
 $imagenPAtient=null;
                    }
                    //Ingreso
                    $ChEValorationFT = ChEValorationFT::with(
                        'ch_diagnosis'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChVitalSigns = ChVitalSigns::with(
                        'ch_vital_hydration',
                        'ch_vital_ventilated',
                        'ch_vital_temperature',
                        'ch_vital_neurological',
                        'oxygen_type',
                        'liters_per_minute',
                        'parameters_signs'
                    )
                        ->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEValorationTherFT = ChEValorationTherFT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEPainFT = ChEPainFT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChESysIntegumentaryFT = ChESysIntegumentaryFT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEMuscularStrengthFT = ChEMuscularStrengthFT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChESysMusculoskeletalFT = ChESysMusculoskeletalFT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChESensibilityFT = ChESensibilityFT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEMuscularToneFT = ChEMuscularToneFT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEReflectionFT = ChEReflectionFT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEFlexibilityFT = ChEFlexibilityFT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEBalanceFT = ChEBalanceFT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEPositionFT = ChEPositionFT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEMarchFT = ChEMarchFT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEDiagnosisFT = ChEDiagnosisFT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChETherGoalsFT = ChETherGoalsFT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChEWeeklyFT = ChEWeeklyFT::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChNRMaterialsFT = ChNRMaterialsFT::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    ///Regular
                    $ChEValorationFTEvo = ChEValorationFT::with(
                        'ch_diagnosis'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChVitalSignsEvo = ChVitalSigns::with(
                        'ch_vital_hydration',
                        'ch_vital_ventilated',
                        'ch_vital_temperature',
                        'ch_vital_neurological',
                        'oxygen_type',
                        'liters_per_minute',
                        'parameters_signs'
                    )
                        ->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChETherGoalsFTEvo = ChETherGoalsFT::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChEDiagnosisFTEvo = ChEDiagnosisFT::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChEWeeklyFTEvo = ChEWeeklyFT::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChEMSAssessmentOTNT = ChEMSAssessmentOT::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChRecommendationsEvo = ChRecommendationsEvo::with('recommendations_evo')->where('type_record_id', 3)->where('ch_record_id', $ch['id'])->get()->toArray();
                    if (isset($ch['user']['assistance'][0]['file_firm']) && $ch['user']['assistance'][0]['file_firm'] != "null") {
                        $rutaImagen = storage_path('app/public/' . $ch['user']['assistance'][0]['file_firm']);
                        $contenidoBinario = file_get_contents($rutaImagen);
                        $imagenComoBase64 = base64_encode($contenidoBinario);
                    } else {
                        $imagenComoBase64 = null;
                    }
                    $today = Carbon::now();

                    //Nota aclaratoria
                    $Disclaimer = Disclaimer::where('ch_record_id', $ch['id'])->get()->toArray();

                    $Patients = $ch['admissions']['patients'];

                    // $patient=$ChRecord['admissions'];

                    $html = view('mails.physicalhistory', [
                        'chrecord' => $ChRecord,
                        'chrecord2' => $ChRecord[$i],

                        'Disclaimer' => $Disclaimer,
                        'ChEValorationFT' => $ChEValorationFT,
                        'ChVitalSigns' => $ChVitalSigns,
                        'ChEValorationTherFT' => $ChEValorationTherFT,
                        'ChEPainFT' => $ChEPainFT,
                        'ChESysIntegumentaryFT' => $ChESysIntegumentaryFT,
                        'ChESysMusculoskeletalFT' => $ChESysMusculoskeletalFT,
                        'ChEMuscularStrengthFT' => $ChEMuscularStrengthFT,
                        'ChESensibilityFT' => $ChESensibilityFT,
                        'ChEMuscularToneFT' => $ChEMuscularToneFT,
                        'ChEReflectionFT' => $ChEReflectionFT,
                        'ChEFlexibilityFT' => $ChEFlexibilityFT,
                        'ChEBalanceFT' => $ChEBalanceFT,
                        'ChEPositionFT' => $ChEPositionFT,
                        'ChEMarchFT' => $ChEMarchFT,
                        'ChEDiagnosisFT' => $ChEDiagnosisFT,
                        'ChETherGoalsFT' => $ChETherGoalsFT,
                        'ChEMSAssessmentOTNT' => $ChEMSAssessmentOTNT,
                        'ChRecommendationsEvo' => $ChRecommendationsEvo,
                        'ChNRMaterialsFT' => $ChNRMaterialsFT,

                        'ChEWeeklyFT' => $ChEWeeklyFT,
                        'fecharecord' => $fecharecord,

                        'ChEValorationFTEvo' => $ChEValorationFTEvo,
                        'ChVitalSignsEvo' => $ChVitalSignsEvo,
                        'ChETherGoalsFTEvo' => $ChETherGoalsFTEvo,
                        'ChEDiagnosisFTEvo' => $ChEDiagnosisFTEvo,
                        'ChEWeeklyFTEvo' => $ChEWeeklyFTEvo,
                        'firmPatient' => $imagenPAtient,


                        'firm' => $imagenComoBase64,
                        'today' => $today,
                        //   asset('storage/'.$ch['user']['assistance'][0]['file_firm']),
                        //   'http://localhost:8000/storage/app/public/'.$ch['user']['assistance'][0]['file_firm'],
                        //   storage_path('app/public/'.$ch['user']['assistance'][0]['file_firm']),


                    ])->render();

                    $options = new Options();
                    $options->set('isRemoteEnabled', TRUE);
                    $dompdf = new PDF($options);
                    $dompdf->loadHtml($html);
                    $dompdf->setPaper('Carta', 'portrait');
                    $dompdf->render();
                    $this->injectPageCount($dompdf);
                    $file = $dompdf->output();

                    $name =  $ChRecord[0]['admissions']['patients']['identification'] . $count . '.pdf';


                    Storage::disk('public')->put($name, $file);
                    array_push($documentos, $name);
                }


                # Crear el "combinador"
                $combinador = new Merger;

                # Agregar archivo en cada iteraci??n
                foreach ($documentos as $documento) {
                    $combinador->addFile('storage' . '/' . $documento);
                }

                # Y combinar o unir
                $salida = $combinador->merge();
                $name2 = $ChRecord[0]['admissions']['patients']['identification'] . 'ALL.pdf';
                Storage::disk('public')->put($name2, $salida);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'No se encuentran Historias clinicas asociadas al paciente',

                ]);
            }
        }

        // Trabajo Social
        //////////////////////////////////

        else if ($request->ch_type == 8) {
            if (count($ChRecord) > 0) {
                foreach ($ChRecord as $ch) {



                    $hcAll = [];
                    $fecharecord = Carbon::parse($ch['updated_at'])->setTimezone('America/Bogota');

                    array_push($hcAll, $ch);

                    $count++;
                    if ($ch['firm_file']) {
                        $rutaImagenPatient = storage_path('app/public/' . $ch['firm_file']);
                        $contenidoBinarioPatient = file_get_contents($rutaImagenPatient);
                        $imagenPAtient = base64_encode($contenidoBinarioPatient);
}else{
 $imagenPAtient=null;
                    }
                    //Ingreso    
                    $ChSwDiagnosis = ChSwDiagnosis::with(
                        'ch_diagnosis',
                        'ch_diagnosis.diagnosis'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChSwFamily = ChSwFamily::with(
                        'relationship',
                        'identification_type',
                        'marital_status',
                        'academic_level',
                        'study_level_status',
                        'activities',
                        'inability'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChSwNursing = ChSwNursing::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChSwOccupationalHistory = ChSwOccupationalHistory::with(
                        'ch_sw_occupation',
                        'ch_sw_seniority',
                        'ch_sw_hours',
                        'ch_sw_turn'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChSwFamilyDynamics = ChSwFamilyDynamics::with(
                        'decisions',
                        'decisions.relationship',
                        'authority',
                        'authority.relationship',
                        'ch_sw_communications',
                        'ch_sw_expression'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChSwRiskFactors = ChSwRiskFactors::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChSwHousingAspect = ChSwHousingAspect::with(
                        'ch_sw_housing_type',
                        'ch_sw_housing'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChSwConditionHousing = ChSwConditionHousing::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChSwHygieneHousing = ChSwHygieneHousing::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChSwIncome = ChSwIncome::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChSwExpenses = ChSwExpenses::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChSwEconomicAspects = ChSwEconomicAspects::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $ChSwArmedConflict = ChSwArmedConflict::with(
                        'municipality',
                        'population_group',
                        'ethnicity'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();
                    $SwEducationDr = SwEducation::select('sw_education.*')->with(
                        'sw_rights_duties'
                    )->leftJoin('sw_rights_duties', 'sw_education.sw_rights_duties_id', 'sw_rights_duties.id')->where('ch_record_id', $ch['id'])->where('type_record_id', 1)
                        ->where('sw_rights_duties.code', 1)->get()->toArray();
                    $SwEducationDb = SwEducation::select('sw_education.*')->with(
                        'sw_rights_duties'
                    )->leftJoin('sw_rights_duties', 'sw_education.sw_rights_duties_id', 'sw_rights_duties.id')->where('ch_record_id', $ch['id'])->where('type_record_id', 1)
                        ->where('sw_rights_duties.code', 2)->get()->toArray();
                    $ChSwSupportNetwork = ChSwSupportNetwork::with(
                        'ch_sw_network'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();

                    //Regular
                    $SwEducationEvoDr = SwEducation::select('sw_education.*')->with(
                        'sw_rights_duties'
                    )->leftJoin('sw_rights_duties', 'sw_education.sw_rights_duties_id', 'sw_rights_duties.id')->where('ch_record_id', $ch['id'])->where('type_record_id', 3)
                        ->where('sw_rights_duties.code', 1)->get()->toArray();
                    $SwEducationEvoDb = SwEducation::select('sw_education.*')->with(
                        'sw_rights_duties'
                    )->leftJoin('sw_rights_duties', 'sw_education.sw_rights_duties_id', 'sw_rights_duties.id')->where('ch_record_id', $ch['id'])->where('type_record_id', 3)
                        ->where('sw_rights_duties.code', 2)->get()->toArray();

                    $ChSwSupportNetworkEvo = ChSwSupportNetwork::with(
                        'ch_sw_network'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    
                    $ChPsIntervention = ChPsIntervention::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();

                    if (isset($ch['user']['assistance'][0]['file_firm']) && $ch['user']['assistance'][0]['file_firm'] != "null") {
                        $rutaImagen = storage_path('app/public/' . $ch['user']['assistance'][0]['file_firm']);
                        $contenidoBinario = file_get_contents($rutaImagen);
                        $imagenComoBase64 = base64_encode($contenidoBinario);
                    } else {
                        $imagenComoBase64 = null;
                    }
                    $today = Carbon::now();
                    $Patients = $ch['admissions']['patients'];
                    //Nota aclaratoria
                    $Disclaimer = Disclaimer::where('ch_record_id', $ch['id'])->get()->toArray();

                    // $patient=$ChRecord['admissions'];

                    $html = view('mails.sworkhistory', [
                        'chrecord' => $hcAll,
                        'chrecord2' => $ChRecord[$i],
                        'Disclaimer' => $Disclaimer,
                        'ChSwDiagnosis' => $ChSwDiagnosis,
                        'ChSwFamily' => $ChSwFamily,
                        'ChSwNursing' => $ChSwNursing,
                        'ChSwOccupationalHistory' => $ChSwOccupationalHistory,
                        'ChSwFamilyDynamics' => $ChSwFamilyDynamics,
                        'ChSwRiskFactors' => $ChSwRiskFactors,
                        'ChSwHousingAspect' => $ChSwHousingAspect,
                        'ChSwConditionHousing' => $ChSwConditionHousing,
                        'ChSwHygieneHousing' => $ChSwHygieneHousing,
                        'ChSwIncome' => $ChSwIncome,
                        'ChSwExpenses' => $ChSwExpenses,
                        'ChSwEconomicAspects' => $ChSwEconomicAspects,
                        'ChSwArmedConflict' => $ChSwArmedConflict,
                        'ChSwSupportNetwork' => $ChSwSupportNetwork,
                        'SwEducationDr' => $SwEducationDr,
                        'SwEducationDb' => $SwEducationDb,
                        'ChSwSupportNetworkEvo' => $ChSwSupportNetworkEvo,
                        'ChPsIntervention' => $ChPsIntervention,
                        'firmPatient' => $imagenPAtient,
                        'fecharecord' => $fecharecord,

                        'SwEducationEvoDr' => $SwEducationEvoDr,
                        'SwEducationEvoDb' => $SwEducationEvoDb,
                        'firm' => $imagenComoBase64,
                        'today' => $today,
                        //   asset('storage/'.$ch['user']['assistance'][0]['file_firm']),
                        //   'http://localhost:8000/storage/app/public/'.$ch['user']['assistance'][0]['file_firm'],
                        //   storage_path('app/public/'.$ch['user']['assistance'][0]['file_firm']),


                    ])->render();

                    $options = new Options();
                    $options->set('isRemoteEnabled', TRUE);
                    $dompdf = new PDF($options);
                    $dompdf->loadHtml($html);
                    $dompdf->setPaper('Carta', 'portrait');
                    $dompdf->render();
                    $this->injectPageCount($dompdf);
                    $file = $dompdf->output();

                    $name =  $ChRecord[0]['admissions']['patients']['identification'] . $count . '.pdf';


                    Storage::disk('public')->put($name, $file);
                    array_push($documentos, $name);
                }


                # Crear el "combinador"
                $combinador = new Merger;

                # Agregar archivo en cada iteraci??n
                foreach ($documentos as $documento) {
                    $combinador->addFile('storage' . '/' . $documento);
                }

                # Y combinar o unir
                $salida = $combinador->merge();
                $name2 = $ChRecord[0]['admissions']['patients']['identification'] . 'ALL.pdf';
                Storage::disk('public')->put($name2, $salida);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'No se encuentran Historias clinicas asociadas al paciente',

                ]);
            }
        }


        ///Seguimiento
        /////////////////////////////////

        else if ($request->ch_type == 10) {
            if (count($ChRecord) > 0) {
                foreach ($ChRecord as $ch) {

                    $hcAll = [];
                    $fecharecord = Carbon::parse($ch['updated_at'])->setTimezone('America/Bogota');

                    array_push($hcAll, $ch);

                    $count++;

                    //Seguimiento
                    $ChTracing = Tracing::select('tracing.*')->Leftjoin('ch_record', 'ch_record.id', 'tracing.ch_record_id')
                        ->where('ch_record.admissions_id', $ChRecord[0]['admissions_id'])
                        ->get()->toArray();

                    $today = Carbon::now();
                    $Patients = $ChRecord[0]['admissions']['patients'];

                    // $patient=$ChRecord['admissions'];

                    $html = view('mails.tracing', [
                        'chrecord' => $ChRecord,
                        'ChTracing' => $ChTracing,
                        'today' => $today,
                        //   asset('storage/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),
                        //   'http://localhost:8000/storage/app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm'],
                        //   storage_path('app/public/'.$ChRecord[0]['user']['assistance'][0]['file_firm']),


                    ])->render();

                    $options = new Options();
                    $options->set('isRemoteEnabled', TRUE);
                    $dompdf = new PDF($options);
                    $dompdf->loadHtml($html);
                    $dompdf->setPaper('Carta', 'portrait');
                    $dompdf->render();
                    $this->injectPageCount($dompdf);
                    $file = $dompdf->output();

                    $name = 'prueba.pdf';

                    Storage::disk('public')->put($name, $file);
                    array_push($documentos, $name);
                }


                # Crear el "combinador"
                $combinador = new Merger;

                # Agregar archivo en cada iteraci??n
                foreach ($documentos as $documento) {
                    $combinador->addFile('storage' . '/' . $documento);
                }

                # Y combinar o unir
                $salida = $combinador->merge();
                $name2 = $ChRecord[0]['admissions']['patients']['identification'] . 'ALL.pdf';
                Storage::disk('public')->put($name2, $salida);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'No se encuentran Historias clinicas asociadas al paciente',

                ]);
            }
        }



        return response()->json([
            'status' => true,
            'ch' => $ChRecord,
            'message' => 'Reporte generado exitosamente',
            'url' => asset('/storage' . '/' . $name2),
        ]);
    }



    public function store(Request $request): JsonResponse
    {


        $created = false;
        $count = 0;
        $chrecord_val = ChRecord::where('admissions_id', $request->admissions_id)->get()->toArray();
        foreach ($chrecord_val as $ch) {
            $count++;
        }
        $ChRecord = new ChRecord;

        $ChRecord->consecutive = $count + 1;
        $ChRecord->status = $request->status;
        $ChRecord->date_attention = Carbon::now();
        $ChRecord->admissions_id = $request->admissions_id;
        $ChRecord->assigned_management_plan_id = $request->assigned_management_plan;
        $ChRecord->ch_interconsultation_id = $request->ch_interconsultation_id;
        $ChRecord->medical_diary_days_id = $request->medical_diary_days_id;
        $ChRecord->user_id = Auth::user()->id;

        // }
        if ($request->type_of_attention_id && $request->type_of_attention_id != -1) {
            switch ($request->type_of_attention_id) {
                case (1): {
                        $ChRecord->ch_type_id = 1;
                        break;
                    }
                case (2): {
                        $ChRecord->ch_type_id = 1;
                        break;
                    }
                case (3): {
                        $ChRecord->ch_type_id = 2;
                        break;
                    }
                case (4): {
                        $ChRecord->ch_type_id = 3;
                        break;
                    }
                case (5): {
                        // PSICOLOG??A
                        $ChRecord->ch_type_id = 9;
                        break;
                    }
                case (6): {
                        // TRABAJO SOCIAL
                        $ChRecord->ch_type_id = 8;
                        break;
                    }
                case (7): {
                        // TERAPIA F??SICA
                        $ChRecord->ch_type_id = 7;
                        break;
                    }
                case (8): {
                        $ChRecord->ch_type_id = 5;
                        break;
                    }
                case (9): {
                        $ChRecord->ch_type_id = 5;
                        break;
                    }
                case (10): {

                        // TERAPIA OCUPACIONAL
                        $ChRecord->ch_type_id = 6;
                        break;
                    }
                case (11): {
                        $ChRecord->ch_type_id = 4;
                        break;
                    }
                case (12): {
                        $ChRecord->ch_type_id = 2;
                        break;
                    }
                case (13): {
                        // SERVICIO DE CUIDADOR
                        $ChRecord->ch_type_id = 2;
                        break;
                    }
                case (14): {
                        $ChRecord->ch_type_id = 2;
                        break;
                    }
                case (15): {
                        $ChRecord->ch_type_id = 2;
                        break;
                    }
                case (16): {
                        $ChRecord->ch_type_id = 2;
                        break;
                    }
                case (17): {
                        $ChRecord->ch_type_id = 2;
                        break;
                    }
                case (18): {
                        // DEPORTOLOGO
                        return response()->json([
                            'status' => false,
                            'message' => 'No hay historia cl??nica para esta atenci??n',
                            'data' => ['ch_record' => []],
                        ]);
                        break;
                    }
                case (19): {
                        $ChRecord->ch_type_id = 5;
                        break;
                    }
                case (20): {
                        //SEGUIMIENTO
                        $ChRecord->ch_type_id = 10;
                        break;
                    }
                default: {
                        $array = array(
                            3 => 1,
                            7 => 1,
                            8 => 2,
                            9 => 2,
                            10 => 3,
                            11 => 9,
                            12 => 8,
                            14 => 'AT',
                            134 => 4,
                            135 => 7,
                            136 => 6,
                            137 => 5,
                        );
                        if ($request->speciality_id == null || $request->speciality_id == 'null') {
                            
                            $register = $array[$request->role_id];
                            if($register == 'AT'){
                                $register = $this->ValidateSpeciality();
                            }
                        } else {
                            $register = $array[$request->speciality_id];
                        }
                        // var_dump(gettype($register));
                        if (gettype($register) == 'array') {
                            return response()->json([
                                'status' => true,
                                'message' => 'Se requiere seleccionar especializaci??n',
                                'data' => [
                                    'ch_record' => [],
                                    'assistance_special' => $register
                                ],
                            ]);
                        }
                        $ChRecord->ch_type_id = $register;

                        break;
                    }
            }
            if ($created == false && $request->ch_interconsultation_id) {
                $validate_ch_record = ChRecord::where('user_id' , Auth::user()->id)
                    ->where('status', 'ACTIVO')
                    ->whereNotNull('ch_interconsultation_id')
                    ->where('ch_interconsultation_id', $ChRecord->ch_interconsultation_id)
                    ->where('ch_type_id', $ChRecord->ch_type_id)
                    ->where('admissions_id', $ChRecord->admissions_id)->get()->first();

                if ($validate_ch_record) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Ya se encuentra un servicio activo para este tipo de historia cl??nica',
                        'data' => ['ch_record' => []],
                    ]);
                }
            }
        } else if ($request->ch_type_id) {
            $ChRecord->ch_type_id = $request->ch_type_id;
        } else if ($request->type_of_attention_id == -1) {
            $Assistance = Assistance::where('user_id', $request->user_id)
                ->get()->toArray();

            $type_of_attention = RoleAttention::where('role_id', $request->role);
            if ($request->role == 7 || $request->role == 14) {
                $type_of_attention->where(function ($query) use ($request) {
                    $query->where('specialty_id', $request->specialty_id);
                });
            }

            $type_of_attention = $type_of_attention->get()->toArray();

            foreach ($type_of_attention as $ta) {

                switch ($ta['type_of_attention_id']) {
                    case (1): {
                            $ChRecord->ch_type_id = 1;
                            break;
                        }
                    case (2): {
                            $ChRecord->ch_type_id = 1;
                            break;
                        }
                    case (3): {
                            $ChRecord->ch_type_id = 2;
                            break;
                        }
                    case (4): {
                            $ChRecord->ch_type_id = 3;
                            break;
                        }
                    case (5): {
                            // PSICOLOG??A
                            $ChRecord->ch_type_id = 9;
                            break;
                        }
                    case (6): {
                            // TRABAJO SOCIAL
                            $ChRecord->ch_type_id = 8;
                            break;
                        }
                    case (7): {
                            // TERAPIA F??SICA
                            $ChRecord->ch_type_id = 7;
                            break;
                        }
                    case (8): {
                            $ChRecord->ch_type_id = 5;
                            break;
                        }
                    case (9): {
                            $ChRecord->ch_type_id = 5;
                            break;
                        }
                    case (10): {

                            // TERAPIA OCUPACIONAL
                            $ChRecord->ch_type_id = 6;
                            break;
                        }
                    case (11): {
                            $ChRecord->ch_type_id = 4;
                            break;
                        }
                    case (12): {
                            $ChRecord->ch_type_id = 2;
                            break;
                        }
                    case (13): {
                            $ChRecord->ch_type_id = 2;
                            break;
                        }
                    case (14): {
                            $ChRecord->ch_type_id = 2;
                            break;
                        }
                    case (15): {
                            $ChRecord->ch_type_id = 2;
                            break;
                        }
                    case (16): {
                            $ChRecord->ch_type_id = 2;
                            break;
                        }
                    case (17): {
                            $ChRecord->ch_type_id = 2;
                            break;
                        }
                    case (18): {
                            // DEPORTOLOGO
                            // return response()->json([
                            //     'status' => false,
                            //     'message' => 'No hay historia cl??nica para esta atenci??n',
                            //     'data' => ['ch_record' => []],
                            // ]);
                            break;
                        }
                    case (19): {
                            $ChRecord->ch_type_id = 5;
                            break;
                        }
                    case (20): {
                            //SEGUIMIENTO
                            $ChRecord->ch_type_id = 10;
                            break;
                        }
                    default: {
                            $array = array(
                                3 => 1,
                                7 => 1,
                                8 => 2,
                                9 => 2,
                                10 => 3,
                                11 => 9,
                                12 => 8,
                                14 => 'AT',
                                134 => 4,
                                135 => 7,
                                136 => 6,
                                137 => 5,
                            );
                            if ($request->speciality_id == null || $request->speciality_id == 'null') {
                                $register = $array[$request->role_id];
                                if($register == 'AT'){
                                    $register = $this->ValidateSpeciality();
                                }
                            } else {
                                $register = $array[$request->speciality_id];
                            }
                            // var_dump(gettype($register));
                            if (gettype($register) == 'array') {
                                return response()->json([
                                    'status' => true,
                                    'message' => 'Se requiere seleccionar especializaci??n',
                                    'data' => [
                                        'ch_record' => [],
                                        'assistance_special' => $register
                                    ],
                                ]);
                            }
                            $ChRecord->ch_type_id = $register;

                            break;
                        }
                }

                if ($created == false) {
                    $validate_ch_record = ChRecord::where('user_id' , Auth::user()->id)
                        ->where('status', 'ACTIVO')
                        ->whereNotNull('ch_interconsultation_id')
                        ->where('ch_interconsultation_id', $ChRecord->ch_interconsultation_id)
                        ->where('ch_type_id', $ChRecord->ch_type_id)
                        ->where('admissions_id', $ChRecord->admissions_id)->get()->first();

                    if ($validate_ch_record) {
                        return response()->json([
                            'status' => false,
                            'message' => 'Ya se encuentra un servicio activo para este tipo de historia cl??nica',
                            'data' => ['ch_record' => []],
                        ]);
                    }
                }
                $ChRecord->save();
                $created = true;
            }

            $this->newAuthorizationInternationHospitalization($ChRecord->admissions_id);
            return response()->json([
                'status' => true,
                'message' => 'Registro paciente asociado al paciente exitosamente',
                'data' => ['ch_record' => $ChRecord->toArray()],
            ]);
        } else if($request->type_of_attention_id == -2){
            var_dump('aqui');

            $array = array(
                3 => 1,
                7 => 1,
                8 => 2,
                9 => 2,
                10 => 3,
                11 => 9,
                12 => 8,
                14 => 'AT',
                134 => 4,
                135 => 7,
                136 => 6,
                137 => 5,
            );

            if ($request->speciality_id == null && $request->speciality_id == 'null') {
                $register = $array[$request->role_id];
                if($register == 'AT'){
                    $register = $this->ValidateSpeciality();
                }
            } else {
                $register = $array[$request->speciality_id];
            }

            if (gettype($register) == 'array') {
                return response()->json([
                    'status' => true,
                    'message' => 'Se requiere seleccionar especializaci??n',
                    'data' => [
                        'ch_record' => [],
                        'assistance_special' => $register
                    ],
                ]);
            }
            $ChRecord->ch_type_id = $register;

            if ($created == false) {
                $validate_ch_record = ChRecord::where('user_id' , Auth::user()->id)
                    ->where('status', 'ACTIVO')
                    ->whereNotNull('medical_diary_days_id')
                    ->where('ch_interconsultation_id', $ChRecord->ch_interconsultation_id)
                    ->where('ch_type_id', $ChRecord->ch_type_id)
                    ->where('admissions_id', $ChRecord->admissions_id)->get()->first();

                if ($validate_ch_record) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Ya se encuentra un servicio activo para este tipo de historia cl??nica',
                        'data' => ['ch_record' => []],
                    ]);
                }
            }
            $ChRecord->save();
            $created = true;

            $this->newAuthorizationInternationHospitalization($ChRecord->admissions_id);

            return response()->json([
                'status' => true,
                'message' => 'Registro paciente asociado al paciente exitosamente',
                'data' => ['ch_record' => $ChRecord->toArray()],
            ]);
        }

        // if ($request->firm_file) {
        //     $image = $request->get('firm_file'); // your base64 encoded
        //     $image = str_replace('data:image/png;base64,', '', $image);
        //     $image = str_replace(' ', '+', $image);
        //     $random = Str::random(10);
        //     $imagePath = 'firmas/' . $random . '.png';
        //     Storage::disk('public')->put($imagePath, base64_decode($image));

        //     $ChRecord->file_firm = $imagePath;
        // } else {
        //     if (count($chrecord_val) > 0) {
        //         $ChRecord->file_firm = $chrecord_val[count($chrecord_val) - 1]['file_firm'];
        //     }
        // }

        if ($created == false) {
            if (!($request->type_of_attention_id && $request->type_of_attention_id != -1)) {
                if ($request->type_of_attention_id != -1) {
                    $validate_ch_record = ChRecord::where('user_id' , Auth::user()->id)
                        ->where('status', 'ACTIVO')
                        ->whereNotNull('ch_interconsultation_id')
                        ->where('ch_interconsultation_id', $ChRecord->ch_interconsultation_id)
                        ->where('ch_type_id', $ChRecord->ch_type_id)
                        ->where('admissions_id', $ChRecord->admissions_id)->get()->first();
    
                    if ($validate_ch_record) {
                        return response()->json([
                            'status' => false,
                            'message' => 'Ya se encuentra un servicio activo para este tipo de historia cl??nica',
                            'data' => ['ch_record' => []],
                        ]);
                    }
                }
            }

            $ChRecord->save();
        }

        $this->newAuthorizationInternationHospitalization($ChRecord->admissions_id);


        return response()->json([
            'status' => true,
            'message' => 'Registro paciente asociado al paciente exitosamente',
            'data' => ['ch_record' => $ChRecord->toArray()],
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
        $ChRecord = ChRecord::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Registro paciente obtenido exitosamente',
            'data' => ['ch_record' => $ChRecord],
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
        $ChRecord = ChRecord::find($id);
        $validate_aplication = ChRecord::select('ch_record.*')
            ->where('id', $id)
            ->with(
                'assigned_management_plan.management_plan'
            )->first();

        // var_dump($validate_aplication);

        if ($validate_aplication->assigned_management_plan_id && $validate_aplication->assigned_management_plan->management_plan->type_of_attention_id == 17) {

            $pharmacy = PharmacyProductRequest::select('pharmacy_product_request.*')
                ->leftJoin('management_plan', 'management_plan.id', 'pharmacy_product_request.management_plan_id')
                ->leftJoin('assigned_management_plan', 'assigned_management_plan.management_plan_id', 'management_plan.id')
                ->leftJoin('ch_record', 'ch_record.assigned_management_plan_id', 'assigned_management_plan.id')
                ->where('ch_record.id', $id)->first();

            $applicated = AssistanceSupplies::select('assistance_supplies.*')
                ->where('supplies_status_id', 2)
                ->where('pharmacy_product_request_id', $pharmacy->id)->get()->toArray();

            $applicatedCount = 0;

            foreach ($applicated as $item) {

                $compare = ChRecord::find($item['ch_record_id']);
                if ($validate_aplication->assigned_management_plan_id == $compare->assigned_management_plan_id) {
                    $applicatedCount++;
                    break;
                }
            }

            if ($applicatedCount == 0) {
                return response()->json([
                    'status' => false,
                    'message' => 'Debe registrar aplicaci??n de medicamento',
                ]);
            }
        }

        //validar nota de enfermeria
        if ($validate_aplication->ch_type_id == 2) {

            $records_on_assigned = ChRecord::select('ch_record.*')
                ->where('assigned_management_plan_id', $validate_aplication->assigned_management_plan_id)
                ->get()->toArray();

            $nursering_notes = 0;

            foreach ($records_on_assigned as $item) {

                $compare = ChNursingNote::select('ch_nursing_note.*')
                    ->where('ch_record_id', $item['id'])->first();
                if ($compare) {
                    $nursering_notes++;
                    break;
                }
            }

            if ($nursering_notes == 0) {
                return response()->json([
                    'status' => false,
                    'message' => 'Debe registrar nota de enfermeria',
                ]);
            }
        }

        $admissions_id = $ChRecord->admissions_id;

        $ChRecord->status = $request->status;



        if ($request->firm_file) {
            if ($request->firm_file != "null" && $request->firm_file != "undefined") {
                $image = $request->get('firm_file'); // your base64 encoded
                $image = str_replace('data:image/png;base64,', '', $image);
                $image = str_replace(' ', '+', $image);
                $random = Str::random(10);
                $imagePath = 'firmas/' . $random . '.png';
                Storage::disk('public')->put($imagePath, base64_decode($image));

                $ChRecord->firm_file = $imagePath;
            } else {
                if ($ChRecord->assigned_management_plan_id) {
                    $firm_ch_record = ChRecord::select('ch_record.*')
                        ->whereNotNull('firm_file')
                        ->where('admissions_id', $admissions_id)
                        ->where('assigned_management_plan_id', $ChRecord->assigned_management_plan_id)
                        ->orderBy('created_at', 'ASC')->get()->toArray();
                    if (count($firm_ch_record) > 0) {
                        $ChRecord->firm_file = $firm_ch_record[0]['firm_file'];
                    }
                }
            }
        } else {
            if ($ChRecord->assigned_management_plan_id) {
                $firm_ch_record = ChRecord::select('ch_record.*')
                    ->whereNotNull('firm_file')
                    ->where('admissions_id', $admissions_id)
                    ->where('assigned_management_plan_id', $ChRecord->assigned_management_plan_id)
                    ->orderBy('created_at', 'ASC')->get()->toArray();
                if (count($firm_ch_record) > 0) {
                    if ($ChRecord->ch_type_id != 10) {
                        $ChRecord->firm_file = $firm_ch_record[0]['firm_file'];
                    }
                }
            }
        }

        // if ($request->file('firm_file')) {
        //     $path = Storage::disk('public')->put('patient_firm', $request->file('firm_file'));
        //     $ChRecord->firm_file = $path;
        // }
        
        $MinimumSalary = MinimumSalary::where('year', Carbon::now()->year)->get()->toArray();
        if (count($MinimumSalary) == 0) {
            return response()->json([
                'status' => false,
                'message' => 'No existe salario m??nimo confirgurado para el a??o en curso',
                'data' => ['ch_record' => []],
            ]);
        }
        
        if ($ChRecord->assigned_management_plan_id) {

        
            $mes = Carbon::now()->month;
            
            $validate = AccountReceivable::whereMonth('created_at', $mes)->where('user_id', $request->user_id)->whereBetween('status_bill_id', [1, 2])->get()->toArray();
            $user_id = AssignedManagementPlan::latest('id')->find($ChRecord->assigned_management_plan_id)->first()->user_id;
            $AssignedManagementPlan = AssignedManagementPlan::find($ChRecord->assigned_management_plan_id);
            $ManagementPlan = ManagementPlan::find($AssignedManagementPlan->management_plan_id);
            $admissions = Admissions::find($admissions_id);
            $Location = Location::where('admissions_id', $admissions->id)->where('location.discharge_date', '=', '0000-00-00 00:00:00')->first();
            $user_id = $admissions->patient_id;
            $locality = Patient::find($admissions->patient_id)->locality_id;
            $patient = Patient::find($admissions->patient_id)->neighborhood_or_residence_id;
            $tariff = NeighborhoodOrResidence::find($patient)->pad_risk_id;
            $Assistance = Assistance::where('user_id', $request->user_id)->get()->toArray();

            $valuetariff = $this->getNotFailedTariff($tariff, $ManagementPlan, $Location, $request, $admissions_id, $AssignedManagementPlan);
            if ($Assistance[0]['contract_type_id'] != 1 && $Assistance[0]['contract_type_id'] != 2 && $Assistance[0]['contract_type_id'] != 3) {
                if (count($valuetariff) == 0 && $Location->scope_of_attention_id != 1) {
                    $extra_dose = 0;
                    $has_car = 0;
                    $Assistance = Assistance::select('assistance.*')
                        ->where('assistance.user_id', $AssignedManagementPlan->user_id)
                        ->groupBy('assistance.id')->get()->toArray();
                    if (count($Assistance) > 0) {
                        if ($Assistance[0]['has_car']) {
                            $has_car = $Assistance[0]['has_car'];
                        }
                    }
                    if ($ManagementPlan->type_of_attention_id == 17) {
                        $assigned_validation = AssignedManagementPlan::select('assigned_management_plan.*')
                            ->where('assigned_management_plan.redo', 0)
                            ->where('assigned_management_plan.execution_date', '!=', '0000-00-00 00:00:00')
                            ->where('assigned_management_plan.user_id', $AssignedManagementPlan->user_id)
                            ->where('management_plan.admissions_id', $admissions_id)
                            ->where('management_plan.type_of_attention_id', 17)
                            ->leftJoin('management_plan', 'management_plan.id', 'assigned_management_plan.management_plan_id')
                            ->groupBy('assigned_management_plan.id')
                            ->get()->toArray();
                        $validate = array();

                        if (count($assigned_validation) > 0) {
                            foreach ($assigned_validation as $element) {
                                $offset = 3;
                                $application_hour = Carbon::createFromFormat('Y-m-d H:i:s', $element['execution_date']);
                                $inidiat_time = Carbon::now()->subHours($offset);
                                $final_time = Carbon::now()->addHours($offset);
                                if ($application_hour->gt($inidiat_time) && $application_hour->lt($final_time)) {
                                    array_push($validate, $element);
                                }
                            }
                        }
                        if (count($validate) > 0) {
                            $extra_dose = 1;
                        }
                    
                    }
                    $p = Program::find($Location->program_id)->name;
                    $t = TypeOfAttention::find($ManagementPlan->type_of_attention_id)->name;
                    $ph = $ManagementPlan->phone_consult == 0 ? "NO" : "SI";
                    $z = PadRisk::find($tariff)->name;
                    $h = $ManagementPlan->hours ? $ManagementPlan->hours : "N.A" ;
                    $f = $request->is_failed === true || $request->is_failed === "true" ? "SI" : "NO";
                    $x = $extra_dose == 0 ? "NO" : "SI";
                    $c = $has_car == 0 ? "NO" : "SI";
                    return response()->json([
                        'status' => false,
                        'message' => 'No existe tarifa para este servicio, por favor comun??quese con talento humano con la siguiente informaci??n:
TIPO DE ATENCI??N: ' . $t . ', 
PROGRAMA: ' . $p . ', 
ZONA: ' . $z . ', 
FALLIDA: ' . $f . ', 
CON CARRO: ' . $c . ', 
EXTRADOSIS: ' . $x . ', 
HORAS: ' . $h . ', 
TELECONSULTA: ' . $ph . '
',
                        'data' => ['ch_record' => []],
                    ]);
                }
            }

            $ChRecord->date_finish = Carbon::now();
            $ChRecord->save();
        


            if ($AssignedManagementPlan->execution_date == '0000-00-00 00:00:00') {

                $assigned = AssignedManagementPlan::find($ChRecord->assigned_management_plan_id);
                $assigned->execution_date = Carbon::now();
                $assigned->save();

                $assistance = Assistance::where('user_id', $request->user_id)->first();
                if ($assistance) {
                    $LocationCapacity = LocationCapacity::where('locality_id', $locality)
                        ->where('assistance_id', $assistance->id)
                        ->where('validation_date', '>=', Carbon::now()->startOfMonth())
                        ->where('validation_date', '<=', Carbon::now()->endOfMonth())
                        ->first();
                    if ($LocationCapacity) {
                        $LocationCapacity->PAD_patient_attended = $LocationCapacity->PAD_patient_attended + 1;
                        $LocationCapacity->save();
                    }
                }

                $TypeContract = TypeContract::select('type_contract.*')
                    ->leftJoin('contract', 'contract.type_contract_id', 'type_contract.id')
                    ->leftJoin('admissions', 'admissions.contract_id', 'contract.id')
                    ->where('admissions.id', $admissions_id)
                    ->first();

                if ($TypeContract->id == 5) {
                    $ServicesBriefcase = ServicesBriefcase::find($ManagementPlan->procedure_id);
                    $BillingPad = BillingPad::where('admissions_id', $admissions_id)
                        ->whereBetween('validation_date', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
                        ->first();
                    $Authorization = Authorization::where('admissions_id', $admissions_id)
                        ->where('assigned_management_plan_id', $AssignedManagementPlan->id)
                        ->first();

                    $AuthBillingPad = new AuthBillingPad;
                    $AuthBillingPad->billing_pad_id = $BillingPad->id;
                    $AuthBillingPad->authorization_id = $Authorization->id;
                    $AuthBillingPad->value = $ServicesBriefcase->value;
                    $AuthBillingPad->save();
                }

                $this->newBillUserActivity($validate, $id, $request, $ManagementPlan, $ChRecord, $admissions_id, $valuetariff, $MinimumSalary);
            } else {
                $billActivity = BillUserActivity::where('assigned_management_plan_id', $ChRecord->assigned_management_plan_id)->get()->first();
                if ($billActivity) {
                    if ($billActivity->status == 'RECHAZADO') {
                        $assigned_redo = AssignedManagementPlan::find($ChRecord->assigned_management_plan_id);
                        $assigned_redo->redo = '00000000000000';
                        $assigned_redo->save();
                        $billActivity->status = 'REENVIADO';
                        $billActivity->ch_record_id = $ChRecord->id;
                        $billActivity->save();
                    } else {
                        if ($ManagementPlan->type_of_attention_id == 12 || $ManagementPlan->type_of_attention_id == 13) {
                            if ($Assistance[0]['contract_type_id'] != 1 && $Assistance[0]['contract_type_id'] != 2 && $Assistance[0]['contract_type_id'] != 3) {
                                $this->newBillUserActivity($validate, $id, $request, $ManagementPlan, $ChRecord, $admissions_id, $valuetariff, $MinimumSalary);
                            }
                        }
                    }
                } else {
                    if ($ManagementPlan->type_of_attention_id == 12 || $ManagementPlan->type_of_attention_id == 13) {
                        $this->newBillUserActivity($validate, $id, $request, $ManagementPlan, $ChRecord, $admissions_id, $valuetariff, $MinimumSalary);
                    }
                }
            }
        } else {
            $ChRecord->date_finish = Carbon::now();
            $ChRecord->save();
        }

        $ChRecord_val = ChRecord::where('ch_record.id', $ChRecord->id)
            ->select(
                'ch_record.*',
                'location.admission_route_id AS admission_route_id'
            )
            ->with('ch_interconsultation')
            ->leftJoin('admissions', 'admissions.id', 'ch_record.admissions_id')
            ->leftJoin('location', 'location.admissions_id', 'admissions.id')
            ->get()->toArray();

        if ($ChRecord_val[0]['ch_interconsultation'] != null && $ChRecord_val[0]['ch_interconsultation']['type_of_attention_id'] != null) {
            $ch_interconsultation_val = ChInterconsultation::find($ChRecord_val[0]['ch_interconsultation_id']);

            if ($ChRecord_val[0]['admission_route_id'] == 1) {
                $Authorization = new Authorization;
                $Authorization->services_briefcase_id = $ch_interconsultation_val->services_briefcase_id;
                $Authorization->ch_interconsultation_id = $ChRecord_val[0]['ch_interconsultation_id'];
                $Authorization->admissions_id = $ChRecord_val[0]['admissions_id'];
                $Authorization->auth_status_id = 1;
                $Authorization->save();
            }
        }

        if($ChRecord->medical_diary_days_id){
            $ambulatory_admission = Admissions::find($ChRecord->admissions_id);

            $ambulatory_admission->discharge_date = Carbon::now();
            $ambulatory_admission->medical_date = Carbon::now();
            
            $ambulatory_admission->save();
        }

        $this->newAuthorizationInternationHospitalization($ChRecord->admissions_id);

        // $validate_ambulatory = MedicalDiaryDays::find('medical_diary_days.*')->where('admissions_id',)

        // $hola = $this->interoperavility($id);

        return response()->json([
            'status' => true,
            'message' => 'Registro paciente actualizado exitosamente',
            'data' => ['ch_record' => $ChRecord],
        ]);
    }

    public function newAuthorizationInternationHospitalization(int $admissions_id) {
        $start_of_actual_day = Carbon::now()->startOfDay();
        $finish_of_last_day = Carbon::now()->subDay()->endOfDay();
        $start_of_last_day = Carbon::now()->subDay()->startOfDay();

        $location = Location::select('location.*')
            ->where('admissions_id', $admissions_id)
            ->where('discharge_date', '0000-00-00 00:00:00')
            ->get()->toArray();

        if ($location[count($location) - 1]['scope_of_attention_id'] == 1) {
            $compare_date = $location[count($location) - 1]['entry_date'];
    
            $LastAuth = Authorization::select('authorization.*')
                ->where('admissions_id', $admissions_id)
                // ->where('open_date', '<', $start_of_actual_day)
                ->where(function($query) use ($start_of_last_day, $compare_date, $start_of_actual_day) {
                    $query
                        // ->where('open_date', $start_of_last_day)
                        ->where('open_date', '<', $start_of_actual_day)
                        ->orWhere('open_date', $compare_date);
                })
                ->whereNull('close_date')
                ->whereNotNull('location_id')
                ->get()->toArray();
    
            if (count($LastAuth) > 0) {
                $lA = Authorization::find($LastAuth[0]['id']);
                $lA->close_date = $finish_of_last_day;
                $lA->save();
    
                $new_auth_day = new Authorization;
                $new_auth_day->services_briefcase_id = $LastAuth[0]['services_briefcase_id'];
                $new_auth_day->assigned_management_plan_id = $LastAuth[0]['assigned_management_plan_id'];
                $new_auth_day->admissions_id = $LastAuth[0]['admissions_id'];
                $new_auth_day->auth_number = $LastAuth[0]['auth_number'];
                $new_auth_day->authorized_amount = $LastAuth[0]['authorized_amount'];
                $new_auth_day->observation = $LastAuth[0]['observation'];
                $new_auth_day->copay = $LastAuth[0]['copay'];
                $new_auth_day->quantity = $LastAuth[0]['quantity'];
                $new_auth_day->copay_value = $LastAuth[0]['copay_value'];
                $new_auth_day->auth_status_id = $LastAuth[0]['auth_status_id'];
                $new_auth_day->auth_package_id = $LastAuth[0]['auth_package_id'];
                $new_auth_day->fixed_add_id = $LastAuth[0]['fixed_add_id'];
                $new_auth_day->manual_price_id = $LastAuth[0]['manual_price_id'];
                $new_auth_day->application_id = $LastAuth[0]['application_id'];
                $new_auth_day->procedure_id = $LastAuth[0]['procedure_id'];
                $new_auth_day->supplies_com_id = $LastAuth[0]['supplies_com_id'];
                $new_auth_day->product_com_id = $LastAuth[0]['product_com_id'];
                $new_auth_day->location_id = $LastAuth[0]['location_id'];
                $new_auth_day->ch_interconsultation_id = $LastAuth[0]['ch_interconsultation_id'];
                $new_auth_day->file_auth = $LastAuth[0]['file_auth'];
                $new_auth_day->open_date = $start_of_actual_day;
                $new_auth_day->save();
            }
        }

    }

    public function newBillUserActivity($validate, $id, $request, $ManagementPlan, $ChRecord, $admissions_id, $valuetariff, $MinimumSalary)
    {
        $Assistance = Assistance::where('user_id', $request->user_id)->get()->toArray();
        if ($ManagementPlan->type_of_attention_id != 20) {
            if (!$validate) {
                //    = AssignedManagementPlan::find($ChRecord[0]['assigned_management_plan_id'])->get();
                $AccountReceivable = new AccountReceivable;
                $AccountReceivable->user_id = $request->user_id;
                $AccountReceivable->status_bill_id = 1;
                $AccountReceivable->minimum_salary_id = $MinimumSalary[0]['id'];
                $AccountReceivable->save();
                $billActivity = new BillUserActivity;
                $billActivity->procedure_id = $ManagementPlan->procedure_id;
                $billActivity->account_receivable_id = $AccountReceivable->id;
                $billActivity->assigned_management_plan_id = $ChRecord->assigned_management_plan_id;
                $billActivity->admissions_id = $admissions_id;
                $billActivity->tariff_id = ($Assistance[0]['contract_type_id'] != 1 && $Assistance[0]['contract_type_id'] != 2 && $Assistance[0]['contract_type_id'] != 3) ? ($valuetariff ? $valuetariff[0]['id'] : 583) : 583;
                $billActivity->ch_record_id = $id;
                $billActivity->save();
            } else {
                $AccountReceivable = AccountReceivable::find($validate[0]['id']);
                $billActivity = new BillUserActivity;
                $billActivity->procedure_id = $ManagementPlan->procedure_id;
                $billActivity->account_receivable_id = $validate[0]['id'];
                $billActivity->assigned_management_plan_id = $ChRecord->assigned_management_plan_id;
                $billActivity->admissions_id = $admissions_id;
                $billActivity->tariff_id = ($Assistance[0]['contract_type_id'] != 1 && $Assistance[0]['contract_type_id'] != 2 && $Assistance[0]['contract_type_id'] != 3) ? ($valuetariff ? $valuetariff[0]['id'] : 583) : 583;
                $billActivity->ch_record_id = $id;
                $billActivity->save();
            };
        }
    }

    public function getNotFailedTariff($tariff, $ManagementPlan, $Location, $request, $admissions_id, $AssignedManagementPlan)
    {
        $extra_dose = 0;
        $has_car = 0;
        $Assistance = Assistance::select('assistance.*')
            ->where('assistance.user_id', $AssignedManagementPlan->user_id)
            ->groupBy('assistance.id')->get()->toArray();
        if (count($Assistance) > 0) {
            if ($Assistance[0]['has_car']) {
                $has_car = $Assistance[0]['has_car'];
            }
        }
        if ($ManagementPlan->type_of_attention_id == 17) {
            $assigned_validation = AssignedManagementPlan::select('assigned_management_plan.*')
                ->where('assigned_management_plan.redo', 0)
                ->where('assigned_management_plan.execution_date', '!=', '0000-00-00 00:00:00')
                ->where('assigned_management_plan.user_id', $AssignedManagementPlan->user_id)
                ->where('management_plan.admissions_id', $admissions_id)
                ->where('management_plan.type_of_attention_id', 17)
                ->leftJoin('management_plan', 'management_plan.id', 'assigned_management_plan.management_plan_id')
                ->groupBy('assigned_management_plan.id')
                ->get()->toArray();
            $validate = array();

            if (count($assigned_validation) > 0) {
                foreach ($assigned_validation as $element) {
                    $offset = 3;
                    $application_hour = Carbon::createFromFormat('Y-m-d H:i:s', $element['execution_date']);
                    $inidiat_time = Carbon::now()->subHours($offset);
                    $final_time = Carbon::now()->addHours($offset);
                    if ($application_hour->gt($inidiat_time) && $application_hour->lt($final_time)) {
                        array_push($validate, $element);
                    }
                }
            }
            if (count($validate) > 0) {
                $extra_dose = 1;
            }
        }
        if ($request->is_failed) {
            if ($request->is_failed === true || $request->is_failed === "true") {
                $valuetariff = Tariff::where('failed', 1)
                    ->where('type_of_attention_id', $ManagementPlan->type_of_attention_id)
                    ->where('pad_risk_id', $tariff)
                    ->where('status_id', 1)->get()->toArray();
            } else {
                $valuetariff = Tariff::where('admissions_id', $admissions_id)
                    ->where('type_of_attention_id', $ManagementPlan->type_of_attention_id)
                    ->where('phone_consult', $ManagementPlan->phone_consult)
                    ->whereNotNull('failed')->where('failed', 0)
                    ->where('status_id', 1);
                $valuetariff = $valuetariff->get()->toArray();
                if (count($valuetariff) == 0) {
                    if ($ManagementPlan->phone_consult == 1) {
                        $valuetariff = Tariff::whereNull('pad_risk_id')
                            ->where('phone_consult', $ManagementPlan->phone_consult)
                            ->where('type_of_attention_id', $ManagementPlan->type_of_attention_id)
                            ->where('status_id', 1)
                            ->whereNotNull('failed')->where('failed', 0);
                    } else {
                        $valuetariff = Tariff::where('pad_risk_id', $tariff)
                            ->where('phone_consult', $ManagementPlan->phone_consult)
                            ->where('type_of_attention_id', $ManagementPlan->type_of_attention_id)
                            ->where('status_id', 1)
                            ->whereNotNull('failed')->where('failed', 0);
                    }
                    // definir cuando la atenci??n es fallida
                    if ($request->is_failed) {
                        if ($request->is_failed === true || $request->is_failed === "true") {
                            $valuetariff->whereNotNull('failed')->where('failed', 1);
                        } else {
                            $valuetariff->whereNotNull('failed')->where('failed', 0);
                        }
                    } else {
                        $valuetariff->whereNotNull('failed')->where('failed', 0);
                    }
                    if ($ManagementPlan->type_of_attention_id == 12 || $ManagementPlan->type_of_attention_id == 13) {
                        if ($ManagementPlan->hours && $ManagementPlan->hours != 0) {
                            $valuetariff->where('quantity', $ManagementPlan->hours);
                        }
                    } else {
                        $valuetariff->whereNull('quantity');
                    }
                    $valuetariff->where('extra_dose', $extra_dose);
                    $valuetariff->where('program_id', $Location->program_id);
                    $valuetariff->where('has_car', $has_car);
                    $valuetariff = $valuetariff->get()->toArray();
                }
            }
        } else {
            $valuetariff = Tariff::where('admissions_id', $admissions_id)
                ->where('type_of_attention_id', $ManagementPlan->type_of_attention_id)
                ->where('phone_consult', $ManagementPlan->phone_consult)
                ->whereNotNull('failed')->where('failed', 0)
                ->where('status_id', 1);
            $valuetariff = $valuetariff->get()->toArray();
            if (count($valuetariff) == 0) {
                if ($ManagementPlan->phone_consult == 1) {
                    $valuetariff = Tariff::whereNull('pad_risk_id')
                        ->where('phone_consult', $ManagementPlan->phone_consult)
                        ->where('type_of_attention_id', $ManagementPlan->type_of_attention_id)
                        ->where('status_id', 1)
                        ->whereNotNull('failed')->where('failed', 0);
                } else {
                    $valuetariff = Tariff::where('pad_risk_id', $tariff)
                        ->where('phone_consult', $ManagementPlan->phone_consult)
                        ->where('type_of_attention_id', $ManagementPlan->type_of_attention_id)
                        ->where('status_id', 1)
                        ->whereNotNull('failed')->where('failed', 0);
                }
                // definir cuando la atenci??n es fallida
                if ($request->is_failed) {
                    if ($request->is_failed === true || $request->is_failed === "true") {
                        $valuetariff->whereNotNull('failed')->where('failed', 1);
                    } else {
                        $valuetariff->whereNotNull('failed')->where('failed', 0);
                    }
                } else {
                    $valuetariff->whereNotNull('failed')->where('failed', 0);
                }
                if ($ManagementPlan->type_of_attention_id == 12 || $ManagementPlan->type_of_attention_id == 13) {
                    if ($ManagementPlan->hours && $ManagementPlan->hours != 0) {
                        $valuetariff->where('quantity', $ManagementPlan->hours);
                    }
                } else {
                    $valuetariff->whereNull('quantity');
                }
                $valuetariff->where('extra_dose', $extra_dose);
                $valuetariff->where('program_id', $Location->program_id);
                $valuetariff->where('has_car', $has_car);
                $valuetariff = $valuetariff->get()->toArray();
            }
        }

        return $valuetariff;
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
            $ChRecord = ChRecord::find($id);
            $ChRecord->delete();

            return response()->json([
                'status' => true,
                'message' => 'Registro paciente eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Registro paciente en uso, no es posible eliminarlo',
            ], 423);
        }
    }

    private function injectPageCount(PDF $dompdf): void
    {
        /** @var CPDF $canvas */
        $canvas = $dompdf->getCanvas();
        $pdf = $canvas->get_cpdf();

        foreach ($pdf->objects as &$o) {
            if ($o['t'] === 'contents') {
                $o['c'] = str_replace('DOMPDF_PAGE_COUNT_PLACEHOLDER', $canvas->get_page_count(), $o['c']);
            }
        }
    }

    public function interoperavility(int $chrecordid)
    {

        $info = ChRecord::select(

            //'scope_of_attention.name AS type_attention',

            //datos paciente
            'ITP.code AS patient_identification_type',
            'patients.identification AS patient_identification',
            'patients.firstname AS patient_firstname',                                 // 
            'patients.middlefirstname AS patient_middlefirstname',
            'patients.lastname AS patient_lastname',
            'patients.middlelastname AS patient_middlelastname',
            'GP.code AS patient_gender',
            'patients.birthday AS patient_birthday',

            // datos contrato
            'company.name AS company',
            'type_briefcase.code AS type_briefcase',     //plan

            //datos suursal y personal asistencial
            'company.id AS id_company',
            'users.firstname AS firstname_medical',                                 // 
            'users.middlefirstname AS middlefirstname_medical',
            'users.lastname AS lastname_medical',
            'users.middlelastname AS middlelastname_medical',
            //'role.name AS role_medical',
            //'specialty.name AS speciality_medical',
            'specialty.id AS speciality_medical',
            'assistance.medical_record AS number_professional_medical',




            //'company.name AS name_company',
            'company.identification AS identification_company',

            //datos medico
            'users.identification AS identification_medical',
            'IT.code AS identification_type_madical',
            'users.birthday AS birthday_medical',
            'GN.code AS gender_medical',
            'IT.code AS assistential_id_code',
            'diagnosis.code AS diagnosis',

            //datos de contacto
            'patients.email AS email_patient',
            'patients.residence_address AS address_patient',
            'patients.phone AS phone_patient',
            'patients.landline AS landline_patient',
            'municipality.id AS code_municipality_patient',
            'municipality.name AS municipality_patient',



        )
            ->where('ch_record.id', $chrecordid)
            //datos relacionales paciente
            ->leftJoin('admissions', 'admissions.id', 'ch_record.admissions_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('identification_type AS ITP', 'ITP.id', 'patients.identification_type_id')
            ->leftJoin('gender AS GP', 'GP.id', 'patients.gender_id')

            //datos relacionales usuario
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')
            ->leftJoin('type_briefcase', 'type_briefcase.id', 'admissions.regime_id')
            ->leftJoin('users', 'users.id', 'ch_record.user_id')
            ->leftJoin('identification_type AS IT', 'IT.id', 'users.identification_type_id')
            ->leftJoin('gender AS GN', 'GN.id', 'users.gender_id')
            ->leftJoin('user_role', 'user_role.user_id', 'users.id')
            ->leftJoin('role', 'role.id', 'user_role.role_id')
            ->leftJoin('assistance', 'assistance.user_id', 'users.id')
            ->leftJoin('assistance_special', 'assistance_special.assistance_id', 'assistance.id')
            ->leftJoin('specialty', 'specialty.id', 'assistance_special.specialty_id')

            //datos relacionales cita medica0
            ->leftJoin('diagnosis', 'diagnosis.id', 'admissions.diagnosis_id')

            //datos relacionales de contacto
            ->leftJoin('municipality', 'municipality.id', 'patients.residence_municipality_id')

            ->where('role.role_type_id', 2)
            ->groupBy('ch_record.id')
            ->get()->toarray();

        $info[0]['patient_gender'] = $this->getGender($info[0]['patient_gender']);
        $info[0]['gender_medical'] = $this->getGender($info[0]['gender_medical']);
        $info[0]['company'] = $this->getCompany($info[0]['company']);

        return $info;
    }

    public function getGender(string $e)
    {
        if ($e == "M" || $e == "F") {
            return $e;
        } else {
            return "I";
        }
    }

    public function getCompany(string $e)
    {
        if ($e == "1") {
            return "30";
        } else {
            return "31";
        }
    }
}
