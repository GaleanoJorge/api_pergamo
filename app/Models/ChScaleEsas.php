<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleEsas as BaseChScaleEsas;

class ChScaleEsas extends BaseChScaleEsas
{
  protected $fillable = [
    'pain_title',
    'pain_value',
    'tiredness_title',
    'tiredness_value',
    'retching_title',
    'retching_value',
    'depression_title',
    'depression_value',
    'anxiety_title',
    'anxiety_value',
    'drowsiness_title',
    'drowsiness_value',
    'appetite_title',
    'appetite_value',
    'breathing_title',
    'breathing_value',
    'welfare_title',
    'welfare_value',
    'sleep_title',
    'sleep_value',
    'observation',
    'type_record_id',
    'ch_record_id',
  ];
}
