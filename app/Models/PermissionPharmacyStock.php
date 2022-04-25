<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\PermissionPharmacyStock as BasePermissionPharmacyStock;

class PermissionPharmacyStock extends BasePermissionPharmacyStock
{
  protected $fillable = [
    'pharmacy_stock_id', 
    'permission_id',
    'user_id',
  ];
}
