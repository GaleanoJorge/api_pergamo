<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleGlasgow as BaseChScaleGlasgow;

class ChScaleGlasgow extends BaseChScaleGlasgow
{
  protected $fillable = [
    'ocular_title',
    'ocular_value',
    'ocular_detail',
    'verbal_title',
    'verbal_value',
    'verbal_detail',
    'motor_title',
    'motor_value',
    'motor_detail',
    'total',
    'type_record_id',
    'ch_record_id',
  ];
}
