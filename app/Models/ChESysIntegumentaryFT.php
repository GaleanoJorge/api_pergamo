<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChESysIntegumentaryFT as BaseChESysIntegumentaryFT;

class ChESysIntegumentaryFT extends BaseChESysIntegumentaryFT
{
  protected $fillable = [
    'colaboration',
    'integrity',
    'texture',
    'sweating',
    'elasticity',
    'extensibility',
    'mobility',
    'scar',
    'bedsores',
    'location',

  ];
}
