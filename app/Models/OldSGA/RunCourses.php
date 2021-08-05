<?php

namespace App\Models\OldSGA;

use DB;

class RunCourses
{
    public static function get(array $filters)
    {
        $ssql = "SELECT
        programa.strNombreDelPrograma as nomPrograma,
        curso.intIdCursoDeFormacion as IDcurso,
        curso.strNombreCursoDeFormacion as nomCurso,
        concat_ws(' ',coordinador.strprimernombre, coordinador.strsegundonombre, coordinador.strprimerapellido, coordinador.strsegundoapellido) as Coordinador,
        sede.strNombreSede as nomSede,
        vigencia.strNombreVigencia as Nombre_vigencia,
        (case
         when curso.intCostoCurso = 1 then 'Con costo'
         when curso.intCostoCurso = 2 then 'Sin costo'
         when curso.intCostoCurso = 3 then 'Reserva'
        end) as recursoInversion,
        modulos.strNombre as Modulo,
        (select min(fecha) from rd_fechas_curso where id_curso_fk = fechascurso.id_curso_fk and estado_activo is true) as fechaInicioCurso,
        (select max(fecha) from rd_fechas_curso where id_curso_fk = fechascurso.id_curso_fk and estado_activo is true) as fechaFinCurso,
        curso.intNroBeneficiarios as cantidad_convocados,
        (select count(asistenciaDiscente.asistio)
         from rd_planilla_asistencia planillaAsistencia
              inner join rd_asistencia_discente asistenciaDiscente on planillaAsistencia.rp_id_pk = asistenciaDiscente.id_planilla_asistencia
         where planillaAsistencia.rp_idcurso_fk = curso.intIdCursoDeFormacion) as Cantidad_asistentes
       FROM rd_parametros_curso_formacion parametrosCurso
        INNER JOIN tblcursosdeformacion curso ON parametrosCurso.id_curso_formacion_fk = curso.intIdCursoDeFormacion
        INNER JOIN tblPlanDeFormacionProgramas planFormacionPrograma ON curso.intIdPlanDeFormacionPrograma = planFormacionPrograma.intIdPlanDeFormacionPrograma
        INNER JOIN tblProgramasOProyectos programa ON planFormacionPrograma.intIdProgramaOProyecto = programa.intIdProgramaOProyecto
        INNER JOIN tblPersonas coordinador ON curso.intIdCoordinadorResponsable = coordinador.intIdPersona
        INNER JOIN tblSedes sede ON curso.intIdSede = sede.intIdSede
        join tblvigencias vigencia on vigencia.intIdVigencia = curso.intIdVigencia
        JOIN rd_fechas_curso fechasCurso ON curso.intIdCursoDeFormacion = fechasCurso.id_curso_fk
        join tblmodulos modulos on modulos.intIdModulo = fechascurso.id_modulo
       WHERE parametroscurso.estado_curso in('terminado','cerrado')";

        if ($filters['sede_id']) {
            $ssql .= " AND sede.intIdSede = " . $filters['sede_id'];
        }

        if ($filters['programa_id']) {
            $ssql .= " AND programa.intIdProgramaOProyecto = " . $filters['programa_id'];
        }

        if ($filters['modulo_id']) {
            $ssql .= " AND modulos.intIdModulo = " . $filters['modulo_id'];
        }

        if ($filters['recurso_id']) {
            $ssql .= " AND curso.intCostoCurso = " . $filters['recurso_id'];
        }

        if ($filters['coordinador_id']) {
            $ssql .= " AND coordinador.intIdPersona = " . $filters['coordinador_id'];
        }

        if ($filters['vigencia_id']) {
            $ssql .= " AND curso.intIdVigencia = " . $filters['vigencia_id'];
        }

        $ssql .= " GROUP BY curso.strNombreCursoDeFormacion ";


        return DB::connection('CnxOldSGA')->select(DB::raw($ssql));
    }
}
