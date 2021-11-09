<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ProcedurePackage as BaseProcedurePackage;

class ProcedurePackage extends BaseProcedurePackage
{
    protected $fillable = [
		'procedure_package_id',
		'procedure_id',
	];
}
