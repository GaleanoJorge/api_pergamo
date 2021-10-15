<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\InsuranceCarrier as BaseInsuranceCarrier;

class InsuranceCarrier extends BaseInsuranceCarrier
{
    protected $fillable = [
		'name',
		
	];
}
