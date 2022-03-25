<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChReasonConsultation as BaseChReasonConsultation;

class ChReasonConsultation extends BaseChReasonConsultation
{
  protected $fillable = [
    'reason_consultation',
    'current_illness',
    'ch_external_cause_id',
    'type_record_id',
    'ch_record_id',
  ];
}
