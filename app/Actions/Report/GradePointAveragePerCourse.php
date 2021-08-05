<?php

namespace App\Actions\Report;

use Illuminate\Support\Facades\DB;

class GradePointAveragePerCourse
{
    /**
     * Average grades for teacher
     * 
     * @return array
     */
    public static function handle(): array
    {
        return DB::select("SELECT * 
        FROM (
            SELECT 
                cei.course_id as CourseID,
                c.long_name AS 'Item',
                ei.name AS 'Institucion',
                mun.name AS 'Municipio',	
                r.name AS 'Region',
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
            INNER JOIN educational_institution ei ON ei.id = cei.educational_institution_id
            INNER JOIN municipality mun ON mun.id = ei.municipality_id
            INNER JOIN region r ON r.id = mun.region_id
            GROUP BY c.id
        ) TMP
        ORDER BY TMP.Promedio DESC
    ");           
    }
}
