<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScalePediatricNutrition as BaseChScalePediatricNutrition;

class ChScalePediatricNutrition extends BaseChScalePediatricNutrition
{
  protected $fillable = [
    'score_one_title',
    'score_one_value',
    'score_one_detail',
    'score_two_title',
    'score_two_value',
    'score_two_detail',
    'score_three_title',
    'score_three_value',
    'score_three_detail',
    'score_four_title',
    'score_four_value',
    'score_four_detail',
    'total',
    'risk',
    'classification',
    'type_record_id',
    'ch_record_id',
  ];
}
