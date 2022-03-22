<?php

namespace App\Models;

use App\Models\Base\DietSuppliesOutput as BaseDietSuppliesOutput;

class DietSuppliesOutput extends BaseDietSuppliesOutput
{
	protected $fillable = [
		'date',
		'campus_id',
	];
}
