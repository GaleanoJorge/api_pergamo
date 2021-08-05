<?php

namespace App\Actions\Sync;

use Exception;
use App\Models\Course;
use App\Models\CourseEducationalInstitution;

class SyncCourse extends Sync
{
    /**
     * Sync course associate institution
     *
     * @param integer $courseId
     * @param string $mac
     * @return void
     */
    public function handle(int $courseId, string $mac): void
    {
        $institutionId = $this->institutionIdByMac($mac);

        $course = Course::find($courseId);

        if (!$course) {
            throw new Exception("El curso por asociar a la institución no existe", 423);
        }

        $courseInst = CourseEducationalInstitution::where([
            ['educational_institution_id', $institutionId],
            ['course_id', $courseId]
        ])->get();

        if (!$courseInst->count()) {
            $newCourseInst = new CourseEducationalInstitution;
            $newCourseInst->course_id = $courseId;
            $newCourseInst->educational_institution_id = $institutionId;
            $newCourseInst->save();
        }

        $this->registerLog($institutionId, 'course', [
            'mac' => $mac,
            'course_id' => $courseId
        ]);
    }
}
