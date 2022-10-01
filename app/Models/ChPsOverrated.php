<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsOverrated as BaseChPsOverrated;

class ChPsOverrated extends BaseChPsOverrated
{
  protected $fillable = [
    'name',
  ];
}
