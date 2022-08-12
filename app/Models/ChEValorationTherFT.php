<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEValorationTherFT as BaseChEValorationTherFT;

class ChEValorationTherFT extends BaseChEValorationTherFT
{
  protected $fillable = [
    'illness',
    'sports',
    'obsertations',
    'days_number',
    'minutes_number',
  ];
}
