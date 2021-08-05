<?php

namespace App\Actions\Report\Export;

use Illuminate\Support\Facades\DB;

class ActivitiesCarriedOutAndScheduled
{
    /**
     * ActivitiesCarriedOutAndScheduled
     *
     * @param object $filters
     * @return array
     */
    public static function handle(object $filters): array
    {
        $sql = "SELECT
                    course.id,
                    cb.name AS 'acto_academico',
                    course.course_states_id 
                FROM course
                LEFT JOIN campus ON course.campus_id = campus.id
                LEFT JOIN category AS programasub ON course.category_id = programasub.id
                LEFT JOIN coursebase cb ON course.coursebase_id = cb.id
                LEFT JOIN origin ON course.origin_id = origin.id
                WHERE course.id IS NOT NULL ";

        if (@$filters->start_date && @$filters->finish_date) {
            $sql .= " AND ( course.start_date BETWEEN '" . $filters->start_date . "' AND '" . $filters->finish_date . "' OR 
                            course.finish_date BETWEEN '" . $filters->start_date . "' AND '" . $filters->finish_date . "')";
        }
        if (@$filters->validity_id) {
            $sql .= " AND origin.validity_id = '" . $filters->validity_id . "'";
        }
        if (@$filters->origin_id) {
            $sql .= " AND origin.id = '" . $filters->origin_id . "'";
        }
        if (@$filters->programa_id) {
            $sql .= " AND (programasub.id = '" . $filters->programa_id . "' OR programasub.category_parent_id = '" . $filters->programa_id . "') ";
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

        $sql.= " ORDER BY course.id ";
        return DB::select(DB::raw($sql));
    }
}
