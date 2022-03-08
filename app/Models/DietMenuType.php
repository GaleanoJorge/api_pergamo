<?php

namespace App\Models;

use App\Models\Base\DietMenuType as BaseDietMenuType;

class DietMenuType extends BaseDietMenuType
{
	protected $fillable = [
		'name',
	];
}
