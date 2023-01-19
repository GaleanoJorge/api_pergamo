<?php

namespace App\Models;

use App\Models\Base\BillingPadLog as BaseBillingPadLog;

class BillingPadLog extends BaseBillingPadLog
{
	protected $fillable = [
		'billing_pad_pgp_id',
		'billing_pad_id',
		'billing_pad_status_id',
		'user_id',
	];
}
