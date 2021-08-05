<?php

namespace App\Actions\Report\Export;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AttendeesOfAllCourses
{
    /**
     * AttendeesOfAllCourses
     *
     * @param object $filters
     * @return array
     */
    public static function handle(object $filters): array
    {
        $sql = "SELECT
                    plan.name AS 'PLAN DE FORMACIÓN',
                    (CASE 
                        WHEN programasub.category_parent_id IS NOT NULL 
                        THEN (SELECT c.name FROM category c WHERE c.id = programasub.category_parent_id)
                        ELSE programasub.name
                    END) AS 'PROGRAMA',
                    (CASE 
                        WHEN programasub.category_parent_id IS NOT NULL 
                        THEN programasub.name 
                        ELSE ''
                    END) AS 'SUBPROGRAMA',
                    coursebase.name AS 'CURSO',
                    sede.name AS 'SEDE',
                    DATE_FORMAT(course.start_date, '%Y-%m-%d') AS 'FECHA INICIO CURSO',
                    DATE_FORMAT(course.finish_date, '%Y-%m-%d') AS 'FECHA FIN CURSO',
                    estado_curso.name AS 'ESTADO DEL CURSO',
                    -- Coordinador
                    coordinador.tipo_doc AS 'TIPO DE DOCUMENTO COORDINADOR',
                    coordinador.identification AS 'NÚMERO DE DOCUMENTO COORDINADOR',
                    CONCAT_WS(' ', coordinador.firstname, coordinador.middlefirstname, coordinador.lastname, coordinador.middlelastname) AS 'NOMBRE DEL COORDINADOR',
                    coordinador.username AS 'USUARIO COORDINADOR',
                    -- Discente
                    tipo_doc_disc.name AS 'TIPO IDENTIFICACIÓN DISCENTE',
                    discente.identification AS 'NÚMERO DE IDENTIFICACIÓN DISCENTE',
                    discente.username AS 'USUARIO DISCENTE',
                    discente.lastname AS 'PRIMER APELLIDO DISCENTE',
                    discente.middlelastname AS 'SEGUNDO APELLIDO DISCENTE',
                    discente.firstname AS 'PRIMER NOMBRE DISCENTE',
                    discente.middlefirstname AS 'SEGUNDO NOMBRE DISCENTE',
                    pais_disc.name AS 'PAÍS',
                    departamento_disc.name AS 'DEPARTAMENTO',
                    municipio_disc.name AS 'CIUDAD/MUNICIPIO',
                    genero_disc.name AS 'GÉNERO',
                    etnia_disc.name AS 'ETNIA',
                    discente.birthday AS 'FECHA DE NACIMIENTO',
                    discente.email AS 'CORREO ELECTRÓNICO',
                    discente.phone AS 'TELÉFONO',
                    -- Información de curriculum
                    especialidad.name AS 'ESPECIALIDAD', 
                    cargo.name AS 'CARGO',
                    consejo_seccional.name AS 'CONSEJO SECCIONAL',
                    entidad.name AS 'ENTIDAD',
                    despacho.name AS 'DESPACHO',
                    dependencia.name AS 'DEPENDENCIA',
                    distrito.name AS 'DISTRITO',
                    circuito.name AS 'CIRCUITO',
                    departamento_lab.name AS 'DEPARTAMENTO LABORA',
                    municipio_lab.name AS 'CIUDAD LABORA',
                    (CASE WHEN entidad.is_judicial = 1 then 'Usuario interno'
                        ELSE 'Usuario externo'
                    END) AS 'Tipo usuario', 
                    -- Información de inscripción
                    preinscripcion.observation AS 'OBSERVACIONES',
                    preinscripcion.created_at AS 'FECHA PREINSCRIPCIÓN',
                    resumen_asistencia.cantidad_entradas AS 'ENTRADAS',
                    resumen_asistencia.horas_asistidas AS 'HORAS ASISTIDAS'
                FROM user_role_course AS preinscripcion 
                LEFT JOIN course ON preinscripcion.course_id = course.id
                LEFT JOIN course_states estado_curso ON course.course_states_id = estado_curso.id
                LEFT JOIN (
                    SELECT urc.course_id, u.*, it.name AS tipo_doc
                    FROM user_role_course urc 
                    LEFT JOIN user_role ur ON urc.user_role_id = ur.id 
                    LEFT JOIN users u ON ur.user_id = u.id
                    LEFT JOIN identification_type it ON u.identification_type_id = it.id 
                    WHERE 
                        ur.role_id = 2 -- rol coordinador
                ) AS coordinador ON coordinador.course_id = course.id
                LEFT JOIN campus AS sede ON course.campus_id = sede.id
                LEFT JOIN category AS programasub ON course.category_id = programasub.id
                LEFT JOIN coursebase ON course.coursebase_id = coursebase.id
                LEFT JOIN origin AS plan ON course.origin_id = plan.id
                INNER JOIN `group` AS grupo ON course.id = grupo.course_id
                INNER JOIN user_role_group urg ON grupo.id = urg.group_id
                INNER JOIN (
                    SELECT course.id AS id_curso, asistencia.user_role_group_id, 
                    COUNT(asistencia.id) AS cantidad_entradas, 
                    -- SUM(TIMEDIFF(asistencia.closing_time, asistencia.start_time)) AS horas_asistidas 
                    -- ROUND(SUM(TIMESTAMPDIFF(MINUTE , asistencia.start_time, asistencia.closing_time))/60) AS horas_asistidas 
                    ROUND(COALESCE(SUM(TIMESTAMPDIFF(MINUTE , asistencia.start_time, asistencia.closing_time))/60, 0) + COALESCE(SUM(TIMESTAMPDIFF(MINUTE , asistencia.start_time_night , asistencia.closing_time_night))/60, 0)) AS horas_asistidas
                    FROM course
                    INNER JOIN `group` AS grupo ON course.id = grupo.course_id
                    INNER JOIN `session` AS sesion ON grupo.id = sesion.group_id
                    INNER JOIN assistance_session AS asistencia ON sesion.id = asistencia.session_id 
                    GROUP BY course.id, asistencia.user_role_group_id
                ) AS resumen_asistencia ON course.id = resumen_asistencia.id_curso AND urg.id = resumen_asistencia.user_role_group_id
                INNER JOIN user_role ur ON urg.user_role_id = ur.id AND preinscripcion.user_role_id = ur.id AND ur.role_id IN(5, 9) -- Discentes
                INNER JOIN users AS discente ON ur.user_id = discente.id
                LEFT JOIN identification_type AS tipo_doc_disc ON discente.identification_type_id = tipo_doc_disc.id
                LEFT JOIN municipality AS municipio_disc ON discente.birthplace_municipality_id = municipio_disc.id
                LEFT JOIN region AS departamento_disc ON municipio_disc.region_id = departamento_disc.id
                LEFT JOIN country AS pais_disc ON departamento_disc.country_id = pais_disc.id
                LEFT JOIN gender AS genero_disc ON discente.gender_id = genero_disc.id
                LEFT JOIN ethnicity AS etnia_disc ON discente.ethnicity_id = etnia_disc.id
                -- Curriculum
                LEFT JOIN curriculum AS curriculum ON discente.id = curriculum.user_id AND preinscripcion.curriculum_id = curriculum.id
                LEFT JOIN specialty AS especialidad ON curriculum.specialty_id = especialidad.id
                LEFT JOIN `position` AS cargo ON curriculum.position_id = cargo.id
                LEFT JOIN sectional_council AS consejo_seccional ON curriculum.sectional_council_id = consejo_seccional.id 
                LEFT JOIN entity AS entidad ON curriculum.entity_id = entidad.id
                LEFT JOIN office AS despacho ON curriculum.office_id = despacho.id
                LEFT JOIN dependence AS dependencia ON curriculum.dependence_id = dependencia.id
                LEFT JOIN district AS distrito ON curriculum.district_id = distrito.id
                LEFT JOIN circuit AS circuito ON curriculum.circuit_id = circuito.id 
                LEFT JOIN municipality AS municipio_lab ON curriculum.municipality_id = municipio_lab.id
                LEFT JOIN region AS departamento_lab ON municipio_lab.region_id = departamento_lab.id
                WHERE urg.status_id IN(1) AND preinscripcion.inscription_status_id IN(1) ";
        

        
        if (@$filters->start_date && @$filters->finish_date) {
            $sql .= " AND ( course.start_date BETWEEN '" . $filters->start_date . "' AND '" . $filters->finish_date . "' OR 
                            course.finish_date BETWEEN '" . $filters->start_date . "' AND '" . $filters->finish_date . "')";
        }
        if (@$filters->validity_id) {
            $sql .= " AND plan.validity_id = '" . $filters->validity_id . "'";
        }
        if (@$filters->origin_id) {
            $sql .= " AND plan.id = '" . $filters->origin_id . "'";
        }
        if (@$filters->programa_id) {
            $sql .= " AND (programasub.id = '" . $filters->programa_id . "' OR programasub.category_parent_id = '" . $filters->programa_id . "')";
        }
        if (@$filters->subprograma_id) {
            $sql .= " AND programasub.id = '" . $filters->subprograma_id . "'";
        }
        if (@$filters->campus_id) {
            $sql .= " AND campus.id = '" . $filters->campus_id . "'";
        }
        if (@$filters->course_id) {
            $sql .= " AND course.id = '" . $filters->course_id . "'";
        }
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
            $sql .= " AND municipio_lab.region_id = '" . $filters->region_id . "'";
        }
        if (@$filters->municipality_id) {
            $sql .= " AND curriculum.municipality_id = '" . $filters->municipality_id . "'";
        }
        if (@$filters->specialty_id) {
            $sql .= " AND curriculum.specialty_id = '" . $filters->specialty_id . "'";
        }
        // Log::debug($sql);
        return DB::select(DB::raw($sql));
    }
}
