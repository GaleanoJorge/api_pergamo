<?php

namespace App\Models;

use App\Models\Base\Position as BasePosition;

class Position extends BasePosition
{
	protected $fillable = [
		'name',
		'status_id'
	];
}
