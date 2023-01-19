<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleBarthel as BaseChScaleBarthel;

class ChScaleBarthel extends BaseChScaleBarthel
{
  protected $fillable = [
    'eat_title',
    'eat_value',
    'eat_detail',
    'move_title',
    'move_value',
    'move_detail',
    'cleanliness_title',
    'cleanliness_value',
    'cleanliness_detail',
    'toilet_title',
    'toilet_value',
    'toilet_detail',
    'shower_title',
    'shower_value',
    'shower_detail',
    'commute_title',
    'commute_value',
    'commute_detail',
    'stairs_title',
    'stairs_value',
    'stairs_detail',
    'dress_title',
    'dress_value',
    'dress_detail',
    'fecal_title',
    'fecal_value',
    'fecal_detail',
    'urine_title',
    'urine_value',
    'urine_detail',
    'classification',
    'score',
    'type_record_id',
    'ch_record_id',
  ];
}
