<?php

namespace App\Http\Controllers\Management;

use App\Actions\Transform\NumerosEnLetras;
use App\Models\AccountReceivable;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AccountReceivableRequest;
use App\Models\Assistance;
use App\Models\BillUserActivity;
use App\Models\FinancialData;
use App\Models\IdentificationType;
use App\Models\MinimumSalary;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Dompdf\Dompdf as PDF;
use Dompdf\Options;

class AccountReceivableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse

    {
        $AccountReceivable = AccountReceivable::with('user', 'status_bill', 'minimum_salary')
            ->leftJoin('users', 'users.id', '=', 'account_receivable.user_id');

        if ($request->_sort) {
            $AccountReceivable->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $AccountReceivable->where(function ($query) use ($request) {
                $query->where('users.firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('users.middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('users.lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('users.middlelastname', 'like', '%' . $request->search . '%')
                    ->orWhere('users.identification', 'like', '%' . $request->search . '%')
                    ->orWhere('account_receivable.observation', 'like', '%' . $request->search . '%');
            });
        }
        if ($request->status_bill_id) {
            $AccountReceivable->where('account_receivable.status_bill_id', $request->status_bill_id);
        }

        if ($request->query("pagination", true) == "false") {
            $AccountReceivable = $AccountReceivable->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $AccountReceivable = $AccountReceivable->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro asociada exitosamente',
            'data' => ['account_receivable' => $AccountReceivable]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getByUser(Request $request, int $user_id): JsonResponse

    {
        $LastWeekOfMonth = Carbon::now()->endOfMonth()->subDays(7)->format('Ymd');
        $LastDayMonth = Carbon::now()->endOfMonth()->format('Ymd');
        // $ancualDate = Carbon::parse('2022-06-01 14:44:40')->format('Ymd');
        $ancualDate = Carbon::now()->format('Ymd');
        $AccountReceivable = AccountReceivable::with('user', 'status_bill', 'minimum_salary')
            ->select(
                'account_receivable.*',
                DB::raw('IF(source_retention.id,1,0) as has_retention'),
                'assistance.id AS assistance_id',
                DB::raw("IF(account_receivable.created_at <= " . $LastDayMonth . ",IF(" . $LastWeekOfMonth . "<=" . $ancualDate . ",1,0),0) AS edit_date"),
                // DB::raw("IF(" . $ancualDate . ">=" . $LastDayMonth . " OR users.status_id = 2,1,0) AS show_file"), // VALIDACIÓN PARA RESTRINGIR CTA DE COBRO
                DB::raw("1 AS show_file"), // PRUEBA PARA GENERAR PDF CTA DE COBRO
            )
            ->LeftJoin('source_retention', 'source_retention.account_receivable_id', 'account_receivable.id')
            ->LeftJoin('assistance', 'assistance.user_id', 'account_receivable.user_id')
            ->leftJoin('users', 'users.id', '=', 'account_receivable.user_id');

        if ($user_id != 0) {
            $AccountReceivable->groupBy('account_receivable.id');
            $AccountReceivable->where('account_receivable.user_id', $user_id);
            $AccountReceivable->orderBy('account_receivable.id', 'desc');
        } else {
            $AccountReceivable->groupBy('users.id');
        }

        if ($request->_sort) {
            $AccountReceivable->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $AccountReceivable->where(function ($query) use ($request) {
                $query->where('users.firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('users.middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('users.lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('users.middlelastname', 'like', '%' . $request->search . '%')
                    ->orWhere('users.identification', 'like', '%' . $request->search . '%')
                    ->orWhere('account_receivable.observation', 'like', '%' . $request->search . '%');
            });
        }


        if ($request->query("pagination", true) == "false") {
            $AccountReceivable = $AccountReceivable->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $AccountReceivable = $AccountReceivable->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro asociada exitosamente',
            'data' => ['account_receivable' => $AccountReceivable]
        ]);
    }



    public function store(AccountReceivableRequest $request): JsonResponse
    {
        $AccountReceivable = new AccountReceivable;
        $AccountReceivable->file_payment = $request->file_payment;
        $AccountReceivable->observation = $request->observation;
        $AccountReceivable->gross_value_activities = $request->gross_value_activities;
        $AccountReceivable->net_value_activities = $request->net_value_activities;
        $AccountReceivable->user_id = $request->user_id;
        $AccountReceivable->status_bill_id = $request->status_bill_id;
        $AccountReceivable->minimum_salary_id = MinimumSalary::select()->orderBy('year', 'desc')->first();
        $AccountReceivable->save();

        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro creada exitosamente',
            'data' => ['account_receivable' => $AccountReceivable->toArray()]
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
        $AccountReceivable = AccountReceivable::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro obtenido exitosamente',
            'data' => ['account_receivable' => $AccountReceivable]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AccountReceivableRequest $request, int $id): JsonResponse
    {
        $AccountReceivable = AccountReceivable::find($id);
        $AccountReceivable->file_payment = $request->file_payment;
        $AccountReceivable->observation = $request->observation;
        $AccountReceivable->gross_value_activities = $request->gross_value_activities;
        $AccountReceivable->net_value_activities = $request->net_value_activities;
        $AccountReceivable->user_id = $request->user_id;
        $AccountReceivable->status_bill_id = $request->status_bill_id;
        $AccountReceivable->minimum_salary_id = $request->minimum_salary_id;

        if ($request->status_bill_id == 2) {
            $AccountReceivable->observation = null;
        }

        $AccountReceivable->save();

        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro actualizado exitosamente',
            'data' => ['account_receivable' => $AccountReceivable]
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function saveFile(Request $request, int $id): JsonResponse
    {
        $AccountReceivable = AccountReceivable::find($id);

        if ($request->file('file')) {
            $path = Storage::disk('public')->put('account_receivable', $request->file('file'));
            $AccountReceivable->file_payment = $path;
            if ($AccountReceivable->status_bill_id == 5) {
                $AccountReceivable->status_bill_id = 6;
            }
        }
        $AccountReceivable->save();

        return response()->json([
            'status' => true,
            'message' => 'Planilla cargada exitosamente',
            'data' => ['account_receivable' => $AccountReceivable]
        ]);
    }

    /**
     * Generate PDF file with all information of the account receivable
     * 
     * @param  int  $id
     */
    public function generatePdf(Request $request, int $id): JsonResponse
    {
        $UserDownload = User::select(
            'users.*',
            DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo')
        )
            ->where('id', $request->user_id)->get()->first();
        $AccountReceivable = AccountReceivable::where('id', $id)->first();
        $User = User::where('id', $AccountReceivable->user_id)->first();
        $IdentificationType = IdentificationType::where('id', $User->identification_type_id)->first();
        $UserRole = UserRole::where('user_id', $User->id)->first();
        $Assistance = Assistance::where('user_id', $User->id)->first();
        $Role = Role::where('id', $UserRole->role_id)->first();
        $FinancialData = FinancialData::with('bank', 'account_type')->where('user_id', $User->id)->first();

        $Activities = BillUserActivity::select(
            'manual_price.name AS name',
            DB::raw('COUNT(bill_user_activity.id) AS quantity'),
            DB::raw('SUM(tariff.amount) AS amount'),
        )
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'bill_user_activity.procedure_id')
            ->leftJoin('tariff', 'tariff.id', 'bill_user_activity.tariff_id')
            ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
            ->where('bill_user_activity.account_receivable_id', $id)
            ->where('bill_user_activity.status', 'APROBADO')
            ->groupBy('services_briefcase.id')
            ->get()->toArray();

        for ($i = 0; $i < count($Activities); $i++) {
            $Activities[$i]['amount'] = $this->currencyTransform($Activities[$i]['amount']);
        }

        if (!$FinancialData) {
            return response()->json([
                'status' => false,
                'message' => 'No se encontraron datos financieros para el usuario',
                'data' => []
            ]);
        } else {
            $FinancialData = $FinancialData->toArray();
        }

        $LastDayOfMonthFromAccount = Carbon::parse($AccountReceivable->created_at)->endOfMonth()->day;
        $AccountYear = Carbon::parse($AccountReceivable->created_at)->year;
        $AccountMonth = $this->getMonthString(Carbon::parse($AccountReceivable->created_at)->month);

        $ExpiracyDate = Carbon::parse($AccountReceivable->created_at)->endOfMonth()->addDays(90);
        $ExpiracyDay = $ExpiracyDate->day;
        $ExpiracyDateYear = $ExpiracyDate->year;
        $ExpiracyDateMonth = $this->getMonthString($ExpiracyDate->month);

        $full_name = strtoupper($User->firstname . ' ' . $User->middlefirstname . ' ' . $User->lastname . ' ' . $User->middlelastname);
        $rut_number = $FinancialData['rut'];
        $doc_type = strtoupper($IdentificationType->code);
        $doc_number = $User->identification;
        if (!$AccountReceivable->net_value_activities) {
            $AccountReceivable->net_value_activities = 0;
        }
        $retCalculator = app('App\Http\Controllers\Management\SourceRetentionController')->getByAccountReceivableId($request, $id);
        $retCalculator = json_decode($retCalculator->content(), true)['data']['source_retention'];
        $consecutive = $AccountReceivable->id;
        $gross_value = $this->fillCharacters($this->currencyTransform($AccountReceivable->gross_value_activities));
        $net_value = $this->fillCharacters($this->currencyTransform($AccountReceivable->net_value_activities));
        $letter_value = $this->NumToLetters($AccountReceivable->net_value_activities);
        $account_type = strtoupper($FinancialData['account_type']['name']);
        $bank = strtoupper($FinancialData['bank']['name'] . ' - ' . $FinancialData['bank']['code']);
        $account_number = $FinancialData['account_number'];
        $role = strtoupper($Role->name);
        $address = strtoupper($User->residence_address);
        $phone = $User->phone;
        $email = $User->email;
        $sign = $Assistance->file_firm;
        $nombre_completo = $UserDownload->nombre_completo;

        $generate_date = Carbon::now()->format('d-m-Y H:i:s');

        $html = view('layouts.receivable', [
            'consecutive' => $consecutive,
            'AccountYear' => $AccountYear,
            'AccountMonth' => $AccountMonth,
            'day' => $LastDayOfMonthFromAccount,
            'month' => $AccountMonth,
            'year' => $AccountYear,
            'ExpiracyDay' => $ExpiracyDay,
            'ExpiracyDateYear' => $ExpiracyDateYear,
            'ExpiracyDateMonth' => $ExpiracyDateMonth,
            'full_name' => $full_name,
            'rut_number' => $rut_number,
            'doc_type' => $doc_type,
            'doc_number' => $doc_number,
            'gross_value' => $gross_value,
            'ica_value' => $this->fillCharacters($this->currencyTransform($retCalculator['Rete_ica'])),
            'source_value' => $this->fillCharacters($this->currencyTransform($retCalculator['Retencion_por_aplicar'])),
            'net_value' => $net_value,
            'letter_value' => $letter_value,
            'account_type' => $account_type,
            'bank' => $bank,
            'account_number' => $account_number,
            'role' => $role,
            'address' => $address,
            'phone' => $phone,
            'email' => $email,
            'sign' => $sign,
            'generate_date' => $generate_date,
            'nombre_completo' => $nombre_completo,
            'Activities' => $Activities,
        ])->render();

        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new PDF($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('Carta', 'vertical');
        $dompdf->render();
        $this->injectPageCount($dompdf);
        $file = $dompdf->output();

        $name = 'cuenta_cobro/' . $User->identification . '.pdf';

        Storage::disk('public')->put($name, $file);

        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro generada exitosamente',
            'url' => asset('/storage' .  '/' . $name),
        ]);
    }

    public function fillCharacters(string $value): string
    {
        $Response = $value;
        while (Str::length($Response) < 16) {
            $Response = '_' . $Response;
        }

        return $Response;
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

    private function getMonthString(int $month)
    {
        if ($month == 1) {
            $month = 'ENERO';
        } elseif ($month == 2) {
            $month = 'FEBRERO';
        } elseif ($month == 3) {
            $month = 'MARZO';
        } elseif ($month == 4) {
            $month = 'ABRIL';
        } elseif ($month == 5) {
            $month = 'MAYO';
        } elseif ($month == 6) {
            $month = 'JUNIO';
        } elseif ($month == 7) {
            $month = 'JULIO';
        } elseif ($month == 8) {
            $month = 'AGOSTO';
        } elseif ($month == 9) {
            $month = 'SEPTIEMBRE';
        } elseif ($month == 10) {
            $month = 'OCTUBRE';
        } elseif ($month == 11) {
            $month = 'NOVIEMBRE';
        } elseif ($month == 12) {
            $month = 'DICIEMBRE';
        }
        return $month;
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
            $AccountReceivable = AccountReceivable::find($id);
            $AccountReceivable->delete();

            return response()->json([
                'status' => true,
                'message' => 'Cuenta de cobro eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Cuenta de cobro esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }

    public function NumToLetters(int $value)
    {
        $lengt = 45;
        $res[0] = NumerosEnLetras::convertir($value, 'PESOS M CTE', false, 'Centavos', true);
        if (strlen($res[0]) > $lengt) {
            $prov = substr($res[0], $lengt);
            $pos = strpos($prov, " ");
            $prov = substr($prov, $pos + 1);
            $res[0] = substr($res[0], 0, $lengt + $pos);
            if (strlen($prov) > $lengt) {
                $prov2 = substr($prov, $lengt);
                $pos = strpos($prov2, " ");
                $prov2 = substr($prov2, $pos + 1);
                $res[1] = substr($prov, 0, $lengt + $pos);
                $res[2] = $prov2;
            } else {
                $res[1] = $prov;
            }
        }
        return $res;
    }
}
