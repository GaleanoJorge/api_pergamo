<?php

namespace App\Models;

use App\Models\Base\GlossAmbit as BaseGlossAmbit;

class GlossAmbit extends BaseGlossAmbit
{
	protected $fillable = [
		'name',
		'gloss_modality_id',
		'status_id'
	];
}
