<?php

namespace App\Actions\Report;

use Illuminate\Support\Facades\DB;

class StudentCompetitionsTecnovsTecnos
{
    /**
     * Student competitions Tecnoacademia vs Tecnoacademias 
     * @param integer $regionId
     * @param integer $cursoId
     * @param integer $studentId
     * @return array
     */
    public static function handle(int $studentId, int $cursoId, int $regionId): array
    {
        return DB::select("SELECT 
        TBL.competition_id AS 'IdCompetencia',
        TBL.competition_name AS 'Competencia',
        SUM(TBL.score_goal)/COUNT(*) AS 'PorcentajeCompetencia',
        TBL.Estudiante AS Item
    FROM 
    (
        SELECT 
            co.id AS 'competition_id',
            co.name AS 'competition_name',
            cr.id AS 'criterion_id',
            cr.name AS 'criterion_name',
            SUM((g.value/100)*TMP.s_score) AS 'score_goal',
            TMP.Estudiante
        FROM course c
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
                WHERE u.id = $studentId AND cei.course_id = $cursoId
            ) TMP ON TMP.cag_id = cag.id
        WHERE c.id = $cursoId
        GROUP BY 
            co.id,
            co.name,
            cr.id,
            cr.name
    ) TBL
    GROUP BY 
        TBL.competition_id,
        TBL.competition_name
        
    UNION 
    
    SELECT 
        TBL.competition_id AS 'IdCompetencia',
        TBL.competition_name AS 'Competencia',
        SUM(TBL.score_goal)/COUNT(*) AS 'PorcentajeCompetencia',
        TBL.Region AS Item
    FROM 
    (
        SELECT 
            co.id AS 'competition_id',
            co.name AS 'competition_name',
            cr.id AS 'criterion_id',
            cr.name AS 'criterion_name',
            TMP.UserId,
            SUM((g.value/100)*TMP.s_score) AS 'score_goal',
            r.name AS Region
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
                    u.id AS UserId
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
                WHERE r.id = $regionId /**RegionID*/
            ) TMP ON TMP.cag_id = cag.id
        WHERE r.id = $regionId /**RegionID*/
        GROUP BY 
            co.id,
            co.name,
            cr.id,
            cr.name,
            TMP.UserId
    ) TBL
    GROUP BY 
        TBL.competition_id,
        TBL.competition_name");
    }
}
