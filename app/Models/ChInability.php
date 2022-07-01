<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChInability as BaseChInability;

class ChInability extends BaseChInability
{
  protected $fillable = [
    'ch_contingency_code_id',
    'extension',
    'initial_date',
    'final_date',
    'diagnosis_id',
    'ch_type_inability_id',
    'ch_type_procedure_id',
    'observation',
    'type_record_id',
    'ch_record_id',
  ];
}
