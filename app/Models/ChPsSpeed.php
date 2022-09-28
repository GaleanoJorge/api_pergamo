<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsSpeed as BaseChPsSpeed;

class ChPsSpeed extends BaseChPsSpeed
{
  protected $fillable = [
    'name',
  ];
}
