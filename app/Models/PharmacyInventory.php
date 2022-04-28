<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\PharmacyInventory as BasePharmacyInventory;

class PharmacyInventory extends BasePharmacyInventory
{
  protected $fillable = [
    'actual_amount',
    'pharmacy_stock_id',
    'pharmacy_lot_id',
  ];
}
