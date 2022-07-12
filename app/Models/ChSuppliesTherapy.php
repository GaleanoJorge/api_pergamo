<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSuppliesTherapy as BaseChSuppliesTherapy;

class ChSuppliesTherapy extends BaseChSuppliesTherapy
{
  protected $fillable = [
    'product_id',
    'amount',
    'justification',
    'type_record_id',
    'ch_record_id',
  ];
}
