<?php

namespace App\Models\OldSGA;

use DB;

define('CONNECTION', 'CnxOldSGA');

class Courses
{

    public static function get(array $filters)
    {
        $ssql = "SELECT
        t1.intIdCursoDeFormacion AS value,
        CONCAT_WS(' ','COD:',t1.intIdCursoDeFormacion, t1.strNombreCursoDeFormacion, t.strNombreSede) AS label,
        t.intIdSede,t3.intIdCiudad,t1.intIdVigencia, p.intIdProgramaOProyecto
      FROM
        tblSedes t
        INNER JOIN tblCursosDeFormacion t1 ON t.intIdSede = t1.intIdSede
        INNER JOIN tblCiudades t3 ON t.intIdCiudad = t3.intIdCiudad
        INNER JOIN rd_parametros_curso_formacion rpcf ON t1.intIdCursoDeFormacion = rpcf.id_curso_formacion_fk
        INNER JOIN tblPlanDeFormacionProgramas pfp ON t1.intIdPlanDeFormacionPrograma = pfp.intIdPlanDeFormacionPrograma
        INNER JOIN tblProgramasOProyectos p ON pfp.intIdProgramaOProyecto = p.intIdProgramaOProyecto
        LEFT JOIN tblvigencias v ON t1.intIdVigencia = v.intIdVigencia
        INNER JOIN tblPersonas coordinador ON t1.intIdCoordinadorResponsable = coordinador.intIdPersona
      WHERE t1.intIdCursoDeFormacion IS NOT NULL ";

        if (@$filters['sede_id']) {
            $ssql .= " AND t.intIdSede = " . $filters['sede_id'];
        }

        if (@$filters['programa_id']) {
            $ssql .= " AND p.intIdProgramaOProyecto = " . $filters['programa_id'];
        }

        /*
        if ($filters['recurso_id']) {
            $ssql .= " AND curso.intCostoCurso = " . $filters['recurso_id'];
        } */

        if (@$filters['coordinador_id']) {
            $ssql .= " AND coordinador.intIdPersona = " . $filters['coordinador_id'];
        }

        if (@$filters['vigencia_id']) {
            $ssql .= " AND t1.intIdVigencia = " . $filters['vigencia_id'];
        }

        if (@$filters['curso_id']) {
            $ssql .= " AND t1.intIdCursoDeFormacion = " . $filters['curso_id'];
        }

        return DB::connection(CONNECTION)->select(DB::raw($ssql));
    }

    public static function gruposByCurso(int $cursoId)
    {
        $ssql="SELECT distinct intIdGrupoDeFormacion, strNombre, strCodigoGrupo
        FROM tblgruposdeformacion grupo 
        LEFT JOIN rd_planilla_asistencia planilla ON grupo.intIdGrupoDeFormacion = planilla.id_grupo 
        WHERE intIdCursoDeFormacion = $cursoId ";
        
        return DB::connection(CONNECTION)->select(DB::raw($ssql));
    }

