<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEFlexibilityFT as BaseChEFlexibilityFT;

class ChEFlexibilityFT extends BaseChEFlexibilityFT
{
  protected $fillable = [
    'head',
    'trunk',
    'sup_right',
    'sup_left',
    'inf_right',
    'inf_left',
    'observation',

  ];
}
