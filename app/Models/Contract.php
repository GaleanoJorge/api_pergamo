<?php

namespace App\Models;

use App\Models\Base\Contract as BaseContract;

class Contract extends BaseContract
{
	protected $fillable = [
		'code',
		'parent_contract_id',
		'date_ini',
		'date_fin',
		'user_id',
		'allocation_resource',
		'contract_value',
		'object',
		'observations',
		'contract_state_id'
	];
}
