<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwHours as BaseChSwHours;

class ChSwHours extends BaseChSwHours
{
  protected $fillable = [
    'name',
  ];
}
