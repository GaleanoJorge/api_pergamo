<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\PharmacyRequest as BasePharmacyRequest;

class PharmacyRequest extends BasePharmacyRequest
{
  protected $fillable = [
    'pharmacy_stock_id',
    'pharmacy_inventory_id',
    'pharmacy_product_request_id',
  ];
}
