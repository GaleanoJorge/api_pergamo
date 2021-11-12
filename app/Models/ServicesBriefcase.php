<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ServicesBriefcase as BaseServicesBriefcase;

class ServicesBriefcase extends BaseServicesBriefcase
{
    protected $fillable = [
		'briefcase_id',
		'manual_price_id',
		'value',
		'factor',
		
	];
}
