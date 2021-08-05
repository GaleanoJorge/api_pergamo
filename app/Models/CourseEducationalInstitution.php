<?php

namespace App\Models;

use App\Models\Base\CourseEducationalInstitution as BaseCourseEducationalInstitution;

class CourseEducationalInstitution extends BaseCourseEducationalInstitution
{
	protected $fillable = [
		'course_id',
		'educational_institution_id'
	];
}
