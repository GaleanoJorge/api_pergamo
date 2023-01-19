<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\TypeBillingEvidence as BaseTypeBillingEvidence;

class TypeBillingEvidence extends BaseTypeBillingEvidence
{
  protected $fillable = [
    'name'
  ];
}
