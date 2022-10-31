<?php

namespace App\Models;

use App\Models\Base\CopayParameters as BaseCopayParameters;

class CopayParameters  extends BaseCopayParameters
{
	protected $fillable = [
		'type_contract_id',
		'category',
		'value'
	];
}
