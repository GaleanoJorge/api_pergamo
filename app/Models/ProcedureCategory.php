<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ProcedureCategory as BaseProcedureCategory;

class ProcedureCategory extends BaseProcedureCategory
{
    protected $fillable = [
		'prc_name',
		
	];
}
