<?php

namespace App\Actions\Report\Export;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AcademicRecord
{
    /**
     * AcademicRecord
     *
     * @param object $filters
     * @return array
     */
    public static function getCourses(object $filters): object
    {
        $sql = "SELECT 
                course.id,
                coordinador.firstname,
                coordinador.middlefirstname,
                coordinador.lastname,
                coordinador.middlelastname,                    
                CONCAT_WS(' ', coordinador.firstname, coordinador.middlefirstname, coordinador.lastname, coordinador.middlelastname) AS coordinator,                    
                campus.name AS campus,
                course.quota AS quota,
                entity_type.name AS methodology,
                coursebase.name AS course,
                (CASE 
                    WHEN programasub.category_parent_id IS NOT NULL 
                    THEN (SELECT c.id FROM category c WHERE c.id = programasub.category_parent_id)
                    ELSE programasub.id
                END) AS 'category_id',
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
                '' AS area,
                '' AS subarea,
                DATE_FORMAT(course.start_date, '%Y-%m-%d') AS 'start_date',
                DATE_FORMAT(course.finish_date, '%Y-%m-%d') AS 'finish_date',
                course_states.name AS 'statusCourse',
                grupo.name AS 'grupo'
            FROM course
            LEFT JOIN (
                SELECT urc.course_id, u.*
                FROM user_role_course urc
                LEFT JOIN user_role ur ON urc.user_role_id = ur.id
                LEFT JOIN users u ON ur.user_id = u.id
                WHERE ur.role_id = 2 -- rol coordinador
            ) AS coordinador ON coordinador.course_id = course.id
            LEFT JOIN category AS programasub ON course.category_id = programasub.id
            INNER JOIN entity_type ON entity_type.id = course.entity_type_id
            INNER JOIN campus ON campus.id = course.campus_id
            INNER JOIN `group` AS grupo ON course.id = grupo.course_id
            INNER JOIN coursebase ON coursebase.id = course.coursebase_id
            LEFT JOIN course_states ON course.course_states_id = course_states.id
            WHERE course.id IS NOT NULL ";

        if (@$filters->course_id) {
            $sql .= " AND course.id = '" . $filters->course_id . "' ";
        }
        if (@$filters->group_id) {
            $sql .= " AND grupo.id = '" . $filters->group_id . "' ";
        }
        $data = DB::select(DB::raw($sql));
        return $data ? $data[0] : collect([]);
    }

    /**
     * getTeachers
     *
     * @param object $filters
     * @return array
     */
    public static function getTeachers(int $categoryID): array
    {
        $sql = "SELECT
                    user_role_category_inscription.category_id,
                    user_role.user_id,
                    users.identification,
                    users.firstname,
                    users.middlefirstname,
                    users.lastname,
                    users.middlelastname,
                    position.name AS position,
                    entity.name AS entity,
                    specialty.name AS specialty,
                    user_role.id
                FROM user_role_category_inscription
                INNER JOIN user_role ON user_role.id = user_role_category_inscription.user_role_id
                INNER JOIN users ON users.id = user_role.user_id
                INNER JOIN curriculum ON curriculum.user_id = users.id
                LEFT JOIN position ON position.id = curriculum.position_id
                LEFT JOIN entity ON entity.id = curriculum.entity_id
                LEFT JOIN specialty ON specialty.id = curriculum.specialty_id
                WHERE (curriculum.inactive = 0 AND user_role.role_id = 4 
                        AND user_role_category_inscription.inscription_status_id = 1)
                        AND user_role_category_inscription.category_id IN (".$categoryID.")";

        return DB::select(DB::raw($sql));
    }

    /**
     * getDiscentes
     *
     * @param object $filters
     * @return array
     */
    public static function getDiscentes(object $filters): array
    {
        $sql = "SELECT
                    user_role_course.course_id,
                    user_role.user_id,
                    it.name AS 'identification_type',
                    users.identification,
                    users.firstname,
                    users.middlefirstname,
                    users.lastname,
                    users.middlelastname,
                    CONCAT_WS(' ', users.firstname, users.middlefirstname, users.lastname, users.middlelastname) AS discente,
                    position.name AS position,
                    office.name AS office,
                    specialty.name AS specialty,
                    user_role.id,
                    users.phone,
                    users.email,
                    gender.name AS gender,
                    circuit.name AS circuit,
                    district.name AS district,
                    sectional_council.name AS sectionalCouncil,
                    municipality.name AS municipality,
                    entity.name AS entity
                FROM user_role_course
                INNER JOIN `group` AS grupo ON user_role_course.course_id = grupo.course_id
                INNER JOIN user_role ON user_role.id = user_role_course.user_role_id
                INNER JOIN users ON users.id = user_role.user_id
                INNER JOIN user_role_group AS urg ON urg.group_id = grupo.id AND urg.user_role_id = user_role.id
                INNER JOIN gender ON gender.id = users.gender_id
                INNER JOIN identification_type it ON(users.identification_type_id = it.id)
                INNER JOIN curriculum ON curriculum.user_id = users.id AND user_role_course.curriculum_id = curriculum.id
                LEFT JOIN position ON position.id = curriculum.position_id
                LEFT JOIN entity ON entity.id = curriculum.entity_id
                LEFT JOIN office ON office.id = curriculum.office_id
                LEFT JOIN specialty ON specialty.id = curriculum.specialty_id
                LEFT JOIN municipality ON municipality.id = curriculum.municipality_id
                LEFT JOIN circuit ON circuit.id = curriculum.circuit_id
                LEFT JOIN district ON district.id = curriculum.district_id
                LEFT JOIN sectional_council ON sectional_council.id = curriculum.sectional_council_id
                WHERE (user_role.role_id IN(5, 9) AND user_role_course.inscription_status_id = 1) ";

        if (@$filters->course_id) {
            $sql .= " AND user_role_course.course_id = '" . $filters->course_id . "' ";
        }
        if (@$filters->group_id) {
            $sql .= " AND grupo.id = '" . $filters->group_id . "' ";
        }
        if (@$filters->isExtraordinary) {
            $sql .= " AND user_role_course.is_extraordinary = '1' ";
        }
        return DB::select(DB::raw($sql));
    }

    /**
     * getAreaSubarea
     *
     * @param integer $categoryID
     * @return void
     */
    public static function getAreaSubarea(int $categoryID)
    {
        $sql = "SELECT category.id, area.name AS area, subarea.name AS subarea
                FROM category
                INNER JOIN area ON area.id = category.area_id
                INNER JOIN subarea ON subarea.id = category.subarea_id
                WHERE category.id IN (".$categoryID.")";

        return DB::select(DB::raw($sql))[0];
    } 
}
