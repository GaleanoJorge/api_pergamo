<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BillingStock as BaseBillingStock;

class BillingStock extends BaseBillingStock
{
  protected $fillable = [
    'amount',
    'amount_unit',
    'product_id',
    'billing_id',
  ];
}
