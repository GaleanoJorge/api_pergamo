<?php

namespace App\Models;

use App\Models\Base\Locality as BaseLocality;

class Locality extends BaseLocality
{
	protected $fillable = [
		'municipality_id',
		'name'
	];
}
