<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MedicalDiaryDaysRequest;
use App\Models\ServicesBriefcase;
use App\Models\MedicalDiaryDays;
use App\Models\Authorization;
use App\Models\MedicalDiary;
use App\Models\User;
use App\Actions\Transform\NumerosEnLetras;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Dompdf\Dompdf as PDF;
use Dompdf\Options;
use Carbon\Carbon;
use DateTime;


class MedicalDiaryDaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $MedicalDiaryDays = MedicalDiaryDays::select(
            'medical_diary_days.*',
            // 'medical_diary_days.id AS Id',
            DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo'),
            DB::raw("IF(medical_diary_days.medical_status_id = 1, 
                            'Libre',
                            IF(medical_diary_days.medical_status_id = 2,
                                CONCAT('Reservada por :', ' ',patients.lastname,' ',patients.middlelastname,' ',patients.firstname,' ',patients.middlefirstname),
                                IF(medical_diary_days.medical_status_id = 3,
                                    CONCAT('Confirmada :', ' ',patients.lastname,' ',patients.middlelastname,' ',patients.firstname,' ',patients.middlefirstname),
                                    IF(medical_diary_days.medical_status_id = 4,
                                            'Facturada',
                                            'Cancelada')))) AS Subject"),
            DB::raw("IF(medical_diary_days.medical_status_id = 1, 
                            '#37B24D',
                            IF(medical_diary_days.medical_status_id = 2,
                                '#D8E926',
                                IF(medical_diary_days.medical_status_id = 3,
                                    '#09DBD4',
                                    IF(medical_diary_days.medical_status_id = 4,
                                            '#F44C01',
                                            '#7309DB')))) AS CategoryColor"),
            'assistance.id AS assistance_id',
            'start_hour AS StartTime',
            'finish_hour AS EndTime'
        )
            ->leftJoin('medical_diary', 'medical_diary_days.medical_diary_id', 'medical_diary.id')
            ->LeftJoin('patients', 'medical_diary_days.patient_id', 'patients.id')
            ->leftJoin('assistance', 'medical_diary.assistance_id', 'assistance.id')
            ->with(
                // 'days',
                'medical_status',
                'patient.identification_type',
                'contract',
                'briefcase',
                'medical_diary.office.pavilion.flat',
                'medical_diary.assistance.user',
                'services_briefcase.manual_price.manual',
                'services_briefcase.manual_price.procedure'
            )
            // ->whereNull('diary_days_id')
            ->orderBy('start_hour', 'ASC');

        if ($request->assistance_id && $request->assistance_id != 'null') {
            $MedicalDiaryDays->where('medical_diary.assistance_id', $request->assistance_id);
        }

        $res = 1;

        if ($request->procedure_id && $request->procedure_id != 'null') {
            $MedicalDiaryDays->where('medical_diary.procedure_id', $request->procedure_id);
            $res = 2;
        }

        if ($request->campus_id && $request->campus_id != 'null') {
            $MedicalDiaryDays->where('medical_diary.campus_id', $request->campus_id);
        }

        if ($request->user_id && $request->user_id != 'null') {
            $MedicalDiaryDays->where('assistance.user_id', $request->user_id)
                ->where([
                    ['medical_diary_days.admissions_id', '!=', null],
                    ['medical_diary_days.medical_status_id', '=', 4]
                ]);
        }


        if ($request->medical_status_id && $request->medical_status_id != 'null') {
            $MedicalDiaryDays->where('medical_diary_days.medical_status_id', $request->medical_status_id);
        } else {
            $MedicalDiaryDays->where([
                // ['medical_diary_days.medical_status_id', '!=', 1],
                // ['medical_diary_days.medical_status_id', '!=', 4],
                ['medical_diary_days.medical_status_id', '!=', 5]
            ]);
        }

        if ($request->scheduling && $request->scheduling != 'null') {
            $MedicalDiaryDays->where('medical_diary_days.medical_status_id', '!=', 1);
        }

        if ($request->init_date != 'null' && isset($request->init_date)) {
            $init_date = Carbon::parse($request->init_date)->startOfDay();
            $MedicalDiaryDays
                ->where('medical_diary_days.start_hour', '>=', $init_date);
        }

        if ($request->finish_date != 'null' && isset($request->finish_date)) {
            $finish_date = Carbon::parse($request->finish_date)->endOfDay();
            $MedicalDiaryDays->where('medical_diary_days.finish_hour', '<=', $finish_date);
        }

        if ($request->campus_id && $request->campus_id != 'null') {
            $MedicalDiaryDays->where('medical_diary.campus_id', $request->campus_id);
        }

        if ($request->_sort) {
            $MedicalDiaryDays->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            if (str_contains($request->search, ' ')) {
                $spl = explode(' ', $request->search);
                foreach ($spl as $element) {
                    $MedicalDiaryDays->where('patients.identification', 'like', '%' . $element . '%')
                        ->orWhere('patients.email', 'like', '%' . $element . '%')
                        ->orWhere('patients.firstname', 'like', '%' . $element . '%')
                        ->orWhere('patients.middlefirstname', 'like', '%' . $element . '%')
                        ->orWhere('patients.lastname', 'like', '%' . $element . '%')
                        ->Having('nombre_completo', 'like', '%' . $element . '%')
                        ->orWhere('patients.middlelastname', 'like', '%' . $element . '%');
                }
            } else {
                $MedicalDiaryDays->where(function ($query) use ($request) {
                    $query->where('patients.identification', 'like', '%' . $request->search . '%')
                        ->orWhere('patients.email', 'like', '%' . $request->search . '%')
                        ->orWhere('patients.firstname', 'like', '%' . $request->search . '%')
                        ->orWhere('patients.middlefirstname', 'like', '%' . $request->search . '%')
                        ->orWhere('patients.lastname', 'like', '%' . $request->search . '%')
                        ->Having('nombre_completo', 'like', '%' . $request->search . '%')
                        ->orWhere('patients.middlelastname', 'like', '%' . $request->search . '%');
                });
            }
        }

        if ($request->query("pagination", true) == "false") {
            $MedicalDiaryDays = $MedicalDiaryDays->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $MedicalDiaryDays = $MedicalDiaryDays->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Dias de agenda obtenidos exitosamente',
            'res' => $res,
            'data' => ['medical_diary_days' => $MedicalDiaryDays]
        ]);
    }


    public function store(MedicalDiaryDaysRequest $request): JsonResponse
    {
        $MedicalDiaryDays = new MedicalDiaryDays;
        $MedicalDiaryDays->name = $request->name;
        $MedicalDiaryDays->save();

        return response()->json([
            'status' => true,
            'message' => 'Dias de agenda creados exitosamente',
            'data' => ['medical_diary_days' => $MedicalDiaryDays->toArray()]
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function changeStatus(Request $request, int $id): JsonResponse
    {
        $now = new DateTime;
        // var_dump($now);
        $MedicalDiaryDays = MedicalDiaryDays::find($id);
        // var_dump($request->status_id);
        if ($request->status_id == 5) {

            $MedicalDiaryDays->medical_status_id = $request->status_id;
            $init_date = new DateTime($MedicalDiaryDays->start_hour);
            if ($init_date >= $now) {
                $Subsittute = new MedicalDiaryDays;
                $Subsittute->days_id = $MedicalDiaryDays->days_id;
                $Subsittute->medical_diary_id = $MedicalDiaryDays->medical_diary_id;
                $Subsittute->medical_status_id = 1;
                $Subsittute->start_hour = $MedicalDiaryDays->start_hour;
                $Subsittute->finish_hour = $MedicalDiaryDays->finish_hour;
                $Subsittute->save();
            }
        } else if ($request->status_id) {
            $MedicalDiaryDays->medical_status_id = $request->status_id;
        }
        $MedicalDiaryDays->save();


        return response()->json([
            'status' => true,
            'message' => 'Estado actualizado exitosamente',
            'data' => ['medical_diary_days' => $MedicalDiaryDays]
        ]);
    }

    /**
     * Generating PDF's, printing copay cash receipt
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function generateCashReceiptPDF(
        // Resquest $request, 
        int $id
    ): JsonResponse {

        $medical_date = MedicalDiaryDays::select('medical_diary_days.*')
            ->with(
                'copay_parameters',
                'patient.gender',
                'patient.identification_type',
                'medical_status',
                'contract.company',
                'briefcase.coverage',
                'services_briefcase.manual_price.procedure',
                'medical_diary.assistance.user',
                'days'
            )
            ->where('id', $id)
            ->first();

        $authorization = Authorization::select('authorization.*')
            ->with(
                'admissions.location.scope_of_attention',
                'admissions.patients',
                'admissions.regime',
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
                'medical_diary_days.ch_record'
            )
            ->where('medical_diary_days_id', $id)
            ->get()->toArray();

        //nombre de tipo de pago asociado al procedimiento
        $pay_name = $medical_date->copay_parameters->payment_type == 1 ? 'Cuota moderadora' : ($medical_date->copay_parameters->payment_type == 2 ? 'Copago' :  'Exento');
        //Valor pagado
        $pay_value = $medical_date->copay_value ? $medical_date->copay_value : 0;

        //Numero a letras
        $letter_value = $this->NumToLettersBill($pay_value);

        //fecha de generación
        $generate_date  = Carbon::now()->setTimezone('America/Bogota');

        //Nombre del ususairoo que genera
        $nombre_completo = User::select(
            'users.*',
            DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo'),
        )
            ->where('id', Auth::user()->id)
            ->first();

        //

        // $start = new DateTime($dateTimeStart);
        setlocale(LC_MONETARY, 'en_US.UTF-8');

        $html = view('layouts.cashreceipt', [
            'authorization' => $authorization,
            'medical_date' => $medical_date,
            'pay_name' => $pay_name,
            'letter_value' => $letter_value,
            'generate_date' =>  $generate_date,
            'user_name_complete' => $nombre_completo->nombre_completo,
            'pay_value' =>  $this->currencyTransform($pay_value)
        ])->render();

        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new PDF($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper([0, 0, 612.00, 396.00], 'vertical');
        $dompdf->render();
        $this->injectPageCount($dompdf);
        $file = $dompdf->output();

        $name = 'recibo_de_caja/Ambulatorio.pdf';

        Storage::disk('public')->put($name, $file);

        return response()->json([
            'status' => true,
            'message' => 'Factura generada exitosamente',
            'url' => asset('/storage' .  '/' . $name),
        ]);
    }

    private function currencyTransform($value): string
    {
        $millions = '';
        $millionsNum = 0;
        $thousands = '';
        $thousandsNum = 0;
        $hundreds = '';
        $hundredsNum = 0;
        if ($value >= 1000000) {
            $millions = floor($value / 1000000) . '.';
            $millionsNum = floor($value / 1000000);
            $thousands = floor(($value / 1000) - (floor($value / 1000000) * 1000)) . '.';
            $thousandsNum = floor(($value / 1000) - (floor($value / 1000000) * 1000));
        } else {
            if (floor($value / 1000) > 0) {
                $thousands = floor($value / 1000) . '.';
            }
            $thousandsNum = floor($value / 1000);
        }
        $hundreds = ($value - (floor($value / 1000) * 1000)) . '';
        $hundredsNum = ($value - (floor($value / 1000) * 1000));

        if ($millionsNum > 0) {
            if ($thousandsNum < 100 && $thousandsNum >= 10) {
                $thousands = '0' . $thousands;
            } else if ($thousandsNum < 10 && $thousandsNum >= 0) {
                $thousands = '00' . $thousands;
            }
        }
        if ($thousandsNum > 0 || $millionsNum > 0) {
            if ($hundredsNum < 100 && $hundredsNum >= 10) {
                $hundreds = '0' . $hundreds;
            } else if ($hundredsNum < 10 && $hundredsNum >= 0) {
                $hundreds = '00' . $hundreds;
            }
        }

        $Response = '$' . $millions . $thousands . $hundreds . '.00';

        return $Response;
    }

    /**
     * Injects page number on PDF
     * 
     * @param PDF $dompdf
     */
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

    /**
     * Converts a given number on his equivalent name in letters
     * 
     * @param int $value
     * @return String $res
     */
    public function NumToLettersBill(int $value)
    {
        $res = NumerosEnLetras::convertir($value, 'PESOS M CTE', false, 'Centavos', true);

        return $res;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $MedicalDiaryDays = MedicalDiaryDays::where('id', $id)
            ->with(
                'days',
                'medical_status',
                'patient.identification_type',
                'contract',
                'briefcase',
                'medical_diary.office.pavilion.flat',
                'medical_diary.assistance.user',
                'services_briefcase.manual_price.manual',
                'services_briefcase.manual_price.procedure'
            )
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Dias de agenda obtenidos exitosamente',
            'data' => ['medical_diary_days' => $MedicalDiaryDays]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MedicalDiaryDaysRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $myrequest = new Request();
        $procedure = ServicesBriefcase::select('services_briefcase.*')
            ->where('id', $request->service_briefcase_id)
            ->with(
                'manual_price.procedure'
            )->get()->first();

        $validate = MedicalDiaryDays::select('medical_diary_days.*')
            ->where([
                ['medical_diary_days.patient_id', '=',  $request->patient_id]
            ])->where(function ($query) use ($request) {
                $query
                    ->where('medical_diary_days.medical_status_id', 2)
                    ->orWhere('medical_diary_days.medical_status_id', 3);
            })->leftjoin('services_briefcase', 'medical_diary_days.services_briefcase_id', 'services_briefcase.id')
            ->leftjoin('manual_price', 'services_briefcase.manual_price_id', 'manual_price.id')
            ->where('manual_price.procedure_id', $procedure->manual_price->procedure_id)
            ->get()->toArray();


        $MedicalDiaryDays = MedicalDiaryDays::find($id);
        $MedicalDiaryDays->medical_status_id = $request->state_id;
        $MedicalDiaryDays->eps_id = $request->eps_id;
        $MedicalDiaryDays->contract_id = $request->contract_id;
        $MedicalDiaryDays->briefcase_id = $request->briefcase_id;
        $MedicalDiaryDays->services_briefcase_id = $request->service_briefcase_id;
        $MedicalDiaryDays->patient_id = $request->patient_id;
        $MedicalDiaryDays->copay_id = $request->copay_id;
        $MedicalDiaryDays->copay_value = $request->copay_value;
        $MedicalDiaryDays->is_telemedicine = $request->is_telemedicine;

        if($request->is_telemedicine != 0){
            $myrequest->setMethod('POST');
         $myrequest->attributes->add([
            'dateStart' => $MedicalDiaryDays->start_hour,
            'dateEnd' => $MedicalDiaryDays->finish_hour,
            'organizerEmail' => 'sistemashyl@healthandlife2022.onmicrosoft.com',
            'subject' => $MedicalDiaryDays->id      
        ]);
   

        $retCalculator = app('App\Http\Controllers\Admin\TeamsController')->createRoomTeams($myrequest,$MedicalDiaryDays->start_hour,$MedicalDiaryDays->finish_hour,'sistemashyl@healthandlife2022.onmicrosoft.com',$MedicalDiaryDays->id);
        $retCalculator = json_decode($retCalculator, true);
        $MedicalDiaryDays->url_teams = $retCalculator['joinWebUrl'];

        }
        $MedicalDiaryDays->save();


        return response()->json([
            'status' => true,
            'message' => 'Dia de agenda actualizados exitosamente',
            'data' => ['medical_diary_days' => $MedicalDiaryDays->get()->toArray()]
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
            $MedicalDiaryDays = MedicalDiaryDays::find($id);
            $MedicalDiaryDays->delete();

            return response()->json([
                'status' => true,
                'message' => 'Dia de agenda eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Dia de agenda esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
