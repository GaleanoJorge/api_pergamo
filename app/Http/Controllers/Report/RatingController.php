<?php

namespace App\Http\Controllers\Report;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Actions\Report\AllByStudentCourse;
use App\Http\Requests\StudentCourseRequest;
use App\Http\Requests\FilterRequest;
use App\Actions\Report\AverageDeliveryRegion;
use App\Actions\Report\ApprovedStudents;
use App\Actions\Report\RatingActivityStudentCourse;
use App\Actions\Report\AverageRatingStudentCourseMinMax;
use App\Actions\Report\GradePointTeachers;

class RatingController extends Controller
{
    /**
     * Average rating by course student with min and max
     *
     * @param StudentCourseRequest $request
     * @return JsonResponse
     */
    public function averageByStudentCourseAndMinMax(
        StudentCourseRequest $request
    ): JsonResponse {
        $report = AverageRatingStudentCourseMinMax::handle(
            $request->estudiante,
            $request->curso
        );

        return response()->json([
            'status' => true,
            'message' => 'Promedio de calificacion por curso del estudiante vs ' .
                ' la del curso vs minimo vs maximo',
            'data' => ['report' => $report]
        ]);
    }

    /**
     * Average delivery by region
     *
     * @return JsonResponse
     */
    public function averageDeliveryRegion(): JsonResponse
    {
        $report = AverageDeliveryRegion::handle();

        return response()->json([
            'status' => true,
            'message' => 'Reporte entregas por tecnoacademias',
            'data' => ['report' => $report]
        ]);
    }

    /**
     * Rating activity by student and course
     *
     * @param StudentCourseRequest $request
     * @return JsonResponse
     */
    public function activityByStudentCourse(
        StudentCourseRequest $request
    ): JsonResponse {
        $report = RatingActivityStudentCourse::handle(
            $request->estudiante,
            $request->curso
        );

        return response()->json([
            'status' => true,
            'message' => ' Calificaciones por actividades del curso del estudiante',
            'data' => ['report' => $report]
        ]);
    }

    /**
     * Rating all by student and course
     *
     * @param StudentCourseRequest $request
     * @return JsonResponse
     */
    public function allByStudentCourse(
        StudentCourseRequest $request
    ): JsonResponse {
        $report = AllByStudentCourse::handle(
            $request->estudiante,
            $request->curso
        );

        return response()->json([
            'status' => true,
            'message' => ' Reporte Estudiante/Curso/Módulos/Sesiones/Competencias/' . 
                'Actividades/Entregas/Calificaciones',
            'data' => ['report' => $report]
        ]);
    }

    /**
     * Approved Students
     *
     * @param FilterRequest $request
     * @return JsonResponse
     */
    public function approvedStudents(
        FilterRequest $request
    ): JsonResponse {
            $report = ApprovedStudents::handle(
                $request->curso,
                $request->institucion,
                $request->estudiante
            );

        return response()->json([
            'status' => true,
            'message' => ' Reporte de estudiantes aprobados (PIE)',
            'data' => ['report' => $report]
        ]);
        }
    
    
    /**
     * Grade Point Teachers
     *
     * @return JsonResponse
     */
    public function gradePointTeachers(): JsonResponse
    {
        $report = GradePointTeachers::handle();

        return response()->json([
            'status' => true,
            'message' => 'Reporte de profesores con promedio de calificaciones',
            'data' => ['report' => $report]
        ]);
    }
}