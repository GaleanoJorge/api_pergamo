<?php

namespace App\Models;

use App\Models\Base\CourseType as BaseCourseType;

class CourseType extends BaseCourseType
{
	protected $fillable = [
		'name'
	];
}
