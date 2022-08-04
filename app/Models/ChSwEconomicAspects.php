<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwEconomicAspects as BaseChSwEconomicAspects;

class ChSwEconomicAspects extends BaseChSwEconomicAspects
{
  protected $fillable = [
    'copay',
    'type_record_id',
    'ch_record_id'
  ];
}
