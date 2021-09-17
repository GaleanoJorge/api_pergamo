<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ProcedureType as BaseProcedureType;

class ProcedureType extends BaseProcedureType
{
    protected $fillable = [
		'name',
		
    
	];
}
