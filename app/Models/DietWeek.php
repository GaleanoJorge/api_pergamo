<?php

namespace App\Models;

use App\Models\Base\DietWeek as BaseDietWeek;

class DietWeek extends BaseDietWeek
{
	protected $fillable = [
		'name',
	];
}
