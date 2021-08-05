<?php

namespace App\Models;

use App\Models\Base\AnswersQuestion as BaseAnswersQuestion;

class AnswersQuestion extends BaseAnswersQuestion
{
	protected $fillable = [
		'question_id',
		'answer_id',
		'order'
	];
}
