<?php

namespace App\Models\OldSGA;

use App\Models\OldSGA\Filters;
use DB;

class Discentes
{
    public static function getAdmitidosRechazadosByCurso(int $cursoId, string $campo)
    {
        $ssql = "SELECT persona.pe_identificacion, persona.Pe_email, persona.Pe_Celular,
        concat_ws(' ', persona.Pe_PRIMERAPELLIDO, persona.Pe_SEGUNDOAPELLIDO, persona.Pe_PRIMERNOMBRE, persona.Pe_SEGUNDONOMBRE) as apellidoNombrePersona
       from tblprogramasoproyectos programa
           inner join tblplandeformacionprogramas planFormacionPrograma on programa.intIdProgramaOProyecto=planFormacionPrograma.intIdProgramaOProyecto
           inner join tblcursosdeformacion curso on curso.intIdPlanDeFormacionPrograma=planFormacionPrograma.intIdPlanDeFormacionPrograma
           inner join rd_inscripcioncursos inscripcionCurso on curso.intIdCursoDeFormacion=inscripcionCurso.ri_IdCursosDeFormacion_FK
           inner join rd_persona persona on inscripcionCurso.ri_IdPersona_FK=persona.Pe_IdPERSONA_PK
       where inscripcionCurso.$campo is true and  curso.intIdCursoDeFormacion=$cursoId
       group by persona.pe_identificacion order by persona.pe_identificacion";

        return DB::connection('CnxOldSGA')->select(DB::raw($ssql));
    }

    public static function getAsistentesByCurso(int $cursoId)
    {
        $ssql = "SELECT persona.pe_identificacion, persona.Pe_email, persona.Pe_Celular,
        concat_ws(' ', persona.Pe_PRIMERAPELLIDO, persona.Pe_SEGUNDOAPELLIDO, persona.Pe_PRIMERNOMBRE, persona.Pe_SEGUNDONOMBRE) as apellidoNombrePersona
       from tblprogramasoproyectos programa
           inner join tblplandeformacionprogramas planFormacionPrograma on programa.intIdProgramaOProyecto=planFormacionPrograma.intIdProgramaOProyecto
           inner join tblcursosdeformacion curso on curso.intIdPlanDeFormacionPrograma=planFormacionPrograma.intIdPlanDeFormacionPrograma
           inner join rd_planilla_asistencia planillaAsistencia on curso.intIdCursoDeFormacion=planillaAsistencia.rp_idcurso_fk
           inner join rd_asistencia_discente asistenciaDiscente on planillaAsistencia.rp_id_pk=asistenciaDiscente.id_planilla_asistencia
           inner join rd_persona persona on planillaAsistencia.rp_idpersona_fk=persona.Pe_IdPERSONA_PK
       where asistenciaDiscente.asistio is true and  curso.intIdCursoDeFormacion=$cursoId
       group by persona.pe_identificacion order by persona.pe_identificacion";

        return DB::connection('CnxOldSGA')->select(DB::raw($ssql));
    }

