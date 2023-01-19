<?php

namespace App\Models;

use App\Models\Base\DietMenuDish as BaseDietMenuDish;

class DietMenuDish extends BaseDietMenuDish
{
	protected $fillable = [
		'diet_menu_id',
		'diet_dish_id',
	];
}
