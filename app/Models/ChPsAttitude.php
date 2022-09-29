<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsAttitude as BaseChPsAttitude;

class ChPsAttitude extends BaseChPsAttitude
{
  protected $fillable = [
    'name',
  ];
}
