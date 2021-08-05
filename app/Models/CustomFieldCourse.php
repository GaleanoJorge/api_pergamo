<?php

namespace App\Models;

use App\Models\Base\CustomFieldCourse as BaseCustomFieldCourse;

class CustomFieldCourse extends BaseCustomFieldCourse
{
	protected $fillable = [
		'custom_field_id',
		'course_id',
		'value'
	];
}
