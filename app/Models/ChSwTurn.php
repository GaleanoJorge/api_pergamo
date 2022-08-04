<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwTurn as BaseChSwTurn;

class ChSwTurn extends BaseChSwTurn
{
  protected $fillable = [
    'name',
  ];
}
