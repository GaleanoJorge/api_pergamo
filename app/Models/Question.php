<?php

namespace App\Models;

use App\Models\Base\Question as BaseQuestion;

class Question extends BaseQuestion
{
	protected $fillable = [
		'question_type_id',
		'section_id',
		'name',
		'description',
		'order',
		'attribute',
		'status_id',
		'aling'
	];
}
