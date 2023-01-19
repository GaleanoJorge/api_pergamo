<?php

namespace App\Models;

use App\Models\Base\PadRisk as BasePadRisk;

class PadRisk extends BasePadRisk
{
	protected $fillable = [
		'name',
	];
}
