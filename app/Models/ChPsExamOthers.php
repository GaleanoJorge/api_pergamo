<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsExamOthers as BaseChPsExamOthers;

class ChPsExamOthers extends BaseChPsExamOthers
{
  protected $fillable = [
    'name',
  ];
}
