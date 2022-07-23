<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPosition as BaseChPosition;

class ChPosition extends BaseChPosition
{
  protected $fillable = [
    'patient_position_id',
    'hair_revision',
    'observation',
    'type_record_id',
    'ch_record_id',
  ];
}
