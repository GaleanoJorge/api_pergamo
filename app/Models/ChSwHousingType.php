<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwHousingType as BaseChSwHousingType;

class ChSwHousingType extends BaseChSwHousingType
{
  protected $fillable = [
    'name',
  ];
}
