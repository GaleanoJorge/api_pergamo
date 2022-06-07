<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScalePpi as BaseChScalePpi;

class ChScalePpi extends BaseChScalePpi
{
  protected $fillable = [
    'pps_title',
    'pps_value',
    'pps_detail',
    'oral_title',
    'oral_value',
    'oral_detail',
    'edema_title',
    'edema_value',
    'edema_detail',
    'dyspnoea_title',
    'dyspnoea_value',
    'dyspnoea_detail',
    'delirium_title',
    'delirium_value',
    'delirium_detail',
    'total',
    'classification',
    'type_record_id',
    'ch_record_id',
  ];
}
