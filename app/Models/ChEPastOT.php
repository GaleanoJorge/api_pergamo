<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEPastOT as BaseChEPastOT;

class ChEPastOT extends BaseChEPastOT
{
  protected $fillable = [
    //
    'mother',
    'dad',
    'spouse',
    'sons',
    'uncles',
    'grandparents',
    'others',
    //
    'number_childrens',
    'observation_family_struct',
    'academy',
    'level_academy',
    'observation_schooling_training',
    'terapy',
    'observation_terapy',
    'smoke',
    'f_smoke',
    'alcohol',
    'f_alcohol',
    'sport',
    'f_sport',
    'sport_practice_observation',
    'observation',

    'type_record_id',
    'ch_record_id',

  ];
}
