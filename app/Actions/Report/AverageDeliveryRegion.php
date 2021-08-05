<?php

namespace App\Actions\Report;

use Illuminate\Support\Facades\DB;

class AverageDeliveryRegion
{
    /**
     * Average delivery by region
     *
     * @return array
     */
    public static function handle(): array
    {
        return DB::select("SELECT 
        r.name AS 'Region',
        IFNULL(SUM(s.score)/COUNT(s.id),0) AS 'Promedio'
    FROM educational_institution ei
    INNER JOIN municipality m ON m.id = ei.municipality_id
    INNER JOIN region r ON r.id = m.region_id
    INNER JOIN course_educational_institution cei ON cei.educational_institution_id = ei.id
    LEFT JOIN course c ON c.id = cei.course_id
    LEFT JOIN user_role_course urc ON cei.course_id = c.id
    LEFT JOIN user_role ur ON ur.id = urc.user_role_id
    LEFT join delivery d on d.user_id = ur.user_id 
        or d.group_activity_id in(
                SELECT uga.group_activity_id
                from user_group_activity uga 
                inner join group_activity ga on ga.id = uga.group_activity_id
                where uga.user_role_course_id = urc.id
                GROUP BY uga.group_activity_id
        )
    LEFT JOIN score s ON s.delivery_id = d.id
    GROUP BY 
        r.name");
    }
}
