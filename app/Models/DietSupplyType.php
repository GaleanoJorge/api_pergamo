<?php

namespace App\Models;

use App\Models\Base\DietSupplyType as BaseDietSupplyType;

class DietSupplyType extends BaseDietSupplyType
{
	protected $fillable = [
		'name',
	];
}
