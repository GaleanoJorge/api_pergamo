<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Billing as BaseBilling;

class Billing extends BaseBilling
{
  protected $fillable = [
    'company_id',
    'pharmacy_stock_id',
    'type_billing_evidence_id',
  ];
}
