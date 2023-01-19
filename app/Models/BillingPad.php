<?php

namespace App\Models;

use App\Models\Base\BillingPad as BaseBillingPad;

class BillingPad extends BaseBillingPad
{
	protected $fillable = [
		'total_value',
		'consecutive',
		'validation_date',
		'facturation_date',
		'billing_pad_consecutive_id',
		'billing_pad_prefix_id',
		'billing_pad_status_id',
		'admissions_id',
		'billing_pad_pgp_id',
		'billing_credit_note_id',
	];
}
