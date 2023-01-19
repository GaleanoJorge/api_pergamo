<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsComprehensive as BaseChPsComprehensive;

class ChPsComprehensive extends BaseChPsComprehensive
{
  protected $fillable = [
    'name',
  ];
}
