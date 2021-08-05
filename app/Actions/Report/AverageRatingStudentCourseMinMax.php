<?php

namespace App\Actions\Report;

use Illuminate\Support\Facades\DB;

class AverageRatingStudentCourseMinMax
{
    /**
     * Average rating by student and course with min and max
     *
     * @param integer $studentId
     * @param integer $courseId
     * @return array
     */
    public static function handle(int $studentId, int $courseId): array
    {
        return DB::select("SELECT * 
        FROM (
            SELECT 
                u.id AS UserID,
                cei.course_id CourseID,
                CONCAT(u.firstname,' ',u.lastname) AS Item,
                COUNT(u.id) AS NumeroDeEntregas,
                SUM(s.score)/COUNT(u.id) AS Promedio
            from users u
            inner join user_role ur on ur.user_id = u.id
            inner join user_role_course urc on urc.user_role_id = ur.id
            inner join delivery d on d.user_id = u.id 
            INNER JOIN course_institution_cohort cih ON cih.id = urc.course_institution_cohort_id
inner join course_educational_institution cei ON cei.id = cih.course_institution_id
                or d.group_activity_id in(
                        SELECT uga.group_activity_id
                        from user_group_activity uga 
                        inner join group_activity ga on ga.id = uga.group_activity_id
                        where uga.user_role_course_id = urc.id
                        GROUP BY uga.group_activity_id
                )
            INNER JOIN score s ON s.delivery_id = d.id
            WHERE u.id = $studentId AND cei.course_id = $courseId
            GROUP BY u.id
        ) TMP
        
        UNION
        
        SELECT * 
        FROM (
            SELECT 
                0 AS UserID,
                cei.course_id as CourseID,
                c.short_name AS 'Item',
                COUNT(c.id) AS 'NumeroDeEntregas',
                SUM(s.score)/COUNT(c.id) AS 'Promedio' 
            from users u
            inner join user_role ur on ur.user_id = u.id
            inner join user_role_course urc on urc.user_role_id = ur.id
            INNER JOIN course_institution_cohort cih ON cih.id = urc.course_institution_cohort_id
			inner join course_educational_institution cei ON cei.id = cih.course_institution_id   
            INNER JOIN course c ON c.id = cei.course_id
    	    
            inner join delivery d 
                on d.user_id = u.id 
                or d.group_activity_id in(
                        SELECT uga.group_activity_id
                        from user_group_activity uga 
                        inner join group_activity ga on ga.id = uga.group_activity_id
                        where uga.user_role_course_id = urc.id
                        GROUP BY uga.group_activity_id
                )
            INNER JOIN score s ON s.delivery_id = d.id
            WHERE c.id = $courseId
            GROUP BY c.id
        )TMP
        
        UNION
        
        SELECT 
            TMP.UserID,
            TMP.CourseID,
            'Maximo' AS 'Item',
            TMP.NumeroDeEntregas AS 'NumeroDeEntregas',
            MAX(TMP.Promedio) AS 'Promedio'
        FROM 
        (
            SELECT 
                0 AS UserID,
                cei.course_id as CourseID,
                COUNT(u.id) AS 'NumeroDeEntregas',
                SUM(s.score)/COUNT(u.id) AS 'Promedio' 
            from users u
            inner join user_role ur on ur.user_id = u.id
            inner join user_role_course urc on urc.user_role_id = ur.id
            INNER JOIN course_institution_cohort cih ON cih.id = urc.course_institution_cohort_id
			inner join course_educational_institution cei ON cei.id = cih.course_institution_id
            INNER JOIN course c ON c.id = cei.course_id
            inner join delivery d 
                on d.user_id = u.id 
                or d.group_activity_id in(
                        SELECT uga.group_activity_id
                        from user_group_activity uga 
                        inner join group_activity ga on ga.id = uga.group_activity_id
                        where uga.user_role_course_id = urc.id
                        GROUP BY uga.group_activity_id
                )
            INNER JOIN score s ON s.delivery_id = d.id
            WHERE c.id = $courseId
            GROUP BY u.id
        ) TMP
        
        union
        
        SELECT 
            TMP.UserID,
            TMP.CourseID,
            'Minimo' AS 'Item',
            TMP.NumeroDeEntregas AS 'NumeroDeEntregas',
            MIN(TMP.Promedio) AS 'Promedio'
        FROM 
        (
            SELECT 
                0 AS UserID,
                cei.course_id as CourseID,
                u.id AS 'Item',
                COUNT(u.id) AS 'NumeroDeEntregas',
                SUM(s.score)/COUNT(u.id) AS 'Promedio' 
            from users u
            inner join user_role ur on ur.user_id = u.id
            inner join user_role_course urc on urc.user_role_id = ur.id
            INNER JOIN course_institution_cohort cih ON cih.id = urc.course_institution_cohort_id
			inner join course_educational_institution cei ON cei.id = cih.course_institution_id
            INNER JOIN course c ON c.id = cei.course_id
            inner join delivery d 
                on d.user_id = u.id 
                or d.group_activity_id in(
                        SELECT uga.group_activity_id
                        from user_group_activity uga 
                        inner join group_activity ga on ga.id = uga.group_activity_id
                        where uga.user_role_course_id = urc.id
                        GROUP BY uga.group_activity_id
                )
            INNER JOIN score s ON s.delivery_id = d.id
            WHERE c.id = $courseId
            GROUP BY u.id
        ) TMP
   ");
    }
}
