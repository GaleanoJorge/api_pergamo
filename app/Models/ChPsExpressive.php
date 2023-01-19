<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsExpressive as BaseChPsExpressive;

class ChPsExpressive extends BaseChPsExpressive
{
  protected $fillable = [
    'name',
  ];
}
