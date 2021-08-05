<?php

namespace App\Models;

use App\Models\Base\QuestionType as BaseQuestionType;

class QuestionType extends BaseQuestionType
{
	protected $fillable = [
		'name',
		'image_question_type'
	];
}
