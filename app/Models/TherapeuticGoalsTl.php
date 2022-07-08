<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\TherapeuticGoalsTl as BaseTherapeuticGoalsTl;

class TherapeuticGoalsTl extends BaseTherapeuticGoalsTl
{
  protected $fillable = [
    'hold_phonoarticulators',
    'strengthen_phonoarticulators',
    'strengthen_tone',
    'favor_process',
    'strengthen_thread',
    'favor_psycholinguistic',
    'increase_processes',
    'strengthen_qualities',
    'strengthen_communication',
    'improve_skills',
    'type_record_id',
    'ch_record_id',
  ];
}
