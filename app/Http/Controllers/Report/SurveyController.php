<?php

namespace App\Http\Controllers\Report;

use alhimik1986\PhpExcelTemplator\params\CallbackParam;
use alhimik1986\PhpExcelTemplator\params\ExcelParam;
use alhimik1986\PhpExcelTemplator\PhpExcelTemplator;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArray2DValue;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValue;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValueSpecial;
use alhimik1986\PhpExcelTemplator\setters\CellSetterStringValue;
use App\Actions\Report\Export\SVGSurveys;
use App\Exports\GenerateExcelFromTemplate;
use App\Http\Controllers\Controller;
use App\Models\Base\IdentificationType;
use App\Models\Base\Question;
use App\Models\Base\SurveyInstance;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SurveyController extends Controller
{
    
    protected $colorPrimary;
    protected $colorSecondary;
    protected $folder_save;
    public function __construct()
    {
        $this->colorPrimary = '002775';
        $this->colorSecondary = 'ffc800';
        $this->folder_save = 'temp_reports';
        define('SPECIAL_ARRAY_TYPE', CellSetterArrayValueSpecial::class);
        define('ARRAY_TYPE', CellSetterArrayValue::class);
        define('ARRAY2D_TYPE', CellSetterArray2DValue::class);
        define('STRING_TYPE', CellSetterStringValue::class);
    }

    public function indexSurveyTrainers(Request $request, string $type){

        $columns = SVGSurveys::getColumnsTrainers($type, 'cut');
        $identificationType = null;
        if($type == 'trainers'){
            $columnsAdd = SVGSurveys::$custom_columns;
            $columns = array_merge($columnsAdd, $columns);
            $identificationType = IdentificationType::all()->toArray();
        }else{
            $columnsAdd = SVGSurveys::$custom_columns_course;
            $columns = array_merge($columnsAdd, $columns);
            $columns = array_merge($columns, [
                ['value'=>'svg_trainers', 'label'=>'Promedio Formadores'],
                ['value'=>'svg_course', 'label'=>'Promedio Actividad']
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => 'Datos obtenidos exitosamente',
            'data' => [
                'courses' => SVGSurveys::getCourses($request->all()), 
                'columns' => $columns,
                'identificationTypes' => $identificationType
            ]
        ]);
    }


    private static function getDataAVG(int $courseId, int $sectionId, int $userRoleId)
    {
        $survey = SVGSurveys::getDataAVG($courseId, $sectionId, $userRoleId);
        $survey = $survey->groupBy('question_id');
        $dataSurvey = [];
        $svgCore = 0;
        $cantCore = 0;
        foreach ($survey as $key => $value) {
            $answer = 0; $quality = 0;
            foreach ($value as $valueServey) {
                $answer += $valueServey->avg_answer;
                $quality += $valueServey->cant_answer;
            }
            if($valueServey->section_id !== 4)
                $dataSurvey['survey_'.$key] = number_format(($answer/$quality), 2, ".", "");
            $svgCore += number_format(($answer/$quality), 2, ".", "");
            $cantCore++;
        }
        $dataSurvey['svg_trainers'] = 0;
        $dataSurvey['svg_course'] = 0;
        if($cantCore>0){
            $dataSurvey['svg_trainers'] = ($sectionId) ? number_format(($svgCore/$cantCore), 2, ".", "") : 0;
            $dataSurvey['svg_course'] = number_format(($svgCore/$cantCore), 2, ".", "");
        }
        return $dataSurvey;
    }

    private static function getDataAVGExcel(int $courseId, int $sectionId, int $userRoleId)
    {
        $survey = SVGSurveys::getDataAVG($courseId, $sectionId, $userRoleId);
        $survey = $survey->groupBy('question_id');
        $dataSurvey = [];
        $dataSurvey2 = [];
        foreach ($survey as $key => $value) {
            $answer = 0; $quality = 0;
            foreach ($value as $valueServey) {
                if($valueServey->section_id !== 4 && $valueServey->section_id !== 5)
                    $dataSurvey2['label_'.$valueServey->section_id][$valueServey->question_id] = $valueServey->questions;
                $answer += $valueServey->avg_answer;
                $quality += $valueServey->cant_answer;
            }
            if($valueServey->section_id !== 4 && $valueServey->section_id !== 5)
                $dataSurvey['survey_'.$key] = number_format(($answer/$quality), 2, ".", "");
        }
        return ['label'=>$dataSurvey2,'data'=>$dataSurvey];
    }

    private static function getDataAVGTrainers(int $courseId, int $sectionId, int $userRoleId)
    {
        $survey = SVGSurveys::getDataAVG($courseId, $sectionId, $userRoleId);
        $survey = $survey->groupBy('question_id');
        $dataSurvey = [];
        foreach ($survey as $key => $value) {
            $answer = 0; $quality = 0;
            foreach ($value as $valueServey) {
                $answer += $valueServey->avg_answer;
                $quality += $valueServey->cant_answer;
            }
            $dataSurvey['survey_'.$key] = number_format(($answer/$quality), 2, ".", "");
        }
        return $dataSurvey;
    }

    /**
     * Buscar Encuestas por formador
     */
    public function getSurveyTrainers(Request $request)
    {
        $trainersSurvey = SVGSurveys::getSVGSurveyTrainer((object) $request->all());
        $surveys = [];
        foreach ($trainersSurvey['data'] as $key => $value) {
            $surveys = static::getDataAVGTrainers($value->course_id, 4, $value->user_role_id);
            $trainersSurvey['data'][$key] = (object) array_merge((array)$value, $surveys);
        }
        return response()->json([
            'status' => true,
            'message' => 'Evaluaciones obtenidas exitosamente',
            'data' => ['avaluations' => $trainersSurvey]
        ]);
    }

    public function exportSurveyTrainers(Request $request)
    {

        $base_columns=SVGSurveys::getColumnsTrainers('trainers', 'all');
        $columnsAdd = SVGSurveys::$custom_columns;
        $base_columns = array_merge($columnsAdd, $base_columns);
        $aux_cr=[];
        foreach($base_columns as $column){
            array_push($aux_cr,$column["label"]);
        }

        $trainersSurvey = SVGSurveys::getSVGSurveyTrainer((object) $request->all());
        $dataItemsDel = ['survey_id', 'section_id', 'course_id', 'user_role_id'];
        $dataReturn = [];
        foreach ($trainersSurvey as $key => $value) {
            $surveys = static::getDataAVGTrainers($value->course_id, 4, $value->user_role_id);
            $row = array_merge((array)$value, $surveys);
            foreach ($dataItemsDel as $itemsDel) {
                unset($row[$itemsDel]);
            }
            array_push($dataReturn, array_values((array)$row));
        }
        $colors = ['primary' => $this->colorPrimary, 'secondary' => $this->colorSecondary];
        $events = [
            PhpExcelTemplator::AFTER_INSERT_PARAMS => function (Worksheet $sheet, array $templateVarsArr) use ($colors) {

                $sheet->mergeCells('A3:D3');
                $sheet->mergeCells('A1:D2');
                $sheet->mergeCells('A4:'.preg_replace('/[0-9]+/', '', $sheet->getActiveCell()).'4');
                $sheet->mergeCells('A5:'.preg_replace('/[0-9]+/', '', $sheet->getActiveCell()).'5');
                $sheet->getColumnDimension('A')->setWidth(30);
                $sheet->getColumnDimension('B')->setWidth(30);
                $mayusculas = array('C','D','E', 'F', 'G', 'H', 'I', 'J', 'K');
                foreach ($mayusculas as $key => $coor) {
                    $sheet->getColumnDimension($coor)->setAutoSize(true);
                    if($coor == preg_replace('/[0-9]+/', '', $sheet->getActiveCell())){
                        break;
                    }
                }
                if(count($colors) > 0){
                    $sheet->getStyle('A4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB($colors['primary']);
                    $sheet->getStyle('A5')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB($colors['secondary']);
                }
                $sheet->getStyle('L6:T6')->getAlignment()->setWrapText(true);
                $sheet->getRowDimension(6)->setRowHeight(40);
                $sheet->getStyle('A6:T6')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            },
        ];
        $params = [
            '{current_date}' => date('d/m/Y h:i:s a'),
            '{title}' => 'REPORTE DE EVALUACIÓN DE FORMADORES',
            '[[headers]]' => new ExcelParam(ARRAY2D_TYPE, [$aux_cr], function (CallbackParam $param) {
                $sheet = $param->sheet;
                $sheet->getStyle($param->coordinate)->getFont()->setBold(true);
                $sheet->getStyle($param->coordinate)->getFont()->setSize(10);
            }),
            '[[data]]' => new ExcelParam(ARRAY2D_TYPE, $dataReturn),
        ];

        $file = GenerateExcelFromTemplate::runDefault(
            'exports/Reporte_plantilla_basica.xlsx',
            $this->folder_save,
            $params,
            'evaluaciones_formadores',
            [],
            false,
            $events,
            $colors
        );

        return response()->json([
            'status' => true,
            'message' => 'Reporte generado exitosamente',
            'url' => $file,
        ]);
    }

    /**
     * Buscar Encuestas por actividad academica [curso]
     */
    public function getSurveyCourses(Request $request)
    {
        $coursesSurvey = SVGSurveys::getSVGSurveyCourses((object) $request->all());
        $surveys = [];
        foreach ($coursesSurvey['data'] as $key => $value) {
            $surveys = static::getDataAVG($value->course_id, 0, 0);
            $coursesSurvey['data'][$key] = (object) array_merge((array)$value, $surveys);
            //Consultar promedio Formadores por curso
            $surveys = static::getDataAVG($value->course_id, 4, 0);
            $coursesSurvey['data'][$key]->svg_trainers = $surveys['svg_trainers'];
        }
        return response()->json([
            'status' => true,
            'message' => 'Evaluaciones obtenidas exitosamente',
            'data' => ['avaluations' => $coursesSurvey]
        ]);
    }

    public function exportSurveyCourses(Request $request)
    {
        $base_columns=SVGSurveys::getColumnsTrainers('courses', 'all');
        $columnsAdd = SVGSurveys::$custom_columns_course;
        $base_columns = array_merge($columnsAdd, $base_columns);
        $base_columns = array_merge($base_columns, [
            ['value'=>'svg_trainers', 'label'=>'Promedio Formadores'],
            ['value'=>'svg_course', 'label'=>'Promedio Actividad']
        ]);
        $aux_cr=[];
        foreach($base_columns as $column){
            array_push($aux_cr,$column["label"]);
        }

        $trainersSurvey = SVGSurveys::getSVGSurveyCourses((object) $request->all());
        $dataItemsDel = ['course_id'];
        $dataReturn = [];
        foreach ($trainersSurvey as $key => $value) {
            $surveys = static::getDataAVG($value->course_id, 0, 0);
            $row = array_merge((array)$value, $surveys);
            foreach ($dataItemsDel as $itemsDel) {
                unset($row[$itemsDel]);
            }
            //Consultar promedio Formadores por curso
            $surveys = static::getDataAVG($value->course_id, 4, 0);
            $row['svg_trainers'] = $surveys['svg_trainers'];
            array_push($dataReturn, array_values((array)$row));
        }
        $colors = ['primary' => $this->colorPrimary, 'secondary' => $this->colorSecondary];
        $events = [
            PhpExcelTemplator::AFTER_INSERT_PARAMS => function (Worksheet $sheet, array $templateVarsArr) use ($colors) {

                $sheet->mergeCells('A3:D3');
                $sheet->mergeCells('A1:D2');
                $sheet->mergeCells('A4:'.preg_replace('/[0-9]+/', '', $sheet->getActiveCell()).'4');
                $sheet->mergeCells('A5:'.preg_replace('/[0-9]+/', '', $sheet->getActiveCell()).'5');
                $sheet->getColumnDimension('A')->setWidth(30);
                $sheet->getColumnDimension('B')->setWidth(30);
                $mayusculas = array('C','D','E', 'F', 'G');
                foreach ($mayusculas as $key => $coor) {
                    $sheet->getColumnDimension($coor)->setAutoSize(true);
                    if($coor == preg_replace('/[0-9]+/', '', $sheet->getActiveCell())){
                        break;
                    }
                }
                if(count($colors) > 0){
                    $sheet->getStyle('A4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB($colors['primary']);
                    $sheet->getStyle('A5')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB($colors['secondary']);
                }
                $sheet->getStyle('H6:Z6')->getAlignment()->setWrapText(true);
                $sheet->getRowDimension(6)->setRowHeight(40);
                $sheet->getStyle('A6:T6')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            },
        ];
        $params = [
            '{current_date}' => date('d/m/Y h:i:s a'),
            '{title}' => 'REPORTE DE GRADO DE SATISFACCIÓN DE LA ACTIVIDAD ACADÉMICA',
            '[[headers]]' => new ExcelParam(ARRAY2D_TYPE, [$aux_cr], function (CallbackParam $param) {
                $sheet = $param->sheet;
                $sheet->getStyle($param->coordinate)->getFont()->setBold(true);
                $sheet->getStyle($param->coordinate)->getFont()->setSize(10);
            }),
            '[[data]]' => new ExcelParam(ARRAY2D_TYPE, $dataReturn),
        ];

        $file = GenerateExcelFromTemplate::runDefault(
            'exports/Reporte_plantilla_basica.xlsx',
            $this->folder_save,
            $params,
            'grado_satisfaccion_actividades',
            [],
            false,
            $events,
            $colors
        );

        return response()->json([
            'status' => true,
            'message' => 'Reporte generado exitosamente',
            'url' => $file,
        ]);
    }

    public function exportTabulationSurvey(Request $request)
    {
        try {

        $trainersSurvey = SVGSurveys::getTabulationSurvey((object) $request->all());
        if(!$trainersSurvey){
            return response()->json([
                'status' => False,
                'message' => 'No se encontraron resultados',
                'url' => null
            ], 423);
        }

        $dataPromedio = [];
        $dataReturn = [];
        $labels = [];
        foreach ($trainersSurvey as $key => $value) {
            $surveys = static::getDataAVGExcel($value->course_id, 1, 0);
            $labels[0] = $surveys['label'];
            array_push($dataReturn, array_values((array)$surveys['data']));

            $surveys = static::getDataAVGExcel($value->course_id, 3, 0);
            $labels[1] = $surveys['label'];
            array_push($dataReturn, array_values((array)$surveys['data']));
            //Consultar promedio Formadores por curso
            $surveys = static::getDataAVG($value->course_id, 4, 0);
            $row['svg_trainers'] = $surveys['svg_trainers'];
            array_push($dataPromedio, array_values((array)$row));
        }
        $contenidos = [];
        foreach($labels[0]['label_1'] as $column){
            array_push($contenidos,$column);
        }
        $metodologia = [];
        foreach($labels[1]['label_3'] as $column){
            array_push($metodologia,$column);
        }
        $coorInit = 'J2';
        $params = [
            '{current_date}' => date('d/m/Y h:i:s a'),
            '{title}' => 'TABULACIÓN RESULTADO ENCUESTAS APLICADAS A LOS DISCENTES',
            '{PromedioUno}' => 'PROMEDIO',
            '{PromedioDos}' => 'PROMEDIO',
            '[[contenidos]]' => new ExcelParam(ARRAY2D_TYPE, [$contenidos], function (CallbackParam $param) use ($coorInit) {
                $sheet = $param->sheet;
                $sheet->getStyle($param->coordinate)->getFont()->setBold(true);
                $sheet->getStyle($param->coordinate)->getFont()->setSize(10);
            }),
            '[[metodologia]]' => new ExcelParam(ARRAY2D_TYPE, [$metodologia], function (CallbackParam $param) use (&$coorInit) {
                $sheet = $param->sheet;
                $sheet->getStyle($param->coordinate)->getFont()->setBold(true);
                $sheet->getStyle($param->coordinate)->getFont()->setSize(10);
            }),
            '[[data1]]' => new ExcelParam(ARRAY2D_TYPE, [$dataReturn[0]], function (CallbackParam $param) use ($coorInit) {
                $sheet = $param->sheet;
                if(count($param->param[0]) === ($param->col_index+1)){
                    $coor = preg_replace('/[0-9]+/', '', $param->coordinate);
                    $sheet->mergeCells($coorInit.':'.$coor.'3');
                    $sheet->getCell($coorInit)->setValue('CONTENIDOS');
                    $sheet->getStyle($coorInit)->getFont()->setBold(true);
                    $sheet->getStyle($coorInit)->getAlignment()
                        ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                    $sheet->getStyle($coorInit)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('B4C7E7');
                }
            }),
            '[[data2]]' => new ExcelParam(ARRAY2D_TYPE, [$dataReturn[1]], function (CallbackParam $param) use (&$coorInit) {
                $sheet = $param->sheet;
                if($param->col_index === 0){
                    $coorInit = preg_replace('/[0-9]+/', '', $param->coordinate).'2';
                }
                if(count($param->param[0]) === ($param->col_index+1)){
                    $coor = preg_replace('/[0-9]+/', '', $param->coordinate);
                    $sheet->mergeCells($coorInit.':'.$coor.'3');
                    $sheet->getCell($coorInit)->setValue('METODOLOGÍA');
                    $sheet->getStyle($coorInit)->getFont()->setBold(true);
                    $sheet->getStyle($coorInit)->getAlignment()
                        ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                    $sheet->getStyle($coorInit)
                            ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                    $sheet->getStyle($coorInit)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('B4C7E7');
                }
            }),
            '[[data3]]' => new ExcelParam(ARRAY2D_TYPE, $dataPromedio),
            '[[data4]]' => new ExcelParam(ARRAY2D_TYPE, [[0]]),
            '[coordinator]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($trainersSurvey, 'coordinator')),
            '[category]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($trainersSurvey, 'category')),
            '[campus]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($trainersSurvey, 'campus')),
            '[course]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($trainersSurvey, 'course')),
            '[course_name]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($trainersSurvey, 'course_name')),
            '[quota]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($trainersSurvey, 'quota')),
            '[quantity]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($trainersSurvey, 'quantity')),
            '[start_date]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($trainersSurvey, 'start_date')),
            '[finish_date]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($trainersSurvey, 'finish_date')),
            '[zone]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($trainersSurvey, 'zone')),
        ];

        $callbacks = [
            '{PromedioUno}' => function (CallbackParam $param) {
                $sheet = $param->sheet;
                $coor = preg_replace('/[0-9]+/', '', $param->coordinate);
                // Clear cell, which must contain just an image
                $sheet->getCell($coor.'2')->setValue('FORMADORES');
                $sheet->mergeCells($coor.'2'.':'.$coor.'3');
                $sheet->getColumnDimension($coor)->setAutoSize(true);
                $sheet->getStyle($coor.'2')->getFont()->setBold(true);
                $sheet->getStyle($coor.'2')->getAlignment()
                        ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $sheet->getStyle($coor.'2')
                        ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $sheet->getStyle($coor.'2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('B4C7E7');
            
            },
            '{PromedioDos}' => function (CallbackParam $param) {
                $sheet = $param->sheet;
                $coor = preg_replace('/[0-9]+/', '', $param->coordinate);
                // Clear cell, which must contain just an image
                $sheet->getCell($coor.'2')->setValue('DISCENTES');
                $sheet->mergeCells($coor.'2'.':'.$coor.'3');
                $sheet->getColumnDimension($coor)->setAutoSize(true);
                $sheet->getStyle($coor.'2')->getFont()->setBold(true);
                $sheet->getStyle($coor.'2')->getAlignment()
                    ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $sheet->getStyle($coor.'2')
                        ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $sheet->getStyle($coor.'2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('B4C7E7');
            
            },
        ];

        $file = GenerateExcelFromTemplate::run(
            'exports/reporte_tabluacion_encuestas.xlsx',
            $this->folder_save,
            $params,
            'reporte_tabluacion_encuestas',
            $callbacks
        );


        return response()->json([
            'status' => true,
            'message' => 'Reporte generado exitosamente',
            'url' => $file,
        ]);
    } catch (Exception $th) {
        return response()->json([
            'status' => False,
            'message' => 'Reporte no pudo ser generado',
            'url' => null
        ], 423);
    }
    }

}
