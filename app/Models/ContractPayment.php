<?php

namespace App\Models;

use App\Models\Base\ContractPayment as BaseContractPayment;

class ContractPayment extends BaseContractPayment
{
	protected $fillable = [
		'contract_id',
		'code',
		'date_code',
		'code_technical_concept',
		'date_technical_concept',
		'value_payment'
	];
}
