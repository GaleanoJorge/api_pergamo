<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwOccupation as BaseChSwOccupation;

class ChSwOccupation extends BaseChSwOccupation
{
  protected $fillable = [
    'name',
  ];
}
