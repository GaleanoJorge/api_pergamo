<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwOccupationalHistory as BaseChSwOccupationalHistory;

class ChSwOccupationalHistory extends BaseChSwOccupationalHistory
{
  protected $fillable = [
    'worked',
    'study',
    'home',
    'none',
    'ch_sw_occupation_id',
    'ch_sw_seniority_id',
    'ch_sw_hours_id',
    'ch_sw_turn_id',
    'observations',
    'type_record_id',
    'ch_record_id'
  ];
}
