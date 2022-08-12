<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEPainFT as BaseChEPainFT;

class ChEPainFT extends BaseChEPainFT
{
  protected $fillable = [
    'burning',
    'stinging',
    'locatedi',
    'oppressive',

    'irradiated',
    'located',
    'intensity',
    'exaccervating',
    'decreated',
  ];
}
