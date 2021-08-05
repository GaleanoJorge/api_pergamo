<?php

namespace App\Actions\Sync;

use App\Models\Base\CourseEducationalInstitution;
use Exception;
use App\Models\User;
use App\Models\Course;
use App\Models\CourseInstitutionCohort;
use App\Models\UserRole;
use App\Models\UserOrigin;
use App\Models\CustomField;
use App\Models\UserRoleCourse;
use Illuminate\Support\Facades\DB;
use App\Models\CustomFieldUserRole;
use App\Models\UserRoleEducationalInstitution;

class SyncStudent extends Sync
{
    /**
     * Sync Student
     *
     * @param array $data
     * @return void
     */
    public function handle(array $data): void
    {
        $institutionId = $this->institutionIdByMac($data['mac']);
        // DB::beginTransaction();
        $student = GetStudentBySyncId::handle($data['id'], $institutionId);
        $course = Course::find($data['id_course']);
        $courseEducationalInstitution = CourseEducationalInstitution::where([
            ['course_id', '=', $data['id_course']],
            ['educational_institution_id', '=', $institutionId]
        ])->get();

        if (!$course) {
            throw new Exception("El curso por asociar al estudiante no existe", 423);
        }

        if (!$courseEducationalInstitution) {
            throw new Exception("El curso con institucion por asociar al estudiante no existe", 423);
        }

        $courseEducationalInstitutionId = $courseEducationalInstitution->first()->id;

        $courseInstitutionCohortId = $this->SyncCourseInstitutionCohort([
            'idCourseInstitution' => $courseEducationalInstitutionId,
            'cohort' => strval($data['cohort'])
        ]);

        if ($student) {
            $userRoleId = $student->user_role_id;

            $student->email = $data['email'];
            $student->firstname = $data['firstname'];
            $student->lastname = $data['lastname'];
            $student->save();

            $userRoleCourse = UserRoleCourse::where([
                ['user_role_id', $userRoleId],
                ['course_institution_cohort_id', $courseInstitutionCohortId]
            ])->get();

            if ($userRoleCourse->count() == 0) {
                $newUserRoleCourse = new UserRoleCourse;
                $newUserRoleCourse->user_role_id = $userRoleId;
                $newUserRoleCourse->course_institution_cohort_id = $courseInstitutionCohortId;
                $newUserRoleCourse->status_id = 1;
                $newUserRoleCourse->save();
            }
        } else {
            $user = new User;
            $user->status_id = 1;
            $user->email = $data['email'];
            $user->firstname = $data['firstname'];
            $user->lastname = $data['lastname'];
            $user->sync_id = $data['id'];
            $user->save();
            $userId = $user->id;

            $userOrigin = new UserOrigin;
            $userOrigin->user_id = $userId;
            $userOrigin->origin_id = 2;
            $userOrigin->save();

            $userRole = new UserRole;
            $userRole->user_id = $userId;
            $userRole->role_id = 5;
            $userRole->save();
            $userRoleId = $userRole->id;

            $newUserRoleCourse = new UserRoleCourse;
            $newUserRoleCourse->user_role_id = $userRoleId;
            $newUserRoleCourse->course_institution_cohort_id = $courseInstitutionCohortId;
            $newUserRoleCourse->status_id = 1;
            $newUserRoleCourse->save();

            $userRoleInstitution = new UserRoleEducationalInstitution;
            $userRoleInstitution->user_role_id = $userRoleId;
            $userRoleInstitution->educational_institution_id = $institutionId;
            $userRoleInstitution->save();
        }

        $this->syncCustomFieldStudent(json_decode($data['customfields']), $userRoleId);

        $this->registerLog($institutionId, 'student', $data);

        // DB::commit();
    }

    /**
     * Sync custom field of student
     *
     * @param array $data
     * @param integer $userRoleId
     * @return void
     */
    private function syncCustomFieldStudent(
        array $data,
        int $userRoleId
    ): void {

        foreach ($data as $key => $value) {

            $customField = '';
            $valueField = $this->convertUtf8($value->value);
            $customFieldId = $this->existCustomField(
                $this->convertUtf8($value->shortname),
                $this->convertUtf8($value->name)
            );
            $customFieldUser = CustomFieldUserRole::where([
                ['custom_field_id', $customFieldId],
                ['user_role_id', $userRoleId],
            ])->get();

            if ($customFieldUser->count()) {
                $customField = $customFieldUser->first();
                $customField->value = $valueField;
            } else {
                $customField = new CustomFieldUserRole;
                $customField->custom_field_id = $customFieldId;
                $customField->user_role_id = $userRoleId;
                $customField->value = $valueField;
            }

            $customField->save();
        }
    }

    /**
     * Exist custom field, if not create a new record
     *
     * @param string $key
     * @param string $name
     * @return integer
     */
    private function existCustomField(string $key, string $name): int
    {
        $customField = CustomField::where('key', $key)->get();

        if (!$customField->count()) {
            $customField = new CustomField;
            $customField->custom_field_type_id = 1;
            $customField->key = $key;
            $customField->name = $name;
            $customField->save();

            return $customField->id;
        }

        return $customField->first()->id;
    }

    /**
     * Sync CourseInstitutionCohort
     *
     * @param array $data
     * @return int
     */
    public function SyncCourseInstitutionCohort(array $data)
    {
        $courseInstitutionCohort = CourseInstitutionCohort::where([
            ['course_institution_id', $data['idCourseInstitution']],
            ['cohort', strval($data['cohort'])]
        ])->get();

        if ($courseInstitutionCohort->count() == 0) {
            try {
                $courseInstitutionCohortNew = new CourseInstitutionCohort();
                $courseInstitutionCohortNew->course_institution_id = $data['idCourseInstitution'];
                $courseInstitutionCohortNew->cohort = strval($data['cohort']);
                $courseInstitutionCohortNew->save();
                $courseInstitutionCohortId = $courseInstitutionCohortNew->id;
            } catch (\Illuminate\Database\QueryException $e) {
                $this->SyncCourseInstitutionCohort($data);
            } catch (\Exception $e) {
                $this->SyncCourseInstitutionCohort($data);
            }
        } else {
            $courseInstitutionCohortId = $courseInstitutionCohort->first()->id;
        }
        return $courseInstitutionCohortId;
    }
}
