<?php

namespace App\Models;

use App\Models\Base\DietSupplies as BaseDietSupplies;

class DietSupplies extends BaseDietSupplies
{
	protected $fillable = [
		'name',
		'diet_supply_type_id',
		'measurement_units_id',
	];
}
