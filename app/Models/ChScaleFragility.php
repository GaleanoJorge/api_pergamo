<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleFragility as BaseChScaleFragility;

class ChScaleFragility extends BaseChScaleFragility
{
  protected $fillable = [
    'q_one_title',
    'q_one_value',
    'q_one_detail',
    'q_two_title',
    'q_two_value',
    'q_two_detail',
    'q_three_title',
    'q_three_value',
    'q_three_detail',
    'q_four_title',
    'q_four_value',
    'q_four_detail',
    'q_five_title',
    'q_five_value',
    'q_five_detail',
    'q_six_title',
    'q_six_value',
    'q_six_detail',
    'total',
    'classification',
    'type_record_id',
    'ch_record_id',
  ];
}
