<?php

namespace App\Models;

use App\Models\Base\PeriodicityFrequency as BasePeriodicityFrequency;

class PeriodicityFrequency extends BasePeriodicityFrequency
{
	protected $fillable = [
		'days',
		'name',
	];
}
