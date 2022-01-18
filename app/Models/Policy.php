<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Policy as BasePolicy;

class Policy extends BasePolicy
{
    protected $fillable = [
		'contract_id',
		'policy_value',
		'type_policy_id',
		'insurance_carrier_id',
		'start_date',
		'finish_date',
		'policy_file',
	];
}
