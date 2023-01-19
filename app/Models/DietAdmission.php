<?php

namespace App\Models;

use App\Models\Base\DietAdmission as BaseDietAdmission;

class DietAdmission extends BaseDietAdmission
{
	protected $fillable = [
		'admissions_id',
		'diet_consistency_id',
	];
}
