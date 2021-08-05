<?php

namespace App\Models;

use App\Models\Base\TemplatesHasSignature as BaseTemplatesHasSignature;

class TemplatesHasSignature extends BaseTemplatesHasSignature
{
	protected $fillable = [
		'position',
		'templates_id',
		'signatures_id',
		'position_x',
		'position_y',
		'height',
		'width'
	];
}
