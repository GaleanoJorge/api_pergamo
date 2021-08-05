<?php

namespace App\Actions\Report\Export;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PendingActivityFilters
{
    /**
     * Filtrar actividades pendientes del cierre de evento
     *
     * @param object $filters
     * @return array
     */
    public static function getNotCloseEvent(object $filters): array
    {
        $sql = "SELECT
                    cb.name AS 'NOMBRE CURSO',
                    cs.name AS 'ESTADO CURSO',
                    DATE_FORMAT(curso.start_date, '%Y-%m-%d') AS 'FECHA INICIO',
                    DATE_FORMAT(curso.finish_date, '%Y-%m-%d') AS 'FECHA FINAL',
                    campus.name AS 'SEDE',
                    (CASE 
                        WHEN programasub.category_parent_id IS NOT NULL 
                        THEN (SELECT c.name FROM category c WHERE c.id = programasub.category_parent_id)
                        ELSE programasub.name
                    END) AS 'PROGRAMA',
                    vigencia.name AS 'VIGENCIA',
                    CONCAT_WS(' ', coordinador.firstname, coordinador.middlefirstname, coordinador.lastname, coordinador.middlelastname) AS 'COORDINADOR'
                FROM course AS curso
                INNER JOIN coursebase cb ON curso.coursebase_id = cb.id
                INNER JOIN course_states cs ON curso.course_states_id = cs.id 
                INNER JOIN origin AS plan ON curso.origin_id = plan.id 
                INNER JOIN validity AS vigencia ON plan.validity_id = vigencia.id 
                INNER JOIN category AS programasub ON curso.category_id = programasub.id
                LEFT JOIN campus ON curso.campus_id = campus.id
                LEFT JOIN (
                    SELECT urc.course_id, u.*, it.name AS tipo_doc
                    FROM user_role_course urc 
                    LEFT JOIN user_role ur ON urc.user_role_id = ur.id 
                    LEFT JOIN users u ON ur.user_id = u.id
                    LEFT JOIN identification_type it ON u.identification_type_id = it.id 
                    WHERE ur.role_id = 2 -- rol coordinador
                ) AS coordinador ON coordinador.course_id = curso.id
                WHERE curso.id IS NOT NULL AND curso.course_states_id IN(1)";

        
        if (@$filters->start_date && @$filters->finish_date) {
            $sql .= " AND ( curso.start_date BETWEEN '" . $filters->start_date . "' AND '" . $filters->finish_date . "' OR 
                            curso.finish_date BETWEEN '" . $filters->start_date . "' AND '" . $filters->finish_date . "')";
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
        if (@$filters->user_id) {
            $sql .= " AND coordinador.id = '" . $filters->user_id . "'";
        }
        $sql.= " ORDER BY curso.id ";

        return DB::select(DB::raw($sql));
    }

    /**
     * Filtrar actividades pendientes del asignar formador
     *
     * @param object $filters
     * @return array
     */
    public static function getActivitiesNotTrainer(object $filters): array
    {
        $sql = "SELECT
                    cb.name AS 'NOMBRE CURSO',
                    cs.name AS 'ESTADO CURSO',
                    DATE_FORMAT(curso.start_date, '%Y-%m-%d') AS 'FECHA INICIO',
                    DATE_FORMAT(curso.finish_date, '%Y-%m-%d') AS 'FECHA FINAL',
                    campus.name AS 'SEDE',
                    (CASE 
                        WHEN programasub.category_parent_id IS NOT NULL 
                        THEN (SELECT c.name FROM category c WHERE c.id = programasub.category_parent_id)
                        ELSE programasub.name
                    END) AS 'PROGRAMA',
                    vigencia.name AS 'VIGENCIA',
                    CONCAT_WS(' ', coordinador.firstname, coordinador.middlefirstname, coordinador.lastname, coordinador.middlelastname) AS 'COORDINADOR'
                FROM course AS curso
                INNER JOIN coursebase cb ON curso.coursebase_id = cb.id
                LEFT JOIN course_states cs ON curso.course_states_id = cs.id 
                INNER JOIN origin AS plan ON curso.origin_id = plan.id 
                INNER JOIN validity AS vigencia ON plan.validity_id = vigencia.id 
                INNER JOIN category AS programasub ON curso.category_id = programasub.id
                LEFT JOIN campus ON curso.campus_id = campus.id
                LEFT JOIN (
                    SELECT urc.course_id, u.*, it.name AS tipo_doc
                    FROM user_role_course urc 
                    LEFT JOIN user_role ur ON urc.user_role_id = ur.id 
                    LEFT JOIN users u ON ur.user_id = u.id
                    LEFT JOIN identification_type it ON u.identification_type_id = it.id 
                    WHERE ur.role_id = 2 -- rol coordinador
                ) AS coordinador ON coordinador.course_id = curso.id
                WHERE curso.id IS NOT NULL -- AND curso.course_states_id IN(1)
                    AND (programasub.id NOT IN(
                        SELECT DISTINCT urci.category_id 
                        FROM user_role_category_inscription AS urci 
                        INNER JOIN user_role AS ur ON urci.user_role_id = ur.id AND ur.role_id IN(4)
                        INNER JOIN session_inscriptions AS si ON(urci.id = si.user_role_category_inscription_id)
                        WHERE programasub.id = urci.category_id
                    ) AND programasub.category_parent_id NOT IN(
                        SELECT DISTINCT urci.category_id 
                        FROM user_role_category_inscription AS urci 
                        INNER JOIN user_role AS ur ON urci.user_role_id = ur.id AND ur.role_id IN(4)
                        INNER JOIN session_inscriptions AS si ON(urci.id = si.user_role_category_inscription_id)
                        WHERE programasub.category_parent_id = urci.category_id
                    ))";

        if (@$filters->start_date) {
            $sql .= " AND curso.start_date >= '" . $filters->start_date . "'";
        }
        if (@$filters->finish_date) {
            $sql .= " AND curso.start_date <= '" . $filters->finish_date . "'";
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
        if (@$filters->user_id) {
            $sql .= " AND coordinador.id = '" . $filters->user_id . "'";
        }

        $sql.= " ORDER BY curso.id ";
        return DB::select(DB::raw($sql));
    }
}
