<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsSleep as BaseChPsSleep;

class ChPsSleep extends BaseChPsSleep
{
  protected $fillable = [
    'name',
  ];
}
