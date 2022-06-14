<?php

namespace App\Models;

use App\Models\Base\BillingPad as BaseBillingPad;

class BillingPad extends BaseBillingPad
{
	protected $fillable = [
		'total_value',
		'validation_date',
		'billing_pad_status_id',
		'admissions_id',
		'billing_pad_pgp_id',
	];
}
