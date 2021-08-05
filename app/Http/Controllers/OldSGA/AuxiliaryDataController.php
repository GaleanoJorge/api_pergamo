<?php

namespace App\Http\Controllers\OldSGA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\OldSGA\Courses;
use App\Models\OldSGA\Discentes;
use App\Models\OldSGA\Filters;
use DB;

class AuxiliaryDataController extends Controller
{
    public function RunCourses(): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => 'Data obtenida exitosamente',
            'data' => [
                'sedes' => Filters::getArraySedes(),
                'programas' => Filters::getArrayProgramas(),
                'modulos' => Filters::getArrayModulos(),
                'costos' => Filters::getArrayCostos(),
                'coordinadores' => Filters::getArrayCoordinadores(),
                'vigencias' => Filters::getArrayVigencias()
            ]
        ]);
    }

    public function Courses(Request $request): JsonResponse
    {
        $filters = [
            'sede_id' => $request->query('sede_id'),
            'programa_id' => $request->query('programa_id'),
            //'recurso_id' => $request->query('recurso_id'),
            'coordinador_id' => $request->query('coordinador_id'),
            'vigencia_id' => $request->query('vigencia_id'),
        ];

        $data = Courses::get($filters);

        return response()->json([
            'status' => true,
            'message' => 'Data obtenida exitosamente',
            'data' => ['cursos' => $data]
        ]);
    }

    public function Groups(Request $request): JsonResponse
    {
        $data = Courses::gruposByCurso($request->query('curso_id'));

        return response()->json([
            'status' => true,
            'message' => 'Data obtenida exitosamente',
            'data' => ['grupos' => $data]
        ]);
    }

    public function Multicriterio(): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => 'Data obtenida exitosamente',
            'data' => [
                'sedes' => Filters::getArraySedes(),
                'programas' => Filters::getArrayProgramas(),
                'modulos' => Filters::getArrayModulos(),
                'costos' => Filters::getArrayCostos(),
                'coordinadores' => Filters::getArrayCoordinadores(),
                'vigencias' => Filters::getArrayVigencias(),
                'tipoDocumentos' => Filters::getArrayTipoDocumento(),
                'cargos' => Filters::getArrayCargos(),
                'despachos' => Filters::getArrayDespachos(),
                'especialidades' => Filters::getArrayEspecialidades(),
                'entidades' => Filters::getArrayEntidades(),
                'concejos' => Filters::getArrayConcejos(),
                'distritos' => Filters::getArrayDistritos(),
                'circuitos' => Filters::getArrayCircuitos(),
                'ciudades' => Filters::getArrayCiudades(),
                'formacionAcademica' => Filters::getArrayFormacionAcademica()
            ]
        ]);
    }

    public function MulticriterioGeneral(): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => 'Data obtenida exitosamente',
            'data' => [
                'sedes' => Filters::getArraySedes(),
                'programas' => Filters::getArrayProgramas(),
                'modulos' => Filters::getArrayModulos(),
                'costos' => Filters::getArrayCostos(),
                'coordinadores' => Filters::getArrayCoordinadores(),
                'vigencias' => Filters::getArrayVigencias(),
                'tipoDocumentos' => Filters::getArrayTipoDocumento(),
                'cargos' => Filters::getArrayCargos(),
                'despachos' => Filters::getArrayDespachos(),
                'especialidades' => Filters::getArrayEspecialidades(),
                'entidades' => Filters::getArrayEntidades(),
                'concejos' => Filters::getArrayConcejos(),
                'distritos' => Filters::getArrayDistritos(),
                'circuitos' => Filters::getArrayCircuitos(),
                'ciudades' => Filters::getArrayCiudades(),
                'zonas' => Filters::getArrayZonas(),
                'tipoParticipante' => Filters::getArrayTipoParticipante(),
                'genero' => Filters::getArrayGenero(),
                'tipoUsuario' => Filters::getArrayTipoUsuario(),
                'columnas' => Filters::getArrayColumns(),
            ]
        ]);
    }

    public function filtersRegistroHoras(): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => 'Data obtenida exitosamente',
            'data' => [
                'tipoDocumentos' => Filters::getArrayTipoDocumento(),
            ]
        ]);
    }

    public function cursosRegistroHoras(Request $request): JsonResponse
    {
        $filters = [
            'tipo_identificacion' => $request->query('tipo_identificacion'),
            'identificacion' => $request->query('identificacion')
        ];

        $discente = Discentes::getBasicInfoBy($filters);
        $cursos = [];

        if (count($discente) > 0) {
            $cursos = Courses::byDiscente($discente[0]->Pe_IdPERSONA_PK);

            if (count($discente) > 0) {
                $msg = 'Data obtenida exitosamente';
            } else {
                $msg = 'El discente no se ha inscrito a ningún curso.';
            }

        } else {
            $msg = 'No se encuentra ningún discente registrado con los datos consultados.';
        }

        return response()->json([
            'status' => true,
            'message' => $msg,
            'data' => [
                'discente' => $discente,
                'cursos' => $cursos
            ]
        ]);
    }

    public function resumenRegistroAcademico(Request $request): JsonResponse
    {
        $cursoId = $request->query('curso_id');
        $grupoId = $request->query('grupo_id');

        $ssql = "SELECT COUNT(*) AS totalAsistentesEvento
        FROM (SELECT DISTINCT
            persona.Pe_IDENTIFICACION AS cedula
            FROM rd_persona persona
        LEFT JOIN rd_inscripcioncursos inscripcion_curso
          ON (persona.Pe_IdPERSONA_PK = inscripcion_curso.ri_IdPersona_FK)
        INNER JOIN tblcursosdeformacion curso
          ON (inscripcion_curso.ri_IdCursosDeFormacion_FK = curso.intIdCursoDeFormacion)
        INNER JOIN tblgruposdeformacion grupo
          ON (inscripcion_curso.id_grupo = grupo.intIdGrupoDeFormacion)
        LEFT JOIN tblsedes sede ON (curso.intIdSede = sede.intIdSede)
        LEFT JOIN tblparametrosdeformadores parametros_zona
          ON (sede.intIdZona = parametros_zona.intIdParametroDeFormador)
        LEFT JOIN tblprogramasoproyectos programa
          ON (grupo.intIdProgramaOProyecto = programa.intIdProgramaOProyecto)
        LEFT JOIN tblsubprogramasosubproyectos sub_programa
          ON (curso.intIdSubProgramaOSubProyecto = sub_programa.intIdSubProgramaOSubProyecto)
        LEFT JOIN rd_experiencialaboral experiencia_laboral
          ON (persona.Pe_IdPERSONA_PK = experiencia_laboral.el_idpersona_fk
              AND curso.intIdCursoDeFormacion = experiencia_laboral.El_IdCursoFormacion_FK)
        LEFT JOIN rd_cargo_persona cargo_persona
          ON (experiencia_laboral.El_IdPersonaCargo_FK = cargo_persona.id_cargo_pk)
        LEFT OUTER JOIN rd_dependencia dependencia
          ON (cargo_persona.rd_IdDependencia_FK = dependencia.d_id)
        INNER JOIN rd_fechas_curso fecha_curso_modulo
          ON (curso.intIdCursoDeFormacion = fecha_curso_modulo.id_curso_fk)
        INNER JOIN tblmodulos modulo  ON (fecha_curso_modulo.id_modulo = modulo.intIdModulo)
        INNER JOIN tblpersonas coordinador
          ON (curso.intIdCoordinadorResponsable = coordinador.intIdPersona)
        LEFT OUTER JOIN tblvigencias vigencia   ON (curso.intIdVigencia = vigencia.intIdVigencia)
        LEFT OUTER JOIN rd_tipo_costo_curso tipo_costo   ON (curso.intCostoCurso = tipo_costo.id)
        INNER JOIN rd_tiposidentificacion tipo_identificacion
          ON (persona.Pe_IdTIPOIDENTIFICACION = tipo_identificacion.ti_id)
        LEFT JOIN tblplandeformacionprogramastiposact plandeformacionprogramastiposact
          ON plandeformacionprogramastiposact.intIdPlanDeFormacionProgramasTiposAct = curso.intIdPlanDeFormacionProgramasTiposAct
        LEFT JOIN tbltiposactividadesacademicas tiposactividadesacademicas
          ON tiposactividadesacademicas.intIdTipoDeActividadAcademica = plandeformacionprogramastiposact.intIdTipoDeActividadAcademica
        INNER JOIN rd_planilla_asistencia planilla_asistencia
          ON planilla_asistencia.rp_idpersona_fk = persona.Pe_IdPERSONA_PK
        WHERE curso.intIdCursoDeFormacion = $cursoId AND grupo.intIdGrupoDeFormacion = $grupoId
        AND (planilla_asistencia.rp_horaingreso IS NOT NULL AND planilla_asistencia.rp_horasalida IS NOT NULL
            OR planilla_asistencia.rp_horaingreso2 IS NOT NULL AND planilla_asistencia.rp_horasalida2 IS NOT NULL)
        AND (f_obtenerIdRdFechaCurso(curso.intIdCursoDeFormacion, grupo.intIdGrupoDeFormacion, persona.Pe_IdPERSONA_PK, 0)+
               f_obtenerIdRdFechaCurso(curso.intIdCursoDeFormacion, grupo.intIdGrupoDeFormacion, persona.Pe_IdPERSONA_PK, 1)+
               f_obtenerIdRdFechaCurso(curso.intIdCursoDeFormacion, grupo.intIdGrupoDeFormacion, persona.Pe_IdPERSONA_PK, 2)+
               f_obtenerIdRdFechaCurso(curso.intIdCursoDeFormacion, grupo.intIdGrupoDeFormacion, persona.Pe_IdPERSONA_PK, 3)+
               f_obtenerIdRdFechaCurso(curso.intIdCursoDeFormacion, grupo.intIdGrupoDeFormacion, persona.Pe_IdPERSONA_PK, 4)) > 0)
             AS scTotalAsistentesEvento";

        $n_asistentes = DB::connection('CnxOldSGA')->select(DB::raw($ssql));
        $cr_curso = [];

        if (count($n_asistentes) > 0) {
            $msg = 'Data obtenida exitosamente';

            $ssql = "SELECT
            curso.intIdCursoDeFormacion as IDcurso,
            curso.strNombreCursoDeFormacion as nomCurso,
            sede.strNombreSede as nomSede,
            concat_ws(' ',coordinador.strprimernombre, coordinador.strsegundonombre, coordinador.strprimerapellido, coordinador.strsegundoapellido) as Coordinador,
            (select min(fecha) from rd_fechas_curso where id_curso_fk = fechascurso.id_curso_fk and estado_activo is true) as fechaInicio,
            (select max(fecha) from rd_fechas_curso where id_curso_fk = fechascurso.id_curso_fk and estado_activo is true) as fechaFinal,
             area.strNombreArea as Area,
            (SELECT strNombreSubArea FROM tblSubAreas WHERE intIdArea = area.intIdArea
           AND intIdSubArea = planFormacionPrograma.intIdSubArea) AS nomSubArea,
           programa.strNombreDelPrograma as Programa,
            parametroscurso.estado_curso as EstadoCurso,
            modulos.strNombre as Modulo
           FROM rd_parametros_curso_formacion parametrosCurso
            INNER JOIN tblcursosdeformacion curso ON parametrosCurso.id_curso_formacion_fk = curso.intIdCursoDeFormacion
            INNER JOIN tblPlanDeFormacionProgramas planFormacionPrograma ON curso.intIdPlanDeFormacionPrograma = planFormacionPrograma.intIdPlanDeFormacionPrograma
            LEFT JOIN tblAreas area on planFormacionPrograma.intIdArea = area.intIdArea
            INNER JOIN tblProgramasOProyectos programa ON planFormacionPrograma.intIdProgramaOProyecto = programa.intIdProgramaOProyecto
            INNER JOIN tblPersonas coordinador ON curso.intIdCoordinadorResponsable = coordinador.intIdPersona
            INNER JOIN tblSedes sede ON curso.intIdSede = sede.intIdSede
            JOIN rd_fechas_curso fechasCurso ON curso.intIdCursoDeFormacion = fechasCurso.id_curso_fk
            join tblmodulos modulos on modulos.intIdModulo = fechascurso.id_modulo
           WHERE parametroscurso.estado_curso in('terminado','cerrado')
           and curso.intIdCursoDeFormacion = $cursoId
           GROUP BY curso.strNombreCursoDeFormacion";

            $cr_curso = DB::connection('CnxOldSGA')->select(DB::raw($ssql));
        } else {
            $msg = 'El curso no se puede consultar porque los discentes tienen horas inconsistentes. Revise el curso y rectifique las horas de asistencia de las planillas.';
        }

        return response()->json([
            'status' => true,
            'message' => $msg,
            'data' => [
                'asistentes' => $n_asistentes,
                'curso' => $cr_curso
            ]
        ]);
    }

    public function filtersEncuestaIndividual(): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => 'Data obtenida exitosamente',
            'data' => [
                'tipoDocumentos' => Filters::getArrayTipoDocumento(),
                'cargos' => Filters::getArrayCargos(),
                'despachos' => Filters::getArrayDespachos(),
                'especialidades' => Filters::getArrayEspecialidades(),
                'entidades' => Filters::getArrayEntidades(),
                'concejos' => Filters::getArrayConcejos(),
                'distritos' => Filters::getArrayDistritos(),
                'circuitos' => Filters::getArrayCircuitos(),
                'ciudades' => Filters::getArrayCiudades(),
                'formacionAcademica' => Filters::getArrayFormacionAcademica()
            ]
        ]);
    }
}
