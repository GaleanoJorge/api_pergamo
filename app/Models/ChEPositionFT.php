<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEPositionFT as BaseChEPositionFT;

class ChEPositionFT extends BaseChEPositionFT
{
  protected $fillable = [
    'front_view',
    'right_view',
    'left_view',
    'rear_view',

  ];
}
