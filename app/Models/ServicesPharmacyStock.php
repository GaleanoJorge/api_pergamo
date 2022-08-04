<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ServicesPharmacyStock as BaseServicesPharmacyStock;

class ServicesPharmacyStock extends BaseServicesPharmacyStock
{
  protected $fillable = [
    'pharmacy_stock_id', 
    'scope_of_attention_id',
  ];
}
