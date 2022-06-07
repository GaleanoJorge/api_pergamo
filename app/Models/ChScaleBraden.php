<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleBraden as BaseChScaleBraden;

class ChScaleBraden extends BaseChScaleBraden
{
  protected $fillable = [
    'sensory_title',
    'sensory_value',
    'sensory_detail',
    'humidity_title',
    'humidity_value',
    'humidity_detail',
    'activity_title',
    'activity_value',
    'activity_detail',
    'mobility_title',
    'mobility_value',
    'mobility_detail',
    'nutrition_title',
    'nutrition_value',
    'nutrition_detail',
    'lesion_title',
    'lesion_value',
    'lesion_detail',
    'total',
    'risk',
    'type_record_id',
    'ch_record_id',
  ];
}
