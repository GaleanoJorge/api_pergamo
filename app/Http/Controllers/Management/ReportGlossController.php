<?php

namespace App\Http\Controllers\Management;

use App\Models\ReportGloss;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ReportGlossController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ReportGloss = ReportGloss::select();

        if ($request->_sort) {
            $ReportGloss->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ReportGloss->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ReportGloss = $ReportGloss->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ReportGloss = $ReportGloss->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Reporte encontrado exitosamente',
            'data' => ['report_gloss' => $ReportGloss]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ReportGloss = new ReportGloss;
        $ReportGloss->initial_report = $request->initial_report;
        $ReportGloss->final_report = $request->final_report;
        $ReportGloss->campus_id = $request->campus_id;
        $ReportGloss->user_id = $request->user_id;
        $ReportGloss->save();

        return response()->json([
            'status' => true,
            'message' => 'Reporte Creado Exitosamente',
            'data' => ['report_gloss' => $ReportGloss->toArray()]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function exportGloss(Request $request, int $id=0): JsonResponse
    {
        //! Reporte
        $hoja1 = DB::table('gloss')
            ->select(
                'gloss.id AS ID',
                'gloss.invoice_prefix AS Prefijo',
                'gloss.invoice_consecutive AS Consecutivo',
                'objetion_type.name AS Tipo_Objecion',
                'repeated_initial.name AS Repeticion',
                'gloss.received_date AS Fecha_Recibido',
                'gloss.emission_date AS Fecha_Emision',
                'gloss.radication_date AS Fecha_Radicado',
                'company.name AS Entidad_Administradora',
                'company.identification',
                'campus.name AS Sede',
                'gloss_modality.name AS Modalidad',
                'gloss_ambit.name AS Ambito',
                'gloss_service.name AS Servicio',
                'objetion_code.name AS Codigo_Objecion',
                'gloss_status.name AS Estado',
                'gloss.objeted_value AS Valor_Unitario',
                'gloss.invoice_value AS Valor_Total',
                'type_briefcase.name AS Regimen',
                'received_by.name AS Medio',
                'users.username AS Identificacion_Usuario',
                'gloss.objetion_detail AS Detalle_Objecion'
            )
            ->leftJoin('objetion_type', 'gloss.objetion_type_id', '=', 'objetion_type.id')
            ->leftJoin('repeated_initial', 'gloss.repeated_initial_id', '=', 'repeated_initial.id')
            ->leftJoin('company', 'gloss.company_id', '=', 'company.id')
            ->leftJoin('campus', 'gloss.campus_id', '=', 'campus.id')
            ->leftJoin('gloss_modality', 'gloss.gloss_modality_id', '=', 'gloss_modality.id')
            ->leftJoin('gloss_ambit', 'gloss.gloss_ambit_id', '=', 'gloss_ambit.id')
            ->leftJoin('gloss_service', 'gloss.gloss_service_id', '=', 'gloss_service.id')
            ->leftJoin('objetion_code', 'gloss.objetion_code_id', '=', 'objetion_code.id')
            ->leftJoin('gloss_status', 'gloss.gloss_status_id', '=', 'gloss_status.id')
            ->leftJoin('type_briefcase', 'gloss.regimen_id', '=', 'type_briefcase.id')
            ->leftJoin('received_by', 'gloss.received_by_id', '=', 'type_briefcase.id')
            ->leftJoin('users', 'gloss.assing_user_id', '=', 'users.id')
            ->groupBy('gloss.id')
            ->orderBy('gloss.id', 'ASC');
            // ->get()->toArray();

        //! Respuesta
        $hoja2 = DB::table('gloss_response')
            ->select(
                'gloss_response.gloss_id AS ID',
                'gloss_response.response_date AS Fecha_Respuesta',
                'gloss_response.response AS Respuesta',
                'gloss_response.accepted_value AS Valor_Aceptado',
                'gloss_response.value_not_accepted AS Valor_NO_Aceptado',
                'objetion_code_response.code AS Codigo_Respuesta_Objecion',
                'objetion_code_response.name AS Respuesta_Objecion',
                'objetion_response.name AS Respuesta2',
                'users.firstname AS Nombre',
                'users.lastname AS Apellido'
            )
            ->leftJoin('gloss', 'gloss_response.gloss_id', '=', 'gloss.id')
            ->leftJoin('objetion_code_response', 'gloss_response.objetion_code_response_id', '=', 'objetion_code_response.id')
            ->leftJoin('objetion_response', 'gloss_response.objetion_response_id', '=', 'objetion_response.id')
            ->leftJoin('users', 'gloss_response.user_id', '=', 'users.id')
            ->orderBy('gloss_response.gloss_id', 'ASC')
            ->get()->toArray();

            if ($request->campus_id) {
                $hoja1->where('campus.id', [$request->campus_id]);
            }
            $hoja1 = $hoja1->get()->toArray();

        $response = [
            'h1' => $hoja1,
            'h2' => $hoja2,
        ];

        return response()->json([
            'status' => true,
            'message' => 'Reporte Glosas Solicitado Exitosamente',
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
        $ReportGloss = ReportGloss::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Reporte encontrado exitosamente',
            'data' => ['report_gloss' => $ReportGloss]
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
        $ReportGloss = ReportGloss::find($id);
        $ReportGloss->initial_report = $request->initial_report;
        $ReportGloss->final_report = $request->final_report;
        $ReportGloss->campus_id = $request->campus_id;
        $ReportGloss->user_id = $request->user_id;
        $ReportGloss->save();

        return response()->json([
            'status' => true,
            'message' => 'Reporte actualizado exitosamente',
            'data' => ['report_gloss' => $ReportGloss]
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
            $ReportGloss = ReportGloss::find($id);
            $ReportGloss->delete();

            return response()->json([
                'status' => true,
                'message' => 'Reporte eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Reporte en uso, Imposible Eliminarlo'
            ], 423);
        }
    }
}