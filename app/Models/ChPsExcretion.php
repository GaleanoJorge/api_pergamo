<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsExcretion as BaseChPsExcretion;

class ChPsExcretion extends BaseChPsExcretion
{
  protected $fillable = [
    'name',
  ];
}