    public static function discentesAsistentes(array $filters)
    {
        $ssql = "SELECT DISTINCT
               concat_ws(' ',persona.Pe_PRIMERAPELLIDO, persona.Pe_SEGUNDOAPELLIDO, persona.Pe_PRIMERNOMBRE, persona.Pe_SEGUNDONOMBRE) as Discente,
               (case
                when cargoPersona.rd_id_lista_cargos is not null then cargo.lc_nombre
                when cargoPersona.rd_id_lista_cargos is null then (select lc_nombre from rd_lista_cargos where lc_id = cargoPersona.usr_ext_cargo)
               end) cargo,
               (case
                when cargoPersona.id_entidades is not null then entidad.en_nombre_entidad
                when cargoPersona.id_entidades is null then (select en_nombre_entidad from rd_entidades where en_identidad_pk = cargoPersona.usr_ext_entidad_cargo)
               end) AS corporacionJuzgado,
               (CASE
                 WHEN especialidad.e_nombreespecialidad IS NULL THEN ''
                 WHEN especialidad.e_nombreespecialidad IS NOT NULL THEN especialidad.e_nombreespecialidad
               END) AS especialidad,
               (CASE
                 WHEN ciudad.strNombreCiudad IS NULL THEN ''
                 WHEN ciudad.strNombreCiudad IS NOT NULL THEN ciudad.strNombreCiudad
               END) AS ciudad,
               persona.Pe_email Email
            FROM rd_persona persona
               LEFT JOIN rd_rol_persona rolPersona ON persona.Pe_IdPERSONA_PK = rolPersona.Rp_IdPERSONA_FK
               LEFT JOIN rd_rol rol ON rolPersona.Rp_IdROL_FK = rol.Ro_IdROL_PK
               LEFT JOIN rd_inscripcioncursos inscripcionCurso ON persona.Pe_IdPERSONA_PK = inscripcionCurso.ri_IdPersona_FK
               INNER JOIN tblcursosdeformacion curso ON inscripcionCurso.ri_IdCursosDeFormacion_FK = curso.intIdCursoDeFormacion
               INNER JOIN tblgruposdeformacion grupo ON inscripcionCurso.id_grupo = grupo.intIdGrupoDeFormacion
               LEFT JOIN tblsedes sede ON curso.intIdSede = sede.intIdSede
               LEFT JOIN tblparametrosdeformadores parametrosZona ON sede.intIdZona = parametrosZona.intIdParametroDeFormador
               LEFT JOIN tblprogramasoproyectos programa ON grupo.intIdProgramaOProyecto = programa.intIdProgramaOProyecto
               LEFT JOIN tblsubprogramasosubproyectos subPrograma ON curso.intIdSubProgramaOSubProyecto = subPrograma.intIdSubProgramaOSubProyecto
               LEFT JOIN rd_experiencialaboral experienciaLaboral ON persona.Pe_IdPERSONA_PK = experienciaLaboral.el_idpersona_fk AND curso.intIdCursoDeFormacion = experienciaLaboral.El_IdCursoFormacion_FK
               LEFT JOIN rd_cargo_persona cargoPersona ON experienciaLaboral.El_IdPersonaCargo_FK = cargoPersona.id_cargo_pk
               LEFT OUTER JOIN rd_dependencia dependencia ON cargoPersona.rd_IdDependencia_FK = dependencia.d_id
               LEFT OUTER JOIN tblciudades ciudad ON persona.Pe_IntldCiudad_FK = ciudad.intIdCiudad
               LEFT OUTER JOIN rd_distrito distrito ON cargoPersona.rd_Distrito_FK = distrito.d_id
               LEFT OUTER JOIN rd_concejoseccional concejo ON cargoPersona.rd_concejo_seccional_FK = concejo.cs_id
               LEFT OUTER JOIN rd_lista_cargos cargo ON cargoPersona.rd_id_lista_cargos = cargo.lc_id
               LEFT OUTER JOIN rd_despacho despacho ON cargoPersona.rd_id_despacho_fk = despacho.id
               LEFT OUTER JOIN rd_circuitos circuito ON cargoPersona.rd_circuito_fk = circuito.ci_id_pk
               LEFT OUTER JOIN rd_entidades entidad ON cargoPersona.id_entidades = entidad.en_Identidad_pk
               LEFT JOIN rd_especialidad especialidad ON experienciaLaboral.El_IdEspecialidad_FK = especialidad.e_idespecialidad
               INNER JOIN rd_fechas_curso fechasCurso ON curso.intIdCursoDeFormacion = fechasCurso.id_curso_fk
               INNER JOIN tblmodulos modulos ON fechasCurso.id_modulo = modulos.intIdModulo
               INNER JOIN tblpersonas coordinador ON curso.intIdCoordinadorResponsable = coordinador.intIdPersona
               LEFT OUTER JOIN tblvigencias vigencia ON curso.intIdVigencia = vigencia.intIdVigencia
               LEFT OUTER JOIN rd_tipo_costo_curso tipoCosto ON curso.intCostoCurso = tipoCosto.id
               INNER JOIN rd_tiposidentificacion tipoIdentificacion ON persona.Pe_IdTIPOIDENTIFICACION = tipoIdentificacion.ti_id
               LEFT JOIN tblplandeformacionprogramastiposact planFormacionProgramasTiposAct ON planFormacionProgramasTiposAct.intIdPlanDeFormacionProgramasTiposAct = curso.intIdPlanDeFormacionProgramasTiposAct
               LEFT JOIN tbltiposactividadesacademicas tiposActividadesAcademicas ON tiposActividadesAcademicas.intIdTipoDeActividadAcademica = planFormacionProgramasTiposAct.intIdTipoDeActividadAcademica
               INNER JOIN rd_planilla_asistencia planillaAsistencia ON planillaAsistencia.rp_idpersona_fk = persona.Pe_IdPERSONA_PK
            WHERE planillaAsistencia.rp_idcurso_fk = curso.intIdCursoDeFormacion
             AND (planillaAsistencia.rp_horaingreso IS NOT NULL AND planillaAsistencia.rp_horasalida IS NOT NULL
              OR planillaAsistencia.rp_horaingreso2 IS NOT NULL AND planillaAsistencia.rp_horasalida2 IS NOT NULL)";

        if ($filters['curso_id']) {
            $ssql .= " AND curso.intIdCursoDeFormacion = " . $filters['curso_id'];
        }

        $ssql .= " group by Discente ORDER BY planillaAsistencia.rp_idpersona_fk";

        return DB::connection(CONNECTION)->select(DB::raw($ssql));
    }

