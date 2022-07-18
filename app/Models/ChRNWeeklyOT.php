<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChRNWeeklyOT as BaseChRNWeeklyOT;

class ChRNWeeklyOT extends BaseChRNWeeklyOT
{
  protected $fillable = [
    'monthly_sessions',
    'weekly_intensity',
    'recomendations',

    'type_record_id',
    'ch_record_id',

  ];
}
