<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\JsonResponse;
use App\Models\CustomFieldCourse;
use App\Models\CustomFieldUserRole;
use App\Http\Controllers\Controller;
use App\Models\CustomFieldEducationalInstitution;

class CustomFieldController extends Controller
{
    /**
     * Get the custom field by course id
     *
     * @param integer $courseId
     * @return JsonResponse
     */
    public function getByCourse(int $courseId): JsonResponse
    {
        $customFieldCourse = CustomFieldCourse::with(
            'custom_field.custom_field_type',
            'course'
        )->where('course_id', $courseId)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Campos dinámicos por curso obtenidos exitosamente.',
            'data' => ['customFieldCourse' => $customFieldCourse]
        ]);
    }

    /**
     * Get the custom field by institution id
     *
     * @param integer $institutionId
     * @return JsonResponse
     */
    public function getByInstitution(int $institutionId): JsonResponse
    {
        $customFieldInstitution = CustomFieldEducationalInstitution::with(
            'custom_field.custom_field_type',
            'educational_institution'
        )->where('educational_institution_id', $institutionId)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Campos dinámicos por institución obtenidos exitosamente.',
            'data' => ['customFieldInstitution' => $customFieldInstitution]
        ]);
    }

    /**
     * Get the custom field by user role id
     *
     * @param integer $userRoleId
     * @return JsonResponse
     */
    public function getByUserRole(int $userRoleId): JsonResponse
    {
        $customFieldUserRole = CustomFieldUserRole::with(
            'custom_field.custom_field_type',
            'user_role'
        )->where('user_role_id', $userRoleId)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Campos dinámicos por usuario-rol obtenidos exitosamente.',
            'data' => ['customFieldUserRole' => $customFieldUserRole]
        ]);
    }
}
