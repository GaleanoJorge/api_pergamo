<?php

namespace App\Models\OldSGA;

use DB;

class Filters
{

    private static $custom_columns = array(
        array('value' => 'strCodigoGrupo', 'label' => 'Código de Grupo', 'sql' => 'grupo.strCodigoGrupo'),
        array('value' => 'Zona', 'label' => 'Zona', 'sql' => 'parametros_zona.strNombreParametroDeFormador as Zona'),
        array('value' => 'strNombreSede', 'label' => 'Sede', 'sql' => 'sede.strNombreSede'),
        array('value' => 'strNombreDelPrograma', 'label' => 'Programa', 'sql' => 'programa.strNombreDelPrograma'),
        array('value' => 'Modulo', 'label' => 'Módulo', 'sql' => 'modulo.strNombre as Modulo'),
        array('value' => 'fecha_realizacion', 'label' => 'Fecha Realización', 'sql' => 'fecha_curso_modulo.fecha as fecha_realizacion'),
        array('value' => 'coordinador', 'label' => 'Coordinador', 'sql' => 'CONCAT_WS(" ",coordi.strPrimerNombre, coordi.strSegundoNombre, coordi.strPrimerApellido, coordi.strSegundoApellido) AS coordinador'),
        array('value' => 'recursos', 'label' => 'Recursos de inversión', 'sql' => 'tipo_costo.nombre as recursos'),
        array('value' => 'strNombreVigencia', 'label' => 'Vigencia', 'sql' => 'vigencia.strNombreVigencia'),
        array('value' => 'TipoDocumento', 'label' => 'Tipo documento', 'sql' => 'tipo_identificacion.abreviatura as TipoDocumento'),
        array('value' => 'Pe_IDENTIFICACION', 'label' => 'No. Documento', 'sql' => 'persona.Pe_IDENTIFICACION'),
        array('value' => 'TipoParticipante', 'label' => 'Tipo participante', 'sql' => 'rol.Ro_ROL as TipoParticipante'),
        array('value' => 'Pe_PRIMERNOMBRE', 'label' => 'Primer nombre', 'sql' => 'persona.Pe_PRIMERNOMBRE'),
        array('value' => 'Pe_SEGUNDONOMBRE', 'label' => 'Segundo nombre', 'sql' => 'persona.Pe_SEGUNDONOMBRE'),
        array('value' => 'Pe_PRIMERAPELLIDO', 'label' => 'Primer apellido', 'sql' => 'persona.Pe_PRIMERAPELLIDO'),
        array('value' => 'Pe_SEGUNDOAPELLIDO', 'label' => 'Segundo apellido', 'sql' => 'persona.Pe_SEGUNDOAPELLIDO'),
        array('value' => 'Pe_GENERO', 'label' => 'Género', 'sql' => 'persona.Pe_GENERO'),
        array('value' => 'nomCargo', 'label' => 'Cargo', 'sql' => '(CASE WHEN cargo.lc_nombre IS NOT NULL THEN cargo.lc_nombre WHEN cargo.lc_nombre IS NULL THEN (SELECT lc_nombre FROM rd_lista_cargos WHERE lc_id = cargo_persona.usr_ext_cargo) END) AS nomCargo'),
        array('value' => 'Despacho', 'label' => 'Despacho', 'sql' => 'despacho.nombre as Despacho'),
        array('value' => 'Especialidad', 'label' => 'Especialidad', 'sql' => 'especialidad.e_nombreespecialidad as Especialidad'),
        array('value' => 'Consejo', 'label' => 'Consejo', 'sql' => 'concejo.cs_nombre as Consejo'),
        array('value' => 'Distrito', 'label' => 'Distrito', 'sql' => 'distrito.d_nombre as Distrito'),
        array('value' => 'Circuito', 'label' => 'Circuito', 'sql' => 'circuito.ci_nombre as Circuito'),
        array('value' => 'CiudadInformacionBasica', 'label' => 'Ciudad Información Básica', 'sql' => 'ciudad.strNombreCiudad AS CiudadInformacionBasica'),
        array('value' => 'ciudadLaboral', 'label' => 'Ciudad Laboral', 'sql' => '(CASE WHEN cargo_persona.rd_Ciudad_FK is null then (select strNombreCiudad from tblciudades where  intIdCiudad = cargo_persona.usr_ext_ciudad_cargo) WHEN cargo_persona.rd_Ciudad_FK is not null then (select cu_nombre from rd_ciudades where  cu_id_pk = cargo_persona.rd_Ciudad_FK) END) AS  ciudadLaboral'),
        array('value' => 'total_horas', 'label' => 'Horas', 'sql' => '(ROUND(TIMESTAMPDIFF(MINUTE, planilla.rp_horaingreso, planilla.rp_horasalida )/60) + ROUND(TIMESTAMPDIFF(MINUTE, planilla.rp_horaingreso2,planilla.rp_horasalida2)/60)) as total_horas'),
        array('value' => 'nombre_del_curso', 'label' => 'Nombre del curso', 'sql' => 'curso.strNombreCursoDeFormacion as nombre_del_curso'),
        array('value' => 'Corporacion_Juzgado_Entidad', 'label' => 'Corporación, juzgado o entidad', 'sql' => '(CASE WHEN entidad.en_nombre_entidad IS NOT NULL THEN entidad.en_nombre_entidad WHEN entidad.en_nombre_entidad IS NULL THEN (SELECT en_nombre_entidad FROM rd_entidades WHERE en_Identidad_pk = cargo_persona.usr_ext_entidad_cargo) END) AS Corporación_Juzgado_Entidad'),
        array('value' => 'es_usuario_externo_rama_judicial', 'label' => 'Pertenece a la rama judicial', 'sql' => 'experiencia_laboral.es_usuario_externo_rama_judicial'),
    );

