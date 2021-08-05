<?php

namespace App\Models;

use App\Models\Base\CategoryGoal as BaseCategoryGoal;

class CategoryGoal extends BaseCategoryGoal
{
	protected $fillable = [
		'category_id',
		'goal_id'
	];
}
