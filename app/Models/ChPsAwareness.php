<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsAwareness as BaseChPsAwareness;

class ChPsAwareness extends BaseChPsAwareness
{
  protected $fillable = [
    'name',
  ];
}
