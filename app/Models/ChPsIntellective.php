<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsIntellective as BaseChPsIntellective;

class ChPsIntellective extends BaseChPsIntellective
{
  protected $fillable = [
    'memory',
    'att_observations',
    'me_observations',
    'perception',
    'per_observations',
    'autopsychic',
    'allopsychic',
    'space',
    'ch_ps_attention_id',
    'type_record_id',
    'ch_record_id'
  ];
}
