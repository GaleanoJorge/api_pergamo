<?php

namespace App\Models;

use App\Models\Base\ConsentsInformed as BaseConsentsInformed;

class ConsentsInformed extends BaseConsentsInformed
{
	protected $fillable = [
		'admissions_id',
		'firm_patient',
		'firm_responsible',
		'assigned_user_id',
		'type_consents_id',
		'name',
		'file',
		'ch_record_id',
	];
}
