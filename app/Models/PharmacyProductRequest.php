<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\PharmacyProductRequest as BasePharmacyProductRequest;

class PharmacyProductRequest extends BasePharmacyProductRequest
{
  protected $fillable = [
    'amount',
    'product_generic_id',
    'pharmacy_stock_id',
  ];
}
