<?php

namespace App\Models;

use App\Models\Base\StayType as BaseStayType;

class StayType extends BaseStayType
{
	protected $fillable = [
		'name',
	];
}
