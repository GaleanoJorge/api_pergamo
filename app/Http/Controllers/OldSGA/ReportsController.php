<?php

namespace App\Http\Controllers\OldSGA;

use alhimik1986\PhpExcelTemplator\PhpExcelTemplator;
use App\Exports\GenerateExcelFromTemplate;
use App\Http\Controllers\Controller;
use App\Models\OldSGA\Courses;
use App\Models\OldSGA\EncuestaIndividual;
use App\Models\OldSGA\RegistroAcademico;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\OldSGA\RunCourses;
use App\Models\OldSGA\Discentes;
use App\Models\OldSGA\Filters;
use Dompdf\Dompdf as PDF;
use Dompdf\Options;
use DB;

use alhimik1986\PhpExcelTemplator\params\ExcelParam;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValueSpecial;
use alhimik1986\PhpExcelTemplator\params\CallbackParam;
use alhimik1986\PhpExcelTemplator\setters\CellSetterStringValue;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValue;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArray2DValue;

use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\IWriter;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

define('SPECIAL_ARRAY_TYPE', CellSetterArrayValueSpecial::class);
define('ARRAY_TYPE', CellSetterArrayValue::class);
define('ARRAY2D_TYPE', CellSetterArray2DValue::class);
define('STRING_TYPE', CellSetterStringValue::class);

