<?php

namespace App\Models;

use App\Models\Base\GlossService as BaseGlossService;

class GlossService extends BaseGlossService
{
	protected $fillable = [
		'name',
		'gloss_ambit_id',
		'status_id'
	];
}