    public static function getHeaders(array $filters)
    {
        $data = [
            '{filtro_sede}' => '',
            '{filtro_programa}' => '',
            '{filtro_modulo}' => '',
            '{filtro_recurso}' => '',
            '{filtro_coordinador}' => '',
            '{filtro_vigencia}' => '',
            '{filtro_curso}' => '',
        ];


        if (@$filters['sede_id']) {
            $ssql = "SELECT t.intIdSede value, t.strNombreSede label FROM tblSedes t where t.intIdSede = " . $filters['sede_id'];
            $sede = DB::connection('CnxOldSGA')->select(DB::raw($ssql));
            $data['{filtro_sede}'] = $sede[0]->label;
        }

        if (@$filters['programa_id']) {
            $ssql = "SELECT programa.intIdProgramaOProyecto value, programa.strNombreDelPrograma label from tblprogramasoproyectos programa where intIdProgramaOProyecto = " . $filters['programa_id'];
            $programas = DB::connection('CnxOldSGA')->select(DB::raw($ssql));
            $data['{filtro_programa}'] = $programas[0]->label;
        }

        if (@$filters['modulo_id']) {
            $ssql = "SELECT intIdModulo value, strNombre label FROM tblmodulos where intIdModulo = " . $filters['modulo_id'];
            $modulos = DB::connection('CnxOldSGA')->select(DB::raw($ssql));
            $data['{filtro_modulo}'] = $modulos[0]->label;
        }

        if (@$filters['recurso_id']) {
            $ssql = "SELECT id value, nombre label FROM rd_tipo_costo_curso where id = " . $filters['recurso_id'];
            $costos = DB::connection('CnxOldSGA')->select(DB::raw($ssql));
            $data['{filtro_recurso}'] = $costos[0]->label;
        }

        if (@$filters['coordinador_id']) {
            $ssql = "SELECT rtp.tbl_persona_fk value,
            CONCAT_WS(' ',tp.strPrimerNombre, tp.strSegundoNombre,
            tp.strPrimerApellido, tp.strSegundoApellido) AS label
            FROM rd_tbl_persona rtp INNER JOIN rd_persona p
            on rtp.rd_persona_fk = p.Pe_IdPERSONA_PK inner join tblpersonas tp
            on rtp.tbl_persona_fk = tp.intIdPersona inner join rd_rol_persona rp
            on p.Pe_IdPERSONA_PK = rp.Rp_IdPERSONA_FK where rtp.tbl_persona_fk = " . $filters['coordinador_id'];
            $coordinadores = DB::connection('CnxOldSGA')->select(DB::raw($ssql));
            $data['{filtro_coordinador}'] = $coordinadores[0]->label;
        }

        if (@$filters['vigencia_id']) {
            $ssql = "SELECT intIdVigencia value, strNombreVigencia label, isActive FROM tblvigencias where intIdVigencia = " . $filters['vigencia_id'];
            $vigencias = DB::connection('CnxOldSGA')->select(DB::raw($ssql));
            $data['{filtro_vigencia}'] = $vigencias[0]->label;
        }

        if(@$filters['curso_id']){
            $cursos = Courses::get([
                'curso_id' => $filters['curso_id'],
            ]);
            $data['{filtro_curso}'] = $cursos[0]->label;
        }

        return $data;
    }

    public static function getArraySedes()
    {
        $ssql="SELECT t.intIdSede value, t.strNombreSede label FROM tblSedes t ORDER BY t.strNombreSede ASC";
        return  DB::connection('CnxOldSGA')->select( DB::raw($ssql) );
    }

    public static function getArrayProgramas()
    {
        $ssql="SELECT programa.intIdProgramaOProyecto value, programa.strNombreDelPrograma label from tblprogramasoproyectos programa order by strNombreDelPrograma";
        return DB::connection('CnxOldSGA')->select( DB::raw($ssql) );
    }

    public static function getArrayModulos()
    {
        $ssql="SELECT intIdModulo value, strNombre label FROM tblmodulos";
        return DB::connection('CnxOldSGA')->select( DB::raw($ssql) );
    }

