<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\PharmacyRequestStock as BasePharmacyRequestStock;

class PharmacyRequestStock extends BasePharmacyRequestStock
{
  protected $fillable = [
    'amount',
    'pharmacy_request_id',
  ];
}
