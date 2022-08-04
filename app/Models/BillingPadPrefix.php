<?php

namespace App\Models;

use App\Models\Base\BillingPadPrefix as BaseBillingPadPrefix;

class BillingPadPrefix extends BaseBillingPadPrefix
{
	protected $fillable = [
		'name',
	];
}
