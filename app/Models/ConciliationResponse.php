<?php

namespace App\Models;

use App\Models\Base\ConciliationResponse as BaseConciliationResponse;

class ConciliationResponse extends BaseConciliationResponse
{
	protected $fillable = [
		'gloss_conciliations_id',
		'user_id',
		'response_date',
		'objetion_code_response_id',
		'objetion_response_id', 
		'accepted_value',
		'justification_status',
		'file' ,
		'value_not_accepted'
	];
}
