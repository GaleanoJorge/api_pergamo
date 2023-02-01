<?php

namespace App\Models;

use App\Models\Base\BillingPadMu as BaseBillingPadMu;

class BillingPadMu extends BaseBillingPadMu
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
	];
}
