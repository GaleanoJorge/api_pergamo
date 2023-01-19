<?php

namespace App\Models;

use App\Models\Base\BillingPadPgp as BaseBillingPadPgp;

class BillingPadPgp extends BaseBillingPadPgp
{
	protected $fillable = [
		'total_value',
		'consecutive',
		'validation_date',
		'facturation_date',
		'billing_pad_consecutive_id',
		'billing_pad_prefix_id',
		'billing_pad_status_id',
		'billing_credit_note_id',
		'contract_id',
	];
}
