<?php

namespace App\Http\Controllers\Report;

use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValueSpecial;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArray2DValue;
use alhimik1986\PhpExcelTemplator\setters\CellSetterStringValue;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValue;
use alhimik1986\PhpExcelTemplator\params\CallbackParam;
use alhimik1986\PhpExcelTemplator\params\ExcelParam;
use alhimik1986\PhpExcelTemplator\PhpExcelTemplator;
use App\Actions\Report\Export\ActivitiesCarriedOutAndScheduled;
use App\Actions\Report\Export\AcademicActivities;
use App\Actions\Report\Export\AcademicRecord;
use App\Actions\Report\Export\AssignedTrainers;
use App\Actions\Report\Export\AttendeesOfAllCourses;
use App\Actions\Report\Export\ConsolidatedEvents;
use App\Actions\Report\Export\HoursOfAssistance;
use App\Actions\Report\Export\Inconsistencies;
use App\Actions\Report\Export\MulticriteriaFilters;
use App\Actions\Report\Export\MulticriteriaInscribedFilters;
use App\Actions\Report\Export\PendingActivityFilters;
use App\Actions\Report\Export\RegisteredCourses;
use App\Exports\GenerateExcelFromTemplate;
use App\Http\Controllers\Controller;
use App\Models\Base\Campus;
use App\Models\Base\Circuit;
use App\Models\Base\Course;
use App\Models\Base\District;
use App\Models\Base\Ethnicity;
use App\Models\Base\Gender;
use App\Models\Base\Group;
use App\Models\Base\IdentificationType;
use App\Models\Base\Office;
use App\Models\Base\Position;
use App\Models\Base\Region;
use App\Models\Base\SectionalCouncil;
use App\Models\Base\Specialty;
use App\Models\Base\Validity;
use App\Models\Entity;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Illuminate\Support\Facades\Storage;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReportsController extends Controller
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

    /**
     * Formatear informacion a cargar en el excel [[a,b,c],[a,b,c]]
     *
     * @param object $dataFormat
     * @return array
     */
    private static function  parseDataExcel(object $dataFormat): array
    {
        $dataReturn = [];
        foreach ($dataFormat as $key => $row) {
            array_push($dataReturn, array_values((array)$row));
        }
        return $dataReturn;
    }

    private static function  parseDataExcelTwo(object $dataFormat): array
    {
        $dataReturn = [];
        $dataCons = [];
        $i = 1;
        foreach ($dataFormat as $key => $row) {
            array_push($dataCons, $i++);
            array_push($dataReturn, array_values((array)$row));
        }
        return [
            'data' => $dataReturn,
            'cons' => $dataCons 
        ];
    }
    /**
     * Generar grafica
     *
     * @param array $data_pie
     * @param [type] $legends
     * @return string
     */
    private function setGrafica(array $data_pie, $legends) : string
    {
        //Generando la grafica: 470x340
        $graph = new \PieGraph(470, 340);
        $graph->ClearTheme();
        $graph->SetMargin(0, 0,0,0);
        $graph->SetAntiAliasing();

        // $data_pie = [$asistentes->Convocados, $asistentes->Cantidad_asistentes];
        $p1 = new \PiePlot($data_pie);
        $p1->value->Show();
        $p1->value->SetFont(FF_ARIAL, FS_NORMAL, 12);
        $p1->SetSize(0.3);
        $p1->SetCenter(0.5, 0.47);

        // $legends = ["Nro Asistentes ($data_pie[0])", "Nro Convocados ($data_pie[1])"];
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

        $imgFile = storage_path('app/public/'.$this->folder_save.'/' . $graph_name);
        $graph->img->Stream($imgFile);

        return $imgFile;
    } 
    /**
     * Buscar categorias por plan
     */
    public function getFilterCategory(Request $request)
    {
        $sql = " SELECT DISTINCT c.id, c.name FROM category c 
                INNER JOIN categories_origin co ON(c.id = co.category_id)
                INNER JOIN origin o ON (co.origin_id = o.id) 
                WHERE c.id IS NOT NULL ";
        if($request->type == 0){
        }else if($request->type == 1){
            $sql .= " AND c.category_parent_id IS NULL";
        }else{
            $sql .= " AND c.category_parent_id IS NOT NULL";
        }
        if ($request->origin_id) {
            $sql .= " AND o.id = ".$request->origin_id;
        }
        
        $category = DB::select(DB::raw($sql));

        return response()->json([
            'status' => true,
            'message' => 'Categorias obtenidas exitosamente',
            'data' => ['categories' => $category]
        ]);
    }

    /**
     * filtar cursos para el autocompleta de reportes
     *
     * @param Request $request
     * @return void
     */
    public function getCourseFilters(Request $request)
    {
        $courses = Course::select(
                    'course.id AS value',
                    'coursebase.name as label',
                    'course.campus_id'
                    )
                    ->join('coursebase', 'course.coursebase_id', 'coursebase.id')
                    ->join('campus', 'course.campus_id', 'campus.id')
                    ->join('category', 'course.category_id', 'category.id')
                    ->join('origin', 'course.origin_id', 'origin.id');
        if(!empty($request->validity_id)){
            $courses->where('origin.validity_id', $request->validity_id);
        }
        if(!empty($request->origin_id)){
            $courses->where('course.origin_id', $request->origin_id);
        }
        if(!empty($request->subcategory_id)){
            $courses->where('category.id', $request->subcategory_id);
        }
        if(!empty($request->campus_id)){
            $courses->where('course.campus_id', $request->campus_id);
        }
        if(!empty($request->category_id)){
            $courses->whereRaw('(course.category_id = ? OR category.category_parent_id = ?)', [$request->category_id, $request->category_id]);
        }
        $courses = $courses->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Cursos  obtenidos exitosamente.',
            'data' => ['courses' => $courses]
        ]);
    }

    /**
     * Filtros generales para reportes SGA
     *
     * @param string $type
     * @return void
     */
    public function getFiltersDiscente(string $type = null)
    {
        return response()->json([
            'status' => true,
            'message' => 'Cursos  obtenidos exitosamente.',
            'data' => [
                'identificationTypes' => IdentificationType::all()->toArray(),
                'sectionalCouncils' => SectionalCouncil::all()->toArray(),
                'specialties' => Specialty::all()->toArray(),
                'districts' => District::all()->toArray(),
                'circuits' =>  Circuit::all()->toArray(),
                'regions' => Region::all()->toArray(),
            ]
        ]);
    }

    /**
     * Obtener grupos por curso
     */
    public function getFilterGroups(Request $request)
    {
        $groups = Group::select('id AS value', 'name AS label')
            ->where('course_id',$request->course_id)->get()->toArray();
        return response()->json([
            'status' => true,
            'message' => 'Cursos  obtenidos exitosamente.',
            'data' => ['groups' => $groups]
        ]);
    }

    /**
     * Obtener listado de usuarios por rol
     *
     * @param Request $request
     * @return void
     */
    public function getUserFilters(Request $request)
    {
        if($request->rol == 'coordinator'){
            $sql = "SELECT 				
                        users.id AS 'value',
                        users.firstname AS 'primer_nombre',
                        users.middlefirstname AS 'segundo_nombre',
                        users.lastname AS 'primer_apellido', 
                        users.middlelastname AS 'segundo_apellido',
                        CONCAT_WS(' ', users.firstname, users.middlefirstname, users.lastname, users.middlelastname) AS 'label'
                    FROM user_role_course urc 
                    LEFT JOIN user_role ur ON urc.user_role_id = ur.id 
                    LEFT JOIN users ON ur.user_id = users.id
                    WHERE ur.role_id = 2 AND urc.inscription_status_id = 1";
        }

        $users = DB::select(DB::raw($sql));
        return response()->json([
            'status' => true,
            'message' => 'Usuarios obtenidos exitosamente.',
            'data' => ['users' => $users]
        ]);
    }

    /**
     * Obtener filtros multicriterio
     */
    public function getFiltersMulticriteria(): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => 'información obtenida exitosamente.',
            'data' => [
                'validities' => Validity::all()->toArray(),
                'campus' => Campus::all()->toArray(),
                'identificationTypes' => IdentificationType::all()->toArray(),
                'genders' => Gender::all()->toArray(),
                'ethnicities' => Ethnicity::all()->toArray(),
                'entities' => Entity::all()->toArray(),
                'positions' => Position::all()->toArray(),
                'sectionalCouncils' => SectionalCouncil::all()->toArray(),
                'specialties' => Specialty::all()->toArray(),
                'districts' => District::all()->toArray(),
                'circuits' =>  Circuit::all()->toArray(),
                'regions' => Region::all()->toArray(),
                'offices' => Office::all()->toArray(),
                'columnas' => MulticriteriaFilters::getArrayColumns(),
            ]
        ]);
    }

    /**
     * Reporte Consolidado de actos academicos
     * Reporte # 2
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function exportConsolidatedEvents(Request $request): JsonResponse
    {
        try {
            $filters = [
                'start_date' => $request->query('start_date'),
                'finish_date' => $request->query('finish_date'),
            ];

            $data = ConsolidatedEvents::handle((object)$filters);
            $dataDefault = $this->parseDataExcel((object)$data);

            $params = [
                '{current_date}' => date('d/m/Y h:i:s a'),
                '{title}' => 'CONSOLIDADO DE ACTOS ACADÉMICOS',
                '[[headers]]' => new ExcelParam(ARRAY2D_TYPE, [array(
                    'LOGÍSTICA',
                    'COORDINADOR',
                    'PROGRAMA',
                    'SUBPROGRAMA',
                    'ACTO ACADÉMICO',
                    'SEDE',
                    'FECHA INICIO',
                    'FECHA FINAL',
                    'NÚMERO DE DISCENTES PROYECTADOS',
                    'NÚMERO DE ASISTENTES AL ACTO ACADÉMICO'
                )], function (CallbackParam $param) {
                    $sheet = $param->sheet;
                    $sheet->getStyle($param->coordinate)->getFont()->setBold(true);
                    $sheet->getStyle($param->coordinate)->getFont()->setSize(10);
                    // $sheet->getStyle($param->coordinate)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFB5FFA8');
                }),
                '[[data]]' => new ExcelParam(ARRAY2D_TYPE, $dataDefault),
            ];

            // $extra_params = Filters::getHeaders($filters);
            // $params = array_merge($params, $extra_params);

            $file = GenerateExcelFromTemplate::runDefault(
                'exports/Reporte_plantilla_basica.xlsx',
                $this->folder_save,
                $params,
                'consolidado_actos_academicos',
                [],
                false,
                [],
                ['primary' => $this->colorPrimary, 'secondary' => $this->colorSecondary]
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
                'url' => null,
            ], 423);
        }
    }

    /**
     * Reporte Actividades academicas
     * Reporte # 3
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function exportAcademicActivities(Request $request): JsonResponse
    {
        try {

            // $filters = [
            //     'start_date' => $request->query('start_date'),
            //     'finish_date' => $request->query('finish_date'),
            //     'origin_id' => $request->query('origin_id'),
            //     'programa_id' => $request->query('programa_id'),
            //     'subprograma_id' => $request->query('subprograma_id'),
            //     'campus_id' => $request->query('campus_id'),
            //     'course_id' => $request->query('course_id'),
            //     'modulo_id' => $request->query('modulo_id'),
            // ];

            $data = AcademicActivities::handle((object)$request->all());
            $dataDefault = $this->parseDataExcel((object)$data);

            $params = [
                '{current_date}' => date('d/m/Y h:i:s a'),
                '{title}' => 'ACTIVIDADES ACADÉMICAS FECHAS PROGRAMADAS',
                '[[headers]]' => new ExcelParam(ARRAY2D_TYPE, [array(
                    // 'ID PLAN DE FORMACIÓN',
                    'VIGENCIA',
                    'PLAN DE FORMACIÓN',
                    // 'ID PROGRAMA',
                    'PROGRAMA',
                    'SUBPROGRAMA',
                    // 'ID CURSO',
                    'CURSO',
                    'ESTADO CURSO',
                    // 'ID SEDE',
                    'SEDE',
                    'FECHA',
                    'CANT ENTRADAS',
                    // 'ID MODULO',
                    'MODULO',
                    'TIPO DOCUMENTO COORDINADOR',
                    'DOCUMENTO COORDINADOR',
                    'NOMBRE COORDINADOR',
                    'USUARIO COORDINADOR'
                )], function (CallbackParam $param) {
                    $sheet = $param->sheet;
                    $sheet->getStyle($param->coordinate)->getFont()->setBold(true);
                    $sheet->getStyle($param->coordinate)->getFont()->setSize(10);
                }),
                '[[data]]' => new ExcelParam(ARRAY2D_TYPE, $dataDefault),
            ];

            // $extra_params = Filters::getHeaders($filters);
            // $params = array_merge($params, $extra_params);

            $file = GenerateExcelFromTemplate::runDefault(
                'exports/Reporte_plantilla_basica.xlsx',
                $this->folder_save,
                $params,
                'actividades_academicas_fechas_programadas',
                [],
                false,
                [],
                ['primary' => $this->colorPrimary, 'secondary' => $this->colorSecondary]
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
                'url' => null,
                'error' => $th,
            ], 423);
        }
    }

    /**
     * Reporte Asistentes con horas asistidas por fechas
     * Reporte # 4
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function exportHoursOfAssistance(Request $request): JsonResponse
    {
        try {
            // $filters = [
            //     'start_date' => $request->query('start_date'),
            //     'finish_date' => $request->query('finish_date'),
            //     'origin_id' => $request->query('origin_id'),
            //     'programa_id' => $request->query('programa_id'),
            //     'subprograma_id' => $request->query('subprograma_id'),
            //     'campus_id' => $request->query('campus_id'),
            //     'course_id' => $request->query('course_id'),
            //     'type_identification' => $request->query('type_identification'),
            //     'identification' => $request->query('identification'),
            //     'sectional_council_id' => $request->query('sectional_council_id'),
            //     'district_id' => $request->query('district_id'),
            //     'circuit_id' => $request->query('circuit_id'),
            //     'region_id' => $request->query('region_id'),
            //     'municipality_id' => $request->query('municipality_id'),
            //     'specialty_id' => $request->query('specialty_id'),
            // ];

            $data = HoursOfAssistance::handle((object)$request->all());
            $dataDefault = $this->parseDataExcel((object)$data);

            $params = [
                '{current_date}' => date('d/m/Y h:i:s a'),
                '{title}' => 'ASISTENTES CON HORAS ASISTENCIA POR FECHA DE CURSO',
                '[[headers]]' => new ExcelParam(ARRAY2D_TYPE, [array(
                    'PLAN DE FORMACIÓN',
                    'PROGRAMA',
                    'SUBPROGRAMA',
                    // 'ID CURSO',
                    'CURSO',
                    'SEDE',
                    'TIPO DOCUMENTO COORDINADOR',
                    'NÚMERO DE IDENTIFICACIÓN COORDINADOR',
                    'NOMBRE COORDINADOR',
                    'USUARIO COORDINADOR',
                    'TIPO DOCUMENTO DISCENTE',
                    'NÚMERO DE IDENTIFICACIÓN DISCENTE',
                    'USUARIO DISCENTE',
                    // 'ID DISCENTE',
                    'PRIMER APELLIDO',
                    'SEGUNDO APELLIDO',
                    'PRIMER NOMBRE',
                    'SEGUNDO NOMBRE',
                    'PAÍS',
                    'DEPARTAMENTO',
                    'CIUDAD/MUNICIPIO',
                    'GÉNERO',
                    'ETNIA',
                    'FECHA NACIMIENTO',
                    'CORREO',
                    'TELÉFONO',
                    'ESPECIALIDAD',
                    'CARGO',
                    'CONSEJO',
                    'ENTIDAD',
                    'DESPACHO',
                    'DEPENDENCIA',
                    'DISTRITO',
                    'CIRCUITO',
                    'DEPARTAMENTO',
                    'CIUDAD',
                    'TIPO USUARIO',
                    'FECHA PREINSCRIPCIÓN',
                    'OBSERVACIONES',
                    'FECHA SESIÓN',
                    'ENTRADAS SESIÓN',
                    'HORAS ASISTIDAS',
                )], function (CallbackParam $param) {
                    $sheet = $param->sheet;
                    $sheet->getStyle($param->coordinate)->getFont()->setBold(true);
                    $sheet->getStyle($param->coordinate)->getFont()->setSize(10);
                    // $sheet->getStyle($param->coordinate)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFB5FFA8');
                }),
                '[[data]]' =>  new ExcelParam(ARRAY2D_TYPE, $dataDefault),
            ];

            // $extra_params = Filters::getHeaders($filters);
            // $params = array_merge($params, $extra_params);

            $file = GenerateExcelFromTemplate::runDefault(
                'exports/Reporte_plantilla_basica.xlsx',
                $this->folder_save,
                $params,
                'asistentes_horas_asistidas_por_fecha_curso',
                [],
                false,
                [],
                ['primary' => $this->colorPrimary, 'secondary' => $this->colorSecondary]
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
                'url' => null,
                'error' => $th
            ], 423);
        }
    }

    /**
     * Reporte DISCENTES ASISTENTES DE TODOS LOS CURSOS REGISTRADOS EN EL SISTEMA CON ID DE LISTAS
     * Reporte # 5
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function exportAttendeesOfAllCourses(Request $request): JsonResponse
    {
        try {

            // $filters = [
            //     'start_date' => $request->query('start_date'),
            //     'finish_date' => $request->query('finish_date'),
            //     'origin_id' => $request->query('origin_id'),
            //     'programa_id' => $request->query('programa_id'),
            //     'subprograma_id' => $request->query('subprograma_id'),
            //     'campus_id' => $request->query('campus_id'),
            //     'course_id' => $request->query('course_id'),
            //     'type_identification' => $request->query('type_identification'),
            //     'identification' => $request->query('identification'),
            //     'lastname' => $request->query('lastname'),
            //     'middlelastname' => $request->query('middlelastname'),
            //     'firstname' => $request->query('firstname'),
            //     'middlefirstname' => $request->query('middlefirstname'),
            //     'sectional_council_id' => $request->query('sectional_council_id'),
            //     'district_id' => $request->query('district_id'),
            //     'circuit_id' => $request->query('circuit_id'),
            //     'region_id' => $request->query('region_id'),
            //     'municipality_id' => $request->query('municipality_id'),
            //     'specialty_id' => $request->query('specialty_id'),
            // ];

            $data = AttendeesOfAllCourses::handle((object)$request->all());
            $dataDefault = $this->parseDataExcel((object)$data);

            $params = [
                '{current_date}' => date('d/m/Y h:i:s a'),
                '{title}' => 'DISCENTES ASISTENTES DE TODOS LOS CURSOS REGISTRADOS EN EL SISTEMA CON ID DE LISTAS',
                '[[headers]]' => new ExcelParam(ARRAY2D_TYPE, [array(
                    'PLAN DE FORMACIÓN',
                    'PROGRAMA',
                    'SUBPROGRAMA',
                    'CURSO',
                    'SEDE',
                    'FECHA INICIO',
                    'FECHA FIN',
                    'ESTADO DEL CURSO',
                    //Coordinador
                    'TIPO DE DOCUMENTO COORDINADOR',
                    'NÚMERO DE DOCUMENTO COORDINADOR',
                    'NOMBRE DEL COORDINADOR',
                    'USUARIO COORDINADOR',
                    //Discente
                    'TIPO IDENTIFICACIÓN DISCENTE',
                    'NÚMERO DE IDENTIFICACIÓN DISCENTE',
                    'USUARIO DISCENTE',
                    'PRIMER APELLIDO DISCENTE',
                    'SEGUNDO APELLIDO DISCENTE',
                    'PRIMER NOMBRE DISCENTE',
                    'SEGUNDO NOMBRE DISCENTE',
                    'PAÍS',
                    'DEPARTAMENTO',
                    'CIUDAD/MUNICIPIO',
                    'GÉNERO',
                    'ETNIA',
                    'FECHA DE NACIMIENTO',
                    'CORREO ELECTRÓNICO',
                    'TELÉFONO',
                    //Curriculum
                    'ESPECIALIDAD',
                    'CARGO',
                    'CONSEJO SECCIONAL',
                    'ENTIDAD',
                    'DESPACHO',
                    'DEPENDENCIA',
                    'DISTRITO',
                    'CIRCUITO',
                    'DEPARTAMENTO LABORA',
                    'CIUDAD LABORA',
                    'TIPO USUARIO',
                    //Inscripción
                    'OBSERVACIONES',
                    'FECHA PREINSCRIPCIÓN',
                    'ENTRADAS',
                    'HORAS ASISTIDAS',
                )], function (CallbackParam $param) {
                    $sheet = $param->sheet;
                    $sheet->getStyle($param->coordinate)->getFont()->setBold(true);
                    $sheet->getStyle($param->coordinate)->getFont()->setSize(10);
                }),
                '[[data]]' => new ExcelParam(ARRAY2D_TYPE, $dataDefault),
            ];

            // $extra_params = Filters::getHeaders($filters);
            // $params = array_merge($params, $extra_params);

            $file = GenerateExcelFromTemplate::runDefault(
                'exports/Reporte_plantilla_basica.xlsx',
                $this->folder_save,
                $params,
                'asistentes_de_todos_los_cursos',
                [],
                false,
                [],
                ['primary' => $this->colorPrimary, 'secondary' => $this->colorSecondary]
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
                'url' => null,
            ], 423);
        }
    }

    /**
     * Reporte LISTADO DE CURSOS REGISTRADOS EN EL SISTEMA
     * Reporte # 6
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function exportRegisteredCourses(Request $request) : JsonResponse
    {
        try {

            // $filters = [
            //     'start_date' => $request->query('start_date'),
            //     'finish_date' => $request->query('finish_date'),
            //     'origin_id' => $request->query('origin_id'),
            //     'programa_id' => $request->query('programa_id'),
            //     'subprograma_id' => $request->query('subprograma_id'),
            //     'campus_id' => $request->query('campus_id'),
            //     'course_id' => $request->query('course_id'),
            //     'modulo_id' => $request->query('modulo_id'),
            // ];

            $data = RegisteredCourses::handle((object)$request->all());
            $dataDefault = $this->parseDataExcel((object)$data);

            $params = [
                '{current_date}' => date('d/m/Y h:i:s a'),
                '{title}' => 'LISTADO DE CURSOS REGISTRADOS EN EL SISTEMA',
                '[[headers]]' => new ExcelParam(ARRAY2D_TYPE, [array(
                    // 'ID CURSO',
                    'COORDINADOR',
                    'PROGRAMA',
                    'SUBPROGRAMA',
                    'SEDE',
                    'CURSO',
                    'ESTADO CURSO',
                    'FECHA INICIAL',
                    'FECHA FINAL',
                    'PLAN DE FORMACIÓN',
                    'CANT CONVOCADOS',
                    'CANT PREINSCRITOS',
                    'CANT ADMITIDOS',
                    'CANT RECHAZADOS',
                    'SIN REGISTRO DE ASISTENCIA',
                    'CANT ASISTENTES',
                    'CANT ASISTENTES HOMBRES',
                    'CANT ASISTENTES MUJERES',
                    'CANT ASISTENTES OTROS',
                    'CANT ENTRADAS',
                )], function (CallbackParam $param) {
                    $sheet = $param->sheet;
                    $sheet->getStyle($param->coordinate)->getFont()->setBold(true);
                    $sheet->getStyle($param->coordinate)->getFont()->setSize(10);
                }),
                '[[data]]' => new ExcelParam(ARRAY2D_TYPE, $dataDefault),
            ];

            // $extra_params = Filters::getHeaders($filters);
            // $params = array_merge($params, $extra_params);

            $file = GenerateExcelFromTemplate::runDefault(
                'exports/Reporte_plantilla_basica.xlsx',
                $this->folder_save,
                $params,
                'cursos_registrados_en_el_sistema',
                [],
                false,
                [],
                ['primary' => $this->colorPrimary, 'secondary' => $this->colorSecondary]
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
                'url' => null,
                'error' => $th
            ], 423);
        }
    }


    /**
     * Reporte LISTADO DE FORMADORES ASIGNADOS EN ACTIVIDADES ACADÉMICAS
     * Reporte # 7
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function exportAssignedTrainers(Request $request) : JsonResponse
    {
        try {

            // $filters = [
            //     'start_date' => $request->query('start_date'),
            //     'finish_date' => $request->query('finish_date'),
            //     'origin_id' => $request->query('origin_id'),
            //     'programa_id' => $request->query('programa_id'),
            //     'subprograma_id' => $request->query('subprograma_id'),
            //     'campus_id' => $request->query('campus_id'),
            //     'course_id' => $request->query('course_id'),
            //     'type_identification' => $request->query('type_identification'),
            //     'identification' => $request->query('identification'),
            //     'lastname' => $request->query('lastname'),
            //     'middlelastname' => $request->query('middlelastname'),
            //     'firstname' => $request->query('firstname'),
            //     'middlefirstname' => $request->query('middlefirstname'),
            //     'sectional_council_id' => $request->query('sectional_council_id'),
            //     'district_id' => $request->query('district_id'),
            //     'circuit_id' => $request->query('circuit_id'),
            //     'region_id' => $request->query('region_id'),
            //     'municipality_id' => $request->query('municipality_id'),
            //     'specialty_id' => $request->query('specialty_id'),
            // ];

            $data = AssignedTrainers::handle((object)$request->all());
            $dataDefault = $this->parseDataExcel((object)$data);

            $params = [
                '{current_date}' => date('d/m/Y h:i:s a'),
                '{title}' => 'LISTADO DE FORMADORES ASIGNADOS EN ACTIVIDADES ACADÉMICAS',
                '[[headers]]' => new ExcelParam(ARRAY2D_TYPE, [array(
                    'TIPO DOCUMENTO',
                    'DOCUMENTO',
                    'PRIMER NOMBRE',
                    'SEGUNDO NOMBRE',
                    'PRIMER APELLIDO',
                    'SEGUNDO APELLIDO',
                    'FECHA NACIMIENTO',
                    'GENERO',
                    'ETNIA',
                    'CORREO',
                    'TELEFONO',
                    'ESPECIALIDAD',
                    'CARGO',
                    'DESPACHO',
                    'JUZGADO',
                    'CONSEJO',
                    'DISTRITO',
                    'CIRCUITO',
                    'CIUDAD',
                    'ID CURSO',
                    'NOMBRE CURSO',
                    'PROGRAMA',
                )], function (CallbackParam $param) {
                    $sheet = $param->sheet;
                    $sheet->getStyle($param->coordinate)->getFont()->setBold(true);
                    $sheet->getStyle($param->coordinate)->getFont()->setSize(10);
                }),
                '[[data]]' => new ExcelParam(ARRAY2D_TYPE, $dataDefault),
            ];

            // $extra_params = Filters::getHeaders($filters);
            // $params = array_merge($params, $extra_params);

            $file = GenerateExcelFromTemplate::runDefault(
                'exports/Reporte_plantilla_basica.xlsx',
                $this->folder_save,
                $params,
                'formadores_asignados_en_actividades_academicas',
                [],
                false,
                [],
                ['primary' => $this->colorPrimary, 'secondary' => $this->colorSecondary]
            );

            return response()->json([
                'status' => true,
                'message' => 'Reporte generado exitosamente',
                'url' => $file,
            ]);
        } catch (Exception $th) {
            // dd($th);
            return response()->json([
                'status' => False,
                'message' => 'Reporte no pudo ser generado',
                'url' => null,
                'th' => $th,
            ], 423);
        }
    }
     
    /**
     * Reporte REPORTE DE ACTIVIDADES REALIZADAS VS ACTIVIDADES PROGRAMADAS
     * Reporte # 10
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function exportActivitiesCarriedOutAndScheduled(Request $request) : JsonResponse
    {
        try {

            // $filters = [
            //     'start_date' => $request->query('start_date'),
            //     'finish_date' => $request->query('finish_date'),
            //     'origin_id' => $request->query('origin_id'),
            //     'programa_id' => $request->query('programa_id'),
            //     'subprograma_id' => $request->query('subprograma_id'),
            //     'campus_id' => $request->query('campus_id')
            // ];

            $data = ActivitiesCarriedOutAndScheduled::handle((object)$request->all());
            $filterData = collect($data);
            $programados = collect([]);
            $finalizados = collect([]);
            $fileGrafica = null;
            if($filterData->count()){
                $programados = $filterData->filter(function ($value, $key) {
                    return ($value->course_states_id == 1 || $value->course_states_id == 2 || $value->course_states_id == null);
                });
                $finalizados = $filterData->filter(function ($value, $key) {
                    return ($value->course_states_id == 4);
                });
                $fileGrafica = $this->setGrafica(
                    [$programados->count(), $finalizados->count()], 
                    ["Actividades Programadas (".$programados->count().")", "Actividades Realizadas (".$finalizados->count().")"]
                );
            }


            // dd($programados->toArray());
            
            $params = [
                '{grafica}' => $fileGrafica,
                '{current_date}' => date('d/m/Y h:i:s a'),
                '[prog_id]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($programados->toArray(), 'id')),
                '[prog_nombres]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($programados->toArray(), 'acto_academico')),
                '[real_id]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($finalizados->toArray(), 'id')),
                '[real_nombres]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($finalizados->toArray(), 'acto_academico')),
            ];


            $callbacks = [
                '{grafica}' => function (CallbackParam $param) {
                    if(!empty($param->param)){
                        $sheet = $param->sheet;
                        $cell_coordinate = $param->coordinate;
                        $drawing = new Drawing();
                        $drawing->setPath($param->param);
                        $drawing->setCoordinates($cell_coordinate);
                        $drawing->setWorksheet($sheet);
                        // Clear cell, which must contain just an image
                        $sheet->getCell($cell_coordinate)->setValue(null);
                    }
                },
            ];

            $file = GenerateExcelFromTemplate::run(
                'exports/reporte_actividades_programadas_realizadas.xlsx',
                $this->folder_save,
                $params,
                'Reporte_actividades_programadas_realizadas',
                $callbacks
            );
            Storage::delete($fileGrafica);
            return response()->json([
                'status' => true,
                'message' => 'Reporte generado exitosamente',
                'url' => $file,
            ]);
        } catch (Exception $th) {
            // dd($th);
            return response()->json([
                'status' => False,
                'message' => 'Reporte no pudo ser generado',
                'url' => null
            ], 423);
        }
    }

    /**
     * REPORTE MULTICRITERIO DE DISCENTES ADMITIDOS, RECHAZADOS, PREINSCRITOS, NO ASISTENTES Y ASISTENTES
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function exportMulticriteriaInscribedFilters(Request $request) : JsonResponse
    {
        try {

            // $filters = [
            //     'origin_id' => $request->query('origin_id'),
            //     'programa_id' => $request->query('programa_id'),
            //     'subprograma_id' => $request->query('subprograma_id'),
            //     'campus_id' => $request->query('campus_id'),
            //     'course_id' => $request->query('course_id'),
            //     'start_date' => $request->query('start_date'),
            //     'finish_date' => $request->query('finish_date'),

            //     'type_identification' => $request->query('type_identification'),
            //     'identification' => $request->query('identification'),
            //     'lastname' => $request->query('lastname'),
            //     'middlelastname' => $request->query('middlelastname'),
            //     'firstname' => $request->query('firstname'),
            //     'middlefirstname' => $request->query('middlefirstname'),

            //     'sectional_council_id' => $request->query('sectional_council_id'),
            //     'district_id' => $request->query('district_id'),
            //     'circuit_id' => $request->query('circuit_id'),
            //     'region_id' => $request->query('region_id'),
            //     'municipality_id' => $request->query('municipality_id'),
            //     'specialty_id' => $request->query('specialty_id'),
            // ];

            $preinscritos = MulticriteriaInscribedFilters::handle((object)$request->all(), null);
            $admitidos = MulticriteriaInscribedFilters::handle((object)$request->all(), 'admitidos');
            $rechazados = MulticriteriaInscribedFilters::handle((object)$request->all(), 'rechazados');
            $sinAsistencia = MulticriteriaInscribedFilters::handle((object)$request->all(), 'sin-asistencia');
            // $data = MulticriteriaInscribedFilters::handle((object)$filters, 'asistentes');
            
            $data = $this->parseDataExcelTwo((object) $preinscritos);
            $preinscritos = [
                '[PREidCurso]' => new ExcelParam(ARRAY_TYPE, $data['cons']),
                '[[Preinscritos]]' => new ExcelParam(ARRAY2D_TYPE, $data['data']),
            ];
            $data = $this->parseDataExcelTwo((object) $admitidos);
            $admitidos = [
                '[ADMidCurso]' => new ExcelParam(ARRAY_TYPE, $data['cons']),
                '[[Admitidos]]' => new ExcelParam(ARRAY2D_TYPE, $data['data']),
            ];
            $data = $this->parseDataExcelTwo((object) $rechazados);
            $rechazados = [
                '[RECidCurso]' => new ExcelParam(ARRAY_TYPE, $data['cons']),
                '[[Rechazados]]' => new ExcelParam(ARRAY2D_TYPE, $data['data']),
            ];
            $data = $this->parseDataExcelTwo((object) $sinAsistencia);
            $sinAsistencia = [
                '[NOAidCurso]' => new ExcelParam(ARRAY_TYPE, $data['cons']),
                '[[NoAsistentes]]' => new ExcelParam(ARRAY2D_TYPE, $data['data']),
            ];

            $headers = [array(
                'Curso',
                'Fecha inicio', 
                'Fecha fin', 
                'Sede', 
                'Programa', 
                // 'Modulo', 
                // 'Recurso inversión', 
                'Vigencia', 
                'Coordinador', 
                'Tipo identificación', 
                'Número de documento', 
                'Usuario', 
                'Primer nombre', 
                'Segundo nombre', 
                'Primer apellido', 
                'Segundo apellido', 
                'Fecha de nacimiento', 
                'Género', 
                'Correo electrónico', 
                'Teléfono', 
                'Especialidad', 
                'Cargo', 
                'Despacho', 
                'Dependencia', 
                'Corporación Juzgado Entidad', 
                'Concejo seccional', 
                'Distrito', 
                'Circuito', 
                'Departamento Laboral', 
                'Ciudad Laboral', 
                'Tipo de usuario'
            )];

            $fg = [
                '[t_pre]' => 30,
                '{current_date}' => date('d/m/Y h:i:s a'),
                '{filtro_fec_inicial}' => $request->query('fecha_inicio'),
                '{filtro_fec_final}' => $request->query('fecha_fin'),
                '[[Headers]]' => new ExcelParam(ARRAY2D_TYPE, $headers)
            ];
            $extra_params = []; //Filters::getHeaders($filters);
            $params = array_merge($fg, $preinscritos, $admitidos, $rechazados, $sinAsistencia, $extra_params);

            $events = [
                PhpExcelTemplator::AFTER_INSERT_PARAMS => function (Worksheet $sheet, array $templateVarsArr) {
    
                    $sheet->mergeCells('D6:G6');
                    $sheet->mergeCells('I6:J6');
                    $sheet->mergeCells('L6:M6');
                    $sheet->mergeCells('O6:R6');
                    $sheet->mergeCells('T6:W6');
                    $sheet->mergeCells('AB6:AE6');
                    
                    $sheet->mergeCells('B8:AE8');
                    $sheet->mergeCells('H1:AE2');
                    $sheet->mergeCells('I3:AB3');
                    $sheet->mergeCells('AC3:AC4');
                    $sheet->mergeCells('AD3:AE4');
    
                    $max_row = $sheet->getHighestRow();
    
                    for ($i = 12; $i < $max_row; $i++) {
                        $coordenadas = "B" . $i;
                        if ($sheet->getCell($coordenadas)->getValue() == "{tit_admitidos}") {
                            $sheet->getCell($coordenadas)->setValue("Discentes Admitidos");
                            $sheet->mergeCells("B$i:AE$i");
                        }
    
                        if ($sheet->getCell($coordenadas)->getValue() == "{tit_rechazados}") {
                            $sheet->getCell($coordenadas)->setValue("Discentes Rechazados");
                            $sheet->mergeCells("B$i:AE$i");
                        }
    
                        if ($sheet->getCell($coordenadas)->getValue() == "{tit_noasistentes}") {
                            $sheet->getCell($coordenadas)->setValue("Discentes No Asistieron");
                            $sheet->mergeCells("B$i:AE$i");
                        }
                    }
    
                    $lg_cell = 40;
                    $md_cell = 18;
                    //$sheet->getColumnDimension('D')->setAutoSize(true);
                    $sheet->getColumnDimension('C')->setWidth($lg_cell);
                    $sheet->getColumnDimension('G')->setWidth($lg_cell);
                    $sheet->getColumnDimension('AE')->setWidth($lg_cell);
    
                    $mayusculas = array('D', 'E', 'F', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AI');
                    foreach ($mayusculas as $coor) {
                        $sheet->getColumnDimension($coor)->setWidth($md_cell);
                    }
                },
            ];

            $file = GenerateExcelFromTemplate::run(
                'exports/reporte_multicriterio_inscritos.xlsx',
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
        } catch (Exception $th) {
            return response()->json([
                'status' => False,
                'message' => 'Reporte no pudo ser generado',
                'url' => null
            ], 423);
        } 
    }

    /**
     * REPORTE ACTIVIDADES PENDIENTES POR REALIZAR CIERRE DE EVENTO
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function exportActivitiesPendingClosingEvent(Request $request) : JsonResponse
    {
        try {

            // $filters = [
            //     'start_date' => $request->query('start_date'),
            //     'finish_date' => $request->query('finish_date'),
            //     'origin_id' => $request->query('origin_id'),
            //     'programa_id' => $request->query('programa_id'),
            //     'subprograma_id' => $request->query('subprograma_id'),
            //     'campus_id' => $request->query('campus_id'),
            //     'user_id' => $request->query('user_id'),
            // ];

            $data = PendingActivityFilters::getNotCloseEvent((object)$request->all());
            $dataDefault = $this->parseDataExcel((object)$data);

            $params = [
                '{current_date}' => date('d/m/Y h:i:s a'),
                '{title}' => 'REPORTE ACTIVIDADES PENDIENTES POR REALIZAR CIERRE DE EVENTO',
                '[[headers]]' => new ExcelParam(ARRAY2D_TYPE, [array(
                    'NOMBRE CURSO',
                    'ESTADO CURSO',
                    'FECHA INICIO',
                    'FECHA FIN',
                    'SEDE',
                    'PROGRAMA',
                    'VIGENCIA',
                    'COORDINADOR',
                )], function (CallbackParam $param) {
                    $sheet = $param->sheet;
                    $sheet->getStyle($param->coordinate)->getFont()->setBold(true);
                    $sheet->getStyle($param->coordinate)->getFont()->setSize(10);
                }),
                '[[data]]' => new ExcelParam(ARRAY2D_TYPE, $dataDefault),
            ];

            // $extra_params = Filters::getHeaders($filters);
            // $params = array_merge($params, $extra_params);

            $file = GenerateExcelFromTemplate::runDefault(
                'exports/Reporte_plantilla_basica.xlsx',
                $this->folder_save,
                $params,
                'actividades_pendientes_cierre_evento',
                [],
                false,
                [],
                ['primary' => $this->colorPrimary, 'secondary' => $this->colorSecondary]
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
                'url' => null,
                'th' => $th,
            ], 423);
        }
    }

    /**
     * REPORTE ACTIVIDADES PENDIENTES POR ASIGNAR FORMADOR
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function exportActivitiesPendingAssignmentTrainer(Request $request) : JsonResponse
    {
        try {

            // $filters = [
            //     'start_date' => $request->query('start_date'),
            //     'finish_date' => $request->query('finish_date'),
            //     'origin_id' => $request->query('origin_id'),
            //     'programa_id' => $request->query('programa_id'),
            //     'subprograma_id' => $request->query('subprograma_id'),
            //     'campus_id' => $request->query('campus_id'),
            //     'user_id' => $request->query('user_id'),
            // ];

            $data = PendingActivityFilters::getActivitiesNotTrainer((object)$request->all());
            $dataDefault = $this->parseDataExcel((object)$data);

            $params = [
                '{current_date}' => date('d/m/Y h:i:s a'),
                '{title}' => 'REPORTE ACTIVIDADES PENDIENTES POR ASIGNAR FORMADOR',
                '[[headers]]' => new ExcelParam(ARRAY2D_TYPE, [array(
                    'NOMBRE CURSO',
                    'ESTADO CURSO',
                    'FECHA INICIO',
                    'FECHA FIN',
                    'SEDE',
                    'PROGRAMA',
                    'VIGENCIA',
                    'COORDINADOR',
                )], function (CallbackParam $param) {
                    $sheet = $param->sheet;
                    $sheet->getStyle($param->coordinate)->getFont()->setBold(true);
                    $sheet->getStyle($param->coordinate)->getFont()->setSize(10);
                }),
                '[[data]]' => new ExcelParam(ARRAY2D_TYPE, $dataDefault),
            ];

            // $extra_params = Filters::getHeaders($filters);
            // $params = array_merge($params, $extra_params);

            $file = GenerateExcelFromTemplate::runDefault(
                'exports/Reporte_plantilla_basica.xlsx',
                $this->folder_save,
                $params,
                'actividades_pendientes_asignar_formador',
                [],
                false,
                [],
                ['primary' => $this->colorPrimary, 'secondary' => $this->colorSecondary]
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
                'url' => null,
                // 'th' => $th,
            ], 423);
        }
    }

    /**
     * REGISTRO EXTRAORDINARIO
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function exportExtraordinaryRecord(Request $request) : JsonResponse
    {
        try {

            $filters = [
                'course_id' => $request->query('course_id'),
                'group_id' => $request->query('group_id'),
            ];

            $courses = AcademicRecord::getCourses((object) $filters);
            $filters['isExtraordinary'] = true;
            $discentes = AcademicRecord::getDiscentes((object) $filters);
            if(!count($discentes)){
                return response()->json([
                    'status' => false,
                    'message' => 'No se encontaron registros extraordinarios',
                    'url' => '',
                ]);
            }
            $teachers = AcademicRecord::getTeachers($courses->category_id);
            $teachersData = null;
            foreach ($teachers as $key => $value) {
                $teachersData.= $value->firstname .' '.$value->middlefirstname.' '.$value->lastname.' '.$value->middlelastname.PHP_EOL;
            }
            
            $params = [
                '{current_date}' => date('d/m/Y h:i:s a'),
                '{title}' => 'REPORTE REGISTRO EXTRAORDINARIO',
                '{zona}' => '',
                '{sede}' => $courses->campus,
                '{sitio}' => '',
                '{grupo}' => $courses->grupo,
                '{formadores}' => $teachersData,
                '{coordinador}' => $courses->coordinator,
                '{cantidad_asistentes}' => count($discentes),
                '{fecha_inicio}' => $courses->start_date,
                '{fecha_fin}' => $courses->finish_date,
                '{programa}' => $courses->programa,
                '{subprograma}' => $courses->subprograma,
                '{curso}' => $courses->course,
                '[tipo_documento]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($discentes, 'identification_type')),
                '[documento]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($discentes, 'identification')),
                '[discente]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($discentes, 'discente')),
                '[email]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($discentes, 'email')),
                '[cargo]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($discentes, 'position')),
                '[entidad]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($discentes, 'entity')),
                '[circuito]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($discentes, 'circuit')),
                '[distrito]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($discentes, 'district')),
                '[consejo]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($discentes, 'sectionalCouncil')),
                '[ciudad]' => new ExcelParam(SPECIAL_ARRAY_TYPE, array_column($discentes, 'municipality'))
            ];

            $file = GenerateExcelFromTemplate::run(
                'exports/reporte_registro_extraordinario.xlsx',
                $this->folder_save,
                $params,
                'reporte_registro_extraordinario',
                [],
                false
            );

            return response()->json([
                'status' => true,
                'message' => 'Reporte generado exitosamente',
                'url' => $file,
            ]);
        } catch (Exception $th) {
            // log::debug($th);
            return response()->json([
                'status' => False,
                'message' => 'Reporte no pudo ser generado',
                'url' => null
            ], 423);
        }
    }

    public function jxMulticriteriaFilters(Request $request)
    {
        // Log::debug($request->all());
        if(!$request->custom_columns){
            $request->custom_columns = 'groups,campus,category,start_date,coordinator,validity,identification_type,identification,firstname,middlefirstname,lastname,middlelastname,gender,ethnicity,position,office,specialty,sectional_council,district,circuit,birthplace_munic';
        }
        // $columns =  explode(',', $request->custom_columns);
        $data = MulticriteriaFilters::handle((object) $request->all());
        
        return response()->json([
            'status' => true,
            'message' => 'Participantes obtenidos exitosamente',
            'data' => ['participants' => $data]
        ]);

    }

    public function exportMulticriteriaFilters(Request $request)
    {
        // Log::debug($request->all());
        if(!$request->custom_columns){
            $request->custom_columns = 'groups,campus,category,start_date,coordinator,validity,identification_type,identification,firstname,middlefirstname,lastname,middlelastname,gender,ethnicity,position,office,specialty,sectional_council,district,circuit,birthplace_munic';
        }
        $data = MulticriteriaFilters::handle((object) $request->all());
        // $columns = $request->custom_columns;
        $columns =  explode(',', $request->custom_columns);
        $participantes = [];

        foreach ($data as $key => $row) {
            array_push($participantes, array_values((array)$row));
        }
        
        $base_columns=MulticriteriaFilters::getArrayColumns();
        $aux_cr=[];
        foreach($base_columns as $column){
            if(in_array($column["value"], $columns)){
                array_push($aux_cr,$column["label"]);
            }
        }

        $events = [
            PhpExcelTemplator::AFTER_INSERT_PARAMS => function (Worksheet $sheet, array $templateVarsArr) {
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
            },
        ];

        $params = [
            '[[encabezados]]' => new ExcelParam(ARRAY2D_TYPE, [$aux_cr]),
            '[[datos]]' => new ExcelParam(ARRAY2D_TYPE, $participantes),
        ];
        $file = GenerateExcelFromTemplate::run(
            'exports/reporte_multicriterio.xlsx',
            $this->folder_save,
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

    /**
     * Reporte Inconsistencias en la asistencia
     * Reporte # 15
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function exportInconsistencies(Request $request): JsonResponse
    {
        try {

            $data = Inconsistencies::handle((object)$request->all());
            $dataDefault = $this->parseDataExcel((object)$data);

            if(!$data){
                return response()->json([
                    'status' => False,
                    'message' => 'No se encontraron resultados.',
                    'url' => null,
                ], 423);
            }

            $params = [
                '{current_date}' => date('d/m/Y h:i:s a'),
                '{title}' => 'Reporte de horas inconsistentes por actividad académica',
                '[[headers]]' => new ExcelParam(ARRAY2D_TYPE, [array(
                    'CURSO',
                    'FECHA INICIO',
                    'FECHA FIN',
                    'SEDE',
                    'PROGRAMA',
                    'COORDINADOR',
                    'TIPO DOCUMENTO',
                    'DOCUMENTO',
                    'DISCENTE',
                    'FECHA SESIÓN',
                    'HORA ENTRADA 1',
                    'HORA SALIDA 1',
                    'HORA ENTRADA 2',
                    'HORA SALIDAD 2'
                )], function (CallbackParam $param) {
                    $sheet = $param->sheet;
                    $sheet->getStyle($param->coordinate)->getFont()->setBold(true);
                    $sheet->getStyle($param->coordinate)->getFont()->setSize(10);
                }),
                '[[data]]' => new ExcelParam(ARRAY2D_TYPE, $dataDefault),
            ];

            // $extra_params = Filters::getHeaders($filters);
            // $params = array_merge($params, $extra_params);

            $file = GenerateExcelFromTemplate::runDefault(
                'exports/Reporte_plantilla_basica.xlsx',
                $this->folder_save,
                $params,
                'horas_inconsistentes_por_actividad',
                [],
                false,
                [],
                ['primary' => $this->colorPrimary, 'secondary' => $this->colorSecondary]
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
                'url' => null,
                'error' => $th,
            ], 423);
        }
    }

}
