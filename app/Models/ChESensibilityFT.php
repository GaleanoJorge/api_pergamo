<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChESensibilityFT as BaseChESensibilityFT;

class ChESensibilityFT extends BaseChESensibilityFT
{
  protected $fillable = [
    'deep',
    'superficial',
    'cortical',
    'observation',

  ];
}
