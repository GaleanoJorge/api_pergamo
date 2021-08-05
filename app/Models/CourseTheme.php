<?php

namespace App\Models;

use App\Models\Base\CourseTheme as BaseCourseTheme;

class CourseTheme extends BaseCourseTheme
{
	protected $fillable = [
		'course_id',
		'themes_id'
	];
}
