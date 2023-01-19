<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleNews as BaseChScaleNews;

class ChScaleNews extends BaseChScaleNews
{
  protected $fillable = [
    'p_one_title',
    'p_one_value',
    'p_one_detail',
    'p_two_title',
    'p_two_value',
    'p_two_detail',
    'p_three_title',
    'p_three_value',
    'p_three_detail',
    'p_four_title',
    'p_four_value',
    'p_four_detail',
    'p_five_title',
    'p_five_value',
    'p_five_detail',
    'p_six_title',
    'p_six_value',
    'p_six_detail',
    'p_seven_title',
    'p_seven_value',
    'p_seven_detail',
    'p_eight_title',
    'p_eight_value',
    'p_eight_detail',
    'qualification',
    'risk',
    'response',
    'type_record_id',
    'ch_record_id',
  ];
}
