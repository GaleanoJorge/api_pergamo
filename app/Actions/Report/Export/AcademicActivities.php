<?php

namespace App\Actions\Report\Export;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AcademicActivities
{
    /**
     * AcademicActivities
     *
     * @param object $filters
     * @return array
     */
    public static function handle(object $filters): array
    {
        $sql = "SELECT 
                    validity.name AS 'VIGENCIA',
                    origin.name AS 'PLAN DE FORMACIÓN',
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
                    estado_curso.name AS 'ESTADO DEL CURSO',
                    campus.name AS 'SEDE',
                    -- DATE_FORMAT(course.start_date, '%Y-%m-%d') AS 'FECHA INICIO CURSO',
                    -- DATE_FORMAT(course.finish_date, '%Y-%m-%d') AS 'FECHA FIN CURSO',
                    DATE_FORMAT(entrada.session_date,'%Y-%m-%d') AS 'FECHA SESIÓN',
                    entrada.cantidad AS 'CANTIDAD DE ENTRADAS',
                    module.name AS 'MÓDULO',
                    coordinador.tipo_doc AS 'TIPO DE DOCUMENTO COORDINADOR',
                    coordinador.identification AS 'NÚMERO DE DOCUMENTO COORDINADOR',
                    CONCAT_WS(' ',coordinador.firstname, coordinador.middlefirstname, coordinador.lastname, coordinador.middlelastname) AS 'NOMBRE DEL COORDINADOR',
                    coordinador.username AS 'USUARIO COORDINADOR'
                FROM course
                LEFT JOIN course_states estado_curso ON course.course_states_id = estado_curso.id
                LEFT JOIN (
                    SELECT urc.course_id, u.*, it.name AS tipo_doc
                    FROM user_role_course urc 
                    LEFT JOIN user_role ur ON urc.user_role_id = ur.id 
                    LEFT JOIN users u ON ur.user_id = u.id
                    LEFT JOIN identification_type it ON u.identification_type_id = it.id 
                    WHERE ur.role_id = 2 -- rol coordinador
                ) AS coordinador ON coordinador.course_id = course.id
                LEFT JOIN campus AS campus ON course.campus_id = campus.id 
                LEFT JOIN category AS programasub ON course.category_id = programasub.id
                LEFT JOIN coursebase ON course.coursebase_id = coursebase.id
                LEFT JOIN origin AS origin ON course.origin_id = origin.id
                LEFT JOIN validity AS validity ON origin.validity_id = validity.id
                LEFT JOIN (
                    SELECT grupo.course_id, sesion.module_id, sesion.session_date, count(as2.id) AS cantidad
                    FROM `session` AS sesion
                    LEFT JOIN `group` AS grupo ON grupo.id = sesion.group_id 
                    LEFT JOIN assistance_session AS as2 ON as2.session_id = sesion.id 
                    GROUP BY grupo.course_id, sesion.module_id, sesion.session_date
                ) AS entrada ON course.id = entrada.course_id
                LEFT JOIN module ON entrada.module_id = module.id";

        $sql .= " WHERE course.id IS NOT NULL ";
        if (@$filters->start_date && @$filters->finish_date) {
            $sql .= " AND ( course.start_date BETWEEN '" . $filters->start_date . "' AND '" . $filters->finish_date . "' OR 
                            course.finish_date BETWEEN '" . $filters->start_date . "' AND '" . $filters->finish_date . "')";
        }
        if (@$filters->validity_id) {
            $sql .= " AND validity.id = '" . $filters->validity_id . "'";
        }
        if (@$filters->origin_id) {
            $sql .= " AND origin.id = '" . $filters->origin_id . "'";
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
        // Log::debug($sql);
        return DB::select(DB::raw($sql));
    }
}
