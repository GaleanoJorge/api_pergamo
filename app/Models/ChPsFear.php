<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsFear as BaseChPsFear;

class ChPsFear extends BaseChPsFear
{
  protected $fillable = [
    'name',
  ];
}
