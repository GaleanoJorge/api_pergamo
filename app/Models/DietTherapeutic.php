<?php

namespace App\Models;

use App\Models\Base\DietTherapeutic as BaseDietTherapeutic;

class DietTherapeutic extends BaseDietTherapeutic
{
	protected $fillable = [
		'name',
		'diet_consistency_id',
	];
}
