<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwExpression as BaseChSwExpression;

class ChSwExpression extends BaseChSwExpression
{
  protected $fillable = [
    'name',
  ];
}
