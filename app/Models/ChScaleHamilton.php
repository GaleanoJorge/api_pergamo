<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleHamilton as BaseChScaleHamilton;

class ChScaleHamilton extends BaseChScaleHamilton
{
  protected $fillable = [
    'variable_one',
    'variable_two',
    'variable_three',
    'variable_four',
    'variable_five',
    'variable_six',
    'variable_seven',
    'variable_eigth',
    'variable_nine',
    'variable_ten',
    'variable_eleven',
    'variable_twelve',
    'variable_thirteen',
    'variable_fourteen',
    'variable_fifteen',
    'variable_sixteen',
    'total',
    'qualification',
    'type_record_id',
    'ch_record_id',
  ];
}
