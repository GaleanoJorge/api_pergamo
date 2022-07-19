<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChRNValorationOT as BaseChRNValorationOT;

class ChRNValorationOT extends BaseChRNValorationOT
{
  protected $fillable = [
    'ch_diagnosis_id',
    'patient_state',
    'type_record_id',
    'ch_record_id',

  ];
}
