<?php

namespace App\Models;

use App\Models\Base\DietDish as BaseDietDish;

class DietDish extends BaseDietDish
{
	protected $fillable = [
		'name',
	];
}
