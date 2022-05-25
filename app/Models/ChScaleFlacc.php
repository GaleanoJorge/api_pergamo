<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleFlacc as BaseChScaleFlacc;

class ChScaleFlacc extends BaseChScaleFlacc
{
  protected $fillable = [
    'face_title',
    'face_value',
    'face_detail',
    'leg_titles',
    'legs_value',
    'legs_detail',
    'activity_title',
    'activity_value',
    'activity_detail',
    'crying_title',
    'crying_value',
    'crying_detail',
    'comfor_titlet',
    'comfort_value',
    'comfort_detail',
    'total',
    'classification',
    'type_record_id',
    'ch_record_id',
  ];
}
