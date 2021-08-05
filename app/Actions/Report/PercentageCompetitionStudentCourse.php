<?php

namespace App\Actions\Report;

use Illuminate\Support\Facades\DB;

class PercentageCompetitionStudentCourse
{
    /**
     * Percentage competition by course and student
     *
     * @param integer $studentId
     * @param integer $courseId
     * @return array
     */
    public static function handle(int $studentId, int $courseId): array
    {
        return DB::select("SELECT 
             TBL.competition_id AS 'IdCompetencia',
             TBL.competition_name AS 'Competencia',
             SUM(TBL.score_goal)/COUNT(*) AS 'PorcentajeCompetencia'
         FROM 
         (
             SELECT 
                 co.id AS 'competition_id',
                 co.name AS 'competition_name',
                 cr.id AS 'criterion_id',
                 cr.name AS 'criterion_name',
                 SUM((g.value/100)*TMP.s_score) AS 'score_goal'
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
                         s.score AS s_score
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
                     WHERE u.id = $studentId AND cei.course_id = $courseId
                 ) TMP ON TMP.cag_id = cag.id
             WHERE c.id = $courseId
             GROUP BY 
                 co.id,
                 co.name,
                 cr.id,
                 cr.name
         ) TBL
         GROUP BY 
             TBL.competition_id,
             TBL.competition_name
             
             ");
    }
}
