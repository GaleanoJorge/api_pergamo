<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\UserRole;

class UserRoleController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param integer $roleId
     * @return JsonResponse
     */
    public function getByRole(int $roleId): JsonResponse
    {
        $usersRole = UserRole::where('role_id', $roleId)
            ->with(
                'user',
                'user_role_course',
                'user_role_course.course_institution_cohort',
                'user_role_course.course_institution_cohort.course_educational_institution',
                'user_role_course.course_institution_cohort.course_educational_institution.educational_institution',
                'user_role_course.course_institution_cohort.course_educational_institution.course'
            )->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Usuarios por Rol obtenidos exitosamente',
            'data' => ['role' => $usersRole]
        ]);
    }
}
