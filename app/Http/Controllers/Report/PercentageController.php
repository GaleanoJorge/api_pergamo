<?php

namespace App\Http\Controllers\Report;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentCourseRequest;
use App\Http\Requests\FilterRequest;
use App\Actions\Report\PercentageCompetitionStudentCourse;
use App\Actions\Report\NoApprovedStudents;
use App\Actions\Report\GroupAndIndividualDeliveries;
use App\Actions\Report\StudentCompetitionsTecnovsTecnos;
use App\Actions\Report\AverageGradesForTeacher;

class PercentageController extends Controller
{
    /**
     * Percentage competition by course and student
     *
     * @param StudentCourseRequest $request
     * @return JsonResponse
     */
    public function competitionByStudentCourse(
        StudentCourseRequest $request
    ): JsonResponse {
        $report = PercentageCompetitionStudentCourse::handle(
            $request->estudiante,
            $request->curso
        );

        return response()->json([
            'status' => true,
            'message' => 'Porcentaje obtenido por competencia por estudiante y por curso',
            'data' => ['report' => $report]
        ]);
    }

    /**
     * Average delivery by region
     *
     * @return JsonResponse
     */
    public function noApprovedStudents(): JsonResponse
    {
        $report = NoApprovedStudents::handle();

        return response()->json([
            'status' => true,
            'message' => 'Reporte de estudiantes No aprovados',
            'data' => ['report' => $report]
        ]);
    }
    /**
     * Percentage competition by course and student
     *
     * @param StudentCourseRequest $request
     * @return JsonResponse
     */
    public function groupAndIndividualDeliveries(
        FilterRequest $request
    ): JsonResponse {
        $report = GroupAndIndividualDeliveries::handle(
            $request->estudiante,
            $request->curso,
            $request->institucion
        );

        return response()->json([
            'status' => true,
            'message' => 'Reporte de entregas grupales e individuales (PIE)',
            'data' => ['report' => $report]
        ]);
    }

    /**
     * Student Competitions Tecnoacademia vs Tecnoacademias
     *
     * @param FilterRequest $request
     * @return JsonResponse
     */
    public function studentCompetitionsTecnovsTecnos(
        FilterRequest $request
    ): JsonResponse {
        $report = StudentCompetitionsTecnovsTecnos::handle(
            $request->estudiante,
            $request->curso,
            $request->region
        );

        return response()->json([
            'status' => true,
            'message' => 'Reporte de promedio de estudiantes que cumplen competencias de la tecnoacademia vs tecnoacademias',
            'data' => ['report' => $report]
        ]);
    }

    /**
     * Percentage of qualifications by trainer and ranges
     *
     * @return JsonResponse
     */
    public function averageGradesForTeacher(): JsonResponse
    {
        $report = AverageGradesForTeacher::handle();

        return response()->json([
            'status' => true,
            'message' => 'Reporte de porcentaje de calificaciones por entrenador y rangos (PIE)',
            'data' => ['report' => $report]
        ]);
    }
}
