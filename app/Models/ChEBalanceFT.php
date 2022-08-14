<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEBalanceFT as BaseChEBalanceFT;

class ChEBalanceFT extends BaseChEBalanceFT
{
  protected $fillable = [
    'static',
    'dinamic',
    'observation',

  ];
}
