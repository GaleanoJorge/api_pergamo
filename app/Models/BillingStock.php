<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BillingStock as BaseBillingStock;

class BillingStock extends BaseBillingStock
{
  protected $fillable = [
    'amount',
    'amount_unit',
    'iva',
    'product_id',
    'product_supplies_com_id',
    'billing_id',
  ];
}
