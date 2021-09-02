<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ProcedureAge as BaseProcedureAge;

class ProcedureAge extends BaseProcedureAge
{
    protected $fillable = [
		'pra_name',
		'pra_begin',
        'pra_end',
	];
}
