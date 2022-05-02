<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Billing as BaseBilling;

class Billing extends BaseBilling
{
  protected $fillable = [
    'num_evidence',
    'sub_total',
    'vat',
    'setting_value',
    'invoice_value',
    'company_id',
    'type_billing_evidence_id',
  ];
}
