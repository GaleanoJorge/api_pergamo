<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ProcedurePackage as BaseProcedurePackage;

class ProcedurePackage extends BaseProcedurePackage
{
    protected $fillable = [
		'value',
		'manual_price_id',
		'procedure_package_id',
		'procedure_id',
	];
}
