<?php

namespace App\Actions\Report\Export;

use Illuminate\Support\Facades\DB;

class MulticriteriaInscribedFilters
{
    /**
     * handle
     *
     * @param object $filters
     * @return array
     */
    public static function handle(object $filters, string $type = null): array
    {
        $sql = "SELECT
                    coursebase.name AS 'CURSO',
                    DATE_FORMAT(course.start_date, '%Y-%m-%d') AS 'FECHA INICIO CURSO',
                    DATE_FORMAT(course.finish_date, '%Y-%m-%d') AS 'FECHA FIN CURSO',
                    sede.name AS 'SEDE',
                    (CASE 
                        WHEN programasub.category_parent_id IS NOT NULL
                        THEN (SELECT c.name FROM category c WHERE c.id = programasub.category_parent_id)
                        ELSE programasub.name
                    END) AS 'PROGRAMA',
                    vigencia.name AS 'VIGENCIA',
                    CONCAT_WS(' ', coordinador.firstname, coordinador.middlefirstname, coordinador.lastname, coordinador.middlelastname) AS 'NOMBRE DEL COORDINADOR',
                    -- DISCENTE
                    tipo_doc_disc.name AS 'TIPO IDENTIFICACIÓN DISCENTE',
                    discente.identification AS 'NÚMERO DE IDENTIFICACIÓN DISCENTE',
                    discente.username AS 'USUARIO DISCENTE',
                    discente.lastname AS 'PRIMER APELLIDO DISCENTE',
                    discente.middlelastname AS 'SEGUNDO APELLIDO DISCENTE',
                    discente.firstname AS 'PRIMER NOMBRE DISCENTE',
                    discente.middlefirstname AS 'SEGUNDO NOMBRE DISCENTE',
                    DATE_FORMAT(discente.birthday, '%Y-%m-%d') AS 'FECHA DE NACIMIENTO',
                    genero_disc.name AS 'GÉNERO',
                    discente.email AS 'CORREO ELECTRÓNICO',
                    discente.phone AS 'TELÉFONO',
                    -- Información de curriculum
                    especialidad.name AS 'ESPECIALIDAD', 
                    cargo.name AS 'CARGO',
                    despacho.name AS 'DESPACHO',
                    dependencia.name AS 'DEPENDENCIA',
                    entidad.name AS 'ENTIDAD',
                    consejo_seccional.name AS 'CONSEJO SECCIONAL',
                    distrito.name AS 'DISTRITO',
                    circuito.name AS 'CIRCUITO',
                    departamento_lab.name AS 'DEPARTAMENTO LABORA',
                    municipio_lab.name AS 'CIUDAD LABORA',
                    (CASE WHEN entidad.is_judicial = 1 then 'Usuario interno'
                        ELSE 'Usuario externo'
                    END) AS 'Tipo usuario'
                FROM user_role_course AS preinscripcion 
                INNER JOIN course ON preinscripcion.course_id = course.id
                INNER JOIN coursebase ON course.coursebase_id = coursebase.id
                INNER JOIN origin AS plan ON course.origin_id = plan.id
                INNER JOIN validity AS vigencia ON plan.validity_id = vigencia.id
                LEFT JOIN (
                    SELECT urc.course_id, u.*, it.name AS tipo_doc
                    FROM user_role_course urc 
                    LEFT JOIN user_role ur ON urc.user_role_id = ur.id 
                    LEFT JOIN users u ON ur.user_id = u.id
                    LEFT JOIN identification_type it ON u.identification_type_id = it.id 
                    WHERE ur.role_id = 2 -- rol coordinador
                ) AS coordinador ON coordinador.course_id = course.id
                LEFT JOIN campus AS sede ON course.campus_id = sede.id
                LEFT JOIN category AS programasub ON course.category_id = programasub.id
                LEFT JOIN user_role ur ON preinscripcion.user_role_id = ur.id and ur.role_id IN(5, 9) -- Discentes
                LEFT JOIN users AS discente ON ur.user_id = discente.id
                LEFT JOIN identification_type AS tipo_doc_disc ON discente.identification_type_id = tipo_doc_disc.id
                LEFT JOIN gender AS genero_disc ON discente.gender_id = genero_disc.id
                LEFT JOIN user_role_group urg ON ur.id = urg.user_role_id 
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
                WHERE course.id IS NOT NULL ";

        if($type == 'admitidos'){
            $sql .= " AND preinscripcion.inscription_status_id IN(1,3)";
        }elseif($type == 'rechazados'){
            $sql .= " AND preinscripcion.inscription_status_id IN(2)";
        }elseif($type == 'sin-asistencia'){
            $sql.= " AND urg.id NOT IN(SELECT  DISTINCT urg2.id 
            FROM user_role_group urg2 
            INNER JOIN `session` AS sesion ON(urg2.group_id = sesion.group_id)
            INNER JOIN assistance_session as2 ON(urg2.group_id = as2.user_role_group_id AND sesion.id = as2.session_id)
            WHERE urg2.id = urg.id) AND preinscripcion.inscription_status_id IN(1,3)";
        }elseif($type == 'asistentes'){
            $sql.= " AND urg.id IN(SELECT  DISTINCT urg2.id 
            FROM user_role_group urg2 
            INNER JOIN `session` AS sesion ON(urg2.group_id = sesion.group_id)
            INNER JOIN assistance_session as2 ON(urg2.group_id = as2.user_role_group_id AND sesion.id = as2.session_id)
            WHERE urg2.id = urg.id) AND preinscripcion.inscription_status_id IN(1,3)";
        }

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
        
        return DB::select(DB::raw($sql));
    }

}