    public static function asistentes(int $curso_id){
        $ssql = "select Convocados, Cantidad_asistentes
                from (
                 select
                  (select curso.intNroBeneficiarios
                   from tblcursosdeformacion curso where curso.intIdCursoDeFormacion=$curso_id ) as Convocados,
                  (select count(*)
                   from
                   (select sum(asistenciaDiscente.asistio)
                    from rd_asistencia_discente asistenciaDiscente
                    inner join rd_planilla_asistencia planillaAsistencia
                    on asistenciaDiscente.id_planilla_asistencia = planillaAsistencia.rp_id_pk
                    where planillaAsistencia.rp_idcurso_fk = (select curso.intIdCursoDeFormacion from tblcursosdeformacion curso where curso.intIdCursoDeFormacion=$curso_id )
                    group by planillaAsistencia.rp_idpersona_fk
                    having sum(asistenciaDiscente.asistio) > 0) as Cantidad_asistentes) as Cantidad_asistentes
                 from tblcursosdeformacion curso
                    group by Convocados, Cantidad_asistentes) as totales";

        return (DB::connection(CONNECTION)->select(DB::raw($ssql)))[0];
    }

    public static function byDiscente(int $personaId)
    {
        $ssql = "SELECT curso.intIdCursoDeFormacion,
        programa.strNombreDelPrograma AS nomPrograma,
        tiposactividadesacademicas.strNombreActividadAcademica AS subPrograma, 
        curso.strNombreCursoDeFormacion AS nomCurso,
         modulo.strNombre AS nomModulo,	
        SUM(FORMAT(((  
               ROUND((TO_SECONDS(validarDatoNuloDateTime(CONCAT(MAKEDATE(1970, 01), ' ', substring(rp_horasalida, 12, 19)))) - TO_SECONDS(validarDatoNuloDateTime(CONCAT(MAKEDATE(1970, 01), ' ', substring(rp_horaingreso, 12, 19)))))/3600, 1)
               + ROUND((TO_SECONDS(validarDatoNuloDateTime(CONCAT(MAKEDATE(1970, 01), ' ', substring(rp_horasalida2, 12, 19)))) - TO_SECONDS(validarDatoNuloDateTime(CONCAT(MAKEDATE(1970, 01), ' ', substring(rp_horaingreso2, 12, 19)))))/3600, 1)
        )), 0)) AS totalHoras       
        FROM rd_planilla_asistencia planilla
        INNER JOIN tblcursosdeformacion curso
            ON planilla.rp_idcurso_fk = curso.intIdCursoDeFormacion
        INNER JOIN rd_persona persona
            ON planilla.rp_idpersona_fk = persona.Pe_IdPERSONA_PK	
        INNER JOIN tblsedes sedes 
            ON curso.intidsede = sedes.intidsede
        INNER JOIN tblPlanDeFormacionProgramas planFormacionPrograma
        ON curso.intIdPlanDeFormacionPrograma = planFormacionPrograma.intIdPlanDeFormacionPrograma
        LEFT JOIN tblProgramasoproyectos programa
        ON planFormacionPrograma.intIdProgramaOProyecto = programa.intIdProgramaOProyecto
        INNER JOIN rd_fechas_curso fechaCurso
        ON fechaCurso.id_curso_fk = curso.intIdCursoDeFormacion 
        INNER JOIN tblModulos modulo
        ON fechaCurso.id_modulo = modulo.intIdModulo 
        LEFT JOIN tblactividadesdeformacion actividadesFormacion 
        ON actividadesFormacion.intIdCursoDeFormacion = curso.intIdCursoDeFormacion 
        LEFT JOIN tblplandeformacionprogramastiposact plandeformacionprogramastiposact 
        ON plandeformacionprogramastiposact.intIdPlanDeFormacionProgramasTiposAct = curso.intIdPlanDeFormacionProgramasTiposAct 
        LEFT JOIN tbltiposactividadesacademicas tiposactividadesacademicas ON tiposactividadesacademicas.intIdTipoDeActividadAcademica = plandeformacionprogramastiposact.intIdTipoDeActividadAcademica
        WHERE planilla.rp_idpersona_fk = $personaId
        GROUP BY curso.strNombreCursoDeFormacion";

        return DB::connection(CONNECTION)->select(DB::raw($ssql));
    }
}
