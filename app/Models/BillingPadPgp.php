<?php

namespace App\Models;

use App\Models\Base\BillingPadPgp as BaseBillingPadPgp;

class BillingPadPgp extends BaseBillingPadPgp
{
	protected $fillable = [
		'total_value',
		'validation_date',
		'contract_id',
		'billing_pad_status_id',
	];
}
