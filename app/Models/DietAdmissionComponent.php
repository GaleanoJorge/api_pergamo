<?php

namespace App\Models;

use App\Models\Base\DietAdmissionComponent as BaseDietAdmissionComponent;

class DietAdmissionComponent extends BaseDietAdmissionComponent
{
	protected $fillable = [
		'diet_admission_id',
		'diet_component_id',
	];
}
