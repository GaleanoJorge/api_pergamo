<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsFeeding as BaseChPsFeeding;

class ChPsFeeding extends BaseChPsFeeding
{
  protected $fillable = [
    'name',
  ];
}
