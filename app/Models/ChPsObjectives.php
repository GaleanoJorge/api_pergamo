<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsObjectives as BaseChPsObjectives;

class ChPsObjectives extends BaseChPsObjectives
{
  protected $fillable = [
    'patient',
    'session',
    'intervention',
    'patient_state',
    'recommendations',
    'control',
    'referrals',
    'type_record_id',
    'ch_record_id'
  ];
}
