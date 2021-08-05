<?php

namespace App\Actions\Report;

use Illuminate\Support\Facades\DB;

class ExpectedStudentCourseInstitutionRegion
{
    /**
     * Expected progress by student, course, institution and region
     *
     * @param integer $studentId
     * @param integer $courseId
     * @param integer $institutionId
     * @param integer $regionId
     * @return array
     */
    public static function handle(
        int $studentId,
        int $courseId,
        int $institutionId,
        int $regionId
    ): array {
        return DB::select("SELECT 
        'Entregas Realizadas Estudiante' AS Item,
        COUNT(TMP.activity_id) AS Total
    FROM
    (
        SELECT 
            d.activity_id
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
        WHERE u.id = $studentId AND cei.course_id = $courseId
        GROUP BY d.activity_id
    )TMP
    
    union
    
    SELECT 
        'Total Entregas Estudiante' AS item,
        COUNT(*) AS Total
    FROM module m
    INNER JOIN session s ON s.module_id = m.id
    INNER JOIN activity a ON a.session_id = s.id
    WHERE m.course_id = 2
    GROUP BY m.course_id
    
    union
    /*************Institución*************/
    SELECT 
        'Entregas Realizadas Institución' AS Item,
        SUM(TMP.Total) AS Total
    FROM
    (
        SELECT 
            d.activity_id, COUNT(d.activity_id) AS 'Total'
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
        INNER JOIN course c ON c.id = cei.course_id
        WHERE cei.educational_institution_id = $institutionId
        GROUP BY d.activity_id
    )TMP
    
    union
    
    SELECT 
        'Total Entregas Institución' AS item,
        COUNT(*) AS Total
    FROM module m
    INNER JOIN session s ON s.module_id = m.id
    INNER JOIN activity a ON a.session_id = s.id
    INNER JOIN course c ON c.id = m.course_id
    INNER JOIN course_educational_institution cei ON cei.course_id = c.id
    INNER JOIN course_institution_cohort cih ON cih.course_institution_id = cei.id 
    INNER JOIN user_role_course urc ON urc.course_institution_cohort_id = cih.id
    INNER JOIN user_role ur ON ur.id = urc.user_role_id
    INNER JOIN role r ON r.id = ur.role_id
    WHERE cei.educational_institution_id = $institutionId AND r.name='Estudiante'
    
    
    union
    /*************Tecnoacademia*************/
    SELECT 
        'Entregas Realizadas Tecnoacademia' AS Item,
        SUM(TMP.Total) AS Total
    FROM
    (
        SELECT 
            d.activity_id, COUNT(d.activity_id) AS 'Total'
        from users u
        inner join user_role ur on ur.user_id = u.id
        inner join user_role_course urc on urc.user_role_id = ur.id
        inner join delivery d on d.user_id = u.id 
            or d.group_activity_id in(
                    SELECT uga.group_activity_id
                    from user_group_activity uga 
                    inner join group_activity ga on ga.id = uga.group_activity_id
                    where uga.user_role_course_id = urc.id
                    GROUP BY uga.group_activity_id
            )
            INNER JOIN course_institution_cohort cih ON cih.id = urc.course_institution_cohort_id
inner join course_educational_institution cei ON cei.id = cih.course_institution_id
        INNER JOIN course c ON c.id = cei.course_id
        INNER JOIN educational_institution ei ON ei.id = cei.educational_institution_id
        INNER JOIN municipality m ON m.id = ei.municipality_id
        WHERE m.region_id = $regionId
        GROUP BY d.activity_id
    )TMP
    
    union
    
    SELECT 
        'Total Entregas Tecnoacademia' AS item,
        COUNT(*) AS Total
    FROM module m
    INNER JOIN session s ON s.module_id = m.id
    INNER JOIN activity a ON a.session_id = s.id
    INNER JOIN course c ON c.id = m.course_id
    inner join course_educational_institution cei ON cei.course_id = c.id 
    INNER JOIN course_institution_cohort cih ON cih.course_institution_id = cei.id 
    INNER JOIN user_role_course urc ON urc.course_institution_cohort_id = cih.id 
    INNER JOIN user_role ur ON ur.id = urc.user_role_id
    INNER JOIN role r ON r.id = ur.role_id
    INNER JOIN educational_institution ei ON ei.id = cei.educational_institution_id
    INNER JOIN municipality mun ON mun.id = ei.municipality_id
    WHERE mun.region_id = $regionId  AND r.name='Estudiante'");
    }
}
