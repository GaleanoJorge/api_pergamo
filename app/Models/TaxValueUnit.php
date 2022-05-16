<?php

namespace App\Models;

use App\Models\Base\TaxValueUnit as BaseTaxValueUnit;

class TaxValueUnit extends BaseTaxValueUnit
{
	protected $fillable = [
		'value',
		'year',
	];
}
