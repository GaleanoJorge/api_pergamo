<?php

namespace App\Models;

use App\Models\Base\DietDay as BaseDietDay;

class DietDay extends BaseDietDay
{
	protected $fillable = [
		'name',
	];
}
