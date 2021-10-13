<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Risk as BaseRisk;

class Risk extends BaseRisk
{
    protected $fillable = [
		'name',
		
    
	];
}
