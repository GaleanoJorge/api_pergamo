<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsSadness as BaseChPsSadness;

class ChPsSadness extends BaseChPsSadness
{
  protected $fillable = [
    'name',
  ];
}
