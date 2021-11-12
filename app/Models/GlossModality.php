<?php

namespace App\Models;

use App\Models\Base\GlossModality as BaseGlossModality;

class GlossModality extends BaseGlossModality
{
	protected $fillable = [
		'name',
		'status_id'
	];
}
