<?php

namespace App\Actions\Report;

use Illuminate\Support\Facades\DB;
 
class ApprovedStudents
{
    /**
     * Approved students by course
     *
     * @param  $courseId
     * @param  $institutionId
     * @param  $studentId
     * @return array
     */
	
    public static function handle( $courseId,$institutionId,$studentId): array
    {
        $query = "SELECT 
		SUM(Aprobados) AS 'Aprobados',
		SUM(NoAprobados) AS 'NoAprobados',
		(SUM(Aprobados)/COUNT(*))*100 AS PorcentajeAprobados,
		(SUM(NoAprobados)/COUNT(*))*100 PorcentajeNoAprobados,
		COUNT(*)	as Total
	FROM(
		SELECT 
			case 
			when SUM(s.score)/COUNT(u.id)<60 then 0  
			when SUM(s.score)/COUNT(u.id)>=60 then 1  
			end
			as Aprobados,
			case 
			when SUM(s.score)/COUNT(u.id)<60 then 1  
			when SUM(s.score)/COUNT(u.id)>=60 then 0  
			END NoAprobados
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
		
		where";

    if($courseId!=null && $institutionId==null && $studentId==null){
        return DB::select("$query cei.course_id = $courseId GROUP BY u.id ) TMP");
    }elseif($courseId==null && $institutionId!=null && $studentId==null){
        return DB::select("$query cei.educational_institution_id = $institutionId GROUP BY u.id ) TMP");
    }
           
    }
}
