<?php

namespace App\Models;

use App\Models\Base\BillingPadConsecutive as BaseBillingPadConsecutive;

class BillingPadConsecutive extends BaseBillingPadConsecutive
{
	protected $fillable = [
		'resolution',
		'initial_consecutive',
		'final_consecutive',
		'actual_consecutive',
		'expiracy_date',
		'status_id',
		'billing_pad_prefix_id',
	];
}
