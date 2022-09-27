<?php

namespace App\Models;

use App\Models\Base\ProvidersOfHealthServices as BaseProvidersOfHealthServices;

class ProvidersOfHealthServices extends BaseProvidersOfHealthServices
{
	protected $fillable = [
		'name',
		'country_id',
		'region_id',
		'municipality_id',
	];
}
