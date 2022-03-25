<?php

namespace App\Models;

use App\Models\Base\DietSuppliesOutputMenu as BaseDietSuppliesOutputMenu;

class DietSuppliesOutputMenu extends BaseDietSuppliesOutputMenu
{
	protected $fillable = [
		'amount',
		'diet_supplies_output_id',
		'diet_menu_id',
	];
}
