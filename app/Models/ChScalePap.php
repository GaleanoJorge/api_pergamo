<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScalePap as BaseChScalePap;

class ChScalePap extends BaseChScalePap
{
  protected $fillable = [
  'variable_one',
  'variable_two',
  'variable_three',
  'variable_four',
  'variable_five',
  'variable_six',
  'total',
  'classification',
  'type_record_id',
  'ch_record_id',
  ];
}
