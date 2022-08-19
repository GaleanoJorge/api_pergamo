<?php

namespace App\Http\Controllers\Management;

use App\Models\ChRecord;
use Dompdf\Dompdf as PDF;
use Dompdf\Options;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\AssignedManagementPlan;
use App\Models\Assistance;
use App\Models\LocationCapacity;
use App\Models\AccountReceivable;
use App\Models\Admissions;
use App\Models\AuthBillingPad;
use App\Models\Authorization;
use App\Models\Base\ServicesBriefcase;
use App\Models\BillingPad;
use App\Models\Patient;
use App\Models\Location;
use App\Models\ChReasonConsultation;
use App\Models\ChEValorationOT;
use App\Models\ChRNValorationOT;
use App\Models\ChOstomies;
use App\Models\ChAp;
use App\Models\ChRecommendationsEvo;
use App\Models\ChDietsEvo;
use App\Models\ChVitalSigns;

use App\Models\ChScaleNorton;
use App\Models\ChScaleFac;
use App\Models\ChScaleGlasgow;
use App\Models\ChScaleBarthel;
use App\Models\ChScaleRedCross;
use App\Models\ChScaleBraden;
use App\Models\ChScaleKarnofsky;
use App\Models\ChScaleEcog;
use App\Models\ChScalePediatricNutrition;
use App\Models\ChScaleScreening;
use App\Models\ChScalePayette;
use App\Models\ChScaleFragility;
use App\Models\ChScaleNews;
use App\Models\ChScaleZarit;

use App\Models\ChFormulation;
use App\Models\ChMedicalOrders;
use App\Models\ChInterconsultation;
use App\Models\ManagementPlan;
use App\Models\ChInability;
use App\Models\ChMedicalCertificate;
use App\Models\ChFailed;
use App\Models\ChPatientExit;

use App\Models\ChPhysicalExam;

use App\Models\ChRespiratoryTherapy;
use App\Models\ChOxygenTherapy;
use App\Models\ChAssSigns;
use App\Models\ChTherapeuticAss;
use App\Models\ChScalePain;
use App\Models\ChScaleWongBaker;
use App\Models\ChRtInspection;
use App\Models\ChAuscultation;
use App\Models\ChDiagnosticAids;
use App\Models\ChObjectivesTherapy;
use App\Models\ChRtSessions;

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
use App\Models\ChSwSupportNetwork;



use App\Models\ChPosition;
use App\Models\ChHairValoration;
use App\Models\ChNursingProcedure;
use App\Models\ChCarePlan;
use App\Models\ChLiquidControl;
use App\Models\ChSkinValoration;
use App\Models\ChScaleJhDownton;


use App\Models\ChEOccHistoryOT;
use App\Models\ChEPastOT;
use App\Models\ChEDailyActivitiesOT;
use App\Models\ChEMSFunPatOT;
use App\Models\ChEMSIntPatOT;
use App\Models\ChEMSMovPatOT;
use App\Models\ChEMSThermalOT;
use App\Models\ChEMSDisAuditoryOT;
use App\Models\ChEMSDisTactileOT;
use App\Models\ChEMSAcuityOT;
use App\Models\ChEMSComponentOT;
use App\Models\ChEMSTestOT;
use App\Models\ChEMSCommunicationOT;
use App\Models\ChEMSAssessmentOT;
use App\Models\ChEMSWeeklyOT;
use App\Models\ChRNMaterialsOT;

use App\Models\ChSystemExam;
use App\Models\Tariff;
use App\Models\BillUserActivity;
use App\Models\ChDiagnosis;
use App\Models\ChBackground;
use App\Models\ChEvoSoap;
use App\Models\MinimumSalary;
use Illuminate\Support\Facades\Storage;
use App\Models\RoleAttention;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



