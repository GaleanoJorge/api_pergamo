<?php

namespace App\Models;

use App\Models\UserRole;
use App\Models\Base\Survey as BaseSurvey;

class Survey extends BaseSurvey
{
	protected $fillable = [
		'survey_type_id',
		'name',
		'description',
		'duration',
		'url_image',
		'status_id',
		'max_points',
		'objetives'
	];

	protected $casts = [
		'duration' => 'datetime:H:i'
    ];

	public function getUrlImageAttribute($value)
	{
		return asset('/storage/surveys/'.$value);
	}

	public function user_role()
	{
		return $this->belongsToMany(UserRole::class, 'survey_sections')
					->withPivot('id', 'name', 'order', 'weight', 'is_percent', 'section_id', 'course_id')
					->withTimestamps();
	}
}
