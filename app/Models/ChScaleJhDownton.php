<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleJhDownton as BaseChScaleJhDownton;

class ChScaleJhDownton extends BaseChScaleJhDownton
{
  protected $fillable = [
    'falls_title',
    'falls_value',
    'falls_detail',
    'medication_title',
    'medication_value',
    'medication_detail',
    'deficiency_title',
    'deficiency_value',
    'deficiency_detail',
    'mental_title',
    'mental_value',
    'mental_detail',
    'wandering_title',
    'wandering_value',
    'wandering_detail',
    'total',
    'risk',
    'type_record_id',
    'ch_record_id',
  ];
}
