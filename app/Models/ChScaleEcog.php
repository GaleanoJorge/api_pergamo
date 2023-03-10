<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleEcog as BaseChScaleEcog;

class ChScaleEcog extends BaseChScaleEcog
{
  protected $fillable = [
    'grade_title',
    'grade_value',
    'definition',
    'type_record_id',
    'ch_record_id',
  ];
}
