<?php

namespace App\Models;

use App\Models\Base\AuthBillingPad as BaseAuthBillingPad;

class AuthBillingPad extends BaseAuthBillingPad
{
	protected $fillable = [
		'value',
		'billing_pad_id',
		'authorization_id',
	];
}
