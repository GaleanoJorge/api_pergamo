<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsParaphasias as BaseChPsParaphasias;

class ChPsParaphasias extends BaseChPsParaphasias
{
  protected $fillable = [
    'name',
  ];
}
