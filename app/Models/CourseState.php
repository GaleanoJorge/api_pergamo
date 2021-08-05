<?php

namespace App\Models;

use App\Models\Base\CourseState as BaseCourseState;

class CourseState extends BaseCourseState
{
	protected $fillable = [
		'name'
	];
}
