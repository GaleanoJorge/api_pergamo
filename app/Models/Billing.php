<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Billing as BaseBilling;

class Billing extends BaseBilling
{
  protected $fillable = [
    'provider_name',
    'num_evidence',
    'ordered_quantity',
    'sub_total',
    'vat',
    'setting_value',
    'invoice_value',
    'type_billing_evidence_id',
    'pharmacy_stock_id',
  ];
}
