<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ContractLog as BaseContractLog;

class ContractLog extends BaseContractLog
{
    protected $fillable = [
		'name',
		'date_log',
		'contract_id'
		
	];
}
