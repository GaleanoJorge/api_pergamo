<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEMSDisAuditoryOT as BaseChEMSDisAuditoryOT;

class ChEMSDisAuditoryOT extends BaseChEMSDisAuditoryOT
{
  protected $fillable = [
    'sound_sources',
    'auditory_hyposensitivity',
    'auditory_hypersensitivity',
    'auditory_stimuli',
    'auditive_discrimination',

    'type_record_id',
    'ch_record_id',

  ];
}
