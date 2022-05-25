<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleWongBaker as BaseChScaleWongBaker;

class ChScaleWongBaker extends BaseChScaleWongBaker
{
  protected $fillable = [
    'pain_title',
    'pain_value',
    'type_record_id',
    'ch_record_id',
  ];
}
