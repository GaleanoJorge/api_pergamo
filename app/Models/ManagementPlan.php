<?php

namespace App\Models;

use App\Models\Base\ManagementPlan as BaseManagementPlan;

class ManagementPlan extends BaseManagementPlan
{
	protected $fillable = [
		'type_of_attention_id',
		'frequency_id',
		'quantity',
		'specialty_id',
		'admissions_id',
		'assigned_user_id',
	];
}
