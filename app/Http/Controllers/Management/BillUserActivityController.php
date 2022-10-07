<?php

namespace App\Http\Controllers\Management;

use App\Models\BillUserActivity;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BillUserActivityRequest;
use Illuminate\Database\QueryException;
use App\Models\AccountReceivable;
use App\Models\AssignedManagementPlan;
use App\Models\Tariff;
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
        $BillUserActivity = BillUserActivity::where('account_receivable_id', $id)
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
                    ->orWhere('manual_price.name', 'like', '%' . $request->search . '%')
                    ;
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
