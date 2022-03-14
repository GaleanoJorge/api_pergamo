<?php

namespace App\Models;

use App\Models\Base\ReasonConsultation as BaseReasonConsultation;

class ReasonConsultation extends BaseReasonConsultation
{
	protected $fillable = [
		'admissions_id',
		'symptoms',
		'respiratory_issues',
		'covid_contact'
	];
}
