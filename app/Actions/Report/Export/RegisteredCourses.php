<?php

namespace App\Actions\Report\Export;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegisteredCourses
{
    /**
     * RegisteredCourses
     *
     * @param object $filters
     * @return array
     */
    public static function handle(object $filters): array
    {
        $sql = "SELECT
                    -- course.id,
                    coordinador.nombre AS 'coordinador',
                    (CASE 
                        WHEN programasub.category_parent_id IS NOT NULL 
                        THEN (SELECT c.name FROM category c WHERE c.id = programasub.category_parent_id)
                        ELSE programasub.name
                    END) AS 'programa',
                    (CASE 
                        WHEN programasub.category_parent_id IS NOT NULL 
                        THEN programasub.name 
                        ELSE ''
                    END) AS 'subprograma',
                    campus.name AS 'sede',
                    cb.name AS 'acto_academico',
                    cs.name AS 'estado_curso',
                    DATE_FORMAT(course.start_date, '%Y-%m-%d') AS 'inicio',
                    DATE_FORMAT(course.finish_date, '%Y-%m-%d') AS 'final',
                    plan.name AS 'plan_de_formacion',
                    COALESCE(course.quota, 0) AS 'convocados',
                    COALESCE(num_discentes.cantidad, 0) AS 'registrados',
                    COALESCE(num_discentes.aprobados, 0) AS 'admitidos',
                    COALESCE(num_discentes.rechazados, 0) AS 'rechazados',
                    (COALESCE(num_discentes.aprobados, 0)-COALESCE(num_asistentes.cantidad, 0)) AS 'sin_asistencia',
                    COALESCE(num_asistentes.cantidad, 0) AS 'asistentes',
                    COALESCE(num_asistentes.hombres, 0) AS 'hombres',
                    COALESCE(num_asistentes.mujeres, 0) AS 'mujeres',
                    COALESCE(num_asistentes.otros, 0) AS 'otros'   ,
                    COALESCE(num_asistentes.cantidad_asis, 0) AS 'cantidad_asis'                 
                FROM course
                INNER JOIN coursebase cb ON course.coursebase_id = cb.id
                INNER JOIN origin AS plan ON course.origin_id = plan.id
                LEFT JOIN (
                    SELECT urc.course_id, CONCAT_WS(' ', u.firstname, u.middlefirstname, u.lastname, u.middlelastname) as 'nombre'
                    FROM user_role_course urc
                    LEFT JOIN user_role ur ON urc.user_role_id = ur.id
                    LEFT JOIN users u ON ur.user_id = u.id
                    WHERE ur.role_id = 2 -- rol coordinador
                ) AS coordinador ON coordinador.course_id = course.id
                LEFT JOIN campus ON course.campus_id = campus.id
                LEFT JOIN category AS programasub ON course.category_id = programasub.id
                LEFT JOIN course_states cs ON course.course_states_id = cs.id
                LEFT JOIN (
                    SELECT urc.course_id, COUNT(urc.id) AS 'cantidad',
                        SUM(CASE WHEN urc.inscription_status_id = 1 THEN 1 ELSE 0 END) AS 'aprobados',
                        SUM(CASE WHEN urc.inscription_status_id = 2 THEN 1 ELSE 0 END) AS 'rechazados'
                    FROM user_role_course urc
                    INNER JOIN user_role ur ON urc.user_role_id = ur.id
                    INNER JOIN users u ON ur.user_id = u.id
                    WHERE ur.role_id IN(5, 9) -- rol discente
                    GROUP BY urc.course_id 
                ) AS num_discentes ON course.id = num_discentes.course_id
                LEFT JOIN (
                    SELECT g.course_id, COUNT(as3.id) AS 'cantidad', 
                   		SUM(as3.cant) AS 'cantidad_asis',
                        SUM(CASE WHEN u.gender_id = '1' AND as3.id IS NOT NULL THEN 1 ELSE 0 END) AS 'hombres',
                        SUM(CASE WHEN u.gender_id = '2' AND as3.id IS NOT NULL THEN 1 ELSE 0 END) AS 'mujeres',
                        SUM(CASE WHEN u.gender_id = '3' AND as3.id IS NOT NULL THEN 1 ELSE 0 END) AS 'otros'
						FROM `group` g
						INNER JOIN  user_role_group urg ON(g.id = urg.group_id)
	                    INNER JOIN user_role ur ON urg.user_role_id = ur.id
	                    INNER JOIN users u ON ur.user_id = u.id
						LEFT JOIN (
						 	SELECT as2.user_role_group_id AS id, COUNT(as2.id) AS 'cant' FROM assistance_session AS as2 GROUP BY as2.user_role_group_id 
						) AS as3 ON as3.id = urg.id 
						GROUP BY g.course_id
                ) AS num_asistentes ON course.id = num_asistentes.course_id
                WHERE course.id IS NOT NULL ";
            
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
        // Log::debug($sql);
        return DB::select(DB::raw($sql));
    }
}
