<?php

namespace App\Http\Controllers\Management;

use App\Models\GroupActivity;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\UserGroupActivity;

class GroupActivityController extends Controller
{
    /**
     * Get the Group Activity by activity id
     *
     * @param integer $activityId
     * @return JsonResponse
     */
    public function getByActivity(int $activityId): JsonResponse
    {
        $groupActivities = GroupActivity::where('activity_id', $activityId)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Grupo de actividades por actividad obtenidas exitosamente.',
            'data' => ['groupActivities' => $groupActivities]
        ]);
    }

    /**
     * Get the User Group Activity by Group Activity id
     *
     * @param integer $groupActivityId
     * @return JsonResponse
     */
    public function getUserByGroupActivity(int $groupActivityId): JsonResponse
    {
        $usersGroupActivity = UserGroupActivity::where(
            'group_activity_id',
            $groupActivityId
        )->with('user_role_course.user_role.user')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Usuarios por grupo de actividad obtenidas exitosamente.',
            'data' => ['usersGroupActivity' => $usersGroupActivity]
        ]);
    }
}
