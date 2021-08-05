<?php

namespace App\Actions\Report;

use Illuminate\Support\Facades\DB;

class GroupAndIndividualDeliveries
{
    /**
     * Report Group and individual deliveries
     * @param $studentId
     * @param $courseId
     * @param $institutionId
     * @return array
     */
    public static function handle($studentId, $courseId, $institutionId): array
    {

        $query = "SELECT 
        SUM(Aprobados) AS 'AprobadosIndividual',
        SUM(NoAprobados) AS 'NoAprobadosIndividual',
        (SUM(Aprobados)/COUNT(*))*100 AS PorcentajeAprobadosIndividual,
        (SUM(NoAprobados)/COUNT(*))*100 PorcentajeNoAprobadosIndividual,
        SUM(AprobadosGrupal) AS 'AprobadosGrupal',
        SUM(NoAprobadosGrupal) AS 'NoAprobadosGrupal',
        (SUM(AprobadosGrupal)/COUNT(*))*100 AS PorcentajeAprobadosGrupal,
        (SUM(NoAprobadosGrupal)/COUNT(*))*100 PorcentajeNoAprobadosGrupal,
        COUNT(*)	as Total
    FROM(
        SELECT 
            case 
            when SUM(s.score)/COUNT(u.id)<60 AND d.group_activity_id is null then 0  
            when SUM(s.score)/COUNT(u.id)>=60 AND d.group_activity_id is null then 1  
            ELSE 0
            end
            as Aprobados,
            case 
            when SUM(s.score)/COUNT(u.id)<60 AND d.group_activity_id IS NULL then 1  
            when SUM(s.score)/COUNT(u.id)>=60 AND d.group_activity_id IS NULL then 0  
            ELSE 0
            END NoAprobados,
            case 
            when SUM(s.score)/COUNT(u.id)<60 AND d.user_id IS NULL then 0  
            when SUM(s.score)/COUNT(u.id)>=60 AND d.user_id IS NULL then 1 
            ELSE 0 
            end
            as AprobadosGrupal,
            case 
            when SUM(s.score)/COUNT(u.id)<60 AND d.user_id IS NULL then 1  
            when SUM(s.score)/COUNT(u.id)>=60 AND d.user_id IS NULL then 0  
            ELSE 0 
            end
            as NoAprobadosGrupal
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
        where ";

        if ($studentId != null) {
            return DB::select("$query u.id =  $studentId GROUP BY u.id ) TMP");
        }
        if ($courseId != null) {
            return DB::select("$query cei.course_id = $courseId GROUP BY u.id ) TMP");
        }
        if ($institutionId != null) {
            return DB::select("$query cei.educational_institution_id = $institutionId GROUP BY u.id ) TMP");
        }
    }
}
