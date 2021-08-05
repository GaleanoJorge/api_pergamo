<?php

namespace App\Actions\Report\Export;

use Illuminate\Support\Facades\DB;

class ConsolidatedEvents
{
    /**
     * ConsolidatedEvents
     *
     * @param object $filters
     * @return array
     */
    public static functiON handle(object $filters): array
    {

        // --'VINCULO LOGÍSTICA' as 'logistica',
        $sql = "SELECT
                    course.id,
                    coordinador.name AS 'coordinador',
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
                    cb.name AS 'acto_academico',
                    campus.name AS 'sede',
                    DATE_FORMAT(course.start_date, '%Y-%m-%d') AS 'inicio',
                    DATE_FORMAT(course.finish_date, '%Y-%m-%d') AS 'final',
                    COALESCE(course.quota, 0) AS 'proyectados',
                    COALESCE(num_discentes.cantidad, 0) AS 'asistentes'
                FROM course
                LEFT JOIN (
                    SELECT urc.course_id, CONCAT_WS(' ', u.firstname, u.middlefirstname, u.lastname, u.middlelastname) as 'name'
                    FROM user_role_course urc
                    LEFT JOIN user_role ur ON urc.user_role_id = ur.id
                    LEFT JOIN users u ON ur.user_id = u.id
                    WHERE ur.role_id = 2 -- rol coordinador
                ) AS coordinador ON coordinador.course_id = course.id
                LEFT JOIN campus ON course.campus_id = campus.id
                LEFT JOIN category AS programasub ON course.category_id = programasub.id
                LEFT JOIN coursebase cb ON course.coursebase_id = cb.id
                LEFT JOIN (
                    SELECT urc.course_id, count(urc.id) AS 'cantidad'
                    FROM user_role_course urc
                    LEFT JOIN user_role ur ON urc.user_role_id = ur.id
                    LEFT JOIN users u ON ur.user_id = u.id
                    WHERE ur.role_id IN(5, 9) -- rol discente
                    GROUP BY urc.course_id 
                ) AS num_discentes ON course.id = num_discentes.course_id
                WHERE course.id IS NOT NULL ";
        
        if (@$filters->start_date && @$filters->finish_date) {
            $sql .= " AND ( course.start_date BETWEEN '" . $filters->start_date . "' AND '" . $filters->finish_date . "' OR 
                            course.finish_date BETWEEN '" . $filters->start_date . "' AND '" . $filters->finish_date . "')";
        }

        return DB::select(DB::raw($sql));
    }
}
