<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleWongBaker as BaseChScaleWongBaker;

class ChScaleWongBaker extends BaseChScaleWongBaker
{
  protected $fillable = [
    'pain',
    'range',
    'type_record_id',
    'ch_record_id',
  ];
}