<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEReflectionFT as BaseChEReflectionFT;

class ChEReflectionFT extends BaseChEReflectionFT
{
  protected $fillable = [
    'bicipital',
    'radial',
    'triceps',
    'patellar',
    'aquilano',
    'reflexes',
    'observation',

  ];
}
