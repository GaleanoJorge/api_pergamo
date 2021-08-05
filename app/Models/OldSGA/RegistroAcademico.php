<?php

namespace App\Models\OldSGA;

use DB;

class RegistroAcademico
{
    public static function cursos($curso_id)
    {
        $ssql="SELECT
             curso.intIdCursoDeFormacion as IDcurso,
             curso.strNombreCursoDeFormacion as nomCurso,
             sede.strNombreSede as nomSede,
             concat_ws(' ',coordinador.strprimernombre, coordinador.strsegundonombre, coordinador.strprimerapellido, coordinador.strsegundoapellido) as Coordinador,
             (select min(fecha) from rd_fechas_curso where id_curso_fk = fechascurso.id_curso_fk and estado_activo is true) as fechaInicio,
             (select max(fecha) from rd_fechas_curso where id_curso_fk = fechascurso.id_curso_fk and estado_activo is true) as fechaFinal,
              area.strNombreArea as Area,
             (SELECT strNombreSubArea FROM tblSubAreas WHERE intIdArea = area.intIdArea
            AND intIdSubArea = planFormacionPrograma.intIdSubArea) AS nomSubArea,
            programa.strNombreDelPrograma as Programa,  parametros.strNombreParametroDeFormador AS nomZona,
             parametroscurso.estado_curso as EstadoCurso,
             tiposactividadesacademicas.strNombreActividadAcademica AS subPrograma,
             actividadesFormacion.intIdCursoDeFormacion as idActividad,
             'Presencial' as presencial_virtual,
             modulos.strNombre as Modulo
            FROM rd_parametros_curso_formacion parametrosCurso
             INNER JOIN tblcursosdeformacion curso ON parametrosCurso.id_curso_formacion_fk = curso.intIdCursoDeFormacion
             INNER JOIN tblPlanDeFormacionProgramas planFormacionPrograma ON curso.intIdPlanDeFormacionPrograma = planFormacionPrograma.intIdPlanDeFormacionPrograma
             LEFT JOIN tblAreas area on planFormacionPrograma.intIdArea = area.intIdArea
             INNER JOIN tblProgramasOProyectos programa ON planFormacionPrograma.intIdProgramaOProyecto = programa.intIdProgramaOProyecto
             INNER JOIN tblPersonas coordinador ON curso.intIdCoordinadorResponsable = coordinador.intIdPersona
             INNER JOIN tblSedes sede ON curso.intIdSede = sede.intIdSede
             LEFT JOIN tblparametrosdeformadores parametros ON sede.intIdZona = parametros.intidparametrodeformador
             JOIN rd_fechas_curso fechasCurso ON curso.intIdCursoDeFormacion = fechasCurso.id_curso_fk
             join tblmodulos modulos on modulos.intIdModulo = fechascurso.id_modulo
              LEFT JOIN tblactividadesdeformacion actividadesFormacion
            ON actividadesFormacion.intIdCursoDeFormacion = curso.intIdCursoDeFormacion
             LEFT JOIN tblplandeformacionprogramastiposact plandeformacionprogramastiposact
            ON plandeformacionprogramastiposact.intIdPlanDeFormacionProgramasTiposAct = curso.intIdPlanDeFormacionProgramasTiposAct
            LEFT JOIN tbltiposactividadesacademicas tiposactividadesacademicas ON tiposactividadesacademicas.intIdTipoDeActividadAcademica = plandeformacionprogramastiposact.intIdTipoDeActividadAcademica
            WHERE parametroscurso.estado_curso in('terminado','cerrado')
            and curso.intIdCursoDeFormacion = $curso_id
            GROUP BY curso.strNombreCursoDeFormacion";

        return (DB::connection('CnxOldSGA')->select(DB::raw($ssql)))[0];
    }

