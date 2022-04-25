<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\PharmacyStock as BasePharmacyStock;

class PharmacyStock extends BasePharmacyStock
{
  protected $fillable = [
    'name',
    'campus_id',
    'permission_pharmacy_stock_id',
  ];
}
