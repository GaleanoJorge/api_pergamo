<?php

namespace App\Models;

use App\Models\Base\ProcessDetailActivityRubric as BaseProcessDetailActivityRubric;

class ProcessDetailActivityRubric extends BaseProcessDetailActivityRubric
{
	protected $fillable = [
		'process_d_a_id',
		'rubric_id',
		'grade',
		'observation'
	];
}
