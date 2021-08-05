<?php

namespace App\Models;

use App\Models\Base\IdentificationType as BaseIdentificationType;

class IdentificationType extends BaseIdentificationType
{
	protected $fillable = [
		'name',
		'code'
	];
}
