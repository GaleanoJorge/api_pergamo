<?php

namespace App\Models;

use App\Models\Base\Ethnicity as BaseEthnicity;

class Ethnicity extends BaseEthnicity
{
	protected $fillable = [
		'name'
	];
}
