<?php

namespace App\Models;

use App\Models\Base\Specialtym as BaseSpecialtym;

class Specialtym extends BaseSpecialtym
{
	protected $fillable = [
		'name',
		'status_id'
	];
}
