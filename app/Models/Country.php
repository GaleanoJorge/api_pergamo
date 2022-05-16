<?php

namespace App\Models;

use App\Models\Base\Country as BaseCountry;

class Country extends BaseCountry
{
	protected $fillable = [
		'name',
		'sga_origin_fk',
		'code',
	];
}
