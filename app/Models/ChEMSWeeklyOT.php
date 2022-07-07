<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEMSWeeklyOT as BaseChEMSWeeklyOT;

class ChEMSWeeklyOT extends BaseChEMSWeeklyOT
{
  protected $fillable = [
    'monthly_sessions',
    'weekly_intensity',
    'recommendations',

    'type_record_id',
    'ch_record_id',

  ];
}
