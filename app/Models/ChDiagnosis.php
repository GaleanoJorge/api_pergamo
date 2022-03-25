<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChDiagnosis as BaseChDiagnosis;

class ChDiagnosis extends BaseChDiagnosis
{
  protected $fillable = [
    'ch_diagnosis_type_id',
    'ch_diagnosis_class_id',
    'diagnosis_id',
    'diagnosis_observation',
    'type_record_id',
    'ch_record_id',
  ];
}
