<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\PaymentTerms as BasePaymentTerms;

class PaymentTerms extends BasePaymentTerms
{
    protected $fillable = [
    'name',
    'term'
	];
}
