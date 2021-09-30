<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\MeasurementUnits as BaseMeasurementUnits;

class MeasurementUnits extends BaseMeasurementUnits
{
protected $fillable = [

	'code',
	'name',
	
	];
}
