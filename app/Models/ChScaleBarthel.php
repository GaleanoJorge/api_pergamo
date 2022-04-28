<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleBarthel as BaseChScaleBarthel;

class ChScaleBarthel extends BaseChScaleBarthel
{
  protected $fillable = [
    'eat',
    'move',
    'cleanliness',
    'toilet',
    'shower',
    'commute',
    'stairs',
    'dress',
    'stool',
    'urine',
    'classification',
    'score',
    'type_record_id',
    'ch_record_id',
  ];
}
