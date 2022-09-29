<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsAnger as BaseChPsAnger;

class ChPsAnger extends BaseChPsAnger
{
  protected $fillable = [
    'name',
  ];
}
