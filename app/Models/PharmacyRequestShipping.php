<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\PharmacyRequestShipping as BasePharmacyRequestShipping;

class PharmacyRequestShipping extends BasePharmacyRequestShipping
{
  protected $fillable = [
    'amount',
    'amount_damaged',
    'amount_provition',
    'amount_operation',
    'pharmacy_product_request_id',
    'pharmacy_lot_stock_id',
    'user_responsible_id',
  ];
}
