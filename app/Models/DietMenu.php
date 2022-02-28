<?php

namespace App\Models;

use App\Models\Base\DietMenu as BaseDietMenu;

class DietMenu extends BaseDietMenu
{
	protected $fillable = [
		'name',
		'diet_consistency_id',
		'diet_menu_type_id',
		'diet_week_id',
		'diet_day_id',
	];
}
