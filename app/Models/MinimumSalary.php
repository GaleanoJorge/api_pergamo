<?php

namespace App\Models;

use App\Models\Base\MinimumSalary as BaseMinimumSalary;

class MinimumSalary extends BaseMinimumSalary
{
	protected $fillable = [
		'value',
		'year',
	];
}
