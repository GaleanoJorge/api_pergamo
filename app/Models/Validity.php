<?php

namespace App\Models;

use App\Models\Base\Validity as BaseValidity;

class Validity extends BaseValidity
{
	protected $fillable = [
		'name',
		'description'
	];
}
