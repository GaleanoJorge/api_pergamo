<?php

namespace App\Http\Controllers\Management;

use App\Models\Bed;
use App\Models\Campus;
use App\Models\Flat;
use App\Models\Pavilion;
use App\Models\ReportCensus;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf as PDF;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Shared\Date;

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
    public function exportCensusEXCEL(Request $request, int $id=0): JsonResponse
    {
        $census = DB::table('bed AS b')
            ->select(
                //* Consulta Especifica con Respectivos Encabezados
                DB::raw('IF(l.id > 0, NULL, NULL) AS "Prio."'),
                'campus.name AS Sede',
                'pavilion.name AS Pabellón',
                'b.name AS Cama',
                DB::raw('IF(status_bed.id = 2, CONCAT_WS("-", identification_type.code, patients.identification), "") AS "Documento"'),
                DB::raw('IF(status_bed.id = 2, CONCAT_WS(" ", patients.firstname, patients.middlefirstname, patients.lastname, patients.middlelastname), status_bed.name) AS Paciente'),
                DB::raw('IF(status_bed.id = 2, IF(patients.age > 0, CONCAT_WS(" ", FLOOR(DATEDIFF(NOW(), patients.birthday)/365.25), IF((DATEDIFF(NOW(), patients.birthday)/365.25) >= 1, "A", IF((DATEDIFF(NOW(), patients.birthday)/30) >= 1, "M", "D"))), NULL), "") AS Edad'),
                DB::raw('IF(status_bed.id = 2, diagnosis.code, "") AS "Cod."'),
                DB::raw('IF(status_bed.id = 2, diagnosis.name, "") AS "Diagnóstico"'),
                // DB::raw('CAST(location.entry_date AS DATE) AS "Fecha de Ingreso 2"'),
                DB::raw('IF(status_bed.id = 2, DATE(l.entry_date), "") AS "Fecha de Ingreso"'),
                DB::raw('IF(status_bed.id = 2, DATEDIFF(NOW(), l.entry_date), "") AS "Estancia-(Días)"'),
                DB::raw('IF(status_bed.id = 2, company.name, "") AS "ARS-EPS"'),
                DB::raw('IF(status_bed.id = 2, modality.name, "") AS Contrato'),
                DB::raw('IF(status_bed.id = 2, procedure.name, "") AS "Especialidad Tratante"'),
            )
            //* Apuntadores de Consulta
            ->leftJoin('status_bed', 'status_bed.id', 'b.status_bed_id')
            ->leftJoin('location AS l', 'b.id', 'l.bed_id')
            ->leftJoin('pavilion', 'pavilion.id', 'b.pavilion_id')
            ->leftJoin('flat', 'flat.id', 'pavilion.flat_id')
            ->leftJoin('campus', 'campus.id', 'flat.campus_id')
            ->leftJoin('admissions', 'admissions.id', 'l.admissions_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('identification_type', 'identification_type.id', 'patients.identification_type_id')
            ->leftJoin('diagnosis', function ($join) {
                $join->on('diagnosis.id', '=', 'admissions.diagnosis_id')
                    ->where('status_bed.id', '=', 2)
                    ->whereNotNull('patients.id');
            })
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')
            ->leftJoin('briefcase', 'briefcase.id', 'admissions.briefcase_id')
            ->leftJoin('modality', 'modality.id', 'briefcase.modality_id')
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'l.procedure_id')
            ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
            ->leftJoin('procedure', 'procedure.id', 'manual_price.procedure_id')
            ->leftJoin('scope_of_attention', 'scope_of_attention.id', 'l.scope_of_attention_id')
            ->leftJoin('admission_route', 'admission_route.id', 'scope_of_attention.admission_route_id')
            //* Condicionales
            // ->where('campus.id', [$request->campus_id])
            ->where('b.bed_or_office', 1)
            ->whereNotExists(function ($census) {
                $census->from('bed AS b2')
                    ->select('*')
                    ->leftJoin('location AS l2', 'b2.id', 'l2.bed_id')
                    ->whereRaw('b.id = b2.id')
                    ->whereRaw('l2.entry_date > l.entry_date');
            })
            ->orderBy('b.id', 'ASC');
        // ->get()->toArray();

        if ($request->campus_id) {
            $census->where('campus.id', [$request->campus_id]);
        }
        $census = $census->get()->toArray();

        $response = [
            'report_census' => $census,
        ];

        return response()->json([
            'status' => true,
            'data' => $response,
            'message' => 'Reporte Censo Hospitalario Generado Exitosamente',
        ]);
    }

    public function exportCensusPDF(Request $request, int $id = 0): JsonResponse
    {
        $census = DB::table('bed AS b')
            ->select(
                //* Consulta Especifica con Respectivos Encabezados
                DB::raw('IF(l.id > 0, NULL, NULL) AS "Prio."'),
                'b.name AS Cama',
                DB::raw('IF(status_bed.id = 2, CONCAT_WS("-", identification_type.code, patients.identification), "") AS "Documento"'),
                DB::raw('IF(status_bed.id = 2, CONCAT_WS(" ", patients.firstname, patients.middlefirstname, patients.lastname, patients.middlelastname), status_bed.name) AS Paciente'),
                DB::raw('IF(status_bed.id = 2, IF(patients.age > 0, CONCAT_WS(" ", FLOOR(DATEDIFF(NOW(), patients.birthday)/365.25), IF((DATEDIFF(NOW(), patients.birthday)/365.25) >= 1, "A", IF((DATEDIFF(NOW(), patients.birthday)/30) >= 1, "M", "D"))), NULL), "") AS Edad'),
                DB::raw('IF(status_bed.id = 2, diagnosis.code, "") AS "Cod."'),
                DB::raw('IF(status_bed.id = 2, diagnosis.name, "") AS "Diagnóstico"'),
                // DB::raw('CAST(location.entry_date AS DATE) AS "Fecha de Ingreso 2"'),
                DB::raw('IF(status_bed.id = 2, DATE(l.entry_date), "") AS "Fecha de Ingreso"'),
                DB::raw('IF(status_bed.id = 2, DATEDIFF(NOW(), l.entry_date), "") AS "Estancia-(Días)"'),
                DB::raw('IF(status_bed.id = 2, company.name, "") AS "ARS-EPS"'),
                DB::raw('IF(status_bed.id = 2, modality.name, "") AS Contrato'),
                DB::raw('IF(status_bed.id = 2, procedure.name, "") AS "Especialidad Tratante"'),
                'campus.id AS sedeId',
                'pavilion.id AS pabellonId',
            )
            //* Apuntadores de Consulta
            ->leftJoin('status_bed', 'status_bed.id', 'b.status_bed_id')
            ->leftJoin('location AS l', 'b.id', 'l.bed_id')
            ->leftJoin('pavilion', 'pavilion.id', 'b.pavilion_id')
            ->leftJoin('flat', 'flat.id', 'pavilion.flat_id')
            ->leftJoin('campus', 'campus.id', 'flat.campus_id')
            ->leftJoin('admissions', 'admissions.id', 'l.admissions_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('identification_type', 'identification_type.id', 'patients.identification_type_id')
            // ->leftJoin('diagnosis', 'diagnosis.id', 'admissions.diagnosis_id')
            ->leftJoin('diagnosis', function ($join) {
                $join->on('diagnosis.id', '=', 'admissions.diagnosis_id')
                    ->where('status_bed.id', '=', 2)
                    ->whereNotNull('patients.id');
            })
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')
            ->leftJoin('briefcase', 'briefcase.id', 'admissions.briefcase_id')
            ->leftJoin('modality', 'modality.id', 'briefcase.modality_id')
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'l.procedure_id')
            ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
            ->leftJoin('procedure', 'procedure.id', 'manual_price.procedure_id')
            ->leftJoin('scope_of_attention', 'scope_of_attention.id', 'l.scope_of_attention_id')
            ->leftJoin('admission_route', 'admission_route.id', 'scope_of_attention.admission_route_id')
            //* Condicionales
            ->where('b.bed_or_office', 1)
            ->whereNotExists(function ($census) {
                $census->from('bed AS b2')
                    ->select('*')
                    ->leftJoin('location AS l2', 'b2.id', 'l2.bed_id')
                    ->whereRaw('b.id = b2.id')
                    ->whereRaw('l2.entry_date > l.entry_date');
            });


        //! Camas por Pabellón
        $xPavilion = Pavilion::select(
            'campus.id As sedeId',
            'pavilion.id As pabellonId',
            'pavilion.name as pabellonName',
            'flat.name as pisoName',
            DB::raw('COUNT(b.status_bed_id) AS "camasTotalPabellon"'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 1 THEN 1 END) AS "camasLibresPabellon"'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 2 THEN 2 END) AS "camasOcupadasPabellon"'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 3 THEN 3 END) AS "camasMantenimientoPabellon"'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 4 THEN 4 END) AS "camasDesinfeccionPabellon"'),
            DB::raw('ROUND((COUNT(CASE WHEN status_bed_id = 2 THEN 2 END)/COUNT(b.status_bed_id))*100, 2) AS "IndicePabellon"'),
        )
            ->leftJoin('flat', 'flat.id', 'pavilion.flat_id')
            ->leftJoin('campus', 'campus.id', 'flat.campus_id')
            ->leftJoin('bed AS b', 'pavilion.id', 'b.pavilion_id')
            ->leftJoin('status_bed', 'status_bed.id', 'b.status_bed_id')
            ->leftJoin('location AS l', 'b.id', 'l.bed_id')
            ->where('b.bed_or_office', 1)
            ->whereNotExists(function ($xPavilion) {
                $xPavilion->from('bed AS b2')
                    ->select('*')
                    ->leftJoin('location AS l2', 'b2.id', 'l2.bed_id')
                    ->whereRaw('b.id = b2.id')
                    ->whereRaw('l2.entry_date > l.entry_date');
            })
            ->groupBy('pavilion.id');

        //! Camas por Sede
        $xCampus = Campus::select(
            'campus.id As sedeId',
            'campus.name as sedeName',
            'pavilion.name as pabellonName',
            'flat.name as pisoName',
            'campus.address as sedeAddress',
            'campus.region_id',
            DB::raw('COUNT(b.status_bed_id) AS "camasTotalSede"'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 1 THEN 1 END) AS "camasLibresSede"'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 2 THEN 2 END) AS "camasOcupadasSede"'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 3 THEN 3 END) AS "camasEnMantenimientoSede"'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 4 THEN 4 END) AS "CamasEnDesinfeccionSede"'),
            DB::raw('ROUND((COUNT(CASE WHEN status_bed_id = 2 THEN 2 END)/COUNT(b.status_bed_id))*100, 2) AS "IndiceSede"'),
        )
            ->with('region')
            ->leftJoin('flat', 'campus.id', 'flat.campus_id')
            ->leftJoin('pavilion', 'flat.id', 'pavilion.flat_id')
            ->leftJoin('bed AS b', 'pavilion.id', 'b.pavilion_id')
            ->leftJoin('status_bed', 'status_bed.id', 'b.status_bed_id')
            ->leftJoin('location AS l', 'b.id', 'l.bed_id')
            ->where('b.bed_or_office', 1)->whereNotExists(function ($General) {
                $General->from('bed AS b2')
                    ->select('*')
                    ->leftJoin('location AS l2', 'b2.id', 'l2.bed_id')
                    ->whereRaw('b.id = b2.id')
                    ->whereRaw('l2.entry_date > l.entry_date');
            })
            ->groupBy('campus.id');

        if ($request->campus_id) {
            $census->where('campus.id', [$request->campus_id]);
            $xCampus->where('campus.id', [$request->campus_id]);
        }
        $xPavilion = $xPavilion->get()->toArray();
        $xCampus = $xCampus->get()->toArray();
        $census = $census->get()->toArray();

        //? Consulta de dato especifico
        // $campusId = $request->campus_id;
        // $campus = Campus::find($campusId);

        // $pavilionId = $request->pavilion_id;
        // $pavilion = Pavilion::find($pavilionId);

        // $flatId = $request->flat_id;
        // $flat = Flat::find($flatId);

        //? Fecha Actual
        $date = Carbon::now()->format('Y-m-d H:i:s');
        $today = Carbon::now()->format('Y-m-d');
        $hour = Carbon::now()->format('h-i-s A');

        //! Camas en General
        $General = Campus::select(
            DB::raw('COUNT(b.status_bed_id) AS "camasGeneralTotal"'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 1 THEN 1 END) AS "camasGeneralLibres"'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 2 THEN 2 END) AS "camasGeneralOcupadas"'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 3 THEN 3 END) AS "camasGeneralMantenimiento"'),
            DB::raw('COUNT(CASE WHEN status_bed.id = 4 THEN 4 END) AS "camasGeneralDesinfeccion"'),
            DB::raw('ROUND((COUNT(CASE WHEN status_bed_id = 2 THEN 2 END)/COUNT(b.status_bed_id))*100, 2) AS "IndiceGeneral"'),
        )
            ->leftJoin('flat', 'campus.id', 'flat.campus_id')
            ->leftJoin('pavilion', 'flat.id', 'pavilion.flat_id')
            ->leftJoin('bed AS b', 'pavilion.id', 'b.pavilion_id')
            ->leftJoin('status_bed', 'status_bed.id', 'b.status_bed_id')
            ->leftJoin('location AS l', 'b.id', 'l.bed_id')
            ->where('b.bed_or_office', 1)
            ->whereNotExists(function ($General) {
                $General->from('bed AS b2')
                    ->select('*')
                    ->leftJoin('location AS l2', 'b2.id', 'l2.bed_id')
                    ->whereRaw('b.id = b2.id')
                    ->whereRaw('l2.entry_date > l.entry_date');
            })
            ->get()->toArray();

        $census = json_decode(json_encode($census), true);

        //? Datos a Blade
        $html = view('reports.census', [
                    'census' => $census,
                    'xPavilion' => $xPavilion,
                    'xCampus' => $xCampus,
                    'General' => $General,
                    // 'campus' => $campus,
                    // 'pavilion' => $pavilion,
                    // 'flat' => $flat,
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

        if ($request->campus_id) {
            $name = 'reporte_censo_hospitalario_del_[' . $today . ']_a_las_[' . $hour . '].pdf';
        } else {
            $name = 'reporte_censo_hospitalario_general_del_[' . $today . ']_a_las_[' . $hour . '].pdf';
        }
        Storage::disk('public')->put($name, $file);

        return response()->json([
            'status' => true,
            'ph' => $census,
            'message' => 'Reporte Censo Hospitalario Generado Exitosamente',
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