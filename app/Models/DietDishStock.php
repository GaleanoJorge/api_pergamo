<?php

namespace App\Models;

use App\Models\Base\DietDishStock as BaseDietDishStock;

class DietDishStock extends BaseDietDishStock
{
	protected $fillable = [
		'amount',
		'diet_dish_id',
		'diet_supplies_id',
	];
}
