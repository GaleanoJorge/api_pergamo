<?php

namespace App\Models;

use App\Models\Base\Subarea as BaseSubarea;

class Subarea extends BaseSubarea
{
	protected $fillable = [
		'name',
		'description',
		'status_id'
	];
}
