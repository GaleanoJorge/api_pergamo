<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsSeveral as BaseChPsSeveral;

class ChPsSeveral extends BaseChPsSeveral
{
  protected $fillable = [
    'name',
  ];
}
