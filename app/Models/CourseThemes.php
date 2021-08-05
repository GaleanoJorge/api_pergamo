<?php

namespace App\Models;

use App\Models\Base\CourseThemes as BaseCourseThemes;

class CourseThemes extends BaseCourseThemes
{
	protected $fillable = [
		'course_id',
		'theme_id'
	];
}
