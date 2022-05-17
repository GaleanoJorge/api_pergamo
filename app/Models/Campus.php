<?php

namespace App\Models;

use App\Models\Base\Campus as BaseCampus;

class Campus extends BaseCampus
{
	protected $fillable = [
		'name',
		'region_id',
		'municipality_id',
	];
}
