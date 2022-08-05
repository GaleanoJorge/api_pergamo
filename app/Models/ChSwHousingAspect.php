<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwHousingAspect as BaseChSwHousingAspect;

class ChSwHousingAspect extends BaseChSwHousingAspect
{
  protected $fillable = [
    'flat',
    'lift',
    'location',
    'vehicle_access',
    'ch_sw_housing_type_id',
    'ch_sw_housing_id',
    'type_record_id',
    'ch_record_id',
  ];
}
