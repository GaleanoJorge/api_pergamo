<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ConsumptionUnit as BaseConsumptionUnit;

class ConsumptionUnit extends BaseConsumptionUnit
{
protected $fillable = [

	'name',
	
	];
}
