<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEValorationFT as BaseChEValorationFT;

class ChEValorationFT extends BaseChEValorationFT
{
  protected $fillable = [
    'patient_state',
    'ch_diagnosis_id',
    'type_record_id',
    'ch_record_id',
  ];
}
