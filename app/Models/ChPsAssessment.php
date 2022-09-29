<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsAssessment as BaseChPsAssessment;

class ChPsAssessment extends BaseChPsAssessment
{
  protected $fillable = [
    'patient',
    'symptom',
    'episodes_number',
    'areas',
    'relationship_id',
    'ch_ps_episodes_id',
    'type_record_id',
    'ch_record_id'
  ];
}
