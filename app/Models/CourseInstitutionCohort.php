<?php

namespace App\Models;

use App\Models\Base\CourseInstitutionCohort as BaseCourseInstitutionCohort;

class CourseInstitutionCohort extends BaseCourseInstitutionCohort
{
	protected $fillable = [
		'course_institution_id',
		'cohort',
	];
}
