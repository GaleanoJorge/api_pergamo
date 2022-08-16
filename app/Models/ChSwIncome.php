<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwIncome as BaseChSwIncome;

class ChSwIncome extends BaseChSwIncome
{
  protected $fillable = [
    'salary',
    'pension',
    'donations',
    'rent',
    'familiar_help',
    'none',
    'total',
    'type_record_id',
    'ch_record_id'
  ];
}
