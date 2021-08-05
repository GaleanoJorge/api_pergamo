<?php

namespace App\Models;

use App\Models\Base\CourseApproval as BaseCourseApproval;

class CourseApproval extends BaseCourseApproval
{
	protected $fillable = [
		'course_id',
		'approval_file'
	];
}
