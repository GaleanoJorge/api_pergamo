<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BillingStockRequest as BaseBillingStockRequest;

class BillingStockRequest extends BaseBillingStockRequest
{
  protected $fillable = [
    'amount',
    'product_generic_id',
    'product_supplies_id',
    'billing_id',
  ];
}
