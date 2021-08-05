<?php

namespace App\Actions\Report\Export;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Inconsistencies
{
    /**
     * Inconsistencies
     *
     * @param object $filters
     * @return array
     */
    public static function handle(object $filters): array
    {
        $sql = "SELECT
                    coursebase.name AS 'course',
                    DATE_FORMAT(course.start_date, '%Y-%m-%d') AS 'start_date',
                    DATE_FORMAT(course.finish_date, '%Y-%m-%d') AS 'finish_date',
                    sede.name AS 'campus',
                    (CASE 
                        WHEN programasub.category_parent_id IS NOT NULL
                        THEN (SELECT c.name FROM category c WHERE c.id = programasub.category_parent_id)
                        ELSE programasub.name
                    END) AS 'category',
                    CONCAT_WS(' ', coordinador.firstname, coordinador.middlefirstname, coordinador.lastname, coordinador.middlelastname) AS 'coordinator',
                    -- DISCENTE
                    tipo_doc_disc.name AS 'identification_type',
                    discente.identification AS 'identification',
                    CONCAT_WS(' ', discente.lastname,  discente.middlelastname, discente.firstname, discente.middlefirstname) AS discente,
                    s.session_date,
                    as2.start_time,
                    as2.closing_time,
                    as2.start_time_night,
                    as2.closing_time_night                     
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
                INNER JOIN assistance_session as2 ON as2.user_role_group_id = urg.id 
                inner JOIN `session` s ON s.id = as2.session_id 
                WHERE (((as2.closing_time_night IS NULL AND as2.start_time_night IS NOT NULL) OR (as2.closing_time_night IS NOT NULL AND as2.start_time_night IS NULL)) 
                OR ((as2.closing_time IS NULL AND as2.start_time IS NOT NULL) OR (as2.closing_time IS NOT NULL AND as2.start_time IS NULL)) 
                OR (COALESCE(TIMESTAMPDIFF(MINUTE , as2.start_time, as2.closing_time), 0) < 0) 
                OR (COALESCE(TIMESTAMPDIFF(MINUTE , as2.start_time_night , as2.closing_time_night), 0) < 0))
                AND course.id IS NOT NULL ";

        if (@$filters->start_date && @$filters->finish_date) {
            $sql .= " AND ( course.start_date BETWEEN '" . $filters->start_date . "' AND '" . $filters->finish_date . "' OR 
                            course.finish_date BETWEEN '" . $filters->start_date . "' AND '" . $filters->finish_date . "')";
        }
        if (@$filters->course_id) {
            $sql .= " AND course.id = '" . $filters->course_id . "'";
        }
        // Log::debug($sql);
        return DB::select(DB::raw($sql));
    }
}