    public static function getFullInfoByCurso(int $cursoId, array $filters, string $state){

        /*(CASE
            WHEN subPrograma.strNombreDelSubPrograma IS NOT NULL THEN subPrograma.strNombreDelSubPrograma
            WHEN subPrograma.strNombreDelSubProyecto IS NOT NULL THEN subPrograma.strNombreDelSubProyecto
            WHEN subPrograma.strNombreDelSubPrograma IS NULL AND subPrograma.strNombreDelSubProyecto  IS NULL THEN ''
        end) AS Subprograma, */

        $ssql="SELECT curso.intIdCursoDeFormacion AS idCurso, curso.strNombreCursoDeFormacion AS Curso,
        (select min(fecha) from rd_fechas_curso where id_curso_fk = curso.intIdCursoDeFormacion) as fecInicioCurso,
        (select max(fecha) from rd_fechas_curso where id_curso_fk = curso.intIdCursoDeFormacion) as fecFinCurso,
        sede.strNombreSede as Sede,
        programa.strNombreDelPrograma as Programa,
        modulos.strNombre as Modulo,
        (case
            when curso.intCostoCurso = 1 then 'Con costo'
            when curso.intCostoCurso = 2 then 'Sin costo'
            when curso.intCostoCurso = 3 then 'Reserva'
        end) as recursoInversion,
        vigencia.strNombreVigencia as Vigencia,
        concat_ws(' ',coordinador.strprimernombre, coordinador.strsegundonombre, coordinador.strprimerapellido, coordinador.strsegundoapellido) as Coordinador,
        tipoIdentificacion.ti_nombre as tipoIdentificacion,
        persona.Pe_IDENTIFICACION AS cedula,
        persona.Pe_PRIMERNOMBRE AS primerNombre,
        persona.Pe_SEGUNDONOMBRE AS segundoNombre,
        persona.Pe_PRIMERAPELLIDO AS primerApellido,
        persona.Pe_SEGUNDOAPELLIDO AS segundoApellido,
        persona.Pe_FechaNacimiento AS Nacimiento,
        (CASE
            WHEN persona.Pe_GENERO = 1 THEN 'M'
            WHEN persona.Pe_GENERO = 0 THEN 'F'
        end) Genero,
        persona.Pe_email as Correo,
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
        end) AS corporacionJuzgado,
        concejo.cs_nombre AS ConcejoSeccional,
        distrito.d_nombre AS Distrito,
        circuito.ci_nombre AS Circuito,
       (CASE
               when cargoPersona.rd_Ciudad_FK is null then (select strNombreCiudad  from tblciudades where  intIdCiudad = cargoPersona.usr_ext_ciudad_cargo)
              when cargoPersona.rd_Ciudad_FK is not null then (select cu_nombre from rd_ciudades where  cu_id_pk = cargoPersona.rd_Ciudad_FK)
         END) AS Ciudad,
         (CASE
            WHEN experienciaLaboral.El_VinculacionRamaJudicial = 1 THEN 'Si'
            WHEN experienciaLaboral.El_VinculacionRamaJudicial = 0 THEN 'No'
        END) AS Vinculacion,
        experienciaLaboral.El_AnioVinculacion AS AnioVinculacion,
        (CASE
            WHEN experienciaLaboral.El_InscripcionCarreraJudicial = 1 THEN 'Si'
            WHEN experienciaLaboral.El_InscripcionCarreraJudicial = 0 THEN 'No'
        END) AS InscripcionCarrera,
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
        infAcademica.ia_descripcion AS DescAcademica
    from tblcursosdeformacion curso
        inner join rd_inscripcioncursos inscripcionCurso on curso.intIdCursoDeFormacion=inscripcionCurso.ri_IdCursosDeFormacion_FK
        inner join rd_persona persona on inscripcionCurso.ri_IdPersona_FK=persona.Pe_IdPERSONA_PK
        INNER JOIN rd_experiencialaboral experienciaLaboral
            on experienciaLaboral.El_IdPersona_FK=persona.Pe_IdPERSONA_PK
            and experienciaLaboral.El_IdCursoFormacion_FK = inscripcionCurso.ri_IdCursosDeFormacion_FK
        INNER JOIN rd_tiposidentificacion tipoIdentificacion ON persona.Pe_IdTIPOIDENTIFICACION = tipoIdentificacion.ti_id
        inner join tblsedes sede on curso.intIdSede=sede.intIdSede
        inner join tblplandeformacionprogramas planFormacionPrograma on curso.intIdPlanDeFormacionPrograma=planFormacionPrograma.intIdPlanDeFormacionPrograma
        inner join tblprogramasoproyectos programa on planFormacionPrograma.intIdProgramaOProyecto=programa.intIdProgramaOProyecto
        INNER JOIN rd_fechas_curso fechasCurso ON curso.intIdCursoDeFormacion = fechasCurso.id_curso_fk
        INNER JOIN tblmodulos modulos ON fechasCurso.id_modulo = modulos.intIdModulo
        inner join tblvigencias vigencia on curso.intIdVigencia=vigencia.intIdVigencia
        INNER JOIN tblpersonas coordinador ON curso.intIdCoordinadorResponsable = coordinador.intIdPersona
        left JOIN tblsubprogramasosubproyectos subPrograma ON curso.intIdSubProgramaOSubProyecto = subPrograma.intIdSubProgramaOSubProyecto
        LEFT JOIN rd_especialidad especialidad ON experienciaLaboral.El_IdEspecialidad_FK = especialidad.e_idespecialidad
        LEFT JOIN rd_cargo_persona cargoPersona ON experienciaLaboral.El_IdPersonaCargo_FK = cargoPersona.id_cargo_pk
        LEFT JOIN rd_lista_cargos cargoinscripcioncarrera ON experienciaLaboral.rd_cargo_inscripcion_carrea_fk=cargoinscripcioncarrera.lc_id
        LEFT JOIN rd_lista_cargos cargo ON cargoPersona.rd_id_lista_cargos = cargo.lc_id
        LEFT JOIN rd_dependencia dependencia ON cargoPersona.rd_IdDependencia_FK = dependencia.d_id
        LEFT JOIN rd_despacho despacho ON cargoPersona.rd_id_despacho_fk = despacho.id
        LEFT JOIN rd_concejoseccional concejo ON cargoPersona.rd_concejo_seccional_FK = concejo.cs_id
        LEFT JOIN rd_distrito distrito ON cargoPersona.rd_Distrito_FK = distrito.d_id
        LEFT JOIN rd_circuitos circuito ON cargoPersona.rd_circuito_fk = circuito.ci_id_pk
        LEFT JOIN tblciudades ciudad ON persona.Pe_IntldCiudad_FK = ciudad.intIdCiudad
        LEFT JOIN rd_infacademica infAcademica ON infAcademica.ia_id=experienciaLaboral.el_infacademica
        LEFT JOIN rd_entidades entidad ON cargoPersona.id_entidades = entidad.en_Identidad_pk";

