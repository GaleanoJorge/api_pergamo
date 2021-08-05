<?php

namespace App\Models;

use App\Models\Base\SurveyType as BaseSurveyType;

class SurveyType extends BaseSurveyType
{
	protected $fillable = [
		'name',
		'description'
	];
}
