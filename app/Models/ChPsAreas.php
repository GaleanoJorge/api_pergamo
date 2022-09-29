<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsAreas as BaseChPsAreas;

class ChPsAreas extends BaseChPsAreas
{
  protected $fillable = [
    'name',
  ];
}
