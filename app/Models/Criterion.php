<?php

namespace App\Models;

use App\Models\Base\Criterion as BaseCriterion;

class Criterion extends BaseCriterion
{
	protected $fillable = [
		'competition_id',
		'name'
	];
}
