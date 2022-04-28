<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScalePpi as BaseChScalePpi;

class ChScalePpi extends BaseChScalePpi
{
  protected $fillable = [
    'pps',
    'oral',
    'edema',
    'dyspnoea',
    'delirium',
    'total',
    'classification',
    'type_record_id',
    'ch_record_id',
  ];
}
