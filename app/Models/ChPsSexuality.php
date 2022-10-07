<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsSexuality as BaseChPsSexuality;

class ChPsSexuality extends BaseChPsSexuality
{
  protected $fillable = [
    'name',
  ];
}
