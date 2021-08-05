<?php

namespace App\Http\Controllers\Report;

use App\Actions\Report\ApprovedDeliveries;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentCourseInstitutionRegionRequest;
use App\Http\Requests\StudentCourseRequest;
use App\Actions\Report\ExpectedStudentCourseInstitutionRegion;
use App\Actions\Report\StudentsPendingDelivery;
use App\Actions\Report\GradePointAveragePerCourse;
use App\Actions\Report\ApprovedDelivery;
use App\Actions\Report\FUID;
use App\Actions\Report\Goals;
use App\Actions\Report\ProjectProgress;

class ProgressController extends Controller
{
    /**
     * Expected progress by student, course, institution and region
     *
     * @param StudentCourseInstitutionRegionRequest $request
     * @return JsonResponse
     */
    public function expectedByStudentCourseInstitutionRegion(
        StudentCourseInstitutionRegionRequest $request
    ): JsonResponse {
        $report = ExpectedStudentCourseInstitutionRegion::handle(
            $request->estudiante,
            $request->curso,
            $request->institución,
            $request->departamento
        );

        return response()->json([
            'status' => true,
            'message' => 'Reporte de avance esperado (entregas esperados vs entregas realizadas)',
            'data' => ['report' => $report]
        ]);
    }
    /**
     * Students Pending Delivery
     *
     * @return JsonResponse
     */
    public function studentsPendingDelivery(): JsonResponse
    {
        $report = StudentsPendingDelivery::handle();

        return response()->json([
            'status' => true,
            'message' => 'Reporte de estudiantes con entregas pendientes',
            'data' => ['report' => $report]
        ]);
    }

    /**
     * Grade Point Average Per Course
     *
     * @return JsonResponse
     */
    public function gradePointAveragePerCourse(): JsonResponse
    {
        $report = GradePointAveragePerCourse::handle();

        return response()->json([
            'status' => true,
            'message' => 'Reporte de promedio de calificaciones por curso',
            'data' => ['report' => $report]
        ]);
    }

    /**
     * Approved Deliveries 16 a
     *
     * @param StudentCourseInstitutionRegionRequest $request
     * @return JsonResponse
     */
    public function approvedDeliveries(
        StudentCourseRequest $request
    ): JsonResponse {
        $report = ApprovedDeliveries::Report16a(
            $request->estudiante,
            $request->curso
        );

        return response()->json([
            'status' => true,
            'message' => 'Reporte de entregas aprobados 16a',
            'data' => ['report' => $report]
        ]);
    }

    /**
     * Aproved Deliveries 16 b
     *
     * @param StudentCourseInstitutionRegionRequest $request
     * @return JsonResponse
     */
    public function approvedDeliveries2(
        StudentCourseRequest $request
    ): JsonResponse {
        $report = ApprovedDeliveries::Report16b(
            $request->estudiante,
            $request->curso
        );

        return response()->json([
            'status' => true,
            'message' => 'Reporte de entregas aprobados 16b',
            'data' => ['report' => $report]
        ]);
    }

    /**
     * Project Progress
     *
     * @return JsonResponse
     */
    public function projectProgress(): JsonResponse
    {
        $report = ProjectProgress::handle();

        return response()->json([
            'status' => true,
            'message' => 'Reporte de progreso del proyecto',
            'data' => ['report' => $report]
        ]);
    }

    /**
     * FUID
     *
     * @return JsonResponse
     */
    public function fuid(): JsonResponse
    {
        $report = FUID::handle();

        return response()->json([
            'status' => true,
            'message' => 'Reporte FUID',
            'data' => ['report' => $report]
        ]);
    }

    /**
     * Goals
     *
     * @return JsonResponse
     */
    public function goals(): JsonResponse
    {
        $report = Goals::handle();

        return response()->json([
            'status' => true,
            'message' => 'Reporte de metas',
            'data' => ['report' => $report]
        ]);
    }
}
