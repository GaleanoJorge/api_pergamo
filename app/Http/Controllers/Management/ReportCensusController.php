<?php

namespace App\Http\Controllers\Management;

use App\Models\Bed;
use App\Models\Campus;
use App\Models\Flat;
use App\Models\Location;
use App\Models\Pavilion;
use App\Models\ReportCensus;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf as PDF;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;

class ReportCensusController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ReportCensus = ReportCensus::select();

        if ($request->_sort) {
            $ReportCensus->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ReportCensus->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ReportCensus = $ReportCensus->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ReportCensus = $ReportCensus->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Reporte Censo Exitosamente',
            'data' => ['report_census' => $ReportCensus]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ReportCensus = new ReportCensus;
        $ReportCensus->initial_report = $request->initial_report;
        $ReportCensus->final_report = $request->final_report;
        $ReportCensus->campus_id = $request->campus_id;
        $ReportCensus->pavilion_id = $request->pavilion_id;
        $ReportCensus->user_id = $request->user_id;
        $ReportCensus->save();

        return response()->json([
            'status' => true,
            'message' => 'Creado Reporte Censo Exitosamente',
            'data' => ['report_census' => $ReportCensus->toArray()]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function exportCensusEXCEL(Request $request, int $id): JsonResponse
    {

        $census = Location::select(
            //* Consulta Especifica con Respectivos Encabezados
            DB::raw('IF(location.id > 0, NULL, NULL) AS "Prio."'),
            'bed.id AS Cama',
            DB::raw('CONCAT_WS("-", identification_type.code, patients.identification) AS "Documento-Ingreso"'),
            DB::raw('CONCAT_WS(" ", patients.firstname, patients.middlefirstname, patients.lastname, patients.middlelastname) AS Paciente'),
            DB::raw('CONCAT_WS(" ", FLOOR(DATEDIFF(NOW(), patients.birthday)/365.25), IF((DATEDIFF(NOW(), patients.birthday)/365.25) >= 1, "A", IF((DATEDIFF(NOW(), patients.birthday)/30) >= 1, "M", "D"))) AS Edad'),
            'diagnosis.code AS Cod.',
            'diagnosis.name AS Diagnóstico',
            // DB::raw('CAST(location.entry_date AS DATE) AS "Fecha de Ingreso 2"'),
            DB::raw('DATE(location.entry_date) AS "Fecha de Ingreso"'),
            DB::raw('DATEDIFF(NOW(), location.entry_date) AS "Estancia-(Días)"'),
            'company.name AS ARS-EPS',
            'modality.name AS Contrato',
            'procedure.name AS Especialidad Tratante'
        )
            //* Apuntadores de Consulta
            ->leftJoin('admissions', 'admissions.id', 'location.admissions_id')
            ->leftJoin('bed', 'bed.id', 'location.bed_id')
            ->leftJoin('pavilion', 'pavilion.id', 'location.pavilion_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('identification_type', 'identification_type.id', 'patients.identification_type_id')
            ->leftJoin('campus', 'campus.id', 'admissions.campus_id')
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')
            ->leftJoin('diagnosis', 'diagnosis.id', 'admissions.diagnosis_id')
            ->leftJoin('briefcase', 'briefcase.id', 'admissions.briefcase_id')
            ->leftJoin('modality', 'modality.id', 'briefcase.modality_id')
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'location.procedure_id')
            ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
            ->leftJoin('procedure', 'procedure.id', 'manual_price.procedure_id')
            ->leftJoin('scope_of_attention', 'scope_of_attention.id', 'location.scope_of_attention_id')
            ->leftJoin('admission_route', 'admission_route.id', 'scope_of_attention.admission_route_id')
            //* Condicionales
            ->whereBetween('location.entry_date', [$request->initial_report, $request->final_report])
            ->where('bed.bed_or_office', 1)
            ->where('campus.id', [$request->id])
            ->where('pavilion.id', [$request->id])
            ->get()->toArray();

        $response = [
            'report_census' => $census,
        ];

        return response()->json([
            'status' => true,
            'message' => 'Reporte Farmacia solicitado exitosamente',
            'data' => $response,
        ]);
    }

    public function exportCensusPDF(Request $request, int $id): JsonResponse
    {
        $census = Location::select(
            //* Consulta Especifica con Respectivos Encabezados
            DB::raw('IF(location.id > 0, NULL, NULL) AS "Prio."'),
            'bed.id AS Cama',
            DB::raw('CONCAT_WS("-", identification_type.code, patients.identification) AS "Documento"'),
            DB::raw('CONCAT_WS(" ", patients.firstname, patients.middlefirstname, patients.lastname, patients.middlelastname) AS Paciente'),
            DB::raw('CONCAT_WS(" ", FLOOR(DATEDIFF(NOW(), patients.birthday)/365.25), IF((DATEDIFF(NOW(), patients.birthday)/365.25) >= 1, "A", IF((DATEDIFF(NOW(), patients.birthday)/30) >= 1, "M", "D"))) AS Edad'),
            'diagnosis.code AS Cod.',
            'diagnosis.name AS Diagnóstico',
            // DB::raw('CAST(location.entry_date AS DATE) AS "Fecha de Ingreso 2"'),
            DB::raw('DATE(location.entry_date) AS "Fecha de Ingreso"'),
            DB::raw('DATEDIFF(NOW(), location.entry_date) AS "Estancia-(Días)"'),
            'company.name AS ARS-EPS',
            'modality.name AS Contrato',
            'procedure.name AS Especialidad Tratante',
            'campus.id AS Campus',
            'pavilion.id AS Pavilion',
        )
            //* Apuntadores de Consulta
            ->leftJoin('admissions', 'admissions.id', 'location.admissions_id')
            ->leftJoin('bed', 'bed.id', 'location.bed_id')
            ->leftJoin('pavilion', 'pavilion.id', 'location.pavilion_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('identification_type', 'identification_type.id', 'patients.identification_type_id')
            ->leftJoin('campus', 'campus.id', 'admissions.campus_id')
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')
            ->leftJoin('diagnosis', 'diagnosis.id', 'admissions.diagnosis_id')
            ->leftJoin('briefcase', 'briefcase.id', 'admissions.briefcase_id')
            ->leftJoin('modality', 'modality.id', 'briefcase.modality_id')
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'location.procedure_id')
            ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
            ->leftJoin('procedure', 'procedure.id', 'manual_price.procedure_id')
            ->leftJoin('scope_of_attention', 'scope_of_attention.id', 'location.scope_of_attention_id')
            ->leftJoin('admission_route', 'admission_route.id', 'scope_of_attention.admission_route_id')
            //* Condicionales
            ->whereBetween('location.entry_date', [$request->initial_report, $request->final_report])
            ->where('bed.bed_or_office', 1);

        //! Camas por Pabellón
        $xPavilion = Campus::select(
            'campus.id As Sede',
            'pavilion.id As Pavilion',
            DB::raw('COUNT(bed.status_bed_id) AS "Total"'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 1 THEN 1 END) AS Libres'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 2 THEN 2 END) AS "Ocupadas"'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 3 THEN 3 END) AS "Mantenimiento"'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 4 THEN 4 END) AS "Desinfeccion"'),
        )
            ->leftJoin('flat', 'campus.id', 'flat.campus_id')
            ->leftJoin('pavilion', 'flat.id', 'pavilion.flat_id')
            ->leftJoin('bed', 'pavilion.id', 'bed.pavilion_id')
            ->leftJoin('status_bed', 'status_bed.id', 'bed.status_bed_id')
            ->leftJoin('location', 'bed.id', 'location.bed_id')
            ->where('bed.bed_or_office', 1)
            ->whereBetween('location.entry_date', [$request->initial_report, $request->final_report]);

        //! Camas por Sede
        $xCampus = Campus::select(
            'campus.id As Sede_id',
            'campus.name as Sede',
            'flat.name as Piso',
            'pavilion.name as Pabellón',
            DB::raw('COUNT(bed.status_bed_id) AS "Total"'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 1 THEN 1 END) AS "Libres"'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 2 THEN 2 END) AS "Ocupadas"'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 3 THEN 3 END) AS "Mantenimiento"'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 4 THEN 4 END) AS "Desinfeccion"'),
        )
            ->leftJoin('flat', 'campus.id', 'flat.campus_id')
            ->leftJoin('pavilion', 'flat.id', 'pavilion.flat_id')
            ->leftJoin('bed', 'pavilion.id', 'bed.pavilion_id')
            ->leftJoin('status_bed', 'status_bed.id', 'bed.status_bed_id')
            ->leftJoin('location', 'bed.id', 'location.bed_id')
            ->where('bed.bed_or_office', 1)
            ->whereBetween('location.entry_date', [$request->initial_report, $request->final_report]);


        if ($request->pavilion_id) {
            $census->where('pavilion.id', [$request->pavilion_id]);
            $xPavilion->where('pavilion.id', [$request->pavilion_id]);
        }
        if ($request->campus_id) {
            $census->where('campus.id', [$request->campus_id]);
            $xCampus->where('campus.id', [$request->id]);
        }

        $xPavilion = $xPavilion->get()->toArray();
        $xCampus = $xCampus->get()->toArray();

        $census = $census->get()->toArray();

        //? Consulta de dato especifico
        $campusId = $request->campus_id;
        $campus = Campus::find($campusId);

        $pavilionId = $request->pavilion_id;
        $pavilion = Pavilion::find($pavilionId);

        $flatId = $request->flat_id;
        $flat = Flat::find($flatId);

        //? Fecha Actual
        $date = Carbon::now();





        //! Camas en General
        $General = Campus::select(
            DB::raw('COUNT(bed.status_bed_id) AS "General Total"'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 1 THEN 1 END) AS "General Libres"'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 2 THEN 2 END) AS "General Ocupadas"'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 3 THEN 3 END) AS "General Mantenimiento"'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 4 THEN 4 END) AS "General Desinfeccion"'),
            DB::raw('ROUND((COUNT(CASE WHEN status_bed_id = 2 THEN 2 END)/COUNT(bed.status_bed_id))*100, 2) AS "Indice"'),
        )
            ->leftJoin('flat', 'campus.id', 'flat.campus_id')
            ->leftJoin('pavilion', 'flat.id', 'pavilion.flat_id')
            ->leftJoin('bed', 'pavilion.id', 'bed.pavilion_id')
            ->leftJoin('status_bed', 'status_bed.id', 'bed.status_bed_id')
            ->leftJoin('location', 'bed.id', 'location.bed_id')
            ->where('bed.bed_or_office', 1)
            ->whereBetween('location.entry_date', [$request->initial_report, $request->final_report])
            ->get()->toArray();

        //? Datos a Blade
        $html = view('reports.census', [
            'census' => $census,
            'xPavilion' => $request->pavilion_id ? $xPavilion : null,
            'xCampus' => $request->campus_id ? $xCampus : null,
            'General' => $General,
            'campus' => $campus,
            'pavilion' => $pavilion,
            'flat' => $flat,
            'date' => $date,
            'type' => $request->type
        ])->render();
        $options = new Options();

        //? Configuración de Blade
        $options->set('isRemoteEnabled', true);

        $dompdf = new PDF($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('Carta', 'landscape');
        $dompdf->render();
        $file = $dompdf->output();
        $name = 'censo_hospitalario.pdf';
        Storage::disk('public')->put($name, $file);

        return response()->json([
            'status' => true,
            'ph' => $census,
            'message' => 'Reporte generado exitosamente',
            'url' => asset('/storage' . '/' . $name),
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
        $ReportCensus = ReportCensus::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Reporte Censo Solicitado Exitosamente',
            'data' => ['report_census' => $ReportCensus]
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
        $ReportCensus = ReportCensus::find($id);
        $ReportCensus->initial_report = $request->initial_report;
        $ReportCensus->final_report = $request->final_report;
        $ReportCensus->campus_id = $request->campus_id;
        $ReportCensus->pavilion_id = $request->pavilion_id;
        $ReportCensus->user_id = $request->user_id;
        $ReportCensus->save();

        return response()->json([
            'status' => true,
            'message' => 'Reporte Censo Solicitado Exitosamente',
            'data' => ['report_census' => $ReportCensus]
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
            $ReportCensus = ReportCensus::find($id);
            $ReportCensus->delete();

            return response()->json([
                'status' => true,
                'message' => 'Reporte Censo Eliminado Exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Reporte Censo en Uso, Imposible Eliminarlo'
            ], 423);
        }
    }
}
