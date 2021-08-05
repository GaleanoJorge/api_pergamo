<?php

namespace App\Models;

use App\Models\Base\ActivityType as BaseActivityType;

class ActivityType extends BaseActivityType
{
	protected $fillable = [
		'name',
		'group'
	];
}
