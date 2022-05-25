<?php

namespace App\Http\Controllers\Management;

use App\Models\ChRecord;
use Dompdf\Dompdf as PDF;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\AssignedManagementPlan;
use App\Models\Assistance;
use App\Models\Locality;
use App\Models\LocationCapacity;
use App\Models\AccountReceivable;
use App\Models\Admissions;
use App\Models\Patient;
use App\Models\Location;
use App\Models\ManagementPlan;
use App\Models\Tariff;
use App\Models\BillUserActivity;
use App\Models\MinimumSalary;
use Illuminate\Support\Facades\Storage;


use App\Models\NeighborhoodOrResidence;
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
        $ChRecord = ChRecord::with('user', 'admissions', 'admissions.patients');

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
        $ChRecord = ChRecord::with('user', 'admissions', 'admissions.patients')
            ->where('admissions_id', $id)->where('assigned_management_plan_id', $id2);

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
        $html = view('mails.closingEvent', [
            'name' => 'prueba'
        ])->render();

        $dompdf = new PDF();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('Carta', 'landscape');
        $dompdf->render();
        $this->injectPageCount($dompdf);
        $file = $dompdf->output();

        $name = 'prueba.pdf';

        Storage::disk('public')->put($name, $file);

        return response()->json([
            'status' => true,
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

        $valuetariff = Tariff::where('pad_risk_id', $tariff)
            ->where('phone_consult', $ManagementPlan->phone_consult)
            ->where('type_of_attention_id', $ManagementPlan->type_of_attention_id)
            ->where('program_id', $Location->program_id);
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
                $billActivity->value = $valuetariff[0]['amount'];
                $billActivity->ch_record_id = $id;
                $billActivity->save();
            } else {
                $AccountReceivable = AccountReceivable::find($validate[0]['id']);
                $billActivity = new BillUserActivity;
                $billActivity->procedure_id = $ManagementPlan->procedure_id;
                $billActivity->account_receivable_id = $validate[0]['id'];
                $billActivity->admissions_id = $admissions_id;
                $billActivity->value = $valuetariff[0]['amount'];
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
