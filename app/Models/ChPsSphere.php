<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsSphere as BaseChPsSphere;

class ChPsSphere extends BaseChPsSphere
{
  protected $fillable = [
    'euthymia',
    'observations',
    'ch_ps_sadness_id',
    'ch_ps_joy_id',
    'ch_ps_fear_id',
    'ch_ps_anger_id',
    'ch_ps_insufficiency_id',
    'ch_ps_several_id',
    'type_record_id',
    'ch_record_id'
  ];
}
