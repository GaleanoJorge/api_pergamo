<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChNursingEntry as BaseChNursingEntry;

class ChNursingEntry extends BaseChNursingEntry
{
  protected $fillable = [
    'patient_position_id',
    'observation_position',
    'ostomy_id',
    'observation',
    'hair_revision',
    'type_record_id',
    'ch_record_id',
  ];
}
