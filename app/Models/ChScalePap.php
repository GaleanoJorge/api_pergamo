<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScalePap as BaseChScalePap;

class ChScalePap extends BaseChScalePap
{
  protected $fillable = [
  'v_one_title',
  'v_one_value',
  'v_one_detail',
  'v_two_title',
  'v_two_value',
  'v_two_detail',
  'v_three_title',
  'v_three_value',
  'v_three_detail',
  'v_four_title',
  'v_four_value',
  'v_four_detail',
  'v_five_title',
  'v_five_value',
  'v_five_detail',
  'v_six_title',
  'v_six_value',
  'v_six_detail',
  'total',
  'classification',
  'type_record_id',
  'ch_record_id',
  ];
}
