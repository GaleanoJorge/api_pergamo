<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChNotesDescription as BaseChNotesDescription;

class ChNotesDescription extends BaseChNotesDescription
{
  protected $fillable = [
    'patient_position_id',
    'patient_dry',
    'unit_arrangement',
    'type_record_id',
    'ch_record_id',
  ];
}
