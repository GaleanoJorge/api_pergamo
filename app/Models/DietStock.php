<?php

namespace App\Models;

use App\Models\Base\DietStock as BaseDietStock;

class DietStock extends BaseDietStock
{
	protected $fillable = [
		'amount',
		'campus_id',
		'diet_supplies_id',
	];
}
