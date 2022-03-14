<?php

namespace App\Models;

use App\Models\Base\PacMonitoring as BasePacMonitoring;

class PacMonitoring extends BasePacMonitoring
{
	protected $fillable = [
		'admissions_id',
		'application_date',
		'authorization_pin',
		'profesional_user_id',
		'diagnosis_id',
		'reception_hour',
		'presentation_hour',
		'acceptance_hour',
		'offer_hour',
		'start_consult_hour',
		'finish_consult_hour',
		'close_date',
		'close_crm_hour',
		'copay_value',
	];
}
