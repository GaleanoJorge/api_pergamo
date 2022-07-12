<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\NumberMonthlySessionsTl as BaseNumberMonthlySessionsTl;

class NumberMonthlySessionsTl extends BaseNumberMonthlySessionsTl
{
  protected $fillable = [
    'monthly_sessions',
    'weekly_intensity',
    'recomendations ',
    'type_record_id',
    'ch_record_id',
  ];
}
