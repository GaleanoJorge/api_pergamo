<?php

namespace App\Models;

use App\Models\Base\GlossResponse as BaseGlossResponse;

class GlossResponse extends BaseGlossResponse
{
	protected $fillable = [
		'gloss_id',
		'user_id',
		'response_date',
		'objetion_code_response_id',
		'objetion_response_id', 
		'accepted_value',
		'value_not_accepted'
	];
}
