<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwOccupationalActivities as BaseChSwOccupationalActivities;

class ChSwOccupationalActivities extends BaseChSwOccupationalActivities
{
  protected $fillable = [
    'ch_sw_occupational_activities_id',
    'ch_sw_activity_id',
  ];
}
