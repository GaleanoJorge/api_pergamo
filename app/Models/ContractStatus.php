<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ContractStatus as BaseContractStatus;

class ContractStatus extends BaseContractStatus
{
    protected $fillable = [
		'name',
		
		
	];
}
