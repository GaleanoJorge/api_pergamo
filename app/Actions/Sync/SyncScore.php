<?php

namespace App\Actions\Sync;

use Exception;
use App\Models\Score;
use App\Models\Delivery;
use App\Models\UserRoleCourse;
use App\Models\CriterionActivityGoal;
use App\Models\CourseEducationalInstitution;
use App\Models\CourseInstitutionCohort;

class SyncScore extends Sync
{
    /**
     * Sync score of connect
     *
     * @param array $data
     * @return void
     */
    public function handle(array $data): void
    {
        $institutionId = $this->institutionIdByMac($data['mac']);
        $student = GetStudentBySyncId::handle($data['id_student'], $institutionId);

        if (!$student) {
            throw new Exception("El estudiante por asociar a la entrega no existe", 423);
        }

        $userId = $student->id;
        $userRoleId = $student->user_role_id;

        $delivery = Delivery::where([
            ['user_id', $userId],
            ['sync_id', $data['id_delivery']],
        ])->get();

        if (!$delivery->count()) {
            throw new Exception("La entrega para asociar una nota no existe", 423);
        }

        $deliveryId = $delivery->first()->id;
        $activityId = $delivery->first()->activity_id;
        $course = GetCourseByActivity::handle($activityId);

        if (!$course) {
            throw new Exception("El curso para asociar nota a estudiante no existe", 423);
        }

        $courseId = $course->id;

        $courseEducationalInstitution = CourseEducationalInstitution::where([
            ['course_id', $courseId],
            ['educational_institution_id', $institutionId]
        ])->get();

        $userRoleCourse = UserRoleCourse::where([
            ['user_role_course.user_role_id', $userRoleId]
        ])->with(
            'course_institution_cohort',
            'course_institution_cohort.course_educational_institution'
        )->get();

        if (!$userRoleCourse->count()) {
            throw new Exception("El usuario-rol-curso para asociar nota no existe", 423);
        }

        foreach ($userRoleCourse as $key => $value) {
            if ($value['course_institution_cohort']['course_institution_id'] == $courseEducationalInstitution->first()->id)
                $userRoleCourseId = $value['id'];
        }

        $criterionActivityGoal = CriterionActivityGoal::where([
            ['criterion_id', $data['id_criteria']],
            ['activity_id', $activityId],
            ['goal_id', $data['id_logro']],
        ])->get();

        if (!$criterionActivityGoal->count()) {
            $newCriterionActivityGoal = new CriterionActivityGoal;
            $newCriterionActivityGoal->criterion_id = $data['id_criteria'];
            $newCriterionActivityGoal->activity_id = $activityId;
            $newCriterionActivityGoal->goal_id = $data['id_logro'];
            $newCriterionActivityGoal->save();
            $criterionActivityGoalId = $newCriterionActivityGoal->id;
        } else {
            $criterionActivityGoalId = $criterionActivityGoal->first()->id;
        }

        $scoreNote = trim(str_replace('puntos.', '', $data['score']));
        $observation = isset($data['comentario']) ? $data['comentario'] : null;

        $score = Score::where([
            ['delivery_id', $deliveryId],
            ['user_role_course_id', $userRoleCourseId],
            ['criterion_activity_goal_id', $criterionActivityGoalId],
        ])->get();

        if ($score->count()) {
            $score = $score->first();
            $score->score = $scoreNote;
            $score->observation = $observation;
            $score->save();
        } else {
            $newScore = new Score;
            $newScore->delivery_id = $deliveryId;
            $newScore->user_role_course_id = $userRoleCourseId;
            $newScore->criterion_activity_goal_id = $criterionActivityGoalId;
            $newScore->score = $scoreNote;
            $newScore->observation = $observation;
            $newScore->save();
        }

        $this->registerLog($institutionId, 'score', $data);
    }
}
