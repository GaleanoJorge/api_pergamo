<?php

namespace App\Exports\OldSGA;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use DB;

use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class RunCoursesExport implements FromView /*WithDrawings,*/
{
    use Exportable;

    private $sede_id = null;
    private $programa_id = null;
    private $modulo_id = null;
    private $recurso_id = null;
    private $coordinador_id = null;
    private $vigencia_id = null;

    /*public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Escudo');
        //$drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/images/EscudoColombia.jpg'));
        $drawing->setHeight(70);
        $drawing->setCoordinates('B2');

        $drawing2 = new Drawing();
        $drawing2->setName('Logo');
        //$drawing2->setDescription('This is a second image');
        $drawing2->setPath(public_path('/images/nameEJRLBderecho.jpg'));
        $drawing2->setHeight(70);
        $drawing2->setCoordinates('G2');

        return [$drawing, $drawing2];
    }*/

    public function filterSede($id)
    {
        $this->sede_id = $id;

        return $this;
    }

    public function filterPrograma($id)
    {
        $this->programa_id = $id;

        return $this;
    }

    public function filterModulo($id)
    {
        $this->modulo_id = $id;

        return $this;
    }

    public function filterRecurso($id)
    {
        $this->recurso_id = $id;

        return $this;
    }

    public function filterCoordinador($id)
    {
        $this->coordinador_id = $id;

        return $this;
    }

    public function filterVigencia($id)
    {
        $this->vigencia_id = $id;

        return $this;
    }

    public function view(): View
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


        if ($this->sede_id) {
            $ssql .= " AND sede.intIdSede = " . $this->sede_id;
        }

        if ($this->programa_id) {
            $ssql .= " AND programa.intIdProgramaOProyecto = " . $this->programa_id;
        }

        if ($this->modulo_id) {
            $ssql .= " AND modulos.intIdModulo = " . $this->modulo_id;
        }

        if ($this->recurso_id) {
            $ssql .= " AND curso.intCostoCurso = " . $this->recurso_id;
        }

        if ($this->coordinador_id) {
            $ssql .= " AND coordinador.intIdPersona = " . $this->coordinador_id;
        }

        if ($this->vigencia_id) {
            $ssql .= " AND curso.intIdVigencia = " . $this->vigencia_id;
        }

        $ssql .= " GROUP BY curso.strNombreCursoDeFormacion ";
        return view('exports.OldSGA.runCourses', [
            'rows' => (array) DB::connection('CnxOldSGA')->select(DB::raw($ssql))
        ]);
    }
}
