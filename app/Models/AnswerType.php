<?php

namespace App\Models;

use App\Models\Base\AnswerType as BaseAnswerType;

class AnswerType extends BaseAnswerType
{
	protected $fillable = [
		'name'
	];
}
