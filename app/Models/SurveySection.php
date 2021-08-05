<?php

namespace App\Models;

use App\Models\Base\SurveySection as BaseSurveySection;

class SurveySection extends BaseSurveySection
{
	protected $fillable = [
		'survey_id',
		'section_id',
		'name',
		'order',
		'weight',
		'is_percent',
		'user_role_id',
		'course_id'
	];
}
