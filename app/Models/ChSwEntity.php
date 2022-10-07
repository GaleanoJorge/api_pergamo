<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwEntity as BaseChSwEntity;

class ChSwEntity extends BaseChSwEntity
{
  protected $fillable = [
    'name',
  ];
}