class ReportsController extends Controller
{
    public function exportExcelRunCourses(Request $request): JsonResponse
    {
        $filters = [
            'sede_id' => $request->query('sede_id'),
            'programa_id' => $request->query('programa_id'),
            'modulo_id' => $request->query('modulo_id'),
            'recurso_id' => $request->query('recurso_id'),
            'coordinador_id' => $request->query('coordinador_id'),
            'vigencia_id' => $request->query('vigencia_id'),
        ];

        $data = RunCourses::get($filters);

        $extra_params = Filters::getHeaders($filters);

        $params = [
            '{current_date}' => date('d/m/Y h:i:s a'),
            '[programa]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'nomPrograma')),
            '[id_curso]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'IDcurso')),
            '[curso]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'nomCurso')),
            '[coordinador]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Coordinador')),
            '[sede]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'nomSede')),
            '[vigencia]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Nombre_vigencia')),
            '[recurso]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'recursoInversion')),
            '[modulo]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Modulo')),
            '[fecha_inicio_curso]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'fechaInicioCurso')),
            '[fecha_fin_curso]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'fechaFinCurso')),
            '[cantidad_convocados]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'cantidad_convocados')),
            '[cantidad_asistentes]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Cantidad_asistentes')),
        ];

        $params = array_merge($params, $extra_params);

        $file = GenerateExcelFromTemplate::run('oldsga/reporte_cursos_ejecutados.xlsx', 'temp_reports', $params, 'reporte_cursos_ejecutados');

        return response()->json([
            'status' => true,
            'message' => 'Reporte generado exitosamente',
            'url' => $file,
        ]);
    }

    public function exportExcelStatsDiscentesCourse(Request $request): JsonResponse
    {
        $filters = [
            'curso_id' => $request->query('curso_id'),
        ];

        $data = Discentes::getAdmitidosRechazadosByCurso($request->query('curso_id'), "EsAdmitido");
        $t_adm = count($data);
        $admitidos = [
            '[adm_ident]' => new ExcelParam(ARRAY_TYPE, array_column($data, 'pe_identificacion')),
            '[adm_nombres]' => new ExcelParam(ARRAY_TYPE, array_column($data, 'apellidoNombrePersona')),
            '[adm_correo]' => new ExcelParam(ARRAY_TYPE, array_column($data, 'Pe_email')),
            '[adm_celular]' => new ExcelParam(ARRAY_TYPE, array_column($data, 'Pe_Celular'))
        ];

        $data = Discentes::getAdmitidosRechazadosByCurso($request->query('curso_id'), "EsRechazado");
        $t_rec = count($data);
        $rechazados = [
            '[no_adm_ident]' => new ExcelParam(ARRAY_TYPE, array_column($data, 'pe_identificacion')),
            '[no_adm_nombres]' => new ExcelParam(ARRAY_TYPE, array_column($data, 'apellidoNombrePersona')),
            '[no_adm_correo]' => new ExcelParam(ARRAY_TYPE, array_column($data, 'Pe_email')),
            '[no_adm_celular]' => new ExcelParam(ARRAY_TYPE, array_column($data, 'Pe_Celular'))
        ];

        $data = Discentes::getAsistentesByCurso($request->query('curso_id'));
        $t_asi = count($data);
        $asistentes = [
            '[asis_ident]' => new ExcelParam(ARRAY_TYPE, array_column($data, 'pe_identificacion')),
            '[asis_nombres]' => new ExcelParam(ARRAY_TYPE, array_column($data, 'apellidoNombrePersona')),
            '[asis_correo]' => new ExcelParam(ARRAY_TYPE, array_column($data, 'Pe_email')),
            '[asis_celular]' => new ExcelParam(ARRAY_TYPE, array_column($data, 'Pe_Celular'))
        ];


        //Generando la grafica: 470x340
        $graph = new \Graph(470, 340);
        $graph->ClearTheme();
        $graph->SetScale('textlin');

        $graph->SetShadow();
        $graph->SetMargin(40, 30, 20, 50);

        $b1plot = new \BarPlot(array($t_adm));
        $b1plot->SetFillColor("#3C78D8");
        $b1plot->SetLegend("Admitidos ($t_adm)");
        $b2plot = new \BarPlot(array($t_rec));
        $b2plot->SetFillColor("#92278F");
        $b2plot->SetLegend("Rechazados ($t_rec)");
        $b3plot = new \BarPlot(array($t_asi));
        $b3plot->SetFillColor("#82B531");
        $b3plot->SetLegend("Asistentes ($t_asi)");

        // Create the grouped bar plot
        $bplot = new \GroupBarPlot(array($b3plot, $b2plot, $b1plot));

        $graph->Add($bplot);

        $graph->title->SetFont(FF_FONT1, FS_BOLD);
        $graph->yaxis->title->SetFont(FF_FONT1, FS_BOLD);
        $graph->xaxis->title->SetFont(FF_FONT1, FS_BOLD);
        $graph->legend->SetAbsPos(235,290,'center','top');
        $graph->legend->SetColumns(3);

        $str = 'jpeg';
        $graph->img->SetImgFormat($str,100);
        $graph->Stroke(_IMG_HANDLER);

        $graph_name = 'graph_' . time() . "." . $str;

        $imgFile = storage_path('app/public/temp_reports/' . $graph_name);
        $graph->img->Stream($imgFile);

        $fg = [
            '{current_date}' => date('d/m/Y h:i:s a'),
            '{grafica}' => $imgFile,
        ];

        $extra_params = Filters::getHeaders($filters);
        $params = array_merge($fg, $asistentes, $rechazados, $admitidos, $extra_params);

        $callbacks = [
            '{grafica}' => function (CallbackParam $param) {
                $sheet = $param->sheet;
                $cell_coordinate = $param->coordinate;

                $drawing = new Drawing();
                $drawing->setPath($param->param);
                $drawing->setCoordinates($cell_coordinate);
                $drawing->setWorksheet($sheet);
            },
        ];

        $file = GenerateExcelFromTemplate::run('oldsga/reporte_asistentes_admitidos_rechazados.xlsx', 'temp_reports', $params,'reporte_asistentes_admitidos_rechazados', $callbacks, false);

        return response()->json([
            'status' => true,
            'message' => 'Reporte generado exitosamente',
            'url' => $file,
        ]);
    }


    public function exportExcelMulticriterioInscritos(Request $request): JsonResponse
    {
        $filters = [
            'curso_id' => $request->query('curso_id'),
            'sede_id' => $request->query('sede_id'),
            'programa_id' => $request->query('programa_id'),
            'modulo_id' => $request->query('modulo_id'),
            'recurso_id' => $request->query('recurso_id'),
            'coordinador_id' => $request->query('coordinador_id'),
            'vigencia_id' => $request->query('vigencia_id'),

            'fecha_inicio' => $request->query('fecha_inicio'),
            'fecha_fin' => $request->query('fecha_fin'),
            'tipo_documento_id' => $request->query('tipo_documento_id'),
            'numero_documento' => $request->query('numero_documento'),
            'primer_apellido' => $request->query('primer_apellido'),
            'segundo_apellido' => $request->query('segundo_apellido'),
            'primer_nombre' => $request->query('primer_nombre'),
            'segundo_nombre' => $request->query('segundo_nombre'),
            'fecha_nacimiento' => $request->query('fecha_nacimiento'),
            'email' => $request->query('email'),
            'telefono_fijo' => $request->query('telefono_fijo'),
            'telefono_celular' => $request->query('telefono_celular'),

            'cargo_id' => $request->query('cargo_id'),
            'despacho_id' => $request->query('despacho_id'),
            'especialidad_id' => $request->query('especialidad_id'),
            'entidad_id' => $request->query('entidad_id'),
            'concejo_id' => $request->query('concejo_id'),
            'distrito_id' => $request->query('distrito_id'),
            'circuito_id' => $request->query('circuito_id'),
            'ciudad_id' => $request->query('ciudad_id'),
            'ano_vinculacion' => $request->query('ano_vinculacion'),
            'cargo_inscripcion_id' => $request->query('cargo_inscripcion_id'),
            'ano_vinculacion_rama' => $request->query('ano_vinculacion_rama'),
            'ultima_calificacion' => $request->query('ultima_calificacion'),
            'vinculacion_rama' => $request->query('vinculacion_rama'),
            'carrera_judicial' => $request->query('carrera_judicial'),
            'anotaciones_acuerdo' => $request->query('anotaciones_acuerdo'),
            'sanciones_disciplinarias' => $request->query('sanciones_disciplinarias'),
            'formadores_escuela' => $request->query('formadores_escuela'),
            'igualdad_genero' => $request->query('igualdad_genero'),
            'congestion_despacho' => $request->query('congestion_despacho'),
            'eventos_escuela' => $request->query('eventos_escuela'),
            'formacion_academica' => $request->query('formacion_academica'),
        ];

        $data = Discentes::getFullInfoByCurso($request->query('curso_id'), $filters, 'PRE');
        $preincritos = [];
        /*if(count($data)>0){
            foreach($data[0] as $key=>$row){
                $preincritos['[PRE'.$key.']'] = new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, $key));
            }
        }*/

        $cons_pre = [];
        $i = 1;
        foreach ($data as $key => $row) {
            array_push($cons_pre, $i++);
            array_push($preincritos, array_values((array)$row));
        }
        $pre = [
            '[PREidCurso]' => new ExcelParam(ARRAY_TYPE, $cons_pre),
            '[[preinscritos]]' => new ExcelParam(ARRAY2D_TYPE, $preincritos),
        ];

        $data = Discentes::getFullInfoByCurso($request->query('curso_id'), $filters, 'ADM');
        $admitidos = [];

        /*if (count($data) > 0) {
            foreach ($data[0] as $key => $row) {
                $admitidos['[ADM' . $key . ']'] = new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, $key));
            }
        }*/

        $cons_adm = [];
        $i = 1;
        foreach ($data as $key => $row) {
            array_push($cons_adm, $i++);
            array_push($admitidos, array_values((array)$row));
        }
        $adm = [
            '[ADMidCurso]' => new ExcelParam(ARRAY_TYPE, $cons_adm),
            '[[admitidos]]' => new ExcelParam(ARRAY2D_TYPE, $admitidos),
        ];

        $data = Discentes::getFullInfoByCurso($request->query('curso_id'), $filters, 'REC');
        $rechazados = [];
        /*if (count($data) > 0) {
            foreach ($data[0] as $key => $row) {
                $rechazados['[REC' . $key . ']'] = new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, $key));
            }
        }*/

        $cons_rec = [];
        $i = 1;
        foreach ($data as $key => $row) {
            array_push($cons_rec, $i++);
            array_push($rechazados, array_values((array)$row));
        }
        $rec = [
            '[RECidCurso]' => new ExcelParam(ARRAY_TYPE, $cons_rec),
            '[[rechazados]]' => new ExcelParam(ARRAY2D_TYPE, $rechazados),
        ];

        $data = Discentes::getFullInfoByCurso($request->query('curso_id'), $filters, 'NOA');
        $noasistentes = [];
        /*if (count($data) > 0) {
            foreach ($data[0] as $key => $row) {
                $noasistentes['[NOA' . $key . ']'] = new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, $key));
            }
        } */

        $cons_noa = [];
        $i = 1;
        foreach ($data as $key => $row) {
            array_push($cons_noa, $i++);
            array_push($noasistentes, array_values((array)$row));
        }
        $noa = [
            '[NOAidCurso]' => new ExcelParam(ARRAY_TYPE, $cons_noa),
            '[[noasistentes]]' => new ExcelParam(ARRAY2D_TYPE, $noasistentes),
        ];

        $fg = [
            '[t_pre]' => 48,
            '{current_date}' => date('d/m/Y h:i:s a'),
            '{filtro_fec_inicial}' => $request->query('fecha_inicio'),
            '{filtro_fec_final}' => $request->query('fecha_fin'),
            '[[Headers]]' => new ExcelParam(ARRAY2D_TYPE, [array('id curso', 'Curso', 'Fecha inicio', 'Fecha fin', 'Sede', 'Programa', 'Modulo', 'Recurso inversión', 'Vigencia', 'Coordinador', 'Tipo identificació', 'Numero de documento', 'Primer nombre', 'Segundo nombre', 'Primer apellido', 'Segundo apellido', 'Fecha de nacimiento', 'Genero', 'Correo electronico', 'Telefono', 'Celular', 'Especialidad', 'Cargo', 'Despacho Dependencia', 'Corporación Juzgado Entidad', 'Concejo seccional', 'Distrito', 'Circuito', 'Ciudad Laboral', 'Vinculación en propiedad a la Rama', 'Año de vinculación en propiedad a la', 'Inscripción en carrera judicial', 'Cargo de inscripción en', 'Total de años de vinculación a la', 'Última calificación de', 'Anotaciones acuerdo 88 de', 'Sanciones disciplinarias', 'Presenta Congestión en el', '¿Pertenece usted a la Red de formadores de la', '¿Tiene formación en el tema de igualdad de', 'Docencia', 'Doctorado', 'Especialización', 'Pregrado', 'Publicaciones', 'Maestria', 'Descripción academica')])
        ];

        $extra_params = Filters::getHeaders($filters);
        $params = array_merge($fg, $pre, $adm, $rec, $noa, $extra_params);

        $events = [
            PhpExcelTemplator::AFTER_INSERT_PARAMS => function (Worksheet $sheet, array $templateVarsArr) {

                $sheet->mergeCells('D6:G6');
                $sheet->mergeCells('B8:AW8');
                $sheet->mergeCells('H1:AR2');
                $sheet->mergeCells('I3:AR3');
                $sheet->mergeCells('AS3:AV4');
                $sheet->mergeCells('AW3:AW4');

                $max_row = $sheet->getHighestRow();

                for ($i = 12; $i < $max_row; $i++) {
                    $coordenadas = "B" . $i;
                    if ($sheet->getCell($coordenadas)->getValue() == "{tit_admitidos}") {
                        $sheet->getCell($coordenadas)->setValue("Discentes Admitidos");
                        $sheet->mergeCells("B$i:AW$i");
                    }

                    if ($sheet->getCell($coordenadas)->getValue() == "{tit_rechazados}") {
                        $sheet->getCell($coordenadas)->setValue("Discentes Rechazados");
                        $sheet->mergeCells("B$i:AW$i");
                    }

                    if ($sheet->getCell($coordenadas)->getValue() == "{tit_noasistentes}") {
                        $sheet->getCell($coordenadas)->setValue("Discentes No Asistieron");
                        $sheet->mergeCells("B$i:AW$i");
                    }
                }

                $lg_cell = 40;
                $md_cell = 18;
                //$sheet->getColumnDimension('D')->setAutoSize(true);
                $sheet->getColumnDimension('D')->setWidth($lg_cell);
                $sheet->getColumnDimension('H')->setWidth($lg_cell);
                $sheet->getColumnDimension('AW')->setWidth($lg_cell);

                $mayusculas = array('E', 'F', 'G', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AI');
                foreach ($mayusculas as $coor) {
                    $sheet->getColumnDimension($coor)->setWidth($md_cell);
                }
            },
        ];

        $file = GenerateExcelFromTemplate::run(
            'oldsga/reporte_multicriterio_inscritos_new.xlsx',
            'temp_reports',
            $params,
            'reporte_multicriterio_inscritos',
            [],
            false,
            $events);

        return response()->json([
            'status' => true,
            'message' => 'Reporte generado exitosamente',
            'url' => $file,
        ]);
    }

    public function exportExcelCourses(Request $request): JsonResponse
    {
        $filters = [
            'curso_id' => $request->query('curso_id'),
        ];

        $data = Courses::discentesAsistentes($filters);
        $asistentes = Courses::asistentes($filters['curso_id']);

        //Generando la grafica: 470x340
        $graph = new \PieGraph(470, 340);
        $graph->ClearTheme();
        $graph->SetMargin(0, 0,0,0);
        $graph->SetAntiAliasing();

        $data_pie = [$asistentes->Convocados, $asistentes->Cantidad_asistentes];
        $p1 = new \PiePlot($data_pie);
        $p1->value->Show();
        $p1->value->SetFont(FF_ARIAL, FS_NORMAL, 12);
        $p1->SetSize(0.3);
        $p1->SetCenter(0.5, 0.47);

        $legends = ["Nro Asistentes ($data_pie[0])", "Nro Convocados ($data_pie[1])"];
        $p1->SetLegends($legends);

        $graph->legend->SetPos(0.5, 0.97, 'center', 'bottom');
        $graph->legend->SetColumns(2);

        $p1->ShowBorder();
        $p1->SetColor('white');
        $p1->SetLabelType(PIE_VALUE_ABS);
        $p1->value->SetFormat('%d');
        $p1->value->Show();
        $p1->SetSliceColors(['#3C78D8', '#92278F']);

        $graph->Add($p1);

        $str = 'jpeg';
        $graph->img->SetImgFormat($str,100);
        $graph->Stroke(_IMG_HANDLER);

        $graph_name = 'graph_' . time() . "." . $str;

        $imgFile = storage_path('app/public/temp_reports/' . $graph_name);
        $graph->img->Stream($imgFile);

        $extra_params = Filters::getHeaders($filters);

        $params = [
            '{grafica}' => $imgFile,
            '{current_date}' => date('d/m/Y h:i:s a'),
            '[discente]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Discente')),
            '[cargo]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'cargo')),
            '[entidad]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'corporacionJuzgado')),
            '[especialidad]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'especialidad')),
            '[ciudad]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'ciudad')),
            '[email]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Email')),
        ];

        $params = array_merge($params, $extra_params);

        $callbacks = [
            '{grafica}' => function (CallbackParam $param) {
                $sheet = $param->sheet;
                $cell_coordinate = $param->coordinate;

                $drawing = new Drawing();
                $drawing->setPath($param->param);
                $drawing->setCoordinates($cell_coordinate);
                $drawing->setWorksheet($sheet);
            },
        ];

        $file = GenerateExcelFromTemplate::run('oldsga/reporte_cantidad_convocados_cantidad_asistentes.xlsx', 'temp_reports', $params,'reporte_cantidad_convocados_cantidad_asistentes', $callbacks);

        return response()->json([
            'status' => true,
            'message' => 'Reporte generado exitosamente',
            'url' => $file,
        ]);
    }


    public function exportPdfRegistroHoras(Request $request): JsonResponse
    {
        $discente_id = $request->query('discente_id');
        $cursos_id = implode(',', $request->query('cursos'));
        $filters = ['id' => $discente_id];

        $discente = Discentes::getBasicInfoBy($filters);

        $ssql = "SELECT
        programa.strNombreDelPrograma AS nomPrograma, modulo.strNombre AS nomModulo,
        curso.strNombreCursoDeFormacion AS nomCurso,
        sedes.strnombresede AS nombreSede,
        SUM(FORMAT(((
               ROUND((TO_SECONDS(validarDatoNuloDateTime(CONCAT(MAKEDATE(1970, 01), ' ', substring(rp_horasalida, 12, 19)))) - TO_SECONDS(validarDatoNuloDateTime(CONCAT(MAKEDATE(1970, 01), ' ', substring(rp_horaingreso, 12, 19)))))/3600, 1)
               + ROUND((TO_SECONDS(validarDatoNuloDateTime(CONCAT(MAKEDATE(1970, 01), ' ', substring(rp_horasalida2, 12, 19)))) - TO_SECONDS(validarDatoNuloDateTime(CONCAT(MAKEDATE(1970, 01), ' ', substring(rp_horaingreso2, 12, 19)))))/3600, 1)
        )), 0)) AS totalHoras,
           (SELECT MIN(fecha) FROM rd_fechas_curso WHERE id_curso_fk = rp_idcurso_fk) AS fecInicial,
           (SELECT MAX(fecha) FROM rd_fechas_curso WHERE id_curso_fk = rp_idcurso_fk) AS fecFinal
        FROM rd_planilla_asistencia planilla
        INNER JOIN tblcursosdeformacion curso ON planilla.rp_idcurso_fk = curso.intIdCursoDeFormacion
        INNER JOIN rd_persona persona ON planilla.rp_idpersona_fk = persona.Pe_IdPERSONA_PK
        INNER JOIN tblsedes sedes ON curso.intidsede = sedes.intidsede
        INNER JOIN tblPlanDeFormacionProgramas planFormacionPrograma ON curso.intIdPlanDeFormacionPrograma = planFormacionPrograma.intIdPlanDeFormacionPrograma
        LEFT JOIN tblProgramasoproyectos programa ON planFormacionPrograma.intIdProgramaOProyecto = programa.intIdProgramaOProyecto
        INNER JOIN rd_fechas_curso fechaCurso ON fechaCurso.id_curso_fk = curso.intIdCursoDeFormacion
        INNER JOIN tblModulos modulo ON fechaCurso.id_modulo = modulo.intIdModulo
        WHERE planilla.rp_idcurso_fk in ($cursos_id) AND planilla.rp_idpersona_fk = $discente_id
        GROUP BY curso.strNombreCursoDeFormacion";

        $cursos = DB::connection('CnxOldSGA')->select(DB::raw($ssql));

        $desc_cursos = (count($cursos) > 1) ? " los cursos " : " el curso ";

        $path = public_path('/images/header.png');
        $header = \File::get($path);

        $path = public_path('/images/footer.png');
        $footer = \File::get($path);

        $images = ['header' => "data:image/jpg;base64," . base64_encode($header), 'footer' => "data:image/jpg;base64," . base64_encode($footer)];

        /*$base64 = "";
        if ($type == "svg") {
            $base64 = "data:image/svg+xml;base64,".base64_encode($data);
        } else {
            $base64 = "data:image/". $type .";base64,".base64_encode($data);
        }
        return $base64;*/

        $html = view('exports/OldSGA/registroHoras', compact('cursos', 'discente', 'images', 'desc_cursos'))->render();

        $dompdf = new PDF();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('Carta', 'portrait');
        $dompdf->render();

        $file = $dompdf->output();
        $name = 'registro_horas_' . time() . '.pdf';
        $folder_save = 'temp_reports';
        Storage::disk($folder_save)->put($name, $file);

        return response()->json([
            'status' => true,
            'message' => 'Reporte generado exitosamente',
            'url' => asset('/storage/' . $folder_save . '/' . $name),
        ]);
    }

    public function exportPdfRegistroAcademico(Request $request)
    {
        $filters = [
            'curso_id' => $request->query('curso_id'),
            'grupo_id' => $request->query('grupo_id'),
        ];

        $curso = RegistroAcademico::cursos($filters['curso_id']);
        $formadores = RegistroAcademico::formadores($filters['curso_id']);
        $asistentes = RegistroAcademico::asistentes($filters['curso_id'], $filters['grupo_id']);

        $path = public_path('/images/header_registro_academico.jpg');
        $header = \File::get($path);

        $path = public_path('/images/footer.png');
        $footer = \File::get($path);

        $images = ['header' => "data:image/jpg;base64," . base64_encode($header), 'footer' => "data:image/jpg;base64," . base64_encode($footer)];

        $html = view('exports/OldSGA/registroAcademico', compact('curso', 'asistentes', 'formadores', 'images'))->render();

        $dompdf = new PDF();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('Carta', 'landscape');

        $dompdf->render();
        $this->injectPageCount($dompdf);
        $file = $dompdf->output();

        $name = 'registro_academico_' . time() . '.pdf';

        $folder_save = 'temp_reports';

        Storage::disk($folder_save)->put($name, $file);

        return response()->json([
            'status' => true,
            'message' => 'Reporte generado exitosamente',
            'url' => asset('/storage/' . $folder_save . '/' . $name),
        ]);
    }

    public function exportExcelEncuestaIndividual(Request $request)
    {
        $filters = [
            'curso_id' => $request->query('curso_id'),
            'encuesta' => $request->query('encuesta'),

            'tipo_documento_id' => $request->query('tipo_documento_id'),
            'numero_documento' => $request->query('numero_documento'),
            'primer_apellido' => $request->query('primer_apellido'),
            'segundo_apellido' => $request->query('segundo_apellido'),
            'primer_nombre' => $request->query('primer_nombre'),
            'segundo_nombre' => $request->query('segundo_nombre'),
            'fecha_nacimiento' => $request->query('fecha_nacimiento'),
            'email' => $request->query('email'),
            'telefono_fijo' => $request->query('telefono_fijo'),
            'telefono_celular' => $request->query('telefono_celular'),

            'cargo_id' => $request->query('cargo_id'),
            'despacho_id' => $request->query('despacho_id'),
            'especialidad_id' => $request->query('especialidad_id'),
            'entidad_id' => $request->query('entidad_id'),
            'concejo_id' => $request->query('concejo_id'),
            'distrito_id' => $request->query('distrito_id'),
            'circuito_id' => $request->query('circuito_id'),
            'ciudad_id' => $request->query('ciudad_id'),
            'ano_vinculacion' => $request->query('ano_vinculacion'),
            'cargo_inscripcion_id' => $request->query('cargo_inscripcion_id'),
            'ano_vinculacion_rama' => $request->query('ano_vinculacion_rama'),
            'ultima_calificacion' => $request->query('ultima_calificacion'),
            'vinculacion_rama' => $request->query('vinculacion_rama'),
            'carrera_judicial' => $request->query('carrera_judicial'),
            'anotaciones_acuerdo' => $request->query('anotaciones_acuerdo'),
            'sanciones_disciplinarias' => $request->query('sanciones_disciplinarias'),
            'formadores_escuela' => $request->query('formadores_escuela'),
            'igualdad_genero' => $request->query('igualdad_genero'),
            'congestion_despacho' => $request->query('congestion_despacho'),
            'eventos_escuela' => $request->query('eventos_escuela'),
            'formacion_academica' => $request->query('formacion_academica'),
        ];

        $data = EncuestaIndividual::generateReport($request->query('curso_id'), $filters);

        $params = [
            '{current_date}' => date('d/m/Y h:i:s a'),
            '[curso_id]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'idCurso')),
            '[curso]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Curso')),
            '[fecha_inicio]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'fechaInicioCurso')),
            '[fecha_fin]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'FechaFinCurso')),
            '[sede]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Sede')),
            '[programa]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Programa')),
            '[modulo]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Modulo')),
            '[costo]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'recursoInversion')),
            '[vigencia]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Vigencia')),
            '[coordinador]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Coordinador')),
            '[tipo_identificacion]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'TipoIdentificacion')),
            '[identificacion]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'cedula')),
            '[primer_nombre]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'primerNombre')),
            '[segundo_nombre]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'segundoNombre')),
            '[primer_apellido]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'primerApellido')),
            '[segundo_apellido]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'segundoApellido')),
            '[fecha_nacimiento]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Nacimiento')),
            '[email]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Correo')),
            '[telefono]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Telefono')),
            '[celular]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Celular')),
            '[especialidad]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Especialidad')),
            '[cargo]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Cargo')),
            '[despacho]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'DespachoDependencia')),
            '[juzgado]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'CorporacionJuzgado')),
            '[concejo]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'ConcejoSeccional')),
            '[distrito]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Distrito')),
            '[circuito]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Circuito')),
            '[ciudad]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Ciudad')),
            '[rama]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Vinculacion')),
            '[anio_vinculacion]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'AnioVinculacion')),
            '[carrera_judicial]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'InscripcionCarrera')),
            '[cargo_inscripcion]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'cargoCarreraJudicial')),
            '[anios_vinculacion]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'TotalAniosVinculacion')),
            '[ultima_calificacion]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'CalificacionServicios')),
            '[anotacion_acuerdo]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'AnotacionLey88')),
            '[sanciones]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Sanciones')),
            '[congestion]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'CongestionDespacho')),
            '[red_formadores]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'RedFormadores')),
            '[igualdad_genero]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'FormacionIgualdadGenero')),
            '[docencia]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Docencia')),
            '[doctorado]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Doctorado')),
            '[especializacion]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Especializacion')),
            '[pregrado]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Pregrado')),
            '[publicaciones]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Publicaciones')),
            '[maestria]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Maestria')),
            '[descripcion]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'DescAcademica')),
            '[encuesta]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Encuesta')),
        ];

        $extra_params = Filters::getHeaders($filters);

        $params = array_merge($params, $extra_params);

        $file = GenerateExcelFromTemplate::run('oldsga/reporte_encuesta_individual.xlsx', 'temp_reports', $params,'reporte_encuesta_individual');

        return response()->json([
            'status' => true,
            'message' => 'Reporte generado exitosamente',
            'url' => $file,
        ]);
    }

    public function exportExcelEncuestasActividad(Request $request)
    {
        $filters = [
            'curso_id' => $request->query('curso_id'),
            'fecha_inicio' => $request->query('fecha_inicio'),
            'fecha_fin' => $request->query('fecha_fin'),
        ];

        $data = EncuestaIndividual::generateReport($request->query('curso_id'), $filters);

        $params = [
            '{current_date}' => date('d/m/Y h:i:s a'),
            '[curso_id]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'idCurso')),
            '[curso]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Curso')),
            '[fecha_inicio]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'fechaInicioCurso')),
            '[fecha_fin]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'FechaFinCurso')),
            '[sede]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Sede')),
            '[programa]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Programa')),
            '[modulo]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Modulo')),
            '[costo]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'recursoInversion')),
            '[vigencia]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Vigencia')),
            '[coordinador]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Coordinador')),
            '[tipo_identificacion]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'TipoIdentificacion')),
            '[identificacion]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'cedula')),
            '[primer_nombre]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'primerNombre')),
            '[segundo_nombre]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'segundoNombre')),
            '[primer_apellido]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'primerApellido')),
            '[segundo_apellido]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'segundoApellido')),
            '[fecha_nacimiento]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Nacimiento')),
            '[email]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Correo')),
            '[telefono]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Telefono')),
            '[celular]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Celular')),
            '[especialidad]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Especialidad')),
            '[cargo]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Cargo')),
            '[despacho]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'DespachoDependencia')),
            '[juzgado]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'CorporacionJuzgado')),
            '[concejo]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'ConcejoSeccional')),
            '[distrito]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Distrito')),
            '[circuito]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Circuito')),
            '[ciudad]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Ciudad')),
            '[rama]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Vinculacion')),
            '[anio_vinculacion]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'AnioVinculacion')),
            '[carrera_judicial]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'InscripcionCarrera')),
            '[cargo_inscripcion]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'cargoCarreraJudicial')),
            '[anios_vinculacion]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'TotalAniosVinculacion')),
            '[ultima_calificacion]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'CalificacionServicios')),
            '[anotacion_acuerdo]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'AnotacionLey88')),
            '[sanciones]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Sanciones')),
            '[congestion]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'CongestionDespacho')),
            '[red_formadores]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'RedFormadores')),
            '[igualdad_genero]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'FormacionIgualdadGenero')),
            '[docencia]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Docencia')),
            '[doctorado]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Doctorado')),
            '[especializacion]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Especializacion')),
            '[pregrado]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Pregrado')),
            '[publicaciones]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Publicaciones')),
            '[maestria]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Maestria')),
            '[descripcion]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'DescAcademica')),
            '[encuesta]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($data, 'Encuesta')),
        ];

        $extra_params = Filters::getHeaders($filters);

        $params = array_merge($params, $extra_params);

        $file = GenerateExcelFromTemplate::run('oldsga/reporte_encuesta_individual.xlsx', 'temp_reports', $params,'reporte_encuestas_por_actividad');

        return response()->json([
            'status' => true,
            'message' => 'Reporte generado exitosamente',
            'url' => $file,
        ]);
    }

    public function jxParticipants(Request $request): JsonResponse
    {
        $filters = [
            'pagination' => $request->query("pagination", false),
            'current_page' => $request->query("current_page", 1),
            'per_page' => $request->query("per_page", 10),

            'fecha_inicio' => $request->query('fecha_inicio'),
            'fecha_fin' => $request->query('fecha_fin'),
            'codigo_grupo' => $request->query('codigo_grupo'),
            'zona_id' => $request->query('zona_id'),
            'curso_id' => $request->query('curso_id'),
            'sede_id' => $request->query('sede_id'),
            'programa_id' => $request->query('programa_id'),
            'modulo_id' => $request->query('modulo_id'),
            'recurso_id' => $request->query('recurso_id'),
            'coordinador_id' => $request->query('coordinador_id'),
            'vigencia_id' => $request->query('vigencia_id'),

            'tipo_documento_id' => $request->query('tipo_documento_id'),
            'tipo_participante_id' => $request->query('tipo_participante_id'),
            'numero_documento' => $request->query('numero_documento'),
            'primer_apellido' => $request->query('primer_apellido'),
            'segundo_apellido' => $request->query('segundo_apellido'),
            'primer_nombre' => $request->query('primer_nombre'),
            'segundo_nombre' => $request->query('segundo_nombre'),
            'genero_id' => $request->query('genero_id'),

            'cargo_id' => $request->query('cargo_id'),
            'despacho_id' => $request->query('despacho_id'),
            'especialidad_id' => $request->query('especialidad_id'),
            'entidad_id' => $request->query('entidad_id'),
            'concejo_id' => $request->query('concejo_id'),
            'distrito_id' => $request->query('distrito_id'),
            'circuito_id' => $request->query('circuito_id'),
            'ciudad_id' => $request->query('ciudad_id'),
            'tipo_usuario_id' => $request->query('tipo_usuario_id'),
            'custom_columns' => $request->query('custom_columns'),
        ];

        $data = Discentes::getMediumInfoBy($filters);

        return response()->json([
            'status' => true,
            'message' => 'Participantes obtenidos exitosamente',
            'data' => ['participants' => $data]
        ]);
    }

    public function exportExcelMulticriterioParticipantes(Request $request): JsonResponse
    {
        $filters = [
            'fecha_inicio' => $request->query('fecha_inicio'),
            'fecha_fin' => $request->query('fecha_fin'),
            'codigo_grupo' => $request->query('codigo_grupo'),
            'zona_id' => $request->query('zona_id'),
            'curso_id' => $request->query('curso_id'),
            'sede_id' => $request->query('sede_id'),
            'programa_id' => $request->query('programa_id'),
            'modulo_id' => $request->query('modulo_id'),
            'recurso_id' => $request->query('recurso_id'),
            'coordinador_id' => $request->query('coordinador_id'),
            'vigencia_id' => $request->query('vigencia_id'),

            'tipo_documento_id' => $request->query('tipo_documento_id'),
            'tipo_participante_id' => $request->query('tipo_participante_id'),
            'numero_documento' => $request->query('numero_documento'),
            'primer_apellido' => $request->query('primer_apellido'),
            'segundo_apellido' => $request->query('segundo_apellido'),
            'primer_nombre' => $request->query('primer_nombre'),
            'segundo_nombre' => $request->query('segundo_nombre'),
            'genero_id' => $request->query('genero_id'),

            'cargo_id' => $request->query('cargo_id'),
            'despacho_id' => $request->query('despacho_id'),
            'especialidad_id' => $request->query('especialidad_id'),
            'entidad_id' => $request->query('entidad_id'),
            'concejo_id' => $request->query('concejo_id'),
            'distrito_id' => $request->query('distrito_id'),
            'circuito_id' => $request->query('circuito_id'),
            'ciudad_id' => $request->query('ciudad_id'),
            'tipo_usuario_id' => $request->query('tipo_usuario_id'),
            'custom_columns' => $request->query('custom_columns'),
        ];

        $data = Discentes::getMediumInfoBy($filters);
        $participantes = [];

        foreach ($data as $key => $row) {
            array_push($participantes, array_values((array)$row));
        }

        $columns =  explode(',', $filters["custom_columns"]);
        $base_columns=Filters::getArrayColumns();

        $aux_cr=[];
        foreach($base_columns as $column){
            if(in_array($column["value"], $columns)){
                array_push($aux_cr,$column["label"]);
            }
        }

        $params = [
            '[[encabezados]]' => new ExcelParam(ARRAY2D_TYPE, [$aux_cr]),
            '[[datos]]' => new ExcelParam(ARRAY2D_TYPE, $participantes),
        ];

        $events = [
            PhpExcelTemplator::AFTER_INSERT_PARAMS => function (Worksheet $sheet, array $templateVarsArr) {

                /*$sheet->mergeCells('D6:G6');

                $max_row = $sheet->getHighestRow();

                for ($i = 12; $i < $max_row; $i++) {
                    $coordenadas = "B" . $i;
                    if ($sheet->getCell($coordenadas)->getValue() == "{tit_admitidos}") {
                        $sheet->getCell($coordenadas)->setValue("Discentes Admitidos");
                        $sheet->mergeCells("B$i:AW$i");
                    }
                } */

                $lg_cell = 45;
                $n_cols=1;
                $ult_col='B';
                $mayusculas = array('B','C','D','E', 'F', 'G', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AI');
                foreach ($mayusculas as $key=>$coor) {
                    $valor_celda=$sheet->getCell($coor.'4')->getValue();
                    if($valor_celda=="" || $valor_celda=null){
                        $ult_col=$mayusculas[($key-1)];
                        break;
                    }else{
                        $sheet->getColumnDimension($coor)->setWidth($lg_cell);
                        $n_cols++;
                    }
                }

                $sheet->mergeCells('B5:'.$ult_col.'5');

                /*
                $md_cell = 18;
                //$sheet->getColumnDimension('D')->setAutoSize(true);
                $sheet->getColumnDimension('D')->setWidth($lg_cell);
                $sheet->getColumnDimension('H')->setWidth($lg_cell);
                $sheet->getColumnDimension('AW')->setWidth($lg_cell);

                $mayusculas = array('B','C','D','E', 'F', 'G', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AI');
                foreach ($mayusculas as $coor) {
                    $sheet->getColumnDimension($coor)->setWidth($md_cell);
                } */
            },
        ];

        $file = GenerateExcelFromTemplate::run(
            'oldsga/reporte_multicriterio.xlsx',
            'temp_reports',
            $params,
            'reporte_multicriterio'
            ,[],false, $events
        );

        return response()->json([
            'status' => true,
            'message' => 'Reporte generado exitosamente',
            'url' => $file,
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
}
