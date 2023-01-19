<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEOccHistoryOT as BaseChEOccHistoryOT;

class ChEOccHistoryOT extends BaseChEOccHistoryOT
{
  protected $fillable = [
    'ocupation',
    'enterprice_employee',
    'work_employee',
    'shift_employee',
    'observation_employee',
    'work_independent',
    'shift_independent',
    'observation_independent',
    'observation_home',

    'type_record_id',
    'ch_record_id',
  ];
}
