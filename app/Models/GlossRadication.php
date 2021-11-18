<?php

namespace App\Models;

use App\Models\Base\GlossRadication as BaseGlossRadication;

class GlossRadication extends BaseGlossRadication
{
	protected $fillable = [
		'gloss_response_id',
		'radication_date',
		'observation',
	];
}
