<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleNews as BaseChScaleNews;

class ChScaleNews extends BaseChScaleNews
{
  protected $fillable = [
    'parameter_one',
    'parameter_two',
    'parameter_three',
    'parameter_four',
    'parameter_five',
    'parameter_six',
    'parameter_seven',
    'parameter_eight',
    'qualification',
    'risk',
    'response',
    'type_record_id',
    'ch_record_id',
  ];
}
