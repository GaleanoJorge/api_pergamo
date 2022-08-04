<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwSeniority as BaseChSwSeniority;

class ChSwSeniority extends BaseChSwSeniority
{
  protected $fillable = [
    'name',
  ];
}