    public static function formadores($curso_id){
        $ssql="SELECT DISTINCT
                persona.Pe_IDENTIFICACION AS numIdentificacion,
                (CASE
                    WHEN persona.Pe_PRIMERAPELLIDO IS NULL THEN ''
                    WHEN persona.Pe_PRIMERAPELLIDO IS NOT NULL THEN persona.Pe_PRIMERAPELLIDO
                END) AS primerApellido,
                (CASE
                    WHEN persona.Pe_SEGUNDOAPELLIDO IS NULL THEN ''
                    WHEN persona.Pe_SEGUNDOAPELLIDO IS NOT NULL THEN persona.Pe_SEGUNDOAPELLIDO
                END) AS segundoApellido,
                (CASE
                    WHEN persona.Pe_PRIMERNOMBRE IS NULL THEN ''
                    WHEN persona.Pe_PRIMERNOMBRE IS NOT NULL THEN persona.Pe_PRIMERNOMBRE
                END) AS primerNombre,
                (CASE
                    WHEN persona.Pe_SEGUNDONOMBRE IS NULL THEN ''
                    WHEN persona.Pe_SEGUNDONOMBRE IS NOT NULL THEN persona.Pe_SEGUNDONOMBRE
                END) AS segundoNombre,
                persona.Pe_email AS email,
                (CASE
                    WHEN cargo.lc_nombre IS NOT NULL THEN cargo.lc_nombre
                    WHEN cargo.lc_nombre IS NULL THEN (SELECT lc_nombre FROM rd_lista_cargos WHERE lc_id = cargopersona.usr_ext_cargo)
                END) AS nomCargo,
                (CASE
                    WHEN entidad.en_nombre_entidad IS NOT NULL THEN entidad.en_nombre_entidad
                    WHEN entidad.en_nombre_entidad IS NULL THEN (SELECT en_nombre_entidad FROM rd_entidades WHERE en_Identidad_pk = cargopersona.usr_ext_entidad_cargo)
                END) AS nomEntidad,
                especialidad.e_nombreespecialidad AS e_nombreespecialidad,
                (CASE
                    WHEN rdCiudad.cu_nombre IS NOT NULL THEN rdCiudad.cu_nombre
                    WHEN rdCiudad.cu_nombre IS NULL THEN (SELECT cu_nombre FROM rd_ciudades WHERE cu_id_pk = cargopersona.usr_ext_ciudad_cargo)
                END) AS nomCiudad,
                formador_modulos.es_admitido AS EsAdmitido,
                formador_modulos.es_rechazado AS esRechazado,
                persona.Pe_IdPERSONA_PK AS idPersona,
                formador_modulos.id_curso AS idInscripcionCurso,
                formador.id AS idFormador,
                formador_modulos.proceso_terminado AS procesoTerminado,
                formador_modulos.id_tblmodulos AS idModulo,
                formador_modulos.id AS idFormadorModulo,
                formador_modulos.no_requiere_taller as noRequiereTaller,
                formador_modulos.realizo_taller as realizoTaller,
                formador_modulos_admitidos.id_modulo,
                cargopersona.usr_ext_departamento_cargo AS extDepartamento,
                modulo.strNombre AS nomModulo,
                formador_modulos_admitidos.id as idFormadorModuloAdmitido ,
                formador_modulos_admitidos.id_curso
            FROM rd_formador formador
            INNER JOIN rd_formador_modulos formador_modulos
                ON formador_modulos.id_formador = formador.id
             AND formador_modulos.es_admitido = true
            INNER JOIN rd_formador_modulos_generales formador_modulos_generales
                ON formador_modulos_generales.id_formador = formador.id
            INNER JOIN tblprogramasoproyectos programa
                ON programa.intIdProgramaOProyecto = formador_modulos_generales.rd_idprograma_fk
            INNER JOIN tblplandeformacionprogramas planformacionprograma
                ON planformacionprograma.intIdProgramaOProyecto = programa.intIdProgramaOProyecto
            inner JOIN rd_formador_modulos_admitidos formador_modulos_admitidos
                ON formador_modulos_admitidos.id_formador = formador.id
            inner JOIN rd_persona persona
                ON formador.id_persona = persona.Pe_IdPERSONA_PK
            inner JOIN rd_experiencialaboral explaboral
             ON formador.id_experiencialaboral = explaboral.El_IdExperienciaLaboral_PK
            inner JOIN rd_cargo_persona cargopersona
                ON explaboral.El_IdPersonaCargo_FK = cargopersona.id_cargo_pk
            inner JOIN rd_especialidad especialidad
                ON explaboral.El_IdEspecialidad_FK = especialidad.e_idespecialidad
            inner JOIN rd_lista_cargos cargo
                ON cargopersona.rd_id_lista_cargos = cargo.lc_id
            inner JOIN rd_entidades entidad
                ON cargopersona.id_entidades = entidad.en_Identidad_pk
            inner JOIN rd_ciudades rdCiudad
                ON cargopersona.rd_Ciudad_FK = rdCiudad.cu_id_pk
            inner JOIN tblmodulos modulo
                ON formador_modulos_admitidos.id_modulo = modulo.intIdModulo
            WHERE formador_modulos_admitidos.id_curso = $curso_id
            ORDER BY primerApellido ASC, segundoApellido ASC, primerNombre ASC, segundoNombre ASC, nomCargo ASC;";

        return (DB::connection('CnxOldSGA')->select(DB::raw($ssql)));
    }

