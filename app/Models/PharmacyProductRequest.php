<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\PharmacyProductRequest as BasePharmacyProductRequest;

class PharmacyProductRequest extends BasePharmacyProductRequest
{
  protected $fillable = [
    'request_amount',
    'status',
    'observation',
    'services_briefcase_id',
    'admissions_id',
    'product_generic_id',
    'product_supplies_id',
    'own_pharmacy_stock_id',
    'request_pharmacy_stock_id',
  ];
}
