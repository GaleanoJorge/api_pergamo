<?php

namespace App\Models;

use App\Models\Base\Reference as BaseReference;

class Reference extends BaseReference
{
	protected $fillable = [
		'firstname',
		'lastname',
		'identification',
		're_input',
		'age',
		'intention',
		'presentation_date',
		'acceptance_date',
		'denied_date',
		'patient_id',
		'gender_id',
		'identification_type_id',
		'procedure_id',
		'company_id',
		'diagnosis_id',
		'providers_of_health_services_id',
		'stay_type_id',
		'reference_status_id',
		'request_campus_id',
		'acceptance_flat_id',
		'acceptance_pavilion_id',
		'acceptance_bed_id',
		'request_regime_id',
		'request_regime_level',
		'request_user_id',
		'request_technological_medium_id',
		'request_admission_route_id',
		'request_specialty_id',
		'request_program_id',
		'request_observation',
		'acceptance_campus_id',
		'acceptance_regime_id',
		'acceptance_regime_level',
		'acceptance_user_id',
		'acceptance_technological_medium_id',
		'acceptance_admission_route_id',
		'acceptance_specialty_id',
		'acceptance_program_id',
		'tutor_id',
		'acceptance_observation',
		'denied_user_id',
		'denied_technological_medium_id',
		'denied_admission_route_id',
		'denied_specialty_id',
		'denied_type_id',
		'denied_program_id',
		'denied_observation',
		'admissions_id',
	];
}
