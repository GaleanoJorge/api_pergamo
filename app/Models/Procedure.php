<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Procedure as BaseProcedure;

class Procedure extends BaseProcedure
{
    protected $fillable = [
		'code',
		'equivalent',
        'name',
		'category_id',
		'nopos',
        'age_id',
		'gender_id',
		'status_id',
        'purpose_id',
		'time',
		
	];
}
