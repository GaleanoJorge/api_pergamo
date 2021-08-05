<?php

namespace App\Models;

use App\Models\Base\Course as BaseCourse;

class Course extends BaseCourse
{
	protected $fillable = [
		'category_id',
		'campus_id',
		'entity_type_id',
		'user_id',
		'coursebase',
		'quota',
		'start_date',
		'finish_date',
		'certificate_id'
	];

	protected $casts = [
		'start_date' => 'date:Y-m-d',
		'finish_date' => 'date:Y-m-d',
		'initial_date' => 'date:Y-m-d',
		'final_date' => 'date:Y-m-d'
	];

	public function stats()
	{
		return $this->hasMany(UserRoleCourse::class);
	}

	public function course_type()
	{
		return $this->belongsTo(CourseType::class);
	}
}
