<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScalePayette as BaseChScalePayette;

class ChScalePayette extends BaseChScalePayette
{
  protected $fillable = [
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
    'classification',
    'risk',
    'recommendations',
    'type_record_id',
    'ch_record_id',
  ];
}
