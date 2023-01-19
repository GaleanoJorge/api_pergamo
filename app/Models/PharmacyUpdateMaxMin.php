<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\PharmacyUpdateMaxMin as BasePharmacyUpdateMaxMin;

class PharmacyUpdateMaxMin extends BasePharmacyUpdateMaxMin
{
  protected $fillable = [
    'pharmacy_lot_stock_id',
    'own_pharmacy_stock_id',
    'request_pharmacy_stock_id',
  ];
}
