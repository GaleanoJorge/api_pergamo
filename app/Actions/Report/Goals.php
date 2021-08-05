<?php

namespace App\Actions\Report;

use Illuminate\Support\Facades\DB;

class Goals
{
    /**
     * Goals
     *
     * @return array
     */
    public static function handle(): array
    {
        return DB::select("SELECT * 
        FROM (
            SELECT
                'Centros' AS Item,
                COUNT(*) AS Total
            FROM educational_institution
            WHERE parent_id IS NULL
            
            union
            
            SELECT
                'Instituciones' AS Item,
                COUNT(*) AS Total
            FROM educational_institution
            WHERE parent_id IS not NULL
            
            union
            
            SELECT
                'Grupos' AS Item,
                COUNT(*) AS Total
            FROM course_institution_cohort
            
            UNION
            
            SELECT 
                'Aprendices' AS Item,
                COUNT(*) AS Total
            FROM user_role_course urc 
            INNER JOIN user_role ur ON ur.id = urc.user_role_id
            WHERE ur.role_id = 5
        ) TMP 
        INNER JOIN goal g ON g.name = TMP.Item");
    }
}
