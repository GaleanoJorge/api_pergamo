<?php

namespace App\Models\OldSGA;

use DB;

class EncuestaIndividual
{
    public static function generateReport($curso_id, $filters)
    {
        $ssql = "select
                curso.intIdCursoDeFormacion AS idCurso,
                curso.strNombreCursoDeFormacion AS Curso,
                (select min(fecha) from rd_fechas_curso where id_curso_fk = curso.intIdCursoDeFormacion) as fechaInicioCurso,
                (select max(fecha) from rd_fechas_curso where id_curso_fk = curso.intIdCursoDeFormacion) as FechaFinCurso,
                sede.strNombreSede AS Sede,
                programa.strNombreDelPrograma AS Programa,
                modulos.strNombre AS Modulo,
                (case
                    when curso.intCostoCurso = 1 then 'Con costo'
                    when curso.intCostoCurso = 2 then 'Sin costo'
                    when curso.intCostoCurso = 3 then 'Reserva'
                end) as recursoInversion,
                vigencia.strNombreVigencia AS Vigencia,
                concat_ws(' ',coordinador.strprimernombre, coordinador.strsegundonombre, coordinador.strprimerapellido, coordinador.strsegundoapellido) as Coordinador,
                tipoIdentificacion.ti_nombre AS TipoIdentificacion,
                persona.Pe_IDENTIFICACION AS cedula,
                persona.Pe_PRIMERNOMBRE AS primerNombre,
                persona.Pe_SEGUNDONOMBRE AS segundoNombre,
                persona.Pe_PRIMERAPELLIDO AS primerApellido,
                persona.Pe_SEGUNDOAPELLIDO AS segundoApellido,
                persona.Pe_FechaNacimiento AS Nacimiento,
                persona.Pe_email AS Correo,
                persona.Pe_Telefono AS Telefono,
                persona.Pe_Celular AS Celular,
                especialidad.e_nombreespecialidad AS Especialidad,
                (case
                    when cargoPersona.rd_id_lista_cargos is not null then cargo.lc_nombre
                    when cargoPersona.rd_id_lista_cargos is null then (select lc_nombre from rd_lista_cargos where lc_id = cargoPersona.usr_ext_cargo)
                end) Cargo,
                (CASE
                    WHEN despacho.nombre IS NOT NULL THEN despacho.nombre
                    WHEN dependencia.d_nombre IS NOT NULL THEN dependencia.d_nombre
                    WHEN despacho.nombre IS NULL AND dependencia.d_nombre IS NULL THEN ''
                end) AS DespachoDependencia,
                (case
                    when cargoPersona.id_entidades is not null then entidad.en_nombre_entidad
                    when cargoPersona.id_entidades is null then (select en_nombre_entidad from rd_entidades where en_identidad_pk = cargoPersona.usr_ext_entidad_cargo)
                end) AS CorporacionJuzgado,
                concejo.cs_nombre AS ConcejoSeccional,
                distrito.d_nombre AS Distrito,
                circuito.ci_nombre AS Circuito,
                ciudad.strNombreCiudad AS Ciudad,
                (CASE
                    WHEN experienciaLaboral.El_VinculacionRamaJudicial = 1 THEN 'Si'
                    WHEN experienciaLaboral.El_VinculacionRamaJudicial = 0 THEN 'No'
                END) AS Vinculacion,
                experienciaLaboral.El_AnioVinculacion AS AnioVinculacion,
                experienciaLaboral.El_InscripcionCarreraJudicial AS InscripcionCarrera,
                cargoinscripcioncarrera.lc_nombre AS cargoCarreraJudicial,
                experienciaLaboral.El_NumAniosExpe AS TotalAniosVinculacion,
                experienciaLaboral.El_CalificacionServicios AS CalificacionServicios,
                (CASE
                    WHEN experienciaLaboral.El_AnotacionesLey88 = 1 THEN 'Si'
                    WHEN experienciaLaboral.El_AnotacionesLey88 = 0 THEN 'No'
                END) AS AnotacionLey88,
                (CASE
                    WHEN experienciaLaboral.El_SancionesDisciplinarias = 1 THEN 'Si'
                    WHEN experienciaLaboral.El_SancionesDisciplinarias = 0 THEN 'No'
                END) AS Sanciones,
                (CASE
                    WHEN experienciaLaboral.El_DespachoAlDia = 1 THEN 'Si'
                    WHEN experienciaLaboral.El_DespachoAlDia = 0 THEN 'No'
                END) AS CongestionDespacho,
                (CASE
                    WHEN experienciaLaboral.El_RedFormadores = 1 THEN 'Si'
                    WHEN experienciaLaboral.El_RedFormadores = 0 THEN 'No'
                END) AS RedFormadores,
                (CASE
                    WHEN experienciaLaboral.El_FormacionIgualdadGenero = 1 THEN 'Si'
                    WHEN experienciaLaboral.El_FormacionIgualdadGenero = 0 THEN 'No'
                END) AS FormacionIgualdadGenero,
                (case
                    when infAcademica.ia_tieneDocencia = 1 THEN 'Si'
                    when infAcademica.ia_tieneDocencia = 0 THEN 'No'
                end) AS Docencia,
                (case
                    when infAcademica.ia_tieneDoctorado = 1 THEN 'Si'
                    when infAcademica.ia_tieneDoctorado = 0 THEN 'No'
                end) AS Doctorado,
                (case
                    when infAcademica.ia_tieneEspecializacin = 1 THEN 'Si'
                    when infAcademica.ia_tieneEspecializacin = 0 THEN 'No'
                end) AS Especializacion,
                (case
                    when infAcademica.ia_tienePregrado = 1 THEN 'Si'
                    when infAcademica.ia_tienePregrado = 0 THEN 'No'
                end) AS Pregrado,
                (case
                    when infAcademica.ia_tienePublicaciones = 1 THEN 'Si'
                    when infAcademica.ia_tienePublicaciones = 0 THEN 'No'
                end) AS Publicaciones,
                (case
                    when infAcademica.tiene_maestria = 1 THEN 'Si'
                    when infAcademica.tiene_maestria = 0 THEN 'No'
                end) AS Maestria,
                infAcademica.ia_descripcion AS DescAcademica,
                (case
                    when encuestaRealizada.id_persona=persona.Pe_IdPERSONA_PK THEN 'Si'
                    when encuestaRealizada.id_persona<>persona.Pe_IdPERSONA_PK is null THEN 'No'
                end) AS Encuesta
            from rd_persona persona
                 INNER JOIN rd_planilla_asistencia planillaAsistencia ON planillaAsistencia.rp_idpersona_fk = persona.Pe_IdPERSONA_PK
                inner join rd_experiencialaboral experienciaLaboral on persona.Pe_IdPERSONA_PK=experienciaLaboral.El_IdPersona_FK
                inner join tblcursosdeformacion curso on experienciaLaboral.El_IdCursoFormacion_FK=curso.intIdCursoDeFormacion
                inner join rd_fechas_curso fechasCurso on fechasCurso.id_curso_fk=curso.intIdCursoDeFormacion
                inner join tblsedes sede ON curso.intIdSede = sede.intIdSede
                inner join tblplandeformacionprogramas planFormacionPrograma on planFormacionPrograma.intIdPlanDeFormacionPrograma=curso.intIdPlanDeFormacionPrograma
                inner join tblprogramasoproyectos programa on programa.intIdProgramaOProyecto=planFormacionPrograma.intIdProgramaOProyecto
                inner join tblmodulos modulos on modulos.intIdModulo=fechasCurso.id_modulo
                inner join tblvigencias vigencia on vigencia.intIdVigencia=curso.intIdVigencia
                inner join tblpersonas coordinador on coordinador.intIdPersona=curso.intIdCoordinadorResponsable
                inner join rd_tiposidentificacion tipoIdentificacion on tipoIdentificacion.ti_id=persona.Pe_IdTIPOIDENTIFICACION
                inner join rd_cargo_persona cargoPersona on cargoPersona.id_cargo_pk=experienciaLaboral.El_IdPersonaCargo_FK
                inner join tblciudades ciudad ON persona.Pe_IntldCiudad_FK = ciudad.intIdCiudad
                left join rd_especialidad especialidad on especialidad.e_idespecialidad=experienciaLaboral.El_IdEspecialidad_FK
                left join rd_lista_cargos cargo on cargo.lc_id=cargoPersona.rd_id_lista_cargos
                left join rd_despacho despacho ON cargoPersona.rd_id_despacho_fk = despacho.id
                left join rd_dependencia dependencia ON cargoPersona.rd_IdDependencia_FK = dependencia.d_id
                left join rd_entidades entidad ON cargoPersona.id_entidades = entidad.en_Identidad_pk
                left join rd_concejoseccional concejo ON cargoPersona.rd_concejo_seccional_FK = concejo.cs_id
                left join rd_distrito distrito ON cargoPersona.rd_Distrito_FK = distrito.d_id
                left join rd_circuitos circuito ON cargoPersona.rd_circuito_fk = circuito.ci_id_pk
                left join rd_lista_cargos cargoinscripcioncarrera ON cargoinscripcioncarrera.lc_id=experienciaLaboral.rd_cargo_inscripcion_carrea_fk
                left join rd_infacademica infAcademica ON infAcademica.ia_id=experienciaLaboral.el_infacademica
                left join rd_encuestas_realizadas encuestaRealizada on persona.Pe_IdPERSONA_PK=encuestaRealizada.id_persona
            where (planillaAsistencia.rp_horaingreso IS NOT NULL AND planillaAsistencia.rp_horasalida IS NOT NULL
                    OR planillaAsistencia.rp_horaingreso2 IS NOT NULL AND planillaAsistencia.rp_horasalida2 IS NOT NULL)
                     AND curso.intIdCursoDeFormacion = $curso_id ";

        if (@$filters['fecha_inicio']) {
            $ssql .= " AND fechascurso.fecha >= '" . $filters['fecha_inicio'] . "'";
        }

        if (@$filters['fecha_fin']) {
            $ssql .= " AND fechascurso.fecha <= '" . $filters['fecha_fin'] . "'";
        }

        if (@$filters['tipo_documento_id']) {
            $ssql .= " AND persona.Pe_IdTIPOIDENTIFICACION = " . $filters['tipo_documento_id'];
        }

        if (@$filters['numero_documento']) {
            $ssql .= " AND persona.Pe_IDENTIFICACION = '" . $filters['numero_documento'] . "'";
        }

        if (@$filters['primer_apellido']) {
            $ssql .= " AND UPPER(persona.PE_PRIMERAPELLIDO) = UPPER('" . $filters['primer_apellido'] . "')";
        }

        if (@$filters['segundo_apellido']) {
            $ssql .= " AND UPPER(persona.PE_SEGUNDOAPELLIDO) = UPPER('" . $filters['segundo_apellido'] . "')";
        }

        if (@$filters['primer_nombre']) {
            $ssql .= " AND UPPER(persona.PE_PRIMERNOMBRE) = UPPER('" . $filters['primer_nombre'] . "')";
        }

        if (@$filters['segundo_nombre']) {
            $ssql .= " AND UPPER(persona.PE_SEGUNDONOMBRE) = UPPER('" . $filters['segundo_nombre'] . "')";
        }

        if (@$filters['fecha_nacimiento']) {
            $ssql .= " AND persona.Pe_FechaNacimiento = '" . $filters['fecha_nacimiento'] . "'";
        }

        if (@$filters['email']) {
            $ssql .= " AND UPPER(persona.Pe_email) = UPPER('" . $filters['email'] . "')";
        }

        if (@$filters['telefono_fijo']) {
            $ssql .= " AND persona.Pe_Telefono = '" . $filters['telefono_fijo'] . "'";
        }

        if (@$filters['telefono_celular']) {
            $ssql .= " AND persona.Pe_Celular = '" . $filters['telefono_celular'] . "'";
        }

        if (@$filters['cargo_id']) {
            $ssql .= " AND cargoPersona.rd_id_lista_cargos = " . $filters['cargo_id'];
        }

        if (@$filters['despacho_id']) {
            $ssql .= " AND cargoPersona.rd_id_despacho_fk = " . $filters['despacho_id'];
        }

        if (@$filters['especialidad_id']) {
            $ssql .= " AND experienciaLaboral.El_IdEspecialidad_FK = " . $filters['especialidad_id'];
        }

        if (@$filters['entidad_id']) {
            $ssql .= " AND cargoPersona.id_entidades = " . $filters['entidad_id'];
        }

        if (@$filters['concejo_id']) {
            $ssql .= " AND cargoPersona.rd_concejo_seccional_FK = " . $filters['concejo_id'];
        }

        if (@$filters['distrito_id']) {
            $ssql .= " AND cargoPersona.rd_Distrito_FK = " . $filters['distrito_id'];
        }

        if (@$filters['circuito_id']) {
            $ssql .= " AND cargoPersona.rd_circuito_fk = " . $filters['circuito_id'];
        }

        if (@$filters['ciudad_id']) {
            $ssql .= " AND cargoPersona.rd_Ciudad_FK = " . $filters['ciudad_id'];
        }

        if (@$filters['ano_vinculacion']) {
            $ssql .= " AND experienciaLaboral.El_AnioVinculacion = '" . $filters['ano_vinculacion'] . "'";
        }

        if (@$filters['cargo_inscripcion_id']) {
            $ssql .= " AND experienciaLaboral.rd_cargo_inscripcion_carrea_fk = " . $filters['cargo_inscripcion_id'];
        }

        if (@$filters['ano_vinculacion_rama']) {
            $ssql .= " AND experienciaLaboral.El_NumAniosExpe = '" . $filters['ano_vinculacion_rama'] . "'";
        }

        if (@$filters['ultima_calificacion']) {
            $ssql .= " AND experienciaLaboral.El_CalificacionServicios = " . $filters['ultima_calificacion'];
        }

        if (@$filters['vinculacion_rama']) {
            $ssql .= " AND experienciaLaboral.El_VinculacionRamaJudicial = " . $filters['vinculacion_rama'];
        }

        if (@$filters['carrera_judicial']) {
            $ssql .= " AND experienciaLaboral.El_AnioVinculacion = " . $filters['carrera_judicial'];
        }

        if (@$filters['anotaciones_acuerdo']) {
            $ssql .= " AND experienciaLaboral.El_AnotacionesLey88 = " . $filters['anotaciones_acuerdo'];
        }

        if (@$filters['sanciones_disciplinarias']) {
            $ssql .= " AND experienciaLaboral.El_SancionesDisciplinarias = " . $filters['sanciones_disciplinarias'];
        }

        if (@$filters['formadores_escuela']) {
            $ssql .= " AND experienciaLaboral.El_RedFormadores = " . $filters['formadores_escuela'];
        }

        if (@$filters['igualdad_genero']) {
            $ssql .= " AND experienciaLaboral.El_FormacionIgualdadGenero = " . $filters['igualdad_genero'];
        }

        if (@$filters['congestion_despacho']) {
            $ssql .= " AND experienciaLaboral.El_DespachoAlDia = " . $filters['congestion_despacho'];
        }

        if (@$filters['eventos_escuela']) {
            $ssql .= " AND experienciaLaboral.El_ParticipacionEventosEJRLB = " . $filters['eventos_escuela'];
        }

        if (@$filters['encuesta'] && $filters['encuesta'] == 'realizadas') {
            $ssql .= " AND encuestaRealizada.id_persona IS NOT NULL";
        }

        if (@$filters['encuesta'] && $filters['encuesta'] == 'no_realizadas') {
            $ssql .= " AND encuestaRealizada.id_persona IS NULL";
        }

        if (!@$filters['formacion_academica']) {
            $filters['formacion_academica'] = [];
        }

        //["Pregrado", "Especialización","Maestría","Doctorado","Docencia","Publicaciones"]
        if (in_array("Pregrado", $filters['formacion_academica'])) {
            $ssql .= " AND infAcademica.ia_tienePregrado = 1 ";
        }

        if (in_array("Especialización", $filters['formacion_academica'])) {
            $ssql .= " AND infAcademica.ia_tieneEspecializacin = 1 ";
        }

        if (in_array("Maestría", $filters['formacion_academica'])) {
            $ssql .= " AND infAcademica.tiene_maestria = 1 ";
        }

        if (in_array("Doctorado", $filters['formacion_academica'])) {
            $ssql .= " AND infAcademica.ia_tieneDoctorado = 1 ";
        }

        if (in_array("Docencia", $filters['formacion_academica'])) {
            $ssql .= " AND infAcademica.ia_tieneDocencia = 1 ";
        }

        if (in_array("Publicaciones", $filters['formacion_academica'])) {
            $ssql .= " AND infAcademica.ia_tienePublicaciones = 1 ";
        }

        $ssql .= " group by curso.intIdCursoDeFormacion, persona.pe_identificacion
            order by encuestaRealizada.id_encuesta desc,
                curso.intIdCursoDeFormacion,
                persona.Pe_PRIMERAPELLIDO ASC, persona.Pe_SEGUNDOAPELLIDO ASC, persona.Pe_PRIMERNOMBRE ASC, persona.Pe_SEGUNDONOMBRE ASC";

        return DB::connection('CnxOldSGA')->select(DB::raw($ssql));
    }
}
