<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScalePain as BaseChScalePain;

class ChScalePain extends BaseChScalePain
{
  protected $fillable = [
    'range',
    'type_record_id',
    'ch_record_id',
  ];
}
