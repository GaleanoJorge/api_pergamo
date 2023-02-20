<?php

namespace App\Models;

use App\Models\Base\PaymentType as BasePaymentType;

class PaymentType extends BasePaymentType
{
	protected $fillable = [
		'name'
	];
}
