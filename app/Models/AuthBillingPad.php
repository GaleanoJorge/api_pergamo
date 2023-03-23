<?php

namespace App\Models;

use App\Models\Base\AuthBillingPad as BaseAuthBillingPad;

class AuthBillingPad extends BaseAuthBillingPad
{
	protected $fillable = [
		'value',
		'billing_pad_id',
		'billing_pad_pgp_id',
		'billing_pad_mu_id',
		'authorization_id',
	];
}
