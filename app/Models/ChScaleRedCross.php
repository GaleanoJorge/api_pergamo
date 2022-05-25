<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleRedCross as BaseChScaleRedCross;

class ChScaleRedCross extends BaseChScaleRedCross
{
  protected $fillable = [
    'grade_title',
    'grade_value',
    'definition',
    'type_record_id',
    'ch_record_id',
  ];
}
