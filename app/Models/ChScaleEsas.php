<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleEsas as BaseChScaleEsas;

class ChScaleEsas extends BaseChScaleEsas
{
  protected $fillable = [
    'pain',
    'tiredness',
    'retching',
    'depression',
    'anxiety',
    'drowsiness',
    'appetite',
    'welfare',
    'breathing',
    'sleep',
    'observation',
    'type_record_id',
    'ch_record_id',
  ];
}
