<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleFragility as BaseChScaleFragility;

class ChScaleFragility extends BaseChScaleFragility
{
  protected $fillable = [
    'question_one',
    'question_two',
    'question_three',
    'question_four',
    'question_five',
    'question_six',
    'total',
    'classification',
    'type_record_id',
    'ch_record_id',
  ];
}
