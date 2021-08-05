<?php

namespace App\Models;

use App\Models\Base\Rubric as BaseRubric;

class Rubric extends BaseRubric
{
	protected $fillable = [
		'name',
		'activity_id'
	];
}
