<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsRelationship as BaseChPsRelationship;

class ChPsRelationship extends BaseChPsRelationship
{
  protected $fillable = [
    'position',
    'self_care',
    'visual',
    'verbal',
    'appearance',
    'att_observations',
    'aw_observations',
    'sl_observations',
    'sex_observations',
    'fee_observations',
    'ex_observations',
    'attitude',
    'ch_ps_awareness_id',
    'ch_ps_sleep_id',
    'exam_others',
    'sexuality',
    'feeding',
    'excretion',
    'type_record_id',
    'ch_record_id'
  ];
}
