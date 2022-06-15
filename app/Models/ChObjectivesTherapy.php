<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChObjectivesTherapy as BaseChObjectivesTherapy;

class ChObjectivesTherapy extends BaseChObjectivesTherapy
{
  protected $fillable = [
    'strengthen',
    'promote',
    'title',
    'improve',
    're_education',
    'hold',
    'check',
    'train',
    'headline',
    'look_out',
    'type_record_id',
    'ch_record_id',
  ];
}
