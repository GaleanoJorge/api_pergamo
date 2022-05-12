<?php

namespace App\Models;

use App\Models\Base\Tariff as BaseTariff;

class Tariff extends BaseTariff
{
	protected $fillable = [
		'name',
		'amount',
		'quantity',
		'extra_dose',
		'phone_consult',
		'status_id',
		'pad_risk_id',
		'program_id',
		'type_of_attention_id',
	];
}
