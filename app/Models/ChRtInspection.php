<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChRtInspection as BaseChRtInspection;

class ChRtInspection extends BaseChRtInspection
{
  protected $fillable = [
    'expansion',
    'masses',
    'crepitations',
    'fracturues',
    'airway',
    'pain',
    'type_record_id',
    'ch_record_id',
  ];
}
