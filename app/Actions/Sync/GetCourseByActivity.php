<?php

namespace App\Actions\Sync;

use App\Models\Activity;

class GetCourseByActivity
{
    /**
     * Get Course by Activity Id
     *
     * @param integer $activityId
     * @return Course|null
     */
    public static function handle(int $activityId): ?Activity
    {
        return Activity::select('course.*')
            ->join('session', 'session.id', '=', 'activity.session_id')
            ->join('module', 'module.id', '=', 'session.module_id')
            ->join('course', 'course.id', '=', 'module.course_id')
            ->where('activity.id', $activityId)
            ->get()->first();
    }
}
