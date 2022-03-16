<?php

namespace App\Models;

use App\Models\Base\DietStock as BaseDietStock;

class DietStock extends BaseDietStock
{
	protected $fillable = [
		'amount',
		'diet_supplies_id',
	];
}
