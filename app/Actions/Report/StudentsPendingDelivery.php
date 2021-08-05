<?php

namespace App\Actions\Report;

use Illuminate\Support\Facades\DB;

class StudentsPendingDelivery
{
    /**
     * Students pending delivery
     *
     * @return array
     */
    public static function handle(): array
    {
        return DB::select("SELECT 
        concat(u.firstname,' ',u.lastname) AS 'Estudiante',
        count(d.activity_id) AS 'Entregas',
        TMP.Total - count(d.activity_id) AS 'No entregadas',
        c.long_name AS 'Curso',
        ei.name AS 'Institucion',
        m.name AS 'Municipio',
        r.name AS 'Region'	
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
    INNER JOIN (
        SELECT 
            m.course_id,
            COUNT(*) AS Total
        FROM module m
        INNER JOIN session s ON s.module_id = m.id
        INNER JOIN activity a ON a.session_id = s.id
        GROUP BY m.course_id
    ) TMP ON TMP.course_id = cei.course_id
    INNER JOIN course c ON c.id = cei.course_id
    INNER JOIN educational_institution ei ON ei.id = cei.educational_institution_id
    INNER JOIN municipality m ON m.id = ei.municipality_id
    INNER JOIN region r ON r.id = m.region_id
    GROUP BY u.id");           
    }
}
