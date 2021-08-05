<?php

namespace App\Models;

use App\Models\Base\TargetPerson as BaseTargetPerson;

class TargetPerson extends BaseTargetPerson
{
	protected $fillable = [
		'name'
	];
}
