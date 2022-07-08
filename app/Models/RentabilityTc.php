<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\RentabilityTc as BaseRentabilityTc;

class RentabilityTc extends BaseRentabilityTc
{
  protected $fillable = [
    'cost_center',
    'cc1',
    'cc2',
    'cc3',
    'cc4',
    'area1',
    'area2',
    'area3',
    'area4',
    'name_cost_center',
    'bill',
    'name_bill',
    'value',
    'month',
    'year',
  ];
}