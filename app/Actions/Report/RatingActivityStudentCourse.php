<?php

namespace App\Actions\Report;

use Illuminate\Support\Facades\DB;

class RatingActivityStudentCourse
{
    /**
     * Rating activity by student and course
     *
     * @param integer $studentId
     * @param integer $courseId
     * @return array
     */
    public static function handle(int $studentId, int $courseId): array
    {
        return DB::select("SELECT DISTINCT 
        c.id AS 'IdCurso',
        c.long_name AS 'Curso',
        m.id AS 'IdModulo',
        m.name AS 'Modulo',
        se.id AS 'IdSesion',
        se.name AS 'Sesion',
        a.id AS 'IdActividad',
        a.name AS 'Actividad',
        s.score AS 'Calificacion'
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
    INNER JOIN criterion_activity_goal cag ON cag.id = s.criterion_activity_goal_id
    INNER JOIN activity a ON a.id = cag.activity_id
    INNER JOIN session se ON se.id = a.session_id
    INNER JOIN module m ON m.id = se.module_id
    INNER JOIN course c ON c.id = m.course_id
    WHERE u.id = $studentId AND cei.course_id = $courseId
    ORDER BY
        m.id,
        se.id,
        a.id ");
    }
}
