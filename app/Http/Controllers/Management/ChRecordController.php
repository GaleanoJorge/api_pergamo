<?php

namespace App\Http\Controllers\Management;

use iio\libmergepdf\Merger;
use App\Http\Controllers\Controller;
use App\Models\AccountReceivable;
use App\Models\Admissions;
use App\Models\AssignedManagementPlan;
use App\Models\Assistance;
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
use App\Models\Tracing;
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
                    ->where('admissions_id', $ChRecord[0]['admissions_id'])
                    ->where('ch_type_id', $ChRecord[0]['ch_type_id'])
                    ->where('status', 'CERRADO')
                    ->get()->toArray();
                if (count($validate) > 0) {
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




        if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
            $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
            $contenidoBinario = file_get_contents($rutaImagen);
            $imagenComoBase64 = base64_encode($contenidoBinario);
        } else {
            $imagenComoBase64 = null;
        }

        $today = Carbon::now();

        $Patients = $ChRecord[0]['admissions']['patients'];


        $html = view('mails.SWCertification', [
            'chrecord' => $ChRecord,
            'ChSwSupportNetwork' => $ChSwSupportNetwork,

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



        ///Fomula Médica
        ///////////////////////////////////////////////////////////////////////////////////////
        
        
        //Formulación
        $ChFormulation = ChFormulation::with(
            'product_generic',
            'product_generic.measurement_units',
            'product_generic.multidose_concentration',
            'administration_route',
            'hourly_frequency'
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
        )->where('id',$ChFormulation[0]['ch_record_id'])


            ->get()->toArray();

           

            $imagenComoBase64 = null;

            $fecharecord = Carbon::parse($ChRecord[0]['updated_at'])->format('d-m-Y h:i:s');
            


            if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
                $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
                $contenidoBinario = file_get_contents($rutaImagen);
                $imagenComoBase64 = base64_encode($contenidoBinario);
            } else {
                $imagenComoBase64 = null;
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

        ///Fomula Médica
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
        ->where('id', $id) ->get()->toArray();

            $ChFormulation = ChFormulation::with(
                'product_generic',
                'product_generic.measurement_units',
                'product_generic.multidose_concentration',
                'administration_route',
                'hourly_frequency'
            )
            ->leftJoin('ch_record','ch_formulation.ch_record_id','ch_record.id')
            ->where('ch_record.id', $ChRecord[0]['id'])->get()->toArray();

            $imagenComoBase64 = null;

            $fecharecord = Carbon::parse($ChRecord[0]['updated_at'])->format('d-m-Y h:i:s');
            


            if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
                $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
                $contenidoBinario = file_get_contents($rutaImagen);
                $imagenComoBase64 = base64_encode($contenidoBinario);
            } else {
                $imagenComoBase64 = null;
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



        //Ordenes Médicas
        $ChMedicalOrders = ChMedicalOrders::with(
            'procedure',
            'frequency',
            // 'services_briefcase',
            // 'services_briefcase.manual_price',
            // 'services_briefcase.manual_price.procedure',
    
            
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

        ///Orden Médica
        ///////////////////////////////////////////////////////////////////////////////////////
        
        $ChRecord = ChRecord:: select('ch_record.*')
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
        ->where('id', $id) ->get()->toArray();

        $ChMedicalOrders = ChMedicalOrders::with(
            'procedure',
            'frequency',          
            
        )
           
            ->leftJoin('ch_record','ch_medical_orders.ch_record_id','ch_record.id')
                ->where('ch_record.id', $ChRecord[0]['id'])->get()->toArray();

            $imagenComoBase64 = null;

            $fecharecord = Carbon::parse($ChRecord[0]['updated_at'])->format('d-m-Y h:i:s');
            


            if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
                $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
                $contenidoBinario = file_get_contents($rutaImagen);
                $imagenComoBase64 = base64_encode($contenidoBinario);
            } else {
                $imagenComoBase64 = null;
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
            


            if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
                $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
                $contenidoBinario = file_get_contents($rutaImagen);
                $imagenComoBase64 = base64_encode($contenidoBinario);
            } else {
                $imagenComoBase64 = null;
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
    
            $name = 'Incapacidad Médica.pdf';
    
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


        ->where('id',$ChMedicalCertificate[0]['ch_record_id'])->get()->toArray();

            $imagenComoBase64 = null;

            $fecharecord = Carbon::parse($ChRecord[0]['updated_at'])->format('d-m-Y h:i:s');
            


            if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
                $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
                $contenidoBinario = file_get_contents($rutaImagen);
                $imagenComoBase64 = base64_encode($contenidoBinario);
            } else {
                $imagenComoBase64 = null;
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
    
            $name = 'Certificado Médico.pdf';
    
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
            


            if (isset($ChRecord[0]['user']['assistance'][0]['file_firm']) && $ChRecord[0]['user']['assistance'][0]['file_firm'] != "null") {
                $rutaImagen = storage_path('app/public/' . $ChRecord[0]['user']['assistance'][0]['file_firm']);
                $contenidoBinario = file_get_contents($rutaImagen);
                $imagenComoBase64 = base64_encode($contenidoBinario);
            } else {
                $imagenComoBase64 = null;
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

        if ($ChRecord[0]['firm_file']) {
            $rutaImagenPatient = storage_path('app/public/' . $ChRecord[0]['firm_file']);
            $contenidoBinarioPatient = file_get_contents($rutaImagenPatient);
            $imagenPAtient = base64_encode($contenidoBinarioPatient);
        } else {
            $imagenPAtient = null;
        }

        $Patients = $ChRecord[0]['admissions']['patients'];

        if ($ChRecord[0]['status'] != 'CERRADO') {
            return response()->json([
                'status' => false,
                'message' => 'El folio de historia clínica no ha sido finalizado',
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

            //Evolución
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
                'frequency',
                // 'services_briefcase',
                // 'services_briefcase.manual_price',
                // 'services_briefcase.manual_price.procedure',
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
            //Seguimiento
            $ChTracing =Tracing::select('tracing.*')->Leftjoin('ch_record', 'ch_record.id', 'tracing.ch_record_id')
            ->where('ch_record.admissions_id',$ChRecord[0]['admissions_id'])
            ->get()->toArray();
            

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
                'ChTracing' => $ChTracing,
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

            $name = 'HC.pdf';

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
            )->where('ch_record_id', $id)->get()->toArray();
            $ChOxigenNE = ChOxigen::with('oxygen_type', 'liters_per_minute')->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChNursingProcedure = ChNursingProcedure::with('nursing_procedure')->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChCarePlan = ChCarePlan::with('nursing_care_plan')->where('ch_record_id', $id)->get()->toArray();
            $ChLiquidControl = ChLiquidControl::with('ch_route_fluid', 'ch_type_fluid')->where('ch_record_id', $id)->get()->toArray();
            $ChNotesDescription = ChNotesDescription::with('patient_position')->where('ch_record_id', $id)->get()->toArray();
            // VALORACIÓN EN LA PIEL
            $ChSkinValoration = ChSkinValoration::with('body_region', 'skin_status', 'diagnosis')->where('ch_record_id', $id)->get()->toArray();

            // ESCALAS
            $ChScaleNorton = ChScaleNorton::where('ch_record_id', $id)->get()->toArray();
            $ChScaleGlasgow = ChScaleGlasgow::where('ch_record_id', $id)->get()->toArray();
            $ChScaleJhDownton = ChScaleJhDownton::where('ch_record_id', $id)->get()->toArray();
            $ChScaleBraden = ChScaleBraden::where('ch_record_id', $id)->get()->toArray();

             //Seguimiento
             $ChTracing =Tracing::select('tracing.*')->Leftjoin('ch_record', 'ch_record.id', 'tracing.ch_record_id')
             ->where('ch_record.admissions_id',$ChRecord[0]['admissions_id'])
             ->get()->toArray();

            //APLICACION DE MEDICAMENTOS

            $AssistanceSupplies = AssistanceSupplies::with('users')->where('ch_record_id', $id)->get()->toArray();

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
                   ) AS dañadas'),
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
            $PharmacyProductRequest->leftJoin('services_briefcase', 'services_briefcase.id', 'pharmacy_product_request.services_briefcase_id')
                ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
                ->where('pharmacy_product_request.management_plan_id', $ChRecord[0]['assigned_management_plan']['management_plan_id'])
                ->whereNotNull('manual_price.product_id');
            $PharmacyProductRequest = $PharmacyProductRequest->get()->toArray();

            $patient = $ChRecord[0]['admissions'];
            $html = view('mails.hcEnfermeria', [
                'chrecord' => $ChRecord,

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
                'PharmacyProductRequest' => $PharmacyProductRequest,
                'AssistanceSupplies' => $AssistanceSupplies,
                'ChTracing' => $ChTracing,
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

            $name = 'HC.pdf';

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
            $ChRtSessions = ChRtSessions::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();

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
            $ChRtSessionsEvo = ChRtSessions::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            //Seguimiento
            $ChTracing =Tracing::select('tracing.*')->Leftjoin('ch_record', 'ch_record.id', 'tracing.ch_record_id')
            ->where('ch_record.admissions_id',$ChRecord[0]['admissions_id'])
            ->get()->toArray();

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
                'ChTracing' => $ChTracing,
                'fecharecord' => $fecharecord,

                'ChRespiratoryTherapyEvo' => $ChRespiratoryTherapyEvo,
                'ChBackgroundEvo' => $ChBackgroundEvo,
                'ChGynecologistsEvo' => $ChGynecologistsEvo,
                'ChVitalSignsEvo' => $ChVitalSignsEvo,
                'ChOxygenTherapyEvo' => $ChOxygenTherapyEvo,
                'ChRtSessionsEvo' => $ChRtSessionsEvo,
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

            $name = 'HC.pdf';

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

            //Evolución
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
            // Valoración
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
             //Seguimiento
             $ChTracing =Tracing::select('tracing.*')->Leftjoin('ch_record', 'ch_record.id', 'tracing.ch_record_id')
             ->where('ch_record.admissions_id',$ChRecord[0]['admissions_id'])
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

            // $patient=$ChRecord['admissions'];
            $html = view('mails.lenguagehistory', [
                'chrecord' => $ChRecord,

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
                'ChTracing' => $ChTracing,
                
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

            $name = 'Historia Clinica Terapia de Lenguaje.pdf';

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
            //Seguimiento
            $ChTracing =Tracing::select('tracing.*')->Leftjoin('ch_record', 'ch_record.id', 'tracing.ch_record_id')
            ->where('ch_record.admissions_id',$ChRecord[0]['admissions_id'])
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

            // $patient=$ChRecord['admissions'];
            $html = view('mails.occupationalhistory', [
                'chrecord' => $ChRecord,
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
                'ChTracing' => $ChTracing,
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

            $name = 'HC.pdf';

            Storage::disk('public')->put($name, $file);

            ///Nutrición
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

            //Seguimiento
            $ChTracing =Tracing::select('tracing.*')->Leftjoin('ch_record', 'ch_record.id', 'tracing.ch_record_id')
            ->where('ch_record.admissions_id',$ChRecord[0]['admissions_id'])
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

            // $patient=$ChRecord['admissions'];
            $html = view('mails.nutritionhistory', [
                'chrecord' => $ChRecord,
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
                'ChTracing' => $ChTracing,
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

            $name = 'HC.pdf';

            Storage::disk('public')->put($name, $file);

            ///Terapia Física
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
            
            //Seguimiento
            $ChTracing =Tracing::select('tracing.*')->Leftjoin('ch_record', 'ch_record.id', 'tracing.ch_record_id')
            ->where('ch_record.admissions_id',$ChRecord[0]['admissions_id'])
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

            // $patient=$ChRecord['admissions'];

            $html = view('mails.physicalhistory', [
                'chrecord' => $ChRecord,

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
                'ChTracing' => $ChTracing,

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

            $name = 'prueba.pdf';

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
            )->leftJoin('sw_rights_duties','sw_education.sw_rights_duties_id','sw_rights_duties.id')->where('ch_record_id', $id)->where('type_record_id', 1)
            ->where('sw_rights_duties.code',1)->get()->toArray();
            $SwEducationDb = SwEducation::select('sw_education.*')->with(
                'sw_rights_duties'
            )->leftJoin('sw_rights_duties','sw_education.sw_rights_duties_id','sw_rights_duties.id')->where('ch_record_id', $id)->where('type_record_id', 1)
            ->where('sw_rights_duties.code',2)->get()->toArray();

            //Regular
            $SwEducationEvoDr = SwEducation::select('sw_education.*')->with(
                'sw_rights_duties'
            )->leftJoin('sw_rights_duties','sw_education.sw_rights_duties_id','sw_rights_duties.id')->where('ch_record_id', $id)->where('type_record_id', 3)
            ->where('sw_rights_duties.code',1)->get()->toArray();
            $SwEducationEvoDb = SwEducation::select('sw_education.*')->with(
                'sw_rights_duties'
            )->leftJoin('sw_rights_duties','sw_education.sw_rights_duties_id','sw_rights_duties.id')->where('ch_record_id', $id)->where('type_record_id', 3)
            ->where('sw_rights_duties.code',2)->get()->toArray();
            $ChSwSupportNetworkEvo = ChSwSupportNetwork::with(
                'ch_sw_network'
            )->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
             //Seguimiento
             $ChTracing =Tracing::select('tracing.*')->Leftjoin('ch_record', 'ch_record.id', 'tracing.ch_record_id')
             ->where('ch_record.admissions_id',$ChRecord[0]['admissions_id'])
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

            // $patient=$ChRecord['admissions'];

            $html = view('mails.sworkhistory', [
                'chrecord' => $ChRecord,

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
                'SwEducationEvoDr' => $SwEducationEvoDr, 
                'SwEducationEvoDb' => $SwEducationEvoDb, 
                'ChTracing' => $ChTracing, 
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
            $ChPsMultiaxial = ChPsMultiaxial:: where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();            
            $ChPsIntervention = ChPsIntervention::where('ch_record_id', $id)->where('type_record_id', 1)->get()->toArray();

            //Regular
            $ChPsAssessmentEvo = ChPsAssessment::with(
                'relationship',
                'ch_ps_episodes'
            )->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();            
            $ChPsOperationalization = ChPsOperationalization::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChPsConsciousness = ChPsConsciousness::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChPsObjectives = ChPsObjectives::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            //Seguimiento
            $ChTracing =Tracing::select('tracing.*')->Leftjoin('ch_record', 'ch_record.id', 'tracing.ch_record_id')
            ->where('ch_record.admissions_id',$ChRecord[0]['admissions_id'])
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

            // $patient=$ChRecord['admissions'];

            $html = view('mails.psychologyhistory', [
                'chrecord' => $ChRecord,

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
                'ChTracing' => $ChTracing,
                

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

            $name = 'prueba.pdf';

            Storage::disk('public')->put($name, $file);

            // Trabajo Social
            //////////////////////////////////

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

        $ChRecord = $ChRecord->get()->toArray();


        $imagenComoBase64 = null;
        $count = 0;

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

                    //Evolución
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

                    //Formulación
                    $ChFormulation = ChFormulation::with(
                        'product_generic',
                        'product_generic.measurement_units',
                        'product_generic.multidose_concentration',
                        'administration_route',
                        'hourly_frequency'
                    )
                        ->where('ch_record_id', $ch['id'])->where('type_record_id', 5)->get()->toArray();

                    //Ordenes Médicas
                    $ChMedicalOrders = ChMedicalOrders::with(
                        'procedure',
                        'frequency'
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

                    // $img=asset('storage/'.$ChRecord[0]['user']['assistance'][0]['file_firm']);
                    // $imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($img));
                    if (isset($ch['user']['assistance'][0]['file_firm']) && $ch['user']['assistance'][0]['file_firm'] != "null") {
                        $rutaImagen = storage_path('app/public/' . $ch['user']['assistance'][0]['file_firm']);
                        $contenidoBinario = file_get_contents($rutaImagen);
                        $imagenComoBase64 = base64_encode($contenidoBinario);
                    } else {
                        $imagenComoBase64 = null;
                    }
                    $ChTracing =Tracing::select('tracing.*')->Leftjoin('ch_record', 'ch_record.id', 'tracing.ch_record_id')
                    ->where('ch_record.admissions_id',$ChRecord[0]['admissions_id'])
                    ->get()->toArray();
                    $today = Carbon::now();
                    
                    
                    
                    // $patient=$ChRecord['admissions'];
                    
                    $html = view('mails.medicalhistory', [
                        'chrecord' => $ChRecord,
                        
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
                }



                # Crear el "combinador"
                $combinador = new Merger;

                # Agregar archivo en cada iteración
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
                    // VALORACIÓN EN LA PIEL
                    $ChSkinValoration = ChSkinValoration::with('body_region', 'skin_status', 'diagnosis')->where('ch_record_id', $ch['id'])->get()->toArray();

                    // ESCALAS
                    $ChScaleNorton = ChScaleNorton::where('ch_record_id', $ch['id'])->get()->toArray();
                    $ChScaleGlasgow = ChScaleGlasgow::where('ch_record_id', $ch['id'])->get()->toArray();
                    $ChScaleJhDownton = ChScaleJhDownton::where('ch_record_id', $ch['id'])->get()->toArray();
                    $ChScaleBraden = ChScaleBraden::where('ch_record_id', $ch['id'])->get()->toArray();

                    //APLICACION DE MEDICAMENTOS

                    $AssistanceSupplies = AssistanceSupplies::with('users')->where('ch_record_id', $ch['id'])->get()->toArray();

                    if (isset($ch['user']['assistance'][0]['file_firm']) && $ch['user']['assistance'][0]['file_firm'] != "null") {
                        $rutaImagen = storage_path('app/public/' . $ch['user']['assistance'][0]['file_firm']);
                        $contenidoBinario = file_get_contents($rutaImagen);
                        $imagenComoBase64 = base64_encode($contenidoBinario);
                    } else {
                        $imagenComoBase64 = null;
                    }
                    $today = Carbon::now();


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
       ) AS dañadas'),
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
                    $PharmacyProductRequest->leftJoin('services_briefcase', 'services_briefcase.id', 'pharmacy_product_request.services_briefcase_id')
                        ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
                        ->where('pharmacy_product_request.management_plan_id', $ch['assigned_management_plan']['management_plan_id'])
                        ->whereNotNull('manual_price.product_id');
                    $PharmacyProductRequest = $PharmacyProductRequest->get()->toArray();

                                //Seguimiento
            $ChTracing =Tracing::select('tracing.*')->Leftjoin('ch_record', 'ch_record.id', 'tracing.ch_record_id')
            ->where('ch_record.admissions_id',$ChRecord[0]['admissions_id'])
            ->get()->toArray();

                    $html = view('mails.hcEnfermeria', [
                        'chrecord' => $ChRecord,

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
                        'PharmacyProductRequest' => $PharmacyProductRequest,
                        'AssistanceSupplies' => $AssistanceSupplies,
                        'fecharecord' => $fecharecord,
                        'ChTracing' => $ChTracing,
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
                }
                # Crear el "combinador"
                $combinador = new Merger;

                # Agregar archivo en cada iteración
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


        ///Nutrición
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

                    $ChTracing =Tracing::select('tracing.*')->Leftjoin('ch_record', 'ch_record.id', 'tracing.ch_record_id')
                    ->where('ch_record.admissions_id',$ChRecord[0]['admissions_id'])
                    ->get()->toArray();
                    
                    // $patient=$ChRecord['admissions'];
                    $html = view('mails.nutritionhistory', [
                        'chrecord' => $ChRecord,
                        'ChNutritionAnthropometry' => $ChNutritionAnthropometry,
                        'ChTracing' => $ChTracing,
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

                # Agregar archivo en cada iteración
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

                    //Evolución
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
                    // Valoración
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
                    if (isset($ch['user']['assistance'][0]['file_firm']) && $ch['user']['assistance'][0]['file_firm'] != "null") {
                        $rutaImagen = storage_path('app/public/' . $ch['user']['assistance'][0]['file_firm']);
                        $contenidoBinario = file_get_contents($rutaImagen);
                        $imagenComoBase64 = base64_encode($contenidoBinario);
                    } else {
                        $imagenComoBase64 = null;
                    }
                    $today = Carbon::now();

                    $ChTracing =Tracing::select('tracing.*')->Leftjoin('ch_record', 'ch_record.id', 'tracing.ch_record_id')
                    ->where('ch_record.admissions_id',$ChRecord[0]['admissions_id'])
                    ->get()->toArray();
                    $Patients = $ch['admissions']['patients'];
                    
                    // $patient=$ChRecord['admissions'];
                    $html = view('mails.lenguagehistory', [
                        'chrecord' => $ChRecord,
                        
                        'ChTracing' => $ChTracing,
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

                # Agregar archivo en cada iteración
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
                    }
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
                    $ChRtSessions = ChRtSessions::where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();

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
                    $ChRtSessionsEvo = ChRtSessions::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();

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
                    $ChTracing =Tracing::select('tracing.*')->Leftjoin('ch_record', 'ch_record.id', 'tracing.ch_record_id')
                    ->where('ch_record.admissions_id',$ChRecord[0]['admissions_id'])
                    ->get()->toArray();
                    // $patient=$ChRecord['admissions'];
                    
                    $html = view('mails.respiratoryhistory', [
                        'chrecord' => $ChRecord,
                        
                        'ChTracing' => $ChTracing,
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

                    $name = 'HC.pdf';

                    Storage::disk('public')->put($name, $file);
                    array_push($documentos, $name);
                }


                # Crear el "combinador"
                $combinador = new Merger;

                # Agregar archivo en cada iteración
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
                    }
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
                    $ChRNValorationOT = ChRNValorationOT::with('ch_diagnosis')->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChVitalSignsNT = ChVitalSigns::with(
                        'ch_vital_hydration',
                        'ch_vital_ventilated',
                        'ch_vital_temperature',
                        'ch_vital_neurological',
                        'oxygen_type',
                        'liters_per_minute',
                        'parameters_signs'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChEMSAssessmentOTNT = ChEMSAssessmentOT::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChRNMaterialsOTNT = ChRNMaterialsOT::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();
                    $ChEMSWeeklyOTNT = ChEMSWeeklyOT::where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();

                    if (isset($ch['user']['assistance'][0]['file_firm']) && $ch['user']['assistance'][0]['file_firm'] != "null") {
                        $rutaImagen = storage_path('app/public/' . $ch['user']['assistance'][0]['file_firm']);
                        $contenidoBinario = file_get_contents($rutaImagen);
                        $imagenComoBase64 = base64_encode($contenidoBinario);
                    } else {
                        $imagenComoBase64 = null;
                    }
                    $today = Carbon::now();
                    $ChTracing =Tracing::select('tracing.*')->Leftjoin('ch_record', 'ch_record.id', 'tracing.ch_record_id')
                    ->where('ch_record.admissions_id',$ChRecord[0]['admissions_id'])
                    ->get()->toArray();
                    
                    $Patients = $ch['admissions']['patients'];
                    
                    // $patient=$ChRecord['admissions'];
                    $html = view('mails.occupationalhistory', [
                        'chrecord' => $ChRecord,
                        'ChTracing' => $ChTracing,
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

                # Agregar archivo en cada iteración
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


        ///Terapia Física
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

                    if (isset($ch['user']['assistance'][0]['file_firm']) && $ch['user']['assistance'][0]['file_firm'] != "null") {
                        $rutaImagen = storage_path('app/public/' . $ch['user']['assistance'][0]['file_firm']);
                        $contenidoBinario = file_get_contents($rutaImagen);
                        $imagenComoBase64 = base64_encode($contenidoBinario);
                    } else {
                        $imagenComoBase64 = null;
                    }
                    $today = Carbon::now();

                    $ChTracing =Tracing::select('tracing.*')->Leftjoin('ch_record', 'ch_record.id', 'tracing.ch_record_id')
                    ->where('ch_record.admissions_id',$ChRecord[0]['admissions_id'])
                    ->get()->toArray();
                    $Patients = $ch['admissions']['patients'];
                    
                    // $patient=$ChRecord['admissions'];
                    
                    $html = view('mails.physicalhistory', [
                        'chrecord' => $ChRecord,
                        
                        'ChTracing' => $ChTracing,
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

                # Agregar archivo en cada iteración
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
                    )->leftJoin('sw_rights_duties','sw_education.sw_rights_duties_id','sw_rights_duties.id')->where('ch_record_id', $id)->where('type_record_id', 1)
                    ->where('sw_rights_duties.code',1)->get()->toArray();
                    $SwEducationDb = SwEducation::select('sw_education.*')->with(
                        'sw_rights_duties'
                    )->leftJoin('sw_rights_duties','sw_education.sw_rights_duties_id','sw_rights_duties.id')->where('ch_record_id', $id)->where('type_record_id', 1)
                    ->where('sw_rights_duties.code',2)->get()->toArray();
                    $ChSwSupportNetwork = ChSwSupportNetwork::with(
                        'ch_sw_network'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 1)->get()->toArray();

                    //Regular
                    $SwEducationEvoDr = SwEducation::select('sw_education.*')->with(
                        'sw_rights_duties'
                    )->leftJoin('sw_rights_duties','sw_education.sw_rights_duties_id','sw_rights_duties.id')->where('ch_record_id', $id)->where('type_record_id', 3)
                    ->where('sw_rights_duties.code',1)->get()->toArray();
                    $SwEducationEvoDb = SwEducation::select('sw_education.*')->with(
                        'sw_rights_duties'
                    )->leftJoin('sw_rights_duties','sw_education.sw_rights_duties_id','sw_rights_duties.id')->where('ch_record_id', $id)->where('type_record_id', 3)
                    ->where('sw_rights_duties.code',2)->get()->toArray();

                    $ChSwSupportNetworkEvo = ChSwSupportNetwork::with(
                        'ch_sw_network'
                    )->where('ch_record_id', $ch['id'])->where('type_record_id', 3)->get()->toArray();


                    if (isset($ch['user']['assistance'][0]['file_firm']) && $ch['user']['assistance'][0]['file_firm'] != "null") {
                        $rutaImagen = storage_path('app/public/' . $ch['user']['assistance'][0]['file_firm']);
                        $contenidoBinario = file_get_contents($rutaImagen);
                        $imagenComoBase64 = base64_encode($contenidoBinario);
                    } else {
                        $imagenComoBase64 = null;
                    }
                    $today = Carbon::now();
                    $Patients = $ch['admissions']['patients'];
                    $ChTracing =Tracing::select('tracing.*')->Leftjoin('ch_record', 'ch_record.id', 'tracing.ch_record_id')
                    ->where('ch_record.admissions_id',$ChRecord[0]['admissions_id'])
                    ->get()->toArray();
                    // $patient=$ChRecord['admissions'];
                    
                    $html = view('mails.sworkhistory', [
                        'chrecord' => $hcAll,
                        
                        'ChTracing' => $ChTracing,
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

                # Agregar archivo en cada iteración
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
        $count = 0;
        $chrecord = ChRecord::where('admissions_id', $request->admissions_id)->get()->toArray();
        foreach ($chrecord as $ch) {
            $count++;
        }
        $ChRecord = new ChRecord;
        
        $ChRecord->consecutive = $count + 1;
        $ChRecord->status = $request->status;
        $ChRecord->date_attention = Carbon::now();
        $ChRecord->admissions_id = $request->admissions_id;
        $ChRecord->assigned_management_plan_id = $request->assigned_management_plan;
        $ChRecord->admissions_id = $request->admissions_id;

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
                    // PSICOLOGÍA
                    $ChRecord->ch_type_id = 9;
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
                        'data' => ['ch_record' => []],
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
        }

        if ($request->firm_file) {
            $image = $request->get('firm_file'); // your base64 encoded
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
        $admissions_id = $ChRecord->admissions_id;
        $ChRecordExist = ChRecord::where('admissions_id', $admissions_id)->where('assigned_management_plan_id', $ChRecord->assigned_management_plan_id)
            ->orderBy('created_at', 'ASC')->first();

        $ChRecord->status = $request->status;

        if ($request->firm_file != "null") {
            $image = $request->get('firm_file'); // your base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $random = Str::random(10);
            $imagePath = 'firmas/' . $random . '.png';
            Storage::disk('public')->put($imagePath, base64_decode($image));

            $ChRecord->firm_file = $imagePath;
        }

        // if ($request->file('firm_file')) {
        //     $path = Storage::disk('public')->put('patient_firm', $request->file('firm_file'));
        //     $ChRecord->firm_file = $path;
        // }
        

        $mes = Carbon::now()->month;

        $validate = AccountReceivable::whereMonth('created_at', $mes)->where('user_id', $request->user_id)->whereBetween('status_bill_id', [1, 2])->get()->toArray();
        $user_id = AssignedManagementPlan::latest('id')->find($ChRecord->assigned_management_plan_id)->first()->user_id;
        $AssignedManagementPlan = AssignedManagementPlan::find($ChRecord->assigned_management_plan_id);
        $ManagementPlan = ManagementPlan::find($AssignedManagementPlan->management_plan_id);
        $admissions = Admissions::find($admissions_id);
        $Location = Location::where('admissions_id', $admissions->id)->first();
        $user_id = $admissions->patient_id;
        $locality = Patient::find($admissions->patient_id)->locality_id;
        $patient = Patient::find($admissions->patient_id)->neighborhood_or_residence_id;
        $tariff = NeighborhoodOrResidence::find($patient)->pad_risk_id;
        $Assistance = Assistance::where('user_id', $request->user_id)->get()->toArray();
        if ($Assistance[0]['contract_type_id'] != 1 && $Assistance[0]['contract_type_id'] != 2 && $Assistance[0]['contract_type_id'] != 3) {
            $valuetariff = $this->getNotFailedTariff($tariff, $ManagementPlan, $Location, $request, $admissions_id, $AssignedManagementPlan);
            if (count($valuetariff) == 0) {
                return response()->json([
                    'status' => false,
                    'message' => 'No existe tarifa para este servicio, por favor comuníquese con talento humano',
                    'data' => ['ch_record' => $ChRecord],
                ]);  
            }
        }
        $ChRecord->date_finish = Carbon::now();
        $ChRecord->save();
        if ($ChRecordExist->date_finish == '0000-00-00') {

            $assigned = AssignedManagementPlan::find($ChRecord->assigned_management_plan_id);
            $assigned->execution_date = Carbon::now();
            $assigned->save();
            if ($Assistance[0]['contract_type_id'] != 1 && $Assistance[0]['contract_type_id'] != 2 && $Assistance[0]['contract_type_id'] != 3) {
                $this->newBillUserActivity($validate, $id, $request, $ManagementPlan, $ChRecord, $admissions_id, $valuetariff);
            }

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
                } else {
                    if ($ManagementPlan->type_of_attention_id == 12 || $ManagementPlan->type_of_attention_id == 13) {
                        if ($Assistance[0]['contract_type_id'] != 1 && $Assistance[0]['contract_type_id'] != 2 && $Assistance[0]['contract_type_id'] != 3) {
                            $this->newBillUserActivity($validate, $id, $request, $ManagementPlan, $ChRecord, $admissions_id, $valuetariff);
                        }               
                    }
                }
            } else {
                if ($ManagementPlan->type_of_attention_id == 12 || $ManagementPlan->type_of_attention_id == 13) {
                        if ($Assistance[0]['contract_type_id'] != 1 && $Assistance[0]['contract_type_id'] != 2 && $Assistance[0]['contract_type_id'] != 3) {
                            $this->newBillUserActivity($validate, $id, $request, $ManagementPlan, $ChRecord, $admissions_id, $valuetariff);
                        }               
                }
            }
        }

        // $hola = $this->interoperavility($id);

        return response()->json([
            'status' => true,
            'message' => 'Registro paciente actualizado exitosamente',
            'data' => ['ch_record' => $ChRecord],
        ]);
    }

    public function newBillUserActivity($validate, $id, $request, $ManagementPlan, $ChRecord, $admissions_id, $valuetariff) {
        $Assistance = Assistance::where('user_id', $request->user_id)->get()->toArray();
        if ($Assistance[0]['contract_type_id'] != 1 && $Assistance[0]['contract_type_id'] != 2 && $Assistance[0]['contract_type_id'] != 3) {
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
                if ($ManagementPlan->phone_consult == 1) {
                    $valuetariff = Tariff::whereNull('pad_risk_id')
                        ->where('phone_consult', $ManagementPlan->phone_consult)
                        ->where('type_of_attention_id', $ManagementPlan->type_of_attention_id)
                        ->where('status_id', 1)
                        ->where('failed', 0)
                        ->where('program_id', $Location->program_id);
                } else {
                    $valuetariff = Tariff::where('pad_risk_id', $tariff)
                        ->where('phone_consult', $ManagementPlan->phone_consult)
                        ->where('type_of_attention_id', $ManagementPlan->type_of_attention_id)
                        ->where('status_id', 1)
                        ->where('failed', 0)
                        ->where('program_id', $Location->program_id);
                }
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
                    if ($ManagementPlan->hours && $ManagementPlan->hours != 0) {
                        $valuetariff->where('quantity', $ManagementPlan->hours);
                    }
                } else {
                    $valuetariff->whereNull('quantity');
                }
                $valuetariff->where('extra_dose', $extra_dose);
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
        
        ->where('role.role_type_id',2)
        ->groupBy('ch_record.id')
        ->get()->toarray()
        ;

        $info[0]['patient_gender'] = $this->getGender($info[0]['patient_gender']);
        $info[0]['gender_medical'] = $this->getGender($info[0]['gender_medical']);
        $info[0]['company'] = $this->getCompany($info[0]['company']);

        return $info;
    }

    public function getGender(string $e) {
        if ($e == "M" || $e == "F") {
            return $e;
        } else {
            return "I";
        }
    }

    public function getCompany(string $e) {
        if ($e == "1") {
            return "30";
        } else {
            return "31";
        }
    }
}
