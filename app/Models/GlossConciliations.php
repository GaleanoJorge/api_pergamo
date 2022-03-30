<?php

namespace App\Models;

use App\Models\Base\GlossConciliations as BaseGlossConciliations;

class GlossConciliations extends BaseGlossConciliations
{
	protected $fillable = [
		'gloss_id',
		'user_id',
		'objeted_value',
		'cociliations_date',
		'observations',
		'accepted_value',
		'file' ,
		'value_not_accepted'
	];
}
