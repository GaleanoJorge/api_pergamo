<?php

namespace App\Models;

use App\Models\Base\Tariff as BaseTariff;

class Tariff extends BaseTariff
{
	protected $fillable = [
		'name',
		'amount',
		'pad_risk_id',
		'role_id',
		'scope_of_attention_id',
	];
}
