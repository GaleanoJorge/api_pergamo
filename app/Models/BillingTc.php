<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BillingTc as BaseBillingTc;

class BillingTc extends BaseBillingTc
{
  protected $fillable = [
    'consecutive',
    'date',
    'made_by',
    'value',
    'entity',
    'branch_office',
    'procedures',
    'doctor',
    'details',
    'period',
    'consecutive2',
    'ambit',
    'campus',
    'year',
  ];
}
