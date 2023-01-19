<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsThought as BaseChPsThought;

class ChPsThought extends BaseChPsThought
{
  protected $fillable = [
    'grade',
    'contents',
    'prevalent',
    'observations',
    'ch_ps_speed_id',
    'ch_ps_delusional_id',
    'ch_ps_overrated_id',
    'ch_ps_obsessive_id',
    'ch_ps_association_id',
    'type_record_id',
    'ch_record_id'
  ];
}
