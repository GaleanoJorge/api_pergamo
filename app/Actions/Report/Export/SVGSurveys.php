<?php

namespace App\Actions\Report\Export;

use App\Models\Base\Course;
use App\Models\Base\Question;
use App\Models\Base\SurveyInstance;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SVGSurveys
{

    /**
     * getSVGSurveyTrainer
     *
     * @param object $filters
     * @return array
     */
    public static function getSVGSurveyTrainer(object $filters): array
    {
        $sql = "SELECT SQL_CALC_FOUND_ROWS cr.*
                FROM ( SELECT 
                    -- si.id AS survey_id,
                    -- ss.id AS section_id,
                    DISTINCT 
                    si.course_id,
                    ss.user_role_id,
                    (CASE 
                        WHEN programasub.category_parent_id IS NOT NULL 
                        THEN (SELECT c.name FROM category c WHERE c.id = programasub.category_parent_id)
                        ELSE programasub.name
                    END) AS category,
                    -- (CASE 
                    --     WHEN programasub.category_parent_id IS NOT NULL 
                    --     THEN programasub.name 
                    --     ELSE ''
                    -- END) AS subcategory,
                    c2.name AS course,
                    c3.name AS campus,
                    DATE_FORMAT(c.start_date, '%Y-%m-%d') AS 'start_date',
                    DATE_FORMAT(c.finish_date, '%Y-%m-%d') AS 'finish_date',
                    it.name AS identification_type,
                    u.identification,
                    u.firstname,
                    u.middlefirstname,
                    u.lastname,
                    u.middlelastname 
                FROM survey_instance si 
                INNER JOIN course c ON si.course_id = c.id 
                INNER JOIN coursebase c2 ON c.coursebase_id = c2.id 
                INNER JOIN campus c3 ON c.campus_id = c3.id 
                INNER JOIN survey s ON si.survey_id = s.id 
                INNER JOIN survey_sections ss ON s.id = ss.survey_id 
                INNER JOIN user_role ur ON ss.user_role_id = ur.id 
                INNER JOIN users u ON ur.user_id = u.id 
                INNER JOIN identification_type it ON u.identification_type_id = it.id 
                INNER JOIN category programasub ON programasub.id = si.category_id 
                WHERE ss.user_role_id IS NOT NULL ";
        
        if (@$filters->start_date && @$filters->finish_date) {
            $sql .= " AND ( si.dt_init BETWEEN '" . $filters->start_date . "' AND '" . $filters->finish_date . "' OR 
                            si.dt_finish BETWEEN '" . $filters->start_date . "' AND '" . $filters->finish_date . "')";
        }
        if (@$filters->course_id) {
            $sql .= " AND c.id = ".$filters->course_id." ";
        }
        if (@$filters->identification_type) {
            $sql .= " AND u.identification_type_id = ".$filters->identification_type." ";
        }
        if (@$filters->identification) {
            $sql .= " AND u.identification = ".$filters->identification." ";
        }

        if (@$filters->pagination) {
            $per_page = $filters->per_page;
            $page = ($filters->current_page > 1) ? (($filters->current_page-1)* $per_page)."," :" ";

            $sql .= ") AS cr LIMIT {$page} {$per_page} ";

            $result["data"] = DB::select(DB::raw($sql));
            $result["total"] = DB::select(DB::raw("SELECT FOUND_ROWS() AS cuenta"))[0]->cuenta;
            $result["per_page"] = $per_page;
            $result["current_page"] = $filters->current_page;
        }else{        
            $sql .= ") AS cr";
            $result = DB::select(DB::raw($sql));
        }

        // Log::debug($sql);
        return $result;
    }

    public static function getSVGSurveyCourses(object $filters): array
    {
        $sql = "SELECT SQL_CALC_FOUND_ROWS cr.*
                    FROM ( SELECT 
                        -- si.id AS survey_id,
                        -- ss.id AS section_id,
                        -- ss.user_role_id,
                        DISTINCT 
                        si.course_id,
                        (CASE
                            WHEN programasub.category_parent_id IS NOT NULL THEN (
                                SELECT c.name FROM category c WHERE c.id = programasub.category_parent_id)
                            ELSE programasub.name
                        END) AS category,
                        c2.name AS course,
                        c3.name AS campus,
                        CONCAT_WS(' ', coordinador.firstname, coordinador.middlefirstname, coordinador.lastname, coordinador.middlelastname) AS 'coordinator',
                        DATE_FORMAT(c.start_date, '%Y-%m-%d') AS 'start_date',
                        DATE_FORMAT(c.finish_date, '%Y-%m-%d') AS 'finish_date'
                    FROM survey_instance si 
                    INNER JOIN course c ON si.course_id = c.id 
                    INNER JOIN coursebase c2 ON c.coursebase_id = c2.id                 
                    LEFT JOIN (
                        SELECT urc.course_id, u.*, it.name AS tipo_doc
                        FROM user_role_course urc 
                        LEFT JOIN user_role ur ON urc.user_role_id = ur.id 
                        LEFT JOIN users u ON ur.user_id = u.id
                        LEFT JOIN identification_type it ON u.identification_type_id = it.id 
                        WHERE 
                            ur.role_id = 2 -- rol coordinador
                    ) AS coordinador ON coordinador.course_id = c.id
                    INNER JOIN campus c3 ON c.campus_id = c3.id 
                    INNER JOIN survey s ON si.survey_id = s.id 
                    -- INNER JOIN survey_sections ss ON s.id = ss.survey_id 
                    INNER JOIN category programasub ON programasub.id = si.category_id 
                    WHERE c.id IS NOT NULL";

        if (@$filters->start_date && @$filters->finish_date) {
            $sql .= " AND ( si.dt_init BETWEEN '" . $filters->start_date . "' AND '" . $filters->finish_date . "' OR 
                            si.dt_finish BETWEEN '" . $filters->start_date . "' AND '" . $filters->finish_date . "')";
        }
        if (@$filters->course_id) {
            $sql .= " AND c.id = ".$filters->course_id." ";
        }

        if (@$filters->pagination) {
            $per_page = $filters->per_page;
            $page = ($filters->current_page > 1) ? (($filters->current_page-1)* $per_page)."," :" ";

            $sql .= ") AS cr LIMIT {$page} {$per_page} ";

            $result["data"] = DB::select(DB::raw($sql));
            $result["total"] = DB::select(DB::raw("SELECT FOUND_ROWS() AS cuenta"))[0]->cuenta;
            $result["per_page"] = $per_page;
            $result["current_page"] = $filters->current_page;
        }else{        
            $sql .= ") AS cr";
            $result = DB::select(DB::raw($sql));
        }

        return $result;
    }


    public static function getTabulationSurvey(object $filters): array
    {
        $sql = "SELECT SQL_CALC_FOUND_ROWS cr.*
                    FROM ( SELECT 
                            DISTINCT 
                            si.course_id,
                            CONCAT_WS(' ', coordinador.firstname, coordinador.middlefirstname, coordinador.lastname, coordinador.middlelastname) AS 'coordinator',
                            c3.name AS campus,
                            (CASE
                                WHEN programasub.category_parent_id IS NOT NULL THEN (
                                    SELECT c.name FROM category c WHERE c.id = programasub.category_parent_id)
                                ELSE programasub.name
                            END) AS category,
                            c2.name AS course,
                            c2.name AS course_name,
                            COALESCE(c.quota, 0) as 'quota',
                            COALESCE(num_discentes.cantidad, 0) as 'quantity',
                            DATE_FORMAT(c.start_date, '%Y-%m-%d') AS 'start_date',
                            DATE_FORMAT(c.finish_date, '%Y-%m-%d') AS 'finish_date',
                            '' AS 'zone'
                        FROM survey_instance si 
                        INNER JOIN course c ON si.course_id = c.id 
                        INNER JOIN coursebase c2 ON c.coursebase_id = c2.id                 
                        LEFT JOIN (
                            SELECT urc.course_id, u.*, it.name AS tipo_doc
                            FROM user_role_course urc 
                            LEFT JOIN user_role ur ON urc.user_role_id = ur.id 
                            LEFT JOIN users u ON ur.user_id = u.id
                            LEFT JOIN identification_type it ON u.identification_type_id = it.id 
                            WHERE 
                                ur.role_id = 2 -- rol coordinador
                        ) AS coordinador ON coordinador.course_id = c.id
                        INNER JOIN campus c3 ON c.campus_id = c3.id 
                        INNER JOIN survey s ON si.survey_id = s.id 
                        INNER JOIN category programasub ON programasub.id = si.category_id 
                        LEFT JOIN (
                            SELECT urc.course_id, count(urc.id) AS 'cantidad' 
                            from user_role_course urc 
                            INNER JOIN user_role ur ON urc.user_role_id = ur.id 
                            INNER JOIN users u ON ur.user_id = u.id
                            WHERE ur.role_id in (5,9) -- rol discente
                            GROUP by urc.course_id 
                        ) AS num_discentes ON c.id = num_discentes.course_id
                        WHERE c.id IS NOT NULL";

        if (@$filters->start_date && @$filters->finish_date) {
            $sql .= " AND ( si.dt_init BETWEEN '" . $filters->start_date . "' AND '" . $filters->finish_date . "' OR 
                            si.dt_finish BETWEEN '" . $filters->start_date . "' AND '" . $filters->finish_date . "')";
        }
        if (@$filters->course_id) {
            $sql .= " AND c.id = ".$filters->course_id." ";
        }

        if (@$filters->pagination) {
            $per_page = $filters->per_page;
            $page = ($filters->current_page > 1) ? (($filters->current_page-1)* $per_page)."," :" ";

            $sql .= ") AS cr LIMIT {$page} {$per_page} ";

            $result["data"] = DB::select(DB::raw($sql));
            $result["total"] = DB::select(DB::raw("SELECT FOUND_ROWS() AS cuenta"))[0]->cuenta;
            $result["per_page"] = $per_page;
            $result["current_page"] = $filters->current_page;
        }else{        
            $sql .= ") AS cr";
            $result = DB::select(DB::raw($sql));
        }

        return $result;
    }
    
    /**
     * Consultar columnas para el reporte de evaluacion formadores
     *
     * @param string $type
     * @return void
     */
    public static function getColumnsTrainers(string $type = 'trainers', string $length)
    {
        $columns = [];
        if($type ===  'trainers'){
            $columns = Question::select('question.id AS question_id', 'question.name AS questions')
                        ->Join('survey_sections', 'question.section_id', 'survey_sections.section_id')
                        ->whereRaw('survey_sections.user_role_id IS NOT NULL')
                        ->distinct()->get();
        }else{
            $columns = Question::select('question.id AS question_id', 'question.name AS questions')
                        ->Join('survey_detail', 'question.id', 'survey_detail.question_id')
                        ->Join('survey_sections', 'survey_detail.survey_section_id', 'survey_sections.id')
                        ->whereRaw('survey_sections.user_role_id IS NULL')
                        ->distinct()->get();
        }
        $dataColumns = [];
        foreach ($columns as $key => $value) {
            $dataColumns[] = [
                'value'=> 'survey_'.$value->question_id,
                'label'=> (strlen($value->questions) > 50 && $length === 'cut')? substr($value->questions, 0, 50).'...' : $value->questions
            ];
        }
        return $dataColumns;
    }

    /**
     * Calcular promedio por pregunta de un formador por curso, sesion y encuesta
     *
     * @param integer $courseId
     * @param integer $surveyId
     * @param integer $sectionId
     * @param integer $userRoleId
     * @return Collection
     */
    public static function getDataAVG(int $courseId, int $sectionId, int $userRoleId) : Collection
    {
        $survey = SurveyInstance::select(
                    DB::raw('COUNT(sd.id) AS cant_answer'), 
                    DB::raw('(COUNT(sd.id)*a.value) AS avg_answer'), 
                    'sd.question_id', 
                    'sd.section_id',
                    'sd.answer_id AS answer',
                    'a.value AS value_answer',
                    'q.name AS questions'
                )
                ->Join('survey AS s', 'survey_instance.survey_id', 's.id')
                ->Join('survey_sections AS ss', 's.id', 'ss.survey_id')
                ->Join('survey_detail AS sd', 'ss.id', 'sd.survey_section_id')
                ->Join('question AS q', 'sd.question_id', 'q.id')
                ->Join('answer AS a', 'sd.answer_id', 'a.id')
                ->where('survey_instance.course_id', $courseId);
        if($sectionId){
            $survey = $survey->where('sd.section_id', $sectionId);
        }
        if($userRoleId){
            $survey = $survey->where('ss.user_role_id', $userRoleId);
        }
        $survey = $survey->where('a.value', '>', '0')
                ->groupBy('sd.question_id', 'sd.answer_id')
                ->get();
        return $survey;
    }

    public static $custom_columns = [
        ['value' => 'category', 'label' => 'Programa'],
        ['value' => 'course', 'label' => 'Curso'],
        ['value' => 'campus', 'label' => 'Sede'],
        ['value' => 'start_date', 'label' => 'Fecha Inicio'],
        ['value' => 'finish_date', 'label' => 'Fecha Fin'],
        ['value' => 'identification_type', 'label' => 'Tipo Identificación'],
        ['value' => 'identification', 'label' => 'Identificación'],
        ['value' => 'firstname', 'label' => 'Primer Nombre'],
        ['value' => 'middlefirstname', 'label' => 'Segundo Nombre'],
        ['value' => 'lastname', 'label' => 'Primer Apellido'],
        ['value' => 'middlelastname', 'label' => 'Segundo Apellido'],
    ];

    public static $custom_columns_course = [
        ['value' => 'category', 'label' => 'Programa'],
        ['value' => 'course', 'label' => 'Curso'],
        ['value' => 'campus', 'label' => 'Sede'],
        ['value' => 'start_date', 'label' => 'Fecha Inicio'],
        ['value' => 'finish_date', 'label' => 'Fecha Fin'],
        ['value' => 'coordinator', 'label' => 'Coordinador'],
    ];

    public static function getCourses($filters)
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
        /*
            if(!empty($filters->validity_id)){
                $courses->where('origin.validity_id', $filters->validity_id);
            }
            if(!empty($filters->origin_id)){
                $courses->where('course.origin_id', $filters->origin_id);
            }
            if(!empty($filters->subcategory_id)){
                $courses->where('category.id', $filters->subcategory_id);
            }
            if(!empty($filters->campus_id)){
                $courses->where('course.campus_id', $filters->campus_id);
            }
            if(!empty($filters->category_id)){
                $courses->whereRaw('(course.category_id = ? OR category.category_parent_id = ?)', [$filters->category_id, $filters->category_id]);
            }
        */
        return $courses->get()->toArray();
    } 
}
