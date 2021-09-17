<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\PbsType as BasePbsType;

class PbsType extends BasePbsType
{
    protected $fillable = [
		'name',
		
    
	];
}
