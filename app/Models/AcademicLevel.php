<?php

namespace App\Models;

use App\Models\Base\AcademicLevel as BaseAcademicLevel;

class AcademicLevel extends BaseAcademicLevel
{
	protected $fillable = [
		'name'
	];
}
