<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwHousing as BaseChSwHousing;

class ChSwHousing extends BaseChSwHousing
{
  protected $fillable = [
    'name',
  ];
}
