<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChNotesDescription as BaseChNotesDescription;

class ChNotesDescription extends BaseChNotesDescription
{
  protected $fillable = [
    'patient_position_id',
    'ostomy_id',
    'hair_revision',
    'has_oxigen',
    'oxygen_type_id',
    'liters_per_minute_id',
    'change_position_id',
    'patient_dry',
    'unit_arrangement',
    'type_record_id',
    'ch_record_id',
  ];
}
