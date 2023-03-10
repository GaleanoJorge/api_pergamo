<?php

namespace App\Http\Controllers\Management;

use App\Models\AssignedManagementPlan;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\LogAssignedManagementPlan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AssignedManagementPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $assigned_management_plan = AssignedManagementPlan::select('assigned_management_plan.*')
            ->with('user', 'management_plan');

        if ($request->assigned_management_plan_id) {
            $assigned_management_plan->where('assigned_management_plan.id', $request->assigned_management_plan_id)
                ->with(
                    'management_plan.management_procedure.services_briefcase.manual_price',
                );
        }

        if ($request->_sort) {
            $assigned_management_plan->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $assigned_management_plan->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $assigned_management_plan = $assigned_management_plan->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $assigned_management_plan = $assigned_management_plan->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Plan asignado obtenido exitosamente',
            'data' => ['assigned_management_plan' => $assigned_management_plan]
        ]);
    }

    /**
     * Display a listing of the resource
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getByPah(Request $request, int $campus_id, int $flat_id, int $pavilion_id, int $bed_id): JsonResponse
    {
        $assigned_management_plan = AssignedManagementPlan::select('assigned_management_plan.*')
            ->with(
                'management_plan',
                'management_plan.service_briefcase',
                'management_plan.service_briefcase.manual_price',
                'management_plan.service_briefcase.manual_price.product',
                'management_plan.service_briefcase.manual_price.product.drug_concentration',
                'management_plan.service_briefcase.manual_price.product.measurement_units',
                'management_plan.service_briefcase.manual_price.product.multidose_concentration',
                'management_plan.ch_formulation',
                'management_plan.admissions',
                'management_plan.admissions.patients',
                'management_plan.admissions.patients.identification_type',
                'management_plan.admissions.location',
                'management_plan.admissions.location.flat',
                'management_plan.admissions.location.pavilion',
                'management_plan.admissions.location.bed',
            )
            ->leftJoin('management_plan', 'management_plan.id', 'assigned_management_plan.management_plan_id')
            ->leftJoin('admissions', 'admissions.id', 'management_plan.admissions_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('location', 'location.admissions_id', 'admissions.id')
            ->where('location.admission_route_id', 1)
            ->where('admissions.discharge_date', '=', '0000-00-00 00:00:00')
            ->where('location.discharge_date', '=', '0000-00-00 00:00:00')
            ->groupBy('assigned_management_plan.id')
            ->orderBy('assigned_management_plan.start_date', 'ASC')
            ->orderBy('assigned_management_plan.start_hour', 'ASC')
            ;

        if ($request->start_date) {
            $assigned_management_plan->where('assigned_management_plan.start_date', '>=', $request->start_date);
        }

        if ($request->finish_date) {
            $assigned_management_plan->where('assigned_management_plan.start_date', '<=', $request->finish_date);
        }

        if ($campus_id != 0) {
            $assigned_management_plan->where('admissions.campus_id', $campus_id);
        }

        if ($flat_id != 0) {
            $assigned_management_plan->where('location.flat_id', $flat_id);
        }

        if ($pavilion_id != 0) {
            $assigned_management_plan->where('location.pavilion_id', $pavilion_id);
        }

        if ($bed_id != 0) {
            $assigned_management_plan->where('location.bed_id', $bed_id);
        }

        if ($request->search) {
            $assigned_management_plan->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $assigned_management_plan = $assigned_management_plan->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $assigned_management_plan = $assigned_management_plan->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Plan asignado obtenido exitosamente',
            'data' => ['assigned_management_plan' => $assigned_management_plan]
        ]);
    }


    /**
     * Display a listing of the resource
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function indexPacientByManagement(Request $request, int $managementId, int $userId): JsonResponse
    {
        $dateNow = Carbon::now()->format('YmdHis');
        $assigned_management_plan = AssignedManagementPlan::select(
            'assigned_management_plan.*',
            DB::raw('IF(' . $dateNow . ' <= assigned_management_plan.redo,1,0) AS allow_redo'),
            DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo'),
        )
            ->with('user', 'management_plan', 'ch_record')
            ->leftJoin('management_plan', 'management_plan.id', 'assigned_management_plan.management_plan_id')
            ->leftJoin('users', 'users.id', 'assigned_management_plan.user_id')
            ->groupBy('assigned_management_plan.id');
        if ($userId == 0) {
            $assigned_management_plan->where('assigned_management_plan.management_plan_id', $managementId);
        } else {
            if ($request->patient) {
                $assigned_management_plan->where('assigned_management_plan.user_id', $userId)
                    // ->where('management_plan.admissions_id', $request->patient)
                    ->where('assigned_management_plan.management_plan_id', $managementId);
            } else {
                $assigned_management_plan->where('assigned_management_plan.user_id', $userId);
            }
        }

        if ($request->_sort) {
            $assigned_management_plan->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $assigned_management_plan->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $assigned_management_plan = $assigned_management_plan->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $assigned_management_plan = $assigned_management_plan->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Plan de manejo asignado exitosamente',
            'data' => ['assigned_management_plan' => $assigned_management_plan]
        ]);
    }

    public function getByUserPatient(Request $request, int $user_id, int $patient_id)
    {
        $dateNow = Carbon::now()->format('YmdHis');
        $assigned_management_plan = AssignedManagementPlan::select(
            'assigned_management_plan.*',
            DB::raw('IF(' . $dateNow . ' <= assigned_management_plan.redo,1,0) AS allow_redo'),
            DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo'),
        )
            ->with(
                'user',
                'management_plan',
                'management_plan.type_of_attention',
                'management_plan.service_briefcase',
                'management_plan.service_briefcase.manual_price',
                'management_plan.procedure',
                'management_plan.procedure.manual_price',
                'ch_record',
            )
            ->leftJoin('management_plan', 'management_plan.id', 'assigned_management_plan.management_plan_id')
            ->leftJoin('admissions', 'admissions.id', 'management_plan.admissions_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('users', 'users.id', 'assigned_management_plan.user_id')
            ->where('assigned_management_plan.user_id', $user_id)
            ->where('patients.id', $patient_id)
            ->where(function ($query) {
                $query->where('assigned_management_plan.execution_date', '=', "0000-00-00 00:00:00")
                    ->orWhere('assigned_management_plan.redo', '>=', Carbon::now()->format('YmdHis'))
                    ->when('assigned_management_plan.start_hour != "00:00:00"', function ($q) {
                        $q->where('assigned_management_plan.start_hour', '<=', Carbon::now()->format('H:i:s'))
                            ->where('assigned_management_plan.finish_hour', '>=', Carbon::now()->format('H:i:s'))
                            ->where('assigned_management_plan.execution_date', '=', "0000-00-00 00:00:00");
                    });
            })
            ->where('assigned_management_plan.start_date', '<=', Carbon::now()->format('Y-m-d'))
            ->where('assigned_management_plan.finish_date', '>=', Carbon::now()->format('Y-m-d'))
            ->orderBy('assigned_management_plan.finish_date', 'ASC')
            ->orderBy('assigned_management_plan.start_hour', 'ASC')
            ->groupBy('assigned_management_plan.id');

        if ($request->management_plan_id) {
            $assigned_management_plan->where('assigned_management_plan.management_plan_id', $request->management_plan_id);
        }

        if ($request->query("pagination", true) == "false") {
            $assigned_management_plan = $assigned_management_plan->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $assigned_management_plan = $assigned_management_plan->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Plan de manejo asignado exitosamente',
            'data' => ['assigned_management_plan' => $assigned_management_plan]
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $AssignedManagementPlan = new AssignedManagementPlan;
        $AssignedManagementPlan->start_date = $request->start_date;
        $AssignedManagementPlan->finish_date = $request->finish_date;
        $AssignedManagementPlan->user_id = $request->user_id;
        $AssignedManagementPlan->redo = $request->redo;
        $AssignedManagementPlan->approved = $request->approved;
        $AssignedManagementPlan->execution_date = $request->execution_date;
        $AssignedManagementPlan->management_plan_id = $request->management_plan_id;
        $AssignedManagementPlan->save();


        return response()->json([
            'status' => true,
            'message' => 'Plan creado exitosamente',
            'data' => ['assigned_management_plan' => $AssignedManagementPlan->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        $AssignedManagementPlan = AssignedManagementPlan::where('id', $id)
            ->get()
            ->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Plan obtenida exitosamente',
            'data' => ['assigned_management_plan' => $AssignedManagementPlan]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $AssignedManagementPlan = AssignedManagementPlan::find($id);
        $LogAssignedManagementPlan = new LogAssignedManagementPlan;
        $LogAssignedManagementPlan->assigned_management_plan_id = $AssignedManagementPlan->id;
        $LogAssignedManagementPlan->user_id = Auth::user()->id;
        $LogAssignedManagementPlan->i_start_date = $AssignedManagementPlan->start_date;
        $LogAssignedManagementPlan->i_finish_date = $AssignedManagementPlan->finish_date;
        $LogAssignedManagementPlan->i_user_id = $AssignedManagementPlan->user_id;
        $LogAssignedManagementPlan->i_start_hour = $AssignedManagementPlan->start_hour;
        $LogAssignedManagementPlan->i_finish_hour = $AssignedManagementPlan->finish_hour;

        if ($request->type_of_attention_id == 17) {
            $AssignedManagementPlan->start_date = $request->start_date;
            $AssignedManagementPlan->finish_date = $request->start_date;
            $AssignedManagementPlan->user_id = $request->user_id;
            $AssignedManagementPlan->start_hour = $request->start_hour;
            $AssignedManagementPlan->finish_hour = $request->finish_hour;
        } else if ($request->type_of_attention_id == 12) {
            $AssignedManagementPlan->start_date = $request->start_date;
            $AssignedManagementPlan->finish_date = $request->finish_date;
            $AssignedManagementPlan->user_id = $request->user_id;
            $AssignedManagementPlan->start_hour = $request->start_hour;
            $AssignedManagementPlan->finish_hour = $request->finish_hour;
        } else {
            $AssignedManagementPlan->start_date = $request->start_date;
            $AssignedManagementPlan->finish_date = $request->finish_date;
            $AssignedManagementPlan->user_id = $request->user_id;
        }

        $AssignedManagementPlan->save();


        $LogAssignedManagementPlan->assigned_management_plan_id = $AssignedManagementPlan->id;
        $LogAssignedManagementPlan->user_id = Auth::user()->id;
        $LogAssignedManagementPlan->status = 'Plan de manejo actualizado';
        $LogAssignedManagementPlan->f_start_date = $request->start_date;
        $LogAssignedManagementPlan->f_finish_date = $request->finish_date;
        $LogAssignedManagementPlan->f_user_id = $request->user_id;
        $LogAssignedManagementPlan->f_start_hour = $request->start_hour;
        $LogAssignedManagementPlan->f_finish_hour = $request->finish_hour;
        $LogAssignedManagementPlan->save();

        return response()->json([
            'status' => true,
            'message' => 'Plan actualizada exitosamente',
            'data' => ['assigned_management_plan' => $AssignedManagementPlan]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        try {
            $AssignedManagementPlan = AssignedManagementPlan::find($id);
            $AssignedManagementPlan->delete();

            return response()->json([
                'status' => true,
                'message' => 'Plan eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Plan esta en uso, no es posible eliminar'
            ], 423);
        }
    }
}
