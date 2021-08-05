<?php

namespace App\Actions\Report;

use Illuminate\Support\Facades\DB;

class ApprovedDeliveries
{
    /**
     * Approved deliveries
     *
     * @param integer $studentId
     * @param integer $courseId
     * @return array
     */
    public static function  Report16a(int $studentId, int $courseId): array
    {
        return DB::select("SELECT 
        co.id AS 'competition_id',
        co.name AS 'competition_name',
        cr.id AS 'criterion_id',
        cr.name AS 'criterion_name',
        TMP.UserId,
        ei.name AS 'Institucion',
        mun.name AS Municipio,
        r.name AS 'Region',
        SUM((g.value/100)*TMP.s_score) AS 'score_goal',
        TMP.Estudiante
    FROM course c
    INNER JOIN course_educational_institution cei ON cei.course_id = c.id
    INNER JOIN educational_institution ei ON ei.id = cei.educational_institution_id
    INNER JOIN municipality mun ON mun.id = ei.municipality_id
    INNER JOIN region r ON r.id = mun.region_id
    INNER JOIN competition_course cc ON cc.course_id = c.id
    INNER JOIN competition co ON co.id = cc.competition_id
    INNER JOIN criterion cr ON cr.competition_id = co.id
    INNER JOIN criterion_activity_goal cag ON cag.criterion_id = cr.id AND cag.activity_id IN 
        (
            SELECT a.id
            FROM module m
            INNER JOIN session s ON s.module_id = m.id
            INNER JOIN activity a ON a.session_id = s.id
            WHERE m.course_id = c.id
        )
    INNER JOIN goal g ON g.id = cag.goal_id
    LEFT JOIN 
        (
            SELECT DISTINCT 
                s.criterion_activity_goal_id AS cag_id,
                s.score AS s_score,
                u.id AS UserId,
                CONCAT(u.firstname,' ',u.lastname) AS Estudiante
            from users u
            inner join user_role ur on ur.user_id = u.id
            inner join user_role_course urc on urc.user_role_id = ur.id
            INNER JOIN course_institution_cohort cih ON cih.id = urc.course_institution_cohort_id
inner join course_educational_institution cei ON cei.id = cih.course_institution_id
            inner join delivery d on d.user_id = u.id 
                or d.group_activity_id in(
                        SELECT uga.group_activity_id
                        from user_group_activity uga 
                        inner join group_activity ga on ga.id = uga.group_activity_id
                        where uga.user_role_course_id = urc.id
                        GROUP BY uga.group_activity_id
                )
            INNER JOIN score s ON s.delivery_id = d.id
            INNER JOIN course c ON c.id = cei.course_id

            INNER JOIN educational_institution ei ON ei.id = cei.educational_institution_id
            INNER JOIN municipality mun ON mun.id = ei.municipality_id
            INNER JOIN region r ON r.id = mun.region_id
            WHERE u.id = $studentId AND cei.course_id = $courseId /**UserID CourseID*/
        ) TMP ON TMP.cag_id = cag.id
    WHERE c.id = $courseId /**CourseID*/
    GROUP BY 
        co.id,
        co.name,
        cr.id,
        cr.name,
        TMP.UserId;
        ");
    }

    /**
     * Approved deliveries
     *
     * @param integer $courseId
     * @return array
     */

    public static function Report16b(int $studentId, int $courseId): array
    {
        return DB::select("SELECT 
        TBL.Estudiante,
        TBL.Institucion,
        TBL.Region,
        SUM(TBL.Aprobados) AS CriteriosAprobados,
        SUM(TBL.NoAprobados) AS CriteriosNoAprobados
    FROM 
    (
        SELECT 
            co.id AS 'competition_id',
            co.name AS 'competition_name',
            cr.id AS 'criterion_id',
            cr.name AS 'criterion_name',
            TMP.UserId,
            SUM((g.value/100)*TMP.s_score) AS 'score_goal',
            CASE 
                WHEN 	SUM((g.value/100)*TMP.s_score) > 59 THEN 1 ELSE 0
            END AS Aprobados,
            CASE 
                WHEN 	SUM((g.value/100)*TMP.s_score) < 60 THEN 1 ELSE 0
            END AS NoAprobados,
            ei.name AS 'Institucion',
            mun.name AS 'Municipio',
            r.name AS Region,
            TMP.Estudiante
        FROM course c
        INNER JOIN course_educational_institution cei ON cei.course_id = c.id
        INNER JOIN educational_institution ei ON ei.id = cei.educational_institution_id
        INNER JOIN municipality mun ON mun.id = ei.municipality_id
        INNER JOIN region r ON r.id = mun.region_id
        INNER JOIN competition_course cc ON cc.course_id = c.id
        INNER JOIN competition co ON co.id = cc.competition_id
        INNER JOIN criterion cr ON cr.competition_id = co.id
        INNER JOIN criterion_activity_goal cag ON cag.criterion_id = cr.id AND cag.activity_id IN 
            (
                SELECT a.id
                FROM module m
                INNER JOIN session s ON s.module_id = m.id
                INNER JOIN activity a ON a.session_id = s.id
                WHERE m.course_id = c.id
            )
        INNER JOIN goal g ON g.id = cag.goal_id
        LEFT JOIN 
            (
                SELECT DISTINCT 
                    s.criterion_activity_goal_id AS cag_id,
                    s.score AS s_score,
                    u.id AS UserId,
                    CONCAT(u.firstname,' ',u.lastname) AS Estudiante
                from users u
                inner join user_role ur on ur.user_id = u.id
                inner join user_role_course urc on urc.user_role_id = ur.id
                INNER JOIN course_institution_cohort cih ON cih.id = urc.course_institution_cohort_id
 inner join course_educational_institution cei ON cei.id = cih.course_institution_id
                inner join delivery d on d.user_id = u.id 
                    or d.group_activity_id in(
                            SELECT uga.group_activity_id
                            from user_group_activity uga 
                            inner join group_activity ga on ga.id = uga.group_activity_id
                            where uga.user_role_course_id = urc.id
                            GROUP BY uga.group_activity_id
                    )
                INNER JOIN score s ON s.delivery_id = d.id
                INNER JOIN course c ON c.id = cei.course_id
                WHERE u.id = $studentId AND c.id = $courseId /**CourseID*/
            ) TMP ON TMP.cag_id = cag.id
        WHERE c.id = $courseId /**CourseID*/
        GROUP BY 
            co.id,
            co.name,
            cr.id,
            cr.name,
            TMP.UserId
    ) TBL
    GROUP BY 
        TBL.Estudiante
         ");
    }
}
