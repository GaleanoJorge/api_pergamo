<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsInsufficiency as BaseChPsInsufficiency;

class ChPsInsufficiency extends BaseChPsInsufficiency
{
  protected $fillable = [
    'name',
  ];
}
