<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsJudgment as BaseChPsJudgment;

class ChPsJudgment extends BaseChPsJudgment
{
  protected $fillable = [
    'name',
  ];
}
