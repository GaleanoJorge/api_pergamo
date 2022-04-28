<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScalePediatricNutrition as BaseChScalePediatricNutrition;

class ChScalePediatricNutrition extends BaseChScalePediatricNutrition
{
  protected $fillable = [
    'score_one',
    'score_two',
    'score_three',
    'score_four',
    'total',
    'risk',
    'classification',
    'type_record_id',
    'ch_record_id',
  ];
}
