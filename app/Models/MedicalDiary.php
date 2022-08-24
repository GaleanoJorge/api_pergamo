<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\MedicalDiary as BaseMedicalDiary;

class MedicalDiary extends BaseMedicalDiary
{
  protected $fillable = [
    'assistance_id',
    'weekdays',
    'start_time',
    'finish_time',
    'start_date',
    'finish_date',
    'interval',
  ];
}
