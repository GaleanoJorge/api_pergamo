<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChTherapeuticAss as BaseChTherapeuticAss;

class ChTherapeuticAss extends BaseChTherapeuticAss
{
  protected $fillable = [
    'ch_ass_pattern_id',
    'ch_ass_swing_id',
    'ch_ass_frequency_id',
    'ch_ass_mode_id',
    'ch_ass_cough_id',
    'ch_ass_chest_type_id',
    'ch_ass_chest_symmetry_id',
    'type_record_id',
    'ch_record_id',
  ];
}
