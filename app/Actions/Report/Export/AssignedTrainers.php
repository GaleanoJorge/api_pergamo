<?php

namespace App\Actions\Report\Export;

use Illuminate\Support\Facades\DB;

class AssignedTrainers
{
    /**
     * AssignedTrainers
     *
     * @param object $filters
     * @return array
     */
    public static function handle(object $filters): array
    {
        $sql = "SELECT 
                    it.name AS 'tipo_identificacion',
                    formador.identification AS 'identificacion',
                    formador.firstname AS 'primer_nombre',
                    formador.middlefirstname AS 'segundo_nombre',
                    formador.lastname AS 'primer_apellido', 
                    formador.middlelastname AS 'segundo_apellido',
                    formador.birthday AS 'fecha_nacimiento',
                    genero.name AS 'genero',
                    etnia.name AS 'etnia',
                    formador.email AS 'correo',
                    formador.phone AS 'telefono',
                    espacialidad.name AS 'especialidad',
                    cargo.name AS 'cargo',
                    despacho.name AS 'despacho',
                    juzgado.name AS 'juzgado',
                    consejo.name AS 'consejo',
                    distrito.name AS 'distrito',
                    circuito.name AS 'circuito',
                    ciudad.name AS 'ciudad',
                    course.id AS 'curso_id',
                    coursebase.name AS 'nombre_curso',
                    (CASE 
                        WHEN programasub.category_parent_id IS NOT NULL 
                        THEN (SELECT c.name FROM category c WHERE c.id = programasub.category_parent_id)
                        ELSE programasub.name
                    END) AS 'programa'
                FROM users AS formador 
                INNER JOIN identification_type AS it ON(formador.identification_type_id = it.id)
                INNER JOIN gender AS genero ON(formador.gender_id = genero.id)
                INNER JOIN ethnicity AS etnia ON(formador.ethnicity_id = etnia.id)
                INNER JOIN user_role AS ur ON(ur.user_id = formador.id)
                INNER JOIN user_role_category_inscription AS urci ON(urci.user_role_id = ur.id)
                INNER JOIN category AS programasub ON(programasub.id = urci.category_id)
                INNER JOIN course AS course ON(course.category_id = programasub.id)
                INNER JOIN coursebase ON(course.coursebase_id = coursebase.id)
                INNER JOIN origin AS plan ON course.origin_id = plan.id
                LEFT JOIN campus ON course.campus_id = campus.id
                -- curriculum
                INNER JOIN curriculum on(formador.id = curriculum.user_id)
                LEFT JOIN specialty AS espacialidad ON(curriculum.specialty_id = espacialidad.id)
                LEFT JOIN `position` AS cargo ON(curriculum.position_id = cargo.id) 
                LEFT JOIN office AS despacho ON(curriculum.office_id = despacho.id)
                LEFT JOIN entity AS juzgado ON(curriculum.entity_id = juzgado.id)
                LEFT JOIN sectional_council AS consejo ON(curriculum.sectional_council_id = consejo.id) 
                LEFT JOIN district AS distrito ON(curriculum.district_id = distrito.id)
                LEFT JOIN circuit AS circuito ON(curriculum.circuit_id = circuito.id)
                LEFT JOIN municipality AS ciudad ON(curriculum.municipality_id = ciudad.id) 
                WHERE urci.inscription_status_id = 1 AND ur.role_id = 4 AND curriculum.inactive = 0 ";

        
        if (@$filters->start_date && @$filters->finish_date) {
            $sql .= " AND ( course.start_date BETWEEN '" . $filters->start_date . "' AND '" . $filters->finish_date . "' OR 
                            course.finish_date BETWEEN '" . $filters->start_date . "' AND '" . $filters->finish_date . "')";
        }
        if (@$filters->validity_id) {
            $sql .= " AND plan.validity_id = '" . $filters->validity_id . "'";
        }
        if (@$filters->origin_id) {
            $sql .= " AND plan.id = '" . $filters->origin_id . "'";
        }
        if (@$filters->programa_id) {
            $sql .= " AND (programasub.id = '" . $filters->programa_id . "' OR programasub.category_parent_id = '" . $filters->programa_id . "')";
        }
        if (@$filters->subprograma_id) {
            $sql .= " AND programasub.id = '" . $filters->subprograma_id . "'";
        }
        if (@$filters->campus_id) {
            $sql .= " AND campus.id = '" . $filters->campus_id . "'";
        }
        if (@$filters->course_id) {
            $sql .= " AND course.id = '" . $filters->course_id . "'";
        }
        if (@$filters->type_identification) {
            $sql .= " AND formador.identification_type_id = '" . $filters->type_identification . "'";
        }
        if (@$filters->identification) {
            $sql .= " AND formador.identification = '" . $filters->identification . "'";
        }
        if (@$filters->lastname) {
            $sql .= " AND formador.lastname LIKE '%" . $filters->lastname . "%'";
        }
        if (@$filters->middlelastname) {
            $sql .= " AND formador.middlelastname LIKE '%" . $filters->middlelastname . "%'";
        }
        if (@$filters->firstname) {
            $sql .= " AND formador.firstname LIKE '%" . $filters->firstname . "%'";
        }
        if (@$filters->middlefirstname) {
            $sql .= " AND formador.middlefirstname LIKE '%" . $filters->middlefirstname . "%'";
        }
        if (@$filters->sectional_council_id) {
            $sql .= " AND curriculum.sectional_council_id = '" . $filters->sectional_council_id . "'";
        }
        if (@$filters->district_id) {
            $sql .= " AND curriculum.district_id = '" . $filters->district_id . "'";
        }
        if (@$filters->circuit_id) {
            $sql .= " AND curriculum.circuit_id = '" . $filters->circuit_id . "'";
        }
        if (@$filters->region_id) {
            $sql .= " AND ciudad.region_id = '" . $filters->region_id . "'";
        }
        if (@$filters->municipality_id) {
            $sql .= " AND curriculum.municipality_id = '" . $filters->municipality_id . "'";
        }
        if (@$filters->specialty_id) {
            $sql .= " AND curriculum.specialty_id = '" . $filters->specialty_id . "'";
        }

        $sql.= " ORDER BY course.id ";
        
        return DB::select(DB::raw($sql));
    }
}
