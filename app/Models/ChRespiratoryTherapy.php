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
    'ch_background_id',
    'ch_gynecologists_id',
    'type_record_id',
    'ch_record_id',
  ];
}