    public static function asistentes($curso_id, $grupo_id){
        $ssql="SELECT DISTINCT
           persona.Pe_IDENTIFICACION AS cedula,
           persona.Pe_PRIMERAPELLIDO AS primerApellido,
           (case
            WHEN persona.Pe_SEGUNDOAPELLIDO IS NULL THEN ''
            WHEN persona.Pe_SEGUNDOAPELLIDO IS NOT NULL THEN persona.Pe_SEGUNDOAPELLIDO
           end) AS segundoApellido,
           persona.Pe_PRIMERNOMBRE AS primerNombre,
            (case
            WHEN persona.Pe_SEGUNDONOMBRE IS NULL THEN ''
            WHEN persona.Pe_SEGUNDONOMBRE IS NOT NULL THEN persona.Pe_SEGUNDONOMBRE
           end) AS segundoNombre,
           (CASE
              WHEN persona.Pe_GENERO = 1 THEN 'Másculino'
              WHEN persona.Pe_GENERO = 0 THEN 'Femenino'
           end) genero,
           persona.Pe_Celular AS telefonoMovil,
           (case
            when cargo_persona.rd_id_lista_cargos is not null then cargo.lc_nombre
            when cargo_persona.rd_id_lista_cargos is null then (select lc_nombre from rd_lista_cargos where lc_id = cargo_persona.usr_ext_cargo)
           end) cargo,
           (CASE
            WHEN despacho.nombre IS NOT NULL THEN despacho.nombre
            WHEN dependencia.d_nombre IS NOT NULL THEN dependencia.d_nombre
            WHEN despacho.nombre IS NULL AND dependencia.d_nombre IS NULL THEN ''
           end) AS despachoDependencia,
           (case
            when cargo_persona.id_entidades is not null then entidad.en_nombre_entidad
            when cargo_persona.id_entidades is null then (select en_nombre_entidad from rd_entidades where en_identidad_pk = cargo_persona.usr_ext_entidad_cargo)
           end) AS corporacionJuzgado,
           (CASE
                WHEN especialidad.e_nombreespecialidad IS NULL THEN ''
                WHEN especialidad.e_nombreespecialidad IS NOT NULL THEN especialidad.e_nombreespecialidad
           END) AS especialidad,
           (CASE
                when cargo_persona.rd_Ciudad_FK is null then (select strNombreCiudad  from tblciudades where  intIdCiudad = cargo_persona.usr_ext_ciudad_cargo)
                when cargo_persona.rd_Ciudad_FK is not null then (select cu_nombre from rd_ciudades where  cu_id_pk = cargo_persona.rd_Ciudad_FK)
            END) AS Ciudad,
           (CASE
                WHEN circuito.ci_nombre IS NULL THEN ''
                WHEN circuito.ci_nombre IS NOT NULL THEN circuito.ci_nombre
           END) AS circuito,
           (CASE
                WHEN distrito.d_nombre IS NULL THEN ''
                WHEN distrito.d_nombre IS NOT NULL THEN distrito.d_nombre
           END) AS nomDistrito,
           (CASE
                WHEN concejo.cs_nombre IS NULL THEN ''
                WHEN concejo.cs_nombre IS NOT NULL THEN concejo.cs_nombre
           END) as nomConcejoSeccional,
           persona.Pe_IdPERSONA_PK AS idPersona,
           f_obtenerIdRdFechaCurso(curso.intIdCursoDeFormacion, grupo.intIdGrupoDeFormacion, persona.Pe_IdPERSONA_PK, 0) AS dia1,
           f_obtenerIdRdFechaCurso(curso.intIdCursoDeFormacion, grupo.intIdGrupoDeFormacion, persona.Pe_IdPERSONA_PK, 1) AS dia2,
           f_obtenerIdRdFechaCurso(curso.intIdCursoDeFormacion, grupo.intIdGrupoDeFormacion, persona.Pe_IdPERSONA_PK, 2) AS dia3,
           f_obtenerIdRdFechaCurso(curso.intIdCursoDeFormacion, grupo.intIdGrupoDeFormacion, persona.Pe_IdPERSONA_PK, 3) AS dia4,
           f_obtenerIdRdFechaCurso(curso.intIdCursoDeFormacion, grupo.intIdGrupoDeFormacion, persona.Pe_IdPERSONA_PK, 4) AS dia5
        FROM rd_persona persona
           LEFT JOIN rd_rol_persona rol_persona
            ON persona.Pe_IdPERSONA_PK = rol_persona.Rp_IdPERSONA_FK
           LEFT JOIN rd_rol rol
            ON rol_persona.Rp_IdROL_FK = rol.Ro_IdROL_PK
           LEFT JOIN rd_inscripcioncursos inscripcion_curso
            ON persona.Pe_IdPERSONA_PK = inscripcion_curso.ri_IdPersona_FK
           INNER JOIN tblcursosdeformacion curso
            ON inscripcion_curso.ri_IdCursosDeFormacion_FK = curso.intIdCursoDeFormacion
           INNER JOIN tblgruposdeformacion grupo
            ON inscripcion_curso.id_grupo = grupo.intIdGrupoDeFormacion
           LEFT JOIN tblsedes sede
            ON curso.intIdSede = sede.intIdSede
           LEFT JOIN tblparametrosdeformadores parametros_zona
            ON sede.intIdZona = parametros_zona.intIdParametroDeFormador
           LEFT JOIN tblprogramasoproyectos programa
            ON grupo.intIdProgramaOProyecto = programa.intIdProgramaOProyecto
           LEFT JOIN tblsubprogramasosubproyectos sub_programa
            ON curso.intIdSubProgramaOSubProyecto = sub_programa.intIdSubProgramaOSubProyecto
           LEFT JOIN rd_experiencialaboral experiencia_laboral
            ON persona.Pe_IdPERSONA_PK = experiencia_laboral.el_idpersona_fk
            AND curso.intIdCursoDeFormacion = experiencia_laboral.El_IdCursoFormacion_FK
           LEFT JOIN rd_cargo_persona cargo_persona
            ON experiencia_laboral.El_IdPersonaCargo_FK = cargo_persona.id_cargo_pk
           LEFT OUTER JOIN rd_dependencia dependencia
            ON cargo_persona.rd_IdDependencia_FK = dependencia.d_id
           LEFT OUTER JOIN tblciudades ciudad
            ON persona.Pe_IntldCiudad_FK = ciudad.intIdCiudad
           LEFT OUTER JOIN rd_distrito distrito
            ON cargo_persona.rd_Distrito_FK = distrito.d_id
           LEFT OUTER JOIN rd_concejoseccional concejo
            ON cargo_persona.rd_concejo_seccional_FK = concejo.cs_id
           LEFT OUTER JOIN rd_lista_cargos cargo
            ON cargo_persona.rd_id_lista_cargos = cargo.lc_id
           LEFT OUTER JOIN rd_despacho despacho
            ON cargo_persona.rd_id_despacho_fk = despacho.id
           LEFT OUTER JOIN rd_circuitos circuito
            ON cargo_persona.rd_circuito_fk = circuito.ci_id_pk
           LEFT OUTER JOIN rd_entidades entidad
            ON cargo_persona.id_entidades = entidad.en_Identidad_pk
           LEFT JOIN rd_especialidad especialidad
            ON experiencia_laboral.El_IdEspecialidad_FK = especialidad.e_idespecialidad
           INNER JOIN rd_fechas_curso fecha_curso_modulo
            ON curso.intIdCursoDeFormacion = fecha_curso_modulo.id_curso_fk
           INNER JOIN tblmodulos modulo
            ON fecha_curso_modulo.id_modulo = modulo.intIdModulo
           INNER JOIN tblpersonas coordinador
            ON curso.intIdCoordinadorResponsable = coordinador.intIdPersona
           LEFT OUTER JOIN tblvigencias vigencia
            ON curso.intIdVigencia = vigencia.intIdVigencia
           LEFT OUTER JOIN rd_tipo_costo_curso tipo_costo
            ON curso.intCostoCurso = tipo_costo.id
           INNER JOIN rd_tiposidentificacion tipo_identificacion
            ON persona.Pe_IdTIPOIDENTIFICACION = tipo_identificacion.ti_id
           LEFT JOIN tblplandeformacionprogramastiposact plandeformacionprogramastiposact
            ON plandeformacionprogramastiposact.intIdPlanDeFormacionProgramasTiposAct = curso.intIdPlanDeFormacionProgramasTiposAct
           LEFT JOIN tbltiposactividadesacademicas tiposactividadesacademicas
            ON tiposactividadesacademicas.intIdTipoDeActividadAcademica = plandeformacionprogramastiposact.intIdTipoDeActividadAcademica
           INNER JOIN rd_planilla_asistencia planilla_asistencia
            ON planilla_asistencia.rp_idpersona_fk = persona.Pe_IdPERSONA_PK
        WHERE curso.intIdCursoDeFormacion = $curso_id
        AND grupo.intIdGrupoDeFormacion = $grupo_id
        AND (
        planilla_asistencia.rp_horaingreso IS NOT NULL AND planilla_asistencia.rp_horasalida IS NOT NULL
        OR planilla_asistencia.rp_horaingreso2 IS NOT NULL AND planilla_asistencia.rp_horasalida2 IS NOT NULL
        )
        AND (f_obtenerIdRdFechaCurso(curso.intIdCursoDeFormacion, grupo.intIdGrupoDeFormacion, persona.Pe_IdPERSONA_PK, 0)+
               f_obtenerIdRdFechaCurso(curso.intIdCursoDeFormacion, grupo.intIdGrupoDeFormacion, persona.Pe_IdPERSONA_PK, 1)+
               f_obtenerIdRdFechaCurso(curso.intIdCursoDeFormacion, grupo.intIdGrupoDeFormacion, persona.Pe_IdPERSONA_PK, 2)+
               f_obtenerIdRdFechaCurso(curso.intIdCursoDeFormacion, grupo.intIdGrupoDeFormacion, persona.Pe_IdPERSONA_PK, 3)+
               f_obtenerIdRdFechaCurso(curso.intIdCursoDeFormacion, grupo.intIdGrupoDeFormacion, persona.Pe_IdPERSONA_PK, 4)) > 0
        ORDER BY persona.Pe_PRIMERAPELLIDO ASC,
           persona.Pe_SEGUNDOAPELLIDO ASC,
           persona.Pe_PRIMERNOMBRE ASC,
           persona.Pe_SEGUNDONOMBRE ASC";

        return DB::connection('CnxOldSGA')->select(DB::raw($ssql));
    }
}
