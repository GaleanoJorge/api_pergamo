<?php

namespace App\Models;

use App\Models\Base\BillingPadStatus as BaseBillingPadStatus;

class BillingPadStatus extends BaseBillingPadStatus
{
	protected $fillable = [
		'name',
	];
}
