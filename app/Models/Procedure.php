<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Procedure as BaseProcedure;

class Procedure extends BaseProcedure
{
    protected $fillable = [
		'prd_code',
		'prd_equivalent',
        'prd_name',
		'prd_category',
		'prd_nopos',
        'prd_age',
		'prd_gender',
		'prd_state',
        'prd_purpose',
		'prd_time',
		
	];
}
