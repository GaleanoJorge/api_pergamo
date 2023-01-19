<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\PharmacyStock as BasePharmacyStock;

class PharmacyStock extends BasePharmacyStock
{
  protected $fillable = [
    'name',
    'type_pharmacy_stock_id',
    'campus_id',
  ];
}
