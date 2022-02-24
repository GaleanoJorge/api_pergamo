<?php

namespace App\Models;

use App\Models\Base\DietTherapeuticComponent as BaseDietTherapeuticComponent;

class DietTherapeuticComponent extends BaseDietTherapeuticComponent
{
	protected $fillable = [
		'diet_therapeutic_id',
		'diet_component_id',
	];
}
