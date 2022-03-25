<?php

namespace App\Models;

use App\Models\Base\DietConsistency as BaseDietConsistency;

class DietConsistency extends BaseDietConsistency
{
	protected $fillable = [
		'name',
	];
}
