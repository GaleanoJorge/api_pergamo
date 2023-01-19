<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEvoSoap as BaseChEvoSoap;

class ChEvoSoap extends BaseChEvoSoap
{
  protected $fillable = [
    'subjective',
    'objective',
    'type_record_id',
    'ch_record_id',
  ];
}
