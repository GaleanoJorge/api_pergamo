<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ProcedurePurpose as BaseProcedurePurpose;

class ProcedurePurpose extends BaseProcedurePurpose
{
    protected $fillable = [
		'name',
		'code',
    
	];
}