use App\Models\NeighborhoodOrResidence;
use App\Models\TypeContract;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Writer\Pdf as WriterPdf;

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
            'admissions.patients',
        );

        if ($request->_sort) {
            $ChRecord->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChRecord->where('status', 'like', '%' . $request->search . '%');
        }

        if ($request->record_id) {
            $ChRecord->where('id', $request->record_id);
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
            'data' => ['ch_record' => $ChRecord]
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
        )
            ->where('admissions_id', $id)
            ->where('assigned_management_plan_id', $id2);

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
            'data' => ['ch_record' => $ChRecord]
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ViewHC(int $id)
    {

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
            'admissions.contract.type_briefcase'
        )
            ->where('id', $id)->get()->toArray();
        $imagenComoBase64 = null;

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
            $ChDiets = ChDietsEvo::with('enterally_diet', 'diet_consistency')->where('type_record_id', 1)->where('ch_record_id', $id)->get()->toArray();

            //Antecedentes
            $ChBackground = ChBackground::with('ch_type_background')->where('ch_record_id', $id)->where('type_record_id', 2)->get()->toArray();

            //Evolución
            $ChEvoSoap = ChEvoSoap::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChPhysicalExamEvo = ChPhysicalExam::with('type_ch_physical_exam')->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
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
            $ChDietsEvo = ChDietsEvo::with('enterally_diet', 'diet_consistency')->where('type_record_id', 3)->where('ch_record_id', $id)->get()->toArray();


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
            
            //Formulación   
            $ChFormulation = ChFormulation::with(
                'product_generic',
                'product_generic.measurement_units',
                'product_generic.multidose_concentration',
                'administration_route',
                'hourly_frequency'
            )
                ->where('ch_record_id', $id)->where('type_record_id', 5)->get()->toArray();

            //Ordenes Médicas
                $ChMedicalOrders = ChMedicalOrders::with(
                'procedure',
                'frequency'
            )
                ->where('ch_record_id', $id)->where('type_record_id', 6)->get()->toArray();
            //Interconsulta
                $ChInterconsultation = ChInterconsultation::with(
                'specialty',
                'frequency'
            )
                ->where('ch_record_id', $id)->where('type_record_id', 6)->get()->toArray();
            //Plan de manejo
                $ManagementPlan = ManagementPlan::with(
                'type_of_attention',
                'frequency',
                'service_briefcase',
                'service_briefcase.manual_price',
                )->get()->toArray();
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
                $ChFailed = ChFailed::
                with(
                    'ch_reason'
                )
                ->where('ch_record_id', $id)->where('type_record_id', 9)->get()->toArray();
            //Salida
                $ChPatientExit = ChPatientExit::
                with(
                    'death_diagnosis',
                    'ch_diagnosis',
                    'exit_diagnosis',
                    'relations_diagnosis',
                    'reason_exit'
                )
                ->where('ch_record_id', $id)->where('type_record_id', 10)->get()->toArray();

            // $img=asset('storage/'.$ChRecord[0]['user']['assistance'][0]['file_firm']);
            // $imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($img));
            if (count($ChRecord[0]['user']['assistance']) > 0) {
                $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
                $contenidoBinario = file_get_contents($rutaImagen);
                $imagenComoBase64 = base64_encode($contenidoBinario);
            }

            $today = Carbon::now();

            $Patients = $ChRecord[0]['admissions']['patients'];

            // $patient=$ChRecord['admissions'];

            $html = view('mails.hc', [
                'chrecord' => $ChRecord[0],

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

                'ChEvoSoap' => $ChEvoSoap,
                'ChPhysicalExamEvo' => $ChPhysicalExamEvo,
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

            // enfermeria
            //////////////////////////////////////////////////////////
        } else if ($ChRecord[0]['ch_type_id'] == 2) {


            $ChPosition = ChPosition::with('patient_position')->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChHairValoration = ChHairValoration::where('ch_record_id', $id)->get()->toArray();
            $ChOstomies = ChOstomies::with('ostomy')->where('ch_record_id', $id)->get()->toArray();
            $ChPhysicalExam = ChPhysicalExam::with('type_ch_physical_exam')->where('ch_record_id', $id)->get()->toArray();
            $ChVitalSigns = ChVitalSigns::with(
                'ch_vital_hydration',
                'ch_vital_ventilated',
                'ch_vital_temperature',
                'ch_vital_neurological',
                'oxygen_type',
                'liters_per_minute',
                'parameters_signs'
            )->where('ch_record_id', $id)->get()->toArray();
            $ChPositionNE = ChPosition::with('patient_position')->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChHairValorationNE = ChHairValoration::where('ch_record_id', $id)->get()->toArray();
            $ChOstomiesNE = ChOstomies::with('ostomy')->where('ch_record_id', $id)->get()->toArray();
            $ChPhysicalExamNE = ChPhysicalExam::with('type_ch_physical_exam')->where('ch_record_id', $id)->get()->toArray();
            $ChVitalSignsNE = ChVitalSigns::with(
                'ch_vital_hydration',
                'ch_vital_ventilated',
                'ch_vital_temperature',
                'ch_vital_neurological',
                'oxygen_type',
                'liters_per_minute',
                'parameters_signs'
            )->where('ch_record_id', $id)->get()->toArray();
            $ChNursingProcedure = ChNursingProcedure::with('nursing_procedure')->where('ch_record_id', $id)->get()->toArray();
            $ChCarePlan = ChCarePlan::with('nursing_care_plan')->where('ch_record_id', $id)->get()->toArray();
            $ChLiquidControl = ChLiquidControl::with('ch_route_fluid', 'ch_type_fluid')->where('ch_record_id', $id)->get()->toArray();
            $ChSkinValoration = ChSkinValoration::with('body_region', 'skin_status', 'diagnosis')->where('ch_record_id', $id)->get()->toArray();
            $ChScaleNorton = ChScaleNorton::where('ch_record_id', $id)->get()->toArray();
            $ChScaleGlasgow = ChScaleGlasgow::where('ch_record_id', $id)->get()->toArray();
            $ChScaleJhDownton = ChScaleJhDownton::where('ch_record_id', $id)->get()->toArray();
            $ChScaleBraden = ChScaleBraden::where('ch_record_id', $id)->get()->toArray();



            if (count($ChRecord[0]['user']['assistance']) > 0) {
                $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
                $contenidoBinario = file_get_contents($rutaImagen);
                $imagenComoBase64 = base64_encode($contenidoBinario);
            }
            $today = Carbon::now();



            $Patients = $ChRecord[0]['admissions']['patients'];

            // $patient=$ChRecord['admissions'];
            $html = view('mails.hc', [
                'chrecord' => $ChRecord,
                'ChPosition' => $ChPosition,
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

            ///Terapia Ocupacional
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
            
            //Regular
            $ChRNValorationOT = ChRNValorationOT::with('ch_diagnosis')->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
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

            if (count($ChRecord[0]['user']['assistance']) > 0) {
                $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
                $contenidoBinario = file_get_contents($rutaImagen);
                $imagenComoBase64 = base64_encode($contenidoBinario);
            }
            $today = Carbon::now();



            $Patients = $ChRecord[0]['admissions']['patients'];

            // $patient=$ChRecord['admissions'];
            $html = view('mails.hc', [
                'chrecord' => $ChRecord[0],
                
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
                'ChRNValorationOT' => $ChRNValorationOT,
                'ChVitalSignsNT' => $ChVitalSignsNT,
                'ChEMSAssessmentOTNT' => $ChEMSAssessmentOTNT,
                'ChRNMaterialsOTNT' => $ChRNMaterialsOTNT,
                'ChEMSWeeklyOTNT' => $ChEMSWeeklyOTNT,




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


        // Terapia Respiratoria
            //////////////////////////////////////////////////////////
        } else if ($ChRecord[0]['ch_type_id'] == 5) {
            //Ingreso
            $ChRespiratoryTherapy = ChRespiratoryTherapy::with('medical_diagnosis')->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChBackground = ChBackground::with('ch_type_background')->where('ch_record_id', $id)->where('type_record_id', 2)->get()->toArray();
           
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
                'ch_ass_chest_symmetry'
            )
                ->where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChAssSigns = ChAssSigns::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChScalePain = ChScalePain::where('ch_record_id', $id)->where('type_record_id', 4)->get()->toArray();
            $ChScaleWongBaker = ChScaleWongBaker::where('ch_record_id', $id)->where('type_record_id', 4)->get()->toArray();
            $ChRtInspection = ChRtInspection::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChAuscultation = ChAuscultation::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChDiagnosticAids = ChDiagnosticAids::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChObjectivesTherapy = ChObjectivesTherapy::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();
            $ChRtSessions = ChRtSessions::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();

            //Regular
            $ChRespiratoryTherapyEvo = ChRespiratoryTherapy::with('medical_diagnosis')->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChBackground = ChBackground::with('ch_type_background')->where('ch_record_id', $id)->where('type_record_id', 2)->get()->toArray();
           
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
            $ChRtSessionsEvo = ChRtSessions::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();


            if (count($ChRecord[0]['user']['assistance']) > 0) {
                $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
                $contenidoBinario = file_get_contents($rutaImagen);
                $imagenComoBase64 = base64_encode($contenidoBinario);
            }
            $today = Carbon::now();
            $Patients = $ChRecord[0]['admissions']['patients'];

            // $patient=$ChRecord['admissions'];

            $html = view('mails.hc', [
            'chrecord' => $ChRecord[0],

            'ChRespiratoryTherapy' => $ChRespiratoryTherapy,
            'ChBackground' => $ChBackground,
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
            'ChRtSessions' => $ChRtSessions,

            'ChRespiratoryTherapyEvo' => $ChRespiratoryTherapyEvo,
            'ChBackground' => $ChBackground,
            'ChVitalSignsEvo' => $ChVitalSignsEvo,
            'ChOxygenTherapyEvo' => $ChOxygenTherapyEvo,
            'ChRtSessionsEvo' => $ChRtSessionsEvo,

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

         // Trabajo Social
        //////////////////////////////////////////////////////////
    } else if ($ChRecord[0]['ch_type_id'] == 8) {
        //Ingreso
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

        //Regular
        $ChSwSupportNetworkEvo = ChSwSupportNetwork::with(
            'ch_sw_network'
        )->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();


        if (count($ChRecord[0]['user']['assistance']) > 0) {
            $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
            $contenidoBinario = file_get_contents($rutaImagen);
            $imagenComoBase64 = base64_encode($contenidoBinario);
        }
        $today = Carbon::now();
        $Patients = $ChRecord[0]['admissions']['patients'];

        // $patient=$ChRecord['admissions'];

        $html = view('mails.hc', [
        'chrecord' => $ChRecord[0],

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
        'ChSwExpenses' => $ChSwExpenses,
        'ChSwEconomicAspects' => $ChSwEconomicAspects,
        'ChSwArmedConflict' => $ChSwArmedConflict,
        'ChSwSupportNetwork' => $ChSwSupportNetwork,
        'ChSwSupportNetworkEvo' => $ChSwSupportNetworkEvo,
        
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
            'url' => asset('/storage' .  '/' . $name),
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ChRecord = new ChRecord;
        $ChRecord->status = $request->status;
        $ChRecord->date_attention = Carbon::now();
        $ChRecord->admissions_id = $request->admissions_id;
        $ChRecord->assigned_management_plan_id = $request->assigned_management_plan;

        $ChRecord->user_id = Auth::user()->id;
        // $validate = RoleAttention::where('role_id', $request->role_id)->get()->toArray();

        // if ($validate) {
        //     // $type_of_attention = [];
        //     // foreach ($validate as $item) {
        //     //     array_push($type_of_attention, $item['type_of_attention_id']);
        //     // }
        //     // if (false !== array_search(7, $type_of_attention) || false !== array_search(3, $type_of_attention)) {
        //     //     $ChRecord->ch_type_id = 1;
        //     // }

        // }
        switch ($request->type_of_attention_id) {
            case (1): {
                    $ChRecord->ch_type_id = 1;
                    break;
                }
            case (2): {
                    return response()->json([
                        'status' => false,
                        'message' => 'No hay historia clínica para esta atención',
                        'data' => ['ch_record' => []]
                    ]);
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
                    // PSICOLOGÍA
                    return response()->json([
                        'status' => false,
                        'message' => 'No hay historia clínica para esta atención',
                        'data' => ['ch_record' => []]
                    ]);
                    break;
                }
            case (6): {
                    // TRABAJO SOCIAL
                    $ChRecord->ch_type_id = 8;
                    break;
                }
            case (7): {
                    // TERAPIA FÍSICA
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
                    return response()->json([
                        'status' => false,
                        'message' => 'No hay historia clínica para esta atención',
                        'data' => ['ch_record' => []]
                    ]);
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
                        'message' => 'No hay historia clínica para esta atención',
                        'data' => ['ch_record' => []]
                    ]);
                    break;
                }
            case (19): {
                    $ChRecord->ch_type_id = 5;
                    break;
                }
        }

        if ($request->firm_file) {
            $image = $request->get('firm_file');  // your base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $random = Str::random(10);
            $imagePath = 'firmas/' . $random . '.png';
            Storage::disk('public')->put($imagePath, base64_decode($image));

            $ChRecord->file_firm = $imagePath;
        }

        $ChRecord->save();

        return response()->json([
            'status' => true,
            'message' => 'Registro paciente asociado al paciente exitosamente',
            'data' => ['ch_record' => $ChRecord->toArray()]
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
            'data' => ['ch_record' => $ChRecord]
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
        $admissions_id = $ChRecord->admissions_id;
        $ChRecordExist = ChRecord::where('admissions_id', $admissions_id)->where('assigned_management_plan_id', $ChRecord->assigned_management_plan_id)
            ->orderBy('created_at', 'ASC')->first();

        $ChRecord->status = $request->status;
        if ($request->file('firm_file')) {
            $path = Storage::disk('public')->put('patient_firm', $request->file('firm_file'));
            $ChRecord->firm_file = $path;
        }
        $ChRecord->date_finish = Carbon::now();
        $ChRecord->save();

        $mes = Carbon::now()->month;

        $validate = AccountReceivable::whereMonth('created_at', $mes)->where('user_id', $request->user_id)->whereBetween('status_bill_id', [1, 2])->get()->toArray();
        $user_id = AssignedManagementPlan::latest('id')->find($ChRecord->assigned_management_plan_id)->first()->user_id;
        $AssignedManagementPlan = AssignedManagementPlan::find($ChRecord->assigned_management_plan_id);
        $ManagementPlan = ManagementPlan::find($AssignedManagementPlan->management_plan_id);
        $admissions = Admissions::find($admissions_id);
        $Location = Location::where('admissions_id', $admissions->id)->first();
        $user_id = $admissions->patient_id;
        $locality = Patient::find($user_id)->locality_id;
        $patient = Patient::find($user_id)->neighborhood_or_residence_id;
        $tariff = NeighborhoodOrResidence::find($patient)->pad_risk_id;

        $valuetariff = $this->getNotFailedTariff($tariff, $ManagementPlan, $Location, $request, $admissions_id, $AssignedManagementPlan);

        if ($ChRecordExist->date_finish == '0000-00-00') {

            $assigned = AssignedManagementPlan::find($ChRecord->assigned_management_plan_id);
            $assigned->execution_date = Carbon::now();
            $assigned->save();

            if (!$validate) {
                $MinimumSalary = MinimumSalary::where('year', Carbon::now()->year)->first();
                //    = AssignedManagementPlan::find($ChRecord[0]['assigned_management_plan_id'])->get();
                $AccountReceivable = new AccountReceivable;
                $AccountReceivable->user_id = $request->user_id;
                $AccountReceivable->status_bill_id = 1;
                $AccountReceivable->minimum_salary_id = $MinimumSalary->id;
                $AccountReceivable->save();
                $billActivity = new BillUserActivity;
                $billActivity->procedure_id = $ManagementPlan->procedure_id;
                $billActivity->account_receivable_id = $AccountReceivable->id;
                $billActivity->assigned_management_plan_id = $ChRecord->assigned_management_plan_id;
                $billActivity->admissions_id = $admissions_id;
                $billActivity->tariff_id = $valuetariff[0]['id'];
                $billActivity->ch_record_id = $id;
                $billActivity->save();
            } else {
                $AccountReceivable = AccountReceivable::find($validate[0]['id']);
                $billActivity = new BillUserActivity;
                $billActivity->procedure_id = $ManagementPlan->procedure_id;
                $billActivity->account_receivable_id = $validate[0]['id'];
                $billActivity->assigned_management_plan_id = $ChRecord->assigned_management_plan_id;
                $billActivity->admissions_id = $admissions_id;
                $billActivity->tariff_id = $valuetariff[0]['id'];
                $billActivity->ch_record_id = $id;
                $billActivity->save();
            };

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
        } else {
            $billActivity = BillUserActivity::where('assigned_management_plan_id', $ChRecord->assigned_management_plan_id)->get()->first();
            if ($billActivity) {
                if ($billActivity->status == 'RECHAZADO') {
                    $billActivity->status = 'REENVIADO';
                    $billActivity->save();
                }
            }
        }


        return response()->json([
            'status' => true,
            'message' => 'Registro paciente actualizado exitosamente',
            'data' => ['ch_record' => $ChRecord]
        ]);
    }

    public function getNotFailedTariff($tariff, $ManagementPlan, $Location, $request, $admissions_id, $AssignedManagementPlan)
    {
        $extra_dose = 0;
        if ($ManagementPlan->type_of_attention_id == 17) {
            $assigned_validation = AssignedManagementPlan::select('assigned_management_plan.*')
                ->whereNull('assigned_management_plan.redo')
                ->where('assigned_management_plan.execution_date', '!=', '0000-00-00 00:00:00')
                ->where('assigned_management_plan.user_id', $AssignedManagementPlan->user_id)
                ->where('management_plan.admissions_id', $admissions_id)
                ->where('management_plan.type_of_attention_id', 17)
                ->leftJoin('management_plan', 'management_plan.id', 'assigned_management_plan.management_plan_id')
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
            $valuetariff = Tariff::where('failed', 1)
                ->where('type_of_attention_id', $ManagementPlan->type_of_attention_id)
                ->where('pad_risk_id', $tariff)
                ->where('status_id', 1)->get()->toArray();
        } else {
            $valuetariff = Tariff::where('admissions_id', $admissions_id)
                ->where('type_of_attention_id', $ManagementPlan->type_of_attention_id)
                ->where('phone_consult', $ManagementPlan->phone_consult)
                ->where('failed', 0)
                ->where('status_id', 1);
            $valuetariff = $valuetariff->get()->toArray();
            if (count($valuetariff) == 0) {
                $valuetariff = Tariff::where('pad_risk_id', $tariff)
                    ->where('phone_consult', $ManagementPlan->phone_consult)
                    ->where('type_of_attention_id', $ManagementPlan->type_of_attention_id)
                    ->where('status_id', 1)
                    ->where('failed', 0)
                    ->where('program_id', $Location->program_id);
                // definir cuando la atención es fallida
                if ($request->is_failed) {
                    if ($request->is_failed == true) {
                        $valuetariff->where('failed', 1);
                    } else {
                        $valuetariff->where('failed', 0);
                    }
                } else {
                    $valuetariff->where('failed', 0);
                }
                if ($ManagementPlan->type_of_attention_id == 12 || $ManagementPlan->type_of_attention_id == 13) {
                    if ($ManagementPlan->quantity && $ManagementPlan->quantity != 0) {
                        $valuetariff->where('quantity', $ManagementPlan->quantity);
                    }
                } else {
                    $valuetariff->whereNull('quantity');
                }
                $valuetariff->where('extra_dose', $extra_dose);
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
                'message' => 'Registro paciente eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Registro paciente en uso, no es posible eliminarlo'
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
}
