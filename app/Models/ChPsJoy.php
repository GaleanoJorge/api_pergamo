<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsJoy as BaseChPsJoy;

class ChPsJoy extends BaseChPsJoy
{
  protected $fillable = [
    'name',
  ];
}
