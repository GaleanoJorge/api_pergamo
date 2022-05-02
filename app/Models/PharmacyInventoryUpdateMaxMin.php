<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\PharmacyUpdateMaxMin as BasePharmacyUpdateMaxMin;

class PharmacyUpdateMaxMin extends BasePharmacyUpdateMaxMin
{
  protected $fillable = [
    'pharmacy_stock_id',
    'pharmacy_inventory_id',
  ];
}
