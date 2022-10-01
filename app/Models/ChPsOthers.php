<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsOthers as BaseChPsOthers;

class ChPsOthers extends BaseChPsOthers
{
  protected $fillable = [
    'name',
  ];
}
