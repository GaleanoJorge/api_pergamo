<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScalePfeiffer as BaseChScalePfeiffer;

class ChScalePfeiffer extends BaseChScalePfeiffer
{
  protected $fillable = [
    'study',
    'question_one',
    'question_two',
    'question_three',
    'question_four',
    'question_five',
    'question_six',
    'question_seven',
    'question_eight',
    'question_nine',
    'question_ten',
    'total',
    'classification',
    'type_record_id',
    'ch_record_id',
  ];
}
