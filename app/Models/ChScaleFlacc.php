<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleFlacc as BaseChScaleFlacc;

class ChScaleFlacc extends BaseChScaleFlacc
{
  protected $fillable = [
    'face',
    'legs',
    'activity',
    'crying',
    'comfort',
    'total',
    'classification',
    'type_record_id',
    'ch_record_id',
  ];
}
