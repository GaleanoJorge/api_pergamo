<?php

namespace App\Models;

use App\Models\Base\CriterionActivityGoal as BaseCriterionActivityGoal;

class CriterionActivityGoal extends BaseCriterionActivityGoal
{
	protected $fillable = [
		'criterion_id',
		'activity_id',
		'goal_id'
	];
}
