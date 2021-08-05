<?php

namespace App\Models;

use App\Models\Base\Dependence as BaseDependence;

class Dependence extends BaseDependence
{
	protected $fillable = [
		'name',
		'status_id'
	];
}
