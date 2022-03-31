<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChTypeBackground as BaseChTypeBackground;

class ChTypeBackground extends BaseChTypeBackground
{
  protected $fillable = [
    'name'
  ];
}