        $aux_join=($state=="NOA")?" INNER JOIN rd_planilla_asistencia planillaAsistencia on planillaAsistencia.rp_idcurso_fk = curso.intIdCursoDeFormacion
        and planillaAsistencia.rp_idpersona_fk = persona.Pe_IdPERSONA_PK ":"";

        $ssql.=$aux_join." WHERE curso.intIdCursoDeFormacion = $cursoId ";

        switch($state){
            case "PRE":
                $ssql.=" AND ((inscripcionCurso.EsAdmitido is true and inscripcionCurso.esRechazado is false)
                or(inscripcionCurso.EsAdmitido is false and inscripcionCurso.esRechazado is true)
                or (inscripcionCurso.EsAdmitido is false and inscripcionCurso.esRechazado is false)) ";
                break;
            case "ADM":
                $ssql.=" AND inscripcionCurso.EsAdmitido is true ";
                break;
            case "REC":
                $ssql.=" AND inscripcionCurso.esRechazado is true ";
                break;
            case "NOA":
                $ssql.=" AND (planillaAsistencia.rp_horaingreso IS NULL AND planillaAsistencia.rp_horasalida IS NULL
                AND planillaAsistencia.rp_horaingreso2 IS NULL AND planillaAsistencia.rp_horasalida2 IS NULL) ";
                break;
        }

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

        if ($filters['fecha_inicio']) {
            $ssql .= " AND fechascurso.fecha >= '" . $filters['fecha_inicio'] ."'";
        }

        if ($filters['fecha_fin']) {
            $ssql .= " AND fechascurso.fecha <= '" . $filters['fecha_fin'] ."'";
        }

        if ($filters['tipo_documento_id']) {
            $ssql .= " AND persona.Pe_IdTIPOIDENTIFICACION = " . $filters['tipo_documento_id'];
        }

        if ($filters['numero_documento']) {
            $ssql .= " AND persona.Pe_IDENTIFICACION = '" . $filters['numero_documento']."'";
        }

        if ($filters['primer_apellido']) {
            $ssql .= " AND UPPER(persona.PE_PRIMERAPELLIDO) = UPPER('" . $filters['primer_apellido'] ."')";
        }

        if ($filters['segundo_apellido']) {
            $ssql .= " AND UPPER(persona.PE_SEGUNDOAPELLIDO) = UPPER('" . $filters['segundo_apellido'] ."')";
        }

        if ($filters['primer_nombre']) {
            $ssql .= " AND UPPER(persona.PE_PRIMERNOMBRE) = UPPER('" . $filters['primer_nombre'] ."')";
        }

        if ($filters['segundo_nombre']) {
            $ssql .= " AND UPPER(persona.PE_SEGUNDONOMBRE) = UPPER('" . $filters['segundo_nombre'] ."')";
        }

        if ($filters['fecha_nacimiento']) {
            $ssql .= " AND persona.Pe_FechaNacimiento = '" . $filters['fecha_nacimiento'] ."'";
        }

        if ($filters['email']) {
            $ssql .= " AND UPPER(persona.Pe_email) = UPPER('" . $filters['email'] ."')";
        }

        if ($filters['telefono_fijo']) {
            $ssql .= " AND persona.Pe_Telefono = '" . $filters['telefono_fijo'] ."'";
        }

        if ($filters['telefono_celular']) {
            $ssql .= " AND persona.Pe_Celular = '" . $filters['telefono_celular'] ."'";
        }

        if ($filters['cargo_id']) {
            $ssql .= " AND cargoPersona.rd_id_lista_cargos = " . $filters['cargo_id'];
        }

        if ($filters['despacho_id']) {
            $ssql .= " AND cargoPersona.rd_id_despacho_fk = " . $filters['despacho_id'];
        }

        if ($filters['especialidad_id']) {
            $ssql .= " AND experienciaLaboral.El_IdEspecialidad_FK = " . $filters['especialidad_id'];
        }

        if ($filters['entidad_id']) {
            $ssql .= " AND cargoPersona.id_entidades = " . $filters['entidad_id'];
        }

        if ($filters['concejo_id']) {
            $ssql .= " AND cargoPersona.rd_concejo_seccional_FK = " . $filters['concejo_id'];
        }

        if ($filters['distrito_id']) {
            $ssql .= " AND cargoPersona.rd_Distrito_FK = " . $filters['distrito_id'];
        }

        if ($filters['circuito_id']) {
            $ssql .= " AND cargoPersona.rd_circuito_fk = " . $filters['circuito_id'];
        }

        if ($filters['ciudad_id']) {
            $ssql .= " AND cargoPersona.rd_Ciudad_FK = " . $filters['ciudad_id'];
        }

        if ($filters['ano_vinculacion']) {
            $ssql .= " AND experienciaLaboral.El_AnioVinculacion = '" . $filters['ano_vinculacion']."'";
        }

        if ($filters['cargo_inscripcion_id']) {
            $ssql .= " AND experienciaLaboral.rd_cargo_inscripcion_carrea_fk = " . $filters['cargo_inscripcion_id'];
        }

        if ($filters['ano_vinculacion_rama']) {
            $ssql .= " AND experienciaLaboral.El_NumAniosExpe = '" . $filters['ano_vinculacion_rama']."'";
        }

        if ($filters['ultima_calificacion']) {
            $ssql .= " AND experienciaLaboral.El_CalificacionServicios = " . $filters['ultima_calificacion'];
        }

        if ($filters['vinculacion_rama']) {
            $ssql .= " AND experienciaLaboral.El_VinculacionRamaJudicial = " . $filters['vinculacion_rama'];
        }

        if ($filters['carrera_judicial']) {
            $ssql .= " AND experienciaLaboral.El_AnioVinculacion = " . $filters['carrera_judicial'];
        }

        if ($filters['anotaciones_acuerdo']) {
            $ssql .= " AND experienciaLaboral.El_AnotacionesLey88 = " . $filters['anotaciones_acuerdo'];
        }

        if ($filters['sanciones_disciplinarias']) {
            $ssql .= " AND experienciaLaboral.El_SancionesDisciplinarias = " . $filters['sanciones_disciplinarias'];
        }

        if ($filters['formadores_escuela']) {
            $ssql .= " AND experienciaLaboral.El_RedFormadores = " . $filters['formadores_escuela'];
        }

        if ($filters['igualdad_genero']) {
            $ssql .= " AND experienciaLaboral.El_FormacionIgualdadGenero = " . $filters['igualdad_genero'];
        }

        if ($filters['congestion_despacho']) {
            $ssql .= " AND experienciaLaboral.El_DespachoAlDia = " . $filters['congestion_despacho'];
        }

        if ($filters['eventos_escuela']) {
            $ssql .= " AND experienciaLaboral.El_ParticipacionEventosEJRLB = " . $filters['eventos_escuela'];
        }

        if(!$filters['formacion_academica']){
            $filters['formacion_academica'] = [];
        }

        //["Pregrado", "Especialización","Maestría","Doctorado","Docencia","Publicaciones"]
        if (in_array("Pregrado",$filters['formacion_academica'])) {
            $ssql .= " AND infAcademica.ia_tienePregrado = 1 ";
        }

        if (in_array("Especialización",$filters['formacion_academica'])) {
            $ssql .= " AND infAcademica.ia_tieneEspecializacin = 1 ";
        }

        if (in_array("Maestría",$filters['formacion_academica'])) {
            $ssql .= " AND infAcademica.tiene_maestria = 1 ";
        }

        if (in_array("Doctorado",$filters['formacion_academica'])) {
            $ssql .= " AND infAcademica.ia_tieneDoctorado = 1 ";
        }

        if (in_array("Docencia",$filters['formacion_academica'])) {
            $ssql .= " AND infAcademica.ia_tieneDocencia = 1 ";
        }

        if (in_array("Publicaciones",$filters['formacion_academica'])) {
            $ssql .= " AND infAcademica.ia_tienePublicaciones = 1 ";
        }

        $ssql.=" GROUP BY persona.pe_identificacion order by persona.pe_identificacion";

        return DB::connection('CnxOldSGA')->select(DB::raw($ssql));
    }

    public static function getBasicInfoBy(array $filters)
    {
        $ssql = "SELECT rp.Pe_IdPERSONA_PK,
        CONCAT_WS(' ', rp.Pe_PRIMERNOMBRE, rp.Pe_SEGUNDONOMBRE) As nombres,
        CONCAT_WS(' ', rp.Pe_PRIMERAPELLIDO, rp.Pe_SEGUNDOAPELLIDO) As apellidos,
        ru.Us_Clave, ru.Us_IdUsuario_PK, ru.Us_numerointento,
        ru.us_nombreusuario, ru.cambiar_clave, rp.Pe_IDENTIFICACION, tipoDocumento.ti_nombre,
        rp.Pe_IdTIPOIDENTIFICACION, rp.Pe_GENERO, rp.Pe_Email,
        rp.Pe_Telefono, rp.Pe_Extension, rp.Pe_Celular, rp.Pe_FechaNacimiento,
        rp.Pe_IdEstadoInscrito, t.intIdCiudad, t.strNombreCiudad, t1.intIdDepartamento,
        t1.strNombreDepartamento, tipoDocumento.abreviatura FROM rd_usuarios ru
        INNER JOIN rd_persona rp 	ON ( ru.Us_idPersona_FK = rp.Pe_IdPERSONA_PK )
        LEFT JOIN tblCiudades t 	ON ( rp.Pe_IntldCiudad_FK = t.intIdCiudad )
        LEFT JOIN tblDepartamentos t1 	ON ( t.intIdDepartamento = t1.intIdDepartamento )
        INNER JOIN rd_tiposidentificacion tipoDocumento ON (rp.Pe_IdTIPOIDENTIFICACION = tipoDocumento.ti_id)
        WHERE rp.Pe_IdPERSONA_PK IS NOT NULL";

        if (@$filters['identificacion']) {
            $ssql .= " AND rp.Pe_IDENTIFICACION = '" . $filters['identificacion']."'";
        }

        if (@$filters['tipo_identificacion']) {
            $ssql .= " AND rp.Pe_IdTIPOIDENTIFICACION = " . $filters['tipo_identificacion'];
        }

        if (@$filters['id']) {
            $ssql .= " AND rp.Pe_IdPERSONA_PK = " . $filters['id'];
        }

        $ssql .= " LIMIT 10 ";

        return DB::connection('CnxOldSGA')->select(DB::raw($ssql));
    }

    public static function getMediumInfoBy(array $filters)
    {
        $filters["custom_columns"] =  explode(',', $filters["custom_columns"]);

        if(count($filters["custom_columns"])>0){
            $base_columns=Filters::getArrayColumns();

            $select_sql=[];
            foreach($base_columns as $column){
                if(in_array($column["value"], $filters["custom_columns"])){
                    array_push($select_sql,$column["value"]);
                }
            }

            $aux_select_sql=implode(', cr.',$select_sql);

            $int_select_sql = implode(', ',array_column($base_columns,'sql'));


            $ssql = "SELECT SQL_CALC_FOUND_ROWS {$aux_select_sql}
            FROM (SELECT DISTINCT {$int_select_sql}
            FROM rd_persona persona
            LEFT JOIN rd_inscripcioncursos inscripcion_curso
                ON (persona.Pe_IdPERSONA_PK = inscripcion_curso.ri_IdPersona_FK)
            LEFT JOIN tblcursosdeformacion curso
                ON (inscripcion_curso.ri_IdCursosDeFormacion_FK = curso.intIdCursoDeFormacion)
            LEFT JOIN rd_experiencialaboral experiencia_laboral
                ON persona.Pe_IdPERSONA_PK = experiencia_laboral.el_idpersona_fk
                AND curso.intIdCursoDeFormacion = experiencia_laboral.El_IdCursoFormacion_FK
            LEFT JOIN rd_cargo_persona cargo_persona
                ON (experiencia_laboral.El_IdPersonaCargo_FK = cargo_persona.id_cargo_pk)
            LEFT JOIN rd_rol_persona rol_persona
                ON persona.Pe_IdPERSONA_PK = rol_persona.Rp_IdPERSONA_FK
            AND rol_persona.Rp_IdROL_FK = 1
            LEFT JOIN rd_rol rol
                ON (rol_persona.Rp_IdROL_FK = rol.Ro_IdROL_PK)
            LEFT JOIN tblgruposdeformacion grupo
                ON (inscripcion_curso.id_grupo = grupo.intIdGrupoDeFormacion)
            LEFT JOIN tblsedes sede
                ON (curso.intIdSede = sede.intIdSede)
            LEFT JOIN tblparametrosdeformadores parametros_zona
                ON (sede.intIdZona = parametros_zona.intIdParametroDeFormador)
            LEFT JOIN tblprogramasoproyectos programa
                ON (grupo.intIdProgramaOProyecto = programa.intIdProgramaOProyecto)
            LEFT JOIN tblsubprogramasosubproyectos sub_programa
                ON (curso.intIdSubProgramaOSubProyecto = sub_programa.intIdSubProgramaOSubProyecto)
            LEFT JOIN rd_dependencia dependencia
                ON (cargo_persona.rd_IdDependencia_FK = dependencia.d_id)
            LEFT OUTER JOIN tblciudades ciudad
                ON (persona.Pe_IntldCiudad_FK = ciudad.intIdCiudad)
            LEFT JOIN rd_distrito distrito
                ON (cargo_persona.rd_Distrito_FK = distrito.d_id)
            LEFT JOIN rd_concejoseccional concejo
                ON (cargo_persona.rd_concejo_seccional_FK = concejo.cs_id)
            LEFT JOIN rd_lista_cargos cargo
                ON (cargo_persona.rd_id_lista_cargos = cargo.lc_id)
            LEFT JOIN rd_despacho despacho
                ON (cargo_persona.rd_id_despacho_fk = despacho.id)
            LEFT JOIN rd_circuitos circuito
                ON (cargo_persona.rd_circuito_fk = circuito.ci_id_pk)
            LEFT JOIN rd_entidades entidad
                ON (cargo_persona.id_entidades = entidad.en_Identidad_pk)
            LEFT JOIN rd_especialidad especialidad
                ON (experiencia_laboral.El_IdEspecialidad_FK = especialidad.e_idespecialidad)
            LEFT JOIN rd_fechas_curso fecha_curso_modulo
                ON (curso.intIdCursoDeFormacion = fecha_curso_modulo.id_curso_fk)
            LEFT JOIN tblmodulos modulo
                ON (fecha_curso_modulo.id_modulo = modulo.intIdModulo)
            LEFT JOIN tblpersonas coordi
                ON (curso.intIdCoordinadorResponsable = coordi.intIdPersona)
            LEFT JOIN tblvigencias vigencia
                ON (curso.intIdVigencia = vigencia.intIdVigencia)
            LEFT JOIN rd_tipo_costo_curso tipo_costo
                ON (curso.intCostoCurso = tipo_costo.id)
            LEFT JOIN rd_tiposidentificacion tipo_identificacion
                ON (persona.Pe_IdTIPOIDENTIFICACION = tipo_identificacion.ti_id)
            LEFT JOIN tblplandeformacionprogramastiposact plandeformacionprogramastiposact
                ON plandeformacionprogramastiposact.intIdPlanDeFormacionProgramasTiposAct = curso.intIdPlanDeFormacionProgramasTiposAct
            LEFT JOIN tbltiposactividadesacademicas tiposactividadesacademicas
                ON tiposactividadesacademicas.intIdTipoDeActividadAcademica = plandeformacionprogramastiposact.intIdTipoDeActividadAcademica
            LEFT JOIN rd_planilla_asistencia planilla
                on planilla.rp_idcurso_fk = curso.intIdCursoDeFormacion
                and planilla.rp_idpersona_fk = persona.Pe_IdPERSONA_PK
                and fecha_curso_modulo.id = planilla.id_fechas_curso
            WHERE inscripcion_curso.EsAdmitido = 1
            AND fecha_curso_modulo.fecha BETWEEN '{$filters["fecha_inicio"]}' AND '{$filters["fecha_fin"]}'
            AND (SELECT count(rp_id_pk)
                    FROM rd_planilla_asistencia
                    WHERE rp_idcurso_fk = curso.intIdCursoDeFormacion
                    AND id_grupo = grupo.intIdGrupoDeFormacion
                    AND id_modulo = modulo.intIdModulo
                AND TIMEDIFF(planilla.rp_horasalida, planilla.rp_horaingreso) > 0
                    AND tiene_hrs_inconsistentes = false
            )";

            if ($filters['codigo_grupo']) {
                $ssql .= " AND grupo.strCodigoGrupo = '" . $filters['codigo_grupo']."' ";
            }

            if ($filters['zona_id']) {
                $ssql .= " AND parametros_zona.intIdParametroDeFormador = " . $filters['zona_id'];
            }

            if ($filters['curso_id']) {
                $ssql .= " AND curso.intIdCursoDeFormacion = " . $filters['curso_id'];
            }

            if ($filters['sede_id']) {
                $ssql .= " AND sede.intIdSede = " . $filters['sede_id'];
            }

            if ($filters['programa_id']) {
                $ssql .= " AND programa.intIdProgramaOProyecto = " . $filters['programa_id'];
            }

            if ($filters['modulo_id']) {
                $ssql .= " AND modulo.intIdModulo = " . $filters['modulo_id'];
            }

            if ($filters['recurso_id']) {
                $ssql .= " AND curso.intCostoCurso = " . $filters['recurso_id'];
            }

            if ($filters['coordinador_id']) {
                $ssql .= " AND coordi.intIdPersona = " . $filters['coordinador_id'];
            }

            if ($filters['vigencia_id']) {
                $ssql .= " AND curso.intIdVigencia = " . $filters['vigencia_id'];
            }

            if ($filters['tipo_participante_id']) {
                $ssql .= " AND rol.Ro_IdROL_PK = " . $filters['tipo_participante_id'];
            }

            if ($filters['genero_id']) {
                $ssql .= " AND persona.Pe_GENERO = " . $filters['genero_id'];
            }

            if ($filters['tipo_documento_id']) {
                $ssql .= " AND persona.Pe_IdTIPOIDENTIFICACION = " . $filters['tipo_documento_id'];
            }

            if ($filters['numero_documento']) {
                $ssql .= " AND persona.Pe_IDENTIFICACION = '" . $filters['numero_documento']."'";
            }

            if ($filters['primer_apellido']) {
                $ssql .= " AND UPPER(persona.PE_PRIMERAPELLIDO) = UPPER('" . $filters['primer_apellido'] ."')";
            }

            if ($filters['segundo_apellido']) {
                $ssql .= " AND UPPER(persona.PE_SEGUNDOAPELLIDO) = UPPER('" . $filters['segundo_apellido'] ."')";
            }

            if ($filters['primer_nombre']) {
                $ssql .= " AND UPPER(persona.PE_PRIMERNOMBRE) = UPPER('" . $filters['primer_nombre'] ."')";
            }

            if ($filters['segundo_nombre']) {
                $ssql .= " AND UPPER(persona.PE_SEGUNDONOMBRE) = UPPER('" . $filters['segundo_nombre'] ."')";
            }

            if ($filters['tipo_usuario_id']) {
                $ssql .= " AND experiencia_laboral.es_usuario_externo_rama_judicial = " . $filters['tipo_usuario_id'];
            }

            if ($filters['cargo_id']) {
                $ssql .= " AND cargo_persona.rd_id_lista_cargos = " . $filters['cargo_id'];
            }

            if ($filters['despacho_id']) {
                $ssql .= " AND cargo_persona.rd_id_despacho_fk = " . $filters['despacho_id'];
            }

            if ($filters['especialidad_id']) {
                $ssql .= " AND experiencia_laboral.El_IdEspecialidad_FK = " . $filters['especialidad_id'];
            }

            if ($filters['entidad_id']) {
                $ssql .= " AND cargo_persona.id_entidades = " . $filters['entidad_id'];
            }

            if ($filters['concejo_id']) {
                $ssql .= " AND cargo_persona.rd_concejo_seccional_FK = " . $filters['concejo_id'];
            }

            if ($filters['distrito_id']) {
                $ssql .= " AND cargo_persona.rd_Distrito_FK = " . $filters['distrito_id'];
            }

            if ($filters['circuito_id']) {
                $ssql .= " AND cargo_persona.rd_circuito_fk = " . $filters['circuito_id'];
            }

            if ($filters['ciudad_id']) {
                $ssql .= " AND cargo_persona.rd_Ciudad_FK = " . $filters['ciudad_id'];
            }

            if (@$filters['pagination']) {
                $per_page = $filters['per_page'];
                $page = ($filters['current_page']>1) ? (($filters['current_page']-1)* $per_page)."," :" ";


                $ssql .= ") AS cr LIMIT {$page} {$per_page} ";

                $result["data"] = DB::connection('CnxOldSGA')->select(DB::raw($ssql));
                $result["total"] = DB::connection('CnxOldSGA')->select(DB::raw("SELECT FOUND_ROWS() AS cuenta"))[0]->cuenta;
                $result["per_page"] = $per_page;
                $result["current_page"] = $filters['current_page'];
            }else{
                $ssql .= ") AS cr";
                $result=DB::connection('CnxOldSGA')->select(DB::raw($ssql));
            }

            return $result;
        }else{
            return [];
        }
    }
}
