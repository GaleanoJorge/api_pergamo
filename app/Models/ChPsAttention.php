<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsAttention as BaseChPsAttention;

class ChPsAttention extends BaseChPsAttention
{
  protected $fillable = [
    'name',
  ];
}
