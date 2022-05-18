<?php

namespace App\Http\Controllers\Management;

use App\Models\AccountReceivable;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AccountReceivableRequest;
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
use Dompdf\Dompdf as PDF;

class AccountReceivableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse

    {
        $AccountReceivable = AccountReceivable::with('user', 'status_bill', 'minimum_salary');

        if ($request->_sort) {
            $AccountReceivable->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $AccountReceivable->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->gloss_ambit_id) {
            $AccountReceivable->where('gloss_ambit_id', $request->gloss_ambit_id);
        }
        if ($request->status_bill_id) {
            $AccountReceivable->where('status_bill_id', $request->status_bill_id);
        }
        if ($request->campus_id) {
            $AccountReceivable->where('campus_id', $request->campus_id);
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
        $ancualDate = Carbon::parse('2022-06-01 14:44:40')->format('Ymd');
        // $ancualDate = Carbon::now()->format('Ymd');
        $AccountReceivable = AccountReceivable::with('user', 'status_bill', 'minimum_salary')
            ->select(
                'account_receivable.*',
                DB::raw('IF(source_retention.id,1,0) as has_retention'),
                'assistance.id AS assistance_id',
                DB::raw("IF(account_receivable.created_at <= " . $LastDayMonth . ",IF(" . $LastWeekOfMonth . "<=" . $ancualDate . ",1,0),0) AS edit_date"),
                DB::raw("IF(" . $ancualDate . ">=" . $LastDayMonth . ",1,0) AS show_file"),
            )
            ->LeftJoin('source_retention', 'source_retention.account_receivable_id', 'account_receivable.id')
            ->LeftJoin('assistance', 'assistance.user_id', 'account_receivable.user_id')
            ->groupBy('account_receivable.id');

        if ($user_id != 0) {
            $AccountReceivable->where('account_receivable.user_id', $user_id);
        }

        if ($request->_sort) {
            $AccountReceivable->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $AccountReceivable->where('name', 'like', '%' . $request->search . '%');
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
        $AccountReceivable->gross_value_activities = $request->gross_value_activities;
        $AccountReceivable->net_value_activities = $request->net_value_activities;
        $AccountReceivable->user_id = $request->user_id;
        $AccountReceivable->status_bill_id = $request->status_bill_id;
        $AccountReceivable->minimum_salary_id = $request->minimum_salary_id;
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
    public function generatePdf(int $id): JsonResponse
    {
        $AccountReceivable = AccountReceivable::find($id)->first();
        $User = User::where('id', $AccountReceivable->user_id)->first();
        $IdentificationType = IdentificationType::where('id', $User->identification_type_id)->first();
        $UserRole = UserRole::where('user_id', $User->id)->first();
        $Role = Role::where('id', $UserRole->role_id)->first();
        $FinancialData = FinancialData::with('bank', 'account_type')->where('user_id', $User->id)->first()->toArray();

        if (!$FinancialData) {
            return response()->json([
                'status' => false,
                'message' => 'No se encontraron datos financieros para el usuario',
                'data' => []
            ]);
        }

        $formatterES = 'valor';
        $LastDayOfMonthFromAccount = Carbon::parse($AccountReceivable->created_at)->endOfMonth()->day;
        $AccountYear = Carbon::parse($AccountReceivable->created_at)->year;
        $AccountMonth = $this->getMonthString(Carbon::parse($AccountReceivable->created_at)->month);

        $full_name = strtoupper($User->firstname . ' ' . $User->middlefirstname . ' ' . $User->lastname . ' ' . $User->middlelastname);
        $rut_number = $FinancialData['rut'];
        $doc_type = strtoupper($IdentificationType->name);
        $doc_number = $User->identification;
        $net_value = $AccountReceivable->net_value_activities < 1000000 ? floor($AccountReceivable->net_value_activities / 1000) . '.' . ($AccountReceivable->net_value_activities - (floor($AccountReceivable->net_value_activities / 1000) * 1000)) :
            floor($AccountReceivable->net_value_activities / 1000000) . '.' . floor(($AccountReceivable->net_value_activities / 1000) - (floor($AccountReceivable->net_value_activities / 1000000) * 1000)) . '.' . ($AccountReceivable->net_value_activities - (floor($AccountReceivable->net_value_activities / 1000) * 1000));
        $account_type = strtoupper($FinancialData['account_type']['name']);
        $bank = strtoupper($FinancialData['bank']['name']);
        $account_number = $FinancialData['account_number'];
        $role = strtoupper($Role->name);
        $address = strtoupper($User->residence_address);
        $phone = $User->phone;
        $email = $User->email;

        $html = view('layouts.receivable', [
            'AccountYear' => $AccountYear,
            'AccountMonth' => $AccountMonth,
            'day' => $LastDayOfMonthFromAccount,
            'month' => $AccountMonth,
            'year' => $AccountYear,
            'full_name' => $full_name,
            'rut_number' => $rut_number,
            'doc_type' => $doc_type,
            'doc_number' => $doc_number,
            'net_value' => $net_value,
            'formatterES' => $formatterES,
            'account_type' => $account_type,
            'bank' => $bank,
            'account_number' => $account_number,
            'role' => $role,
            'address' => $address,
            'phone' => $phone,
            'email' => $email,
        ])->render();

        $dompdf = new PDF();
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
}
