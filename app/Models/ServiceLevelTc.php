<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ServiceLevelTc as BaseServiceLevelTc;

class ServiceLevelTc extends BaseServiceLevelTc
{
  protected $fillable = [
    'line',
    'i0_10',
    'i11_20',
    'i21_30',
    'i31_40',
    'i41_50',
    'i51_60',
    'older_than_60',
    'total_calls_received',
    'replied_20',
    'service_level'
  ];
}
