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
		'procedure_category_id',
		'pbs_type_id',
        'procedure_age_id',
		'gender_id',
		'status_id',
        'procedure_purpose_id',
		'purpose_service_id',
		'time',
		
	];
}
