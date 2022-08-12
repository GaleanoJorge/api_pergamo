<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEMuscularStrengthFT as BaseChEMuscularStrengthFT;

class ChEMuscularStrengthFT extends BaseChEMuscularStrengthFT
{
  protected $fillable = [
    'head',
    'sup_left',
    'hand_left',
    'sup_right',
    'hand',
    'trunk',
    'inf_left',
    'left_foot',
    'inf_right',
    'right_foot',

  ];
}
