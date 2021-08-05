<?php

namespace App\Actions\Report\Export;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MulticriteriaFilters
{

    /**
     * MulticriteriaFilters
     *
     * @param object $filters
     * @return array
     */
    public static function handle(object $filters): array
    {
        
        $filters->custom_columns =  explode(',', $filters->custom_columns);

        if(count($filters->custom_columns)>0){
            $base_columns=static::getArrayColumns();

            $select_sql=[];
            foreach($base_columns as $column){
                if(in_array($column["value"], $filters->custom_columns)){
                    array_push($select_sql,$column["value"]);
                }
            }

            $aux_select_sql=implode(', cr.',$select_sql);

            $int_select_sql = implode(', ',array_column($base_columns,'sql'));
        }
        $sql = "SELECT SQL_CALC_FOUND_ROWS {$aux_select_sql}
                FROM ( SELECT DISTINCT {$int_select_sql}
                FROM user_role_course
                INNER JOIN course ON user_role_course.course_id = course.id
                INNER JOIN coursebase ON course.coursebase_id = coursebase.id
                INNER JOIN origin ON course.origin_id = origin.id
                INNER JOIN validity ON origin.validity_id = validity.id
                LEFT JOIN (
                    SELECT urc.course_id, u.id, CONCAT_WS(' ', u.firstname, u.middlefirstname, u.lastname, u.middlelastname) as 'name'
                    FROM user_role_course urc
                    LEFT JOIN user_role ur ON urc.user_role_id = ur.id
                    LEFT JOIN users u ON ur.user_id = u.id
                    WHERE ur.role_id = 2 -- rol coordinador
                ) AS coordinator ON coordinator.course_id = course.id
                INNER JOIN `group` AS groups ON course.id = groups.course_id
                INNER JOIN user_role ON user_role.id = user_role_course.user_role_id
                INNER JOIN users ON users.id = user_role.user_id
                INNER JOIN user_role_group AS urg ON urg.group_id = groups.id AND urg.user_role_id = user_role.id
                INNER JOIN (
                    SELECT asistencia.user_role_group_id AS id, 
                    COUNT(asistencia.id) AS cantidad_entradas, 
                    -- ROUND(SUM(TIMESTAMPDIFF(MINUTE , asistencia.start_time, asistencia.closing_time))/60) AS total_hours 
                    ROUND(COALESCE(SUM(TIMESTAMPDIFF(MINUTE , asistencia.start_time, asistencia.closing_time))/60, 0) + COALESCE(SUM(TIMESTAMPDIFF(MINUTE , asistencia.start_time_night , asistencia.closing_time_night))/60, 0)) AS total_hours
                    FROM course
                    INNER JOIN `group` AS grupo ON course.id = grupo.course_id
                    INNER JOIN `session` AS sesion ON grupo.id = sesion.group_id
                    INNER JOIN assistance_session AS asistencia ON sesion.id = asistencia.session_id 
                    GROUP BY asistencia.user_role_group_id
                ) AS resumen_asistencia ON urg.id = resumen_asistencia.id
                INNER JOIN gender ON gender.id = users.gender_id
                INNER JOIN ethnicity ON users.ethnicity_id = ethnicity.id
                INNER JOIN identification_type it ON(users.identification_type_id = it.id)
                INNER JOIN curriculum ON curriculum.user_id = users.id AND user_role_course.curriculum_id = curriculum.id
                LEFT JOIN municipality AS birthplace_munic ON birthplace_munic.id = users.birthplace_municipality_id 
                LEFT JOIN campus ON course.campus_id = campus.id
                LEFT JOIN category AS programasub ON course.category_id = programasub.id
                LEFT JOIN entity ON entity.id = curriculum.entity_id
                LEFT JOIN position ON position.id = curriculum.position_id
                LEFT JOIN office ON office.id = curriculum.office_id
                LEFT JOIN specialty ON specialty.id = curriculum.specialty_id
                LEFT JOIN municipality ON municipality.id = curriculum.municipality_id
                LEFT JOIN circuit ON circuit.id = curriculum.circuit_id
                LEFT JOIN district ON district.id = curriculum.district_id
                LEFT JOIN sectional_council ON sectional_council.id = curriculum.sectional_council_id ";

        $sql .= " WHERE course.id IS NOT NULL ";
        
        if (@$filters->start_date && @$filters->finish_date) {
            $sql .= " AND ( course.start_date BETWEEN '" . $filters->start_date . "' AND '" . $filters->finish_date . "' OR 
                            course.finish_date BETWEEN '" . $filters->start_date . "' AND '" . $filters->finish_date . "')";
        }
        
        // Informacion academica
        if (@$filters->validity_id) {
            $sql .= " AND origin.validity_id = '" . $filters->validity_id . "'";
        }
        if (@$filters->origin_id) {
            $sql .= " AND origin.id = '" . $filters->origin_id . "'";
        }
        if (@$filters->programa_id) {
            $sql .= " AND (programasub.id = '" . $filters->programa_id . "' OR programasub.category_parent_id = '" . $filters->programa_id . "')";
        }
        // if (@$filters->subprograma_id) {
        //     $sql .= " AND programasub.id = '" . $filters->subprograma_id . "'";
        // }
        if (@$filters->campus_id) {
            $sql .= " AND campus.id = '" . $filters->campus_id . "'";
        }
        if (@$filters->coordinator_id) {
            $sql .= " AND coordinator.id = '" . $filters->coordinator_id . "'";
        }
        if (@$filters->course_id) {
            $sql .= " AND course.id = '" . $filters->course_id . "'";
        }
        if (@$filters->group_id) {
            $sql .= " AND groups.id = '" . $filters->group_id . "'";
        }
        
        // Informacion del discente
        if (@$filters->type_identification) {
            $sql .= " AND discente.identification_type_id = '" . $filters->type_identification . "'";
        }
        if (@$filters->identification) {
            $sql .= " AND discente.identification LIKE '%" . $filters->identification . "%'";
        }
        if (@$filters->lastname) {
            $sql .= " AND discente.lastname LIKE '%" . $filters->lastname . "%'";
        }
        if (@$filters->middlelastname) {
            $sql .= " AND discente.middlelastname LIKE '%" . $filters->middlelastname . "%'";
        }
        if (@$filters->firstname) {
            $sql .= " AND discente.firstname LIKE '%" . $filters->firstname . "%'";
        }
        if (@$filters->middlefirstname) {
            $sql .= " AND discente.middlefirstname LIKE '%" . $filters->middlefirstname . "%'";
        }

        // Informacion laboral
        if (@$filters->entity_id) {
            $sql .= " AND curriculum.entity_id = '" . $filters->entity_id . "'";
        }
        if (@$filters->position_id) {
            $sql .= " AND curriculum.position_id = '" . $filters->position_id . "'";
        }
        if (@$filters->office_id) {
            $sql .= " AND curriculum.office_id = '" . $filters->office_id . "'";
        }
        if (@$filters->specialty_id) {
            $sql .= " AND curriculum.specialty_id = '" . $filters->specialty_id . "'";
        }
        if (@$filters->sectional_council_id) {
            $sql .= " AND curriculum.sectional_council_id = '" . $filters->sectional_council_id . "'";
        }
        if (@$filters->district_id) {
            $sql .= " AND curriculum.district_id = '" . $filters->district_id . "'";
        }
        if (@$filters->circuit_id) {
            $sql .= " AND curriculum.circuit_id = '" . $filters->circuit_id . "'";
        }
        if (@$filters->region_id) {
            $sql .= " AND municipality.region_id = '" . $filters->region_id . "'";
        }
        if (@$filters->municipality_id) {
            $sql .= " AND curriculum.municipality_id = '" . $filters->municipality_id . "'";
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

    public static function getArrayColumns(){
        return static::$custom_columns;
    }

    private static $custom_columns = array(
        array('value' => 'groups', 'label' => 'Grupo', 'sql' => 'groups.name AS groups'),
        // array('value' => 'Zona', 'label' => 'Zona', 'sql' => 'parametros_zona.strNombreParametroDeFormador as Zona'),
        array('value' => 'campus', 'label' => 'Sede', 'sql' => 'campus.name AS campus'),
        array('value' => 'category', 'label' => 'Programa', 'sql' => "(CASE 
        WHEN programasub.category_parent_id IS NOT NULL 
            THEN (SELECT c.name FROM category c WHERE c.id = programasub.category_parent_id)
            ELSE programasub.name
        END) AS 'category'"),
        // array('value' => 'Modulo', 'label' => 'Módulo', 'sql' => 'modulo.strNombre as Modulo'),
        array('value' => 'start_date', 'label' => 'Fecha Realización', 'sql' => 'course.start_date'),
        array('value' => 'coordinator', 'label' => 'Coordinador', 'sql' => 'coordinator.name AS coordinator'),
        // array('value' => 'recursos', 'label' => 'Recursos de inversión', 'sql' => 'tipo_costo.nombre as recursos'),
        array('value' => 'validity', 'label' => 'Vigencia', 'sql' => 'validity.name AS validity'),
        array('value' => 'identification_type', 'label' => 'Tipo documento', 'sql' => 'it.name as identification_type'),
        array('value' => 'identification', 'label' => 'No. Documento', 'sql' => 'users.identification'),
        // array('value' => 'TipoParticipante', 'label' => 'Tipo participante', 'sql' => 'rol.Ro_ROL as TipoParticipante'),
        array('value' => 'firstname', 'label' => 'Primer nombre', 'sql' => 'users.firstname'),
        array('value' => 'middlefirstname', 'label' => 'Segundo nombre', 'sql' => 'users.middlefirstname'),
        array('value' => 'lastname', 'label' => 'Primer apellido', 'sql' => 'users.lastname'),
        array('value' => 'middlelastname', 'label' => 'Segundo apellido', 'sql' => 'users.middlelastname'),
        array('value' => 'gender', 'label' => 'Género', 'sql' => 'gender.name AS gender'),
        array('value' => 'ethnicity', 'label' => 'Etnia', 'sql' => 'ethnicity.name AS ethnicity'),
        array('value' => 'position', 'label' => 'Cargo', 'sql' => 'position.name AS position'),
        array('value' => 'office', 'label' => 'Despacho', 'sql' => 'office.name as office'),
        array('value' => 'specialty', 'label' => 'Especialidad', 'sql' => 'specialty.name as specialty'),
        array('value' => 'sectional_council', 'label' => 'Consejo', 'sql' => 'sectional_council.name AS sectional_council'),
        array('value' => 'district', 'label' => 'Distrito', 'sql' => 'district.name as district'),
        array('value' => 'circuit', 'label' => 'Circuito', 'sql' => 'circuit.name as circuit'),
        array('value' => 'birthplace_munic', 'label' => 'Ciudad Información Básica', 'sql' => 'birthplace_munic.name AS birthplace_munic'),
        array('value' => 'municipality', 'label' => 'Ciudad Laboral', 'sql' => 'municipality.name AS  municipality'),
        array('value' => 'total_hours', 'label' => 'Horas', 'sql' => 'resumen_asistencia.total_hours as total_hours'),
        array('value' => 'course', 'label' => 'Nombre del curso', 'sql' => 'coursebase.name as course'),
        array('value' => 'entity', 'label' => 'Corporación, juzgado o entidad', 'sql' => 'entity.name as entity'),
        array('value' => 'is_judicial_branch', 'label' => 'Pertenece a la rama judicial', 'sql' => "(CASE WHEN users.is_judicial_branch = 0 THEN 'NO' ELSE 'SI' END) AS is_judicial_branch"),
    );
}
