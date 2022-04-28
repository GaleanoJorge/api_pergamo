<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleZarit as BaseChScaleZarit;

class ChScaleZarit extends BaseChScaleZarit
{
  protected $fillable = [
    'q_one',
    'q_two',
    'q_three',
    'q_four',
    'q_five',
    'q_six',
    'q_seven',
    'q_eight',
    'q_nine',
    'q_ten',
    'q_eleven',
    'q_twelve',
    'q_thirteen',
    'q_fourteen',
    'q_fifteen',
    'q_sixteen',
    'q_seventeen',
    'q_eighteen',
    'q_nineteen',
    'q_twenty',
    'q_twenty_one',
    'q_twenty_two',
    'total',
    'classification',
    'type_record_id',
    'ch_record_id',
  ];
}
