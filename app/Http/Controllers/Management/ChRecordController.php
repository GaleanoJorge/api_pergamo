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
use App\Models\ChPhysicalExam;
use App\Models\Base\ServicesBriefcase;
use App\Models\BillingPad;
use App\Models\Patient;
use App\Models\Location;
use App\Models\ChReasonConsultation;
use App\Models\ChNursingEntry;
use App\Models\ChEValorationOT;
use App\Models\ChVitalSigns;
use App\Models\ChRecommendationsEvo;
use App\Models\ChSystemExam;
use App\Models\ManagementPlan;
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

        ///////////////////////////////////////////////////////////////////////////////////////

        if ($ChRecord[0]['ch_type_id'] == 1) {
            $ChReasonConsultation = ChReasonConsultation::where('ch_record_id', $id)->get()->toArray();
            $ChSystemExam = ChSystemExam::with('type_ch_system_exam')->where('ch_record_id', $id)->get()->toArray();
            $ChPhysicalExam = ChPhysicalExam::with('type_ch_physical_exam')->where('ch_record_id', $id)->get()->toArray();
            $ChVitalSigns = ChVitalSigns::where('ch_record_id', $id)->get()->toArray();
            $ChDiagnosis = ChDiagnosis::with('diagnosis', 'ch_diagnosis_class', 'ch_diagnosis_type')->where('ch_record_id', $id)->get()->toArray();
            $ChBackground = ChBackground::with('ch_type_background')->where('ch_record_id', $id)->get()->toArray();
            $ChEvoSoap = ChEvoSoap::where('ch_record_id', $id)->get()->toArray();
            $ChPhysicalExamEvo = ChPhysicalExam::with('type_ch_physical_exam')->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChVitalSignsEvo = ChVitalSigns::where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChDiagnosisEvo = ChDiagnosis::with('diagnosis', 'ch_diagnosis_class', 'ch_diagnosis_type')->where('ch_record_id', $id)->where('type_record_id', 3)->get()->toArray();
            $ChRecommendationsEvo = ChRecommendationsEvo::with('recommendations_evo')->where('ch_record_id', $id)->get()->toArray();
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
                'chrecord' => $ChRecord,
                'chreasonconsultation' => $ChReasonConsultation,
                'chsystemexam' => $ChSystemExam,
                'chphysicalexam' => $ChPhysicalExam,
                'chvitalsings' => $ChVitalSigns,
                'chdiagnosis' => $ChDiagnosis,
                'chbackground' => $ChBackground,
                'ChEvoSoap' => $ChEvoSoap,
                'ChPhysicalExamEvo' => $ChPhysicalExamEvo,
                'ChVitalSignsEvo' => $ChVitalSignsEvo,
                'ChDiagnosisEvo' => $ChDiagnosisEvo,
                'ChRecommendationsEvo' => $ChRecommendationsEvo,
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

            //////////////////////////////////////////////////////////
        } else if ($ChRecord[0]['ch_type_id'] == 2) {


            $ChnursingEntry = ChNursingEntry::with('patient_position')->where('ch_record_id', $id)->get()->toArray();
            $ChPhysicalExam = ChPhysicalExam::with('ñ')->where('ch_record_id', $id)->get()->toArray();

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
                'chnursingentry' => $ChnursingEntry,
                'chphysicalexam' => $ChPhysicalExam,
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


            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        } else if ($ChRecord[0]['ch_type_id'] == 6) {


            $ChEValorationOT = ChEValorationOT::with('ch_diagnosis')->where('ch_record_id', $id)->get()->toArray();

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
                'chevalorationot' => $ChEValorationOT,
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


            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
                    return response()->json([
                        'status' => false,
                        'message' => 'No hay historia clínica para esta atención',
                        'data' => ['ch_record' => []]
                    ]);
                    break;
                }
            case (7): {
                    // TERAPIA FÍSICA
                    return response()->json([
                        'status' => false,
                        'message' => 'No hay historia clínica para esta atención',
                        'data' => ['ch_record' => []]
                    ]);
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
        // $ambit = Location::find($admissions_id)->scope_of_attention_id;
        $locality = Patient::find($user_id)->locality_id;
        $patient = Patient::find($user_id)->neighborhood_or_residence_id;
        $tariff = NeighborhoodOrResidence::find($patient)->pad_risk_id;
        // $role = $request->role;
        // $valuetariff = Tariff::where('pad_risk_id', $tariff)->where('role_id', $role)->where('scope_of_attention_id', $ambit)->first();
        $valuetariff = Tariff::where('admissions_id', $admissions->id)
            ->where('type_of_attention_id', $ManagementPlan->type_of_attention_id)
            ->where('phone_consult', $ManagementPlan->phone_consult)
            ->where('status_id', 1);
        // definir cuando la atención es fallida
        if ($request->failed) {
            $valuetariff->where('failed', 1);
        } else {
            $valuetariff->where('failed', 0);
        }
        $valuetariff = $valuetariff->get()->toArray();
        if (count($valuetariff) == 0) {
            $valuetariff = Tariff::where('pad_risk_id', $tariff)
                ->where('phone_consult', $ManagementPlan->phone_consult)
                ->where('type_of_attention_id', $ManagementPlan->type_of_attention_id)
                ->where('status_id', 1)
                ->where('program_id', $Location->program_id);
            // definir cuando la atención es fallida
            if ($request->failed) {
                $valuetariff->where('failed', 1);
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
            if ($request->extra_dose) {
                $valuetariff->where('extra_dose', $request->extra_dose);
            } else {
                $valuetariff->where('extra_dose', 0);
            }
            $valuetariff = $valuetariff->get()->toArray();
        }

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
                $billActivity->admissions_id = $admissions_id;
                $billActivity->tariff_id = $valuetariff[0]['id'];
                $billActivity->ch_record_id = $id;
                $billActivity->save();
            } else {
                $AccountReceivable = AccountReceivable::find($validate[0]['id']);
                $billActivity = new BillUserActivity;
                $billActivity->procedure_id = $ManagementPlan->procedure_id;
                $billActivity->account_receivable_id = $validate[0]['id'];
                $billActivity->admissions_id = $admissions_id;
                $billActivity->tariff_id = $valuetariff[0]['id'];
                $billActivity->ch_record_id = $id;
                $billActivity->save();
            };

            $assistance = Assistance::where('user_id', $request->user_id)->first();
            $LocationCapacity = LocationCapacity::where('locality_id', $locality)
                ->where('assistance_id', $assistance->id)
                ->where('validation_date', '>=', Carbon::now()->startOfMonth())
                ->where('validation_date', '<=', Carbon::now()->endOfMonth())
                ->first();
            if ($LocationCapacity) {
                $LocationCapacity->PAD_patient_attended = $LocationCapacity->PAD_patient_attended + 1;
                $LocationCapacity->save();
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
        }


        return response()->json([
            'status' => true,
            'message' => 'Registro paciente actualizado exitosamente',
            'data' => ['ch_record' => $ChRecord]
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
