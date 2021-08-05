<?php

namespace App\Models;

use App\Models\Base\ContractState as BaseContractState;

class ContractState extends BaseContractState
{
	protected $fillable = [
		'name'
	];
}
