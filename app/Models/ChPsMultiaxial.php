<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsMultiaxial as BaseChPsMultiaxial;

class ChPsMultiaxial extends BaseChPsMultiaxial
{
  protected $fillable = [
    'axis_one',
    'axis_two',
    'axis_three',
    'axis_four',
    'eeag',
    'type_record_id',
    'ch_record_id'
  ];
}
