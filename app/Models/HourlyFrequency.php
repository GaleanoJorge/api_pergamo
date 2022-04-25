<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\HourlyFrequency as BaseHourlyFrequency;

class HourlyFrequency extends BaseHourlyFrequency
{
protected $fillable = [

	'name',
	
	];
}
