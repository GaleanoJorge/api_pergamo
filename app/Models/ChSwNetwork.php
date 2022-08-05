<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwNetwork as BaseChSwNetwork;

class ChSwNetwork extends BaseChSwNetwork
{
  protected $fillable = [
    'name',
  ];
}
