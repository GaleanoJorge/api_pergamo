<?php

namespace App\Models;

use App\Models\Base\Answer as BaseAnswer;

class Answer extends BaseAnswer
{
	protected $fillable = [
		'answer_type_id',
		'name',
		'order',
		'value'
	];
}
