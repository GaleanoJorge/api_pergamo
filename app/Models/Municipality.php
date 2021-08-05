<?php

namespace App\Models;

use App\Models\Base\Municipality as BaseMunicipality;

class Municipality extends BaseMunicipality
{
	protected $fillable = [
		'region_id',
		'name'
	];
}
