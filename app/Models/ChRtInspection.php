<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChRtInspection as BaseChRtInspection;

class ChRtInspection extends BaseChRtInspection
{
  protected $fillable = [
    'expansion',
    'masses',
    'detail_masses',
    'crepitations',
    'fracturues',
    'detail_fracturues',
    'airway',
    'type_record_id',
    'ch_record_id',
  ];
}
