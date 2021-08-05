<?php

namespace App\Models;

use App\Models\Base\Score as BaseScore;

class Score extends BaseScore
{
	protected $fillable = [
		'delivery_id',
		'criterion_activity_goal_id',
		'user_role_course_id',
		'score',
		'observation'
	];
}
