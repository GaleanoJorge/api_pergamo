<?php

namespace App\Models;

use App\Models\Base\Frequency as BaseFrequency;

class Frequency extends BaseFrequency
{
	protected $fillable = [
		'name',
	];
}
