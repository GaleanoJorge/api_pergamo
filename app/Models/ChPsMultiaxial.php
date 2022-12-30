<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsMultiaxial as BaseChPsMultiaxial;

class ChPsMultiaxial extends BaseChPsMultiaxial
{
  protected $fillable = [
    'axis_one_id',
    'axis_two_id',
    'axis_three_id',
    'axis_four_id',
    'eeag',
    'type_record_id',
    'ch_record_id'
  ];
}
