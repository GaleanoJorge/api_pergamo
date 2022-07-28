<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\UserPharmacyStock as BaseUserPharmacyStock;

class UserPharmacyStock extends BaseUserPharmacyStock
{
  protected $fillable = [
    'pharmacy_stock_id', 
    'user_id',
  ];
}
