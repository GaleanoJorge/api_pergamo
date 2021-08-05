<?php

namespace App\Http\Controllers\Management;

use App\Models\Activity;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    /**
     * Get the Activity by session id
     *
     * @param integer $sessionId
     * @return JsonResponse
     */
    public function getBySession(int $sessionId): JsonResponse
    {
        $activities = Activity::where('session_id', $sessionId)
            ->with('activity_type')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Actividades por sesión obtenidas exitosamente.',
            'data' => ['activities' => $activities]
        ]);
    }
}
