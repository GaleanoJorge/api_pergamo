<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\PriceType as BasePriceType;

class PriceType extends BasePriceType
{
    protected $fillable = [
		'name'
         
	
	];
}
