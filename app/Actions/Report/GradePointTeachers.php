<?php

namespace App\Actions\Report;

use Illuminate\Support\Facades\DB;

class GradePointTeachers
{
    /**
     * Grade Point teachers
     * 
     * @return array
     */
    public static function handle(): array
    {
        return DB::select("SELECT 
        u.id AS 'IdUsuario', 
        CONCAT(u.firstname,' ',u.lastname) AS 'Nombres',
        c.long_name AS 'Curso',
        ei.name AS 'Institucion',
        m.name AS 'Municipio',
        r.name AS 'Region',
        sum(s.score)/COUNT(u.id) AS 'PromedioCalificacion'
    FROM users u
    INNER JOIN user_role ur ON ur.user_id = u.id
    INNER JOIN user_role_course urc ON urc.user_role_id = ur.id
    INNER JOIN course_institution_cohort cih ON cih.id = urc.course_institution_cohort_id
inner join course_educational_institution cei ON cei.id = cih.course_institution_id
    INNER JOIN course c ON c.id = cei.course_id

    INNER JOIN educational_institution ei ON ei.id = cei.educational_institution_id
    INNER JOIN municipality m ON m.id = ei.municipality_id
    INNER JOIN region r ON r.id = m.region_id
    INNER JOIN score s ON s.user_role_course_id = urc.id
    WHERE ur.role_id = 10 /*Role Profesor*/
    GROUP BY u.id;
");           
    }
}
