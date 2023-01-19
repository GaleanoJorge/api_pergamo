<?php

namespace App\Models;

use App\Models\Base\TypeConsents as BaseTypeConsents;

class TypeConsents extends BaseTypeConsents
{
	protected $fillable = [
		'name',
		'file',
	];
}
