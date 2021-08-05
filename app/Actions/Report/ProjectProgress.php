<?php

namespace App\Actions\Report;

use Illuminate\Support\Facades\DB;

class ProjectProgress
{
    /**
     * Project progress
     *
     * @return array
     */
    public static function handle(): array
    {
        return DB::select("SELECT 
        r.name AS 'Departamento', 
        m.name AS 'Ubicación',
        ei.id AS 'IdCentro',
        ei.name AS 'Centro', 
        COUNT(DISTINCT ei2.id) AS 'Colegios', 
        COUNT(DISTINCT cic.id) AS 'Grupos',
        COUNT(DISTINCT urc.user_role_id) AS 'Aprendices'
       FROM country c
       INNER JOIN region r ON r.country_id = c.id
       INNER JOIN municipality m ON m.region_id = r.id
       INNER JOIN educational_institution ei ON ei.municipality_id = m.id
       INNER JOIN educational_institution ei2 ON ei2.municipality_id = m.id
       INNER JOIN course_educational_institution cei ON cei.educational_institution_id = ei2.id
       LEFT JOIN course_institution_cohort cic ON cic.course_institution_id = cei.id
       LEFT JOIN user_role_course urc ON urc.course_institution_cohort_id = cic.id
       WHERE 
        ei.educational_institution_type_id = 1 AND ei2.educational_institution_type_id = 2
       GROUP BY 
        r.name,
        m.name,
        ei.name");
    }
}
