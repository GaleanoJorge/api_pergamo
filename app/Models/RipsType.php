<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\RipsType as BaseRipsType;

class RipsType extends BaseRipsType
{
    protected $fillable = [
		'code',
		'rips_typefile_id',
		
		
    
	];
}
