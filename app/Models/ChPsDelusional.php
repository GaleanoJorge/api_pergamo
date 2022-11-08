<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsDelusional as BaseChPsDelusional;

class ChPsDelusional extends BaseChPsDelusional
{
  protected $fillable = [
    'name',
  ];
}
