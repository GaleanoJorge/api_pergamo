<?php

namespace App\Http\Controllers\Management;

use App\Models\BillUserActivity;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BillUserActivityRequest;
use Illuminate\Database\QueryException;
use App\Models\AccountReceivable;
use App\Models\Admissions;
use App\Models\AssignedManagementPlan;
use App\Models\Tariff;
use App\Models\Assistance;
use App\Models\Location;
use App\Models\ManagementPlan;
use App\Models\MinimumSalary;
use App\Models\NeighborhoodOrResidence;
use App\Models\Patient;
use Carbon\Carbon;

class BillUserActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse

    {
        $BillUserActivity = BillUserActivity::select();

        if ($request->_sort) {
            $BillUserActivity->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $BillUserActivity->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $BillUserActivity = $BillUserActivity->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $BillUserActivity = $BillUserActivity->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro con las actividades del usuario asociada exitosamente',
            'data' => ['bill_user_activity' => $BillUserActivity]
        ]);
    }


    public function store(BillUserActivityRequest $request): JsonResponse
    {
        $BillUserActivity = new BillUserActivity;
        $BillUserActivity->num_activity = $request->num_activity;
        $BillUserActivity->user_id = $request->user_id;
        $BillUserActivity->assigned_management_plan_id = $request->assigned_management_plan_id;
        $BillUserActivity->full_value = $request->full_value;
        $BillUserActivity->account_receivable_id = $request->account_receivable_id;
        $BillUserActivity->observation = $request->observation;
        $BillUserActivity->save();

        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro con las actividades del usuario creada exitosamente',
            'data' => ['bill_user_activity' => $BillUserActivity->toArray()]
        ]);
    }


    public function createMissedActivities(Request $request, int $year, int $mes, int $create_ar, int $create_bua): JsonResponse
    {
        if ($mes <= 0 || $mes >= 13) {
            return response()->json([
                'status' => false,
                'message' => 'El rango de meses debe ser entre 1 y 12',
                'data' => ['bill_user_activity' => []]
            ]);
        }

        $date_validate = Carbon::parse($year . '-' . $mes . '-01 00:00:00')->format('Y-m-d H:i:s');
        $date_validate2 = Carbon::parse($year . '-' . $mes . '-01 00:00:00')->addMonth()->format('Y-m-d H:i:s');

        $Amp = AssignedManagementPlan::select('assigned_management_plan.*')
            ->with(
                'management_plan',
                'ch_record',
            )
            ->leftJoin('bill_user_activity', 'bill_user_activity.assigned_management_plan_id', 'assigned_management_plan.id')
            ->leftJoin('management_plan', 'management_plan.id', 'assigned_management_plan.management_plan_id')
            ->where('assigned_management_plan.execution_date', '!=', '0000-00-00 00:00:00')
            ->whereNull('bill_user_activity.id')
            ->whereNotNull('management_plan.procedure_id')
            ->whereRaw("assigned_management_plan.execution_date < '" . $date_validate2 . "'")
            ->whereRaw("assigned_management_plan.execution_date >= '" . $date_validate . "'")
            ->groupBy('assigned_management_plan.id')
            ->get()->toArray();

        $aaa = 0;
        $bbb = 0;

        $MinimumSalary = MinimumSalary::where('year', $year)->get()->toArray();
        if (count($MinimumSalary) == 0) {
            return response()->json([
                'status' => false,
                'message' => 'No existe salario mínimo confirgurado para el año en curso',
                'data' => ['ch_record' => []],
            ]);
        }
        foreach ($Amp as $element) {
            $validate = null;
            $Assistance = Assistance::where('user_id', $element['user_id'])->get()->toArray();
            $validate = AccountReceivable::whereRaw("created_at >= '" . $date_validate . "'")->whereRaw("created_at < '" . $date_validate . "'")->where('user_id', '=', $element['ch_record'][count($element['ch_record']) - 1]['user_id'])->get()->toArray();
            if (!$validate) {
                $bbb++;
                $AccountReceivable = new AccountReceivable;
                $AccountReceivable->user_id = $element['user_id'];
                $AccountReceivable->status_bill_id = 1;
                $AccountReceivable->minimum_salary_id = $MinimumSalary[0]['id'];
                $AccountReceivable->created_at = $year . '-' . $mes . '-29 00:12:27';
                $AccountReceivable->updated_at = $year . '-' . $mes . '-29 00:12:27';
                if ($create_ar == 1) {
                    $AccountReceivable->save();
                }
            }

            $AssignedManagementPlan = AssignedManagementPlan::find($element['id']);
            $ManagementPlan = ManagementPlan::find($AssignedManagementPlan->management_plan_id);
            $admissions = Admissions::find($element['management_plan']['admissions_id']);
            $Location = Location::where('admissions_id', $admissions->id)->where('location.discharge_date', '=', '0000-00-00 00:00:00')->first();
            $patient = Patient::find($admissions->patient_id)->neighborhood_or_residence_id;
            $tariff = NeighborhoodOrResidence::find($patient)->pad_risk_id;

            $valuetariff = $this->getNotFailedTariff($tariff, $ManagementPlan, $Location, $request, $element['management_plan']['admissions_id'], $AssignedManagementPlan);

            if (count($valuetariff) > 0 && count($validate) > 0 || ($Assistance == 1 || $Assistance == 2 || $Assistance == 3)) {
                $procedure_id = $element['management_plan']['procedure_id'];
                $account_receivable_id = $validate[count($validate) - 1]['id'];
                $assigned_management_plan_id = $element['id'];
                $admissions_id = $element['management_plan']['admissions_id'];
                $tariff_id = ($Assistance == 1 || $Assistance == 2 || $Assistance == 3 ? 583 : $valuetariff[0]['id']);
                $ch_record_id = $element['ch_record'][count($element['ch_record']) - 1]['id'];

                $aaa++;

                $billActivity = new BillUserActivity;
                $billActivity->procedure_id = $procedure_id;
                $billActivity->account_receivable_id = $account_receivable_id;
                $billActivity->assigned_management_plan_id = $assigned_management_plan_id;
                $billActivity->admissions_id = $admissions_id;
                $billActivity->tariff_id = $tariff_id;
                $billActivity->ch_record_id = $ch_record_id;
                if ($create_bua) {
                    $billActivity->save();
                }
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro con las actividades del usuario creada exitosamente',
            'data' => ['assigneds' => count($Amp), 'activities' => $aaa, 'accounts' => $bbb]
        ]);
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
                    // definir cuando la atención es fallida
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
                // definir cuando la atención es fallida
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $BillUserActivity = BillUserActivity::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro con las actividades del usuario obtenido exitosamente',
            'data' => ['bill_user_activity' => $BillUserActivity]
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function getByAccountReceivable(Request $request, int $id): JsonResponse
    {
        $BillUserActivity = BillUserActivity::select('bill_user_activity.*')
            ->where('account_receivable_id', $id)
            ->with(
                'admissions',
                'procedure',
                'procedure.manual_price',
                'tariff',
                'assigned_management_plan',
                'assigned_management_plan.management_plan',
                'assigned_management_plan.management_plan.service_briefcase',
                'assigned_management_plan.management_plan.service_briefcase.manual_price',
                'assigned_management_plan.management_plan.admissions',
                'assigned_management_plan.management_plan.admissions.patients',
                'assigned_management_plan.management_plan.admissions.patients.identification_type',
            );

        if ($request->_sort) {
            $BillUserActivity->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $BillUserActivity->leftJoin('admissions', 'bill_user_activity.admissions_id', 'admissions.id')
                ->leftJoin('patients', 'admissions.patient_id', 'patients.id')
                ->leftJoin('services_briefcase', 'bill_user_activity.procedure_id', 'services_briefcase.id')
                ->leftJoin('manual_price', 'services_briefcase.manual_price_id', 'manual_price.id')
                ->leftJoin('procedure', 'manual_price.procedure_id', 'procedure.id');
            $BillUserActivity->where(function ($query) use ($request) {
                $query->where('patients.firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('bill_user_activity.observation', 'like', '%' . $request->search . '%')
                    ->orWhere('bill_user_activity.status', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.middlelastname', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.identification', 'like', '%' . $request->search . '%')
                    ->orWhere('manual_price.name', 'like', '%' . $request->search . '%')
                    ->orWhere('manual_price.own_code', 'like', '%' . $request->search . '%')
                    ->orWhere('procedure.name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $BillUserActivity = $BillUserActivity->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $BillUserActivity = $BillUserActivity->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro con las actividades del usuario actualizado exitosamente',
            'data' => ['bill_user_activity' => $BillUserActivity]
        ]);
    }

    public function getByPatient(Request $request, int $patient_id)
    {
        $BillUserActivity = BillUserActivity::select('bill_user_activity.*')
            ->with(
                'procedure',
                'procedure.manual_price',
                'tariff',
                'account_receivable',
                'account_receivable.user',
                'account_receivable.user.identification_type',
                'assigned_management_plan',
                'assigned_management_plan.management_plan',
                'assigned_management_plan.management_plan.admissions',
                'assigned_management_plan.management_plan.admissions.patients',
                'assigned_management_plan.management_plan.admissions.patients.identification_type',
            )
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'bill_user_activity.procedure_id')
            ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
            ->leftJoin('account_receivable', 'account_receivable.id', 'bill_user_activity.account_receivable_id')
            ->leftJoin('users', 'users.id', '=', 'account_receivable.user_id')
            ->leftJoin('admissions', 'admissions.id', 'bill_user_activity.admissions_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('assigned_management_plan', 'assigned_management_plan.id', 'bill_user_activity.assigned_management_plan_id')
            ->where('patients.id', $patient_id)
            ->groupBy('bill_user_activity.id')
            ->orderBy('assigned_management_plan.execution_date', 'DESC');

        if ($request->search) {
            $BillUserActivity->where(function ($query) use ($request) {
                $query->where('users.firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('users.middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('users.lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('users.middlelastname', 'like', '%' . $request->search . '%')
                    ->orWhere('users.identification', 'like', '%' . $request->search . '%')
                    ->orWhere('manual_price.name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $BillUserActivity = $BillUserActivity->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $BillUserActivity = $BillUserActivity->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro con las actividades del usuario actualizado exitosamente',
            'data' => ['bill_user_activity' => $BillUserActivity]
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
        $BillUserActivity = BillUserActivity::where('id', $id)->with('procedure', 'procedure.manual_price', 'tariff')->get()->first();
        $BillUserActivity->status = $request->status;
        $BillUserActivity->observation = $request->observation;
        $BillUserActivity->save();
        if ($request->status == 'APROBADO') {
            $tariff = Tariff::where('id', $BillUserActivity->tariff_id)->get()->first();
            $AccountReceivable = AccountReceivable::find($BillUserActivity->account_receivable_id);
            $AccountReceivable->gross_value_activities = $AccountReceivable->gross_value_activities + $tariff->amount;
            $AccountReceivable->save();
            $AssignedManagementPlan = AssignedManagementPlan::find($BillUserActivity->assigned_management_plan_id);
            $AssignedManagementPlan->approved = 1;
            $AssignedManagementPlan->save();
        } else if ($request->status == 'RECHAZADO') {
            $AssignedManagementPlan = AssignedManagementPlan::find($BillUserActivity->assigned_management_plan_id);
            $AssignedManagementPlan->redo = 0 + Carbon::now()->addHours(48)->format('YmdHis');
            $AssignedManagementPlan->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Estado cambiado exitosamente',
            'data' => ['bill_user_activity' => $BillUserActivity]
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
            $BillUserActivity = BillUserActivity::find($id);
            $BillUserActivity->delete();

            return response()->json([
                'status' => true,
                'message' => 'Cuenta de cobro con las actividades del usuario eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Cuenta de cobro con las actividades del usuario esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
