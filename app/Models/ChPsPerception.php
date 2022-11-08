<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsPerception as BaseChPsPerception;

class ChPsPerception extends BaseChPsPerception
{
  protected $fillable = [
    'name',
  ];
}
