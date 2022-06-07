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
		'procedure_id',
		'product_id',
		'authorization_id',
		'assigned_user_id',
		'preparation',
		'route_of_administration',
		'blend',
		'administration_time',
		'number_doses',
		'dosage_administer',
		'phone_consult',
		'observation',
	];
}
