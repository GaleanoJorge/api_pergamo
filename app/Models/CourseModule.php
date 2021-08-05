<?php

namespace App\Models;

use App\Models\Base\CourseModule as BaseCourseModule;

class CourseModule extends BaseCourseModule
{
	protected $fillable = [
		'course_id',
		'module_id'
	];
}
