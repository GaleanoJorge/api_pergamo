<?php

namespace App\Models;

use App\Models\Base\NonWorkingDays as BaseNonWorkingDays;

class NonWorkingDays extends BaseNonWorkingDays
{
	protected $fillable = [
		'day',
		'description',
	];
}
