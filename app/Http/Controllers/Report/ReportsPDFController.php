<?php

namespace App\Http\Controllers\Report;

use App\Actions\Report\Export\AcademicRecord;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Dompdf\Dompdf as PDF;
use Exception;
use DateTime;

class ReportsPDFController extends Controller
{
    
    protected $folder_save;
    public function __construct()
    {
        $this->folder_save = 'temp_reports';
    }

    public function getResumeAcademicRecord(Request $request)
    {
        $filters = [
            'course_id' => $request->query('course_id'),
            'group_id' => $request->query('group_id'),
        ];
        
        $courses = AcademicRecord::getCourses((object) $filters);
        $discentes = count(AcademicRecord::getDiscentes((object) $filters));

        if(!$discentes){
            return response()->json([
                'status' => false,
                'message' => 'No se encontaron participantes asignados.',
                'data' => []
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Cursos  obtenidos exitosamente.',
            'data' => ['course' => $courses, 'discentes' => $discentes]
        ]);
    }

    public function exportAcademicRecord(Request $request) : JsonResponse
    {

        try {
            
            $filters = [
                'course_id' => $request->query('course_id'),
                'group_id' => $request->query('group_id'),
            ];
            
            $courses = AcademicRecord::getCourses((object) $filters);
            if(!$courses){
                return response()->json([
                    'status' => false,
                    'message' => 'No se han encontrado resultados.',
                ]);
            }
            $teachers = AcademicRecord::getTeachers($courses->category_id);
            $discentes = AcademicRecord::getDiscentes((object) $filters);

            // $areas = AcademicRecord::getAreaSubarea($courses->category_id);
            // $courses->area = $areas->area;
            // $courses->subarea = $areas->subarea;

            $courses->start_date = new DateTime($courses->start_date);
            $courses->finish_date = new DateTime($courses->finish_date);
            
            $header = File::get(public_path('/images/header_registro_academico.jpg'));
            $header = "data:image/jpg;base64," . base64_encode($header);

            $html = view('exports.reports.academicRecord', [
                'courses' => $courses,
                'header' => $header,
                'discentes' => $discentes,
                'teachers' => $teachers
            ])->render();

            $dompdf = new PDF();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('Carta', 'landscape');

            $dompdf->render();
            $this->injectPageCount($dompdf);
            $file = $dompdf->output();

            $name = 'registro_academico_' . time() . '.pdf';

            Storage::disk($this->folder_save)->put($name, $file);

            return response()->json([
                'status' => true,
                'message' => 'Reporte generado exitosamente',
                'url' => asset('/storage/' . $this->folder_save . '/' . $name),
            ]);

        } catch (Exception $ex) {
            return response()->json([
                'status' => false,
                'message' => 'Error al generar reporte en el sistema.'.$ex,
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
