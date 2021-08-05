<?php

namespace App\Models;

use App\Models\Base\CategoriesOrigin as BaseCategoriesOrigin;

class CategoriesOrigin extends BaseCategoriesOrigin
{
	protected $fillable = [
		'origin_id',
		'category_id',
		'planned_budget',
		'allocated_budget',
		'executed_budget'
	];
}
