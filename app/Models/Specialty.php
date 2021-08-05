<?php

namespace App\Models;

use App\Models\Base\Specialty as BaseSpecialty;

class Specialty extends BaseSpecialty
{
	protected $fillable = [
		'name',
		'status_id'
	];
}
