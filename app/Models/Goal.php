<?php

namespace App\Models;

use App\Models\Base\Goal as BaseGoal;

class Goal extends BaseGoal
{
	protected $fillable = [
		'unit_id',
		'value',
		'name',
		'description'
	];
}