    public static function getArrayCoordinadores()
    {
        /*rtp.rd_persona_fk as id_rdpersona, */
        $ssql="SELECT rtp.tbl_persona_fk value,
        CONCAT_WS(' ',tp.strPrimerNombre, tp.strSegundoNombre,
        tp.strPrimerApellido, tp.strSegundoApellido) AS label
        FROM rd_tbl_persona rtp INNER JOIN rd_persona p
        on rtp.rd_persona_fk = p.Pe_IdPERSONA_PK inner join tblpersonas tp
        on rtp.tbl_persona_fk = tp.intIdPersona inner join rd_rol_persona rp
        on p.Pe_IdPERSONA_PK = rp.Rp_IdPERSONA_FK where rp.Rp_IdROL_FK = 3";

        return DB::connection('CnxOldSGA')->select( DB::raw($ssql) );
    }

    public static function getArrayVigencias()
    {
        $ssql="SELECT intIdVigencia value, strNombreVigencia label, isActive FROM tblvigencias";
        return  DB::connection('CnxOldSGA')->select( DB::raw($ssql) );
    }

    public static function getArrayCostos()
    {
        $ssql="SELECT id value, nombre label FROM rd_tipo_costo_curso";
        return DB::connection('CnxOldSGA')->select( DB::raw($ssql) );
    }

    public static function getArrayTipoDocumento()
    {
        $ssql="SELECT rt.ti_id, rt.ti_nombre, rt.abreviatura FROM rd_tiposidentificacion rt";
        return DB::connection('CnxOldSGA')->select( DB::raw($ssql) );
    }

    public static function getArrayCargos()
    {
        $ssql="SELECT lc_id, lc_nombre, isActive FROM rd_lista_cargos ORDER BY lc_nombre";
        return DB::connection('CnxOldSGA')->select( DB::raw($ssql) );
    }

    public static function getArrayDespachos()
    {
        $ssql="SELECT id,nombre,isActive  from rd_despacho order by nombre";
        return DB::connection('CnxOldSGA')->select( DB::raw($ssql) );
    }

    public static function getArrayEspecialidades()
    {
        $ssql="SELECT e_idespecialidad, e_nombreespecialidad, isActive FROM rd_especialidad ORDER BY e_nombreespecialidad ASC";
        return DB::connection('CnxOldSGA')->select( DB::raw($ssql) );
    }

    public static function getArrayEntidades()
    {
        $ssql="SELECT entidad.en_Identidad_pk, entidad.en_nombre_entidad, entidad.en_entidades_fk,
        entidad.isActive, (SELECT en_nombre_entidad FROM rd_entidades
        WHERE en_identidad_pk = entidad.en_entidades_fk) AS entidadPadre
        from rd_entidades entidad
        ORDER BY entidad.en_nombre_entidad ASC";
        return DB::connection('CnxOldSGA')->select( DB::raw($ssql) );
    }

    public static function getArrayConcejos()
    {
        $ssql="SELECT  cs_id, cs_nombre, isActive
        FROM rd_concejoseccional ORDER BY cs_nombre";
        return DB::connection('CnxOldSGA')->select( DB::raw($ssql) );
    }

    //-- Distrito --
    public static function getArrayDistritos()
    {
        $ssql="SELECT  d_id, d_nombre, cs_id_fk, isActive
        FROM rd_distrito ORDER BY d_nombre";
        return DB::connection('CnxOldSGA')->select( DB::raw($ssql) );
    }

    //-- Circuito --
    public static function getArrayCircuitos()
        {
        $ssql="SELECT ci_id_pk,ci_nombre, di_id_fk, isActive
        FROM rd_circuitos ORDER BY ci_nombre";
        return DB::connection('CnxOldSGA')->select( DB::raw($ssql) );
    }

    //-- Ciudad --
    public static function getArrayCiudades()
        {
        $ssql="SELECT  cu_id_pk, cu_nombre, ci_id_fk, intIdDepartamento_fk, isActive
        FROM rd_ciudades ORDER BY cu_nombre";
        return DB::connection('CnxOldSGA')->select( DB::raw($ssql) );
    }

    //-- Zona --
    public static function getArrayZonas()
        {
        $ssql="SELECT t.intIdParametroDeFormador, t.strNombreParametroDeFormador
        FROM tblparametrosdeformadores t WHERE t.intIdTipoDeParametroDeFormador = 8";
        return DB::connection('CnxOldSGA')->select( DB::raw($ssql) );
    }

    public static function getArrayTipoParticipante()
        {
        return [["value"=>1, "label"=>"DISCENTE"],["value"=>2, "label"=>"FORMADOR"]];
        }

    public static function getArrayGenero()
        {
        return [["value"=>1, "label"=>"MASCULINO"],["value"=>0, "label"=>"FEMENINO"]];
        }

    public static function getArrayTipoUsuario()
        {
        return [["value"=>1, "label"=>"Usuario externo"],["value"=>0, "label"=>"Usuario que pertenece a la rama judicial"]];
        }

    public static function getArrayFormacionAcademica()
        {
        return ["Pregrado", "Especialización","Maestría","Doctorado","Docencia","Publicaciones"];
        }

    public static function getArrayColumns(){
            return static::$custom_columns;
        }
}
