<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChRespiratoryTherapy as BaseChRespiratoryTherapy;

class ChRespiratoryTherapy extends BaseChRespiratoryTherapy
{
  protected $fillable = [
    'medical_diagnosis_id',
    'therapeutic_diagnosis_id',
    'reason_consultation',
    'type_record_id',
    'ch_record_id',
  ];
}
