<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\CollectionTc as BaseCollectionTc;

class CollectionTc extends BaseCollectionTc
{
  protected $fillable = [
    'transaction_date',
    'period',
    'nit',
    'entity',
    'bank_value',
  ];
}
