<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ProcedureAge as BaseProcedureAge;

class ProcedureAge extends BaseProcedureAge
{
    protected $fillable = [
		'name',
		'begin',
        'end',
	];
}
