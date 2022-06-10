<?php

namespace App\Models;

use App\Models\Base\SuppliesMeasure as BaseSuppliesMeasure;

class SuppliesMeasure extends BaseSuppliesMeasure
{
	protected $fillable = [
		'name',
	];
}
