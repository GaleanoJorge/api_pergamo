<?php

namespace App\Http\Controllers\Management;

use App\Models\ReportExternalQuery;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ReportExternalQueryController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ReportExternalQuery = ReportExternalQuery::select();

        if ($request->_sort) {
            $ReportExternalQuery->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ReportExternalQuery->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ReportExternalQuery = $ReportExternalQuery->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ReportExternalQuery = $ReportExternalQuery->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Reporte Consulta Externa exitosamente',
            'data' => ['report_external_query' => $ReportExternalQuery]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ReportExternalQuery = new ReportExternalQuery;
        $ReportExternalQuery->initial_report = $request->initial_report;
        $ReportExternalQuery->final_report = $request->final_report;
        $ReportExternalQuery->campus_id = $request->campus_id;
        $ReportExternalQuery->status = $request->status;
        $ReportExternalQuery->user_id = $request->user_id;
        $ReportExternalQuery->save();

        return response()->json([
            'status' => true,
            'message' => 'Creado Reporte Consulta Externa exitosamente',
            'data' => ['report_external_query' => $ReportExternalQuery->toArray()]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function exportExternalQuery(Request $request, int $id): JsonResponse
    {
        $external = DB::table('medical_diary_days')
            ->select(
                DB::raw('CONCAT_WS(" - ", identification_type.code, patients.identification) AS identificacion'),
                DB::raw('CONCAT_WS(" ", patients.firstname, patients.middlefirstname, patients.lastname, patients.middlelastname) AS paciente'),
                'manual_price.homologous_id AS codigo',
                'manual_price.name AS servicio',
                DB::raw('CONCAT_WS(" " , users.firstname, users.middlefirstname, users.lastname, users.middlelastname) AS asistencial'),
                'campus.name AS sede',
                'medical_status.name AS estado',
                'payment_type.name AS tipo_recaudo',
                'copay_parameters.category AS categoría',
                'medical_diary_days.copay_value AS valor',
                DB::raw('IF(medical_diary_days.medical_status_id = 4, medical_diary_days.id, "--") AS consecutivo_recibo'),
                'log_admissions.created_at AS fecha_cobro',
                DB::raw('CONCAT_WS(" ", u.firstname, u.middlefirstname, u.lastname, u.middlelastname) AS recaudo_recibido'), 
                DB::raw('IF(COUNT(ch_record.id) > 0, "SI", "NO") AS con_evolucion'),
                'ch_record.created_at AS fecha_inicio_atencion',
                'ch_record.date_finish AS fecha_cierre_atencion'
            )
            ->leftJoin('patients', 'patients.id', 'medical_diary_days.patient_id')
            ->leftJoin('identification_type', 'identification_type.id', 'patients.identification_type_id')
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'medical_diary_days.services_briefcase_id')
            ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
            ->leftJoin('medical_diary', 'medical_diary.id', 'medical_diary_days.medical_diary_id')
            ->leftJoin('assistance', 'medical_diary.assistance_id', 'assistance.id')
            ->leftJoin('users', 'users.id', 'assistance.user_id')
            ->leftJoin('medical_status', 'medical_diary_days.medical_status_id', 'medical_status.id')
            ->leftJoin('copay_parameters', 'copay_parameters.id', 'medical_diary_days.copay_id')
            ->leftJoin('payment_type', 'payment_type.id', 'copay_parameters.payment_type_id') //! Ajustar payment_type por payment_type_id
            ->leftJoin('campus', 'campus.id', 'medical_diary.campus_id')
            ->leftJoin('ch_record', 'ch_record.admissions_id', 'medical_diary_days.admissions_id')
            ->leftJoin('log_admissions', 'log_admissions.admissions_id', 'medical_diary_days.admissions_id')
            ->leftJoin('users AS u', 'u.id', 'log_admissions.user_id')
            ->where('medical_diary_days.start_hour', '>=', $request->initial_report)
            ->where('medical_diary_days.finish_hour', '<', $request->final_report)
            ->where('campus.id', [$request->campus_id])
            ->where('medical_diary_days.medical_status_id', '!=', 1)
            ->groupBy('medical_diary_days.id')
            ->get()->toArray();

        $response = [
            'report_external_query' => $external,
        ];

        return response()->json([
            'status' => true,
            'message' => 'Reporte Consulta Externa solicitado exitosamente',
            'data' => $response
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
        $ReportExternalQuery = ReportExternalQuery::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Reporte Consulta Externa exitosamente',
            'data' => ['report_external_query' => $ReportExternalQuery]
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
        $ReportExternalQuery = ReportExternalQuery::find($id);
        $ReportExternalQuery->initial_report = $request->initial_report;
        $ReportExternalQuery->final_report = $request->final_report;
        $ReportExternalQuery->campus_id = $request->campus_id;
        $ReportExternalQuery->status = $request->status;
        $ReportExternalQuery->user_id = $request->user_id;
        $ReportExternalQuery->save();

        return response()->json([
            'status' => true,
            'message' => 'Reporte Consulta Externa actualizado exitosamente',
            'data' => ['report_external_query' => $ReportExternalQuery]
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
            $ReportExternalQuery = ReportExternalQuery::find($id);
            $ReportExternalQuery->delete();

            return response()->json([
                'status' => true,
                'message' => 'Reporte Consulta Externa eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Reporte Consulta Externa en uso, imposible eliminarlo'
            ], 423);
        }
    }
}