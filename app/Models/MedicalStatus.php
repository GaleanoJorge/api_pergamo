<?php

namespace App\Models;

use App\Models\Base\MedicalStatus as BaseMedicalStatus;

class MedicalStatus extends BaseMedicalStatus
{
	protected $fillable = [
		'id',
		'name',
	];
}
